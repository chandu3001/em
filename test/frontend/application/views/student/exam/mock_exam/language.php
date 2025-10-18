  <?php include_once APPPATH . 'views/student/includes/header.php'; ?>
  <link id="skin-default" rel="stylesheet" href="<?php echo base_url('assets/student/css/common.css');?>"/>
   <style>
      #licence-error,#sub-license-error{
         color: red;
      }
      .start-details{
        display: flex;
       background: #fff;
       border-radius: 0px 24px 24px 0px;
       box-shadow: 0px 0px 20px 4px rgba(97, 109, 237, 0.2);
       width: 200px;
       height: 485px;
       margin-top: 15px;
    }
   /* .nk-block-head-content{
      display: flex;
    justify-content: center;
   } */
   .nk-block-between{
      display: unset;
   }
   .nk-content-fluid{
        display:flex;
   }
   .logo-title{
        display:none !important;
   }
   .heading_title_text{
         margin-left:-100px;
   }
   .container-xl .nk-block{
       margin-top:0px !important;
      }
      #username, #host-name, #device-status{
        font-size:20px !important;
    }
    #host-name-value{
        font-size: 12px !important;
      }
      #device-status-area p:last-child{
    color:#33C052 !important;
   }
   .footer_hhp{
      top: 13% !important;
   }
   .g-4:not(.row){
      margin-left: 10px !important;
      margin-top: 25px !important;
   }
   .user_img{
   justify-content: center;
    display: flex;
   }
   .container-xl{
      padding-left: 2% !important;
    transform: translateY(-170px) !important;
    position: relative;
   }
   .d-sm-inline-flex{
      margin-top:177px !important;
   }
   .nk-wrap {
      max-height: 100vh;
   }
   .container-xl{
      margin-top: 2%;
   }
   .nk-block-between-md{
      height:485px !important;
   }
   .nk-header-fixed + .nk-content{
      margin-top: 59px;
   }
   </style>
   <body class="nk-body bg-white has-sidebar ">
      <div class="nk-app-root">
      <!-- main @s -->
      <div class="nk-main ">
         <!-- sidebar @s -->

         <!-- sidebar @e -->
         <!-- wrap @s -->
         <div class="nk-wrap ">
            <!-- main header @s -->
            <?php include_once APPPATH . 'views/student/includes/navbar.php'; ?>

            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content nk-content-fluid">
                
            <?php include_once APPPATH . 'views/student/includes/main_header.php'; ?>

            <?php include_once APPPATH . 'views/student/includes/main_header1.php'; ?>
            
            <div class="container-xl wide-lg">
                  <div class="nk-content-body">
                     <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                           <div class="nk-block-head-content" style="margin-bottom: -22px;"><a href="<?php echo base_url('student');?>" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>BACK</span></a><a href="/demo5/product-list.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a></div>

                            <div class="nk-block-head-content heading_title_text" style="text-align: center;">
                            <h3>Mock Exam</h3>
                              <h3 class="nk-block-title page-title heading_title" style="margin-top:53px;">Choose Your Preferred Language</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a  class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                              <!-- <a class="d-none d-sm-inline-flex"> <span>Mock Exam</span></a> -->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>

                    <div class="nk-block nk-block-lg " id="main-language"> </div>

                  </div>
               </div>
            </div>
            <!-- content @e -->
            <!-- <?php include_once APPPATH . 'views/student/includes/footer.php'; ?> -->
            <!-- wrap @e -->
         </div>
         <!-- main @e -->
      </div>
      <!-- app-root @e -->
      
       <?php include 'licence.php'; ?>

       <?php include_once APPPATH . 'views/student/includes/footer_scripts.php'; ?>
      <script src="<?php echo base_url('assets/js/student/language.js'); ?>"></script>

      <script>
         
        function begin(id,code){

            // $('#modalLicence').modal('show');
            $('#language-id').val(id);
            $('#language-code').val(code);

            console.log('time is')
            $.ajax({
                     type: "get",
                     url: formApiUrl(`validate-license`),
                    // data: $(this).serialize(),
                     data: {
                     license_id: $.cookie('license_type_id'),
                     sub_license: $.cookie('sub_license_type_id'),
                     },
                     beforeSend: function () {
                        $("#loader").fadeIn();
                     },
                  }).done(function (response) {
                     console.log('response is'+response.status)
                  if (response.status == true) {
                        $('#attend-btn').removeAttr("disabled");
                        
                     localStorage.setItem("sel-language-id", id);
                     localStorage.setItem("sel-language-code", code);

                     localStorage.setItem("sel-license-id", $.cookie('license_type_id'));
                     localStorage.setItem("sel-sublicense-id", $.cookie('sub_license_type_id'));

                     var base64num = btoa($.cookie('license_type_id')),
                     encodeuri = encodeURIComponent(base64num);

                     var base64num1 = btoa($.cookie('sub_license_type_id')),
                     encodeuri1 = encodeURIComponent(base64num1);
                     encodeFullURL = btoa("<?php echo base_url('student/mock_exam/start');?>");
                     locationIS = "<?php echo base_url('student/mock_exam');?>"+'/'+btoa('start/')+'/'+encodeuri+"/"+encodeuri1;

                     location.href = locationIS;

                    // location.href = "<?php echo base_url('student/mock_exam/start/');?>"+selVal+"/"+subLicenseVal+"";
                  //location.href = "<?php echo base_url('student/mock_exam/start/');?>"+encodeuri+"/"+encodeuri1+"";

                  } else if (response.status == false) {
                        $('#attend-btn').attr("disabled", "disabled");

                     NioApp.Toast("Examination is not available for license", "error");
                  } else {
                     NioApp.Toast("Invalid response status", "warning");
                  }
               }).fail(function (error) {
                  NioApp.Toast("Error Occured", "error");
               }).always(function () {
                  $("#loader").fadeOut();
               });
               studenName = window.localStorage.getItem("student--name");
               $('#student_names').html(studenName);

            // localStorage.setItem("student--name", $.cookie("firstname")+' '+$.cookie("lastname"));
            localStorage.setItem("student--id", $.cookie("student_id"));
            localStorage.setItem("school--name", $.cookie("school_name"));
              // return false;
        }

        function attendExam(){
            
            localStorage.removeItem("sel-language-id");
            localStorage.removeItem("sel-language-code");

           var selVal         =  $('#licence').val();
           var subLicenseVal  =  $('#sub-license').val();
           var languageId     =  $('#language-id').val();
           var languageCode   =  $('#language-code').val();

           if(subLicenseVal == ''){
            subLicenseVal = 0;
           }
            $("form").on("submit", function (event) {
                event.preventDefault();
                if (examinationFormValidator.valid()) { 
                $.ajax({
                     type: "get",
                     url: formApiUrl(`validate-license`),
                    // data: $(this).serialize(),
                     data: {
                     license_id:selVal,
                     sub_license: subLicenseVal,
                     },
                     beforeSend: function () {
                        $("#loader").fadeIn();
                     },
                  }).done(function (response) {
                     console.log('response is'+response.status)
                  if (response.status == true) {
                        $('#attend-btn').removeAttr("disabled");
                        
                     localStorage.setItem("sel-language-id", languageId);
                     localStorage.setItem("sel-language-code", languageCode);

                     localStorage.setItem("sel-license-id", selVal);
                     localStorage.setItem("sel-sublicense-id", subLicenseVal);

                     var base64num = btoa(selVal),
                     encodeuri = encodeURIComponent(base64num);

                     var base64num1 = btoa(subLicenseVal),
                     encodeuri1 = encodeURIComponent(base64num1);
                     encodeFullURL = btoa("<?php echo base_url('student/mock_exam/start');?>");
                     locationIS = "<?php echo base_url('student/mock_exam');?>"+'/'+btoa('start/')+'/'+encodeuri+"/"+encodeuri1;

                     location.href = locationIS;

                    // location.href = "<?php echo base_url('student/mock_exam/start/');?>"+selVal+"/"+subLicenseVal+"";
                  //location.href = "<?php echo base_url('student/mock_exam/start/');?>"+encodeuri+"/"+encodeuri1+"";

                  } else if (response.status == false) {
                        $('#attend-btn').attr("disabled", "disabled");

                     NioApp.Toast("Examination is not available for license", "error");
                  } else {
                     NioApp.Toast("Invalid response status", "warning");
                  }
               }).fail(function (error) {
                  NioApp.Toast("Error Occured", "error");
               }).always(function () {
                  $("#loader").fadeOut();
               });

                }
            })
        }

      </script>

        <script>
         $(function() {
            async function init() {
               const auth = await appModule.checkAuth();
               getLanguages();
               getLicenseList("#licence");
            }

            init();
         });

        const getSubLicenseList = (target = false, license_id) => {
           let response;

           // Reset element content
           $(target).html('').append('<option value="">Select</option>').attr('required', true);


           if(license_id)
           {
           
            $.ajax({
               type: "get",
               async: false,
               global: false,
               url: api_base_url+'get-sub-license-by-license-id-student_id/'+license_id+'/'+$.cookie('student_id'),
               
               success: function ({ data, status }) {
                  if (status) {
                        if(target) {
                           data.forEach((item) => {
                              $(target).append(`<option value='${item.id}'>${item.name}</option>`)
                           });
                        } else {
                           response = data;
                        }
                  } else {
                     NioApp.Toast("Sub License Not Available", 'error')
                     // $("#sub-license").html(`<option value=''>Sub License Not Available</option>`).prop('disabled', true)
                     $(target).attr('required', false)
                  }
               }
            });
           }
            return response;
        }

         const getLicenseList = (target = false, selected) => {
           let response;

           // Reset element content
           $(target).html('').append('<option value="">Select</option>');
           
           $.ajax({
              type: "get",
              async: false,
              global: false,
              url: api_base_url+'get-student-license/'+$.cookie('student_id'),
              
              success: function ({ data, status }) {
                 if (status) {
                       if(target) {
                          data.forEach((item) => {
                             $(target).append(`<option ${(item.id == selected) && 'selected'} value='${item.id}'>${item.name}</option>`)
                          });
                       } else {
                          response = data;
                       }
                 } else {
                    alert("something went wrong")
                 }
              }
           });
         return response;
        }

        $('#licence').on('change', function() {
           selval =  this.value ;
           $('#attend-btn').removeAttr("disabled");
           getSubLicenseList("#sub-license",selval);
           
         });

        $('.btn-close').on('click', function () {
            $('#licence').val('');
        })

      </script>
   </body>
</html>