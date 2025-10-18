<style>
     .user_img img{
        height: 64px !important;
        width: 63px !important;
    }
    .user_img{
       margin-bottom: 50px;
    }
    .footer_hhp p{
        color: #a1aab2;
        padding-right: 9px;
    }
    .footer_hhp{
        display:flex;
        position: relative;
        top: 27%;
    }
    .nk-block-head .nk-block-title{
        padding: 0px 0px 0px 5px;
    }
    </style>
<div class="nk-block-head start-details">
   
     <div class="nk-block-between-md g-4">
     <div class="user_img">
     <img src="<?php echo base_url('assets/images/user.png'); ?>" alt="">
     </div>
         <div class="nk-block-head-content">
             <h2 class="nk-block-title fw-normal student_name" id="username" style="margin-left: -4px;"></h2>
             <div class="nk-block-des"><p id="student_id"></p></div>
         </div>
          <div class="nk-block-head-content start-sys-details" id="host-name-area">
                <!-- <h4 class="nk-block-title fw-normal" id="host-name"></h4> -->
                <!-- <div class="nk-block-des" id='device-status' style="margin-left: 6px;"></div> -->
         </div>
         <div class="nk-block-head-content" id="device-status-area">
                <!-- <h4 class="nk-block-title fw-normal" ></h4> -->
                <!-- <div class="nk-block-des" id='device-status' style="margin-left: 6px;"></div> -->
         </div>
         <div class="footer_hhp">
            <p>powered by </p>
            <div class="grey_hhp">
            <img src="<?php echo base_url('assets/images/hhp_grey.png'); ?>" alt="">
            </div>
         </div>
     </div>
</div>