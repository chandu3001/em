$(function () {

	const elmLicenses = $('#licenses-container');

	const elmLicensesPagination = $('#licenses-pagination');



	// Ajax request setup

	$.ajaxSetup({

		headers: {

			'Authorization': `Bearer ${appModule.getToken()}`

		},

		dataType: 'json'

	});



	// load license view

	function loadLicensesView(items, pagination = {}) {
		//var langCode = localStorage.getItem('language-type');



		$("#total_license").text(`Total ${pagination.total} License`)

		if (items.length > 0) {

			var langCode = localStorage.getItem('language-type');
			languageText(langCode);


			elmLicenses.html(`<div class="nk-tb-list nk-tb-ulist list-area license-detail-list">

                <div class="nk-tb-item nk-tb-head">

					<div class="nk-tb-col"><span class="text-black fw-bold slno"> Sl.No</span></div>

                    <div class="nk-tb-col"><span class="text-black fw-bold license-name">License Types</span></div>

                    <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold status-label">Status</span></div>

                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold exam-criteria">Exam Criteria</span></div>

                </div>

            </div>`);


			items.forEach((item, inx) => {

				elmLicenses.find(".list-area").append(`<div class="nk-tb-item">

					<div class="nk-tb-col">

						<div class="user-info"><span class="tb-lead">${++inx}</span></div>

					</div>

                    <div class="nk-tb-col">

                       <div class="">

                          <div class="user-info"><span class="tb-lead">${item.name}</span></div>

                       </div>

                    </div>

                    <div class="nk-tb-col tb-col-sm"><span>${item.registration_status == 1 ? "<span class='active-btn'>Active</span>" : "<span class='inactive-btn'>Inactive</span>"}
  							<span></div>

                    <div class="nk-tb-col tb-col-md">

                       <a class="btn btn-sm btn-primary view-exam-criteria exam-criteria" data-item-id="${item.id}" data-item-name="${item.name}" href="javascript:void(0)">Exam Criteria</a>

                    </div>

                    

                 </div>`);

			});



			elmLicensesPagination.pagination({

				items: parseInt(pagination.total),

				itemsOnPage: parseInt(pagination.per_page),

				currentPage: pagination.current_page,

				displayedPages: 3,

				navStyle: "pagination justify-content-center justify-content-md-start",

				listStyle: "page-item",

				linkStyle: "page-link",

				onPageClick: function (pageNumber, event) {

					event ? event.preventDefault() : '';

					getFamilies({

						page: pageNumber,

					});

				},

			});

		} else {

			elmLicenses.html(`<div class="nk-tb-item-empty">

                     <p class="text-center text-black fw-bold"> No Licenses Available</p>

                  </div>`);

		}

	}



	// Get family list

	let pagesize = 10;

	let query = ""

	var filters = '';
	var page = 1;


	window.getLicenses = async function (pageNumber = page, option = {}) {


		let params = '';

		page = pageNumber;

		let sortby = option.sortby ? option.sortby : 1;

		query = option.q ? option.q : query;

		pagesize = option.pageSize ? option.pageSize : pagesize;

		filters = option.filter ? option.filter : filters;

		params += `page=${page}&sortby=${sortby}&page_size=${pagesize}&${filters}&${query}`


		const school_id = await appModule.getCookie('school_id');

		$('.dropdown-menu').removeClass('show');
		$('.filter-wg').removeClass('show');


		if (langCode == 2) {
			$("#preloader2").show();
			setTimeout(function () {
				setTimeout(function () {
					$("#preloader2").hide();
				}, 2000);
			}, 500);
		}
		/*showLoader({

			title: 'Please Wait...'

		});*/



		$.ajax({

			type: "get",

			url: formApiUrl(`auth/all_main_license_paginate/${school_id}?${params}`, {

				baseUrl: 'https://dsms.technoiq.in/backend/api/'

			}),

		}).done(function (response) {

			if (response.errors == false) {

				loadLicensesView(response.data.result.data, {

					current_page: response.data.result.current_page,

					per_page: response.data.result.per_page,

					total: response.data.result.total,

				});

			} else if (response.status == true) {

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



	$(".page_size").click(function (e) {
		e.preventDefault();
		getFamilies(1, {
			pageSize: $(this).html()
		})
	})

	$("#sortby").on("change", function (e) {
		getLicenses(page, { sortby: e.currentTarget.value })
	})

	$("#filter-form").on("submit", function (e) {
		e.preventDefault();
		getLicenses(page, { filter: $(this).serialize() })
	});

	$("#licenseSearchForm").on("submit", function (e) {
		e.preventDefault();
		getLicenses(page, { q: $(this).serialize() })
	});

	$("#search-reset").click(function () {
		query = "";
		$('#sort-by').select2('val', 'null');
		getLicenses();
	});

	$("#clear-filter").click(function () {
		filters = "";
		$('#stat').select2('val', 'null');
		getLicenses(1);
	});




	elmLicenses.on('click', '.view-exam-criteria', function (e) {

		e.preventDefault();

		sessionStorage.setItem('license_type' + $(e.currentTarget).data('item-id'), $(e.currentTarget).data('item-name'));



		window.location.href = formUrl(`school/license/exam`, { 'id': $(e.currentTarget).data('item-id') });

	})

});