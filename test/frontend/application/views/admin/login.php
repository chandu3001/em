<?php include_once APPPATH . 'views/admin/includes/header.php'; ?>
<style>
    .login-container {
      width: 640px;
      height: 480px;
      display: flex;
    }
    
    
    .login-container-content {
      flex: 50%;
      text-align: center;
      display: flex;
      align-items: center;
      border-top-left-radius: 15px;
      border-bottom-left-radius: 15px;
      background-color: #ecf0f3 !important;
      border:none;
    }
    
            .logoschool img
            {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            margin: 0 auto;
            box-shadow: 0px 0px 2px #5f5f5f,
            0px 0px 5px #ecf0f3, 
            8px 8px 15px #a7aaaf;
            }
            .logoschool
            {
            top:0px;
            position: relative;
            }
            .sign-title{
            text-align:center;
            font-size:28px;
            letter-spacing: 0.5px;
            margin: 5px auto;
            }
            .block-de{
            text-align:center;
            font-size:13px;
            letter-spacing: 0.5px;
            }
            .login-input input {
            border:none !important;
            outline:none;
            background:none;
            font-size:18px;
            color:#555;
            padding: 10px 10px 10px 25px;
            }
            /* #password{
            padding: 20px 10px 20px 25px;
           
            } */
            .login-input{
            margin-bottom:30px;
            border-radius:25px;
            box-shadow: inset 8px 8px 8px #cbced1,
            inset -8px -8px 8px #ffffff;
           
            }
            .labelcont{
            margin-left:20px;
            text-align: left;
            }
            .labelcont a{
                float:right;
            }
            .signbutton{
            background: #1b32e5;
            color: #fff;
            outline:none;
            border:none;
            cursor:pointer;
            width:82%;
            height:45px;
            border-radius:30px;
            font-size:20px;
            font-weight:700;
            text-align:center;
            box-shadow:3px 3px 3px #b1b1b1,
            -3px -3px 3px #ffffff;
            }
          
            .loginside{
            display :flex;
            justify-content:center ;
            margin:39px auto;
            left:98px;
            position: relative;
           
            }
            .boxlo{
            padding:25px;
            }
    .login-container-img {
      flex: 50%;
      background-size: cover;
      border-top-right-radius: 15px;
      border-bottom-right-radius: 15px;
    }
    .borlogin{
        height:498px;
        width:340px;
        border:none !important;
        border-radius:15px 0px 0px 15px !important;
        background-color: #e4e8eb !important;
        box-shadow:none;
        margin-top:19px;
    
    }
    .cont {
        box-shadow: 13px 13px 20px #a5a8ab !important;
          border-radius: 15px;
          margin:0 auto;
          height:499px;
          width:682px;
          margin-top:7px;
          border: 1px solid #c3c3c9;
    }
    .wrapper{
     height:498px;
     width:340px;
     position: absolute;
     overflow:hidden;
     background:linear-gradient(90deg,rgba(22,22,186) ,rgb(12,12,196)0%,rgba(0,212,255)100%);
     border-radius: 0px 15px 15px 0px
    
     }
     .wrapper h6 
     {
     bottom: 0px;
     position: absolute;
     right: 5px;
     color: #ffffff;
     font-size: 12px;
     padding:10px;
    }
     .wrapper h2{
     position: absolute;
     top: 50%;
     left: 50%;
     transform: translate(-50%,-50%);
     font-size: 40px;
     font-weight: bold;
     color: white;
     text-transform: uppercase;
     margin: 0 auto;
    }
    .box div{
     position: absolute;
     width: 60px;
     height: 60px;
     background-color: transparent;
     border: 6px solid rgba(255, 255, 255, 0.8);
     border-radius:50%;
    }
    
    .footer__content{
        top: 94%;
        position: relative;
        width: 100%;
        float: right;
        display: flex;
        left: 62%;
    }
    .footer__content p{
        color: #fff;
        padding-right: 6px;
    }
    .footer__content img{
        width: 41px;
        height: 20px;
    }
    .box div:nth-child(1){
     top: 12%;
     left: 42%;
     animation: animate 10s linear infinite;
    }
    .box div:nth-child(2){
     top: 70%;
     left: 50%;
     animation: animate 7s linear infinite;
    }.box div:nth-child(3){
     top: 17%;
     left: 6%;
     animation: animate 9s linear infinite;
    }.box div:nth-child(4){
     top: 20%;
     left: 60%;
     animation: animate 10s linear infinite;
    }.box div:nth-child(5){
     top: 67%;
     left: 10%;
     animation: animate 10s linear infinite;
    }.box div:nth-child(6){
     top: 80%;
     left: 70%;
     animation: animate 12s linear infinite;
    }.box div:nth-child(7){
     top: 60%;
     left: 82%;
     animation: animate 15s linear infinite;
    }.box div:nth-child(8){
     top: 32%;
     left: 25%;
     animation: animate 16s linear infinite;
    }.box div:nth-child(9){
     top: 90%;
     left: 22%;
     animation: animate 9s linear infinite;
    }.box div:nth-child(10){
     top: 20%;
     left: 82%;
     animation: animate 8s linear infinite;
    }.box div:nth-child(11){
     top: 42%;
     left: 52%;
     animation: animate 5s linear infinite;
    }
    @keyframes animate {
     0%{
     transform: scale(0) translateY(0) rotate(0);
     opacity: 1;
     }
     100%{
     transform: scale(1.3) translateY(-90px) rotate(360deg);
     opacity: 0;
     }
    }
    .passcode-icon{
        position: relative;
        top: 30px;
    }
    .nk-wrap-nosidebar .nk-content{
        min-height: 88vh !important;
    }
    @media (min-width: 576px){
    .nk-footer {
        padding: 11px 22px !important;
    }
    }
    .outcircle div{
     position: absolute;
     width: 60px;
     height: 60px;
     background-color: transparent;
     border-radius: 50%;
    }
    .outcircle div:nth-child(1){
     top: 12%;
     left: 19%;
     animation: animate 10s linear infinite;
    }
    .outcircle div:nth-child(2){
     top: 70%;
     left: 17%;
     animation: animate 7s linear infinite;
    }.outcircle div:nth-child(3){
     top: 17%;
     left: 6%;
     animation: animate 9s linear infinite;
    }.outcircle div:nth-child(4){
     top: 32%;
     left: 14%;
     animation: animate 10s linear infinite;
    }.outcircle div:nth-child(5){
     top: 79%;
     left: 4%;
     animation: animate 10s linear infinite;
    }.outcircle div:nth-child(6){
     top: 40%;
     left: 90%;
     animation: animate 12s linear infinite;
    }.outcircle div:nth-child(7){
     top: 60%;
     left: 82%;
     animation: animate 15s linear infinite;
    }.outcircle div:nth-child(8){
     top: 65%;
     left: 90%;
     animation: animate 16s linear infinite;
    }.outcircle div:nth-child(9){
     top: 90%;
     left: 17%;
     animation: animate 9s linear infinite;
    }.outcircle div:nth-child(10){
     top: 20%;
     left: 82%;
     animation: animate 8s linear infinite;
    }.outcircle div:nth-child(11){
     top: 2%;
     left: 52%;
     animation: animate 5s linear infinite;
    }
    .outcircle div:nth-child(12){
     top: 26%;
     left: 76%;
     animation: animate 15s linear infinite;
    }.outcircle div:nth-child(13){
     top: 67%;
     left: 79%;
     animation: animate 16s linear infinite;
    }.outcircle div:nth-child(14){
     top: 60%;
     left: 10%;
     animation: animate 9s linear infinite;
    }.outcircle div:nth-child(15){
     top: 6%;
     left: 62%;
     animation: animate 8s linear infinite;
    }.outcircle div:nth-child(16){
     top: 87%;
     left: 12%;
     animation: animate 5s linear infinite;
    }
    .outcircle div:nth-child(17){
     top: 32%;
     left: 85%;
     animation: animate 16s linear infinite;
    }.outcircle div:nth-child(18){
     top: 25%;
     left: 92%;
     animation: animate 9s linear infinite;
    }.outcircle div:nth-child(19){
     top: 87%;
     left: 90%;
     animation: animate 8s linear infinite;
    }.outcircle div:nth-child(20){
     top: 84%;
     left: 90%;
     animation: animate 5s linear infinite;
    }
    
        .side-img{
        margin-top:3%;
    }  
    @media only screen and (min-width: 1370px) and (max-width: 1900px) {
        .side-img{
        margin-top:8%;
    }   
    }
    .login-input #password-error, .login-input #default-01-error{
        bottom:50px !important;
    }
    
    
</style>
<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="outcircle">
                        <div><img src="<?php echo base_url('assets/images/red-removebg-preview.png'); ?>" alt=""></div>
                        <div><img src="<?php echo base_url('assets/images/geen-removebg-preview.png'); ?>" alt=""></div>
                        <div><img src="<?php echo base_url('assets/images/yellow-removebg-preview.png'); ?>" alt=""></div>
                        <div><img src="<?php echo base_url('assets/images/geen-removebg-preview.png'); ?>" alt=""></div>
                        <div><img src="<?php echo base_url('assets/images/yellow-removebg-preview.png'); ?>" alt=""></div>
                        <div><img src="<?php echo base_url('assets/images/red-removebg-preview.png'); ?>" alt=""></div>
                        <div><img src="<?php echo base_url('assets/images/geen-removebg-preview.png'); ?>" alt=""></div>
                        <div><img src="<?php echo base_url('assets/images/yellow-removebg-preview.png'); ?>" alt=""></div>
                        <div><img src="<?php echo base_url('assets/images/red-removebg-preview.png'); ?>" alt=""></div>
                        <div><img src="<?php echo base_url('assets/images/geen-removebg-preview.png'); ?>" alt=""></div>
                        <div><img src="<?php echo base_url('assets/images/yellow-removebg-preview.png'); ?>" alt=""></div>
                    </div>
                    <div>
                        <!-- <div class="nk-block nk-block-middle nk-auth-body  wide-xs "> -->
                        <!-- <div class="brand-logo pb-4 text-center">
                                <img class="bg-primary px-4 mb-2 py-2 rounded" src="<?php echo base_url('assets/images/logo.png'); ?>" />
                                <h3>Exam Module</h3>
                            </div> -->
                        <div class="side-img">
                            <div class="cont">
                                <div class="login-container">
                                    <div class="login-container-content">
                                        <div class="borlogin">
                                            <div class="boxlo">
                                                <div class="logoschool"> <img src="https://em.technoiq.in/assets/images/frontend/logo2.jpeg" alt=""> <!-- <img src="./logoschool.jpeg"> -->
                                                    <!-- <i class='far fa-user-circle'></i> -->
                                                </div>
                                                <div class="nk-block-head">
                                                    <div class="nk-block-head-content">
                                                        <h4 class="sign-title">Sign-In</h4>
                                                        <div class="block-de">
                                                            <p>Access the exam module panel using your email and passcode.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form id="loginForm" class="is-alter">
                                                    <div class="form-group">
                                                        <div class="labelcont"> <label class="form-label email_direction" for="default-01">Email</label> </div>
                                                        <div class="login-input"> <input type="email" name="email" class="form-control form-control-lg login_direction" id="default-01" placeholder="Enter your email" required data-msg="Email is required" data-msg-email="Specify valid email"> </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="labelcont"> <label class="form-label email_direction" for="password">Passcode</label> </div>
                                                        <div class="login-input"> <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password"> <em class="passcode-icon icon-show icon ni ni-eye-off"></em> <em class="passcode-icon icon-hide icon ni ni-eye"></em> </a> <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode" required data-msg="Passcode is required"> </div>
                                                    </div>
                                                    <div class="form-group"> <button type="submit" class="signbutton">Sign in</button> </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="login-container-img">
                                        <div class="wrapper">
                                            <h2> WELCOME!</h2>
                                            <div class="box">
                                                <div> </div>
                                                <div> </div>
                                                <div> </div>
                                                <div> </div>
                                                <div> </div>
                                                <div> </div>
                                                <div> </div>
                                                <div> </div>
                                                <div> </div>
                                                <div> </div>
                                            </div>
                                            <div class="footer__content">
                                                <p>Powered by </p> <img class="footer_logo" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- footer --> 
                <?php include_once APPPATH . 'views/admin/includes/footer.php'; ?>
            </div> <!-- wrap @e -->
        </div> <!-- content @e -->
    </div> <!-- main @e -->
    </div> <!-- app-root @e -->
    <!-- JavaScript --> 
 <script src="<?php echo base_url('/assets/js/bundle.js?ver=3.0.0'); ?>"></script>
    <script src="<?php echo base_url('/assets/js/scripts.js?ver=3.0.0'); ?>"></script>
<script src="<?php echo base_url('assets/js/libs/cookie.js?ver=3.0.0');?>"></script>
<script>
        (function (NioApp, $) {
            'use strict';

            //Cookie Defaults
            $.cookie.defaults = {
                expires: 1,
                path: domain_path.substring(0, domain_path.length - 1),
                domain: domain_name,
                secure: false,
            };

            NioApp.Validate('#loginForm', {
                onkeyup: function(element){$(element).valid()},
                onclick: function(element){$(element).valid()}, 
                errorElement: "span",
                errorClass: "invalid",
                errorPlacement: function errorPlacement(error, element) {
                    if (element.parents().hasClass('input-group')) {
                        error.appendTo(element.parent().parent());
                    } else {
                        error.appendTo(element.parent());
                    }
                }
            });

            $('#loginForm').submit(function (e) {
                e.preventDefault();
                let formData = new FormData($(e.currentTarget)[0]);
                const submitBtn = $(e.currentTarget).find('[type="submit"]');

                if ($('#loginForm').valid()) {
                    $.ajax({
                        url: api_base_url+'superadmin/login',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            email: formData.get('email'),
                            password: formData.get('password')
                        },
                        beforeSend: function() {
                            submitBtn
                                .attr('disabled', true)
                                .html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span>Loading...</span>`)
                        }
                    }).done(function({status, message, data}) {
                        if (!status) {
                            NioApp.Toast(message, 'info');
                        } else if(status) {
                            var cookie = $.cookie();
                                for(let x in cookie)
                                {
                                    $.removeCookie(x);
                                }
                            NioApp.Toast(message, 'success');
                            $.cookie("access_token", data.access_token)
                            $.cookie("name", data.userdata.fullName)
                            $.cookie("email", data.userdata.email)
                            $.cookie("user_id", data.userdata.id)
                            $.cookie("role", 1)
                            document.location.href=base_url+"admin/dashboard";
                        } else {
                            NioApp.Toast('No response satus', 'error');
                        }
                    }).fail(function({status, statusText, responseJSON}) {
                        if(status == 401)
                        {
                            NioApp.Toast('You have entered an invalid email or passcode. Please try again.', 'error');
                        }
                        else
                        {
                            NioApp.Toast(statusText, 'error');
                        }
                    }).always(function() {
                        submitBtn
                            .attr('disabled', false)
                            .html('Sign in')
                    });
                    
                }
            });
        })(NioApp, jQuery);
    </script>
    <script src="<?php echo base_url('assets/js/admin/language_scripts.js');?>"></script>

</body>
</html>