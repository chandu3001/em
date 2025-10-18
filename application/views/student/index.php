<?php include_once APPPATH . 'views/student/includes/header.php'; ?>
   <style>
      .main-title{
         background: #00e1ff;
      }

    .live-exam{
         background: #a5ff01;
      }
    .jconfirm-content{
        text-align: center;
      }
      .jconfirm-content #msg{
        text-align: center;
        font-size: 19px;
        font-weight: bold;
      }
      .jconfirm-buttons{
            margin-right: 130px;
      }
      .logo-container{
         width: 8%;
         height: 100%;    
      }
      .logo-title{
         display: flex;
         padding-bottom: 10px;
      }
     
      .nk-content-fluid .title-container{
         justify-content: center;
         display: flex;
         margin: 0 auto;
         padding-left: 200px;
       }
      .nk-content-fluid .title-container h2{
            font-size: 32px;
        }
    .title-container span{
           margin: 0 auto;
           display: flex;
           justify-content: center;
           font-size: 15px;
    }
    .container-xl .nk-block{
        margin-top:7%;
     }

    .card-inner{
    background: #fff;
    padding: 0.5rem !important;
    border-radius: 16.0115px; 
    box-shadow: 0px 0px 20px 4px rgba(97, 109, 237, 0.2);
    }
    .justify-between .btn-info {
        border:none;
    }
    .btn-info{
        background:none !important;
    }
    .btn-success:active{
        background-color:none !important;
        border-color: none !important;
    }
    .nk-block-between-md{
        display:block !important;
    }
    .nk-content-body .start-details{
        display: flex;
       background: #fff;
       padding: 20px 43px;
       border-radius: 0px 24px 24px 0px;
       box-shadow: 0px 0px 20px 4px rgba(97, 109, 237, 0.2);
       width: 200px;
       height: 485px;
       margin-top: -37px;
    }
    .bg-primary{
        background-color: #616ded !important;
    }
    .nk-content-body{
        display:flex;
    }
    #username{
    padding-bottom:0px !important;
    color:black !important;
    }
    .start-sys-details{
        width: 156px;
    }
    .g-4:not(.row){
        margin-top: 10px;
    }
    .nk-content-fluid {
        padding-left: 0 !important;
    }
    .container-xl{
        max-width: unset !important;
        padding-left: 0px !important;
    }  
    .g .title_pic{
        border-bottom: 4.87px solid #616ded;
    }
    #mockbtn, #live-exam{
        color: #616ded !important;
    }
    .btn-xl{
        padding:0px !important;
    }
    .user_img{
        justify-content: center;
        display: flex;
        padding-right: 40px !important;
    }
    #username, #host-name, #device-status{
        font-size:20px !important;
        color:black !important;
    }
    #host-name-value{
        font-size: 12px !important;
      }
      #device-status-area p:last-child{
    color:#33C052 !important;
   }
   .footer_hhp{
    top:13% !important;
   }
   #no-exam-block{
    justify-content: center;
    display: flex;
    margin: 0 auto;
    margin-top: 20px;
   }
   #no-exam-block h4{
    padding-left: 65px;
   }
   .btn-info:active:focus{
    box-shadow:none !important;
   }
   .btn-info:focus{
    box-shadow:none !important;
   }
   #mockbtn span, #live-block-sub span{
    float: left;
    padding: 5px 5px 5px 10px;
   }
   
   </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

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

                                      
                <div class="container-xl wide-lg">
                   
                    <div class="nk-content-body">
                        
                        <?php include_once APPPATH . 'views/student/includes/main_header1.php'; ?>

                        <div id="no-exam-block" style="display: none;text-align: center;margin-top: 50px;">
                            <h4>No exams available for this license type</h4>
                        </div>
                        <div class="nk-block nk-block-lg" id="exam-block" style="display: none;">
                             <div class="row g-gs">
                                 <div class="col-lg-6">
                                    
                                 </div>
                                 <div class="col-lg-6">
                                    
                                 </div>
                                  <div class="col-lg-2">
                                    
                                 </div>
                                 <div class="col-lg-4" id="mock-block" style="display: none;">
                                         <div class="card-inner">
                                             <div class="align-center justify-between">
                                             <button id="mockbtn" class="btn btn-xl btn-info exams">
                                                 <div class="g">

                                                 <img class="title_pic" src="<?php echo base_url('assets/images/info.jpg'); ?>" />
                                                 
                                                        <span>Mock Exam</span>

                                                 </div>
                                                 </button>
                                                
                                             </div>
                                         </div>
                                 </div>
                                 <div class="col-lg-4" id="active_live_exam">
                                         <div class="card-inner">
                                             <div class="align-center justify-between">
                                             <a class="btn btn-xl btn-succes exams" id="live-exam">
                                                 <div class="g" id="live-block-sub">
                                                 <img class="title_pic" src="<?php echo base_url('assets/images/indeximg.jpeg'); ?>" />
                                                      
                                                        <span>Live Exam</span>
                                                 </div>
                                                 </a>
                                             </div>
                                         </div>
                                 </div>
                             </div>
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
      
        <?php include_once APPPATH . 'views/student/includes/footer_scripts.php'; ?>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
      <script type="text/javascript">

        $("#mockbtn").on("click", function(){
           /* $.ajax({
                type: "POST",
                url: api_base_url+"mock-exam-status",
                headers: {
                    Authorization: "Bearer "+$.cookie("access_token")
                },
                data: {
                    school_id: $.cookie("school_id")
                }
            }).done(({status, message})=>{
                if(status)
                location.href = base_url+"student/mock_exam";
                else
                NioApp.Toast(message, "info")
            }).fail(({status, message}) =>{
                if(status == 422)
                NioApp.Toast(message, "error")
                else
                NioApp.Toast("Error Occurred", "error")

            })*/
             location.href = base_url+"student/mock_exam";
        })

        $('#live-exam').on('click', function(){
            /*$.alert({
                title: '',
                icon: 'fa fa-warning',
                type: 'orange',
                content: '<span id="msg">Your device is not authenticated!!!</span><br>Please contact your administrator' 
                    
            });*/
            showLoader({
                title: "Please Wait",
                text: "Validating System...."
            })
            $.ajax({
                type: "POST",
                url: api_base_url+"system-validation",
                headers: {
                    Authorization: "Bearer "+$.cookie("access_token")
                },
                data:{
                    auth: $.cookie("auth"),
                    school_id: $.cookie("school_id")
                }
            }).done(({status, message})=>{
                if(status)
                {
                    NioApp.Toast(message, 'success');

                    setTimeout(() => {
                        location.href= base_url+"student/live_exam";
                    }, 1000);
                }
                else
                {
                    NioApp.Toast(message, 'warning');
                }
            }).fail(()=>{
                NioApp.Toast("Error Occurred", 'error');

            }).always(()=>{
                hideLoader();
            })


        });
        $(function(){
        //  $("#username").html($.cookie("username"))
         $("#username").html($.cookie("firstname")+' '+$.cookie("lastname"))
         $("#student_id").html('Student ID : ' + $.cookie("student_id"))

      })

    $(document).ready(function(){

       
        checkExamStatus();
        checkMockExamStatus();
    })

    function checkExamStatus(){
        
        $.ajax({
            type: "GET",
            url: api_base_url+`validate-license`,
            headers: {
                Authorization: "Bearer "+$.cookie("access_token")
            },
            data: {
                license_id: $.cookie("license_type_id"),
                sub_license: $.cookie("sub_license_type_id"),
            }
        }).done(({status, message})=>{
            if(status){
                $('#exam-block').show();

                $('#no-exam-block').hide();
            }else{
                $('#exam-block').hide();
                $('#no-exam-block').show();

            }
           
        }).fail(({status, message}) =>{
            if(status == 422)
            NioApp.Toast(message, "error")
            else
            NioApp.Toast("Error Occurred", "error")

        })
    }

    function checkMockExamStatus(){
        $.ajax({
            type: "POST",
            url: api_base_url+"mock-exam-status",
            headers: {
                Authorization: "Bearer "+$.cookie("access_token")
            },
            data: {
                school_id: $.cookie("school_id")
            }
        }).done(({status, message})=>{
            if(status)
            {
                $('#mock-block').show();

            }           
            else{
                $('#mock-block').hide();
                $('#live-block-sub').css('margin-left', '0%')
                $('#active_live_exam').css('transform', 'translateX(50%)')
            }
            
        }).fail(({status, message}) =>{
            if(status == 422)
            NioApp.Toast(message, "error")
            else
            NioApp.Toast("Error Occurred", "error")

        })
    }

      </script>
   </body>
</html>