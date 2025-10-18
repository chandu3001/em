window.license_id = getUrlParam('id');
window.license_name = sessionStorage.getItem('license_type' + getUrlParam('id'));
window.familiesOptions = [];
window.criteriaLength = 0;
window.sub_license_list = [];
$(function () {

	const elmExamCriterias = $("#exam-criterias-container");
	const elmExamCriteriasPagination = $("#exam-criterias-pagiantion");
	const examCriteriaModalElm = $("#examCriteriaModal");
	const examCriteriaForm = $("#examCriteriaForm");
	var examCriteriaDetail = {};
	getValidSubLicense()


	$('#total-questions, #pass-percentage, #mm, #hh').keypress(function (event) {
		if (event.keyCode === 10 || event.keyCode === 13) {
			event.preventDefault();
			$("#examCriteriaForm").valid();
		}
	});

	function getTotalAvailableQuestion()
    {
        // Total Available Questions count
		var result = true;
        $.ajax({
            type: "get",
            url: api_base_url+"get-total-available-question-count/"+$.cookie('school_id'),
			async: false,
        }).done(({status, total_available_questions, message})=>{
            if(status)
            {
				$("#taq").remove();
                $("#total-questions").attr("max", total_available_questions).parent().parent().append(`<p id='taq' class='m-0' style="font-size: 12px;">Total Available Questions: ${total_available_questions}</p>`)
            }
            else
            {
                NioApp.Toast('No Questions Are Available In The Default Language.', 'error')
				result = false;
            }
        })

		return result;
    }
	// Set license name
	$('#license-name-title').html(license_name);

	// Ajax request setup
	/*$.ajaxSetup({
	headers: {
	'Authorization': `Bearer ${appModule.getToken()}`
	},
	dataType: 'json'
	});*/

	var examCriteriaModal = new bootstrap.Modal(
		document.getElementById("examCriteriaModal"),
		{
			backdrop: "static",
			keyboard: false,
		}
	);

	// add new examCriteria
	$("#btn-add-exam-criteria").click(function () {
		if(!getTotalAvailableQuestion())
		{
			return;
		}
		examCriteriaModalElm.find(".modal-header .modal-title").html("Add Exam Criteria");
		// Update options
		examCriteriaForm
			.attr("action", formApiUrl("add-exam-criteria"))
			.attr("method", 'post');
		examCriteriaForm
			.find('[type="submit"]')
			.removeAttr('data-exam-criteria')
			.html('Add');
		examCriteriaForm.find('.save__button button').html('Save & Next')
		examCriteriaForm.find('[name="license_name"').val(license_name);
		// Update options
		familyOptionsLength = 1;
		familiesOptions = [];
		$('#options--container .family-options--list').html('');
		loadFamilyOptionView({
			familyRowId: familyOptionsLength,
			familyRemove: false
		});

		$("#license-name").val(license_name)
		examCriteriaModal.show();

	});

	// load examCriteria view
	function loadexamCriteriasView(items, pagination = {}) {
		criteriaLength = items.length
		if (items.length > 0) {

			var langCode = localStorage.getItem('language-type');

		if(langCode == 2){
            $('.examcriteria-detail-list div span').text('');
            $('#load-data').html("Data Loading");
            $("#exam-criterias-container,#exam-criterias-pagiantion").hide(); 
            setTimeout(function() {
               setTimeout(function() {     
               $("#exam-criterias-container,#exam-criterias-pagiantion").show();$("#load-data").html(''); 
               },1000);
            },500); 
         }

			languageText(langCode);

			elmExamCriterias.html(`<div class="nk-tb-list nk-tb-ulist list--area examcriteria-detail-list">
	<div class="nk-tb-item nk-tb-head">
		<div class="nk-tb-col tb-col-md"><span class="text-black fw-bold license-type">License Type</span></div>
		<div class="nk-tb-col"><span class="text-black fw-bold sub-name">Sub-License Type</span></div>
		<div class="nk-tb-col tb-col-sm text-center"><span class="text-black fw-bold tot-questions">Total Question</span></div>
		<div class="nk-tb-col tb-col-sm text-center"><span class="text-black fw-bold tot-family">Total Group</span></div>
		<div class="nk-tb-col tb-col-sm text-center"><span class="text-black fw-bold pass-precent">Pass Percentage</span></div>
		<div class="nk-tb-col tb-col-md"><span class="text-black fw-bold action">Action</span></div>
	</div>
</div>`);

			items.forEach((item) => {
				if (parseValue(license_name) == '' && parseValue(item.license_name) != '') {
					license_name = item.license_name;
				}

				elmExamCriterias.find(".list--area").append(`<div class="nk-tb-item details">
	<div class="nk-tb-col tb-col-md"><span>${item.license_name}</span></div>
	<div class="nk-tb-col"><span>${item.sub_license_name}</span></div>
	<div class="nk-tb-col tb-col-sm text-center"><span>${item.total_questions}</span></div>
	<div class="nk-tb-col tb-col-sm text-center"><span>${item.total_family}</span></div>
	<div class="nk-tb-col tb-col-sm text-center"><span>${item.pass_percentage}%</span></div>
	<div class="nk-tb-col nk-tb-col-tools">
		<ul class="">
			<li>
				<div class="drodown">
					<a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em
							class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-end">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" class="btn-view-exam-criteria"
									data-exam-criteria="${item.id}" data-name='${(item.sub_license_name)}'><em class="icon ni ni-eye"></em><span class="exam-criteria").text(data["School Admin"]["Settings"]["Exam Criteria"]);
                $(".view-detail">View
										Details</span></a></li>
							<li><a href="javascript:void(0)" class="btn-edit-exam-criteria"
									data-exam-criteria="${item.id}" data-id='${(item.sub_licence_id)}'><em
										class="icon ni ni-edit"></em><span class="edit">Edit</span></a></li>
							<li><a href="javascript:void(0)" class="btn-delete-exam-criteria"
									data-exam-criteria="${item.id}"><em
										class="icon ni ni-trash"></em><span class="delete">Delete</span></a></li>
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
					event ? event.preventDefault() : '';
					getExamCriterias({
						page: pageNumber,
					});
				},
			});
		} else {
			elmExamCriterias.html(`<div class="nk-tb-item-empty">
				<p class="text-center text-black fw-bold"> No Exam Criterias Available</p>
			</div>`);
			elmExamCriteriasPagination.html('')
		}
	}

	// Get examCriteria list
	window.getExamCriterias = async function (option = {}) {
		let params = {};
		if (parseValue(option.page)) {
			params["page"] = option.page;
		}
		const school_id = await appModule.getCookie('school_id');

		showLoader({
			title: 'Please Wait...',
			// text: 'fetching'
		});

		$.ajax({
			type: "get",
			url: formApiUrl(`exam-criteria-list/${school_id}/${license_id}`, params)
		}).done(function (response) {
			// if (response.data.total > 0) {
			// 	$("#btn-add-exam-criteria").prop("disabled", true).addClass('pe-none');
			// } else {
			// 	$("#btn-add-exam-criteria").prop("disabled", false).removeClass('pe-none');
			// }
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

		$("#options--container .family-option--list .form-select-family-level").each(function (index, elementz) {
			familyValues.push(elementz.value);
		});
		// console.log(familyValues );
		// console.log(familyValues.indexOf(value));
		// Remove first occurance of current value from array
		if (familyValues.indexOf(value) != -1) {
			familyValues.splice(familyValues.indexOf(value), 1);
		}

		return !familyValues.includes(value);
	}, "Group exist");

	$.validator.addMethod("checkduplicate_diff", function (value, element, param) {
		let diffValues = [];

		$(".form-select-diff-level").each(function (index, elementz) {
			diffValues.push(elementz.value);
		});
		// console.log(familyValues );
		// console.log(familyValues.indexOf(value));
		// Remove first occurance of current value from array
		if (diffValues.indexOf(value) != -1) {
			diffValues.splice(diffValues.indexOf(value), 1);
		}

		console.log(diffValues);
		console.log(diffValues.includes(value))
		return !diffValues.includes(value);
	}, "Difficulty Level exist");

	$.validator.addMethod("checkquestions_family", function (value, element, param) {
		let totalQuestions = $('#total-questions').val();
		let sumofQuestions = 0;

		$("#options--container .family-option--list .family-total-questions").each(function (index, element) {
			if (parseValue(element.value) != '') {
				sumofQuestions = parseInt(sumofQuestions) + parseInt(element.value);
			}
		});

		return totalQuestions >= sumofQuestions ? true : false;
	}, "no of questions exceeded");



	$.validator.addMethod("checkquestions_diff", function (value, element, param) {
		let totalQuestions = $('#total-questions').val();
		let sumofQuestions = 0;

		$(".difficulty-total-questions").each(function (index, element) {
			if (parseValue(element.value) != '') {
				sumofQuestions = parseInt(sumofQuestions) + parseInt(element.value);
			}
		});
		return (totalQuestions) >= sumofQuestions ? true : false;
	}, "no of questions exceeded");


	$.validator.addMethod("checkduplicate_dlevel", function (value, element, param) {
		let dlevelValues = [];
		let options = {};

		const params = param.split(';');
		params.forEach((value) => {
			if (parseValue(value) != '') {
				let option = value.split(':');

				options[option[0]] = option[1];
			}
		});

		$("#difficulty-level-options-list" + options.familyRow + " .form-select-difficulty-level").each(function (index,
			elementz) {
			dlevelValues.push(elementz.value);
		});

		// Remove first occurance of current value from array
		if (dlevelValues.indexOf(value) != -1) {
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
			if (parseValue(value) != '') {
				let option = value.split(':');

				options[option[0]] = option[1];
			}
		});

		let totalQuestions = $('#options' + options.familyRow + '-questions').val();
		let sumofQuestions = 0;

		$('#difficulty-level-options-list' + options.familyRow).find('.difficulty-level--list .level - total - questions').each(function (index, element) {
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

		let sumofQuestions = 0;
		let totalQuestions = $('#total-questions').val();

		$("#options--container .family-option--list .family-total-questions").each(function (index, element) {
			if (parseValue(element.value) != '') {
				sumofQuestions = parseInt(sumofQuestions) + parseInt(element.value);
			}
		});
		if (sumofQuestions < totalQuestions) {
			NioApp.Toast("The total number of group questions is below the total number of questions.", "error")
			return true;
		}
		// else
		// {
		// 	let sumofDiffQuestions = 0;

		// 	$(".difficulty-total-questions").each(function (index, element) {
		// 		if (parseValue(element.value) != '') {
		// 			sumofDiffQuestions = parseInt(sumofDiffQuestions) + parseInt(element.value);
		// 		}
		// 	});

		// 	if(sumofDiffQuestions < (totalQuestions))
		// 	{
		// 		NioApp.Toast("The total number of Difficulty Level Questions is below the total number of questions.", "error")
		// 		return true;
		// 	}
		// }

		let btnSubmit = $(this).find('[type="submit"]');

		let btnSubmitText = btnSubmit.html();
		// Changed button attribute after submit
		btnSubmit.attr('disabled', true).html('Loading...');

		var formData = new FormData(examCriteriaForm[0]);
		const license_id = await getUrlParam('id');
		const school_id = await appModule.getCookie('school_id');

		let family_options = [];
		let difficulty_options = [];
		FamilyOptions = document.querySelectorAll('#optionList .family-option--list');
		FamilyOptionsSelect = document.querySelectorAll('#optionList .family-option--list select');
		FamilyOptionsInput = document.querySelectorAll('#optionList .family-option--list input');

		// console.log("FamilyOptions", FamilyOptions);
		FamilyOptions.forEach((ele, inx) => {
			if (FamilyOptionsSelect[inx].value && FamilyOptionsInput[inx].value) {
				family_options.push({
					'family_id': FamilyOptionsSelect[inx].value,
					'total_questions': FamilyOptionsInput[inx].value
				})
			}
		})
		DifficultyOptions = document.querySelectorAll("#formid12 .field_difficulty");
		DifficultyOptionsSelect = document.querySelectorAll("#formid12 .field_difficulty select");
		DifficultyOptionsInput = document.querySelectorAll("#formid12 .field_difficulty input");

		console.log("DifficultyOptions", DifficultyOptions);
		DifficultyOptions.forEach((ele, inx) => {
			if (DifficultyOptionsSelect[inx].value && DifficultyOptionsInput[inx].value) {
				difficulty_options.push({
					'difficulty_id': DifficultyOptionsSelect[inx].value,
					'no_of_questions': DifficultyOptionsInput[inx].value
				})
			}
		})


		let formDatas = {
			'school_id': school_id,
			'licence_id': license_id,
			'sub_licence_id': formData.get('sub_licence_id'),
			'total_questions': formData.get('total_questions'),
			'pass_percentage': formData.get('pass_percentage'),
			'duration': formData.get('hh') + ':' + formData.get('mm'),
			'family_options': family_options,
			'difficulty_options': difficulty_options,
			'no_of_elimentary_questions': formData.get('no_of_elimentary_questions')
		}

		// Append examCriteria id if exist
		if (parseValue($(this).find('[type="submit"]').attr('data-exam-criteria')) != '') {
			formDatas['exam_criteria_id'] = $(this).find('[type="submit"]').attr('data-exam-criteria');
		}

		let exam_criteria_id = '';
		if (btnSubmit.attr("data-exam-criteria")) {
			exam_criteria_id = `&exam_criteria_id=${btnSubmit.attr("data-exam-criteria")}`
		}

		if (examCriteriaFormValidator.valid()) {
			$.ajax({
				type: $(this).attr("method"),
				url: $(this).attr("action"),
				data: formDatas
			}).done(function (response) {
				if (response.status == true) {
					getValidSubLicense();
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
					$("#saved__criteria").removeClass('d-none');
					$("#form__container, #backBtn").addClass('d-none');
					$("div.family-option--list:not(:last), div.field_difficulty:not(:last)").remove();
					$(".form-note, .diff_questions, #available_elimentary_questions").html('')
				});
		} else {
			btnSubmit.attr('disabled', false).html(btnSubmitText);
		}
	});

	// Load exam criteria modal
	function loadExamCriteriaModal(event, type = 'edit') {
		var examCriteriaId = $(event.currentTarget).attr("data-exam-criteria");
		const SublicenseId = $(event.currentTarget).attr("data-id");
		const SublicenseName = $(event.currentTarget).attr("data-name") ? $(event.currentTarget).attr("data-name") : "Sub License Not Available.";

		if(!getTotalAvailableQuestion() && type != 'view')
		{
			return;
		}

		showLoader();

		$.ajax({
			url: formApiUrl(`exam-criteria/${examCriteriaId}`),
			type: "get"
		}).done(function (response) {
			if (response.status == true) {

				examCriteriaDetail = response.data;

				const [hours, minutes] = response.data.duration.split(':');
				hrIs = (hours);
				minIs = (minutes);
				console.log(`${hrIs} is ${minIs} in seconds`);

				// Set examCriteria Info
				examCriteriaForm
					.attr("action", formApiUrl("update-exam-criteria"))
					.attr("method", 'patch');
				examCriteriaForm
					.find('[name="licence_id"]')
					.val(response.data.license_name);
				examCriteriaForm
					.find('[name="total_questions"]')
					.val(response.data.total_questions);
				examCriteriaForm
					.find('[name="pass_percentage"]')
					.val(response.data.pass_percentage);
				examCriteriaForm
					.find('[name="no_of_elimentary_questions"]').attr('max', response.data.total_eliminatory_questions)
					.val(response.data.no_of_elimentary_questions).prop("disabled", type == "edit" ? false : true);
				examCriteriaForm
					.find('[name="sub_licence_id"]')
					.prop("disabled", type == "edit" ? false : true);
				examCriteriaForm
					.find('[name="duration"]')
					.val(response.data.duration);
				examCriteriaForm
					.find('[name="hh"]')
					.val(hrIs);
				examCriteriaForm
					.find('[name="mm"]')
					.val(minIs);
				examCriteriaForm
					.find('[type="submit"]')
					.attr('data-exam-criteria', response.data.id)
					.html('Update');
				type == 'edit' ? examCriteriaForm.find("#available_elimentary_questions").html("Available eliminatory questions " + response.data.total_eliminatory_questions) : ''
				examCriteriaForm
					.find('.save__button button')
					.html(type == "view" ? "Next" : "Save & Next");
				examCriteriaModalElm.find(".modal-header .modal-title").html("Edit Exam Criteria");
				$("#sublicence").html(``)
				if (sub_license_list.length > 0) {
					$("#sublicence").attr('required', true)

				}
				else {
					$("#sublicence").html('<option>Sub license not available</option>').prop('disabled', true)
				}
				if (type == 'edit') {
					getValidSubLicense(SublicenseId);
				}
				else {
					$("#sublicence").html(`<option>${SublicenseName}</option>`)
				}
				// Show examCriteria modal
				examCriteriaModal.show();

				if ((response.data.sub).length > 0) {
					familyOptionsLength = 1;
					familiesOptions = [];
					$('#options--container .family-options--list').html('');
					(response.data.sub).forEach(async (option, oindex) => {
						// await loadFamilyOptionView({
						// visibility: (type == 'view') ? false : true,
						// type: 'exist',
						// familyRowId: familyOptionsLength,
						// familyRemove: (oindex == 0 || type == 'view') ? false : true,
						// families: (option.family_questions).length > 0 ? JSON.parse(option.family_questions) : [],
						// difficultyLevels: (option.difficulty_questions).length > 0 ? JSON.parse(option.difficulty_questions) : []
						// });

						let familiesOption = JSON.parse(option.family_questions)

						$("#optionList").html('');

						familiesOption.forEach((item, inx) => {
							$("#optionList").append(`
							<div id="family-option${inx}" class="bq-note-text p-0 family-option--list form-helper text-end">
								<div class="row family-group align-items-center">
									<div class="col">
										<div class="form-group">
											<div class="form-control-wrap">
												<select ${type == 'edit' ? '' : 'disabled'} class="form-select form-select-family-level form-control" data-family-row="${inx}"
													id="options${inx}-family" name="family_options[${inx}][family_id]" required=""
													data-msg-required="Required" data-rule-checkduplicate_family="true"
													data-msg-checkduplicate_family="Group exist" data-placeholder="Select Group" aria-describedby="options${inx}-family-error"
													aria-invalid="true">
													<option value=""></option>
													${families.map(fam => {
														return `<option ${fam.id == item.family_id ? 'selected' : ''} value="${fam.id}">${fam.family_name}</option>`
													})}
												</select>
												${type == "edit" ?
																`<span id="options${inx}-family-error" class="invalid">Required</span>`
																:
																''
												}
											</div>
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<div class="form-control-wrap">
												<div class="d-flex align-items-center">
													<input required="required" ${type == 'edit' ? '' : 'disabled'} type="number" min="1" max="${item.total_available_questions}" 
													class="form-control shadow-none w-75 rounded-0 rounded-start family-total-questions invalid nos" 
													id="options${inx}-questions" value="${item.total_questions}" name="family_options[${inx}][total_questions]" 
													placeholder="No of Question" data-msg-required="Required" data-rule-digits="true" data-msg-digits="Must be numeric" 
													data-rule-checkquestions_family="true" data-msg-checkquestions_family="no of questions exceeded" 
													aria-describedby="options${inx}-questions-error" aria-invalid="false">
													<div class="btn-light btn rounded-0 w-25 p-1 border-2 border-start-0 rounded-end"><span>Nos</span></div>
													${type == "edit" ? `<span id="options${inx}-questions-error" class="invalid">Required</span>`:''}
												</div>
											</div>
										</div>
									</div>
									<div class="col-3 ${inx == 0 ? 'actionBtnsDefault' : 'd-flex actionBtns'}" ${inx > 0 ? 'style="gap:1em"' : ''}>
										${(type == 'edit' && inx == 0)
									?
									familiesOption.length == 1 ? `<div class="">
											<a href="javascript:void(0)" data-family-option="add" class="btn btn-primary btn--action"><em class="icon ni ni-plus text-white pe-auto" style="font-size: 10px;"></em></a>
											</div>`: ''
									: (type == 'edit' && inx > 0)
										?
										`
											<div class="">
												<a href="javascript:void(0)" data-family-option="edit" class="btn btn--action btn-danger" onclick="closeFamily(this)"><em class="icon ni ni-minus text-white pe-auto" style="font-size: 10px;"></em></a>
											</div>
											${inx == familiesOption.length-1 ? `<div class="">
											<a href="javascript:void(0)" data-family-option="add" class="btn btn-primary btn--action"><em class="icon ni ni-plus text-white pe-auto" style="font-size: 10px;"></em></a>
										</div>` : '' }
											`
										:
										''
								}
									</div>
									${type == 'edit' ? 
									`<div class="col-12 align-start">
										<span class="form-note">Total No of Question Available in the group ${item.total_available_questions}</span>
									</div>` : ''}
								</div>


							</div>
							`)
						})

						let diffOption = JSON.parse(option.difficulty_questions)

						$("#formid12").html('');

						diffOption.forEach((diff, inx) => {
							$("#formid12").append(`
						<div class="field_difficulty">
						<div class="row align-items-center">
							<div class="col position-relative">
								<select ${type == 'edit' ? '' : 'disabled'} name="difficulty_options[${inx}][difficulty_id]" class="form-select form-select-diff-level form-control" data-placeholder="Select Difficulty Level" onchange="getdiffAvailableQuestionCount(this)" id="difficulty-level-options-list${inx}">
								<option value=""></option>
								
								${difficulty_levels.map(item => {
								return `<option ${diff.difficulty_id == item.id ? 'selected' : ''} value="${item.id}">${item.level}</option>`
							})}
								</select>
							</div>
							<div class="col position-relative">
								<div class="d-flex align-items-center">
									<input ${type == 'edit' ? '' : 'disabled'} type="number" min='1' max="${diff.total_available_questions}" value="${diff.no_of_questions}" name="difficulty_options[${inx}][no_of_questions]"
									placeholder="No of Questions" required id="diff${inx}-questions" 
									class="form-control mb-0 shadow-none w-75 rounded-0 rounded-start difficulty-total-questions nos"
									data-msg-required="Required" data-rule-digits="true"
									data-msg-digits="Must be numeric"
									data-rule-checkquestions_diff="true"
									data-msg-checkquestions_diff="no of questions exceeded"
									aria-describedby="diff${inx}-questions-error"-questions-error">
									<div class="btn-light btn rounded-0 w-25 p-1 border-2 border-start-0 rounded-end"><span>Nos</span></div>
								</div>
							</div>
							<div class="col-3  ${inx == 0 ? 'actionDiffBtnsDefault' : 'd-flex align-items-start actionDiffBtns'}" ${inx > 0 ? 'style="gap:1em"' : ''}>
							${(type == 'edit' && inx == 0)
									?
									diffOption.length == 1 ? `<button type="button" data-diff-option="add" class="btn btn-primary" onclick="addField(this,'formid12')">
									<em class="icon ni ni-plus text-white pe-auto" style="font-size: 10px;"></em>
								</button>`: ''
									: (type == 'edit' && inx > 0)
										?
										`
								<button type="button" data-diff-option="add" class="btn btn-danger" onclick="removeField(this.parentElement.parentElement.parentElement)">
									<em class="icon ni ni-minus text-white pe-auto" style="font-size: 10px;"></em>
								</button>
								<button type="button" data-diff-option="edit" class="btn btn-primary" onclick="addField(this,'formid12')">
									<em class="icon ni ni-plus text-white pe-auto" style="font-size: 10px;"></em>
								</button>
								`
										:
										''
								}
							</div>
						</div>
						${type == 'edit' ? `<p class="diff_questions">No of Questions ${diff.total_available_questions}</p>` :''}
					</div>
						`)
						})



					});

					if (type == 'view') {
						$("#examCriteriaForm .duration-exam").attr('disabled', true);
						$("#examCriteriaForm .form-field").attr('disabled', true);
						$("#examCriteriaForm .btn--action").hide();
					} else {
						$("#examCriteriaForm .form-field").removeAttr('disabled');
						$("#examCriteriaForm .duration-exam").removeAttr('disabled');

						$("#examCriteriaForm .btn--action").show();
					}
				}
				$("#saved__criteria").removeClass('d-none');
				$("#form__container, #backBtn").addClass('d-none');
				
				$('select').select2({
					placeholder: $(this).attr('data-placeholder'),
					minimumResultsForSearch: -1
				});
				getdifficultyLevels();


			} else if (response.status == false) {
				NioApp.Toast(response.message, "error");
			} else {
				NioApp.Toast("Invalid response status!", "error");
			}
		}).fail(function (jqXHR, textStatus, errorThrown) {
			NioApp.Toast(`${textStatus} <br />${errorThrown}`, "error");
		}).always(function () {
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
		$('.save__button').removeClass('d-none')
		loadExamCriteriaModal(e, 'edit');

	});

	// Delete examCriteria
	$(elmExamCriterias).on("click", ".btn-delete-exam-criteria", function (e) {
		e.preventDefault();

		var examCriteriaId = $(this).attr("data-exam-criteria");
		Swal.fire({
			icon: "warning",
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
					// text: 'deleting'
				});
				$.ajax({
					url: formApiUrl("delete-exam-criteria"),
					type: "delete",
					data: {
						id: examCriteriaId,
					},
				}).done(function (response) {
					if (response.status == true) {
						getValidSubLicense();
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

	$(".duration-exam").on('input', function () {
		if (isNaN(this.value)) {
			this.value = ''
		}
	})

	$("#mm").on('input', function () {
		if ($(this).val() > 59) {
			NioApp.Toast("Minutes should be less than 59.", "warning")
			$(this).val('')
		}
	})

	$("#mm").on('change', function () {
		if ($(this).val() <= 00 && $("#hh").val() <= 00) {
			NioApp.Toast("Minutes should be greater than 00.", "warning")
			$(this).val('')
		}
	})

	$("#hh, #mm").on('input', function () {
		const hh = $("#hh").val();
		const mm = $("#mm").val();
		if (hh.length < 2 || mm.length < 2) {
			$(".duration-error").removeClass('d-none')
		}
		else {
			$(".duration-error").addClass('d-none')
		}
	})

});