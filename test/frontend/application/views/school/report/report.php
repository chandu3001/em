  <?php include_once APPPATH . 'views/school/includes/header.php'; ?>
   
   <style type="text/css">
      .iconss {
         margin-left: -30px;
         margin-top: -26px;
         position: relative;
         color: #31639c;
         font-size:20px;
      }
      .nk-tb-item .text-black{
         font-size: 14px!important;
      }
      #report_alignment{
         text-align:center !important;
      }

   .select2-search--inline {
      display: contents; /*this will make the container disappear, making the child the one who sets the width of the element*/
      }

      .select2-search__field:placeholder-shown {
          width: 100% !important; /*makes the placeholder to be 100% of the width while there are no options selected*/
      }
      @media (min-width: 576px) {
  /* .nk-wg1-block {
    padding: 0rem !important;
  }
  .nk-tb-col{
    padding:0px !important;
  } */
  .nk-tb-item .nk-tb-col:last-child {
    padding-right: 0rem !important;
  }
  .nk-tb-item .nk-tb-col:first-child {
    padding-left: 0rem !important;
}
}
@media(max-width:990px){
   .nk-tb-col:first-child{
      padding-left:0px !important;
   }
   .nk-tb-col{
      padding: 1rem 6px !important;
   }
}
@media(max-width:890px){
   .nk-tb-col{
      padding: 1rem 4px !important;
   }
}
@media(max-width:832px){
   .nk-tb-col{
      padding: 1rem 3px !important;
   }
}

@media(max-width:800px){
   .nk-tb-col{
      padding: 1rem 1px !important;
   }
}
   </style>
   <body class="nk-body npc-crypto bg-lighter has-sidebar " >
      <div class="nk-app-root">
         <div class="nk-main ">
            
            <?php include_once APPPATH . 'views/school/includes/sidebar.php'; ?>

            <div class="nk-wrap ">
               
               <?php include_once APPPATH . 'views/school/includes/navbar.php'; ?>

               <div class="nk-content nk-content-fluid">
                  <div class="container-xl wide-lg">
                     <div class="nk-content-body">
                        <div class="nk-block-head nk-block-head-sm">
                           <div class="nk-block-between">
                              <div class="nk-block-head-content">
                                 <h3 class="nk-block-title page-title reports" style="margin-bottom:-5px;">Reports</h3>
                                 <div class="nk-block-des text-soft">
                                    <p id="total-record">Loading...</p>
                                 </div>
                              </div>
                              <div class="nk-block-head-content">
                                 <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                       <ul class="nk-block-tools g-3"></ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="nk-block">
                           <div class="card card-bordered card-stretch">
                              <div class="card-inner-group">
                                 <div class="card-inner position-relative card-tools-toggle">
                                    <div class="card-title-group filter_align" style="float:right;margin-top: -18px;">
                                        <div class="card-tools me-n1">
                                       <ul class="btn-toolbar gx-1 align-items-center">
                                         <a class="btn btn-sm btn-primary d-none download" style="height: 29px;margin-right: 20px;" id="download-btn" href="">Download</a>
                                          <li>
                                             <div class="toggle-wrap">
                                                <a href="javascript:void(0)" class="btn btn-icon btn-trigger toggle"
                                                   data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                <div class="toggle-content" data-content="cardTools">
                                                   <ul class="btn-toolbar gx-1">
                                                      <li class="toggle-close"><a href="javascript:void(0)"
                                                            class="btn btn-icon btn-trigger toggle"
                                                            data-target="cardTools"><em
                                                               class="icon ni ni-arrow-left"></em></a></li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a class="btn btn-trigger btn-icon dropdown-toggle"
                                                               data-bs-toggle="dropdown">
                                                               <div class="dot dot-primary"></div>
                                                               <em class="icon ni ni-filter-alt"></em>
                                                            </a>

                                                            <div
                                                               class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                               <form id="filter-form">
                                                                  <div class="dropdown-head">
                                                                     <span class="sub-title dropdown-title filters">Filters</span>
                                                           
                                                                  </div>
                                                                  <div class="dropdown-body dropdown-body-rg">
                                                                     <div class="row gx-6 gy-3">
                                                                   
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt stud-name">Students Name
                                                                              </label>
                                                                              <select name="student_id[]" id="student-id"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-placeholder="Select Student" multiple>
                                                                              </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                           <div class="form-group">
                                                                              <label
                                                                                 class="overline-title overline-title-alt gender">Gender
                                                                              </label>
                                                                              <select name="gender" id='gender'
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-placeholder="Gender">
                                                                                 <option selected value=""></option>
                                                                                 <option value="0">All</option>
                                                                                 <option value="1">Male</option>
                                                                                 <option value="2">Female</option>
                                                                              </select>
                                                                           </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                           <div class="form-group">
                                                                              <label
                                                                                 class="overline-title overline-title-alt exam" id="etitle">Exam</label>
                                                                             <select name="exam_id[]"
                                                                                 id="exam-id"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-placeholder="Select Exam" multiple>
                                                                              </select>
                                                                           </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt license-type">License
                                                                              Type</label>
                                                                              <select name="license_id"
                                                                                 id="license_filter"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-placeholder="License Type">
                                                                              </select>
                                                                        </div>
                                                                     </div>
                                                                    
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt sub-name">Sub
                                                                              License Type</label>
                                                                              <select name="sub_id"
                                                                                 id="sub-license-filter"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-placeholder="Sub License">
                                                                              </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-12">
                                                                           <div class="form-group">
                                                                                <label class="overline-title overline-title-alt exam" id="att-lang" data-translate>Attended Language</label>
                                                                                <select name="att_lang"
                                                                                    id="att-lang-list"
                                                                                    class="form-select form-select-sm js-select2"
                                                                                    data-placeholder="Select Language">
                                                                                </select>
                                                                           </div>
                                                                        </div>
                                                                      <div class="col-12">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt dates">Dates</label>
                                                                              <select name="dates"
                                                                                 id="date-filter"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 >
                                                                                 <option  value="0" selected>Select Date</option>
                                                                                 <option value="1">Today</option>
                                                                                 <option value="2">Last 1 week</option>
                                                                                 <option value="3">Last 15 days</option>
                                                                                 <option value="4">Last 1 month</option>
                                                                              </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt from-label">From</label>
                                                                              <input placeholder="Select from date" type="text" name="from_date" id="datepicker" value="" class="form-control dates-filter">
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                        
                                                                          <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt to-label">To</label>
                                                                              <input placeholder="Select end date" type="text" name="to_date" id="datepicker1" value="" class="form-control dates-filter">
                                                                        </div>
                                                                     </div>
                                                                  
                                                                        <div class="col-12">
                                                                           <div class="form-group"><button type="submit"
                                                                                 class="btn btn-secondary apply-btn">Apply</button>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                   <div class="dropdown-foot between"><a href="javascript:void(0)"
                                                                        class="clickable" id="clear-filter"
                                                                        >Clear
                                                                        Filters</a></div>
                                                               </form>
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
                                    
                                 </div>
                                 <div class="card-inner p-0 overflow-auto">
                                    <div class="nk-tb-list nk-tb-ulist" id="search_list">
                                       
                                    </div>
                                 </div>
                                 <div class="card-inner" id="search_list_pagination">
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
      <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>
      <script src="<?php echo base_url('assets/js/libs/simplePagination.js'); ?>"></script>
     
      
      <script>

       $(function () {
           // Ajax request setup
            $.ajaxSetup({
                headers: {
                    'Authorization': `Bearer ${$.cookie("access_token")}`
                },
                dataType: 'json'
            });

            getSearchList();
            getLicenseList2();
            getStudentList('#student-id');
            getExamList('#exam-id',JSON.stringify([["0"]]));

            var currentDate = new Date();
            var todayIS =  currentDate.getDate() + '-' + ( '0' + (currentDate.getMonth()+1) ).slice( -2 ) + '-' + currentDate.getFullYear();

         dateTo = moment().format('DD-MM-YYYY');
         dateFrom = moment().subtract(6,'d').format('DD-MM-YYYY');
         dateFrom15 = moment().subtract(14,'d').format('DD-MM-YYYY');
         dateFrom30 = moment().subtract(29,'d').format('DD-MM-YYYY');


            function getYesterdaysDate() {
                var date = new Date();
                date.setDate(date.getDate()-1);
                return date.getDate() + '-' + ( '0' + (date.getMonth()+1) ).slice( -2 ) + '-' + date.getFullYear();
            }

            function getLastWeek(selDay) {
              var today = new Date();
              var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - selDay);
              return lastWeek;
            }

            var lastWeek = getLastWeek(7);
            var lastWeekMonth = lastWeek.getMonth() + 1;
            var lastWeekDay = lastWeek.getDate();
            var lastWeekYear = lastWeek.getFullYear();

            var last15 = getLastWeek(15);
            var last15Month = last15.getMonth() + 1;
            var last15Day = last15.getDate();
            var last15Year = last15.getFullYear();

            var last30 = getLastWeek(30);
            var last30Month = last30.getMonth() + 1;
            var last30Day = last30.getDate();
            var last30Year = last30.getFullYear();

            var lastWeekIs = ("00" + lastWeekDay.toString()).slice(-2) + "-" + ("00" + lastWeekMonth.toString()).slice(-2) + "-" + ("0000" + lastWeekYear.toString()).slice(-4);

            var last15Days = ("00" + last15Day.toString()).slice(-2) + "-" + ("00" + last15Month.toString()).slice(-2) + "-" + ("0000" + last15Year.toString()).slice(-4);

            var last30Days = ("00" + last30Day.toString()).slice(-2) + "-" + ("00" + last30Month.toString()).slice(-2) + "-" + ("0000" + last30Year.toString()).slice(-4);
            var yesterdaysDate = getYesterdaysDate();


             $('#datepicker').datepicker({
                  format: 'dd-mm-yyyy',
                  endDate: "currentDate",
                  maxDate: currentDate
              }).on("changeDate", function (e) {
                   $('#datepicker1').datepicker('setStartDate', e.date);
              });

              $('#datepicker1').datepicker({
                  format: 'dd-mm-yyyy'
              });

              $("#date-filter").change(function(){
                  $('#datepicker').attr("disabled", true);
                  $('#datepicker1').attr("disabled", true);
                  $('#datepicker').val("");
                  $('#datepicker1').val("");
                  if($(this).val() == 0){
                    $('#datepicker').attr("disabled", false);
                    $('#datepicker1').attr("disabled", false);
                  }
                  else if($(this).val() == 1){
                    $('#datepicker').val(dateTo);
                     $('#datepicker1').val(dateTo);
                  }else if($(this).val() == 2){
                     $('#datepicker').val(dateFrom);
                     $('#datepicker1').val(dateTo);
                  }else if($(this).val() == 3){
                     $('#datepicker').val(dateFrom15);
                     $('#datepicker1').val(dateTo);
                  }else if($(this).val() == 4){
                     $('#datepicker').val(dateFrom30);
                     $('#datepicker1').val(dateTo);
                  }else{
                     $('#datepicker').attr("disabled", true);
                     $('#datepicker1').attr("disabled", true);
                     $('.dates-filter').val('');
                  }
               });
        });   

   $("#exam-id").on('change', function(){
    if($(this).val())
    {
        $.ajax({
        type: "POST",
        url: api_base_url + "get-language-by-exam-ids",
        data: {
            exam_ids: $(this).val()
        }
        }).done(({data, status, message})=>{
            if(status)
            {
                $("#att-lang-list").html('<option></option>')
                
                data.forEach(item => {
                    $("#att-lang-list").append(`
                        <option value='${item.language_code}'>${item.language_name}</option>
                    `)
                })
            }
        }).fail(()=>{
            NioApp.Toast('Error Occurred!', 'error')
        })
    }
    else{
        $("#att-lang-list").html('<option></option>')
    }
})
      function getLicenseList2()
      {
         $.ajax({
            type: "get",
            url: `https://dsms.technoiq.in/backend/api/auth/all_main_license/${$.cookie('school_id')}`
         }).done(({errors, data}) =>{
            if(!errors)
            {
               $("#license_filter").html('').append('<option value="0" selected>Select License</option>');
               data.result.forEach(item =>{
                  $("#license_filter").append(`<option value="">Choose license</option><option value="${item.id}">${item.name}</option>`)
               })
            }
            else
            {
               NioApp.Toast("Error Occurred", "error");
            }
         })
      }

      $('#license_filter').on('change', function() {
           selval =  this.value ;
           getSubLicenseList("#sub-license-filter",selval);
      });

      var retval = [];    

      const getSubLicenseList = (target = false, license_id) => {
           let response;

           // Reset element content
           $(target).html('').append('<option value="0">Select</option>');
           
           $.ajax({
              type: "get",
              async: false,
              global: false,
              url: 'https://dsms.technoiq.in/backend/api/auth/sub_license_list/'+license_id,
              
              success: function ({ data, errors }) {
                 if (!errors) {
                       if(target) {
                          data.result.sub_license_list.forEach((item) => {
                             $(target).append(`<option value='${item.id}'>${item.name}</option>`)
                          });
                       } else {
                          response = data.result;
                       }
                 } else {
                    
                 }
              }
           });
            return response;
      }

      const getStudentList = (target = false) => {
           let response;

           // Reset element content
           $(target).html('').append('<option value=""></option>');
           $(target).select2({ placeholder: 'Select an option' })
           
           $.ajax({
               type: "get",
               url: formApiUrl(`get-students-by-school-id/${$.cookie("school_id")}`),
              
              success: function ({ data, errors }) {
                 if (!errors) {
                       if(target) {
                          data.forEach((item) => {
                              $(target).append(`<option value='${item.id}'>${item.student_name}</option>`)
                          });
                       } else {
                          response = data.result;
                       }
                 } else {
                 }
              }
           });
         return response;
      }

      const getExamList = (target = false,school_id) => {
           let response;

           // Reset element content
           $(target).html('').append('<option value="">Select</option>');
           
           $.ajax({
               type: "POST",
               url: formApiUrl(`get-exams-by-school-ids`),
               data: { school_ids: JSON.stringify([[$.cookie("school_id")]]) },
              
              success: function ({ data, errors }) {
                 if (!errors) {
                       if(target) {
                          data.forEach((item) => {
                              $(target).append(`<option value='${item.exam_id}'>${item.exam_name}</option>`)
                          });
                       } else {
                          response = data.result;
                       }
                 } else {
                 }
              }
           });
         return response;
      }


       var page = 1;

       var filters = '';

      function getSearchList(pageNumber = page, param=null)
      {
         /*showLoader({
            title: "Please Wait",
            // text: "Please Wait..."
        })*/

         $('#download-btn').attr('href',formApiUrl(`reports/${$.cookie('school_id')}?${param}&download`));
         
         $('.dropdown-menu').removeClass('show');
         $('.filter-wg').removeClass('show');

        page = pageNumber;

         $.ajax({
            type: "GET",
            url: formApiUrl(`reports/${$.cookie('school_id')}?page=${page}`),
            data: param,
         }).done(({status, data})=>{
            if(status)
            {
               $("#total-record").text(`Total ${data.total} records`);

               if(data.total > 0)
               {
                  var langCode = localStorage.getItem('language-type');
                  languageText(langCode);
                  addTextClr= resultData = '';

                  $("#download-btn").removeClass('d-none')

                  $("#search_list").html(`
                  <div class="nk-tb-item nk-tb-head report-detail-list">
                     <div class="nk-tb-col"><span class="text-black fw-bold slno">Sl.No</span></div>
                     <div class="nk-tb-col"><span class="text-black fw-bold student-title">Student</span></div>
                     <div class="nk-tb-col tb-col-md" id="report_exam_date" style="padding-right:25px"><span class="text-black fw-bold license-name">License</span></div>
                     <div class="nk-tb-col tb-col-md" id="report_exam_date" style="padding-right:28px"><span class="text-black fw-bold sublicensename">Sub License</span></div>
                     <div class="nk-tb-col tb-col-md" id="report_exam_date" style="padding-right:27px"><span class="text-black fw-bold exam">Exam</span></div>
                     <div class="nk-tb-col tb-col-md col-md-2" id="date_time_align" style="text-align:center !important;"><span class="text-black fw-bold date-time">Date &Time</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold language-title">Language</span></div>
                     <div class="nk-tb-col tb-col-md col-md-2" style="text-align: center !important;"><span class="text-black fw-bold total-marks" >Total Marks</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold question">Questions</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold correct-ans">Correct Answers</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold wrong-ans">Wrong Answers</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold scores">Score</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold Result">Result</span></div>
                  </div>
               `)
               if(langCode == 2){
                    $('.report-detail-list div span').text('');
                }
               data.data.forEach(item => {
                  var student = item.full_name;
                  var sid = item.id_number;
                  var nid = item.student_id;

                  if(item.gender == 1){
                     gender = 'Male';
                  }else{
                     gender = 'Female';
                  }

                  

                  examDate = moment(item.date_time).format('d-m-Y h:m:s A');

                  if(item.result == 'pass'){
                     resultData =`<button  type="button" class="btn btn-sm btn-success" style="background:#1abe92;padding: 4px 14px;border:none;">Pass</button>`;
                     addTextClr = "color:#e85347;";                              
                  }else{
                     resultData =`<button  type="button" class="btn btn-sm btn-danger " style="border:none;padding:4px 17px;">Fail</button>`
                     addTextClr = "color:#1abe92";                              
                  }

                  $("#search_list").append(`
                  <div class="nk-tb-item">
                     <div class="nk-tb-col tb-col-md">${data.from++}</div>

                     <div class="nk-tb-col">
                        <div class="user-card" id="report_user_card">
                           <div class="d-flex flex-column">
                              <span class="tb-lead">${student}</span>
                              <span>Student ID: ${nid}</span>
                              <span>National ID: ${sid}</span>
                              <span><span class="gender" data-translate="Gender">Gender</span>: ${gender}</span>
                           </div>
                        </div>
                     </div>
                     <div class="nk-tb-col tb-col-md">${item.license_name}</div>
                     <div class="nk-tb-col tb-col-md">${item.sub_license_name}</div>
                     <div class="nk-tb-col tb-col-md">${item.exam_name}</div>
                     <div class="nk-tb-col tb-col-md" id="date_report_align" style="text-align:center !important" >${examDate}</div>
                     <div class="nk-tb-col tb-col-md">${item.language_name}</div>
                     <div class="nk-tb-col tb-col-md" id="report_alignment">${item.total_marks}</div>
                     <div class="nk-tb-col tb-col-md" id="report_alignment">${item.total_questions}</div>
                     <div class="nk-tb-col tb-col-md" id="report_alignment">${item.total_correct_answers}</div>
                     <div class="nk-tb-col tb-col-md" id="report_alignment">${item.total_wrong_answers}</div>
                     <div class="nk-tb-col tb-col-md" id="report_alignment">${item.obtained_marks}</div>
                     <div class="nk-tb-col tb-col-md" style="${addTextClr}">${resultData}</div>
                  </div>
                  `)
               })

               $("#search_list_pagination").pagination({
                    items: parseInt(data.total),
                    itemsOnPage: parseInt(data.per_page),
                    currentPage: data.current_page,
                    displayedPages: 3,
                    navStyle: "pagination justify-content-center justify-content-md-start",
                    listStyle: "page-item",
                    linkStyle: "page-link",
                    onPageClick: function (pageNumber, event) {
                        event ? event.preventDefault() : '';
                        getSearchList(pageNumber,param);
                    }
                })
               }
               else
               {
                  $("#search_list").html(`<h4 class='text-center p-2'>No Data Found</h4>`)
                  $("#search_list_pagination").html('')
                  $("#download-btn").addClass('d-none')

               }

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

    $("#filter-form").on("submit", function(e){

      e.preventDefault();
      // var students   = $(this).find('select[name="student_id[]"]').val();
      // var gender     = $(this).find('select[name="gender"]').val();
      // var exams      = $(this).find('select[name="exam_id[]"]').val();
      // var license    = $(this).find('select[name="license_id"]').val();
      // var sublicense = $(this).find('select[name="sub_id"]').val();
      // var dates      = $(this).find('select[name="dates"]').val();
      // var fromDate   = $(this).find('input[name="from_date"]').val();
      // var toDate     = $(this).find('input[name="to_date"]').val();

      // params =`student_id=${students}&gender=${gender}&exam_id=${exams}&license_id=${license}&sub_license_id=${sublicense}&dates=${dates}&from_date=${fromDate}&to_date=${toDate}`
      
      getSearchList(1,$(this).serialize())
    })

    $(".reset").on("click", function() {
         $("#student-id,#gender,#exam-id,#license_filter,#sub-license-filter").empty();
         $('#student-id').select2('val','null');
         $('#gender').select2('val','null');
         $('#exam-id').select2('val','null');
         $('#license_filter').select2('val','null');
         $('#sub-license-filter').select2('val','null');
         $('#date-filter').select2('val','null');
         $('#datepicker').attr("disabled", false);
         $('#datepicker1').attr("disabled", false);
        $('#filter-form')[0].reset();

      });

     $('#clear-filter').click(function(){
      $('#school-id').select2('val','0');
      $('#student-id').select2('val','0');
      $('#gender').select2('val','0');
      $('#exam-id').select2('val','0');
      $('#license_filter').select2('val','0');
      $('#sub-license-filter').select2('val','0');
      $('#date-filter').select2('val','0');
      $('#datepicker').val('');
      $('#datepicker1').val('');
      $('input[disabled="disabled"]').prop('disabled', false)
      $('a.btn.btn-trigger.btn-icon.dropdown-toggle').removeClass('show')

      getSearchList(1, {filter: 'clearFilter'});
    })
   </script>
   </body>
</html>