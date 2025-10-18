<?php include_once APPPATH . 'views/school/includes/header.php'; ?>
<style>
   .disable {
      pointer-events: none;

   }
   .is-alter .form-control ~ .invalid {
    bottom: calc(100% + 4px) !important;
}
.nk-block-head .nk-block-title {
    padding: 0px 0px 34px 5px !important;
}
</style>

<body class="nk-body npc-crypto bg-lighter has-sidebar ">
   <div class="nk-app-root">
      <div class="nk-main ">
         <?php include_once APPPATH . 'views/school/includes/sidebar.php'; ?>

         <div class="nk-wrap ">

            <?php include_once APPPATH . 'views/school/includes/navbar.php'; ?>

            <div class="nk-content nk-content-fluid">
               <div class="container-xl wide-lg">
                  <div class="nk-content-body">
                     <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                           <div class="nk-block-head-content">
                              <h3 class="nk-block-title page-title diff-levels" style="margin-bottom:-25px;">Difficulty Levels</h3>
                              <div class="nk-block-des text-soft">
                                 <p class="tot-diff-level10">Total 10 Difficulty Level</p>
                              </div>
                           </div>

                        </div>
                     </div>
                     <div class="bg-white p-3 rounded">
                        <form id="difficultyLevelsForm" class="is-alter">
                           <div class="row gx-3">
                              <div class="col-12 col-md-1">
                                 <div class="row">
                                    <div class='col-6 col-md-12 fw-bold text-center my-3 level'>Levels</div>
                                    <div class='col-6 col-md-12 fw-bold text-center my-3 marks'>Marks</div>
                                 </div>
                              </div>
                              <?php for ($i = 1; $i <= 10; $i++) { ?>
                                 <div class="col-12 col-md">
                                    <div class="row">
                                       <div class='col-6 col-md-12 fw-bold text-center my-3'><?= '<span class="level">Level</span> ' .$i ?></div>
                                       <div class='col-6 col-md-12 fw-bold text-center my-3 form-control-wrap'>
                                          <input name="level<?= $i ?>-marks" type="text" data-rule-digits="true" data-msg-digits="Specify valid marks" data-rule-range="1,900" data-msg-range="Specify marks between 1-900" data-msg="Mark is required" class="form-control text-center" value="0" required />
                                       </div>
                                    </div>
                                 </div>
                              <?php } ?>
                           </div>
                        </form>
                     </div>
                     <div class="mt-3">
                        <button id="btn-update" form="difficultyLevelsForm" type="submit" class='btn btn-primary update' style="margin-right: 14px !important;">Update</button>
                        <button id="btn-cancel" type="button" class='btn btn-danger cancel'>Cancel</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Footer -->
            <?php include_once APPPATH . 'views/school/includes/footer.php'; ?>
         </div>
      </div>
   </div>
   
   <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>
   <script src="<?php echo base_url('assets/js/school/difficulty_level.js'); ?>"></script>

   <script>
      $(function() {
         async function init() {
            const auth = await appModule.checkAuth();
            getDifficultyLevels();
         }

         init();
      });
   </script>
</body>

</html>