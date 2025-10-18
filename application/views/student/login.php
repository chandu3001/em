<!DOCTYPE html>
<html lang="zxx" class="js">

<?php include_once APPPATH . 'views/student/includes/header.php'; ?>

<style>
    .login-container {
        width: 680px;
        height: 496px;
        display: flex;
    }

    #loginForm {
        transform: translateY(24%);
    }

    .login-container-content {
        /* flex: 50%; */
        text-align: center;
        display: flex;
        align-items: center;
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
        background-color: #fff !important;
        border: none;
    }

    .logoschool img {
        width: 85px;
        height: 85px;
        border-radius: 50%;
        margin: 0 auto;
        box-shadow: 0px 0px 2px #5f5f5f,
            0px 0px 5px #ecf0f3,
            8px 8px 15px #a7aaaf;
    }

    .logoschool {
        top: 0px;
        position: relative;
    }

    .sign-title {
        text-align: center;
        font-size: 28px;
        letter-spacing: 0.5px;
        margin: 5px auto;
    }

    .block-de {
        text-align: center;
        font-size: 13px;
        letter-spacing: 0.5px;
    }

    .login-input input {
        width: 87%;
        display: flex;
        justify-content: center;
        margin: 0 auto;
    }

    .passcode-icon.icon-show {
        margin-right: 38px;
    }

    /* #password{
            padding: 20px 10px 20px 25px;
           
            } */
    .login-input {
        margin-bottom: 30px;
    }

    .labelcont {
        margin-left: 20px;
        text-align: left;
    }

    .labelcont a {
        float: right;
    }

    .signbutton {
        background: #616DED;
        color: #fff;
        outline: none;
        border: none;
        cursor: pointer;
        width: 87%;
        height: 45px;
        border-radius: 9px;
        font-size: 17px;
        font-weight: 600;
        text-align: center;
    }

    .loginside {
        display: flex;
        justify-content: center;
        margin: 39px auto;
        left: 98px;
        position: relative;

    }

    .boxlo {
        padding: 25px;
        padding-top: 12px !important;
    }

    .login-container-img {
        flex: 50%;
        background-size: cover;
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .login-container-img img {
        height: 496px;
        border-radius: 0px 12px 12px 0px;
    }

    .borlogin {
        height: 498px;
        width: 340px;
        border: none !important;
        border-radius: 15px 0px 0px 15px !important;
        box-shadow: none;
        margin-top: 19px;

    }

    .cont {
        box-shadow: 0px -1px 6px #a5a8ab !important;
        border-radius: 17px;
        margin: 0 auto;
        height: 499px;
        width: 682px;
        margin-top: 7px;
        border: 1px solid #c3c3c9;
    }

    .wrapper {
        height: 498px;
        width: 340px;
        position: absolute;
        overflow: hidden;
        background: linear-gradient(90deg, rgba(22, 22, 186), rgb(12, 12, 196)0%, rgba(0, 212, 255)100%);
        border-radius: 0px 15px 15px 0px
    }

    .wrapper h6 {
        bottom: 0px;
        position: absolute;
        right: 5px;
        color: #ffffff;
        font-size: 12px;
        padding: 10px;
    }

    .wrapper h2 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 40px;
        font-weight: bold;
        color: white;
        text-transform: uppercase;
        margin: 0 auto;
    }

    .box div {
        position: absolute;
        width: 60px;
        height: 60px;
        background-color: transparent;
        border: 6px solid rgba(255, 255, 255, 0.8);
        border-radius: 50%;
    }

    .footer__content {
        top: 94%;
        position: relative;
        width: 100%;
        float: right;
        display: flex;
        left: 62%;
    }

    .footer__content p {
        color: #fff;
        padding-right: 6px;
    }

    .footer__content img {
        width: 41px;
        height: 20px;
    }

    .passcode-icon {
        position: relative;
        top: 30px;
    }

    .nk-wrap-nosidebar .nk-content {
        min-height: 88vh !important;
    }

    @media (min-width: 576px) {
        .nk-footer {
            padding: 11px 22px !important;
        }
    }

    .side-img {
        margin-top: 1%;
    }

    @media only screen and (min-width: 1370px) and (max-width: 1900px) {
        .side-img {
            margin-top: 8%;
        }
    }

    .labelcont .form-label {
        font-size: 12px;
        color: #242424;
    }

    .login_form_update h3 {
        font-size: 29px;
        letter-spacing: -0.03em;
        color: #616DED;
        display: flex;
        margin-left: 18px;
        top: 50px;
        position: relative;
    }

    .title_logo img {
        width: 8%;
        display: flex;
        justify-content: center;
        margin: 0 auto;
    }

    .is-alter .form-control~.invalid {
        bottom: calc(100% + -26px) !important;
        margin-right: 20px;
    }

    .ni-eye:before {
        margin-right: 37px;
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

                    <div>
                        <!-- <div class="nk-block nk-block-middle nk-auth-body  wide-xs "> -->
                        <!-- <div class="brand-logo pb-4 text-center">
                                <img class="bg-primary px-4 mb-2 py-2 rounded" src="<?php echo base_url('assets/images/logo.png'); ?>" />
                                <h3>Exam Module</h3>
                            </div> -->
                        <div class="side-img">
                            <div class="title_logo">
                                <img class="title_pic" src="<?php echo base_url('assets/images/LogoB.jpg'); ?>" />
                            </div>
                            <div class="cont">

                                <div class="login-container">
                                    <div class="login-container-content">
                                        <div class="borlogin">
                                            <div class="boxlo">
                                            </div>
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">

                                                    <div class="block-de">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="login_form_update">
                                                <h3>Login</h3>
                                            </div>
                                            <form id="loginForm" class="is-alter">
                                                <div class="form-group">
                                                    <div class="labelcont"> <label class="form-label"
                                                            for="default-01">Email</label> </div>
                                                    <div class="login-input"> <input type="text" name="email"
                                                            class="form-control form-control-lg" id="default-01"
                                                            placeholder="Enter your email" required
                                                            data-msg="Email is required"
                                                            data-msg-email="Specify valid email"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="labelcont"> <label class="form-label"
                                                            for="password">Passcode</label> </div>
                                                    <div class="login-input"> <a href="#"
                                                            class="form-icon form-icon-right passcode-switch lg"
                                                            data-target="password"> <em
                                                                class="passcode-icon icon-show icon ni ni-eye-off"></em>
                                                            <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                                                        </a> <input type="password" name="password"
                                                            class="form-control form-control-lg" id="password"
                                                            placeholder="Enter your passcode" required
                                                            data-msg="Passcode is required"> </div>
                                                </div>
                                                <div class="form-group"> <button type="submit" class="signbutton">Sign
                                                        in</button> </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="login-container-img">
                                        <div><img src="<?php echo base_url('assets/images/Frame.jpg'); ?>" alt=""></div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- footer -->
            <!-- <?php include_once APPPATH . 'views/student/includes/footer.php'; ?> -->
        </div> <!-- wrap @e -->
    </div> <!-- content @e -->
    </div> <!-- main @e -->
    </div> <!-- app-root @e -->
    <!-- JavaScript -->
    <?php include_once APPPATH . 'views/student/includes/footer_scripts.php'; ?>

    <script>
        (function (NioApp, $) {
            'use strict';

            NioApp.Validate('#loginForm', {
                onkeyup: function (element) { $(element).valid() },
                onclick: function (element) { $(element).valid() },
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
                        url: formApiUrl('student/login'),
                        type: 'post',
                        dataType: 'json',
                        data: {
                            email: formData.get('email'),
                            password: formData.get('password'),
                            auth: getUrlParam("auth"),

                        },
                        beforeSend: function () {
                            submitBtn
                                .attr('disabled', true)
                                .html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span>Loading...</span>`)
                        }
                    }).done(function (response) {
                        if (response.authenticator) {
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                            })

                            $.cookie('host', response.host);

                            $('#loginForm')[0].reset();
                        }
                        else if (response.status == true) {

                            appModule.cookieOption['expires'] = new Date(response.data.expires_at);
                            //console.log(response.data);return false;
                            appModule.setData({
                                'access_token': response.data.access_token,
                                'id': response.data.userdata.id,
                                'name': response.data.userdata.name,
                                'avatar': response.data.student_info.photo,
                                'role': response.data.userdata.role,
                                'email': response.data.userdata.email,
                                'username': response.data.userdata.username,
                                'school_name': response.data.school_info.name,
                                'school_logo': response.data.school_info.image,
                                'student_id': response.data.student_info.id,
                                'school_id': response.data.student_info.school_id,
                                'license_type_id': response.data.student_info.license_type,
                                'sub_license_type_id': response.data.student_info.sub_license,
                                'firstname': response.data.student_info.first_name_english,
                                'lastname': response.data.student_info.second_name_english,
                                'auth': getUrlParam("auth"),
                                'device_status': response.device_status,
                                'host': response.host
                            }).then(function () {

                                //start
                                window.location.href = formUrl('student/home');


                                //end

                            });
                            NioApp.Toast(response.message, 'success');
                        } else if (response.status == false) {
                            NioApp.Toast(response.message, 'error');
                        } else {
                            NioApp.Toast('No response satus', 'error');
                        }
                    }).fail(function (error) {
                        if (error.status == 401) {
                            NioApp.Toast(error.responseJSON.message, 'error');
                        } else {
                            NioApp.Toast(error.statusText, 'error');
                        }

                    }).always(function () {
                        submitBtn
                            .attr('disabled', false)
                            .html('Sign in')
                    });

                }
            });
        })(NioApp, jQuery);
    </script>

</html>