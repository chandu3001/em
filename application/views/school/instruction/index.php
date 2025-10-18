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
                     
                  </div>
               </div>
            </div>
               <?php include_once APPPATH . 'views/school/includes/footer.php'; ?>

         </div>
      </div>
   </div>

    <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>
      <script src="<?php echo base_url('assets/js/libs/simplePagination.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/school/examination.js'); ?>"></script>
    
</body>
</html>