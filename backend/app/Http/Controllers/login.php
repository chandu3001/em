<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">
    <!-- Page Title  -->
    <title>Login | Exam Module</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashlite.css?ver=3.0.0'); ?>">
    <link id="skin-default" rel="stylesheet" href="<?php echo base_url('assets/css/theme.css?ver=3.0.0'); ?>">
    <script>
        const base_url = "https://em.technoiq.in/development/frontend/admin/";
    </script>
</head>

<body class="nk-body bg-white npc-general pg-auth">

    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <img class="bg-primary px-4 mb-2 py-2 rounded"
                                src="<?php echo base_url('assets/images/logo.png'); ?>" />
                            <h3>Exam Module</h3>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Sign-In</h4>
                                        <div class="nk-block-des">
                                            <p>Access the exam module panel using your email and passcode.</p>
                                        </div>
                                    </div>
                                </div>
                                <form id="loginForm" class="form-validate is-alter">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email or Username</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="email" name="email" class="form-control form-control-lg"
                                                id="default-01" placeholder="Enter your email address or username"
                                                data-msg="Email is required" data-msg-email="Specify valid email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Passcode</label>
                                            <a class="link link-primary link-sm"
                                                href="<?php echo base_url('admin/forgot_password'); ?>">Forgot Code?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="password" class="form-control form-control-lg"
                                                id="password" placeholder="Enter your passcode"
                                                data-msg="Password is required" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">&copy; 2022 Mentric. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?php echo base_url('/assets/js/bundle.js?ver=3.0.0'); ?>"></script>
    <script src="<?php echo base_url('/assets/js/scripts.js?ver=3.0.0'); ?>"></script>
<script src="<?php echo base_url('assets/js/libs/cookie.js?ver=3.0.0');?>"></script>


    <script>
        (function (NioApp, $) {
            'use strict';

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
                        url: 'https://dsms.technoiq.in/backend/api/auth/superadmin_login',
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
                    }).done(function(response) {
                        if (response.errors == true) {
                            NioApp.Toast(response.data.message, 'info');
                        } else if(response.errors == false) {
                            NioApp.Toast(response.data.message, 'success');
                            $.cookie("access_token", response.data.result.access_token)
                            $.cookie("user_data", response.data.result.userdata)
                            document.location.href=base_url+"dashboard";
                        } else {
                            NioApp.Toast('No response satus', 'error');
                        }
                    }).fail(function(error) {
                        NioApp.Toast('Error Occured', 'error');
                    }).always(function() {
                        submitBtn
                            .attr('disabled', false)
                            .html('Sign in')
                    });
                    
                }
            });
        })(NioApp, jQuery);
    </script>
</body>
</html>