<?php include_once APPPATH . 'views/school/includes/header.php'; ?>
<style>
    .btn-student{
        float: right;
        margin-right: 15px;
        margin-top: -58px;
    }
    .nk-content{
        /* padding:0px; */
        background:none !important;
    }
    .card-bordered{
         box-shadow:none !important;
         
    }
    .card-inner-group{
        position: relative;
        top: -50px;
        left: -50px;
        width: 108%;
    }
    #exam-list-pagination{
        margin-bottom: -90px;
    }
      
    .wider .profile-ud-value{
        text-align:left !important;
        color: #8094ae !important;
    }   
    .wider .profile-ud-label{
        width:145 !important;
        color: #526484 !important;
    }
</style>
<body class="nk-body bg-white has-sidebar">
    <div class="nk-app-root">
        <div class="nk-main">
            <?php include_once APPPATH . 'views/school/includes/sidebar.php'; ?>

            <div class="nk-wrap">
                <?php include_once APPPATH . 'views/school/includes/navbar.php'; ?>

                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg card-alignment" >
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between g-3">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title student-title">Student / <strong
                                                class="text-primary small" id="student_name"></strong></h3>
                                        <div class="nk-block-des text-soft">
                                            <!-- <ul class="list-inline">
                                                <li>Student ID: <span class="text-base" id="student_id"></span></li>
                                            </ul> -->
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content"  style="margin-top: -45px !important;">
                                        <a 
                                            class="btn btn-primary d-none d-sm-inline-flex back--btn"><em
                                                class="icon ni ni-arrow-left"></em><span class="back-btn">Back</span></a>
                                        <a href="javascript:void(0)"
                                            class="btn btn-icon btn-primary d-inline-flex d-sm-none back--btn"><em
                                                class="icon ni ni-arrow-left"></em></a>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="card card-bordered card-preview">
                                      <div class="card-inner">
                                          <ul class="nav nav-tabs mt-n3">
                                              <li class="nav-item">
                                                  <a class="nav-link active" data-bs-toggle="tab" href="#tabItem5"><em class="icon ni ni-user"></em><span class="general-tab">General Details</span></a>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link" onclick="GetExamResultLists()" data-bs-toggle="tab" href="#tabItem6"><em class="icon ni ni-lock-alt"></em><span class="exam-tab">Examination</span></a>
                                              </li>
                                             
                                          </ul>
                                          <div class="tab-content">
                                              <div class="tab-pane active" id="tabItem5">

                                              </div>
                                              
                                              <div class="tab-pane" id="tabItem6">
                                                <?php include 'new.php'; ?>
                                                  
                                              </div>   
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

    <?php include 'student_form.php'; ?>

    <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>
    <script src="<?php echo base_url('assets/js/libs/simplePagination.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/school/student_details.js'); ?>"></script>

    <script>
        $(function () {
            async function init() {
                const auth = await appModule.checkAuth();
            }
            getSchoolDeatils();

            init();
            var langCode = localStorage.getItem("language-type");

            if(localStorage.getItem('active_tab'))
            {
                $(`[href='${localStorage.getItem('active_tab')}']`).tab('show')
                if($(`[href='${localStorage.getItem('active_tab')}']`).attr('onclick'))
                {
                    $(`[href='${localStorage.getItem('active_tab')}']`).click();
                }

            }
            $('[data-bs-toggle="tab"]').click(function () {
                localStorage.setItem('active_tab', $(this).attr('href'))
            })

            $('.nk-menu-item, .back-btn').click(function(){
                localStorage.removeItem('active_tab')
            })
        });   


         var url = new URL(document.location.href);
        var id = url.searchParams.get("student_id");

      function getSchoolDeatils()
      {

        if($("#tabItem5").children().length > 0)
        {
            return 0;
        }
        /*showLoader({
            title: "Data Fetching From DSMS",
            // text: "Please Wait..."
        })*/

        $.ajax({
            type: "GET",
            url: `https://dsms.technoiq.in/backend/api/auth/student/details/${id}`
        }).done(({data})=>{
               data = data.result;
                $("#student_name").text(data.first_name_english + " " + data.second_name_english)
                $("#student_id").text(data.student_id)

                var todaydate = new Date(data.dob);  //pass val varible in Date(val)
                var dd = todaydate .getDate();
                var mm = todaydate .getMonth()+1; //January is 0!
                var yyyy = todaydate .getFullYear();
                if(dd<10){  dd='0'+dd } 
                if(mm<10){  mm='0'+mm } 
                var DOB = dd+'-'+mm+'-'+yyyy;

                //var langCode = localStorage.getItem('language-type');
                languageText(langCode);
                    

                $("#tabItem5").html(`
                <div class="card-inner">
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title"></h5>
                        </div>
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label first-name">First Name</span><span class="profile-ud-value">${data.first_name_english}</span></div>
                            </div>
                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label sec-name">Second Name</span><span
                                                        class="profile-ud-value">${data.second_name_english}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label email">Email ID</span><span
                                                        class="profile-ud-value">${data.email}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label mobile">Mobile No</span><span
                                                        class="profile-ud-value">${data.phone}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label dob">DOB</span><span
                                                        class="profile-ud-value">${DOB}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label gender">Gender</span><span
                                                        class="profile-ud-value">${data.gender == 1 ? 'Male' : data.gender == 2 ? 'Female' : ''}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span
                                                        class="profile-ud-label id-type">ID Type</span><span
                                                        class="profile-ud-value">
                                                        ${data.id_type == 0
                                                        ?
                                                        "Aadhar"
                                                        :
                                                        data.id_type == 1
                                                        ?
                                                        "PAN"
                                                        :
                                                        data.id_type == 2
                                                        ?
                                                        "License"
                                                        :
                                                        data.id_type == 3
                                                        ?
                                                        "Passport"
                                                        :
                                                        ''
                                                        }
                                                    </span>
                                                </div>
                                            </div>
                                          
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label city">City</span><span
                                                        class="profile-ud-value">${data.city}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label national-id">National Id</span><span
                                                        class="profile-ud-value">${data.national_id}</span></div>
                                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-block-head nk-block-head-line"><h6 class="title overline-title text-base addon-info">Additional Information</h6></div>
                                                                <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label username">Username</span><span
                                                        class="profile-ud-value">${data.username}</span></div>
                                            </div>
                                            
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label license-type">License Type</span><span
                                                        class="profile-ud-value">${data.license_name}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label sub-name">Sub License Type</span><span
                                                        class="profile-ud-value">${data.sub_license_name}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span
                                                        class="profile-ud-label level">Level</span><span
                                                        class="profile-ud-value">
                                                        ${data.level == 1
                                                        ?
                                                        "Beginner"
                                                        :
                                                        data.level == 2
                                                        ?
                                                        "Intermediate"
                                                        :
                                                        data.level == 3
                                                        ?
                                                        "Expert"
                                                        : ''
                                                        }
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label sub-plan">Subscription Plan</span><span
                                                        class="profile-ud-value">${data.plan_name}</span></div>
                                            </div>
                                            
                                        </div>
                    </div>
                    
                </div>

                `)
           
        }).fail(({statusText, status, responseJSON}) =>{
            if(status == 400)
                NioApp.Toast(responseJSON.message, "error");
            else
                NioApp.Toast(statusText, "error");
        }).always(()=>{
            //hideLoader();
        })
      }

       
</script>

<script type="text/javascript">

 $(function () {
         async function init() {
            const auth = await appModule.checkAuth();
         }
         GetExamResultLists();
         init();
      });
     
        var page = getUrlParam('page') ? getUrlParam('page') : 1;

        var filters = '';

        var pageSize = 10;

        var query = '';
        var sortby = 0;

      function GetExamResultLists(pageNumber = page, option = {})
      {

        if(langCode == 2){
            $('.exam-list div span').text('');
         $('#load-data').html("Data Loading");
        $("#examination_results,#exam-list-pagination").hide(); 
         setTimeout(function() {
          
            setTimeout(function() {     
            $("#examination_results,#exam-list-pagination").show();$("#load-data").html(''); 
            },1000);
         },500); 
        }

        localStorage.setItem('current-active-tab','student');


         urlPage(pageNumber)

         selectedDate = '';

         let params = '';

        page = pageNumber;

        sortby = option.sortBy ? option.sortBy : sortby;

        pageSize = option.pageSize ? option.pageSize : pageSize;

        filters = option.filter ? option.filter : filters;

        query = option.q ? option.q : query

        params +=`page=${page}&sortby=${sortby}&pageSize=${pageSize}&${filters}&${query}`;

         let searchParams = new URLSearchParams(window.location.search)
         let student_id = searchParams.get("student_id")
        /*showLoader({
            title: "Please Wait...",
            // text: "Please Wait..."
        })*/

        console.log('options are'+option)
        $.ajax({
            type: "get",
            url: `${api_base_url}exam-result/0?${params}`,
            data: {
                        student_id
                  }
        }).done(({status, message, data, license_name, exam_name}) =>{
            if (status) {
                        //var langCode = localStorage.getItem('language-type');
                        languageText(langCode);
                        addTextClr= resultData = '';
                        $("#license_name").text(license_name)
                        $("#exam_name").text(exam_name)
                        $("#total_attended").text(data.total)

                        if (data.total > 0) {


                            $("#examination_results").html(
                                `
                                <div class="nk-tb-item nk-tb-head exam-list">
                                    <div class="nk-tb-col"><span class="text-black fw-bold slno">Sl.No</span></div>

                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold student-name">Student
                                        Name</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold exam-title">Exam Name</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold correct-ans">Correct Answers</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold wrong-ans">Wrong Answers</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold skip-ans">Skipped Answers</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold tot-score">Total Score</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold obt-score">Obtained Score</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold result">Result</span></div>
                                    <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold action">Action</span>
                                    </div>
                                </div>
                                `
                            );

                        if(langCode == 2){
                           // $('.exam-list div span').text('');
                        }

                            data.data.forEach(item => {

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

                                 return day + '-' + month + '-' + year + ' <br> ' + hour +':' +min;
                              }
                              startDate = new Date(item.started_at);
                              var time = startDate.toLocaleTimeString().replace(/:\d+ /, ' ');

                              selectedDate = getFormattedDate(startDate,time);


                              if(item.result == 'pass'){
                                 resultData =`<button  type="button" class="btn btn-sm btn-success" style="background:#1abe92;padding: 4px 14px;border:none;">Pass</button>`;
                                 addTextClr = "color:#e85347;";                              
                              }else{
                                  resultData =`<button  type="button" class="btn btn-sm btn-danger" style="border:none;padding:4px 17px;">Fail</button>`
                                 addTextClr = "color:#1abe92";                              
                              }

                            $("#examination_results").append(
                                `
                            <div class="nk-tb-item">
                                <div class="nk-tb-col tb-col-md">${data.from++}</div>

                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">
                                <div class="user-info">
                                    <span class="tb-lead">${item.student_name}</span>
                                    <span>Student ID: ${item.student_id}</span>
                                </div>
                                </div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">
                                 <div class="user-info">
                                    <span class="tb-lead">${item.exam_name}</span>
                                    <span>Date: ${selectedDate}</span>
                                </div>

                                </div>
                                <div class="nk-tb-col tb-col-md student-info" id="student_center" data-stud-id="${item.student_id}">${item.total_correct_answers}</div>
                                <div class="nk-tb-col tb-col-md student-info" id="student_center" data-stud-id="${item.student_id}">${item.total_wrong_answers}</div>
                                <div class="nk-tb-col tb-col-md student-info" id="student_center" data-stud-id="${item.student_id}">${item.total_skipped_answers}</div>
                                <div class="nk-tb-col tb-col-md student-info" id="student_center" data-stud-id="${item.student_id}">${item.total_marks}</div>
                                <div class="nk-tb-col tb-col-md student-info" id="student_center" data-stud-id="${item.student_id}">${item.obtained_marks}</div>
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
                                event.preventDefault();
                                GetExamResultLists(pageNumber);
                            }
                        })
                        }
                        else {
                            $("#examination_results").html(`<div class="nk-tb-item-empty">
                                <p class="text-center text-black fw-bold no-exam-title"> No Examination Result Available</p>
                            </div>`);
                        }
                        
                    }
                    else {
                        NioApp.Toast(message, "warning");
                    }
        }).fail(({statusText, status, responseJSON}) =>{
            if(status == 400)
                NioApp.Toast(responseJSON.message, "error");
            else
                NioApp.Toast(statusText, "error");
        }).always(()=>{
            hideLoader();
        })
      }


  
    $("#examSearchForm").on("submit", function(e){
      e.preventDefault();
      GetExamResultLists(page, {
         q: $(this).serialize()
      })
    })
    $("#exam-filter-form").on("submit", function(e){
        e.preventDefault();
        GetExamResultLists(page,{filter: $(this).serialize()})
    })

    $("#search-reset").click(function()
    {
        $('#sort_by').select2('val','0');
        query = "";
        GetExamResultLists();
    })
    
     $('.back--btn').click(function(){
        const url = new URL(base_url+"school/students");
        const backUrl = url.hostname+url.pathname;
               
        if(localStorage.getItem(backUrl))
        {
            url.searchParams.append('page',localStorage.getItem(backUrl))
            localStorage.removeItem("active_tab")
            localStorage.removeItem(backUrl)

            location.href = url.href;
        }

      })

 
</script>
   