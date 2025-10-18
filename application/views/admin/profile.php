<style>
   .nk-content-fluid{
         top: 65px;
         position: relative;
        }
</style>
<?php include_once APPPATH . 'views/admin/includes/header.php'; ?>

<body class="nk-body npc-crypto bg-lighter has-sidebar ">
    <div class="nk-app-root">
        <div class="nk-main ">

            <?php include_once APPPATH . 'views/admin/includes/sidebar.php'; ?>

            <div class="nk-wrap ">
                <?php include_once APPPATH . 'views/admin/includes/navbar.php'; ?>

                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block">
                                <div class="card card-bordered">
                                    <div class="card-aside-wrap">
                                        <div class="card-inner card-inner-lg">
                                            <div class="nk-block-head nk-block-head-lg">
                                                <div class="nk-block-between">
                                                    <div class="nk-block-head-content">
                                                        <h4 class="nk-block-title personal-info">Personal Information</h4>
                                                    </div>
                                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                            data-target="userAside"><em
                                                                class="icon ni ni-menu-alt-r"></em></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-block" id="profile">
                                            </div>
                                        </div>
                                        <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                                            data-toggle-body="true" data-content="userAside" data-toggle-screen="lg"
                                            data-toggle-overlay="true">
                                            <div class="card-inner-group" data-simplebar>
                                                <div class="card-inner">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-primary"><span id="pofileShortName"></span></div>
                                                        <div class="user-info"><span class="lead-text" id="pofileName"></span><span
                                                                class="sub-text" id="pofileEmail"></span></div>
                                                        <div class="user-action">
                                                            <div class="dropdown">
                                                                <a class="btn btn-icon btn-trigger me-n2"
                                                                    data-bs-toggle="dropdown" href="#"><em
                                                                        class="icon ni ni-more-v"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li>
                                                                            <a data-bs-toggle="modal"
                                                                                data-bs-target="#profile-edit"><em
                                                                                    class="icon ni ni-edit-fill"></em><span class="edit-profile">Update
                                                                                    Profile</span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-inner p-0">
                                                    <ul class="link-list-menu">
                                                        <li>
                                                            <a class="active"><em
                                                                    class="icon ni ni-user-fill-c"></em><span class="personal-info">Personal
                                                                    Infomation</span></a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="modal"
                                                                data-bs-target="#profile-change-password"><em
                                                                    class="icon ni ni-lock-alt-fill"></em><span class="change-password">Change Password</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once APPPATH . 'views/admin/includes/footer.php'; ?>

            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Select Your Country</h5>
                    <div class="nk-country-region">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title edit-profile">Update Profile</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active presonal" id="profile-tab" data-bs-toggle="tab"
                                href="#personal">Personal</a></li>
                        <li class="nav-item" ><a class="nav-link address" id="adds-tab" data-bs-toggle="tab" href="#address">Address</a></li>
                    </ul>
                    <div class="tab-content" id="edit-profile">
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="profile-change-password">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"  id="close-form"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title change-password">Change Password</h5>
                    <div class="tab-content">
                        <div class="tab-pane active">
                           <form id="change-password-form">
                           <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="current-password">Current Password</label><input
                                            type="password" class="form-control form-control-lg" id="current_password" name="current_password"
                                            value="" placeholder="Enter Current Password" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="new-password">New Password</label><input
                                            type="password" class="form-control form-control-lg" id="new_password" name="new_password"
                                            value="" placeholder="Enter New Password" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="confirm-password">Confirm Password</label><input
                                            type="password" class="form-control form-control-lg" id="new_password_confirmation" name="new_password_confirmation"
                                            value="" placeholder="Enter Confirm Password" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li><button class="btn btn-lg btn-primary change-password">Change Password</button></li>
                                        <li><a href="#" data-bs-dismiss="modal" id="closeModal" class="link link-light cancel">Cancel</a></li>
                                    </ul>
                                </div>
                            </div>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once APPPATH . 'views/admin/includes/footer-scripts.php'; ?>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <script>
        let profile;
        $(function(){
            profile = getProfile();

            $("#edit-profile").append(`
                <div class="tab-pane active" id="personal">
                   <form id="update-profile">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label full-name" for="full-name">Full Name</label><input type="text"
                                        class="form-control form-control-lg" id="name" name="name" value="${profile.name}"
                                        placeholder="Enter Full name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label phone-no" for="phone-no">Phone Number</label><input type="text"
                                        class="form-control form-control-lg" id="phone" name="phone" value="${profile.phone}"
                                        placeholder="Phone Number" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email Id</label><input type="email"
                                        value="${profile.email}" class="form-control form-control-lg" id="email" name="email"
                                        placeholder="Email Address" />
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li><button class="btn btn-lg btn-primary edit-profile">Update Profile</button></li>
                                    <li><a href="#" data-bs-dismiss="modal" class="link link-light cancel">Cancel</a></li>
                                </ul>
                            </div>
                        </div>
                   </form>
                </div>
                <div class="tab-pane" id="address">
                    <form id="update_address_form">
                        <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="city">City</label>
                                        <input type="text" name="city" class="form-control form-control-lg" id="city" value="${profile.city ? profile.city : ''}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label address" for="address">
                                            Address
                                        </label>
                                        <textarea name="address" class="form-control form-control-lg" id="address" >${profile.address ? profile.address : ''}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li><button class="btn btn-lg btn-primary" id="update-add">Update Address</button></li>
                                        <li><button id="closeModal" type="button" data-bs-dismiss="modal" class="link link-light cancel">Cancel</button></li>
                                    </ul>
                                </div>
                            </div>
                    </form>
                </div>
            `)


            const profileValidation = new window.JustValidate('#update-profile');

               
                profileValidation.addField("#name",[
                    {
                        rule: 'required'
                    },
                ]).addField("#email",[
                    {
                        rule: "required"
                    },
                    {
                        rule: "email"
                    },
                ]).addField("#phone",[
                    {
                        rule: "required"
                    },
                    {
                        rule: "number"
                    },
                ]).onSuccess((e)=>{
                    submitProfileForm("#update-profile");
                })

                const profileAddressValidation = new window.JustValidate('#update_address_form');

               
                profileAddressValidation.addField("#address",[
                    {
                        rule: 'required'
                    },
                ]).addField("#city",[
                    {
                        rule: "required"
                    },
                ]).onSuccess((e)=>{
                    submitProfileForm('#update_address_form');
                })

            const validate = new window.JustValidate('#change-password-form');
            validate.addField('#current_password', [
                {
                rule: 'minLength',
                value: 6,
                },
                {
                    rule: 'required',
                }
            ]).addField("#new_password",[
                {
                rule: 'minLength',
                value: 6,
                },
                {
                    rule: 'required',
                }
            ]).addField("#new_password_confirmation",[
                {
                    rule: 'minLength',
                    value: 6,
                },
                {
                    rule: 'required',
                },
                {
                    validator: (value, fields) => {
                            return value === $("#new_password").val()
                    },
                    errorMessage: 'Password should be the same as new password',
                }
            ]).onSuccess(()=>{
                   submitForm();
                })
            })
            
        function getProfile()
        {
            let profile;

            $.ajax({
                type: "GET",
                async: false,
                url: "https://dsms.technoiq.in/backend/api/auth/super_admin_profile/"+$.cookie("user_id")
            }).done(({status, message, data})=>{
                if(status)
                {
                    profile = data;

                    $("#pofileEmail").text(data.email);
                    $("#pofileName").text(data.name);
                    $("#pofileShortName").text(data.name[0]);

                    
                    $("#profile").html(`
                    <div class="nk-data data-list">
                        <div class="data-head">
                            <h6 class="overline-title basic">Basics</h6>
                        </div>
                        <div class="data-item" data-bs-toggle="modal"
                            data-bs-target="#profile-edit" onclick="profileModal()">
                            <div class="data-col"><span class="data-label full-name">Full
                                    Name</span><span class="data-value">${data.name}</span></div>
                            <div class="data-col data-col-end">
                                <span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span>
                            </div>
                        </div>
                        <div class="data-item" data-bs-toggle="modal"
                            data-bs-target="#profile-edit" onclick="profileModal()">
                            <div class="data-col"><span class="data-label email">Email</span><span
                                    class="data-value">${data.email}</span></div>
                            <div class="data-col data-col-end">
                                <span class="data-more disable"><em
                                        class="icon ni ni-forward-ios"></em></span>
                            </div>
                        </div>
                        <div class="data-item" data-bs-toggle="modal"
                            data-bs-target="#profile-edit" onclick="profileModal()">
                            <div class="data-col"><span class="data-label phone-no">Phone
                                    Number</span><span class="data-value text-soft">${data.phone}</span></div>
                            <div class="data-col data-col-end">
                                <span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span>
                            </div>
                        </div>
                        
                        <div class="data-item" data-bs-toggle="modal"
                            data-bs-target="#profile-edit" data-tab-target="#address" onclick="addressModal();">
                            <div class="data-col"><span class="data-label city">City</span><span class="data-value text-soft">${data.city}</span></div>
                            <div class="data-col data-col-end">
                                <span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span>
                            </div>
                        </div>

                        <div class="data-item row" data-bs-toggle="modal"
                            data-bs-target="#profile-edit" data-tab-target="#address" onclick="addressModal();">
                            <div class="data-col col-6">
                                <span class="data-label address">Address</span>
                                <span class="data-value">${data.address ? data.address : '--'}
                                </span>
                            </div>
                            <div class="data-col data-col-end">
                                <span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span>
                            </div>
                        </div>
                    </div>
                    `)
                }
            })
            return profile;
        }

        function addressModal(){
            $('#adds-tab,#address').addClass('active');
            $('#profile-tab,#personal').removeClass('active');

        }

        function profileModal(){
            $('#adds-tab,#address').removeClass('active');
            $('#profile-tab,#personal').addClass('active');

        }
       
        $('#closeModal,#close-form').click(function(){
            $('#change-password-form')[0].reset();
        });

        function submitForm()
        {
            $.ajax({
                type: "POST",
                url: "https://dsms.technoiq.in/backend/api/auth/school/change-password",
                data: $("#change-password-form").serialize() + "&id=" + $.cookie("user_id")
                
            }).done(({status, message})=>{
                if(status)
                {
                    $("#closeModal").click();
                    setTimeout(function () {
                    $('#profile-change-password').modal('hide');
                    }, 2000);
                     $('.modal-backdrop.show').css('opacity','0');
                    $('.modal-backdrop').css('z-index','-1')
                    $('#change-password-form').trigger('reset');
                    NioApp.Toast(message, "success");
                
                }
                else
                {
                    NioApp.Toast(message, "warning")
                }
            }).fail(({status, responseJSON, statusText})=>{
                if(status == 422)
                {
                    const current_password = responseJSON.message.current_password;
                    const new_password = responseJSON.message.new_password;
                    const new_password_confirmation = responseJSON.message.new_password_confirmation;
                    if(current_password != undefined)
                    {
                        current_password.forEach(error =>{
                            NioApp.Toast(error, "error")
                        })
                    }
                    if(new_password != undefined)
                    {
                        new_password.forEach(error =>{
                            NioApp.Toast(error, "error")
                        })
                    }
                    if(new_password_confirmation != undefined)
                    {
                        new_password_confirmation.forEach(error =>{
                            NioApp.Toast(error, "error")
                        })
                    }

                }
                else
                {
                    NioApp.Toast("Error Occurred", "error")
                    
                }
            })
        }
        
        function submitProfileForm(e)
        {
            showLoader({
                title: "Please Wait",
                // text: "Updating..."
            })
            $.ajax({
                type: "post",
                url: "https://dsms.technoiq.in/backend/api/auth/superadmin/update-profile",
                data: $(e).serialize() + "&id=" + $.cookie("user_id")
            }).done(({status, message})=>{
                if(status)
                {
                    getProfile();
                    $(e).serializeArray().forEach(item =>{
                            if(item.name != 'phone')
                            {
                                $.cookie(item.name, item.value);
                            }
                        })
                        $(".nav-name").text($.cookie('name'))
                        $(".nav-short-name").text($.cookie('name')[0])
                        $(".nav-email").text($.cookie('email'))
                        $("#profile-edit").modal('hide');
                    $("#closeModal").click();
                    location.reload();
                    NioApp.Toast(message, "success")

                }
                else
                {
                    NioApp.Toast(message, "warning")
                }
            }).fail(({status, responseJSON, statusText})=>{
                if(status == 422)
                {
                    NioApp.Toast("Invalid User Id", "error")
                }
                else
                {
                    NioApp.Toast("Error Occurred", "error")
                }
            }).always(()=>{
                hideLoader();
            })
        }
    </script>

</body>

</html>