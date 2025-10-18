<style>
    .nav-tabs .nav-link:after{
        display:none;
    }
    .license_type_title{
        display:flex;
    }
    .nav-tabs{
        border-bottom:none !important;
    }
    .nav-tabs .current-page{
        padding-left: 10px;
    }
    .nav-tabs .nav-item.active .nav-link {
    color: #364a63 !important;
    font-size: 1.25rem;
    letter-spacing: -0.01rem;
    font-weight: 500;
    padding: 12px 0 !important;
}

</style>
<?php include_once APPPATH . 'views/school/includes/header.php'; ?>

   <body class="nk-body npc-crypto bg-lighter has-sidebar " >
      <div class="nk-app-root">
         <div class="nk-main ">
            <?php include_once APPPATH . 'views/school/includes/sidebar.php'; ?>

            <div class="nk-wrap ">
               
            <?php include_once APPPATH . 'views/school/includes/navbar.php'; ?>

               <div class="nk-content nk-content-fluid">
                  <div class="container-xl wide-lg">
                    <div class="nk-content-body">
                        <div class="components-preview wide-md mx-auto"> 
                              <div class="nk-block nk-block-lg">
                                  <div class="nk-block-head mb-3">
                                      <div class="nk-block-head-content">
                                            <div class="d-flex justify-content-between align-items-center">
                                            <div class="license_type_title">
                                            <h4 class="title nk-block-title"><span class="exam-criteria">Exam Criteria</span> - </h4>
                                            <ul class="nav nav-tabs mt-n3">
                                              <li class="nav-item">
                                                  <a class="nav-link pe-none">
                                                    <!-- <em class="icon ni ni-book-fill"></em> -->
                                                    <span id="license-name-title" class="license-type">License Type</span>
                                                </a>
                                              </li>
                                          </ul>
                                       </div>
                                            <ul class="nk-block-tools g-3">
                                                <li class="nk-block-tools-opt"><button id="btn-add-exam-criteria" class="btn btn-primary add">Add</button></li>
                                               <li class="nk-block-tools-opt"><a href="<?php echo base_url('school/license');?>" class="btn btn-primary back-btn"  aria-expanded="false">Back</a></li>
                                            </ul>
                                            </div>
                                      </div>
                                  </div>
                                  <div class="card card-bordered card-preview">
                                      <div class="card-inner">
                                          <!-- <ul class="nav nav-tabs mt-n3">
                                              <li class="nav-item">
                                                  <a class="nav-link pe-none">
                                                    <em class="icon ni ni-book-fill"></em>
                                                    <span id="license-name-title">License Type</span>
                                                </a>
                                              </li>
                                          </ul> -->
                                          <div class="tab-content">
                                                <?php include 'exam_criteria_list.php'; ?>
                                              </div>    
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
               </div>
               
               <?php include_once APPPATH . 'views/school/includes/footer.php'; ?>

            </div>
         </div>
      </div>

      
       <?php include 'exam_criteria_form.php'; ?>

       <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>
       <script src="<?php echo base_url('assets/js/libs/simplePagination.js'); ?>"></script>
       <script src="<?php echo base_url('assets/js/school/exam_criteria_form.js'); ?>"></script>
       <script src="<?php echo base_url('assets/js/school/exam_criteria.js'); ?>"></script>
       
        <script>
            $(function() {
                async function init() {
                    const auth = await appModule.checkAuth();
                    getExamCriterias();

                    loadFamilyOptionView({
                        familyRowId: familyOptionsLength,
                        familyRemove: false
                    });
                }

                init();
            });

        </script>
   </body>
</html>

