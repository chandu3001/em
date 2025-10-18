
$(function() {

	const elmExamination = $("#examination");
	const elmExaminationPagination = $("#examination-pagination");
	const examinationModalElm = $("#examinationModal");
	const examinationForm = $("#examinationForm");
	var examinationDetail = {};
	var page = 1;

	// Ajax request setup
	$.ajaxSetup({
		headers: {
			'Authorization': `Bearer ${appModule.getToken()}`
		},
		dataType: 'json'
	});

	var examinationModal = new bootstrap.Modal(
		document.getElementById("examinationModal"),
		{
			backdrop: "static",
			keyboard: false,
		}
	);
	
	var langCode = localStorage.getItem('language-type');
    languageText(langCode);
    console.log('la'+langCode)
	// load examination view
	function loadexaminationView(items, pagination = {}) {
		//deleteOpt = '';
 		if(langCode == 2){
        
        $('.exam-detail-list div span').text('');
        $('#load-data').html("Data Loading");
        $("#examination,#examination-pagination").hide(); 

         setTimeout(function() {
            setTimeout(function() {     
            $("#examination,#examination-pagination").show();$("#load-data").html(''); 
            },1000);
         },500); 
      }
		 languageText(langCode);
		$('#exam-count-text').html(`Total ${pagination.total} Exam${pagination.total > 1 ? 's' : ''}`);
		if (items.length > 0) {
			elmExamination.html(`<div class="list-area nk-tb-list nk-tb-ulist exam-detail-list">
                     <div class="nk-tb-item nk-tb-head text-center">
                        <div class="nk-tb-col"><span class="text-black fw-bold slno">Sl.No</span></div>
                        <div class="nk-tb-col"><span class="text-black fw-bold exam-title">Exam Name</span></div>
                        <div class="nk-tb-col"><span class="text-black fw-bold license-type">License Type</span></div>
                        <div class="nk-tb-col"><span class="text-black fw-bold sub-name">Sub License Type</span></div>
                        <div class="nk-tb-col"><span class="text-black fw-bold tot-stud">Registered Students</span></div>
                        <div class="nk-tb-col"><span class="text-black fw-bold active-stud">Attended Students</span></div>
                        <div class="nk-tb-col"><span class="text-black fw-bold pass">Pass</span></div>
                        <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold status-label">Status</span></div>
                        <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold action">Action</span></div>
                     </div>
                  </div>`);

			items.forEach((item) => {

				/*if(item.deleted_status == 0){
					deleteOpt = `<li><a class="btn-delete-exam" data-exam="${item.id}"><em class="icon ni ni-trash"></em><span class="delete">Delete</span></a></li>`
				}*/
				$("#examination .list-area")
					.append(`<div class="nk-tb-item details" data-href="<?php echo base_url('admin/schools/details');?>">    
						<div class="nk-tb-col text-center ">
                           <span class="tb-lead">${pagination.from++}</span>
                        </div> 
                        <div class="nk-tb-col text-center ">
                           <span class="tb-lead">${item.exam_name}</span>
                        </div> 
                        <div class="nk-tb-col text-center">
                           <span class="tb-lead">${item.license_name}</span>
                        </div> 
                        <div class="nk-tb-col text-center">
                           <span class="tb-lead">${item.sub_license_name}</span>
                        </div> 
                        <div class="nk-tb-col text-center">
                           <span class="tb-lead"  style="text-align:center !important;"  id="title_exam_center">${item.total_students}</span>
                        </div> 
                        <div class="nk-tb-col text-center">
                           <span class="tb-lead"  style="text-align:center !important;"  id="title_exam_center">${item.total_attended_students}</span>
                        </div>  
                         <div class="nk-tb-col text-center">
                           <span class="tb-lead">${item.pass_percentage}%</span>
                        </div>                                        
                        <div class="nk-tb-col tb-col-md text-center">
                           <button ${item.deleted_status ? 'disabled' : ''} class="btn btn-dim ${item.status ? "btn-outline-success" : "btn-outline-danger"} btn-sm btn-status-change" 
						   data-examination="${item.id}" data-bs-toggle="tooltip" data-bs-placement="top" ${item.status == 1 ?  "title='Exam is Activated'" : "title='Exam is Deactivated'"} data-status="${item.status}" >${item.status == 1 ? "<span class='active-btn'>Active</span>" : "<span class='inactive-btn'>Inactive</span>"}</button>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools text-center">
                           <ul class="">
                              <li>
                                 <div class="drodown">
                                    <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                       <ul class="link-list-opt no-bdr">
									   		<li><a href="${formUrl('school/examination/view?id='+item.id)}"><em class="icon ni ni-eye"></em><span class="view-results">View Results</span></a></li>
											${item.deleted_status ? '' : `
									   		<li><a href="${formUrl('school/examination/relevant_questions?id='+item.id)}"><em class="icon ni ni-eye"></em><span class="possible-que">Possible Questions</span></a></li>
											<li><a href="#" class="btn-edit-examination" data-examination="${item.id}"><em class="icon ni ni-edit"></em><span class="edit">Edit</span></a></li>`}
											
                                      
												
                                       </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                    </div>`);
			});
			elmExaminationPagination.pagination({
				items: parseInt(pagination.total),
				itemsOnPage: parseInt(pagination.per_page),
				currentPage: pagination.current_page,
				displayedPages: 3,
				navStyle: "pagination justify-content-center justify-content-md-start",
				listStyle: "page-item",
				linkStyle: "page-link",
				onPageClick: function (pageNumber, event) {
					event ? event.preventDefault() : '';
					page = pageNumber;
					getExamination(page);
				},
			});
		} else {
			elmExamination.html(`<div class="nk-tb-item-empty">
                     <p class="text-center text-black fw-bold"> No examination Available</p>
                  </div>`);
			elmExaminationPagination.html('')
		}
	}

	

	function getLicenseList(target, options)
	{

		$.ajax({
			type: "get",
			url: `https://dsms.technoiq.in/backend/api/auth/all_main_license/${$.cookie('school_id')}`
		}).done(({errors, data}) =>{
			if(!errors)
			{
				//$(target).html(`<option value="">Select</option>`)
				data.result.forEach(item =>{
					 $(target).append(`<option ${(item.id == options) && 'selected'} value='${item.id}'>

                                ${item.name}

                            </option>`);
				})
			}
			else
			{
				NioApp.Toast("Error Occurred", "error");
			}
		})
	}

	
	getLicenseList();

	// Get examination list
	var page = getUrlParam('page') ? getUrlParam('page') : 1;

    var filters = '';
    var pageSize = 10;
    var query = '';
	var sortby = 0;
	window.getExamination = async function(pageNumber = page, option = {}) {
		let params = '';
        page = pageNumber;
        urlPage(page)
        sortby = option.sortBy ? option.sortBy : sortby;
        pageSize = option.pageSize ? option.pageSize : pageSize;
        filters = option.filter ? option.filter : filters;
        query = option.q ? option.q : query

        params +=`page=${page}&sortby=${sortby}&pageSize=${pageSize}&${filters}&${query}`
			$('.dropdown-menu').removeClass('show');
         $('.filter-wg').removeClass('show');
         $('.dropdown-toggle').removeClass('show');
		const school_id = await appModule.getCookie('school_id');
		 var langCode = localStorage.getItem('language-type');
       languageText(langCode);
		/*showLoader({
			title: 'Please Wait...',
			// text: 'fetching'
		});*/
		$.ajax({
			type: "get",
			url: formApiUrl(`examination/${school_id}/list`),
			data: params
		}).done(function (response) {
			if (response.status == true) {

				if(response.mock_exam_status)
				{
					$("#mockExamStatus").html('<button onclick="mockExamChnageStatus()" class="btn btn-primary mock-active">Mock Exam Activated</button>')
				}
				else
				{
					$("#mockExamStatus").html('<button onclick="mockExamChnageStatus()" class="btn btn-danger mock-inactive">Mock Exam Deactivated</button>')
					
				}

				loadexaminationView(response.data?.data, {
					current_page: response.data.current_page,
					per_page: response.data.per_page,
					total: response.data.total,
					from: response.data.from,

				});
			} else if (response.status == false) {
				NioApp.Toast("Error Occured", "error");
			} else {
				NioApp.Toast("Invalid response status", "warning");
			}
		}).fail(function (error) {
			NioApp.Toast("Error Occured", "error");
		}).always(function () {
			//hideLoader();
		});
	}

	//  const getSubLicenseList = (target = false,options = {}) => {
    //        let response;

    //        const option = Object.assign({}, {

    //         license_type_id: $('#licence').val(),

    //         selected: 0

    //     }, options);
		
    //        // Reset element content
    //        $(target).html('').append('<option value="">Select</option>');
           
    //        $.ajax({
    //           type: "get",
    //           async: false,
    //           global: false,
    //           url: `${api_base_url}get-sublicense-by-license-id/${option.license_type_id}`,
              
    //           success: function ({ data, errors }) {
    //              if (!errors) {
    //                     $(target).html(`<option value="">Select Sub License</option>`).prop('disabled', false);

    //                    if(target) {

    //                    		 data.forEach(item => {
	// 			               $(target).append(`<option ${(item.id == option.selected) && 'selected'} value='${item.id}'>${item.name}</option>`)

	// 			            })

                          
    //                    } else {
    //                       response = data.result;
    //                    }
    //              } else
    //              {
    //                 //NioApp.Toast("Sub License is not available.", "error")
    //                 $(target).html(`<option value="">Sub License Not Available!</option>`).prop('disabled', true);
                    
    //              }
    //           }
    //        });
    //         return response;
    // }

	$('#btn-refresh-examination').click(function(e) {
        e.preventDefault();
        filters = '';
        query = '';
        getExamination();
    });
    
    $('#form_clear').click(function(e) {
    $('#stat').select2('val','0');
      $('#license_filter').select2('val','0');
      $('#sub_licence_filter').select2('val','0');
       $('#filter-form')[0].reset();
 		filters = '';
      getExamination(1,{clear : true});
    });

	$("#sort_by").on("change", function(){
		getExamination(page, {
		   sortBy: $(this).val()
		})
	 })
	 $("#searchExam").on("submit", function(e){
		e.preventDefault();
		getExamination(page = 1, {
		   q: $(this).serialize()
		})
	 })
	 $("#filter-form").on("submit", function(e){
        e.preventDefault();
        getExamination(1,{filter: $(this).serialize()})
    })

	$("#search-reset").click(function()
	{
		$('#sort_by').select2('val','0');
		query = "";
		getExamination();
	})
	

	// Validate examination Form
	NioApp.Validate("#examinationForm", {
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

	// add new examination
	$("#btn-add-examination").click(function () {
		languageText(langCode);

		examinationModalElm.find(".modal-header .modal-title").html("Add Examination");
		examinationForm
			.attr("action", formApiUrl("add-examination"))
			.attr("method", 'post');
		examinationForm
			.find('[type="submit"]')
			.removeAttr('data-examination')
			.html('Add')
			.addClass('add');
		examinationModal.show();
		getLicenseList("#licence");
		$("#sub_licence").select2('val'," ")

	});

	$('#btn-refresh-examination').click(function(e) {
		e.preventDefault();
		getExamination();
	});

	// examination Form reset on Modal close
	$('[data-bs-dismiss="modal"]').on("click", function () {
		examinationModalElm.find(".modal-header .modal-title").html("examination");
		examinationForm
			.removeAttr("action")
			.removeAttr("method");
		examinationForm[0].reset();
		examinationFormValidator.resetForm();
	});

	// examination Form submit
	$("#examinationForm").on("submit", async function (e) {
		e.preventDefault();
		let btnSubmit = $(this).find('[type="submit"]');

		let btnSubmitText = btnSubmit.html();
		// Changed button attribute after submit
		btnSubmit.attr('disabled', true).html('Loading...');

		//
		var formData = new FormData(examinationForm[0]);
		const school_id = await appModule.getCookie('school_id');

		let formDatas = {
			exam_name: formData.get('exam_name'),
			licence_id: formData.get('licence_id'),
			sub_license_id: formData.get("sub_license_id"),
			school_id: school_id,

		}
		
		// Append examination id if exist
		if(parseValue($(this).find('[type="submit"]').attr('data-examination')) != '') {
			formDatas['id'] = $(this).find('[type="submit"]').attr('data-examination');
		}
		

		if (examinationFormValidator.valid()) { 
			$.ajax({
				  type: $(this).attr("method"),
               url: $(this).attr("action"),
               data: formDatas,
				 
			}).done((res) => {
				
               getExamination();
					examinationModal.hide();
               NioApp.Toast(res.message, "success");
			   btnSubmit.attr('disabled', false)
			   $(this)[0].reset();
			   $('select').select2('val', " ")
            }).fail(({status, responseJSON}) => {
				if(status == 422)
				{
					responseJSON.message.exam_name.forEach(error =>{
						NioApp.Toast(error, "error");
					})
				}
				else
				{
					NioApp.Toast("Error Occured", "error");
				}
				btnSubmit.attr('disabled', false).html('Add');

            }).always(() => {
				btnSubmit.attr('disabled', false).html('Add');
				hideLoader();

			});

			/*.done(function (response) {
				console.log('response IS'+response);
				if (response.status == true) {
					$("#examination").html("");
					getExamination();
					examinationModal.hide();
					examinationForm[0].reset();
					examinationFormValidator.reset();
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
			});*/
		} else {
			btnSubmit.attr('disabled', false).html(btnSubmitText);
		}
	});

	// Change/Update examination status
	$(elmExamination).on("click", ".btn-status-change", function (e) {
		e.preventDefault();

		var examination_id = $(this).attr("data-examination");
		var examination_status = $(this).attr("data-status");

		Swal.fire({
			icon: "warning",
			title: "Are you sure you want to "+ (examination_status == 1 ? "Inactive" : "Active"),
			// text: "Are you sure you want to "+ (examination_status == 1 ? "Inactive" : "Active"),
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
					// text: 'updaing'
				});
				$.ajax({
					url: formApiUrl("update-examination-status/"),
					type: "patch",
					data: {
						id: examination_id,
						status: examination_status == 1 ? 0 : 1,
					}
				})
				.done(function (response) {
					if (response.status == true) {
						NioApp.Toast(response.message, "success");
						getExamination();
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
		});
	});
	// Edit examination
	$(elmExamination).on("click", ".btn-edit-examination", function (e) {
		e.preventDefault();

		var examination_id = $(this).attr("data-examination");

		showLoader({
			title: 'Please Wait...',
			// text: 'fetching'
		});

		$.ajax({
			url: formApiUrl(`examination/${examination_id}`),
			type: "get"
		}).done(function (response) {
			if (response.status == true) {
				examinationDetail = response.data;
      		languageText(langCode);

				// Set examination Info
				examinationForm
					.attr("action", formApiUrl("update-examination"))
					.attr("method", 'patch');
				examinationForm
					.find("[name='exam_name']")
					.val(examinationDetail.exam_name);
				examinationForm
					.find("[type='submit']")
					.attr('data-examination', response.data.id)
					.html('Update')
					.addClass('update');
					//.removeClass('add-exam');
				examinationModalElm.find(".modal-header .modal-title").html("Edit Examination").addClass('edit-exam')
					.removeClass('add-exam');
				getLicenseList("#licence",examinationDetail.licence_id);
				
                getSubLicenseList('#sub_licence', examinationDetail.licence_id, examinationDetail.sub_license_id);
                // getSubLicenseList('#sub_licence', {
                    
                //     "license_type_id": examinationDetail.licence_id,

                //     "sub_license_type_id": examinationDetail.sub_license_id,

                //     "selected": examinationDetail.sub_license_id

                // });

               
				// Show examination modal
				examinationModal.show();
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
	});

	 $(elmExamination).on('click', '.btn-delete-exam', function(e) {

        var id = $(this).attr("data-exam");

        Swal.fire({

            title: "Are you sure to delete?",

            text: "You won't be able to revert this!",

            icon: "warning",

            showCancelButton: true,

            confirmButtonColor: "#3085d6",

            cancelButtonColor: "#d33",

            confirmButtonText: "Yes",

            cancelButtonText: "No",

            focusCancel: true,

        }).then((result) => {

            if (result.isConfirmed) {

                showLoader({
                    title: 'Please Wait',
                    // text: 'Deleting Data'
                });

                $.ajax({

                    type: "delete",
                    url: formApiUrl("delete-examination"),
                    data: {
                        id: id,
                    }

                }).done(({ data, errors }) => {

                    if (!errors) {

                        if(parseValue($("#examination .nk-tb-item.details").length) == 1 && page != 1) {
                            --page;
                        }

                        NioApp.Toast('Examination deleted successfully', "success");

                        getExamination();

                    } else {
                        NioApp.Toast("Something went wrong", "error");
                    }

                }).fail(({ statusText }) => {

                    NioApp.Toast(statusText, "error");

                }).always(function() {

                    hideLoader();
                });
            }

        });

    });

    $('select').on('change', function() {

          selectedLicense = $('select[name="licence_id"]').find(":selected").val()
         
         if(selectedLicense != ''){
           $('#licence-error').hide();
         }

      });

});
