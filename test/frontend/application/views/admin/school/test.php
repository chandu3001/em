    <?php include_once APPPATH . 'views/admin/includes/header.php'; ?>


    <link id="skin-default" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css">

    <link id="skin-default" rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">



        <?php include_once APPPATH . 'views/admin/includes/sidebar.php'; ?>

         <div class="nk-wrap ">

            <?php include_once APPPATH . 'views/admin/includes/navbar.php'; ?>

<div class="card card-bordered card-preview">
    <div class="card-inner">
        
             
                    <label class="form-label">Select2 With Search</label>
                    <div class="form-control-wrap" data-select2-id="37">
                        <select class="form-select js-select2 select2-hidden-accessible" data-search="on" data-select2-id="6" tabindex="-1" aria-hidden="true">
                            <option value="default_option" data-select2-id="8">Default Option</option>
                            <option value="option_select_name" data-select2-id="40">Option select name</option>
                            <option value="option_select_name" data-select2-id="41">Option select name</option>
                        </select>
                       
                    </div>
           
           
    </div>
</div>

<?php include_once APPPATH . 'views/admin/includes/footer-scripts.php'; ?>




