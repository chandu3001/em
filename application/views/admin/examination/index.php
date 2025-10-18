<style>
   .nk-content-fluid{
         top: 65px;
         position: relative;
        }
         
</style>
<?php include_once APPPATH . 'views/admin/includes/header.php'; ?>
<body class="nk-body npc-crypto bg-lighter has-sidebar " >
   <div class="nk-app-root">
      <div class="nk-main ">
         
         <?php include_once APPPATH . 'views/admin/includes/sidebar.php'; ?>

         <div class="nk-wrap ">
            
            <?php include_once APPPATH . 'views/admin/includes/navbar.php'; ?>

            <div class="nk-content nk-content-fluid">
               <div class="container-xl wide-lg">
                  <div class="nk-content-body">
                     <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                           <div class="nk-block-head-content">
                              <h3 class="nk-block-title page-title exam-tab" data-translate>Examinations</h3>
                              <div class="nk-block-des text-soft">
                                 <!-- <p id="total-exam-count">Loading...</p> -->
                              </div>
                           </div>
                           <div class="nk-block-head-content">
                              <div class="toggle-wrap nk-block-tools-toggle">
                                 <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                 <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                       <!-- <li><a class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Export</span></a></li> -->
                                       <!-- <li class="nk-block-tools-opt"><a href="#" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#addExam"  aria-expanded="false"><em class="icon ni ni-plus"></em></a></li> -->

                                       <!-- <li class="nk-block-tools-opt"><a onclick="getAllExamination()" class="btn btn-icon btn-primary"  aria-expanded="false"><em class="icon ni ni-reload"></em></a></li> -->
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="nk-block">
                        <div class="card card-bordered card-stretch">
                           <div class="card-inner-group">
                              <div class="card-inner position-relative card-tools-toggle">
                                 <div class="card-title-group">
                                    <div class="card-tools">
                                       <div class="form-inline flex-nowrap gx-3">
                                          <div class="form-wrap w-150px">
                                             <select id="sort_by" class="form-select form-select-sm js-select2 select2-hidden-accessible"
                                                data-search="off" data-placeholder="Sort By">
                                                <option value=""></option>
                                                <option value="0" data-translate>Select All</option>
                                                <option value="1" data-translate>Ascending</option>
                                                <option value="2" data-translate>Descending</option>
                                             </select>
                                          </div>
                                        
                                       </div>
                                    </div>
                                    <div class="card-tools me-n1">
                                       <ul class="btn-toolbar gx-1">
                                          <li><a href="javascript:void(0)" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a></li>
                                          <li class="btn-toolbar-sep"></li>
                                          <li>
                                             <div class="toggle-wrap">
                                                <a href="javascript:void(0)" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                <div class="toggle-content" data-content="cardTools">
                                                   <ul class="btn-toolbar gx-1">
                                                      <li class="toggle-close"><a href="javascript:void(0)" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a></li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="javascript:void(0)" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                                               <div class="dot dot-primary"></div>
                                                               <em class="icon ni ni-filter-alt"></em>
                                                            </a>
                                                            <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                               <div class="dropdown-head">
                                                                  <span class="sub-title dropdown-title filters" data-translate>Filters</span>
                                                                  <!-- <div class="dropdown"><a href="javascript:void(0)" class="btn btn-sm btn-icon"><em class="icon ni ni-more-h"></em></a></div> -->
                                                               </div>
                                                               <div class="dropdown-body dropdown-body-rg">
                                                                  <form id="filter-form">
                                                                     <div class="row gx-6 gy-3">
                                                                     
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label class="overline-title overline-title-alt status-label" data-translate>Status</label>
                                                                           <select name="status" id="stat" class="form-select form-select-sm js-select2" data-placeholder="Select Status">
                                                                              <option value=""></option>
                                                                              <option value="-1" data-translate>Select All</option>
                                                                              <option value="1" data-translate>Active</option>
                                                                              <option value="2" data-translate>Inactive</option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label class="overline-title overline-title-alt license-type" data-translate>License Type</label>
                                                                           <select id="license_filter" name="license_id" class="form-select form-select-sm js-select2" data-placeholder="Select License Type">
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-12">
                                                                        <div class="form-group"><button type="submit" class="btn btn-secondary apply-btn" data-translate>Apply</button></div>
                                                                     </div>
                                                                  </div>
                                                                  </form>
                                                               </div>
                                                               <div class="dropdown-foot between">
                                                               <button type="reset" class="link p-0 text-primary" id="clear-filter" data-translate>Clear Filters</button>
                                                               <!-- <a href="javascript:void(0)">Save Filters</a> -->
                                                            </div>
                                                            </div>
                                                         </div>
                                                      </li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a  href="javascript:void(0)" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-setting"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                            <ul class="link-check">
                                                                  <li><span class="show-label" data-translate>Show</span></li>
                                                                  <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input checked onchange="getAllExamination(1,{pageSize:10})"  type="checkbox"  class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input onchange="getAllExamination(1,{pageSize:20})" type="checkbox" class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input onchange="getAllExamination(1,{pageSize:50})" type="checkbox"  class="radio" value="1" name="fooby[1][]" ></a></li>
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
                                          <div class="search-content d-flex"><a href="javascript:void(0)" id="search-reset" class="search-bStudent IDk btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                             <input name="q" type="search" class="form-control border-transparent form-focus-none" placeholder="Search">
                                             <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                             
                                <div class="card-inner p-0 text-center">
                                    <h4 class='text-center p-2' id="load-data"></h4>
                                    <div id="exam-list" class="nk-tb-list nk-tb-ulist">

                                    </div>
                                 </div>

                              <div class="card-inner" id="exam-list-pagination">
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
               <?php include_once APPPATH . 'views/admin/includes/footer.php'; ?>
         </div>
      </div>
   </div>
   <?php include_once APPPATH . 'views/admin/includes/footer-scripts.php'; ?>

  <script>
   $(function()
   {
      getAllExamination();
      getLicenseList();
      localStorage.removeItem("pageNO");

   })
   
    var page = getUrlParam('page') ? getUrlParam('page') : 1;
    var filters = '';
    var pageSize = 10;
    var query = '';
    var sortby = 0;

   function getAllExamination(pageNumber = page, option = {})
   {

      urlPage(pageNumber)

      let params = '';
      page = pageNumber;
      sortby = option.sortBy ? option.sortBy : sortby;
      pageSize = option.pageSize ? option.pageSize : pageSize;
      filters = option.filter ? option.filter : filters;
      query = option.q ? option.q : query;

      $('.dropdown-menu').removeClass('show');
      $('.filter-wg').removeClass('show');
      
      params +=`page=${page}&sortby=${sortby}&pageSize=${pageSize}&${filters}&${query}`

      /*showLoader({
            // title: "Data Fetching From DSMS",
            title: "Please Wait..."
         })*/


      $.ajax({
         type: "GET",
         url: api_base_url+"superadmin/examination/0/list?page="+page,
         data: params,
         headers:{
            "Authorization": `Bearer ${$.cookie("access_token")}`
        }
      }).done(({status, message, data})=>{

         if(data.total != 0)
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


            var myPageNo =  decodeURIComponent($.urlParam('page'));
            localStorage.setItem('pageNO',myPageNo);
            
            $("#total-exam-count").text(`Total ${data.total} Exams`)
            $("#exam-list").html(`
            <div class="nk-tb-item nk-tb-head exm-det-list">
               <div class="nk-tb-col"><span class="text-black fw-bold slno">Sl.No</span></div>
               <div class="nk-tb-col"><span class="text-black fw-bold exam-title" data-translate="Exam Name">Exam Name</span></div>
               <div class="nk-tb-col"><span class="text-black fw-bold school-name" data-translate="School Name">School Name</span></div>
               <div class="nk-tb-col"><span class="text-black fw-bold license-type" data-translate="Licence Type">License Type</span></div>
               <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold status-label" data-translate="Status">Status</span></div>
               <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold action" data-translate="Action">Action</span></div>
            </div>`)

            data.data.forEach(item =>{
               $("#exam-list").append(`
                  <div class="nk-tb-item">
                     <div class="nk-tb-col tb-col-md">${data.from++}</div>

                     <div class="nk-tb-col">
                       <span class="tb-lead">${item.exam_name}</span><span>Exam ID: ${item.id}</span>
                     </div>
                     <div class="nk-tb-col tb-col-md">${item.school_name}</div>
                     <div class="nk-tb-col tb-col-md">${item.license_name}</div>
                     <div class="nk-tb-col"><span class="badge badge-dim ${item.status ? 'bg-success active-btn' : 'bg-danger inactive-btn arinactive-btn'}">${item.status ? 'Active' : 'Inactive'}</span></div>
                     <div class="nk-tb-col nk-tb-col-tools">
                        <ul class="">
                           <li>
                              <div class="drodown">
                                 <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                 <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                       <li><a href="<?php echo base_url('admin/examination/view');?>?id=${item.id}"><em class="icon ni ni-eye"></em><span class="view-detail">View Details</span></a></li>
                                       </ul>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>`)
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
                        getAllExamination(pageNumber);
                    }
                })
         }
         else
         {

            $("#total-exam-count").text(`Total 0 Exams`)
            $("#exam-list").html(`<div class="nk-tb-item-empty">
                     <p class="text-center text-black fw-bold"> No Exam Available</p>
                  </div>`);
            $("#exam-list-pagination").html('');
         }
      }).fail(({statusText, status, responseJSON}) =>{
            if(status == 400)
                NioApp.Toast(responseJSON.message, "error");
            else
                NioApp.Toast(statusText, "error");
        }).always(()=>{
           // hideLoader();
        })
   }




   
   $('#btn-refresh-examination').click(function(e) {
        e.preventDefault();
        filters = '';
        query = '';
        getAllExamination();
    });
   $('#clear-filter').click(function(e) {
        e.preventDefault();
        $('#stat').select2('val','null');
        $('#license_filter').select2('val','null');
        filters = '';
        getAllExamination(1);
    });

   $("#sort_by").on("change", function(){
      getAllExamination(page, {
         sortBy: $(this).val()
      })
    })
    $("#searchExam").on("submit", function(e){
      e.preventDefault();
      getAllExamination(1, {
         q: $(this).serialize()
      })
   $("#search-reset").click(function(){
      query = "";
      $("#sort_by").select2('val','null');
      getAllExamination(1);
   });

    })
    $("#filter-form").on("submit", function(e){
        e.preventDefault();
        getAllExamination(1,{filter: $(this).serialize()})
    });

    function getLicenseList()
   {
      $.ajax({
         type: "get",
         url: `https://dsms.technoiq.in/backend/api/auth/all_main_license/${0}`
      }).done(({errors, data}) =>{
         if(!errors)
         {
            $("#license_filter").html('<option value="">choose</option>')
            data.result.forEach(item =>{
               $("#license_filter").append(`<option value="${item.id}">${item.name}</option>`)
            })
         }
         else
         {
            NioApp.Toast("Error Occurred", "error");
         }
      })
   }

   


  </script>

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
</body>
</html>