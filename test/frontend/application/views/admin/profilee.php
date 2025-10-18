  <?php include_once APPPATH . 'views/admin/includes/header.php'; ?>

   <body class="nk-body npc-crypto bg-lighter has-sidebar " >
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
                                                            <h4 class="nk-block-title">Personal Information</h4>
                                                            <div class="nk-block-des"><p>Basic info, like your name and address, that you use on Nio Platform.</p></div>
                                                        </div>
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-block">
                                                    <div class="nk-data data-list">
                                                        <div class="data-head"><h6 class="overline-title">Basics</h6></div>
                                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                            <div class="data-col"><span class="data-label">Full Name</span><span class="data-value">Abu Bin Ishtiyak</span></div>
                                                            <div class="data-col data-col-end">
                                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                                            </div>
                                                        </div>
                                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                            <div class="data-col"><span class="data-label">Display Name</span><span class="data-value">Ishtiyak</span></div>
                                                            <div class="data-col data-col-end">
                                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                                            </div>
                                                        </div>
                                                        <div class="data-item">
                                                            <div class="data-col"><span class="data-label">Email</span><span class="data-value">info@softnio.com</span></div>
                                                            <div class="data-col data-col-end">
                                                                <span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span>
                                                            </div>
                                                        </div>
                                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                            <div class="data-col"><span class="data-label">Phone Number</span><span class="data-value text-soft">Not add yet</span></div>
                                                            <div class="data-col data-col-end">
                                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                                            </div>
                                                        </div>
                                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                            <div class="data-col"><span class="data-label">Date of Birth</span><span class="data-value">29 Feb, 1986</span></div>
                                                            <div class="data-col data-col-end">
                                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                                            </div>
                                                        </div>
                                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit" data-tab-target="#address">
                                                            <div class="data-col">
                                                                <span class="data-label">Address</span>
                                                                <span class="data-value">
                                                                    2337 Kildeer Drive,<br />
                                                                    Kentucky, Canada
                                                                </span>
                                                            </div>
                                                            <div class="data-col data-col-end">
                                                                <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--<div class="nk-data data-list">
                                                        <div class="data-head"><h6 class="overline-title">Preferences</h6></div>
                                                        <div class="data-item">
                                                            <div class="data-col"><span class="data-label">Language</span><span class="data-value">English (United State)</span></div>
                                                            <div class="data-col data-col-end"><a href="#" class="link link-primary">Change Language</a></div>
                                                        </div>
                                                        <div class="data-item">
                                                            <div class="data-col"><span class="data-label">Date Format</span><span class="data-value">M d, YYYY</span></div>
                                                            <div class="data-col data-col-end"><a href="#" class="link link-primary">Change</a></div>
                                                        </div>
                                                        <div class="data-item">
                                                            <div class="data-col"><span class="data-label">Timezone</span><span class="data-value">Bangladesh (GMT +6)</span></div>
                                                            <div class="data-col data-col-end"><a href="#" class="link link-primary">Change</a></div>
                                                        </div>
                                                    </div>-->
                                                </div>
                                            </div>
                                            <div
                                                class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                                                data-toggle-body="true"
                                                data-content="userAside"
                                                data-toggle-screen="lg"
                                                data-toggle-overlay="true"
                                            >
                                                <div class="card-inner-group" data-simplebar>
                                                    <div class="card-inner">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-primary"><span>AB</span></div>
                                                            <div class="user-info"><span class="lead-text">Abu Bin Ishtiyak</span><span class="sub-text">info@softnio.com</span></div>
                                                            <div class="user-action">
                                                                <div class="dropdown">
                                                                    <a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li>
                                                                                <a href="#"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner">
                                                        <div class="user-account-info py-0">
                                                            <h6 class="overline-title-alt">Nio Wallet Account</h6>
                                                            <div class="user-balance">12.395769 <small class="currency currency-btc">BTC</small></div>
                                                            <div class="user-balance-sub">
                                                                Locked <span>0.344939 <span class="currency currency-btc">BTC</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner p-0">
                                                        <ul class="link-list-menu">
                                                            <li>
                                                                <a class="active" href="/demo5/user-profile-regular.html"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="/demo5/user-profile-notification.html"><em class="icon ni ni-bell-fill"></em><span>Notifications</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="/demo5/user-profile-activity.html"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="/demo5/user-profile-setting.html"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a>
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
                        <h5 class="title mb-4">Select Your Countryy</h5>
                        <div class="nk-country-region">
                            <ul class="country-list text-center gy-2">
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/arg.png" alt="" class="country-flag" /><span class="country-name">Argentina</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/aus.png" alt="" class="country-flag" /><span class="country-name">Australia</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/bangladesh.png" alt="" class="country-flag" /><span class="country-name">Bangladesh</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item">
                                        <img src="/demo5/images/flags/canada.png" alt="" class="country-flag" /><span class="country-name">Canada <small>(English)</small></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/china.png" alt="" class="country-flag" /><span class="country-name">Centrafricaine</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/china.png" alt="" class="country-flag" /><span class="country-name">China</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/french.png" alt="" class="country-flag" /><span class="country-name">France</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/germany.png" alt="" class="country-flag" /><span class="country-name">Germany</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/iran.png" alt="" class="country-flag" /><span class="country-name">Iran</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/italy.png" alt="" class="country-flag" /><span class="country-name">Italy</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/mexico.png" alt="" class="country-flag" /><span class="country-name">México</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/philipine.png" alt="" class="country-flag" /><span class="country-name">Philippines</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/portugal.png" alt="" class="country-flag" /><span class="country-name">Portugal</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/s-africa.png" alt="" class="country-flag" /><span class="country-name">South Africa</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/spanish.png" alt="" class="country-flag" /><span class="country-name">Spain</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/switzerland.png" alt="" class="country-flag" /><span class="country-name">Switzerland</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/uk.png" alt="" class="country-flag" /><span class="country-name">United Kingdom</span></a>
                                </li>
                                <li>
                                    <a href="#" class="country-item"><img src="/demo5/images/flags/english.png" alt="" class="country-flag" /><span class="country-name">United State</span></a>
                                </li>
                            </ul>
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
                        <h5 class="title">Update Profile</h5>
                        <ul class="nk-nav nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#personal">Personal</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#address">Address</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="personal">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Full Name</label><input type="text" class="form-control form-control-lg" id="full-name" value="Abu Bin Ishtiyak" placeholder="Enter Full name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Display Name</label><input type="text" class="form-control form-control-lg" id="display-name" value="Ishtiyak" placeholder="Enter display name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Phone Number</label><input type="text" class="form-control form-control-lg" id="phone-no" value="+880" placeholder="Phone Number" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="birth-day">Date of Birth</label><input type="text" class="form-control form-control-lg date-picker" id="birth-day" placeholder="Enter your birth date" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="latest-sale" /><label class="custom-control-label" for="latest-sale">Use full name to display </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li><a href="#" data-bs-dismiss="modal" class="btn btn-lg btn-primary">Update Profile</a></li>
                                            <li><a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label" for="address-l1">Address Line 1</label><input type="text" class="form-control form-control-lg" id="address-l1" value="2337 Kildeer Drive" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label" for="address-l2">Address Line 2</label><input type="text" class="form-control form-control-lg" id="address-l2" value="" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label" for="address-st">State</label><input type="text" class="form-control form-control-lg" id="address-st" value="Kentucky" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="address-county">Country</label>
                                            <select class="form-select js-select2" id="address-county" data-ui="lg">
                                                <option>Canada</option>
                                                <option>United State</option>
                                                <option>United Kindom</option>
                                                <option>Australia</option>
                                                <option>India</option>
                                                <option>Bangladesh</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li><a href="#" class="btn btn-lg btn-primary">Update Address</a></li>
                                            <li><a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <?php include_once APPPATH . 'views/admin/includes/footer-scripts.php'; ?>

    </body>
</html>
