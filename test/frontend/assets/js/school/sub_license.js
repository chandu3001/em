$(function() {

    const elmLicenses = $('#sub-licenses-container');

    const elmLicensesPagination = $('#sub-licenses-pagination');

	

	// Ajax request setup

	$.ajaxSetup({

		headers: {

			'Authorization': `Bearer ${appModule.getToken()}`

		},

		dataType: 'json'

	});



    // load license view

	function loadLicensesView(items, pagination = {}) {

        $("#total_license").text(`Total ${pagination.total} License`)

		if (items.length > 0) {
			var langCode = localStorage.getItem('language-type');
         	languageText(langCode);

			elmLicenses.html(`<div class="nk-tb-list nk-tb-ulist list-area sublicense-detail-list">

                <div class="nk-tb-item nk-tb-head">

					<div class="nk-tb-col"><span class="text-black fw-bold slno"> Sl.No</span></div>

                    <div class="nk-tb-col"><span class="text-black fw-bold license-name">License Types</span></div>
					<div class="nk-tb-col"><span class="text-black fw-bold sublicensename">Sub License Types</span></div>
                    <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold status-label">Status</span></div>

                </div>

            </div>`);

		if(langCode == 2){
                $('.sublicense-detail-list div span').text('');
         }

			items.forEach((item) => {

				elmLicenses.find(".list-area").append(`<div class="nk-tb-item">

					<div class="nk-tb-col">

						<div class="user-info"><span class="tb-lead">${pagination.from++}</span></div>

					</div>
					<div class="nk-tb-col">
						<div class="user-info"><span class="tb-lead">${item.main_license}</span></div>
			  		</div>

                    <div class="nk-tb-col">

                          <div class="user-info"><span class="tb-lead">${item.name}</span></div>

                    </div>

                    <div class="nk-tb-col tb-col-sm"><span>${item.registration_status == 1 ? 'Active': 'Inactive'}</span></div>

                 
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

			elmLicenses.html(`
			<div class="nk-tb-item-empty">
                <p class="text-center text-black fw-bold"> No Sub Licenses Available</p>
            </div>`);
			elmLicensesPagination.html('')

		}

	}


	let pagesize = 10;

	let query = ""

	var page = 1;
   var filters = '';

	window.getSubLicenses=  async function(pageNumber = page, option = {}) {
      
     let params = '';

     page = pageNumber;

		let sortby = option.sortby ? option.sortby : 1;

        query       = option.q ? option.q : query;

		pagesize = option.pageSize ? option.pageSize : pagesize;
        filters     = option.filter ? option.filter : filters;

	   params +=`page=${page}&sortby=${sortby}&page_size=${pagesize}&${filters}&${query}`

		const school_id = await appModule.getCookie('school_id');

		$('.dropdown-menu').removeClass('show');
        $('.filter-wg').removeClass('show');
        $('.dropdown-toggle ').removeClass('show');

		/*showLoader({

			title: 'Please Wait...'

		});*/

		$.ajax({

			type: "get",

			/*url: formApiUrl(`auth/all_main_license_paginate/${school_id}`, {

                baseUrl: 'https://dsms.technoiq.in/backend/api/'

            }),*/
          url : `https://dsms.technoiq.in/backend/api/auth/list_sub_licenses/${school_id}?${params}`,

		}).done(function (response) {

			if (response.errors == false) {

				loadLicensesView(response.data.result.data, {

					current_page: response.data.result.current_page,

					per_page: response.data.result.per_page,

					total: response.data.result.total,
					
					from: response.data.result.from

				});

			} else if (response.status == true) {

				NioApp.Toast("Error Occured", "error");

			} else {

				NioApp.Toast("Invalid response status", "warning");

			}

		}).fail(function ({status}) {

			if(status == 404)
			{
				loadLicensesView([], {
					total: 0,
				});
			}
			else
			NioApp.Toast("Error Occured", "error");

		}).always(function () {

			//hideLoader();

		});

	}

	$('#sortby').change(function(){
		getSubLicenses(page,{sortby : $(this).val()})
	})

	 $("#searchSubLicense").on("submit", function(e){
         e.preventDefault();
         getSubLicenses(page, {
            q: $(this).serialize()
         })
      });

      $("#filter-form").on("submit", function(e){
           e.preventDefault();
           getSubLicenses(page,{filter: $(this).serialize()})
      });

	  $("#search-reset").click(function()
	  {
		query = '';
		getSubLicenses();
	  })

	  $("#clear-filter").click(function()
	  {
		 $('#stat').select2('val','null');
          filters = '';
		getSubLicenses(1);
	  })

});