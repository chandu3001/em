<style>
    * {
        font-family: "Poppins", sans-serif !important;
    }

    .below button {
        border: solid 1px #fff !important;
        margin-top: 45px !important;
        margin-bottom: 33px !important;
        height: 38px !important;
        width: 10%;
        font-size: 16px !important;
        color: #fff;
        background-color: rgb(0 0 255);
        border-radius: 6px !important;
    }

    #school-name {
        margin-top: 20px;
    }
    .exam-type-fail a{
      text-decoration:none !important;
      font-weight: 700;
    }
    .student-details{
      width:200px !important;
    }
    @media (min-width: 1200px){
   .container{
     max-width: 1364px !important;
    }
    }
    .col-md-10{
      width:100% !important;
    }
    .exam-type-fail h1{
      padding-top:0px !important;
    }
    .exam-type-fail{
      margin-top:10px;
    }
    @media print {
      .exam-type-fail a, .print, .container-fluid button{
        display:none !important;
      }
      }
      .container-fluid #navbarSupportedContent{
        display:none !important;
      }
      #percentage{
        color:black !important;
      }
    
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>school</title>
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/student/css/schoolfail.css');?>"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/student/css/styles/css/style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/student/css/styles/css/bootstrap-5.0.2/css/bootstrap.min.css');?>">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script>
        const base_url = "<?php echo base_url()?>";
        const domain_name = "<?php echo $this->config->item('domain_name')?>";
        const domain_path = "<?php echo $this->config->item('domain_path')?>";
        const api_base_url = "<?php echo $this->config->item('api_base_url')?>";
        const image_url = "<?php echo $this->config->item('image_url')?>";
    </script>

</head>

<body>


    <header>
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
              <img src="<?php echo base_url('assets/images/logo.png');?>" style="margin-bottom: 13px;">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item ">
                    <a class="nav-link mx-1 text-white" href="#"><span class="iconify text-white"  data-icon="fa-solid:bell"></span></a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link mx-1 text-white" href="#"><span class="iconify text-white"  data-icon="fa-solid:download"></span></a>
                  </li>
                  <li class="nav-item">
                    <img class="w-25" src="<?php echo base_url('assets/images/user.png')?>" alt="user-icon">
                  </li>
    
    
                </ul>
    
              </div>
            </div>
          </nav>
        </div>
      </header>
      <section>
        <div class="container-fluid">
    
          <div class="col-md-12">
            <div class="row">
              <!-- <div class="col-md-2 student-details user_img" style="height: max-content; ">
                <img class="w-75 rounded-circle"  src="<?php echo base_url('assets/images/user.png')?>" alt="user-icon">
                <h2> <span id="student_name"></span> <br><span id="student_id">Student ID : 800</span></h2>
                <h2>System Name <br><span class="system_name"></span></h2>
                <h2>Device Status <br><span class="authenticated"></span></h2>
                <p class="student-details-logo">Powered by <img src="<?php echo base_url('assets/images/student-detail-logo.png');?>" alt="hhp"></p>
              </div> -->
              <div class="col-md-10 exam-type-fail">
                <a href="javascript:void(0)" onclick="backToLogin()"> <img class="" src="<?php echo base_url('assets/images/arrow.png') ?>" alt="Card image cap"><span> BACK </span></a>
                <!-- <a href="#"> <span class="time" style="float: right;">10m:30sec</span> </a> -->
                <h1>SCORE CARD</h1>
                <div class="row score-card-fail mt-4">
    
                  <div class="card" style="width: 20rem;">
                    <div class="card-body user_img">
                      <h2 class="card-title">Better Luck Next Time <br><span>You Failed <span id="exam_title"></span> !</span></h2>
                      
                      <img style="width: 120px" class="img-fluid rounded-circle" src="<?php echo base_url('assets/images/user.png');?>" alt="">
                      
                      <h1><span class="student_name"></span> <br><span class="student_id">Student ID: 800</span></h1>
    
    
                    </div>
                  </div>
    
                  <div class="card" style="width: 30rem;">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 marksheet">
                          <p>Total Question <span style="float: right;" id="que"></span> </p>
                          <p>Correct Answer <span style="float: right;"><span style="float: right;" id="correct"></span> </p>
                          <p>Total Mark <span style="float: right;" id="marks"></span> </p>
                          <p>Percentage <span style="float: right;color:#ff0000;font-weight: 500;" id="percentage"></span> </p>
    
                        </div>
                        <div class="col-md-6 marksheet">
                          <p>Attended Question <span style="float: right;" id="attended"></span> </p>
                          <p>Wrong Answer <span style="float: right;" id="wrong"></span> </p>
                          <p>Obtained Mark <span style="float: right;" id="gained"></span> </p>
                          <p>Duration <span style="float: right;" id="attended-duration"></span> </p>
    
                        </div>
                      </div>
    
                      <h5 class="card-title fail">Failed</h5>
                    </div>
    
                  </div>
    
                </div>
    
                <!-- <div class="row">
                  <div class="col-md-12 print">
                    <button type="button" onclick="print()" class="btn btn-primary btn-lg btn-block">Print</button>
    
                  </div>
                </div> -->
    
              </div>
            </div>
          </div>
    
    
        </div>
    
      </section>
    


    <!-- <div class="main-header">

        <img src="<?php echo base_url('assets/images/logo.png');?>">

    </div>
    <div class="header">
        <div class="nav">
            <div class="content">
                <h1 id="school-name"></h1>
            </div>
            <div class="logo">
                <img src="https://em.technoiq.in/images/Logo.png" id="logo" alt="Hello">
            </div>
        </div>
    </div>
    <br><br>
    <div class="main">
        <div class="row">
            <div class="row1">
                <div class="main-content">
                    <h1>“Oops!!! Better luck next time”</h1>
                    <h5 id="title"></h5>

                </div>

                <div class="box">

                    <div class="box-content">

                        <div class="student-logo">

                            <img src="<?php echo base_url('assets/student/images/logouser.png');?>">

                        </div>

                        <div class="student-name">

                            <h2 id="student_name"></h2>

                            <h5 id="student_id"></h5>


                        </div>

                    </div>

                </div>

            </div>

            <div class="Scorecard">

                <h3> Scorecard</h3>

                <ul>

                    <li>

                        <ul class="total">

                            <li>Total Questions</li>

                            <li id="que"> 8</li>

                        </ul>

                    </li>
                    <li>

                        <ul class="total">

                            <li>Attended Questions</li>

                            <li id="attended"> </li>

                        </ul>

                    </li>
                    <li>

                        <ul class="total">

                            <li>Correct Answers</li>

                            <li id="correct"> 4</li>

                        </ul>

                    </li>

                    <li>

                        <ul class="total">

                            <li>Wrong Answers</li>

                            <li id="wrong"> 4</li>

                        </ul>

                    </li>

                    <li>

                        <ul class="total">

                            <li>Total Marks</li>

                            <li id="marks"> 160</li>

                        </ul>

                    </li>

                    <li>

                        <ul class="total">

                            <li>Obtained Marks</li>

                            <li id="gained"> 80</li>

                        </ul>

                    </li>

                    <li>

                        <ul class="total">

                            <li>Percentage</li>

                            <li id="percentage"> </li>

                        </ul>

                    </li>

                    <li>

                        <ul class="total">

                            <li>Result</li>

                            <li> Fail</li>

                        </ul>

                    </li>

                    <li>

                        <ul class="total">

                            <li>Duration</li>

                            <li id="attended-duration">00:20:00</li>

                        </ul>

                    </li>

                </ul>

            </div>

        </div>

    </div>

    <footer class="below">

        <button type="submit" onclick="print()">PRINT</button>
        <button onclick="backToLogin()" type="button">CLOSE</button>


    </footer> -->

    <?php include_once APPPATH . 'views/student/includes/footer_scripts.php'; ?>

    <script type="text/javascript">

        function backToLogin() {
            location.href = base_url + 'student/login?auth=' + $.cookie('auth')
        }
        $(function () {

            $("#logo").attr('src', $.cookie("school_logo"))

            studenName = window.localStorage.getItem("student--name");
            studentID = window.localStorage.getItem("student--id");
            $('#student_names').html(studenName);
            $('#student_ids').html('Student ID : ' + studentID);

            correct = window.localStorage.getItem("correct-ans");
            wrong = window.localStorage.getItem("wrong-ans");
            que = window.localStorage.getItem("questions");
            marks = window.localStorage.getItem("total");
            percentage = window.localStorage.getItem("percentage");
            gained = window.localStorage.getItem("marks");
            duration = window.localStorage.getItem("duration");
            exam = window.localStorage.getItem("examination");
            $('#exam_title').html(exam)
            attended = window.localStorage.getItem("attended-que");
            attendedDuration = window.localStorage.getItem("attended-duration");

            total_duration = window.localStorage.getItem("total-duration");
            converted_time = window.localStorage.getItem("converted-timer");
            var duration = total_duration * 60;

            function startTimer(duration) {
                var timer = duration, minutes, seconds;
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                totalDuration = minutes + ':' + seconds;

                //console.log('splited time'+minutes +':'+seconds)
                return totalDuration;
            }

            var totalDurationIs = startTimer(duration);
            var dateObj = new Date();
            var month = dateObj.getUTCMonth() + 1; //months from 1-12
            var day = dateObj.getUTCDate();
            var year = dateObj.getUTCFullYear();
            newdate = year + "-" + month + "-" + day;

            var date1 = new Date(newdate + ' 00:' + totalDurationIs);
            var date2 = new Date(newdate + ' 00:' + converted_time);

            var diffInSeconds = Math.abs(date1 - date2) / 1000;
            var days = Math.floor(diffInSeconds / 60 / 60 / 24);
            var hours = Math.floor(diffInSeconds / 60 / 60 % 24);
            var minutes = Math.floor(diffInSeconds / 60 % 60);
            var seconds = Math.floor(diffInSeconds % 60);
            var milliseconds = Math.round((diffInSeconds - Math.floor(diffInSeconds)) * 1000);

            console.log('hours', ('0' + hours).slice(-2));
            console.log('minutes', ('0' + minutes).slice(-2));
            console.log('seconds', ('0' + seconds).slice(-2));
            secondsIs = ('0' + seconds).slice(-2);
            if (('0' + minutes).slice(-2) > '00') {
                minutesIs = ('0' + minutes).slice(-2) + 'm';
            } else {
                minutesIs = '';
            }
            //end

            console.log('WRONG IS' + wrong)
            $('#correct').html(correct);
            $('#wrong').html(wrong);
            $('#que').html(que);
            $('#marks').html(marks);
            $('#percentage').html(percentage);
            $('#gained').html(gained);
            $('#attended-duration').html(attendedDuration);
            $('#title').html('You Did Not Clear Your ' + exam);
            $('#attended').html(attended);

        });

    </script>

    <script>
        $(document).ready(function () {
            function disableBack() {
                window.history.forward()
            }
            window.onload = disableBack();
            window.onpageshow = function (e) {
                if (e.persisted)
                    disableBack();
            }
        });
    </script>
</body>

</html>