<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script>
    const base_url = "<?php echo base_url(); ?>";
    const domain_name = "<?php echo $this->config->item('domain_name'); ?>";
    const domain_path = "<?php echo $this->config->item('domain_path'); ?>";
    const api_base_url = "<?php echo $this->config->item('api_base_url'); ?>";
    const image_url = "<?php echo $this->config->item('image_url'); ?>";
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
      width: 250px;
      height: 250px;
      border-radius: 50%;
      background-color: #616DED;
      margin: auto;
      margin-top: 30px;
      color: #fff;
    }

    .clock {
      display: block;
      width: 100%;
      margin: auto;
      text-align: center;
      font-size: 140px;
    }

    /* .start-details{
        margin-left: -62px;
      } */

    .start-sys-details {
      margin-right: -50px;
    }

    .nk-block-between {
      display: block !important;
    }

    .nk-content-body {
      display: flex !important;
      justify-content:center !important;
    }

    #instructions {
      width: 100%;
      margin-top: -15px;
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
    }
    #school-name{
      margin-left: 0px !important;
    }
    .btn-outline-light,
    .btn-outline-light span {
      background: none !important;
      border: none !important;
      color: #616ded;
    }

    .ni-arrow-left:hover {
      color: #616ded;
    }

    #mock_center {
      font-size: 30px;
    }

    .header_mock {
      width: max-content !important;
    }

    .display_flex_mock {
      display: flex !important;
    }

    .nk-content-body .start-details {
      height: 467px;
      padding: 20px 0px 0px 0px;
      margin-top: 14px;
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
      /* position: relative;
      left: 415px; */
    }

    #username,
    #host-name,
    #device-status {
      font-size: 20px !important;
    }

    #host-name-value {
      font-size: 12px !important;
    }

    #device-status-area p:last-child {
      color: #33C052 !important;
    }

    .g-4:not(.row) {
      margin-top: 0px;
    }

    .start-details .nk-block-between-md {
      margin-left: 24px;
      margin-right: 5px;
      width: 200px;
    }

    .user_img {
      display: flex;
      justify-content: center;
      margin-right: 30px;
    }

    .footer_hhp {
      top: 15% !important;
    }

    /* .btn-outline-light {
      left: 60px;
    } */

    @media(max-width:998px) {
      #start {
        width: 100%;
      }
    }

    @media(max-width:2800px) {
      .d-sm-inline-flex #mock_center {
        transform: translateX(65rem);
      }

      /* #timer-begin {
        left: 68rem;
      } */
    }

    @media(max-width:2400px) {
      .d-sm-inline-flex #mock_center {
        transform: translateX(54rem);
      }

      /* #timer-begin {
        left: 68rem;
      } */
    }

    /* @media(max-width:2210px) {
      #timer-begin {
        left: 58rem;
      }
    } */

    @media(max-width:2200px) {
      .d-sm-inline-flex #mock_center {
        transform: translateX(43rem);
      }

      /* #timer-begin {
        left: 47rem;
      } */
    }

    @media (max-width: 1900px) {
      .d-sm-inline-flex #mock_center {
        transform: translateX(38rem);
      }

      /* #timer-begin {
        left: 42rem;
      } */
    }

    @media (max-width: 1650px) {
      .d-sm-inline-flex #mock_center {
        transform: translateX(27rem);
      }

      /* #timer-begin {
        left: 30rem;
      } */
    }

    @media (max-width: 1600px) {
      .d-sm-inline-flex #mock_center {
        transform: translateX(33rem);
      }

      /* #timer-begin {
        left: 36rem;
      } */
    }

    @media (max-width: 1500px) {
      .d-sm-inline-flex #mock_center {
        transform: translateX(21rem);
      }

      /* #timer-begin {
        left: 25rem;
      } */
    }

    @media (max-width: 1350px) {
      .d-sm-inline-flex #mock_center {
        transform: translateX(19rem);
      }

      /* #timer-begin {
        left: 22rem;
      } */
    }

    @media (max-width: 1200px) {
      .d-sm-inline-flex #mock_center {
        transform: translateX(19rem);
      }

      /* #timer-begin {
        left: 23rem;
      } */
    }

    @media (max-width: 1150px) {
      .d-sm-inline-flex #mock_center {
        transform: translateX(17rem);
      }

      /* #timer-begin {
        left: 20rem;
      } */
    }

    @media (max-width: 1024px) {
      .d-sm-inline-flex #mock_center {
        transform: translateX(15rem);
      }

    }
   </style>

</head>

</html>

<body class="nk-body bg-white has-sidebar no-touch nk-nio-theme" id="begining-body">
  <?php include_once APPPATH . 'views/student/includes/navbar.php'; ?>

  <div class="nk-content nk-content-fluid common">

    <div class="container-xl wide-lg common">
      <div class="nk-content-body">

        <?php include_once APPPATH . 'views/student/includes/main_header1.php'; ?>

        <div class="nk-content-body">
          <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
              <div class="nk-block-head-content display_flex_mock">
                <!-- <div>
                  <a href="https://em.technoiq.in/development/frontend/student/mock_exam"
                    class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                      class="icon ni ni-arrow-left"></em><span>Back</span></a><a href="/demo5/product-list.html"
                    class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                      class="icon ni ni-arrow-left"></em></a>
                </div> -->
                <div class="nk-block-head-content header_mock">
                  <div class="toggle-wrap nk-block-tools-toggle">
                    <a class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                        class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                      <!-- <ul class="nk-block-tools g-3">
                        <li>
                          <a class="d-none d-sm-inline-flex"> <span id="mock_center">Mock Exam</span></a>
                        </li>
                      </ul> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="nk-block-head-content" style="text-align: center;">
              <!-- <h3 class="nk-block-title page-title">Instruction</h3> -->
            </div>
            <!-- <div class="nk-block-head-content header_mock">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                              <a class="d-none d-sm-inline-flex"> <span id="mock_center">Mock Exam</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                               </div>
                            </div> -->
            <div class="" id="timer-begin" style="display: none;text-align: center;margin-top: -40px;">
              <h3 style="color:#616DED !important;">Exam Starts In</h3>
              <div id="clock">
                <span id="seconds" class="clock">3</span>
              </div>
            </div>
          </div>
        </div>

        <div class="nk-block ps-4" id="instructions">
          <h4 style="display: flex; justify-content: center;">Instructions</h4>
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
                <button type="submit" class="btn  btn-primary" id="start">Get Started </button>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="" id="timer-begin" style="display: none;text-align: center;margin-top: -40px;">
                        <h3>Your Examination Starts In:</h3>
                        <div id="clock">
                           <span id="seconds" class="clock">3</span>
                        </div>
                    </div> -->
        <?php include_once APPPATH . 'views/student/exam/mock_exam/exam.php'; ?>
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
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'

      }).then((result) => {
        if (result.isConfirmed) {
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
              //$('.start-details').hide();
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

      //console.log('system width '+heightIs);
      //console.log('when resized '+win.height());

      // document.onkeydown = function (e) {
      //     e.preventDefault();
      //     e.stopPropagation();
      //     alert('Keypress is diabled');
      // }
      $(document).on("keydown", function (ev) {
        console.log(ev.keyCode);
        if (ev.keyCode === 27 || ev.keyCode === 122) return false
      })

      if (win.height() == heightIs) {

        // request();
        // alert('You cant exit the screen');
        e.preventDefault();
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