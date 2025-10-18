<style>
    .user-status{
        font-size: 14px !important;
        font-weight: 700 !important;
    }
    #school-admin-title{
        font-size:12px !important;
        font-weight:400 !important;
        
    }
    .nk-sidebar-fixed .nk-sidebar-element{
        background: #fff !important;
    }
    
</style>

<div class="nk-header nk-header-fixed bg-primary text-white">
    <div class="container-fluid">
        <div class="nk-header-wrap">
        <!-- <h4 id="school-admin-title">School Admin</h4> -->
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="html/index.html" class="logo-link">
                    <h4>Exam Module</h4>
                </a>
            </div><!-- .nk-header-brand -->
            
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                  <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                                        <a class="dropdown-toggle nk-quick-nav-icon show" data-bs-toggle="dropdown" aria-expanded="true">
                                            <div class="quick-icon border border-light lang-flag">
                                                <img class="icon" src="<?php echo base_url('assets/images/english.png');?>" alt="">
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1 " style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-10px, 38px);" data-popper-placement="bottom-end">
                                            <ul class="language-list">
                                                <li style="cursor: pointer;">
                                                    <a class="language-item" onclick="changeLanguage(1);">
                                                        <img src="<?php echo base_url('assets/images/english.png');?>" alt="" class="language-flag">
                                                        <span class="language-name" id="eng-lang">English</span>
                                                    </a>
                                                </li>
                                                <li style="cursor: pointer;">
                                                    <a class="language-item" onclick="changeLanguage(2);">
                                                        <img src="<?php echo base_url('assets/images/arabic.png');?>" alt="" class="language-flag">
                                                        <span class="language-name" id="ar-lang">Arabic</span>
                                                    </a>
                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </li>
                    <li class="dropdown user-dropdown">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <!-- <div class="user-avatar sm bg-light">
                                    <img class="icon" id="profile-image" alt="">
                                </div> -->
                                <div class="user-info d-none text-white d-md-block">
                                    <div class="user-status nav-name">Loading...</div>
                                    <h4 id="school-admin-title">School Admin</h4>

                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span id="nav-short-name">!</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text nav-name">Loading...</span>
                                        <span class="sub-text" id="nav-email">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="<?php echo base_url('school/profile');?>"><em class="icon ni ni-user-alt"></em><span id="view-profile">View Profile</span></a></li>
                                    
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="javascript:void(0)" onclick="logout()"><em class="icon ni ni-signout"></em><span id="sign-out">Sign out</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li><!-- .dropdown -->
                </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>