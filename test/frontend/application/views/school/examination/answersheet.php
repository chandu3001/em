<?php include_once APPPATH . 'views/school/includes/header.php'; ?>
<style type="text/css">
   .options--block{
          margin: -25px 0px 0px 30px;
   }
   .questions{
          margin: 10px 0px 26px 3px;
   }
   .float-left {
       float: left!important;
   }
   .question--mark{
          margin-top: 25px;
   }
   .options--block .option--box .option--item.success {
    color: #00bda6;
    
 }
.options--block .option--box .option--item.error {
    color: red;
    
 }

.list-plain li{
        margin-bottom: 15px;
}
.stu-details{
    font-size: 16px;
}
@media (min-width: 992px){
.col-lg-5 {
    width: 50% !important;
}
}
.nk-header-fixed + .nk-content{
    margin-top: 36px;
}
.list-plain .col-4{
    font-size: 0.9375rem !important;
    color: #67757c !important;
    font-weight: 600;
}
#answer_sheet_card2 li{
    margin-bottom:0px !important;
}
#answer_sheet_card2{
    margin-top: 8px;
}
</style>
<body class="nk-body npc-crypto bg-lighter has-sidebar ">
   <div class="nk-app-root">
      <div class="nk-main ">

         <?php include_once APPPATH . 'views/school/includes/sidebar.php'; ?>

         <div class="nk-wrap ">

            <?php include_once APPPATH . 'views/school/includes/navbar.php'; ?>

            <div class="nk-content nk-content-fluid">
                <div class="container-xl wide-lg">
                    <div class="nk-content-body">
                        <div class="nk-block-head">
                            <div class="nk-block-between-md g-4">
                                <div class="nk-block-head-content">
                                    <h2 class="nk-block-title fw-normal ans-sheet">Answer Sheet</h2>
                                </div>
                                <div class="nk-block-head-content" style="margin-top: -36px !important;">
                                        <a class="btn btn-primary" id="go-back"><em class="icon ni ni-arrow-left"></em><span class="back-btn">Back</span></a>
                                        <a class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                </div>
                                
                            </div>
                        </div>

                        <div class="nk-block">
                            <div class="row g-gs">
                                <div class="col-sm-6 col-lg-5">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                            <h5 class="card-title"></h5>
                                            <ul class="list-plain ps-2">
                                                <li><h6 class='row'><span class="col-4 p-0 student-name">Student Name</span> <span class='col-1 p-0'>:</span> <span class="stu-details fw-normal col-6" id="student-name"></span></h6></li>
                                                <li><h6 class='row'><span class="col-4 p-0 schoolna-title">School Name</span> <span class='col-1 p-0'>:</span> <span class="stu-details fw-normal col-6" id="school-name"></span></h6></li>

                                                <li><span><h6 class='row'><span class="col-4 p-0 national-id">National ID</span> <span class='col-1 p-0'>:</span> <span class="stu-details fw-normal col-6" id="nationality-id"></span></h6></li>
                                                <li><span><h6 class='row'><span class="col-4 p-0 exam-title">Exam Name</span> <span class='col-1 p-0'>:</span> <span class="stu-details fw-normal col-6" id="exam-name"></span></h6></li>

                                                <li><span><h6 class='row'><span class="col-4 p-0 license-type">License Type</span> <span class='col-1 p-0'>:</span> <span class="stu-details fw-normal col-6" id="license-name"></span></h6></li>
                                                <li id="license-type-label" style="display:none;"><span><h6 class='row'><span class="col-4 p-0 sub-name">Sub License Type</span> <span class='col-1 p-0'>:</span> <span class="stu-details fw-normal col-6" id="sub-license-name"></span></h6></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                            <!-- <h5 class="card-title">Score Card</h5> -->
                                            <ul class="list-plain ps-2 " id="answer_sheet_card2">
                                                <li><p class="mb-1 row"  style="color:#455a64 !important; font-size: 16px;"><b class="mr-1 col-4 p-0 tot-questions">Total Questions</b> <span class="col-1 p-0"><b>:</b></span><span class="col-6 p-0 fw-normal" id="total-que" style="font-weight: 700;"></span></p></li>
                                                <li><p class="mb-1 row"  style="color:#455a64 !important; font-size: 16px;"><b class="mr-1 col-4 p-0 correct-ans">Correct Answers</b> <span class="col-1 p-0"><b>:</b></span> <span class="col-6 p-0 fw-normal" id="correct-ans" style="font-weight: 700;"></span></p></li>
                                                <li><p class="mb-1 row"  style="color:#455a64 !important; font-size: 16px;"><b class="mr-1 col-4 p-0 wrong-ans">Wrong Answers</b> <span class="col-1 p-0"><b>:</b></span>  <span class="col-6 p-0 fw-normal" id="wrong-ans" style="font-weight: 700;"></span></p></li>
                                                <li><p class="mb-1 row"  style="color:#455a64 !important; font-size: 16px;"><b class="mr-1 col-4 p-0 percentage">Percentage</b> <span class="col-1 p-0"><b>:</b></span>  <span class="col-6 p-0 fw-normal" id="percentage" style="font-weight: 700;"></span></p></li>
                                                <li><p class="mb-1 row"  style="color:#455a64 !important; font-size: 16px;"><b class="mr-1 col-4 p-0 duration">Duration</b> <span class="col-1 p-0"><b>:</b></span> <span class="col-6 p-0 fw-normal" id="duration" style="font-weight: 700;"></span></p></li>
                                                <li><p class="mb-1 row"  style="color:#455a64 !important; font-size: 16px;"><b class="mr-1 col-4 p-0 result">Result</b> <span class="col-1 p-0"><b>:</b></span> <span class="col-6 p-0 fw-normal text-capitalize" id="result" style="font-weight: 700;"></span></p></li>
                                                <li><p class="mb-1 row"  style="color:#455a64 !important; font-size: 16px;"><b class="mr-1 col-4 p-0 att-lang">Attended Language</b> <span class="col-1 p-0"><b>:</b></span><span class="col-6 p-0 fw-normal" id="att-lang" style="font-weight: 700;"></span></p></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="nk-block" id="assessment"></div>
                    </div>
                </div>
            </div>

            <?php include_once APPPATH . 'views/school/includes/footer.php'; ?>
        
         </div>
      </div>
   </div>

   <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>
      
   <script>
     $(function () {
         async function init() {
            const auth = await appModule.checkAuth();
         }
         getquestions();
         init();

        activeTab = localStorage.getItem('current-active-tab');

        if(activeTab == 'student'){
            $('.student-menu').addClass('active');
            $('.exam-menu').removeClass('active')
        }else if(activeTab == 'examination'){
            $('.student-menu').removeClass('active');
            $('.exam-menu').addClass('active')
        }

        var langCode = localStorage.getItem('language-type');
        languageText(langCode);
      });

    // Get question list
    window.getquestions = async function(option = {}) {
        //showLoader();
    
        let searchParams = new URLSearchParams(window.location.search);
        let reference_id = searchParams.get("id");
        let formDatas = {reference_id: reference_id}

        $.ajax({
            type: "post",
            url: formApiUrl(`exam-preview`),
            data: formDatas,
        }).done(function (response) {
            if (response.status == true) {
            
                loadQuestionView(response.data,response.score_card,response.student_info);
            } else if (response.status == false) {
                console.log('false')
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



    function loadQuestionView(items,score_data,student_data) {
        alpha = html_string = "";
        var j=i=1;
        totQue = items.length;
    if(totQue >= 1){
        
        $('#att-lang').text(student_data.language_name);
        $('#total-que').text(score_data.total_question);
        $('#duration').text(score_data.duration);
        $('#percentage').text(score_data.percentage);
        $('#correct-ans').text(score_data.correct_answers);
        $('#wrong-ans').text(score_data.wrong_answers);
        $('#exam-name').text(score_data.exam_name);
        $('#result').text(score_data.result);


        $('#nationality-id').text(student_data.full_info.national_id);
        $('#student-name').text(student_data.full_info.first_name_english+' '+student_data.full_info.second_name_english);
        $('#license-name').text(student_data.full_info.license_name);
        $('#sub-license-name').text(student_data.full_info.sub_license_name);
        $('#school-name').text(student_data.school_name);
        if(!student_data.full_info.sub_license_name){
            $('#license-type-label').hide();
        }else{
            $('#license-type-label').show();

        }

        var gained = 0;
        jQuery.each(items, (index, item) => {
                option_html = addMsg = selectedDate = '';
                

                function getFormattedDate(date) {
                         var year = date.getFullYear();
                         var month = (1 + date.getMonth()).toString();
                         month = month.length > 1 ? month : '0' + month;
                         var day = date.getDate().toString();
                         day = day.length > 1 ? day : '0' + day;

                        var datetime = item.answered_time;
                        if(datetime == 0)
                        {
                            return '--';
                        }
                        let preDateTime = new Date(datetime);
                        let newTime = preDateTime.toLocaleTimeString('en-US');
                        let hour = newTime.split(":")[0];
                        let amPm = newTime.split(" ")[1];
                        let seconds = newTime.split(":")[2].replace(amPm,'');;

                        let noAmPm = newTime.replace(amPm,'');
                        let noAmPmSeconds = noAmPm.replace(":"+seconds,'');
                        let noSeconds = newTime.replace(":"+seconds,' ');
                        if(parseInt(hour)<9){
                            //newTime = "0"+newTime;
                            ///noAmPm = "0"+noAmPm
                            noSeconds= "0"+noSeconds
                            noAmPmSeconds = "0"+noAmPmSeconds;
                        }
                         return day + '-' + month + '-' + year + ' ' + noSeconds;
                    }
                    d = new Date(item.answered_time);
                        if(item.selected_option_id != '0'){
                        //console.log(item.selected_option_id)
                         selectedDate = getFormattedDate(d);

                        }
                    

                
                jQuery.each(item.options, (index, option) => {
                    
                      if(item.selected_option_id == option.id){
                        checked = 'checked';

                        if(option.is_correct == 1){
                            addMsg = 'success';
                            gained = item.marks;
                        }else{
                            addMsg = 'error';
                            //gained = 0;
                        }

                    }else{
                        checked = '';

                        if(option.is_correct == 1){
                            addMsg = 'success';
                            gained = 0;
                        }else{
                            addMsg = '';
                        }
                    }


                    option_html +=`<div class="option--box">
                            <div class="option--item ${addMsg}">
                                <div style="display: flex; align-items: center; height: 2.5rem;">
                                <input style="margin-right: 10px;" value="1" ${checked ? '':'disabled'} class="radio-inline" type="radio" name="choices[${j}]" ${checked} /> 
                                ${option.option_name}</div>
                            </div>
                        </div>`;

                    i++;         
                });

                if(item.image != ''){
                    queImage = `<img src='${item.image}'>`
                }else if(item.video != ''){
                    queImage = `<video width="320" height="240" controls>
                                  <source src="${item.video}" type="video/mp4">
                                  Your browser does not support the video tag.
                                </video>`
                }else{
                    queImage = '';
                }
                    $("#assessment").append(`<div class="card">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <div class="card-inner">
                                    ${
                                        item.is_eliminatory_question ? 
                                        `
                                        <span style="color: orange;"> NOTE:- Eliminatory Question</span>
                                        `
                                        :
                                        ''
                                    }
                                    ${ item.selected_option_id != "0" ? 
                                        `<span class="answersheet_date_time" style="float: right;color:#526484; font-weight:700"><span>Date:</span><span> ${moment(item.answered_time).format("DD-MMM-YYYY")}</span></span><br>
                                        <span class="answersheet_date_time" style="float: right;color:#526484; font-weight:700">Time: ${moment(item.answered_time).format("hh:mm:ss A")}</span><br>`
                                        :
                                        ``
                                    }
                                    

                                    <div class="nk-block">
                                        <div class="nk-block-head nk-block-head-sm nk-block-between questions">
                                            
                                            <h6 class="title"><span>${j+') '}</span>${item.question}</h6></div>
                                            <div class="form-group col-md-12" style="margin-top: 4px;margin-left: 30px;">  ${queImage}</div>
                                        <div class="form-group col-md-12 options--block">
                                            ${option_html}
                                        </div>
                                        <div class="question--mark clearfix">
                                            <span class="float-left"><b>Marks : </b>  ${item.marks}

                                            </span>
                                            <span class="float-right ${!gained ? 'text-danger' : 'text-info'} w-25">
                                                <span class="d-flex align-items-center justify-content-end"><b class="ml-2">Gained :  </b>  ${gained}  </span>
                                            </span>
                                        </div>

                                    </div>
                                        
                                </div>
                            </div>

                        </div>
                    </div>`);
                    j++;i =1;
            });

            //end

        }else{
           // elequestion.html(`<h3 style="text-align:center;"> No exam Available</h3>`);
        }
    }
    
     document.getElementById('go-back').addEventListener('click', () => {
        activeTab = localStorage.getItem('current-active-tab');

        if(activeTab == 'student'){
            location.href = document.referrer;

        }else{
            location.href = document.referrer;

        }
    });    
    

   </script>
</body>

</html>