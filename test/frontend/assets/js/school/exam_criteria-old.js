window.license_id = getUrlParam('id');
window.license_name = sessionStorage.getItem('license_type'+ getUrlParam('id'));
window.familiesOptions = [];

$(function() {

	const elmExamCriterias = $("#exam-criterias-container");
	const elmExamCriteriasPagination = $("#exam-criterias-pagiantion");
	const examCriteriaModalElm = $("#examCriteriaModal");
	const examCriteriaForm = $("#examCriteriaForm");
	var examCriteriaDetail = {};
	
	// Set license name
	$('#license-name-title').html(license_name);

	// Ajax request setup
	$.ajaxSetup({
		headers: {
			'Authorization': `Bearer ${appModule.getToken()}`
		},
		dataType: 'json'
	});

	var examCriteriaModal = new bootstrap.Modal(
		document.getElementById("examCriteriaModal"),
		{
			backdrop: "static",
			keyboard: false,
		}
	);
	
	// add new examCriteria
	$("#btn-add-exam-criteria").click(function () {
		examCriteriaModalElm.find(".modal-header .modal-title").html("Add Exam Criteria");
		// Update options
		examCriteriaForm
			.attr("action", formApiUrl("add-exam-criteria"))
			.attr("method", 'post');
		examCriteriaForm
			.find('[type="submit"]')
			.removeAttr('data-exam-criteria')
			.html('Add');
		examCriteriaForm.find('[name="license_name"').val(license_name);
		// Update options
		familyOptionsLength = 1;
		familiesOptions = [];
		$('#options--container .family-options--list').html('');
		loadFamilyOptionView({
			familyRowId: familyOptionsLength,
			familyRemove: false
		});
		examCriteriaModal.show();
	});

	// load examCriteria view
	function loadexamCriteriasView(items, pagination = {}) {
		
		if (items.length > 0) {
			elmExamCriterias.html(`<div class="nk-tb-list nk-tb-ulist list--area">
                <div class="nk-tb-item nk-tb-head">
                <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold">License Type</span></div>
                <div class="nk-tb-col"><span class="text-black fw-bold">Sub-License Type</span></div>
                <div class="nk-tb-col tb-col-sm text-center"><span class="text-black fw-bold">Total Question</span></div>
				<div class="nk-tb-col tb-col-sm text-center"><span class="text-black fw-bold">Total Family</span></div>
				<div class="nk-tb-col tb-col-sm text-center"><span class="text-black fw-bold">Pass Percentage</span></div>
                <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold">Action</span></div>
                </div>
            </div>`);

			items.forEach((item) => {
				if (parseValue(license_name) == '' && parseValue(item.license_name) != '') {
					license_name = item.license_name;
				}

				elmExamCriterias.find(".list--area").append(`<div class="nk-tb-item details">
                    <div class="nk-tb-col tb-col-md"><span>${item.license_name}</span></div>
                    <div class="nk-tb-col"><span>---</span></div>
                    <div class="nk-tb-col tb-col-sm text-center"><span>${item.total_questions}</span></div>
					<div class="nk-tb-col tb-col-sm text-center"><span>${item.total_family}</span></div>
					<div class="nk-tb-col tb-col-sm text-center"><span>${item.pass_percentage}%</span></div>
                    <div class="nk-tb-col nk-tb-col-tools">
                    <ul class="">
                        <li>
                            <div class="drodown">
                                <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-end">
									<ul class="link-list-opt no-bdr">
										<li><a href="javascript:void(0)" class="btn-view-exam-criteria" data-exam-criteria="${item.id}"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
										<li><a href="javascript:void(0)" class="btn-edit-exam-criteria" data-exam-criteria="${item.id}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
										<li><a href="javascript:void(0)" class="btn-delete-exam-criteria" data-exam-criteria="${item.id}"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
									</ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                    </div>
                </div>`);
			});

			elmExamCriteriasPagination.pagination({
				items: parseInt(pagination.total),
				itemsOnPage: parseInt(pagination.per_page),
				currentPage: pagination.current_page,
				displayedPages: 3,
				navStyle: "pagination justify-content-center justify-content-md-start",
				listStyle: "page-item",
				linkStyle: "page-link",
				onPageClick: function (pageNumber, event) {
					event.preventDefault();
					getExamCriterias({
						page: pageNumber,
					});
				},
			});
		} else {
			elmExamCriterias.html(`<div class="nk-tb-item-empty">
					<p class="text-center text-black fw-bold"> No Exam Criterias Available</p>
				</div>`);
		}
	}

	// Get examCriteria list
	window.getExamCriterias = async function(option = {}) {
		let params = {};
		if (parseValue(option.page)) {
			params["page"] = option.page;
		}
		const school_id = await appModule.getCookie('school_id');
		
		showLoader({
			title: 'Please Wait...',
			text: 'fetching'
		});

		$.ajax({
			type: "get",
			url: formApiUrl(`exam-criteria-list/${school_id}/${license_id}`, params)
		}).done(function (response) {
			if(response.data.total > 0) {
				$("#btn-add-exam-criteria").prop("disabled", true).addClass('pe-none');
			} else {
				$("#btn-add-exam-criteria").prop("disabled", false).removeClass('pe-none');
			}
			if (response.status == true) {
				loadexamCriteriasView(response.data?.data, {
					current_page: response.data.current_page,
					per_page: response.data.per_page,
					total: response.data.total,
				});
			} else if (response.status == false) {
				NioApp.Toast("Error Occured", "error");
			} else {
				NioApp.Toast("Invalid response status", "warning");
			}
		}).fail(function (error) {
			NioApp.Toast("Error Occured", "error");
		}).always(function () {
			hideLoader();
		});
	}

	// Add validation method
	$.validator.addMethod("checkduplicate_family", function (value, element, param) {
		let familyValues = [];
       
        $("#options--container .family-option--list .form-select-family-level").each(function(index, elementz) {
			familyValues.push(elementz.value);
        });
		// console.log(familyValues );
		// console.log(familyValues.indexOf(value));
		// Remove first occurance of current value from array
		if(familyValues.indexOf(value) != -1) {
			familyValues.splice(familyValues.indexOf(value), 1);
		}

		console.log(familyValues);
		console.log(familyValues.includes(value))
		return !familyValues.includes(value);
	}, "Family exist");

	$.validator.addMethod("checkquestions_family", function (value, element, param) {
		let totalQuestions = $('#total-questions').val();
        let sumofQuestions = 0;
       
        $("#options--container .family-option--list .family-total-questions").each(function(index, element) {
            if (parseValue(element.value) != '') {
                sumofQuestions = parseInt(sumofQuestions) + parseInt(element.value);
            }            
        });
		
		return totalQuestions >= sumofQuestions ? true : false;
	}, "no of questions exceeded");

	$.validator.addMethod("checkduplicate_dlevel", function (value, element, param) {
		let dlevelValues = [];
		let options = {};
		
		const params = param.split(';');
		params.forEach((value) => {
			if(parseValue(value) != '') {
				let option = value.split(':');

				options[option[0]] = option[1];
			}
		});

        $("#difficulty-level-options-list"+options.familyRow+" .form-select-difficulty-level").each(function(index, elementz) {
			dlevelValues.push(elementz.value);
        });
		
		// Remove first occurance of current value from array
		if(dlevelValues.indexOf(value) != -1) {
			dlevelValues.splice(dlevelValues.indexOf(value), 1);
		}

		console.log(dlevelValues);
		console.log(dlevelValues.includes(value))
		return !dlevelValues.includes(value);
	}, "Difficulty Level exist");

	$.validator.addMethod("checkquestions_dlevel", function (value, element, param) {
		let options = {};
		
		const params = param.split(';');
		params.forEach((value) => {
			if(parseValue(value) != '') {
				let option = value.split(':');

				options[option[0]] = option[1];
			}
		});
		
		let totalQuestions = $('#options'+ options.familyRow + '-questions').val();
		let sumofQuestions = 0;

		$('#difficulty-level-options-list'+options.familyRow).find('.difficulty-level--list .level-total-questions').each(function(index, element) {
			sumofQuestions = (sumofQuestions + parseInt(element.value));
		});
		
		return totalQuestions >= sumofQuestions ? true : false;
	}, "no of questions exceeded");

	// Validate Exam Criteria Form
	NioApp.Validate("#examCriteriaForm", {
		onkeyup: function (element) {
			$(element).valid();
		},
		onclick: function (element) {
			$(element).valid();
		},
		errorElement: "span",
		errorClass: "invalid",
		errorPlacement: function errorPlacement(error, element) {
			if (element.parents().hasClass("input-group")) {
				error.appendTo(element.parent().parent());
			} else {
				error.appendTo(element.parent());
			}
		},
	});

	// Exam Criteria Form reset on Modal close
	$('[data-bs-dismiss="modal"]').on("click", function () {
		examCriteriaModalElm.find(".modal-header .modal-title").html("Exam Criteria");
		examCriteriaForm
			.removeAttr("action")
			.removeAttr("method");
		examCriteriaForm[0].reset();
		examCriteriaFormValidator.resetForm();
	});

	// Exam Criteria Form submit
	examCriteriaForm.on("submit", async function (e) {
		e.preventDefault();
		let btnSubmit = $(this).find('[type="submit"]');

		let btnSubmitText = btnSubmit.html();
		// Changed button attribute after submit
		btnSubmit.attr('disabled', true).html('Loading...');

		var formData = new FormData(examCriteriaForm[0]);
		const license_id = await getUrlParam('id');
		const school_id = await appModule.getCookie('school_id');
		
		let options = [];
		familiesOptions.forEach((option) => {
			options.push({
				'family_id': $('#options'+option.rowId+'-family').val(),
				'total_questions': $('#options'+option.rowId+'-questions').val(),
				'questions': (function() {
					let questions = [];
					option.questions.forEach((level) => {
						questions.push({
							'difficulty_id': $('#options'+option.rowId+'-questions'+ level +'-difficulty_levels').val(),
							'no_of_questions': $('#options'+option.rowId+'-questions'+ level +'-no_of_questions').val(),
						});
					});
					return questions;
				}())
			});
		});
				
		let formDatas = {
			'school_id': school_id,
			'licence_id': license_id,
			'total_questions': formData.get('total_questions'),
			'pass_percentage': formData.get('pass_percentage'),
			'duration': formData.get('duration'),
			'options': options
		}
		
		// Append examCriteria id if exist
		if(parseValue($(this).find('[type="submit"]').attr('data-exam-criteria')) != '') {
			formDatas['exam_criteria_id'] = $(this).find('[type="submit"]').attr('data-exam-criteria');
		}
		
		if (examCriteriaFormValidator.valid()) {
			$.ajax({
				type: $(this).attr("method"),
				url: $(this).attr("action"),
				data: formDatas
			}).done(function (response) {
				if (response.status == true) {
					familiesOptions = [];
					examCriteriaModal.hide();
					examCriteriaForm[0].reset();
					examCriteriaFormValidator.reset();
					getExamCriterias();
				} else if (response.status == false) {
					NioApp.Toast(response.message, "error");
				} else {
					NioApp.Toast("Invalid response status", "warning");
				}
			})
			.fail(function (error) {
				NioApp.Toast("Error Occured", "error");
			})
			.always(function () {
				btnSubmit.attr('disabled', false).html(btnSubmitText);
			});
		} else {
			btnSubmit.attr('disabled', false).html(btnSubmitText);
		}
	});

	// Load exam criteria modal
	function loadExamCriteriaModal(event, type = 'edit') {
		var examCriteriaId = $(event.currentTarget).attr("data-exam-criteria");

		showLoader({
			title: 'Please Wait...',
			text: 'fetching'
		});

		$.ajax({
			url: formApiUrl(`exam-criteria/${examCriteriaId}`),
			type: "get"
		}).done(function (response) {
			if (response.status == true) {
				examCriteriaDetail = response.data;

				// Set examCriteria Info
				examCriteriaForm
					.attr("action", formApiUrl("update-exam-criteria"))
					.attr("method", 'patch');
				examCriteriaForm
					.find('[name="license_name"]')
					.val(response.data.license_name);
				examCriteriaForm
					.find('[name="total_questions"]')
					.val(response.data.total_questions);
				examCriteriaForm
					.find('[name="pass_percentage"]')
					.val(response.data.pass_percentage);
				examCriteriaForm
					.find('[name="duration"]')
					.val(response.data.duration);
				examCriteriaForm
					.find('[type="submit"]')
					.attr('data-exam-criteria', response.data.id)
					.html('Update');
				examCriteriaModalElm.find(".modal-header .modal-title").html("Edit Exam Criteria");
				
				// Show examCriteria modal
				examCriteriaModal.show();

				if((response.data.sub).length > 0) {
					familyOptionsLength = 1;
					familiesOptions = [];
					$('#options--container .family-options--list').html('');
					(response.data.sub).forEach(async (option, oindex) => {
						await loadFamilyOptionView({
							visibility: (type == 'view') ? false : true,
							type: 'exist',
							familyRowId: familyOptionsLength,
							familyRemove: (oindex == 0 || type == 'view') ? false : true,
							familyId: option.family_id,
							familyTotalQuestions: option.total_questions,
							difficultyLevels: (option.questions).length > 0 ? JSON.parse(option.questions) : []
						});
					});

					if (type == 'view') {
						$("#examCriteriaForm .form-field").attr('disabled', true);
						$("#examCriteriaForm .btn--action").hide();
					} else {
						$("#examCriteriaForm .form-field").removeAttr('disabled');
						$("#examCriteriaForm .btn--action").show();
					}
				}

			} else if (response.status == false) {
				NioApp.Toast(response.message, "error");
			} else {
				NioApp.Toast("Invalid response status!", "error");
			}
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
			NioApp.Toast(`${textStatus} <br />${errorThrown}`, "error");
		})
		.always(function () {
			hideLoader();
		});
	}

	// View examCriteria
	$(elmExamCriterias).on("click", ".btn-view-exam-criteria", function (e) {
		e.preventDefault();

		loadExamCriteriaModal(e, 'view');
	});

	// Edit examCriteria
	$(elmExamCriterias).on("click", ".btn-edit-exam-criteria", function (e) {
		e.preventDefault();

		loadExamCriteriaModal(e, 'edit');
	});

	// Delete examCriteria
	$(elmExamCriterias).on("click", ".btn-delete-exam-criteria", function (e) {
		e.preventDefault();

		var examCriteriaId = $(this).attr("data-exam-criteria");
		Swal.fire({
			icon: "question",
			title: "Are you sure to delete exam criteria",
			allowOutsideClick: false,
			allowEscapeKey: false,
			showConfirmButton: true,
			confirmButtonText: "Yes",
			showCancelButton: true,
			cancelButtonText: "No",
			focusCancel: true,
		}).then((result) => {
			if (result.isConfirmed) {
				showLoader({
					title: 'Please Wait...',
					text: 'deleting'
				});
				$.ajax({
					url: formApiUrl("delete-exam-criteria"),
					type: "delete",
					data: {
						id: examCriteriaId,
					},
				}).done(function (response) {
					if (response.status == true) {
						getExamCriterias(); // Load examCriteria details
						NioApp.Toast(response.message, "success");
					} else if (response.status == false) {
						NioApp.Toast(response.message, "error");
					} else {
						NioApp.Toast("Invalid response status!", "warning");
					}
				}).fail(function (jqXHR, textStatus, errorThrown) {
					NioApp.Toast(`${textStatus} <br />${errorThrown}`, "error");
				}).always(function () {
					hideLoader();
				});
			}
		});
	});
});
