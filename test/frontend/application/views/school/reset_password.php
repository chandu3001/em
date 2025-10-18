<?php include_once APPPATH . 'views/school/includes/header.php'; ?>





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

                            <a href="<?php echo base_url('school/dashboard');?>" class="logo-link">

                                

                            </a>

                            <h3>Exam Module</h3>

                        </div>

                        <div class="card card-bordered">

                            <div class="card-inner card-inner-lg">

                                <div class="nk-block-head">

                                    <div class="nk-block-head-content mb-3">

                                        <h5 class="nk-block-title">Reset password</h5>

                                    </div>

                                </div>

                                <form id="reset-password-form" class="is-alter">

                                    <div class="form-group">

                                        <div class="form-label-group">

                                            <label class="form-label" for="default-01">Password</label>

                                        </div>

                                        <div class="form-control-wrap">

                                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter Password" required data-msg="Password is required" data-msg-password="Specify valid Password"/>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="form-label-group">

                                            <label class="form-label" for="default-01">Confirm Password</label>

                                        </div>

                                        <div class="form-control-wrap">

                                            <input type="password" name="password_confirmation" class="form-control form-control-lg" id="confirm-password" placeholder="Re-Enter Password" required data-msg="Confirm password is required" data-msg-password="Specify valid Password" onkeyup="validate_password()"/>

                                        </div>
                                            <span id="wrong_pass_alert"></span>
                                    </div>

                                    <div class="form-group">

                                        <button class="btn btn-lg btn-primary btn-block" id="create" onclick="wrong_pass_alert()">Reset</button>

                                    </div>

                                </form>

                                <div class="form-note-s2 text-center pt-4">

                                    <a href="<?php echo base_url('school/login');?>"><strong>Return to login</strong></a>

                                </div>

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

    <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>



  <script>

        (function (NioApp, $) {
            'use strict';

        NioApp.Validate('#reset-password-form', {
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

     

        $("#reset-password-form").on('submit', function(e){

            e.preventDefault();
            let formData = new FormData($(e.currentTarget)[0]);

            const domain_path = "<?php echo $this->config->item('domain_path')?>";

            var href = location.href;
            let token = href.split('?reset_token=')[1];

            let formDatas = {
              password: formData.get('password'),
              password_confirmation: formData.get('password_confirmation'),
              reset_password_token: token,
            }
        
            if ($('#reset-password-form').valid()) {
                $.ajax({
                    
                    dataType: 'json', 

                    type: "POST",

                    url: "https://dsms.technoiq.in/backend/api/auth/password-reset",

                    data: formDatas,

                }).done(({status, message})=>{

                    if(status){

                        NioApp.Toast(message, 'success');

                        setTimeout(function(){location.href=domain_path+"school/login"} , 5000);  
                    } 
                    else{

                    NioApp.Toast(message, 'warning');
                }

                }).fail(()=>{

                    NioApp.Toast("Error Occurred", 'error')

                })
            }
        });
            

    })(NioApp, jQuery);

     function validate_password() {
 
            var pass = document.getElementById('password').value;
            var confirm_pass = document.getElementById('confirm-password').value;
            if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML
                  = '☒ Use same password';
                document.getElementById('create').disabled = true;
                document.getElementById('create').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').style.color = 'green';
                document.getElementById('wrong_pass_alert').innerHTML =
                    '🗹 Password Matched';
                document.getElementById('create').disabled = false;
                document.getElementById('create').style.opacity = (1);
            }
        }
 
        function wrong_pass_alert() {
            if (document.getElementById('password').value != "" &&
                document.getElementById('confirm-password').value != "") {
               
            } else {
                
            }
        }
  </script>

</body>
</html>