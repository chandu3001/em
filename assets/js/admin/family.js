
$(function() {


	const eleFamilies = $("#families");
	const eleFamiliesPagination = $("#families-pagination");
	const familyModalElm = $("#familyModal");
	const familyForm = $("#familyForm");
	var familyDetail = {};

	// Ajax request setup
	$.ajaxSetup({
		headers: {
			'Authorization': `Bearer ${$.cookie("access_token")}`
		},
		dataType: 'json'
	});


	// load family view
	function loadFamiliesView(items, pagination = {}) {
		$("#total_families").text(`Total ${(pagination.total)} Families`)
		if (items.length > 0) {

			var langCode = localStorage.getItem('language-type');
         languageText(langCode);
         if(langCode == 2){
             $("#preloader2").show();
               setTimeout(function () {
                  setTimeout(function () {
                      $("#preloader2").hide();
                  }, 1000);
               }, 500);
         }
         
			eleFamilies.html(`<div class="list-area nk-tb-list nk-tb-ulist family-detail-list">
                     <div class="nk-tb-item nk-tb-head">
					 	<div class="nk-tb-col"><span class="text-black fw-bold slno" data-translate="Sl.No">Sl.No</span></div>
                        <div class="nk-tb-col"><span class="text-black fw-bold family-name" data-translate="Name">Name</span></div>
                        <div class="nk-tb-col"><span class="text-black fw-bold school-name" data-translate="School Name">School Name</span></div>
                        <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold status-label" data-translate="Status">Status</span></div>
                     </div>
                  </div>`);
				
			items.forEach((item) => {
				$("#families .list-area").append(`<div class="nk-tb-item details" data-href="<?php echo base_url('admin/schools/details');?>">   
						<div class="nk-tb-col">
                              <div class="user-info"><span class="tb-lead">${pagination.from++}</span></div>
                        </div> 
                        <div class="nk-tb-col">
                        
                              
                              <div class="user-info"><span class="tb-lead">${item.family_name}</span></div>
                           
                        </div>   
						<div class="nk-tb-col">
                              <div class="user-info"><span class="tb-lead">${item.school_name}</span></div>
                        </div>                                     
                        <div class="nk-tb-col tb-col-md">
                        <span class="badge badge-dim ${item.status ? 'bg-success active-btn' : 'bg-danger inactive-btn arinactive-btn'}">${item.status ? 'Active' : 'Inactive'}</span>
                        </div>
                        
                    </div>`);
			});
			
			$("#families-pagination").pagination({
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
                     <p class="text-center text-black fw-bold"> No Families Available</p>
                  </div>`);
			$("#families-pagination").html('')
		}
	}

	 var page = 1;

    var filters = '';

    var pageSize = 10;

    var query = '';
	var sortBy = 0;

	// Get family list
	const getFamilies = function(pageNumber = page,option = {}) {
		  let params = '';

        page = pageNumber;

        var sortby = option.sortBy ? option.sortBy : sortBy;

        pageSize = option.pageSize ? option.pageSize : pageSize;

        query = option.q ? option.q : query
        
        filters = option.filter ? option.filter : filters;

        params +=`page=${page}&sortby=${sortby}&page_size=${pageSize}&${filters}&${query}`

      $('.dropdown-menu-end').removeClass('show');
      $('.dropdown-toggle').removeClass('show');

      $('.dropdown-menu').removeClass('show');

		if (parseValue(option.page)) {
			//params["page"] = option.page;
		}
		$.ajax({
			type: "get",
			url: formApiUrl(`family/0/list-with-pagination?${params}`),
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
			hideLoader();
			
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

    	$("#studentSearchForm").on("submit", function(e){
        e.preventDefault();
        getFamilies(1,{q: $(this).serialize()})
    	});

		$("#search-reset").click(function(){
			query = "";
			$("#sort-by").select2('val','null');
			getFamilies(1);
		});
    	
    	$('#clear-filter').click(function(e) {
        e.preventDefault();
        $('#status').select2('val','null');
        filters = '';
        getFamilies(1,'');
    });
})
