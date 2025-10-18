<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script>
    const base_url = "<?php echo base_url() ?>";
    const domain_name = "<?php echo $this->config->item('domain_name') ?>";
    const domain_path = "<?php echo $this->config->item('domain_path') ?>";
    const api_base_url = "<?php echo $this->config->item('api_base_url') ?>";
    const image_url = "<?php echo $this->config->item('image_url') ?>";
  </script>
  <link id="skin-default" rel="stylesheet"
    href="<?= base_url('assets/css/theme.css?ver=3.0.0') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/dashlite.css?ver=3.0.0')?>">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <link id="skin-default" rel="stylesheet" href="<?php echo base_url('assets/student/css/common.css'); ?>" />
  <script src="<?php echo base_url('assets/js/libs/moment.js'); ?>"></script>

  <style>
    body.nk-body {
      background-color: #eef5f9 !important;
    }
    .main-title {
      background: #00e1ff;
    }

    .live-exam {
      background: #a5ff01;
    }

    .instruction {
      margin-top: 10px;
      text-align: justify;
    }

    #clock {
      width: 247px;
      height: 247px;
      border-radius: 50%;
      background-color: #616ded;
      margin: auto;
      margin-top: 30px;
      color: #fff;
    }

    .clock {
      display: block;
      width: 100%;
      margin: auto;
      text-align: center;
      font-size: 150px;
    }

    .start-sys-details {
      margin-right: -50px;
    }

    .nk-block-between {
      display: block !important;
    }

    .nk-content-body {
      display: flex !important;
      justify-content: center;
    }

    #instructions {
      width: 100%;
      margin-right: 50px;
      margin-top:-8px
    }
    .live_exam_title{
      margin-bottom: -18px;
    }
    .container-xl .nk-block {
      margin-top: 85px;
    }

    body {
      min-height: 100% !important;
    }

    .d-sm-inline-flex #mock_center {
      transform: translateX(364px);
    }

    .card-bordered {
      border: 1px solid #D8D7D7;
      border-top: 6px solid #5048E5;
      border-radius: 8px
    }

    .offset-lg-5 {
      margin-left: 0px !important;
    }

    #start {
      background: #fff;
      padding: 14px 15px !important;
      border: 1px solid #D8D7D7;
      color: #5048E5;
      width: 174%;
      display: flex;
      justify-content: center;
      box-shadow: 0px 0px 10px rgba(97, 109, 237, 0.2);
      border-radius: 8px;
    }

    .instruction_image_bg {
      margin-bottom: 25px;
      margin-top: 32px;
    }

    #school-name,
    .logo-title {
      display: none !important;
    }

    .btn-outline-light,
    .btn-outline-light span {
      background: none !important;
      border: none !important;
      color: #616ded;
    }

    /* .btn-outline-light {
      right: 333px !important;
    } */

    .ni-arrow-left:hover {
      color: #616ded;
    }

    #mock_center {
      font-size: 30px;
    }

    /* .header_mock {
      width: max-content !important;
    } */

    .display_flex_mock {
      display: flex !important;
    }

    .nk-content-body .start-details {
      height: 490px;
      margin-top: 26px;
    }

    .swal2-actions {
      width: 100% !important;
    }

    .swal2-styled.swal2-cancel {
      background-color: #fff !important;
      color: rgb(221, 51, 51) !important;
      width: 42% !important;
    }

    .swal2-styled.swal2-confirm {
      width: 42% !important;
      background-color: #616DED !important;
    }

    #timer-begin {
      margin-top: 52px !important;
      position: relative;
      margin-right: 80px !important;
      /* left: -350px; */
    }

    #timer-begin h3 {
      color: #616ded;
    }

    .footer_hhp {
      top: 19% !important;
      width: 125%
    }

    .nk-block-between-md {
      margin-left: 0px !important;
      margin-top: 0px !important;
      margin-right: 0px !important;
      width: 200px;
    }

    .user_img {
      justify-content: center;
      display: flex;
      padding-left: 25px !important;
    }

    .toggle-expand-content .d-sm-inline-flex span {
      transform: translateX(539px);
      font-size: 32px;
    }

    #device-status-area {
      padding-right: 0px;
    }

    #device-status {
      font-size: 19px !important;
    }

    .live_exam_title h3 {
      justify-content: center;
      display: flex;
      margin-top: -75px;
      margin-bottom: 35px;
    }

    .swal2-actions:not(.swal2-loading) .swal2-styled:hover {
      background-image: none !important;
    }

    .swal2-styled.swal2-default-outline:focus {
      box-shadow: none !important;
    }

    @media(max-width:1330px) {
      /* .btn-outline-light {
        right: 252px !important;
      } */
    }

    @media(max-width:992px) {
      #start {
        width: 100% !important;
      }
    }
   
  </style>
  <script type="text/javascript">
    $(document).ready(function () {
      window.history.pushState(null, "", window.location.href);
      window.onpopstate = function () {
        window.history.pushState(null, "", window.location.href);
      };
    });

    window.history.forward();
    function noBack() { window.history.forward(); }
  </script>
</head>

</html>

<body class="nk-body bg-white has-sidebar no-touch nk-nio-theme" id="begining-body" onload="noBack();"
  onpageshow="if (event.persisted) noBack();" onunload="" style="background:#eef5f9 !important;">
  <?php include_once APPPATH . 'views/student/includes/navbar.php'; ?>

  <div class="nk-content nk-content-fluid common">

    <?php include_once APPPATH . 'views/student/includes/main_header.php'; ?>

    <div class="container-xl wide-lg common">
      <div class="nk-content-body">

        <?php include_once APPPATH . 'views/student/includes/main_header1.php'; ?>


        <div class="nk-content-body justify-content-start">
          <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
              <!-- <div class="nk-block-head-content display_flex_mock">
                <a href="https://em.technoiq.in/development/frontend/student/live_exam"
                  class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                    class="icon ni ni-arrow-left"></em><span>BACK</span></a><a href="/demo5/product-list.html"
                  class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                    class="icon ni ni-arrow-left"></em></a>
              </div> -->

              <div class="nk-block-head-content" style="text-align: center;">
                <!-- <h3 class="nk-block-title page-title">Instruction</h3> -->
              </div>
              <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                  <a class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                      class="icon ni ni-more-v"></em></a>
                  <!-- <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                              <a class="d-none d-sm-inline-flex"> <span>Live Exam</span></a>
                                            </li>
                                        </ul>
                                    </div> -->
                </div>
              </div>
            </div>
          </div>
          <div id="timer-begin" class="w-100" style="display:none">
            <div class="d-flex align-items-center justify-content-between flex-column w-100" style="text-align: center;">
              <h3>Exam Starts In:</h3>
              <div id="clock">
                <span id="seconds" class="clock">3</span>
              </div>
            </div>
          </div>
        

          <div class="nk-block ps-4" id="instructions">
          <h4 style="display: flex; justify-content: center;">Instructions</h4>
            <div class="live_exam_title">
             
            </div>
            <div class="instruction_image_bg"><img src="<?php echo base_url('assets/images/Cover.jpg'); ?>" alt=""></div>

            <div class="card card-bordered">
              <div class="card-aside-wrap">
                <div class="card-content">

                  <div class="card-inner">
                    <div class="nk-block" style="margin-top: 0px;">
                      <div class="nk-block-head">

                        <p class="instruction">



                        </p>
                      </div>

                      <!-- <div class="row g-3">
                                                  <div class="col-lg-7 offset-lg-5">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn  btn-primary" id="start">Start <em class="icon ni ni-arrow-right"></em></button>
                                                    </div>
                                                  </div>
                                              </div> -->

                    </div>

                  </div>
                </div>

              </div>
            </div>
            <div class="row g-3">
              <div class="col-lg-7 offset-lg-5">
                <div class="form-group mt-2">
                  <button type="submit" class="btn  btn-primary" id="start">Get Started 
                    <!-- <em class="icon ni ni-arrow-right"></em> -->
                    </button>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="" id="timer-begin" style="display: none;text-align: center;margin-top: -40px;">
                          <h3>Exam Starts In:</h3>
                          <div id="clock">
                            <span id="seconds" class="clock">3</span>
                          </div>
                      </div> -->
          <?php include_once APPPATH . 'views/student/exam/live_exam/exam.php'; ?>
        </div>
      </div>

    </div>
  </div>
  

  <?php include_once APPPATH . 'views/student/includes/footer_scripts1.php'; ?>

  <script>

    $('#start').click(function (e) {
      event.preventDefault();

      Swal.fire({
        title: 'Are you sure to proceed with the Exam?',
        html: '',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0971fe',
        cancelButtonColor: '#c5473c',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'

      }).then((result) => {
        if (result.isConfirmed) {
          getquestions();
          $("li#exam_style").hide();
          $('#timer-begin').show();
          $('#instructions').hide();
          $('.page-title').hide();

          timeLeft = 3;

          function countdown() {
            timeLeft--;
            document.getElementById("seconds").innerHTML = String(timeLeft);
            if (timeLeft > 0) {
              setTimeout(countdown, 1000);
            } else {

              if (!document.fullscreenElement) {
                $('html')[0].requestFullscreen();
              }
              $('#exam-begin').show();
              $('#timer-begin').hide();
              // $('.common,.start-details,.navbar-top').hide();
              // $('.start-details').hide();
              //$('.navbar-top').hide();
              // $('link[href="https://em.technoiq.in/development/frontend/assets/css/dashlite.css?ver=3.0.0"]').remove();
              // $('link[href="https://em.technoiq.in/development/frontend/assets/css/theme.css?ver=3.0.0"]').remove();

              // $('head').append('<link rel="stylesheet" href="<?php echo base_url('assets/student/css/style.css'); ?>" type="text/css" />');
              // $('head').append('<link rel="stylesheet" href="<?php echo base_url('assets/student/css/app.css'); ?>" type="text/css" />');

              // $('#begining-body').prepend(`<div id="app" style="background: blue;">
              //                                               <img src="<?php echo base_url('assets/images/logo.png'); ?>">
              //                                       </div>`);
            }
          };
          setTimeout(countdown, 1000);
        }
      })
    });
  </script>
  <script type="text/javascript">
    $(function () {
      $(document).bind('contextmenu', function (e) {
        //  e.preventDefault();
      });
    });
    $(document).keyup(function (e) {
      if (e.which == 122) {
        e.preventDefault();//kill anything that browser may have assigned to it by default
        //do what ever you wish here :) 
        return false;
      }
    });

  </script>

  <script type="text/javascript">

    $(window).on('resize', function (e) {

      var win = $(this); //this = window

      var widthIs = window.localStorage.getItem("window-width");
      var heightIs = window.localStorage.getItem("window-height");
      console.log('stored wudth ' + widthIs);

      console.log('stored heigh ' + heightIs);
      console.log('when resized ' + win.height());
      console.log('when resized ' + win.width());

      $(document).on("keydown", function (ev) {
        console.log(ev.keyCode);
        if (ev.keyCode === 27 || ev.keyCode === 122) return false
      })

      if (win.height() == heightIs) {
        console.log('existing')
        request();
      }

    });

    $(function () {
      getInstruction();
    });
    //load instructions by language id
    // Get language list
    window.getInstruction = async function (option = {}) {

      const school_id = await appModule.getCookie('school_id');
      langID = localStorage.getItem("sel-language-id");

      $.ajax({
        type: "get",
        url: formApiUrl(`get-instruction/${langID}/${school_id}`),
        headers: {
          'Authorization': `Bearer ${appModule.getToken()}`
        },
        beforeSend: function () {
          $("#loader").fadeIn();
        },
      }).done(({ status, message = "something went wrong!", data }) => {
        if (status) {

          $(".instruction").html(data.instruction);


        }
      }).fail(function (error) {
        NioApp.Toast("Error Occured", "error");
      }).always(function () {
        $("#loader").fadeOut();
      });
    }


//end


  </script>


</body>

</html>