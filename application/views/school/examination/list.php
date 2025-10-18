<?php include_once APPPATH . 'views/school/includes/header.php'; ?>

<body class="nk-body npc-crypto bg-lighter has-sidebar ">
   <div class="nk-app-root">
      <div class="nk-main ">

         <?php include_once APPPATH . 'views/school/includes/sidebar.php'; ?>

         <div class="nk-wrap ">

            <?php include_once APPPATH . 'views/school/includes/navbar.php'; ?>

            <div class="nk-content nk-content-fluid">
               <div class="container-xl wide-lg">
                  <div class="nk-content-body">
                     <div class="nk-block-head nk-block-head-sm">

                        <div class="nk-block-between-md g-4">
                           <div class="nk-block-head-content">
                           </div>
                           <div class="nk-block-head nk-block-head-sm nk-block-between"
                              style="margin-bottom: 37px !important;">
                              <div class="btn-group">
                                 <button type="button" class="btn btn-primary dropdown-toggle back--btn"
                                    data-bs-toggle="dropdown" aria-expanded="false"><em
                                       class="icon ni ni-arrow-left"></em><span class="back-btn" data-translate>Back</span></button>
                              </div>
                           </div>
                        </div>

                        <div class="nk-block-between">
                           <div
                              class="nk-block-head-content w-100 bg-white rounded border d-flex justify-content-evenly py-3 align-items-center">

                              <div class="d-flex justify-content-center align-items-center flex-column">
                                 <div class="fs-6 fw-bold mb-2 exam-name">Examination Name</div>
                                 <div class="px-2" id="exam_name"></div>
                              </div>

                              <div class="d-flex justify-content-center align-items-center flex-column">
                                 <div class="fs-6 fw-bold mb-2 license-type">License Type</div>
                                 <div class="px-2" id="license_name"></div>
                              </div>
                              <div class="d-flex justify-content-center align-items-center flex-column">
                                 <div class="fs-6 fw-bold mb-2 sub-name">Sub License Type</div>
                                 <div class="px-2" id="sublicense_name"></div>
                              </div>
                              <div class="d-flex justify-content-center align-items-center flex-column">
                                 <div class="fs-6 fw-bold mb-2 tot-exam-attend">Total Attended to Exam</div>
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
                     <div class="nk-block" style="top: 28px; position: relative;">
                        <div class="card card-bordered card-stretch">
                           <div class="card-inner-group">
                              <div class="card-inner position-relative card-tools-toggle">
                                 <div class="card-title-group">
                                    <div class="card-tools">
                                       <div class="form-inline flex-nowrap gx-3">
                                          <div class="form-wrap w-150px">
                                             <select id="sort_by"
                                                class="form-select form-select-sm js-select2 select2-hidden-accessible"
                                                data-search="off" data-placeholder="Sort By">
                                                <option value=""></option>
                                                <option value="0">Select All</option>
                                                <option value="1">Ascending</option>
                                                <option value="2">Descending</option>
                                             </select>
                                          </div>

                                       </div>
                                    </div>
                                    <div class="card-tools me-n1">
                                       <ul class="btn-toolbar gx-1">
                                          <li><a href="javascript:void(0)"
                                                class="btn btn-icon search-toggle toggle-search"
                                                data-target="search"><em class="icon ni ni-search"></em></a></li>
                                          <li class="btn-toolbar-sep"></li>
                                          <li>
                                             <div class="toggle-wrap">
                                                <a href="javascript:void(0)" class="btn btn-icon btn-trigger toggle"
                                                   data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                <div class="toggle-content" data-content="cardTools">
                                                   <ul class="btn-toolbar gx-1">
                                                      <li class="toggle-close"><a href="javascript:void(0)"
                                                            class="btn btn-icon btn-trigger toggle"
                                                            data-target="cardTools"><em
                                                               class="icon ni ni-cross"></em></a></li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="javascript:void(0)"
                                                               class="btn btn-trigger btn-icon dropdown-toggle"
                                                               data-bs-toggle="dropdown">
                                                               <div class="dot dot-primary"></div>
                                                               <em class="icon ni ni-filter-alt"></em>
                                                            </a>
                                                            <div
                                                               class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                               <div class="dropdown-head">
                                                                  <span class="sub-title dropdown-title filter-label">Filters</span>

                                                               </div>
                                                               <div class="dropdown-body dropdown-body-rg">
                                                                  <form id="filter-form">
                                                                     <div class="row gx-6 gy-3">

                                                                        <div class="col-6">
                                                                           <div class="form-group">
                                                                              <label
                                                                                 class="overline-title overline-title-alt result">Result</label>
                                                                              <select name="result" id="license-filter"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-placeholder="Select Result">
                                                                                 <option value=""></option>
                                                                                 <option value="pass">Pass</option>
                                                                                 <option value="fail">Fail</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                           <div class="form-group"><button type="submit"
                                                                           class="btn btn-secondary apply-btn">Apply</button>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="dropdown-foot between">
                                                                     <button type='reset'
                                                                        class="clickable bg-transparent border-0 text-primary"
                                                                        id='form_clear'>Clear Filters</button>
                                                                        <!-- <a href="javascript:void(0)">Save Filters</a> -->
                                                                     </div>
                                                            </div>
                                                         </div>
                                                      </li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="javascript:void(0)"
                                                               class="btn btn-trigger btn-icon dropdown-toggle"
                                                               data-bs-toggle="dropdown"><em
                                                                  class="icon ni ni-setting"></em></a>
                                                            <div
                                                               class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                               <ul class="link-check">
                                                                  <li><span class="show-label">Show</span></li>
                                                                  <li><a href="javascript:void(0)"
                                                                        style="justify-content: space-between;">10
                                                                        <input checked
                                                                           onchange="GetExamResultLists(1,{pageSize:10})"
                                                                           type="checkbox" class="radio" value="1"
                                                                           name="fooby[1][]"></a></li>
                                                                  <li><a href="javascript:void(0)"
                                                                        style="justify-content: space-between;">20
                                                                        <input
                                                                           onchange="GetExamResultLists(1,{pageSize:20})"
                                                                           type="checkbox" class="radio" value="1"
                                                                           name="fooby[1][]"></a></li>
                                                                  <li><a href="javascript:void(0)"
                                                                        style="justify-content: space-between;">50
                                                                        <input
                                                                           onchange="GetExamResultLists(1,{pageSize:50})"
                                                                           type="checkbox" class="radio" value="1"
                                                                           name="fooby[1][]"></a></li>

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
                                       <form id="searchExam" class="mb-0 w-100">
                                          <div class="search-content d-flex">
                                             <a href="javascript:void(0)" id="search-reset"
                                                class="search-bk btn btn-icon toggle-search" data-target="search"><em
                                                   class="icon ni ni-cross"></em></a>
                                             <input name="q" type="search"
                                                class="form-control border-transparent form-focus-none"
                                                placeholder="Search">
                                             <button class="search-submit btn btn-icon"><em
                                                   class="icon ni ni-search"></em></button>
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
            <?php include_once APPPATH . 'views/school/includes/footer.php'; ?>


         </div>
      </div>
   </div>

   <div class="modal fade" id="studentInfoModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="">Student Information</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="mb-3">
                  <label for="lang-name" class="col-form-label">National ID</label>
                  <div class="form-control-wrap">
                     <input type="text" class="form-control" id="national-id">
                  </div>
               </div>
               <div class="mb-3">
                  <label for="lang-name" class="col-form-label">Contact No</label>
                  <div class="form-control-wrap">
                     <input type="text" class="form-control" id="contact-no">
                  </div>
               </div>
               <div class="mb-3">
                  <label for="lang-name" class="col-form-label">Email ID</label>
                  <div class="form-control-wrap">
                     <input type="text" class="form-control" id="email">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>




   <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>
   <script src="<?php echo base_url('assets/js/libs/simplePagination.js');?>"></script>

   <script>
      $(function () {
         async function init() {
            const auth = await appModule.checkAuth();
         }
         GetExamResultLists();
         init();
      });


      var studentModal = new bootstrap.Modal(
         document.getElementById("studentInfoModal"),
         {
            backdrop: "static",
            keyboard: false,
         }
      );

      var page = getUrlParam('page') ? getUrlParam('page') : 1;
      var filters = '';
      var pageSize = 10;
      var query = '';

      function GetExamResultLists(pageNumber = page, option = {}) {
         selectedDate = '';
         urlPage(pageNumber)
        
        localStorage.setItem('current-active-tab','examination');

         if(option.clear)
        {
            filters = '';
        }

         if(langCode == 2){
          $("#preloader2").show();
            setTimeout(function () {
               setTimeout(function () {
                   $("#preloader2").hide();
               }, 1000);
            }, 500);
        }

         let params = '';
         page = pageNumber;
         var sortby = option.sortBy ? option.sortBy : 0;
         pageSize = option.pageSize ? option.pageSize : pageSize;
         filters = option.filter ? option.filter : filters;
         query = option.q ? option.q : query;

         params += `page=${page}&sortby=${sortby}&pageSize=${pageSize}&${filters}&${query}`

         /*showLoader({
            title: "Please Wait",
            // text: "Fetching..."
         })*/
         
         let searchParams = new URLSearchParams(window.location.search)
         let license_id = searchParams.get("id")
         $.ajax({
            type: "get",
            url: `${api_base_url}exam-result/${license_id}?${params}`
         }).done(({ status, message, data, students_info, license_name, exam_name, sub_license_name }) => {
            if (status) {
               $("#license_name").text(license_name)
               $("#exam_name").text(exam_name)
               $("#total_attended").text(data.total)
               $("#sublicense_name").text(sub_license_name)

               addTextClr = resultData = '';

               if (data.data.length > 0) {
                  var langCode = localStorage.getItem('language-type');
                  languageText(langCode);
                 
           
                  $("#examination_results").html(
                     `
                  <div class="nk-tb-item nk-tb-head">
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold student-name">Student
                           Name</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold date-time">Date & Time</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold tot-score">Total </br>
                           Score</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold correct-ans">Correct </br> Answer</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold wrong-ans">Wrong </br> Answer</span></div>
                     <div class="nk-tb-col tb-col-md" id="exam_question"><span class="text-black fw-bold obtain-score">Obtained </br> Score</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold result">Result</span></div>
                     <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold action">Action</span>
                     </div>
                  </div>
                  `
                  )
                  data.data.forEach(item => {

                     function getFormattedDate(date, time) {

                        var year = date.getFullYear();
                        var month = (1 + date.getMonth()).toString();
                        month = month.length > 1 ? month : '0' + month;
                        var day = date.getDate().toString();
                        day = day.length > 1 ? day : '0' + day;

                        let hour = (time.split(':'))[0]
                        let min = (time.split(':'))[1]
                        let part = hour > 12 ? ' PM' : ' AM';

                        min = (min + '').length == 1 ? `0${min}` : min;
                        hour = hour > 12 ? hour - 12 : hour;
                        hour = (hour + '').length == 1 ? `0${hour}` : hour;

                        return day + '-' + month + '-' + year + ' <br> ' + hour + ':' + min;

                        //return day + '-' + month + '-' + year + ' ' + hour+':' +min + part;
                     }
                     startDate = new Date(item.started_at);
                     var time = startDate.toLocaleTimeString().replace(/:\d+ /, ' ');

                     selectedDate = getFormattedDate(startDate, time);

                     tooltipData = students_info[item.student_id].split(' ');

                     // $.ajax({
                     //    type: "get",
                     //    async: false,
                     //    global: false,
                     //    url: 'https://dsms.technoiq.in/backend/api/auth/student/details/'+item.student_id,
                     //    success: function ({ data}) {
                     //       if (data) {
                     //         //console.log('stud is'+data.result.id)
                     //         //console.log('stud is22'+item.student_id)

                     //         if(data.result.student_id == item.student_id){
                     //          tooltipData = 'Phone:'+data.result.phone+','+'Email :' + data.result.email+','+'National ID :' + data.result.national_id; 
                     //         }

                     //       } 
                     //    }
                     // });


                     if (item.result == 'pass') {
                        resultData = `<button  type="button" class="btn btn-sm btn-success pass" style="background:#1abe92;padding: 4px 14px;border:none;">Pass</button>`;
                        addTextClr = "color:#e85347;";
                     } else {
                        resultData = `<button  type="button" class="btn btn-sm btn-danger fail" style="border:none;padding:4px 17px;">Fail</button>`
                        addTextClr = "color:#1abe92";
                     }

                     $("#examination_results").append(
                        `
                     <div class="nk-tb-item toolparent" data-toggle="tooltip" data-placement="top">
                        <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">
                        <div class="position-absolute rounded bg-white p-2 text-secondary" style="top: 80px; width: max-content; z-index: 99; box-shadow: lightgray 0px 0px 10px; letter-spacing: 1px; left: 0px; display: none;">
                           <ul>
                              <li>Phone: ${tooltipData[0]}</li>
                              <li>Email: ${tooltipData[1]}</li>
                              <li>National Id: ${tooltipData[2]}</li>
                           </ul>
                        </div>
                           <div class="user-info" >
                              <span class="tb-lead">${item.student_name}</span>
                              <span>Student ID: ${item.student_id}</span>
                           </div>
                        </div>
                        <div class="nk-tb-col tb-col-md student-info" style=" padding-right: 10px !important;" data-stud-id="${item.student_id}">${selectedDate}</div>

                        <div class="nk-tb-col tb-col-md student-info" style="text-align:center !important; padding-right: 39px !important;" data-stud-id="${item.student_id}">${item.total_marks}</div>
                        <div class="nk-tb-col tb-col-md student-info" style="text-align:center !important; padding-right: 49px !important;" data-stud-id="${item.student_id}">${item.total_correct_answers}</div>
                        <div class="nk-tb-col tb-col-md student-info" style="text-align:center !important; padding-right: 50px !important;" data-stud-id="${item.student_id}">${item.total_wrong_answers}</div>
                        <div class="nk-tb-col tb-col-md student-info"  id="qpool_num" style="text-align:center !important; padding-right: 61px !important;" data-stud-id="${item.student_id}">${item.obtained_marks}</div>
                        <div class="nk-tb-col tb-col-md student-info text-capitalize" style="${addTextClr}">${resultData}</div>
                        <div class="nk-tb-col nk-tb-col-tools">
                           <ul class="">
                              <li>
                                 <div class="drodown">
                                    <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle"
                                       data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                       <ul class="link-list-opt no-bdr">
                                          <li><a href="${formUrl('school/examination/answersheet?id=' + item.id)}"><em class="icon ni ni-eye"></em><span class="view-results">View Results</span></a></li>
                                       
                                    
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

               $('.toolparent').mouseenter(function () {
                  $($(this)[0].firstElementChild.firstElementChild).show();
               })
               $('.toolparent').mouseleave(function () {
                  $($(this)[0].firstElementChild.firstElementChild).hide();
               })
               }
               else {
                  $("#examination_results").html(`<div class="nk-tb-item-empty">
                     <p class="text-center text-black fw-bold"> No Examination Result Available</p>
                  </div>`);
                  $("#exam-list-pagination").html('')
               }


               /* $(".student-info").on("click", function () {
    
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
    
    
                });*/

               
            }
            else {
               NioApp.Toast(message, "warning");
            }
         }).fail(({ statusText, status, responseJSON }) => {
            if (status == 400)
               NioApp.Toast(responseJSON.message, "error");
            else
               NioApp.Toast(statusText, "error");
         }).always(() => {
            hideLoader();
         })
      }

      $("#sort_by").on("change", function () {
         GetExamResultLists(page, {
            sortBy: $(this).val()
         })
      })
      $("#searchExam").on("submit", function (e) {
         e.preventDefault();
         GetExamResultLists(page, {
            q: $(this).serialize()
         })
      })
      $("#filter-form").on("submit", function (e) {
         e.preventDefault();
         GetExamResultLists(page, { filter: $(this).serialize() })
      })

      $("#search-reset").click(function () {
         query = '';
         GetExamResultLists();
      })
 
      $('#form_clear').click(function()
      {
         ($('#filter-form')[0]).reset();
         $("#license-filter").select2('val','null');
         GetExamResultLists(1,{clear : true});
      })
   </script>
   <script>
      // the selector will match all input controls of type :checkbox
      // and attach a click event handler 
      $("input:checkbox").on('click', function () {
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

      $('.back--btn').click(function(){
            location.href = "<?php echo base_url("school/examination?page=1");?>"
      })

   </script>
</body>

</html>