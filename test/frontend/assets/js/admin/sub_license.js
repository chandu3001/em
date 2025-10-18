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
			langCode = localStorage.getItem('language-type');
         languageText(langCode);
			elmLicenses.html(`<div class="nk-tb-list nk-tb-ulist list-area sublicense-detail-list">

                <div class="nk-tb-item nk-tb-head">

					<div class="nk-tb-col" style="width: 10%"><span class="text-black fw-bold slno" data-translate="Sl.No">Sl.No</span></div>
						<div class="nk-tb-col" style="width: 26.66%"><span class="text-black fw-bold school-name" data-translate="School">School Names</span></div>
						<div class="nk-tb-col" style="width: 26.66%"><span class="text-black fw-bold license-name" data-translate="License Name">License Types</span></div>
						<div class="nk-tb-col" style="width: 26.66%"><span class="text-black fw-bold sublicensename" data-translate="Sub license Name">Sub-license Types</span></div>
						<div class="nk-tb-col  style="width: 10%"tb-col-sm"><span class="text-black fw-bold status-label" data-translate="Status">Status</span></div>

                </div>

            </div>`);

				if(langCode == 2){
					$('.sublicense-detail-list div span').text('');
				}

			items.forEach((item,inx) => {

				elmLicenses.find(".list-area").append(`<div class="nk-tb-item">

					<div class="nk-tb-col">

						<div class="user-info"><span class="tb-lead text-break">${pagination.from++}</span></div>

					</div>
					<div class="nk-tb-col">
						<div class="user-info"><span class="tb-lead text-break">${item.main_license}</span></div>
			  		</div>
                    <div class="nk-tb-col">
                          <div class="user-info"><span class="tb-lead text-break">${item.name}</span></div>
                    </div>
 							<div class="nk-tb-col">
                          <div class="user-info"><span class="tb-lead text-break">${item.school_name}</span></div>
                    </div>
                    <div class="nk-tb-col tb-col-sm"><span class="badge badge-dim ${item.registration_status == 1 ? 'bg-success active-btn' : 'bg-danger inactive-btn'}">${item.registration_status == 1 ? 'Active': 'Inactive'}</span></div>


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
                     getSubLicenses(pageNumber);
            },

			});

		} else {

			elmLicenses.html(`<div class="nk-tb-item-empty">

                     <p class="text-center text-black fw-bold"> No Sub Licenses Available</p>

                  </div>`);
			$("#sub-licenses-pagination").html('')

		}

	}

	var page=1;
   var filters = '';
   var pageSize = 10;
   var query = '';
   var sortby = 0;

	window.getSubLicenses = function(pageNumber = page, option = {}) {

		//const page = parseValue(option.page)
 		 let params  = '';
         page        = pageNumber;
         sortby      = option.sortBy ? option.sortBy : sortby;
         pageSize    = option.pageSize ? option.pageSize : pageSize;
         filters     = option.filter ? option.filter : filters;
         query       = option.q ? option.q : query;

         params +=`&sortby=${sortby}&page_size=${pageSize}&${filters}&${query}`;
   
      $('.dropdown-menu').removeClass('show');
      $('.filter-wg').removeClass('show');
			
		/*showLoader({

			title: 'Please Wait...'

		});*/

		$.ajax({

			type: "get",
			url: formApiUrl(`auth/list_sub_licenses/0?page=${page}`, {

                baseUrl: 'https://dsms.technoiq.in/backend/api/'

         }),
         data: params,

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

		}).fail(function ({status, responseJSON}) {

			if(status == 404 && responseJSON.errors)
			{
				loadLicensesView([]);
			}
			else
			NioApp.Toast("Error Occured", "error");

		}).always(function () {

			//hideLoader();
		

		});

	}



		$('#clear-filter').click(function(e) {
           e.preventDefault();
		   $('#stat').select2('val','null');
           filters = '';
           getSubLicenses(1, {filter: 'clearFilter'});
      });

      $("#sort_by").on("change", function(){
         getSubLicenses(page, {
            sortBy: $(this).val()
         })
      });
      
      $("#searchSubLicense").on("submit", function(e){
         e.preventDefault();
         getSubLicenses(1, {
            q: $(this).serialize()
         })
      });

      $("#filter-form").on("submit", function(e){
           e.preventDefault();
           getSubLicenses(1,{filter: $(this).serialize()})
      });

       $('#btn-refresh-sublicense').click(function(e) {
        e.preventDefault();
        filters = '';
        query = '';
        getSubLicenses();
      });

	  $("#search-reset").click(function(){
		$('#sort_by').select2('val','null');
		query = '';
		getSubLicenses(1);
	});


});