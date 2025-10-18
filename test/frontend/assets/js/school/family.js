
$(function() {

	const eleFamilies = $("#families");
	const eleFamiliesPagination = $("#families-pagination");
	const familyModalElm = $("#familyModal");
	const familyForm = $("#familyForm");
	var familyDetail = {};
	var page = 1;

	var langCode = localStorage.getItem('language-type');
      
	// Ajax request setup
	$.ajaxSetup({
		headers: {
			'Authorization': `Bearer ${appModule.getToken()}`
		},
		dataType: 'json'
	});

	var familyModal = new bootstrap.Modal(
		document.getElementById("familyModal"),
		{
			backdrop: "static",
			keyboard: false,
		}
	);
	
	// add new family
	$("#btn-add-family").click(function () {  
	 languageText(langCode);
		familyModalElm.find(".modal-header .modal-title").html("Add Group");
		familyForm
			.attr("action", formApiUrl("add-family"))
			.attr("method", 'post');
		familyForm
			.find('[type="submit"]')
			.removeAttr('data-family')
			.html('Add')
			.addClass('add')
			.removeClass('update');
		familyModal.show();
	});

	// load family view
	function loadFamiliesView(items, pagination = {}) {
		console.log(pagination);

		  if(langCode == 2){
		  		// $('#load-data').html("Data Loading");
            $('.family-detail-list div span').text('');
            $("#families,#families-pagination").hide(); 
            // setTimeout(function() {
               setTimeout(function() {     
               $("#families,#families-pagination").show();$("#load-data").html(''); 
               },1000);
            // },500); 
         }

		action_data = '';
		$("#total_families").text(`Total ${(pagination.total)} Groups`)
		if (items.length > 0) {
			
         languageText(langCode);

			eleFamilies.html(`<div class="list-area nk-tb-list nk-tb-ulist family-detail-list">
                     <div class="nk-tb-item nk-tb-head text-center">
					 	<div class="nk-tb-col"><span class="text-black fw-bold slno"> Sl.No</span></div>
                        <div class="nk-tb-col"><span class="text-black fw-bold names"> Name</span></div>
                        <div class="nk-tb-col tb-col-md "><span class="text-black fw-bold status-label">Status</span></div>
                        <div class="nk-tb-col tb-col-md "><span class="text-black fw-bold action">Action</span></div>
                     </div>
                  </div>`);
			
			eleFamiliesPagination.html('');

			items.forEach((item) => {

				if(item.default_family == 0){
					action_data = ` 
                              <li>
                                 <div class="drodown">
                                    <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                       <ul class="link-list-opt no-bdr">
                                          <li><a href="#" class="btn-edit-family" data-family="${item.id}"><em class="icon ni ni-edit"></em><span class="edit">Edit</span></a></li>
                                          <li><a href="#" class="btn-delete-family" data-family="${item.id}"><em class="icon ni ni-trash"></em><span class="delete">Delete</span></a></li>
                                       </ul>
                                    </div>
                                 </div>
                              </li>
                           `;

               status_data = `<div class="nk-tb-col tb-col-md text-center">
                           <label class="btn ${item.status? "btn-success" : "btn-dim btn-danger"} btn-sm btn-status-change" 
						   data-family="${item.id}" data-status="${item.status}" >${item.status == 1 ? "<span class='active-btn'>Active</span>" : "<span class='inactive-btn'>Inactive</span>"}</label>
                        </div>`;

				}else{
					action_data = status_data ='';
				}

				$("#families .list-area")
					.append(`<div class="nk-tb-item details text-center" data-href="<?php echo base_url('admin/schools/details');?>">   
						<div class="nk-tb-col">
                              <div class="user-info text-center"><span class="tb-lead">${pagination.from++}</span></div>
                        </div> 
                        <div class="nk-tb-col w-30">
                        
                              <div class="user-info text-center"><span class="tb-lead text-center">${item.family_name}</span></div>
                        
                        </div>                                        
                        ${status_data}
                        <div class="nk-tb-col nk-tb-col-tools text-center">
                           <ul class="">
                              ${action_data}
                           </ul>
                        </div>
                    </div>`);
			});

			eleFamiliesPagination.pagination({
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
					getFamilies(pageNumber);
				}
			});
		} else {
			eleFamilies.html(`<div class="nk-tb-item-empty">
                     <p class="text-center text-black fw-bold"> No Groups Available</p>
                  </div>`);
			eleFamiliesPagination.html('');
		}
	}

	// Get family list
	var page = 1;

    var filters = '';

    var pageSize = 10;

    var query = '';
	var sortBy = 0;

	// Get family list
	window.getFamilies = function(pageNumber = page,option = {}) {
		  let params = '';

        page = pageNumber;

        var sortby = option.sortBy ? option.sortBy : sortBy;

        pageSize = option.pageSize ? option.pageSize : pageSize;

        query = option.q ? option.q : query
        
        filters = option.filter ? option.filter : filters;

        params +=`page=${page}&sortby=${sortby}&page_size=${pageSize}&${filters}&${query}`

      $('.dropdown-menu').removeClass('show');

		if (parseValue(option.page)) {
			//params["page"] = option.page;
		}
		$.ajax({
			type: "get",
			url: formApiUrl(`family/${$.cookie('school_id')}/list-with-pagination?${params}`),
			beforeSend: function () {
				/*showLoader({
					title: 'Please Wait...',
					// text: 'fetching'
				});*/
			},
		}).done(function (response) {
			if (response.status == true) {
				loadFamiliesView(response.data?.data, {
					current_page: response.data.current_page,
					per_page: response.data.per_page,
					total: response.data.total,
					from: response.data.from
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
	getFamilies();

 		$(".page_size").click(function (e) {
         e.preventDefault();
         getFamilies(1, {
            pagesize: $(this).val()
         })
      })

     $("#sort-by").on("change", function(e){
        getFamilies(page,{sortBy: e.currentTarget.value})
    	})

     $("#radio1").on("change", function(e){
        getFamilies(1,{pageSize:10})
    	})
 	 $("#radio2").on("change", function(e){
        getFamilies(1,{pageSize:20})
    	})
  	$("#radio3").on("change", function(e){
        getFamilies(1,{pageSize:50})
    	})


	    $("#filter-form").on("submit", function(e){
	        e.preventDefault();
	        getFamilies(1,{filter: $(this).serialize()})
	    });

    	$("#searchForm").on("submit", function(e){
        e.preventDefault();
        getFamilies(1,{q: $(this).serialize()})
    	});

		$("#reset-search").click(function(){
			query = "";
			getFamilies();
		});
    	
    	$('#clear-filter').click(function(e) {
        e.preventDefault();
        $('#status').select2('val','null');
        filters = '';
        getFamilies(1);
    });


	// Validate Family Form
	NioApp.Validate("#familyForm", {
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

	// Family Form reset on Modal close
	$('[data-bs-dismiss="modal"]').on("click", function () {
		familyModalElm.find(".modal-header .modal-title").html("Group");
		familyForm
			.removeAttr("action")
			.removeAttr("method");
		familyForm[0].reset();
		familyFormValidator.resetForm();
	});

	// Family Form submit
	familyForm.on("submit", async function (e) {
		e.preventDefault();
		let btnSubmit = $(this).find('[type="submit"]');

		let btnSubmitText = btnSubmit.html();
		// Changed button attribute after submit
		btnSubmit.attr('disabled', true).html('Loading...');

		//
		var formData = new FormData(familyForm[0]);
		const school_id = await appModule.getCookie('school_id');

		let formDatas = {
			school_id: school_id,
			family_name: formData.get('family_name')
		}
		
		// Append family id if exist
		if(parseValue($(this).find('[type="submit"]').attr('data-family')) != '') {
			formDatas['id'] = $(this).find('[type="submit"]').attr('data-family');
		}
		

		if (familyFormValidator.valid()) {
			$.ajax({
				type: $(this).attr("method"),
				url: $(this).attr("action"),
				data: formDatas,
			}).done(function (response) {
				if (response.status == true) {
					$("#families").html("");
					getFamilies();
					familyModal.hide();
					familyForm[0].reset();
					familyFormValidator.reset();
					NioApp.Toast(response.message, "success");
				} else if (response.status == false) {
					NioApp.Toast(response.message, "error");
				} else {
					NioApp.Toast("Invalid response status", "warning");
				}
			})
			.fail(function ({status, responseJSON}) {
				if(status == 422)
				{
					responseJSON.message.family_name.forEach(error =>{
						NioApp.Toast(error, "error");
					})
				}
				else
				{
					NioApp.Toast("Error Occured", "error");
				}
			})
			.always(function () {
				btnSubmit.attr('disabled', false).html(btnSubmitText);
			});
		}
	});

	// Change/Update family status
	$(eleFamilies).on("click", ".btn-status-change", function (e) {
		e.preventDefault();

		var family_id = $(this).attr("data-family");
		var family_status = $(this).attr("data-status");

		Swal.fire({
			icon: "warning",
			title: "Are you sure to change status?",
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
					title: 'Please Wait..',
					// text: 'updating'
				});

				$.ajax({
					url: formApiUrl("update-family-status/"),
					type: "patch",
					data: {
						id: family_id,
						status: family_status == 1 ? 0 : 1,
					}
				})
				.done(function (response) {
					if (response.status == true) {
						getFamilies();
						NioApp.Toast(response.message, "success");
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
	// Edit family
	$(eleFamilies).on("click", ".btn-edit-family", function (e) {
		e.preventDefault();
		languageText(langCode);
		var family_id = $(this).attr("data-family");

		showLoader({
            title: 'Please Wait...',
            // text: 'fetching'
        });

		$.ajax({
			url: formApiUrl(`family/${family_id}`),
			type: "get",
		}).done(function (response) {
			if (response.status == true) {
				familyDetail = response.data;

				// Set family Info
				familyForm
					.attr("action", formApiUrl("update-family"))
					.attr("method", 'patch');
				familyForm
					.find('[name="family_name"]')
					.val(response.data.family_name);
				familyForm
					.find('[type="submit"]')
					.attr('data-family', response.data.id)
					.html('Update')
					.removeClass('add')
					.addClass('update');
				languageText(langCode);
				familyModalElm.find(".modal-header .modal-title").html("Edit Group")
				.removeClass('family')
				.addClass('family-edit');

				// Show family modal
				familyModal.show();
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

	// Delete family
	$(eleFamilies).on("click", ".btn-delete-family", function (e) {
		e.preventDefault();

		var family_id = $(this).attr("data-family");
		Swal.fire({
			icon: "warning",
			title: "Are you sure to delete?",
			allowOutsideClick: false,
			allowEscapeKey: false,
			showConfirmButton: true,
			confirmButtonText: "Yes",
			showCancelButton: true,
			cancelButtonText: "No",
			focusCancel: true,
		}).then((result) => {
			if (result.isConfirmed) {
				
				if(parseValue($("#families .list-area .nk-tb-item.details").length) == 1 && page != 1) {
					--page;
				}
				
				showLoader({
					title: 'Please Wait...',
					// text: 'deleting'
				});
				$.ajax({
					url: formApiUrl("delete-family"),
					type: "delete",
					data: {
						id: family_id,
					}
				}).done(function (response) {
					if (response.status == true) {
						
						getFamilies(); // Load family details
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
