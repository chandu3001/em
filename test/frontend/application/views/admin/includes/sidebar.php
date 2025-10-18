<style>
.nk-menu-link{
    padding: 0.625rem 16px 0.625rem 18px;
}
/* @media (min-width: 1200px){
.nk-sidebar + .nk-wrap {
    padding-left: 228px !important;
}
} */
@media (min-width: 1200px){
.nk-sidebar .nk-menu > li .nk-menu-sub .nk-menu-link {
    padding-left: 35px;
}
}
/* @media (min-width: 1201px) and (max-width : 1900px){
.nk-sidebar + .nk-wrap {
    padding-left: 248px;
}
} */
.sidebar_image{
    display: flex;
    justify-content: center;
    margin: 0 auto;
    padding-bottom: 10px;
    border-top: 1px solid #c1c1c1;
    width: 91%;
    position: fixed;
    top: 91%;
    left:12px
}
.sidebar_image .sidebar_content{
   position: relative;
    bottom: -28px;
    
}
.sidebar_image img{
   padding-left: 4px;
}

   </style>
<div class="nk-sidebar nk-sidebar-fixed is-light" data-content="sidebarMenu" style="width:18% !important;">
      <div class="nk-sidebar-element nk-sidebar-head bg-primary" style="border-bottom: 1px solid #e5e9f2;">
                  <h4 id="admin-title" class='mb-0'>Admin</h4>
                  <div class="nk-menu-trigger me-n2"><a class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a></div>
               </div>
               <div class="nk-sidebar-element">
                  <div class="nk-sidebar-body" data-simplebar="init">
                     <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                           <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                           <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                              <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                                 <div class="simplebar-content" style="padding: 0px;">
                                    <div class="nk-sidebar-content">
                                       <div class="nk-sidebar-widget d-none d-xl-block">
                                          <div class="user-account-info between-center">
                                             <div class="user-account-main" id="total-exams">
                                                <h6 class="overline-title-alt" data-translate="">Total Exams</h6>
                                                <div class="user-balance count"> 0</div>
                                                <div class="user-account-label"></div>
                                             </div>
                                             <a class="btn btn-white btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
                                          </div>
                                          
                                          <div class="user-account-actionss">
                                             <ul class="g-3">
                                                <li><a href="<?php echo base_url('admin/examination');?>" class="btn btn-lg btn-block btn-outline-primary"><span>View</span></a></li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
                                          <a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile">
                                             <div class="user-card-wrap">
                                                <div class="user-card">
                                                   <div class="user-avatar"><span>AB</span></div>
                                                   <div class="user-info"><span class="lead-text">Abu Bin Ishtiyak</span><span class="sub-text">info@demo.com</span></div>
                                                   <div class="user-action"><em class="icon ni ni-chevron-down"></em></div>
                                                </div>
                                             </div>
                                          </a>
                                          <div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">
                                             <div class="user-account-info between-center">
                                                <div class="user-account-main">
                                                   <h6 class="overline-title-alt">Total Loan</h6>
                                                   <div class="user-balance">10.8 Lac <small class="currency currency-btc">USD</small></div>
                                                   <div class="user-account-label"><span class="sub-text">Business Purpose</span></div>
                                                </div>
                                                <a class="btn btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
                                             </div>
                                             <ul class="user-account-data">
                                                <li>
                                                   <div class="user-account-label"><span class="sub-text">Interest</span></div>
                                                   <div class="user-account-value"><span class="sub-text text-base">15K <span class="currency currency-btc">USD</span></span></div>
                                                </li>
                                             </ul>
                                             <ul class="user-account-links">
                                                <li><a href="/demo5/loan/loan-history.html" class="link"><span>Details</span> <em class="icon ni ni-wallet-out"></em></a></li>
                                                <li><a href="/demo5/loan/apply-application.html" class="link"><span>Apply Loan</span> <em class="icon ni ni-wallet-in"></em></a></li>
                                             </ul>
                                             <ul class="link-list">
                                                <li><a><em class="icon ni ni-signout"></em><span class="log-out">Sign out</span></a></li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="nk-sidebar-menu">
                                          <ul class="nk-menu">
                                             <li class="nk-menu-heading">
                                                <h6 class="overline-title" id="tmenu" data-translate="">Menu</h6>
                                             </li>
                                             <li class="nk-menu-item active current-page"><a href="<?php echo base_url('admin/dashboard');?>" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span><span class="nk-menu-text dtitle" data-translate="">Dashboard</span></a></li>
                                             <li class="nk-menu-item school-menu"><a href="<?php echo base_url('admin/schools');?>" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span><span class="nk-menu-text manage-school" data-translate="">Manage Schools</span></a></li>
                                          
                                             <li class="nk-menu-item student-menu"><a href="<?php echo base_url('admin/students');?>" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-users"></em></span><span class="nk-menu-text manage-student" data-translate="">Manage Students</span></a></li>
                                            
                                             <li class="nk-menu-item exam-menu"><a href="<?php echo base_url('admin/examination');?>" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-edit"></em></span><span class="nk-menu-text exam-tab" data-translate="">Examination</span></a></li>

                                               <li class="nk-menu-item"><a href="<?php echo base_url('admin/report'); ?>" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span><span class="nk-menu-text reports" data-translate="">Reports</span></a></li>
                                          
                                             
                                              <li class="nk-menu-item has-sub">
                                                <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-icon"><em
                                                         class="icon ni ni-package"></em></span><span
                                                      class="nk-menu-text settings" data-translate="">Settings</span></a>
                                                <ul class="nk-menu-sub">
                                                   <li class="nk-menu-item"><a href="<?php echo base_url('admin/families');?>"
                                                         class="nk-menu-link"><span class="nk-menu-text ftitle" data-translate="">Groups</span></a></li>
                                                   <li class="nk-menu-item"><a href="<?php echo base_url('admin/license');?>"
                                                         class="nk-menu-link"><span class="nk-menu-text license-types" data-translate="">License Types</span></a></li>
                                                   <li class="nk-menu-item"><a
                                                         href="<?php echo base_url('admin/sub_licence');?>"
                                                         class="nk-menu-link"><span class="nk-menu-text sub-license-types" data-translate="">Sub License Types</span></a>
                                                   </li>
                                                </ul>
                                             </li>
                                           
                                          </ul>
                                       </div>
                                       <div class="sidebar_image">
                              <p class="sidebar_content" style="font-size: 12px !important; font-weight: 400 !important;">Powered by </p>
                           <img src="<?php echo base_url('assets/images/hhp-black.png'); ?>" />
                           </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 944px;"></div>
                     </div>
                     <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                     </div>
                     <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar" style="height: 944px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                     </div>
                  </div>
               </div>
            </div>