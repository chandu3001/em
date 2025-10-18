  <?php include_once APPPATH . 'views/admin/includes/header.php'; ?>
   
   <style type="text/css">
      .iconss {
         margin-left: -30px;
         margin-top: -26px;
         position: relative;
         color: #31639c;
         font-size:20px;
      }

      .nk-content-fluid{
         top: 65px;
         position: relative;
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
@media(max-width:1390px){
   .nk-tb-col{
      padding: 1rem 5px !important;
   }
}
@media(max-width:1240px){
   .nk-tb-col{
      padding: 1rem 5px !important;
   }
}
@media(max-width:1210px){
   .nk-tb-col{
      padding: 1rem 4px !important;
   }
}
@media(max-width:990px){
   .nk-tb-col:first-child{
      padding-left:0px !important;
   }
   .nk-tb-col{
      padding: 1rem 1px !important;
   }
}
@media(max-width:890px){
   .nk-tb-col{
      padding: 1rem 1px !important;
   }
   .nk-tb-list .nk-tb-col {
    font-size: 11px !important;
}
.nk-tb-item .text-black{
   font-size: 13px !important;
}
}
@media(max-width:790px){
   .nk-tb-col{
      padding: 1rem 0px !important;
   }
}

/* @media(max-width:800px){
   .nk-tb-col{
      padding: 1rem 1px !important;
   }
} */

   </style>
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
                                 <h3 class="nk-block-title page-title reports" data-translate>Reports</h3>
                                 <div class="nk-block-des text-soft">
                                    <!-- <p id="total-record">Loading...</p> -->
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
                                 <div class="card-inner position-relative card-tools-toggle report-inner">
                                    <div class="card-title-group filter_align" style="float:right;margin-top: -18px;">
                                        <div class="card-tools me-n1">
                                       <ul class="btn-toolbar gx-1">
                                         <a class="btn btn-sm btn-primary d-none download" style="height: 29px;margin-right: 20px;" id="download-btn" href="" data-translate>Download</a>
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
                                                                     <span class="sub-title dropdown-title filters" data-translate>Filters</span>
                                                           
                                                                  </div>
                                                                  <div class="dropdown-body dropdown-body-rg">
                                                                     <div class="row gx-6 gy-3">
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt school-name" data-translate>School Name
                                                                              </label>
                                                                              <select name="school_id[]"
                                                                                 id="school-id"
                                                                                 class="form-select form-select-sm js-select2 sel-school"
                                                                                 data-placeholder="Select School" multiple>
                                                                              </select>
                                                                        </div>
                                                                     </div>

                                                                     <div class="col-6">
                                                                           <div class="form-group">
                                                                              <label
                                                                                 class="overline-title overline-title-alt gender" data-translate>Gender</label>
                                                                              <select name="gender" id='gender'
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-placeholder="Gender">
                                                                                 <option selected value=""></option>
                                                                                 <option value="0" data-translate>All</option>
                                                                                 <option value="1" data-translate>Male</option>
                                                                                 <option value="2" data-translate>Female</option>
                                                                              </select>
                                                                           </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt student-name" data-translate>Students Name                                            </label>
                                                                              <select name="student_id[]" id="student-id"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-placeholder="Select Student" multiple>
                                                                              </select>
                                                                        </div>
                                                                     </div>
                                                                     
                                                                    
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt license-type" data-translate>License Type</label>
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
                                                                              class="overline-title overline-title-alt sub-name" data-translate>Sub License Type</label>
                                                                              <select name="sub_id"
                                                                                 id="sub-license-filter"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-placeholder="Sub License">
                                                                              </select>
                                                                        </div>
                                                                     </div>
                                                                       <div class="col-6">
                                                                           <div class="form-group">
                                                                                <label class="overline-title overline-title-alt exam" id="etitle" data-translate>Exam</label>
                                                                                <select name="exam_id[]"
                                                                                    id="exam-id"
                                                                                    class="form-select form-select-sm js-select2"
                                                                                    data-placeholder="Select Exam" multiple>
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
                                                                              class="overline-title overline-title-alt dates" data-translate>Dates</label>
                                                                              <select name="dates"
                                                                                 id="date-filter"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 >
                                                                                 <option  value="0" selected data-translate>Select Date</option>
                                                                                 <option value="1" data-translate>Today</option>
                                                                                 <option value="2" data-translate>Last 1 week</option>
                                                                                 <option value="3" data-translate>Last 15 days</option>
                                                                                 <option value="4" data-translate>Last 1 month</option>
                                                                              </select>
                                                                        </div>
                                                                     </div>
                                                                     <div ></div>
                                                                     <div class="row">
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt from-label" data-translate>From</label>
                                                                              <input placeholder="Select from date" type="text" name="from_date" id="datepicker" value="" class="form-control dates-filter">
                                                                        </div></div>
                                                                         <div class="col-6"> <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt to-label" data-translate>To</label>
                                                                              <input placeholder="Select end date" type="text" name="to_date" id="datepicker1" value="" class="form-control dates-filter">
                                                                        </div></div>
                                                                     </div>
                                                                   
                                                                        <div class="col-12">
                                                                           <div class="form-group"><button type="submit"
                                                                                 class="btn btn-secondary apply-btn" data-translate>Apply</button>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="dropdown-foot between">
                                                                     <button type="reset" class="clickable bg-transparent border-0 text-primary" id="clear-filter" data-translate>Clear Filters</button>
                                                                  </div>
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
                                 <div class="card-inner p-0 main-list overflow-auto">
                                    <h4 class='text-center p-2' id="load-data"></h4>
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
                  <?php include_once APPPATH . 'views/admin/includes/footer.php'; ?>
            </div>
         </div>
      </div>
      <?php include_once APPPATH . 'views/admin/includes/footer-scripts.php'; ?>
     
      
<script>
$(function () {
    // Ajax request setup
    $.ajaxSetup({
        headers: {
            Authorization: `Bearer ${$.cookie("access_token")}`,
        },
        dataType: "json",
    });
   var langCode = localStorage.getItem("language-type");

    getSearchList();
    getLicenseList();
    getSchoolsList("#school-id");
    getStudentList("#student-id", JSON.stringify([["0"]]));
    getExamList("#exam-id", JSON.stringify([["0"]]));

    /*$('#datepicker').datepicker({
               format: 'dd-mm-yyyy',
               changeYear: true,

            });
            $('#datepicker1').datepicker({
               format: 'dd-mm-yyyy',
               changeMonth: true

            });*/
    var currentDate = new Date();
    var todayIS = currentDate.getDate() + "-" + ("0" + (currentDate.getMonth() + 1)).slice(-2) + "-" + currentDate.getFullYear();

    function getYesterdaysDate() {
        var date = new Date();
        date.setDate(date.getDate() - 1);
        return date.getDate() + "-" + ("0" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();
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

    $("#datepicker")
        .datepicker({
            format: "dd-mm-yyyy",
            endDate: "currentDate",
            maxDate: currentDate,
        })
        .on("changeDate", function (e) {
            $("#datepicker1").datepicker("setStartDate", e.date);
        });

    $("#datepicker1").datepicker({
        format: "dd-mm-yyyy",
    });

    dateTo = moment().format("DD-MM-YYYY");
    dateFrom = moment().subtract(6, "d").format("DD-MM-YYYY");
    dateFrom15 = moment().subtract(14, "d").format("DD-MM-YYYY");
    dateFrom30 = moment().subtract(29, "d").format("DD-MM-YYYY");
    $("#date-filter").change(function () {
        $("#datepicker").attr("disabled", true);
        $("#datepicker1").attr("disabled", true);
        $("#datepicker").val("");
        $("#datepicker1").val("");
        if ($(this).val() == 0) {
            $("#datepicker").attr("disabled", false);
            $("#datepicker1").attr("disabled", false);
        } else if ($(this).val() == 1) {
            $("#datepicker").val(dateTo);
            $("#datepicker1").val(dateTo);
        } else if ($(this).val() == 2) {
            $("#datepicker").val(dateFrom);
            $("#datepicker1").val(dateTo);
        } else if ($(this).val() == 3) {
            $("#datepicker").val(dateFrom15);
            $("#datepicker1").val(dateTo);
        } else if ($(this).val() == 4) {
            $("#datepicker").val(dateFrom30);
            $("#datepicker1").val(dateTo);
        } else {
            $("#datepicker").attr("disabled", true);
            $("#datepicker1").attr("disabled", true);
            $(".dates-filter").val("");
        }
    });
});

function getLicenseList(school = "") {
    if (school != "") {
        schoolID = school;
    } else {
        schoolID = "[[0]]";
    }
    $.ajax({
        type: "POST",
        url: formApiUrl(`get-license-by-school-ids`),
        data: { school_ids: schoolID },
    }).done(({ status, data }) => {
        if (status) {
            $("#license_filter").html("").append('<option value="0" selected>Select License</option>');
            data.forEach((item) => {
                $("#license_filter").append(`<option value="">Choose license</option><option value="${item.id}">${item.name}</option>`);
            });
        } else {
            NioApp.Toast("Error Occurred", "error");
        }
    });
}

$("#license_filter").on("change", function () {
    selval = this.value;
    getSubLicenseList("#sub-license-filter", selval);
});

var retval = [];

$("#school-id").on("change", function () {
    retval = [];
    selval = $(this).val();

    retval.push($(this).val());

    selectedData = JSON.stringify(retval);

    if (retval.length == 0) {
        schoolData = 0;
    } else {
        schoolData = JSON.stringify(retval);
    }

    getStudentList("#student-id", selectedData);
    getExamList("#exam-id", selectedData);
    getLicenseList(schoolData);
    $("#att-lang-list").html('<option></option>')
});

$("#gender").on("change", function () {
    genval = $(this).val();

    if (retval.length == 0) {
        schoolData = 0;
    } else {
        schoolData = JSON.stringify(retval);
    }
    console.log("sdat" + schoolData);
    getStudentListByGender("#student-id", schoolData, genval);
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

const getSubLicenseList = (target = false, license_id) => {
    let response;

    // Reset element content
    $(target).html("").append('<option value="0">Select</option>');

    $.ajax({
        type: "get",
        async: false,
        global: false,
        url: "https://dsms.technoiq.in/backend/api/auth/sub_license_list/" + license_id,

        success: function ({ data, errors }) {
            if (!errors) {
                if (target) {
                    data.result.sub_license_list.forEach((item) => {
                        $(target).append(`<option value='${item.id}'>${item.name}</option>`);
                    });
                } else {
                    response = data.result;
                }
            } else {
                if (data.message == "Empty") {
                    $(target).html("");
                    $(target).append(`<option value='0'>No Sub License Found</option>`);
                }
            }
        },
    });
    return response;
};

const getSchoolsList = (target = false) => {
    let response;

    // Reset element content
    $(target).html("").append('<option value=""></option>');

    $.ajax({
        type: "get",
        async: false,
        global: false,
        url: "https://dsms.technoiq.in/backend/api/auth/all_schools_list",

        success: function ({ data, errors }) {
            if (!errors) {
                if (target) {
                    schoolIDIs = $("#cur-school-id").val();

                    data.result.forEach((item) => {
                        if (schoolIDIs != item.id) {
                            $(target).append(`<option value='${item.id}'>${item.name}</option>`);
                        }
                    });
                } else {
                    response = data.result;
                }
            } else {
                alert("something went wrong");
            }
        },
    });
    return response;
};

const getStudentListByGender = (target = false, school_id, gender) => {
    let response;

    if (school_id != 0) {
        //let reqparam = { school_ids: school_id };
    }

    // Reset element content
    $(target).html("").append('<option value="">Select</option>');

    $.ajax({
        type: "get",
        url: formApiUrl(`get-students-by-gender-school-id/${gender}`),

        // data: "school_ids=" + encodeURIComponent(school_id),

        data: { school_ids: school_id },

        success: function ({ data, errors }) {
            if (!errors) {
                if (target) {
                    data.forEach((item) => {
                        $(target).append(`<option value='${item.id}'>${item.first_name_english + " " + item.second_name_english}</option>`);
                    });
                } else {
                    response = data.result;
                }
            } else {
            }
        },
    });
    return response;
};

const getStudentList = (target = false, school_id) => {
    let response;

    if (school_id != 0) {
        //let reqparam = { school_ids: school_id };
    }

    // Reset element content
    $(target).html("").append('<option value="">Select</option>');

    $.ajax({
        type: "get",
        url: formApiUrl(`get-students-by-school-id/0`),

        // data: "school_ids=" + encodeURIComponent(school_id),

        data: { school_ids: school_id },

        success: function ({ data, errors }) {
            if (!errors) {
                if (target) {
                    data.forEach((item) => {
                        $(target).append(`<option value='${item.id}'>${item.student_name}</option>`);
                    });
                } else {
                    response = data.result;
                }
            } else {
            }
        },
    });
    return response;
};

const getExamList = (target = false, school_id) => {
    let response;

    // Reset element content
    $(target).html("").append('<option value="">Select</option>');

    $.ajax({
        type: "POST",
        url: formApiUrl(`get-exams-by-school-ids`),
        data: { school_ids: school_id },

        success: function ({ data, errors }) {
            if (!errors) {
                if (target) {
                    data.forEach((item) => {
                        $(target).append(`<option value='${item.exam_id}'>${item.exam_name}</option>`);
                    });
                } else {
                    response = data.result;
                }
            } else {
            }
        },
    });
    return response;
};

var page = 1;

var filters = "";

function getSearchList(pageNumber = page, param = null) {
   /* showLoader({
        // title: "Data Loading",
        title: "Please Wait...",
    });*/
 
    if(langCode == 2){
     
         setTimeout(function() {
           $('#load-data').html("Data Loading");
            $("#search_list,#search_list_pagination").hide(); 
            setTimeout(function() {     
            $("#search_list,#search_list_pagination").show();$("#load-data").html(''); 
            },1000);
         },500); 
      }

    $(".dropdown-menu").removeClass("show");
    $(".filter-wg").removeClass("show");

    //$('#download-btn').attr('data-parameters',param);
    $("#download-btn").attr("href", formApiUrl(`reports/0?${param}&download`));

    page = pageNumber;

    $.ajax({
        type: "GET",
        url: formApiUrl(`reports/0?page=${page}`),
        data: param,
    })
        .done(({ status, data }) => {
            if (status) {
                $("#total-record").text(`Total ${data.total} records`);
                addTextClr = resultData = "";

                if (data.total > 0) {
                    languageText(langCode);

                    $("#download-btn").removeClass("d-none");
                    $("#search_list").html(`
                  <div class="nk-tb-item nk-tb-head report-detail-list">
                     <div class="nk-tb-col"><span class="text-black fw-bold slno">Sl.No</span></div>
                     <div class="nk-tb-col"><span class="text-black fw-bold student-title" data-translate="Student">Student</span></div>
                     <div class="nk-tb-col"><span class="text-black fw-bold school-name" data-translate="School">School</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold license-name" data-translate="License">License</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold sublicensename" data-translate="Sub License">Sub License</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold exam" data-translate="Exam">Exam</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold date-time" data-translate="Date & Time">Date & Time</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold language-title">Language</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold total-marks" data-translate="Total Marks">Total Marks</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold question" data-translate="Questions">Questions</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold correct-ans" data-translate="Correct Answers">Correct Answers</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold wrong-ans" data-translate="Wrong Answers">Wrong Answers</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold scores" data-translate="Score">Score</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold result" data-translate="Result">Result</span></div>
                  </div>
               `);
                    if(langCode == 2){
                        $('.report-detail-list div span').text('');
                     }

                    data.data.forEach((item) => {
                        var student = item.full_name;
                        var sid = item.id_number;
                        var nid = item.student_id;

                        if (item.gender == 1) {
                            gender = "Male";
                        } else {
                            gender = "Female";
                        }

                        examDate = moment(item.date_time).format('d-m-Y h:m:s A');


                        if (item.result == "pass") {
                            resultData = `<button  type="button" class="btn btn-sm btn-success tpass" style="background:#1abe92;padding: 4px 14px;border:none;">Pass</button>`;
                            addTextClr = "color:#e85347;";
                        } else {
                            resultData = `<button  type="button" class="btn btn-sm btn-danger failed-title" style="border:none;padding:4px 17px;">Fail</button>`;
                            addTextClr = "color:#1abe92";
                        }

                        $("#search_list").append(`
                  <div class="nk-tb-item">
                     <div class="nk-tb-col tb-col-md">${data.from++}</div>
                     <div class="nk-tb-col">
                        <div class="user-card">
                            <div class="d-flex flex-column">
                                <span class="tb-lead">${student}</span>
                                <span>Student ID: ${nid}</span>
                                <span>National ID: ${sid}</span>
                                <span><span class="gender" data-translate="Gender">Gender</span>: ${gender}</span>
                            </div>
                        </div>
                     </div>
                     <div class="nk-tb-col tb-col-md">${item.school_name}</div>
                     <div class="nk-tb-col tb-col-md">${item.license_name}</div>
                     <div class="nk-tb-col tb-col-md" style="width: 0px;">${item.sub_license_name}</div>
                     <div class="nk-tb-col tb-col-md">${item.exam_name}</div>
                     <div class="nk-tb-col tb-col-md">${examDate}</div>
                     <div class="nk-tb-col tb-col-md">${item.language_name}</div>
                     <div class="nk-tb-col tb-col-md" style="text-align: center !important;">${item.total_marks}</div>
                     <div class="nk-tb-col tb-col-md" style="text-align: center !important;">${item.total_questions}</div>
                     <div class="nk-tb-col tb-col-md" style="text-align: center !important;">${item.total_correct_answers}</div>
                     <div class="nk-tb-col tb-col-md" style="text-align: center !important;">${item.total_wrong_answers}</div>
                     <div class="nk-tb-col tb-col-md" style="text-align: center !important;">${item.obtained_marks}</div>
                     <div class="nk-tb-col tb-col-md" style="${addTextClr}">${resultData}</div>
                  </div>
                  `);
                    });

                    $("#search_list_pagination").pagination({
                        items: parseInt(data.total),
                        itemsOnPage: parseInt(data.per_page),
                        currentPage: data.current_page,
                        displayedPages: 3,
                        navStyle: "pagination justify-content-center justify-content-md-start",
                        listStyle: "page-item",
                        linkStyle: "page-link",
                        onPageClick: function (pageNumber, event) {
                            event ? event.preventDefault() : "";
                            getSearchList(pageNumber, param);
                        },
                    });
                } else {
                    $("#search_list").html(`<h4 class='text-center p-2'>No Data Found</h4>`);
                    $("#search_list_pagination").html("");
                    $("#download-btn").addClass("d-none");
                }
            }
        })
        .fail(({ statusText, status, responseJSON }) => {
            if (status == 400) NioApp.Toast(responseJSON.message, "error");
            else NioApp.Toast(statusText, "error");
        })
        .always(() => {
            hideLoader();
        });
}

/* $('#download-btn').on('click',function(){
         
        dataParam =  $(this).attr('data-parameters');
         
          $.ajax({
            type: "GET",
            url: formApiUrl(`reports/0?download`),
            data: dataParam
         });

      });*/

$("#filter-form").on("submit", function (e) {
    e.preventDefault();
    // var schools = $(this).find('select[name="school_id[]"]').val();
    // var students = $(this).find('select[name="student_id[]"]').val();
    // var gender = $(this).find('select[name="gender"]').val();
    // var exams = $(this).find('select[name="exam_id[]"]').val();
    // var license = $(this).find('select[name="license_id"]').val();
    // var sublicense = $(this).find('select[name="sub_id"]').val();
    // var dates = $(this).find('select[name="dates"]').val();
    // var fromDate = $(this).find('input[name="from_date"]').val();
    // var toDate = $(this).find('input[name="to_date"]').val();

    // params = `school_id=${schools}&student_id=${students}&gender=${gender}&exam_id=${exams}&license_id=${license}&sub_license_id=${sublicense}&dates=${dates}&from_date=${fromDate}&to_date=${toDate}`;

    getSearchList(1, $(this).serialize());

    //getSearchList(page,{filter: $(this).serialize()})
});

$("#clear-filter").click(function () {
    $("#school-id").select2("val", "0");
    $("#student-id").select2("val", "0");
    $("#gender").select2("val", "0");
    $("#exam-id").select2("val", "0");
    $("#license_filter").select2("val", "0");
    $("#sub-license-filter").select2("val", "0");
    $("#date-filter").select2("val", "0");
    $("#datepicker").val("");
    $("#datepicker1").val("");

    getSearchList(1, { filter: "clearFilter" });
});

$("select").select2({
    minimumResultsForSearch: 1,
    placeholder: function () {
        $(this).data("placeholder");
    },
});

   </script>
   </body>
</html>