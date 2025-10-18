
     
      <style>
       body { min-height: 900px;   font-family: Nunito, sans-serif!important;}

        .hide {
            display: none;
        }
        .modal-dialog{
            max-width: 600px;

        }
        .blink_me {
          animation: blinker 1s linear infinite;
        }
        @keyframes blinker {  
            50% { opacity: 0; }
        }

        #timer-container{
            font-size: 23px;
        }
        #exam-begin{
                font-family: Nunito, sans-serif;
        }
        .elementory-question{
            color: #ff0707;
            font-size: 14px;
            margin-top: -23px;
            line-height: 29px;
        }
        #que-analysis {
            display: flex !important;
            justify-content: center;
            margin: 0 auto;
        }
        
        @media only screen and (min-width: 768px) and (max-width: 1024px) {
        #que-analysis { 
            max-width: 91%!important;
        }
        }
        @media only screen and (min-width: 1025px) and (max-width: 1045px) {
        #que-analysis { 
            max-width: 89.5%!important;
        }
        }
        @media only screen and (min-width: 1046px) and (max-width: 1086px) {
        #que-analysis { 
            max-width: 88%!important;
        }
        }
        @media only screen and (min-width: 1087px) and (max-width: 1157px) {
        #que-analysis { 
            max-width: 80%!important;
        }
        }
        @media only screen and (min-width: 1158px) and (max-width: 1199px) {
        #que-analysis { 
            max-width: 77%!important;
        }
        }
           
             
        @media only screen and (min-width: 1200px) and (max-width: 1245px) {
        #que-analysis { 
            max-width: 91.5%!important;
        }
        }
        @media only screen and (min-width: 1246px) and (max-width: 1300px) {
        #que-analysis { 
            max-width: 84.5%!important;
        }
        }
        @media only screen and (min-width: 1301px) and (max-width: 1350px) {
        #que-analysis { 
            max-width: 83.5%!important;
        }
        }
        @media only screen and (min-width: 1351px) and (max-width: 1375px) {
        #que-analysis { 
            max-width: 80.5%!important;
        }
        }
        @media only screen and (min-width: 1376px) and (max-width: 1405px) {
        #que-analysis { 
            max-width: 78.5%!important;
        }
        }
        @media only screen and (min-width: 1421px) and (max-width: 1470px) {
        #que-analysis { 
            max-width: 77%!important;
        }
        }
        @media only screen and (min-width: 1470px) and (max-width: 1499px) {
        #que-analysis { 
            max-width: 74%!important;
        }
        }
        @media only screen and (min-width: 1500px) and (max-width: 1601px) {
        #que-analysis { 
            max-width: 69.5%!important;
        }
        }
        @media only screen and (min-width: 1602px) and (max-width: 1625px) {
        #que-analysis { 
            max-width: 68.5%!important;
        }
        }
        @media only screen and (min-width: 1626px) and (max-width: 1799px) {
        #que-analysis { 
            max-width:65.5%!important;
        }
        }
        @media only screen and (min-width: 1800px) and (max-width: 2000px) {
        #que-analysis { 
            max-width: 60.5%!important;
        }
        }
        @media only screen and (min-width: 2002px) and (max-width: 2200px) {
        #que-analysis { 
            max-width: 53.5%!important;
        }
        }
      </style>

    
    <div id="exam-begin" style="display: none;">
            <div class="container">
                <section class="mt-10">
                    <h2 class="font-weight-bold font-16 text-dark-blue" id="exam-name"> </h2>
                    <p class="text-gray font-14 mt-5">
                        <a  class="text-gray">Live Examination</a>
                    </p>
                    <br><br>
                    <div class="col-md-2 activity">
                        <div class="row">
                            <input type="hidden" id="finish-timer-val">
                            <input type="hidden" id="timer-val">
                            <div id="timer-container" class="flex-space-between"><div>
                            <b id="timer">-- : --</b>
                            </div>
                        
                    </div>
                </section>
                <b id="timer-convert" data-hour="" style="display:none;"></b>

            <div class="row">
                <section class="mt-30 quiz-form col-md-8 exam-details" id="assessment" style="background:none !important;">
                       
                </section>

                <div class="rounded-lg shadow-sm mt-35 p-20 course-teacher-card d-flex align-items-center flex-column col-md-3 que-details" style="height: 450px;margin-left: 70px;"></div>
                
            </div>

            </div>

            <input type="hidden" id="total-available-que">

            <div class="rounded-lg shadow-sm mt-35 p-20 course-teacher-card d-flex align-items-center flex-column col-md-10 exam-details" id="que-analysis" style="height: 200px; display: none!important;">
                <div class="stars-card d-flex align-items-center mt-13">
                   <h5>Answer Preview</h5>
                </div>

                <div class="user-reward-badges d-flex flex-wrap align-items-center mt-10 ">
                    <div class="mr-15 mt-5" >
                        Answered - <span id="qAnsweredCount"> 0</span> |  Unanswered - <span id="qUnAnsweredCount"></span> 
                    </div>
                </div>  

                <div class="row options"></div>

            </div>
            <br>
            
        </div>
        
        <input type="hidden" name="reference-id" id="reference-id"/>

        <div class="container">
            <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <!-- 16:9 aspect ratio -->
                            <div class="embed-responsive embed-responsive-16by9" id="loadVideo">
                               
                            </div>
                            <div class="preview-content" style="min-height: 10rem;display:none;">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <button id="load-btn" onclick="htmlLoad();"></button>

        <script src="<?php echo base_url('assets/js/student/live_exam/question.js'); ?>"></script>

        <script>
        $(document).ready(function(){
            $("#load-btn").trigger("click");
        });

        function htmlLoad(){
            $('#load-btn').css('visibility', 'hidden');
            $('#exam-begin').on('click', function(){
              if(!document.fullscreenElement){
                $('html')[0].requestFullscreen();
              }
            });
        }

        $(function() {
            async function init() {
               const auth = await appModule.checkAuth();
               getquestions();
            }
            init();
         });

        $(function() {            

          $('.que-details').attr("style", "display: none !important");
          $('.previous1').addClass('disabled');
          $('#assessment').addClass('col-md-12');

            min = $('.jst-minutes').text();
            sec = $('.jst-seconds').text();       
            min1= min.replace(":", "");  
            sec1= sec.replace(":", "");    

        });

        $('.close').click(function(e){
            event.preventDefault();
            $('#myModal').modal('hide');

        });

        function checkedQue(que,qno,elem){
            event.preventDefault();
            radioBtnVal='';
            const currName = $('#'+que).attr('name');
            const currId = '#question-nav-' + currName.slice(9);
            
            var totalAvailQue = $('#total-available-que').val();
            var cansval = $('input[name="answer-'+qno+'"]').val();

            var radioBtnVal = $('input[name="question-'+qno+'"]:checked').val()
            console.log(radioBtnVal);

            var ansCount = $('#qAnsweredCount').html();
            var totalQCount = $('#qUnAnsweredCount').html();
           
            if($(elem).attr('checked')) { console.log('unchecking this'+currId)
                $(elem).next().removeClass('checked');
                $(elem).next().children('span').removeClass('optionss');
                $(currId).removeClass('done');
                $(elem).attr("checked", false);
                $('input[name="answer-'+qno+'"]').val('');
                //unchecked value to a variable
               $('input[name="selected-option-'+qno+'"]').val('');
               //end
                ansCount--;

            }else{
                    btnVal =1;

               $('input[name="'+currName+'"]').removeAttr("checked", true);
               $('input[name="'+currName+'"]').next().removeClass('checked');
               $('input[name="'+currName+'"]').next().children('span').removeClass('optionss');

              $('input[name="answer-'+qno+'"]').val('1');
               $(elem).next().addClass('checked');
               $(elem).next().children('span').addClass('optionss');
               $(currId).addClass('done');
               $(elem).attr("checked", true);

               //assign checked value to a variable
               $('input[name="selected-option-'+qno+'"]').val(radioBtnVal);
               //end
                submitQuizForm(".quizForm_"+qno,qno);

                if(cansval == ''){
                    ansCount++;
                }
            }

            $('#qAnsweredCount').html(ansCount);

            if(ansCount == 0){
                $('#qUnAnsweredCount').html(totalAvailQue)
            }else{
                $('#qUnAnsweredCount').html((totalAvailQue - ansCount));
            }
        }


        function submitQuizForm(quizForm,nval) {

        var href = location.href;
        license_id = href.match(/([^\/]*)\/*$/)[1];

        option = $('input[name="selected-option-'+nval+'"]').val();
        question_pool_id = $('input[name="question-pool-id'+nval+'"]').val();
        reference_id = $('input[name="reference-id"]').val();

        day     = new Date().toLocaleString();
        dateAr  = day.split(' ')[0].split('/');
        time    = day.split(' ')[1]
        var newSysDate = dateAr[2].replace(/,/g, "") + '-'+dateAr[0].replace(/,/g, "")+ '-'+dateAr[1].replace(/,/g, "") + ' '+ time;

       let formDatas = {
              student_id: parseInt($.cookie("student_id")),
              licence_id: parseInt(license_id),
              option_id: parseInt(option),
              exam_type : 1,
              question_pool_id : parseInt(question_pool_id),
              reference_id : parseInt(reference_id),
              date_time :  moment().format()
        }

        dataToSend = JSON.stringify( formDatas );

        $.ajax({
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',            
                type: "post",
                url: formApiUrl(`save-answer`),
                data: dataToSend,
            }).done(function (response) {
                if (response.status == true) {
                console.log('saved success')
                } else if (response.status == false) {
                    console.log('err')
                    NioApp.Toast("Error Occured", "error");
                } else {
                    NioApp.Toast("Invalid response status", "warning");
                }
            }).fail(function (error) {
                NioApp.Toast("Error Occured", "error");
            }).always(function () {
                $("#loader").fadeOut();
            });
    }

        function questionIs(val){

            $('#eval_quest'+val).find('.next1').attr('data-id',val);
            //$('.next1').attr('data-id', val);
            $('#eval_quest' + val).css("display", "block");

            total = $('#total-available-que').val();

            if(total == val){

                $('.pp'+val).hide();
               console.log('t'+total+'val'+val)
            }else{
                $('.pp'+val).show();
            }

              for(var i = 1; i <= total; i++) {
                if(i > 1){
                    $('.previous1').removeClass('disabled');
                }
                if(i == val){
                    $('#question-step-'+val).css('opacity','unset');
                    $('#question-step-'+val).show();

                }else{
                    $('.question-step-'+i).hide();
                    $('#eval_quest' + i).css("display", "none");
                }
              }

            //checking urrent que type 
                    que_val= $('#que-type'+val).attr('data-id-hidden');
                
                     if(val == que_val){
                        get_src = $('#que-type'+que_val).attr('data-src');
                         //console.log('next clicksrc'+get_src+'next click'+que_val)
                        get_type = $('#que-type'+que_val).attr('data-type');

                       /* if(get_src != ''){
                          //  console.log('this is containg img')
                            $('.que-details').empty('');
                            $('.que-details').append(`<div class="image-container video-btn" data-type="image" data-src="https://em.technoiq.in/development/backend${get_src}" onclick="showImage(this);" >
                            <img src="https://em.technoiq.in/development/backend${get_src}"  />
                            </div>`);
                            $('.que-details').attr("style", "display: flex !important");
                            $('.que-details').addClass('with-contents');
                            $('#assessment').removeClass('col-md-12');
                        }*/
                        if(get_type == 'image'){
                    
                        $('.que-details').empty('');
                        $('.que-details').append(`<div class="image-container hh video-btn que-image`+que_val+`" data-type="image" data-src="${media_url+''+get_src}" onclick="showImage(this);" >
                                    <img src="${media_url+''+get_src}"  />
                                </div>`);
                        $('.que-details').attr("style", "display: flex !important");
                        $('.que-details').addClass('with-contents');
                        $('#assessment').removeClass('col-md-12');
                

                }else if(get_type == 'video' ){
                
                        $('.que-details').empty('');
                        $('.que-details').append(`<div class="image-container video-btn que-image`+que_val+`" data-type="video" data-src="${media_url+''+get_src}" onclick="showImage(this);" >
                             <img src="${baseImgURL}"  />
                        </div>`);
                        $('.que-details').attr("style", "display: flex !important");
                        $('.que-details').addClass('with-contents');
                        $('#assessment').removeClass('col-md-12');
                }
                        else{
                           console.log('this is containg text')
                           // question_type ='text';
                            $('.que-details').attr("style", "display: none !important");
                            $('#assessment').addClass('col-md-12');
                        }
                     }
                  //end  
        }

        var $videoSrc;  
        var $videoType;

        function showImage(val){

                console.log('gg')
                    $videoSrc = $(val).data( "src" );
                    $videoType = $(val).data( "type" );
            
                    if($videoType == 'video'){ 
                        $('#myModal').modal('show'); 
                        $("#loadVideo").show();
                        $(".preview-content").hide(); 
                       // $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
                        //$("#video source").attr('src',$videoSrc); 
                        $('#loadVideo').append(`<video id="sampleMovie" width="640" height="360" preload controls>
                            <source src="${$videoSrc}" />
                            <source src="${$videoSrc}" />
                            <source src="${$videoSrc}" />
                        </video>`);
                        // stop playing the youtube video when I close the modal
                          $('#myModal').on('hide.bs.modal', function (e) {
                          //$("#video").attr('src',$videoSrc); 
                      });
                    }else{
                        $('#myModal').modal('show'); 
                        $("#loadVideo").hide();
                        $(".preview-content").show();

                        var h ='<img style="width: 540px;"src="'+$videoSrc+'">';

                        $('.preview-content').html(h);
                    }
        }

        //refresh prevent in page
        function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

        $(document).ready(function(){
             $(document).on("keydown", disableF5);
        });
       $(document).bind('contextmenu', function (e) {
           // e.preventDefault();
       
        });
      

        </script>
        <script>
            function request() {
            event.preventDefault();
            total_duration = window.localStorage.getItem("total-duration");
            converted_time = window.localStorage.getItem("converted-timer");
            var duration = total_duration * 60;

            function startTimer(duration) {
                var timer = duration,
                    minutes,
                    seconds;
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                totalDuration = minutes + ":" + seconds;
                return totalDuration;
            }
            var today = new Date();
            var month = today.getMonth() + 1;
            var day = today.getDate();

            var output = today.getFullYear() + "/" + (month < 10 ? "0" : "") + month + "/" + (day < 10 ? "0" : "") + day;

            var totalDurationIs = startTimer(duration);

            var valuestart = totalDurationIs;
            var valuestop = $("#timer-convert").text();

            var dateObj = new Date();
            var month = dateObj.getUTCMonth() + 1; //months from 1-12
            var day = dateObj.getUTCDate();
            var year = dateObj.getUTCFullYear();
            newdate = year + "-" + month + "-" + day;

            var isHrExist = $("#timer-convert").attr("data-hour");
            if (isHrExist == 1) {
                var date1 = new Date(newdate + " " + $("#timer-val").val() + ":00");
                var date2 = new Date(newdate + " " + $("#finish-timer-val").val() + ":00");
            } else {
                var date1 = new Date(newdate + " 00:" + valuestart);
                var date2 = new Date(newdate + " 00:" + valuestop);
            }

            var diffInSeconds = Math.abs(date1 - date2) / 1000;
            var days = Math.floor(diffInSeconds / 60 / 60 / 24);
            var hours1 = Math.floor((diffInSeconds / 60 / 60) % 24);
            var minutes1 = Math.floor((diffInSeconds / 60) % 60);
            var seconds1 = Math.floor(diffInSeconds % 60);
            var milliseconds = Math.round((diffInSeconds - Math.floor(diffInSeconds)) * 1000);

            hourIs = ("0" + hours1 + "h").slice(-2);
            secondsIs = ("0" + seconds1 + "s").slice(-2);
            if (("0" + minutes1).slice(-2) > "00") {
                minutesIs = ("0" + minutes1).slice(-2) + "m";
            } else {
                minutesIs = "00" + "m";
            }

            var examDuration = "";
            if (isHrExist == 1) {
                examDuration = hourIs + ":" + minutesIs;
            } else {
                examDuration = minutesIs + ":" + secondsIs;
            }
            var str = "You have exited full screen mode and your exam session will end now.";

            attended = $("#qAnsweredCount").html();
            Swal.fire({
                title: str,
                html: "",
                icon: "warning",
                timer: 4000,
                showCancelButton: false,
                showConfirmButton: false
            }).then(() => {
                var href = location.href;
                var resUrl = href.split("/");
                var pos = resUrl.indexOf("start");
                var license_id = localStorage.getItem("sel-license-id");
                var sub_license_id = localStorage.getItem("sel-sublicense-id");
                reference_id = $('input[name="reference-id"]').val();

                let formDatas = {
                    student_id: parseInt($.cookie("student_id")),
                    license_id: $.cookie("license_type_id"),
                    sub_license_id: $.cookie("sub_license_type_id"),
                    duration: examDuration,
                    reference_id: reference_id,
                };

                dataToSend = JSON.stringify(formDatas);

                $.ajax({
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    type: "post",
                    url: formApiUrl(`result`),
                    data: dataToSend,
                })
                    .done(function (response) {
                        if (response.status == true) {
                            var correct_ans = response.data.correct_answers;
                            var wrong_ans = response.data.wrong_answers;
                            var total_que = response.data.total_question;
                            var total_marks = response.data.total_marks;
                            var percentage = response.data.percentage;
                            var obtained_marks = response.data.obtained_marks;
                            var duration = response.data.duration;
                            window.localStorage.setItem("attended-que", attended);
                            window.localStorage.setItem("correct-ans", correct_ans);
                            window.localStorage.setItem("wrong-ans", wrong_ans);
                            window.localStorage.setItem("questions", total_que);
                            window.localStorage.setItem("total", total_marks);
                            window.localStorage.setItem("percentage", percentage);
                            window.localStorage.setItem("marks", obtained_marks);
                            window.localStorage.setItem("attended-duration", duration);

                            if (response.data.result == "pass") {
                                window.location.href = base_url + "student/live_exam/passed";
                            } else {
                                window.location.href = base_url + "student/live_exam/failed";
                            }
                        } else if (response.status == false) {
                            NioApp.Toast("Error Occured", "error");
                        } else {
                            NioApp.Toast("Invalid response status", "warning");
                        }
                    })
                    .fail(function (error) {
                        NioApp.Toast("Error Occured", "error");
                    })
                    .always(function () {
                        $("#loader").fadeOut();
                    });
            });
        }</script>

