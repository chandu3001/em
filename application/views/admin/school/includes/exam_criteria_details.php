<style>
   .nk-content-fluid{
        margin-top: 125px;
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

            <div class="nk-content nk-content-fluid">
               <div class="container-xl wide-lg">
                  <div class="nk-content-body">
                     <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-head nk-block-head-sm nk-block-between" style="margin-top: -57px !important;float: right;">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" id="back--btn" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-arrow-left"></em><span class="back--btn" data-translate>Back</span></button>
                                    </div>
                                </div>
                        <div class="nk-block-between">
                           <div
                              class="nk-block-head-content w-100 bg-white rounded border d-flex justify-content-evenly py-3 align-items-center">

                              <div class="d-flex justify-content-center align-items-center flex-column">
                                 <div class="fs-6 fw-bold mb-2 exam-name" data-translate>Examination Name</div>
                                 <div class="px-2" id="exam_name"></div>
                              </div>

                              <div class="d-flex justify-content-center align-items-center flex-column">
                                 <div class="fs-6 fw-bold mb-2 license-type" data-translate>License Type</div>
                                 <div class="px-2" id="license_name"></div>
                              </div>
                               <div class="d-flex justify-content-center align-items-center flex-column">
                                 <div class="fs-6 fw-bold mb-2 sub-name" data-translate>Sub License Type</div>
                                 <div class="px-2" id="sublicense_name"></div>
                              </div>
                              <div class="d-flex justify-content-center align-items-center flex-column">
                                 <div class="fs-6 fw-bold mb-2 tot-exam-attend" data-translate>Total Attended to Exam</div>
                                 <div class="px-2" id="total_attended"></div>
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
                     <div class="nk-block text-capitalize">
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
                                                                           <select name="result" class="form-select form-select-sm js-select2" id="sel-statuss" data-placeholder="select status">
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
                                                               <div class="dropdown-foot between">
                                                                  <button id="clear-filter" class="link text-primary p-0" data-translate>Clear Filter</button>                                                               
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
                                                                   <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input checked onchange="GetExamResultLists(1,{page_size:10})"  type="checkbox"  class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                   <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input onchange="GetExamResultLists(1,{page_size:20})" type="checkbox" class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input onchange="GetExamResultLists(1,{page_size:50})" type="checkbox"  class="radio" value="1" name="fooby[1][]" ></a></li>
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
                                          <div class="search-content d-flex"><a href="javascript:void(0)" id='reset-search' class="search-bStudent IDk btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                             <input name="q" type="search" class="form-control border-transparent form-focus-none" placeholder="Search">
                                             <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                          </div>
                                      </form>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-inner p-0">
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
      });

    $.ajaxSetup({
        headers:{
            "Authorization": `Bearer ${$.cookie("access_token")}`
        }
      })
      let page = 1;
      var filters = '';
      var pageSize = 10;
      var query = '';

      function GetExamResultLists(pageNumber = page, option = {})
      {
         selectedDate = '';

         let params = '';
         page = pageNumber;
         var sortby = option.sortBy ? option.sortBy : 2;
         pageSize = option.page_size ? option.page_size : pageSize;
         filters = option.filter ? option.filter : filters;
         query = option.q ? option.q : query

         params +=`page=${page}&sortby=${sortby}&pageSize=${pageSize}&${filters}&${query}`

         /*showLoader({
            title: "Please Wait"
            // text: "Fetching..."
         })*/
         let searchParams = new URLSearchParams(window.location.search)
         let license_id = searchParams.get("id")
         $.ajax({
            type: "get",
            url: `${api_base_url}exam-result/${license_id}?${params}`
         }).done(({status, message, data, license_name, exam_name,sub_license_name}) =>{
            if(status)
            {
               $("#license_name").text(license_name)
               $("#exam_name").text(exam_name)
               $("#total_attended").text(data.total)
               $("#sublicense_name").text(sub_license_name)


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

                  $("#examination_results").html(
                  `
                  <div class="nk-tb-item nk-tb-head">
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold student-name" data-translate="StudentName">Student
                           Name</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold date-time" data-translate="Date & Time">Date & Time</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold tot-score" data-translate="Total Score">Total
                           Score</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold correct-ans" data-translate="Total Correct Answers">Total Correct Answers</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold wrong-ans" data-translate="Total Wrong Answers">Total Wrong Answers</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold obt-score" data-translate="Total Obtained Score">Total Obtained Score</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold result" data-translate="Result">Result</span></div>
                     <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold action" data-translate="Action">Action</span>
                     </div>
                  </div>
                  `
               )
               data.data.forEach(item =>{

               function getFormattedDate(date,time) {
                  var year = date.getFullYear();
                  var month = (1 + date.getMonth()).toString();
                  month = month.length > 1 ? month : '0' + month;
                  var day = date.getDate().toString();
                  day = day.length > 1 ? day : '0' + day;

                  /*let hour = (time.split(':'))[0]
                  let min = (time.split(':'))[1]
                  let part = hour > 12 ? ' PM' : ' AM';
                                    
                  min = (min+'').length == 1 ? `0${min}` : min;
                  hour = hour > 12 ? hour - 12 : hour;
                  hour = (hour+'').length == 1 ? `0${hour}` : hour;*/


                  return day + '-' + month + '-' + year + ' ' + time;
               }
               startDate = new Date(item.started_at);
               var time = startDate.toLocaleTimeString();

               timeIS = startDate.toLocaleTimeString().replace(/:\d+ /, ' ');
               selectedDate = getFormattedDate(startDate,timeIS);

               $("#examination_results").append(
                  `
                  <div class="nk-tb-item">
                     <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">
                        <div class="user-info">
                           <span class="tb-lead">${item.student_name}</span>
                           <span>Student ID: ${item.student_id}</span>
                        </div>
                     </div>
                     <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${selectedDate}</div>

                     <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.total_marks}</div>
                     <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.total_correct_answers}</div>
                     <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.total_wrong_answers}</div>
                     <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.obtained_marks}</div>
                     <div class="nk-tb-col tb-col-md student-info">${item.result}</div>
                     <div class="nk-tb-col nk-tb-col-tools">
                        <ul class="">
                           <li>
                              <div class="drodown">
                                 <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle"
                                    data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                 <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                       <li><a href="${formUrl('admin/schools/answersheet?id='+item.id)}"><em class="icon ni ni-eye"></em><span class="view-results">View Results</span></a></li>
                                    
                                 
                                    </ul>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  `
               )})

               $(".student-info").on("click", function () {

               studentModal.show();
               $('#national-id').val('');
               $('#contact-no').val('');
               $('#email').val('');
               studentId = $(this).attr('data-stud-id');

                  $.ajax({
                     type: "get",
                     async: false,
                     global: false,
                     url: 'https://dsms.technoiq.in/backend/api/auth/student/details/'+studentId,
                     success: function ({ data}) {
                        if (data) {
                        console.log('stud is'+data.result.nationality)

                        $('#national-id').val(data.result.nationality);
                        $('#contact-no').val(data.result.phone);
                        $('#email').val(data.result.email);

                        } else {
                           alert("something went wrong")
                        }
                     }
                  });


               });

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
                   noData =  (langCode == 2) ?  "لا توجد نتيجة فحص متاحة" : "No Examination Result Available";
                  $("#examination_results").html(`<div class="nk-tb-item-empty">
                     <p class="text-center text-black fw-bold">`+noData+ `</p>
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
      GetExamResultLists(page, {
         sortBy: $(this).val()
      })
    })
    $("#searchExam").on("submit", function(e){
      e.preventDefault();
      GetExamResultLists(page, {
         q: $(this).serialize()
      })
    })
    $("#filter-form").on("submit", function(e){
        e.preventDefault();
        GetExamResultLists(page,{filter: $(this).serialize()})
    })

    $('#clear-filter').click(function(e) {
           e.preventDefault();
           $('[name="result"]').select2('val','null');
           filters = '';
           GetExamResultLists(1, {filter: 'clearFilter'});
      });
      $('#reset-search').click(function(e) {
           e.preventDefault();
           $('[name="q"]').val('');
           query = '';
           GetExamResultLists(1);
      });

     $('#back--btn').click(function(){
        history.back();
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