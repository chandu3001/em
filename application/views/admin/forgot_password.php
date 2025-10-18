  <?php include_once APPPATH . 'views/admin/includes/header.php'; ?>


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
                            <a href="<?php echo base_url('admin/login');?>" class="logo-link">
                                
                            </a>
                            <h3>Exam Module</h3>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Reset password</h5>
                                        <div class="nk-block-des">
                                            <p>If you forgot your password, well, then we’ll email you instructions to reset your password.</p>
                                        </div>
                                    </div>
                                </div>
                                <form id="reset-password-form" class="is-alter">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control form-control-lg" id="email" placeholder="Enter your email address" required data-msg="Email is required"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Send Reset Link</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4">
                                    <a href="<?php echo base_url('admin/login');?>"><strong>Return to login</strong></a>
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
   <script src="<?php echo base_url('/assets/js/bundle.js?ver=3.0.0');?>"></script>
   <script src="<?php echo base_url('/assets/js/scripts.js?ver=3.0.0');?>"></script>

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
            let formDatas = {
              email: $('#email').val(),
              role: 'admin',
            }

            if ($('#reset-password-form').valid()) {
                $.ajax({
                    dataType: 'json', 
                    type: "POST",
                    url: api_base_url+"request-reset-password-link",
                    data: formDatas,
                }).done(({status, message})=>{
                    if(status){
                        NioApp.Toast(message, 'success');
                        $('#email').val('');
                    }else{
                        NioApp.Toast(message, 'warning');
                    }
                    
                }).fail(()=>{
                    NioApp.Toast("Error Occurred", 'error')
                })
            }
        })
   })(NioApp, jQuery);
  </script>
</html>