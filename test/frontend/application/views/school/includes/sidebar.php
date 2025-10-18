
<style>
.nk-menu-link{
    padding: 0.625rem 16px 0.625rem 18px;
}
/* @media (min-width: 1200px){
.nk-sidebar + .nk-wrap {
    padding-left: 228px;
}
}
@media (min-width: 1200px){
.nk-sidebar .nk-menu > li .nk-menu-sub .nk-menu-link {
    padding-left: 35px;
}
}
@media (min-width: 1201px) and (max-width : 1900px){
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
.nk-sidebar-element .sidebar_logo_content{
   position: relative;
    left: 22px;
}
.sidebar_logo_content, [class^=sidebar_logo_content]:not([class*=-group]){
   border-radius:0px !important;
   background:#fff !important;
   width: 46% !important;
    height: 100% !important;
 
}
.sidebar_logo_content img, [class^=sidebar_logo_content]:not([class*=-group]) img{
   border-radius:0px !important;
}

   </style>
<div class="nk-sidebar nk-sidebar-fixed is-light" data-content="sidebarMenu" style="width:18% !important;">
   <div class="nk-sidebar-element nk-sidebar-head bg-primary" style="border-bottom: 1px solid #e5e9f2;">
   <div class="user-avatar sm bg-light sidebar_logo_content">
                                    <img class="icon" id="profile-image" alt="">
                                </div>
      <!-- <span class="text-white">Exam Module</span> -->
      <div class="nk-menu-trigger me-n2"><a href="javascript:void(0)" class="nk-nav-toggle nk-quick-nav-icon d-xl-none"
            data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a></div>
   </div>
   <div class="nk-sidebar-element">
      <div class="nk-sidebar-body" data-simplebar="init">
         <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
               <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
               <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                  <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                     style="height: auto; overflow: hidden scroll;">
                     <div class="simplebar-content" style="padding: 0px;">
                        <div class="nk-sidebar-content">
                           <div class="nk-sidebar-widget d-none d-xl-block border-bottom">
                              <div class="user-account-info between-center">
                                 <div class="user-account-main" id="total-exams">
                                    <h6 class="overline-title-alt" id="">Total Exams</h6>
                                    <div class="user-balance count"> 0</div>
                                    <div class="user-account-label"></div>
                                 </div>
                                 <a class="btn btn-white btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
                              </div>
                              <div class="user-account-actionz mt-1 mb-3">
                                 <ul class="g-3">
                                    <li><a href="<?php echo base_url('school/examination'); ?>" class="btn btn-lg btn-block btn-outline-primary"><span>View</span></a></li>
                                 </ul>
                              </div>
                           </div>
                           
                           <div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
                              <a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="javascript:void(0)">
                                 <div class="user-card-wrap">
                                    <div class="user-card">
                                       <div class="user-avatar"><span>AB</span></div>
                                       <div class="user-info"><span class="lead-text">Abu Bin Ishtiyak</span><span
                                             class="sub-text">info@demo.com</span></div>
                                    </div>
                                 </div>
                              </a>
                              
                           </div>
                           <div class="nk-sidebar-menu" style="overflow:auto;">
                              <ul class="nk-menu">
                                 <li class="nk-menu-heading">
                                    <h6 class="overline-title" id="tmenu">Menu</h6>
                                 </li>
                                 <li class="nk-menu-item active current-page"><a
                                       href="<?php echo base_url('school/dashboard'); ?>" class="nk-menu-link"><span
                                          class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span><span
                                          class="nk-menu-text dtitle">Dashboard</span></a></li>

                                 <li class="nk-menu-item student-menu"><a href="<?php echo base_url('school/students'); ?>"
                                       class="nk-menu-link"><span class="nk-menu-icon"><em
                                             class="icon ni ni-users"></em></span><span class="nk-menu-text student-title">Students</span></a></li>
                                 <li class="nk-menu-item"><a href="<?php echo base_url('school/question'); ?>"
                                       class="nk-menu-link"><span class="nk-menu-icon"><em
                                             class="icon ni ni-question-alt"></em></span><span
                                          class="nk-menu-text que-pool-title">Question Pool</span></a></li>
                                 <li class="nk-menu-item exam-menu"><a href="<?php echo base_url('school/examination'); ?>"
                                       class="nk-menu-link"><span class="nk-menu-icon"><em
                                             class="icon ni ni-edit"></em></span><span
                                          class="nk-menu-text exam-tab">Examinations</span></a></li>

                                 <li class="nk-menu-item"><a href="<?php echo base_url('school/report'); ?>"
                                       class="nk-menu-link"><span class="nk-menu-icon"><em
                                             class="icon ni ni-growth"></em></span><span
                                          class="nk-menu-text reports">Reports</span></a></li>
                                 <li class="nk-menu-item"><a href="<?php echo base_url('school/authenticator'); ?>"
                                       class="nk-menu-link"><span class="nk-menu-icon"><em
                                             class="icon ni ni-lock"></em></span><span
                                          class="nk-menu-text auth-title">Authenticator</span></a></li>

                                 <li class="nk-menu-item has-sub">
                                    <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle dropdown_schooladmin"><span class="nk-menu-icon">
                                       <em class="icon ni ni-package"></em></span>
                                       <span class="nk-menu-text settings">Settings</span></a>
                                    <ul class="nk-menu-sub">
                                       <li class="nk-menu-item"><a href="<?php echo base_url('school/languages'); ?>"
                                             class="nk-menu-link"><span class="nk-menu-text languages">Languages</span></a></li>
                                       <li class="nk-menu-item"><a href="<?php echo base_url('school/families'); ?>"
                                             class="nk-menu-link"><span class="nk-menu-text ftitle" id="ftitle">Groups</span></a></li>
                                       <li class="nk-menu-item"><a
                                             href="<?php echo base_url('school/difficulty_level'); ?>"
                                             class="nk-menu-link"><span class="nk-menu-text diff-level">Difficulty Levels</span></a>
                                       </li>
                                       <li class="nk-menu-item"><a href="<?php echo base_url('school/license'); ?>"
                                             class="nk-menu-link"><span class="nk-menu-text license-type">License Types</span></a>
                                       </li>
                                       <li class="nk-menu-item sub_license_align">
                                          <a class="nk-menu-link" href="<?php echo base_url('school/sub_licence'); ?> "
                                              style="padding-right:0px !important">
                                              <span class="nk-menu-text sub-name">Sub License Types</span>
                                             </a>
                                             </li>
                                       <li class="nk-menu-item">
                                          <a class="nk-menu-link" href="<?php echo base_url('school/instruction'); ?>">
                                             <span class="nk-menu-text instruction">Instructions</span>
                                          </a>
                                       </li>

                                    </ul>
                                 </li>
                              </ul>
                           </div>
                           
                           <div class="nk-sidebar-widget nk-sidebar-widget-full pt-0">
                             
                           </div>
                           <div class="h-100px d-block"></div>
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
            <div class="simplebar-scrollbar"
               style="height: 944px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
         </div>
      </div>
   </div>
</div>
