<style>
   .nk-content-fluid{
         margin-top: 125px !important;
         position: relative;
        }
</style>
<?php include_once APPPATH . 'views/admin/includes/header.php'; ?>

<body class="nk-body npc-crypto bg-lighter has-sidebar ">
   <div class="nk-app-root">
      <div class="nk-main ">

         <?php include_once APPPATH . 'views/admin/includes/sidebar.php'; ?>

         <div class="nk-wrap ">

            <?php include_once APPPATH . 'views/admin/includes/navbar.php'; ?>

            <div class="nk-content nk-content-fluid mt-5 pt-5">
               <div class="container-xl wide-lg">
                  <div class="nk-content-body">
                  <div class="nk-block-head-content text-end mb-2">
                        <a href="javascript:void(0)" id="go-back" class="btn btn-primary d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span class="back-btn">Back</span></a>
                  </div>
                     <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                        
                           <div class="nk-block-head-content w-100 bg-white rounded border d-flex justify-content-evenly py-3 align-items-center"  style="margin-bottom:25px;" >
                              <div class="d-flex justify-content-center align-items-center flex-column">
                                 <div class="fs-6 fw-bold mb-2 exam-name" data-translate>Examination Name</div>
                                 <div class="px-2" id="exam_name">Loading...</div>
                              </div>
                              <div class="d-flex justify-content-center align-items-center flex-column">
                                 <div class="fs-6 fw-bold mb-2 schoolna-title" data-translate>School Name</div>
                                 <div class="px-2" id="school_name">Loading...</div>
                              </div>
                              <div class="d-flex justify-content-center align-items-center flex-column">
                                 <div class="fs-6 fw-bold mb-2 license-type" data-translate>Licence Type</div>
                                 <div class="px-2" id="license_name">Loading...</div>
                              </div>
                              <div class="d-flex justify-content-center align-items-center flex-column">
                                 <div class="fs-6 fw-bold mb-2 tot-exam-attend" data-translate>Total Attended to Exam</div>
                                 <div class="px-2" id="total_attended">Loading...</div>
                              </div>

                           </div>
                           <div class="nk-block-head-content">
                              <div class="toggle-wrap nk-block-tools-toggle">
                                 <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                    data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                 <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">

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
                                                <option value="3" data-translate>Select All</option>
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
                                                                  
                                                               </div>
                                                               <div class="dropdown-body dropdown-body-rg">
                                                                  <form id="filter-form">
                                                                     <div class="row gx-6 gy-3">
                                                                     
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label class="overline-title overline-title-alt result" data-translate>Result</label>
                                                                           <select name="result" class="form-select form-select-sm js-select2" data-placeholder="select status">
                                                                              <option value=""></option>
                                                                              <option value="pass" data-translate>Pass</option>
                                                                              <option value="fail" data-translate>Fail</option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                    
                                                                     <div class="col-12">
                                                                        <div class="form-group"><button type="submit" class="btn btn-secondary apply-btn" data-translate>Apply</button></div>
                                                                     </div>
                                                                  </div>
                                                                  </form>
                                                               </div>
                                                                <div class="dropdown-foot between"><a class="clickable" href="javascript:void(0)" id="clear-filter" data-translate>Clear Filters</a>
                                                            </div>
                                                            </div>
                                                         </div>
                                                      </li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a  href="javascript:void(0)" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-setting"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                            <ul class="link-check">
                                                                  <li><span data-translate class="show-label">Show</span></li>
                                                                  <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input checked onchange="GetExamResultLists(1,{pageSize:10})"  type="checkbox"  class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input onchange="GetExamResultLists(1,{pageSize:20})" type="checkbox" class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input onchange="GetExamResultLists(1,{pageSize:50})" type="checkbox"  class="radio" value="1" name="fooby[1][]" ></a></li>
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
                                          <div class="search-content d-flex">
                                             <a href="javascript:void(0)" id="search-reset" class="search-bStudent IDk btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                             <input name="q" type="search" class="form-control border-transparent form-focus-none" placeholder="Search">
                                             <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                          </div>
                                      </form>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-inner p-0 text-center">
                                 <div class="nk-tb-list nk-tb-ulist" id="examination_results">
                                    
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
      $(function () {
         
         GetExamResultLists();

         $("#go-back").click(function(){
            pgIs = localStorage.getItem('pageNO');
            const url = new URL(base_url+"admin/examination?page=");
            location.href=url+pgIs;
            //location.href = document.referrer
         })
      });

      var page = getUrlParam('page') ? getUrlParam('page') : 1;
      var filters = '';
      var pageSize = 10;
      var query = '';

      function GetExamResultLists(pageNumber = page, option = {})
      {
         urlPage(pageNumber)

         $('.dropdown-menu').removeClass('show');
         $('.filter-wg').removeClass('show');
         $('.dropdown-toggle').removeClass('show');
         localStorage.setItem('current-active-tab','examination');

         let params = '';
         page = pageNumber;
         var sortby = option.sortBy ? option.sortBy : 2;
         pageSize = option.pageSize ? option.pageSize : pageSize;
         filters = option.filter ? option.filter : filters;
         query = option.q ? option.q : query

        params +=`page=${page}&sortby=${sortby}&pageSize=${pageSize}&${filters}&${query}`

         /*showLoader({
            title: "Please Wait",
            // text: "Fetching..."
         })*/

         let searchParams = new URLSearchParams(window.location.search)
         let id = searchParams.get("id")

         $.ajax({
            type: "get",
            url: `${api_base_url}exam-result/${id}?${params}`,
            headers:{
            "Authorization": `Bearer ${$.cookie("access_token")}`
         }
         }).done(({status, message, data, license_name, exam_name, school_name}) =>{
            if(status)
            {
               $("#exam_name").text(exam_name)
               $("#school_name").text(school_name)
               $("#license_name").text(license_name)
               $("#total_attended").text(data.total)
               
               addTextClr= resultData = '';

               if(data.data.length > 0)
               {
                   var langCode = localStorage.getItem('language-type');
                  languageText(langCode);

                  $("#examination_results").html(
                  `
                  <div class="nk-tb-item nk-tb-head exam-res-detail-list">
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold student-name" data-translate="Student Name">Student Name</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold date-time" data-translate="Date and Time">Date and Time</span></div>

                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold total-marks" data-translate="Total Marks">Total Marks</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold obt-score" data-translate="Marks Obtain">Marks Obtained</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold result" data-translate="Result">Result</span></div>
                     <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold action" data-translate="Action">Action</span>
                     </div>
                  </div>
                  `
               )
               if(langCode == 2){
                  $('.exam-res-detail-list div span').text('');
               }
               data.data.forEach(item =>{
                   function getFormattedDate(date,time) {
                              var year = date.getFullYear();
                              var month = (1 + date.getMonth()).toString();
                              month = month.length > 1 ? month : '0' + month;
                              var day = date.getDate().toString();
                              day = day.length > 1 ? day : '0' + day;

                              let hour = (time.split(':'))[0]
                              let min = (time.split(':'))[1]
                              let part = hour > 12 ? ' PM' : ' AM';
                                                  
                             min = (min+'').length == 1 ? `0${min}` : min;
                             hour = hour > 12 ? hour - 12 : hour;
                             hour = (hour+'').length == 1 ? `0${hour}` : hour;

                            return day + '-' + month + '-' + year + ' ' + hour+':' +min + part;
                           }
                           startDate = new Date(item.started_at);
                           var time = startDate.toLocaleTimeString();

                           selectedDate = getFormattedDate(startDate,time);

                            if(item.result == 'pass'){
                     resultData =`<button  type="button" class="btn btn-sm btn-success active-btn" style="background:#1abe92;padding: 4px 14px;border:none;">Pass</button>`;
                     addTextClr = "color:#e85347;";                              
                  }else{
                     resultData =`<button  type="button" class="btn btn-sm btn-danger inactive-btn" style="border:none;padding:4px 17px;">Fail</button>`
                     addTextClr = "color:#1abe92";                              
                  }

                  $("#examination_results").append(
                     `
                     <div class="nk-tb-item">
                        <div class="nk-tb-col tb-col-md">
                           <div class="user-info">
                              <span class="tb-lead">${item.student_name}</span>
                              <span>Student ID: ${item.student_id}</span>
                           </div>
                        </div>
                        <div class="nk-tb-col tb-col-md">${selectedDate}</div>
                        <div class="nk-tb-col tb-col-md">${item.total_marks}</div>
                        <div class="nk-tb-col tb-col-md">${item.obtained_marks}</div>
                        <div class="nk-tb-col tb-col-md" style="${addTextClr}">${resultData}</div>
                        <div class="nk-tb-col nk-tb-col-tools">
                           <ul class="">
                              <li>
                                 <div class="drodown">
                                 <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                         <div class="dropdown-menu dropdown-menu-end">
                                             <ul class="link-list-opt no-bdr">
                                                <li><a href="${formUrl('admin/schools/answersheet?id='+item.id)}"><em class="icon ni ni-eye"></em><span class="view-results" data-translate="View Results">View Results</span></a></li>
                                             </ul>
                                         </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     `
                  )
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
                        GetExamResultLists(pageNumber);
                     }
                  })
               }
               else
               {
                  $("#examination_results").html(`<div class="nk-tb-item-empty">
                     <p class="text-center text-black fw-bold"> No Examination Result Available</p>
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
          //  hideLoader();
         })
      }


      $("#sort_by").on("change", function(){
      GetExamResultLists(page, {
         sortBy: $(this).val()
      })
    })
    $("#searchExam").on("submit", function(e){
      e.preventDefault();
      GetExamResultLists(1, {
         q: $(this).serialize()
      })
    })
    $("#filter-form").on("submit", function(e){
        e.preventDefault();
        GetExamResultLists(1,{filter: $(this).serialize()})
    })

    $("#search-reset").click(function(){
      query = "";
      GetExamResultLists(1);
    });

    $('#clear-filter').click(function(e) {
        e.preventDefault();
        $('#status').select2('val','null');
         filters = '';
        GetExamResultLists(1);
    });

   
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