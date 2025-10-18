$(function () {

	const elmLicenses = $('#licenses-container');

	const elmLicensesPagination = $('#licenses-pagination');



	// Ajax request setup

	$.ajaxSetup({

		headers: {

			'Authorization': `Bearer ${$.cookie("acces_token")}`

		},

		dataType: 'json'

	});



	// load license view

	function loadLicensesView(items, pagination = {}) {

		console.log(pagination);

		$("#total_license").text(`Total ${pagination.total} License`)

		if (items.length > 0) {

			var langCode = localStorage.getItem('language-type');
			languageText(langCode);
			if (langCode == 2) {
				$("#preloader2").show();
				setTimeout(function () {
					setTimeout(function () {
						$("#preloader2").hide();
					}, 1000);
				}, 500);
			}

			elmLicenses.html(`<div class="nk-tb-list nk-tb-ulist list-area license-detail-list">

                <div class="nk-tb-item nk-tb-head">

					<div class="nk-tb-col"><span class="text-black fw-bold slno" data-translate="Sl.No">Sl.No</span></div>

                    <div class="nk-tb-col"><span class="text-black fw-bold license-name" data-translate="Name">License Types</span></div>

                    <div class="nk-tb-col"><span class="text-black fw-bold school-name" data-translate="School Name">School Name</span></div>

                    <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold status-label" data-translate="Status">Status</span></div>

                </div>

            </div>`);


			items.forEach((item) => {

				elmLicenses.find(".list-area").append(`<div class="nk-tb-item">

					<div class="nk-tb-col">

						<div class="user-info"><span class="tb-lead">${pagination.from++}</span></div>

					</div>

                    <div class="nk-tb-col">

                       <div class="">

                          <div class="user-info"><span class="tb-lead">${item.name}</span></div>

                       </div>

                    </div>

					<div class="nk-tb-col">

						<div class="user-info"><span class="tb-lead">${item.school_name}</span></div>

					</div>

                    <div class="nk-tb-col tb-col-sm"><span class='badge badge-dim ${item.registration_status == 1 ? 'bg-success active-btn' : 'bg-danger inactive-btn arinactive-btn'}'>${item.registration_status == 1 ? 'Active' : 'Inactive'}</span></div>

                    

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
					page = pageNumber;
					getLicenses(pageNumber);
				}
			});

		} else {

			elmLicenses.html(`<div class="nk-tb-item-empty">

                     <p class="text-center text-black fw-bold"> No Licenses Available</p>

                  </div>`);
			$("#licenses-pagination").html('')
		}
	}

	// Get license  list
	var page = 1;

	var pageSize = 10;

	var query = '';

	var filters = '';

	var sortby = 0;

	window.getLicenses = function (pageNumber = page, option = {}) {

		let params = '';

		page = pageNumber;

		sortby = option.sortBy ? option.sortBy : sortby;

		pageSize = option.pageSize ? option.pageSize : pageSize;

		query = option.q ? option.q : query;

		filters = option.filter ? option.filter : filters;

		params += `page=${page}&sortby=${sortby}&page_size=${pageSize}&${filters}&${query}`


		/*showLoader({

			title: 'Please Wait...'

		});*/


		$('.dropdown-menu').removeClass('show');
		$('.filter-wg').removeClass('show');

		$.ajax({

			type: "get",

			url: formApiUrl(`auth/all_main_license_paginate/0?${params}`, {

				baseUrl: 'https://dsms.technoiq.in/backend/api/'

			}),

		}).done(function (response) {

			if (response.errors == false) {

				loadLicensesView(response.data.result.data, {

					current_page: response.data.result.current_page,

					per_page: response.data.result.per_page,

					total: response.data.result.total,

					from: response.data.result.from,

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



	elmLicenses.on('click', '.view-exam-criteria', function (e) {

		e.preventDefault();

		sessionStorage.setItem('license_type' + $(e.currentTarget).data('item-id'), $(e.currentTarget).data('item-name'));



		window.location.href = formUrl(`school/license/exam`, { 'id': $(e.currentTarget).data('item-id') });

	})


	$(".page_size").click(function (e) {
		e.preventDefault();
		getFamilies(1, {
			pageSize: $(this).html()
		})
	})

	$("#sort-by").on("change", function (e) {
		getLicenses(page, { sortBy: e.currentTarget.value })
	})

	$("#filter-form").on("submit", function (e) {
		e.preventDefault();
		getLicenses(1, { filter: $(this).serialize() })
	});

	$("#licenseSearchForm").on("submit", function (e) {
		e.preventDefault();
		getLicenses(1, { q: $(this).serialize() })
	});

	$("#search-reset").click(function () {
		query = "";
		$('#sort-by').select2('val', 'null');
		getLicenses(1);
	});

	$("#clear-filter").click(function () {
		filters = '';
		$('#stat').select2('val', 'null');
		getLicenses(1);
	});

});