  <?php include_once APPPATH . 'views/admin/includes/header.php'; ?>
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
    margin-top: 36px !important;
}
.list-plain .col-4{
    font-size: 0.9375rem !important;
    color: #67757c !important;
    font-weight: 600;
}
</style>
<body class="nk-body npc-crypto bg-lighter has-sidebar ">
   <div class="nk-app-root">
      <div class="nk-main ">

        <?php include_once APPPATH . 'views/admin/includes/sidebar.php'; ?>

         <div class="nk-wrap ">

            <?php include_once APPPATH . 'views/admin/includes/navbar.php'; ?>

            <div class="nk-content nk-content-fluid">
                <div class="container-xl wide-lg">
                    <div class="nk-content-body">
                        <div class="nk-block-head">
                            <div class="nk-block-between-md g-4" style="margin-top:50px !important;">
                                <div class="nk-block-head-content">
                                    <h2 class="nk-block-title fw-normal ans-sheet" data-translate>Answer Sheet</h2>
                                </div>
                                <div class="nk-block-head nk-block-head-sm nk-block-between" style="margin-bottom: 37px !important;">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" id="back--btn" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-arrow-left"></em><span class="back--btn" data-translate>Back</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="nk-block" id="score-card">
                            <div class="row g-gs">
                                <div class="col-sm-6 col-lg-5">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                            <h5 class="card-title"></h5>
                                             <ul class="list-plain ps-2">
                                                <li><h6 class='row'><span class="col-4 p-0 student-name">Student Name</span> <span class='col-1 p-0'>:</span> <span class="stu-details fw-normal col-6" id="student-name"></span></h6></li>
                                                <li><h6 class='row'><span class="col-4 p-0 schoolna-title">School Name</span> <span class='col-1 p-0'>:</span> <span class="stu-details fw-normal col-6" id="school-name"></span></h6></li>

                                                <li><span><h6 class='row'><span class="col-4 p-0 national-id">National ID</span> <span class='col-1 p-0'>:</span> <span class="stu-details fw-normal col-6" id="nationality-id"></span></h6></li>
                                                <li><span><h6 class='row'><span class="col-4 p-0 exam-name">Exam Name</span> <span class='col-1 p-0'>:</span> <span class="stu-details fw-normal col-6" id="exam-name"></span></h6></li>

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
                                            <ul class="list-plain ps-2">
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
                'Authorization': `Bearer ${$.cookie("access_token")}`
            },
            dataType: 'json'
        });

         getquestions();
        var langCode = localStorage.getItem('language-type');
        languageText(langCode);

        activeTab = localStorage.getItem('current-active-tab');

        if(activeTab == 'student'){
            $('.student-menu').addClass('active');
            $('.exam-menu').removeClass('active')
        }else if(activeTab == 'examination'){
            $('.school-menu').removeClass('active');
            $('.exam-menu').addClass('active')
        }


      });

     var href = location.href;
     const school_id = href.match(/([^\/]*)\/*$/)[1];

     $('#back--btn').click(function(){

        //location.href=formUrl('admin/schools/details?id='+school_id);
        history.back();
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
            // translate();
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
        jQuery.each(items, (index, item) => {
                option_html = addMsg = selectedDate = '';
                gained = 0;
                noSeconds ='';
                function getFormattedDate(date) {
                     var year = date.getFullYear();
                     var month = (1 + date.getMonth()).toString();
                     month = month.length > 1 ? month : '0' + month;
                     var day = date.getDate().toString();
                     day = day.length > 1 ? day : '0' + day;

                     var datetime = item.answered_time;
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
                    selectedDate = getFormattedDate(d);

                }
                    



                jQuery.each(item.options, (index, option) => {


                      if(item.selected_option_id == option.id){
                        checked = 'checked';

                        if(option.is_correct == 1){
                            addMsg = 'success';
                            console.log('same'+item.marks)
                            gained = item.marks;
                        }else{
                            addMsg = 'error';
                        }

                    }else{
                        checked = '';

                        if(option.is_correct == 1){
                            addMsg = 'success';
                            console.log('correct is'+option.id);
                            console.log('mark is'+item.marks)
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
                                        <span style="float: left;color: orange;"> NOTE:- Eliminatory Question</span>
                                        `
                                        :
                                        ''
                                    }
                                    ${ item.selected_option_id != "0" ? 
                                        `<span style="float: right;color: #526484; font-weight:700">Date: ${moment(item.answered_time).format("DD-MMM-YYYY")}</span><br>
                                        <span style="float: right;color: #526484; font-weight:700">Time: ${moment(item.answered_time).format("hh:mm:ss A")}</span><br>`
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
           $('#score-card').hide();
        }
    }
                
    

   </script>
</body>

</html>