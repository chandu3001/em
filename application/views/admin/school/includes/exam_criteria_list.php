 <div class="nk-content nk-content-fluid">
               <div class="container-xl wide-lg exam_detail_card">
                  <div class="nk-content-body">
                     <div class="nk-block">
                        <div class="card card-bordered card-stretch">
                           <div class="card-inner-group exam_details_align">
                              <div class="card-inner position-relative card-tools-toggle">
                                 <div class="card-title-group">
                                    <div class="card-tools">
                                       <div class="form-inline flex-nowrap gx-3">
                                          <div class="form-wrap w-150px">
                                            <select id="sort_by" class="form-select form-select-sm js-select2 select2-hidden-accessible"
                                                data-placeholder="Sort By" onchange="GetExaminationLists(1,{sortBy:$(this).val()})">
                                                <option value=""></option>
                                                <option value="3" data-translate>Select All</option>
                                                <option value="1" data-translate>Ascending</option>
                                                <option value="2" data-translate>Descending</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="card-tools me-n1">
                                       <ul class="btn-toolbar gx-1">
                                          <li><a href="#" class="btn btn-icon search-toggle toggle-search"
                                                data-target="search"><em class="icon ni ni-search"></em></a></li>
                                          <li class="btn-toolbar-sep"></li>
                                          <li>
                                             <div class="toggle-wrap">
                                                <a href="#" class="btn btn-icon btn-trigger toggle"
                                                   data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                <div class="toggle-content" data-content="cardTools">
                                                   <ul class="btn-toolbar gx-1">
                                                      <li class="toggle-close"><a href="#"
                                                            class="btn btn-icon btn-trigger toggle"
                                                            data-target="cardTools"><em
                                                               class="icon ni ni-arrow-left"></em></a></li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle"
                                                               data-bs-toggle="dropdown">
                                                               <div class="dot dot-primary"></div>
                                                               <em class="icon ni ni-filter-alt"></em>
                                                            </a>
                                                            <div
                                                               class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                            <form id="filter-form">
                                                               <div class="dropdown-head">
                                                                  <span class="sub-title dropdown-title filters" data-translate>Filters</span>
                                                               </div>
                                                               <div class="dropdown-body dropdown-body-rg">
                                                                  <div class="row gx-6 gy-3">
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt license-type" data-translate>License Type</label>
                                                                              <select name="license_id" id="license_filters" class="form-select form-select-sm js-select2"
                                                                                 data-placeholder="Select License Type" onchange="getSubLicenseList(this)">
                                                                              </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt sub-name" data-translate>Sub License Type</label>
                                                                              <select name="sub_id"
                                                                                 id="sub_license_filter"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-placeholder="Select Sub License Type">
                                                                              </select>
                                                                        </div>
                                                                     </div>
                                                                  
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt status-label" data-translate>Status</label>
                                                                              <select name="status"
                                                                                 class="form-select form-select-sm js-select2" id="stat" data-placeholder="Select Status">
                                                                                 <option value=""></option>
                                                                                 <option value="1" data-translate>Active</option>
                                                                                 <option value="0" data-translate>Inactive</option>
                                                                              </select>
                                                                        </div>
                                                                     </div>

                                                                     <div class="col-12">
                                                                        <div class="form-group"><button type="submit"
                                                                              class="btn btn-secondary apply-btn" data-translate>Apply</button>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="dropdown-foot between">
                                                                  <button type="reset" id="clear-filter" class="link p-0 text-primary" onclick="GetExaminationLists(1, {filter: 'clearFilter'})" data-translate>Clear Filter</button>
                                                               </div>
                                                            </form>
                                                            </div>
                                                         </div>
                                                      </li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle"
                                                               data-bs-toggle="dropdown"><em
                                                                  class="icon ni ni-setting"></em></a>
                                                            <div
                                                               class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                               <ul class="link-check">
                                                               <li><span class="show-label" data-translate>Show</span></li>
                                                                   <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input checked onchange="GetExaminationLists(1,{pageSize:10})"  type="checkbox"  class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                   <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input onchange="GetExaminationLists(1,{pageSize:20})" type="checkbox" class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input onchange="GetExaminationLists(1,{pageSize:50})" type="checkbox"  class="radio" value="1" name="fooby[1][]" ></a></li>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="card-search search-wrap" data-search="search">
                                    <div class="card-body">
                                         <form id="searchExam">
                                          <div class="search-content d-flex"><a href="javascript:void(0)" id='search-reset' class="search-bStudent IDk btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                             <input name="q" type="search" class="form-control border-transparent form-focus-none" placeholder="Search">
                                             <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                               <div class="card-inner p-0 text-center">
                                    <h4 class='text-center p-2' id="load-data"></h4>
                                    <div id="examinations_list" class="nk-tb-list nk-tb-ulist">

                                    </div>
                                 </div>
                              <div class="card-inner" id="exam-list-pagination"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
      
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script>
   // the selector will match all input controls of type :checkbox
// and attach a click event handler 
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
   </script>
     <script>
      $(function () {
         
         GetExaminationLists();
         getFilterLicenseList();

      });


      const queryString2 = window.location.search;
      const urlParams2 = new URLSearchParams(queryString2);
      const convertURL2 =  urlParams2.get('epage');

      var page1 =  convertURL2 ? convertURL2 : 1;;
      var filters = '';
      var pageSize = 10;
      var query = '';

      function GetExaminationLists(pageNumber = page1, option = {})
      {
         let params = '';
         urlPage(pageNumber, "epage")
         page = pageNumber;
         var sortby = option.sortBy ? option.sortBy : 2;
         pageSize = option.pageSize ? option.pageSize : pageSize;
         filters = option.filter ? option.filter : filters;
         query = option.q ? option.q : query

         if(option.filter == 'clearFilter'){
            $('#license_filters').select2('val','null');
            $('#sub_license_filter').select2('val','null');

         }
        
        params +=`page=${page}&sortby=${sortby}&pageSize=${pageSize}&${filters}&${query}`

         /*showLoader({
            title: "Please Wait",
            // text: "Fetching..."
         })*/

         let searchParams = new URLSearchParams(window.location.search)
         let id = searchParams.get("id")

         $.ajax({
            type: "get",
            url: `${api_base_url}examination/${id}/list?${params}`,
            headers:{
            "Authorization": `Bearer ${$.cookie("access_token")}`
         }
         }).done(({status,data}) =>{
            if(status)
            {
               
               if(data.data.length > 0)
               {
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

                  $("#examinations_list").html(
                  `
                  <div class="list-area nk-tb-list nk-tb-ulist exam-detail-list">
                     <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col " id="heading_center"><span class="text-black fw-bold slno" data-translate>Exam Name</span></div>
                        <div class="nk-tb-col " id="heading_center"><span class="text-black fw-bold license-type" data-translate>License Type</span></div>
                        <div class="nk-tb-col" id="heading_center"><span class="text-black fw-bold sub-name" data-translate data-translate="Sub License Type">Sub License Type</span></div>
                        <div class="nk-tb-col " id="heading_center"><span class="text-black fw-bold tot-stud" data-translate="Registered Students">Registered Students</span></div>
                        <div class="nk-tb-col " id="heading_center"><span class="text-black fw-bold active-stud" data-translate="Attended Students">Attended Students</span></div>
                        <div class="nk-tb-col " id="heading_center"><span class="text-black fw-bold pass" data-translate="Pass">Pass</span></div>
                        <div class="nk-tb-col tb-col-md" id="heading_center_status"><span class="text-black fw-bold status-label" data-translate="Status">Status</span></div>
                        <div class="nk-tb-col tb-col-md" id="heading_center"><span class="text-black fw-bold action" data-translate="Action">Action</span></div>
                     </div>
                  </div>
                  `
                  )

                  data.data.forEach(item =>{
                     $("#examinations_list .list-area").append(
                        `<div class="nk-tb-item details">    
                           <div class="nk-tb-col">
                              <div class="user-card">
                                 
                                 <div class="user-info"><span class="tb-lead" id="font-align">${item.exam_name}</span></div>
                              </div>
                           </div> 
                           <div class="nk-tb-col">
                              <div class="user-card">
                                 
                                 <div class="user-info"><span class="tb-lead" id="font-align">${item.license_name}</span></div>
                              </div>
                           </div> 
                           <div class="nk-tb-col">
                              <div class="user-card">
                                 
                                 <div class="user-info"><span class="tb-lead" id="font-align">${item.sub_license_name}</span></div>
                              </div>
                           </div> 
                           <div class="nk-tb-col">
                              <div class="user-card">
                                 
                                 <div class="user-info"><span class="tb-lead" id="no_center_alignment">${item.total_students}</span></div>
                              </div>
                           </div> 
                           <div class="nk-tb-col">
                              <div class="user-card">
                                 
                                 <div class="user-info"><span class="tb-lead" id="no_center_alignment">${item.total_attended_students}</span></div>
                              </div>
                           </div>  
                           <div class="nk-tb-col">
                              <div class="user-card">
                                 
                                 <div class="user-info"><span class="tb-lead" id="percentage_alignment">${item.pass_percentage}%</span></div>
                              </div>
                           </div>                                        

                            <div style="width:15%" class="nk-tb-col" id="status_button_alignment"><span class='badge badge-dim ${item.status == 1 ? 'bg-success active-btn' : 'bg-danger inactive-btn arinactive-btn'}'>${item.status == 1 ? 'Active' : 'Inactive'}</span></div>

                          
                           <div class="nk-tb-col nk-tb-col-tools">
                              <ul class="">
                                 <li>
                                    <div class="drodown">
                                       <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <ul class="link-list-opt no-bdr">
                                       <li><a href="${formUrl('admin/schools/examination?id='+item.id)}"><em class="icon ni ni-eye"></em><span class="view-results">View Results</span></a></li>
                                             
                                          </ul>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                     </div>`);
                  })
                  $("#exam-list-pagination").pagination({
                     items: parseInt(data.total),
                     itemsOnPage: parseInt(data.per_page),
                     currentPage: data.current_page,
                     displayedPages: 3,
                     navStyle: "pagination justify-content-center justify-content-md-start",
                     listStyle: "page-item",
                     linkStyle: "page-link",
                     onPageClick: function (pageNumber, event) {
                        event ? event.preventDefault() : '';
                        GetExaminationLists(pageNumber);
                     }
                  })
               }
               else
               {
                   noData =  (langCode == 2) ?  "لا توجد نتيجة فحص متاحة" : "No Examination Result Available";
                  $("#examinations_list").html(`<div class="nk-tb-item-empty">
                     <p class="text-center text-black fw-bold no-exam-title">`+noData+ `</p>
                  </div>`);
                  $("#exam-list-pagination").html('')
               }
               
            }
            else
            {
               NioApp.Toast(message, "warning");
            }
         }).fail(({statusText, status, responseJSON}) =>{
            if(status == 400)
            NioApp.Toast(responseJSON.message, "error");
            else
            NioApp.Toast(statusText, "error");
         }).always(()=>{
            //hideLoader();
            
         })
      }


      $("#sort_by").on("change", function(){
      GetExaminationLists(page, {
         sortBy: $(this).val()
      })
    })
    $("#searchExam").on("submit", function(e){
      e.preventDefault();
      GetExaminationLists(page, {
         q: $(this).serialize()
      })
    })
    $("#filter-form").on("submit", function(e){
        e.preventDefault();
        GetExaminationLists(1,{filter: $(this).serialize()})
    })

    $('#clear-filter').click(function(e) {
           e.preventDefault();
           $('#license_filter').select2('val','null');
           $('#sub_license_filter').select2('val','null');
           $('#sub_license_filter').html('')
           $('#stat').select2('val','null');
           $('.filter-wg').removeClass('show');
           filters = '';
           GetExaminationLists(1, {filter: 'clearFilter'});
      });

      $("#search-reset").click(function(e){
         $('#sort_by').select2('val','null');
         query = '';
         GetExaminationLists(1);
      })
   
   function getFilterLicenseList() {
       searchParams = new URLSearchParams(window.location.search)
       var id = searchParams.get("id")

      $.ajax({
         type: "get",
         url: `https://dsms.technoiq.in/backend/api/auth/main_licenses_home/${id}`
      }).done(({ errors, data }) => {
         if (!errors) {

            $("#license_filters").html(`<option value=""></option>`);

            data.result.forEach(item => {
               $("#license_filters").append(`
                  <option value="${item.id}">${item.name}</option>
               `)
            })
         }
      })
   }


  
   
   const getSubLicenseList = (license_id) => {
      license_id = license_id.value;  

      $.ajax({
         type: "get",
         url: `${api_base_url}get-sublicense-by-license-id/${license_id}`
      }).done(({ status, data }) => {
         if (status) {

            $('#sub_license_filter').html(`<option value=""></option>`).prop('disabled', false);;
            if(data.length > 0)
            {
               $('#sub_license_filter').attr('required', false);
            }
            else
            {
               $('#sub_license_filter').attr('required', false);
               $('#sub_license_filter').html(`<option value="">Sub License Not Available</option>`).prop('disabled', true);
               
            }
            data.forEach(item => {
               $('#sub_license_filter').append(`
                  <option value="${item.id}">${item.name}</option>
               `)
            })
         }
         else
         {
            // NioApp.Toast("Sub License is not available.", "error")
            $(target).attr('required', false);
            $(target+"-error").html('')
            $(target).html(`<option value="">Sub License is not available</option>`);
            
         }

         languageText(localStorage.getItem('language-type'));
      })
     
   }

  
   </script>
  