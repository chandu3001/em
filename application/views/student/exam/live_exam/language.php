  <?php include_once APPPATH . 'views/student/includes/header.php'; ?>
  <link id="skin-default" rel="stylesheet" href="<?php echo base_url('assets/student/css/common.css');?>"/>
   <style>
      #licence-error{
         color: red;
      }
      #licence-error{
         color: red;
      }
      .container-xl .nk-block{
         margin-top:0px !important;
      }
      .start-details{
        display: flex;
       background: #fff;
       border-radius: 0px 24px 24px 0px;
       box-shadow: 0px 0px 20px 4px rgba(97, 109, 237, 0.2);
       width: 200px;
       height: 488px;
    }
    .footer_hhp{
      top: 14% !important;
    }
    .user_img{
   justify-content: center;
    display: flex;
    }
  
    .container-xl{
      padding-left: 40px !important;
    }
    .g-4:not(.row){
      margin-top: 30px !important;
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
         margin-top: -35px;
      }
      .container-xl .nk-block{
         margin-top:0px !important;
      }
      .modal-footer .align-center{
        width:100% !important;
       }
       .modal-footer #attend-btn{
         width:100% !important;
         margin-right: 392px !important;
         display: flex;
         justify-content: center;
       }
       #examinationForm .flex-sm-nowrap li{
        margin-left: -25px;
       }
       #host-name{
         font-size: 18px !important; 
       }
      .nk-block-between-md{
         margin-left: 10px !important;
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
                           <div class="nk-block-head-content"><a href="<?php echo base_url('student');?>" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>BACK</span></a><a href="/demo5/product-list.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a></div>

                            <div class="nk-block-head-content heading_title_text" style="text-align: center;">
                            <h3>Live Exam</h3>
                              <h3 class="nk-block-title page-title heading_title" style="margin-top:53px;">Choose Your Preferred Language</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a  class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                              <!-- <a class="d-none d-sm-inline-flex"> <span>Live Exam</span></a> -->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>


                    <div class="nk-block nk-block-lg " id="main-language">
                        
                    </div>


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
      <script src="<?php echo base_url('assets/js/student/live_exam/language.js'); ?>"></script>

      <script>
         
         function begin(id,code){

            // $('#modalLicence').modal('show');
            // $('#language-id').val(id);
            // $('#language-code').val(code);
            $.ajax({
                     type: "get",
                     url: formApiUrl(`validate-license`),
                     data: {
                        'license_id': $.cookie('license_type_id'),
                        'sub_license': $.cookie('sub_license_type_id')
                     },
                     beforeSend: function () {
                        $("#loader").fadeIn();
                     },
                  }).done(function (response) {

                        if (response.status == true) {
                           $('#attend-btn').removeAttr("disabled");

                           localStorage.setItem("sel-language-id", id);
                           localStorage.setItem("sel-language-code", code);

                           $.ajax({
                              type: "get",
                              url: "https://dsms.technoiq.in/backend/api/auth/student/student-validation/"+$.cookie('student_id')+"",
                              beforeSend: function () {
                                 $("#loader").fadeIn();
                              },
                           }).done(function (response) {
                              if (response.status == true) {
                                 //console.log('SUCCEE');return 0;
                                 location.href = "<?php echo base_url('student/live_exam/start/');?>"+$.cookie('license_type_id')+"/"+$.cookie('sub_license_type_id')+"";

                              } else if (response.status == false) {
                                 $('#attend-btn').attr("disabled", "disabled");
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
                  });
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
            student_id = $.cookie("student_id");
             $("form").on("submit", function (event) {
                event.preventDefault();

               if (examinationFormValidator.valid()) { 

                  $.ajax({
                     type: "get",
                     url: formApiUrl(`validate-license`),
                     data: {
                        'license_id': selval,
                        'sub_license': subLicenseVal
                     },
                     beforeSend: function () {
                        $("#loader").fadeIn();
                     },
                  }).done(function (response) {

                        if (response.status == true) {
                           $('#attend-btn').removeAttr("disabled");

                           localStorage.setItem("sel-language-id", languageId);
                           localStorage.setItem("sel-language-code", languageCode);

                           $.ajax({
                              type: "get",
                              url: "https://dsms.technoiq.in/backend/api/auth/student/student-validation/"+student_id+"",
                              beforeSend: function () {
                                 $("#loader").fadeIn();
                              },
                           }).done(function (response) {
                              if (response.status == true) {
                                 //console.log('SUCCEE');return 0;
                                 location.href = "<?php echo base_url('student/live_exam/start/');?>"+selVal+"/"+subLicenseVal+"";

                              } else if (response.status == false) {
                                 $('#attend-btn').attr("disabled", "disabled");
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
                  });
               }else if (response.status == false) {
                     $('#attend-btn').attr("disabled", "disabled");

                  NioApp.Toast("Examination is not available for license", "error");
               } else {
                  NioApp.Toast("Invalid response status", "warning");
               }

            });

           /* $("form").on("submit", function (event) {
                event.preventDefault();
                if (examinationFormValidator.valid()) { 

                    location.href = "<?php echo base_url('student/live_exam/start/');?>"+selVal+"";
                }
            })*/

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

      //   const getLicenseList = (target = false, selected) => {
      //      let response;

      //      // Reset element content
      //      $(target).html('').append('<option value="">Select</option>');
           
      //      $.ajax({
      //         type: "get",
      //         async: false,
      //         global: false,
      //         url: 'https://dsms.technoiq.in/backend/api/auth/all_main_license/'+$.cookie("school_id"),
              
      //         success: function ({ data, errors }) {
      //            if (!errors) {
      //                  if(target) {
      //                     data.result.forEach((item) => {
      //                        $(target).append(`<option ${(item.id == selected) && 'selected'} value='${item.id}'>${item.name}</option>`)
      //                     });
      //                  } else {
      //                     response = data.result;
      //                  }
      //            } else {
      //               alert("something went wrong")
      //            }
      //         }
      //      });
      //   return response;
      //   }

      //   const getSubLicenseList = (target = false, license_id) => {
      //      let response;

      //      // Reset element content
      //      $(target).html('').append('<option value="">Select</option>');
           
      //      $.ajax({
      //         type: "get",
      //         async: false,
      //         global: false,
      //         url: 'https://dsms.technoiq.in/backend/api/auth/sub_license_list/'+license_id,
              
      //         success: function ({ data, errors }) {
      //            if (!errors) {
      //                  if(target) {
      //                     data.result.sub_license_list.forEach((item) => {
      //                        $(target).append(`<option value='${item.id}'>${item.name}</option>`)
      //                     });
      //                  } else {
      //                     response = data.result;
      //                  }
      //            } else {
      //               alert("something went wrong")
      //            }
      //         }
      //      });
      //       return response;
      //   }

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

      $('#licence').on('change', function() {
           selval =  this.value ;
         getSubLicenseList("#sub-license",selval);
      });
        $('#sub-license').on('change', function() {
             $('#attend-btn').removeAttr("disabled");

      });
        /* $('#licence').on('change', function() {
           selval =  this.value ;

           $.ajax({
               type: "get",
               url: formApiUrl(`validate-license/${selval}`),
               beforeSend: function () {
                  $("#loader").fadeIn();
               },
            }).done(function (response) {
               console.log('response is'+response.status)
               if (response.status == true) {
                     $('#attend-btn').removeAttr("disabled");
                     getSubLicenseList("#sub-license",selval);

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

         });*/

        $('.btn-close').on('click', function () {
            $('#licence').val('');
        })

      </script>

   </body>
</html>