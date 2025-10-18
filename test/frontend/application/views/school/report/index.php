

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
                     <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                           <div class="nk-block-head-content">
                              <h3 class="nk-block-title page-title">Reports</h3>
                              <div class="nk-block-des text-soft">
                                 <!-- <p id="total_rows"></p> -->
                              </div>
                           </div>
                           <div class="nk-block-head-content">
                              <div class="toggle-wrap nk-block-tools-toggle">
                                 <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                 <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                       <li class="nk-block-tools-opt">
                                          <button class="btn btn-icon btn-primary" title="Add Family" id="btn-add-family" ><em class="icon ni ni-plus"></em></button>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="nk-block">
                        <div class="card card-bordered card-stretch">
                           <div class="card-inner-group">
                              <div class="card-inner position-relative card-tools-toggle">
                                 <div class="card-title-group">
                                    <div class="card-tools">
                                       <div class="form-inline flex-nowrap gx-3">
                                          <div class="form-wrap w-150px">
                                             <select class="form-select form-select-sm js-select" data-search="off" data-placeholder="Sort By">
                                                <option value="">Choose</option>
                                                <option value="desc">Ascending</option>
                                                <option value="email">Descending</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="card-tools me-n1">
                                       <ul class="btn-toolbar gx-1">
                                          <li><a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a></li>
                                          <li class="btn-toolbar-sep"></li>
                                          <li>
                                             <div class="toggle-wrap">
                                                <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                <div class="toggle-content" data-content="cardTools">
                                                   <ul class="btn-toolbar gx-1">
                                                      <li class="toggle-close"><a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a></li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle d-none" data-bs-toggle="dropdown">
                                                               <div class="dot dot-primary"></div>
                                                               <em class="icon ni ni-filter-alt"></em>
                                                            </a>
                                                            <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                               <div class="dropdown-head">
                                                                  <span class="sub-title dropdown-title">Filter Borrower</span>
                                                                  <div class="dropdown"><a href="#" class="btn btn-sm btn-icon"><em class="icon ni ni-more-h"></em></a></div>
                                                               </div>
                                                               <div class="dropdown-body dropdown-body-rg">
                                                                  <div class="row gx-6 gy-3">
                                                                     <div class="col-12">
                                                                        <div class="form-group">
                                                                           <label class="overline-title overline-title-alt">Category</label>
                                                                           <select class="form-select form-select-sm js-select2">
                                                                              <option value="education">Education</option>
                                                                              <option value="emergency">Emergency</option>
                                                                              <option value="daily">Daily</option>
                                                                              <option value="kibaba">Kibaba</option>
                                                                              <option value="bilashi">Bilashi</option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label class="overline-title overline-title-alt">Interest</label>
                                                                           <select class="form-select form-select-sm js-select2">
                                                                              <option value="5">5%</option>
                                                                              <option value="7">7%</option>
                                                                              <option value="10">10%</option>
                                                                              <option value="15">15%</option>
                                                                              <option value="20">20%</option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label class="overline-title overline-title-alt">Status</label>
                                                                           <select class="form-select form-select-sm js-select2">
                                                                              <option value="1">Active</option>
                                                                              <option value="0">In Active</option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-12">
                                                                        <div class="form-group"><button type="button" class="btn btn-secondary">Filter</button></div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="dropdown-foot between"><a class="clickable" href="#">Reset Filter</a><a href="#">Save Filter</a></div>
                                                            </div>
                                                         </div>
                                                      </li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-setting"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                               <ul class="link-check">
                                                                  <li><span>Show</span></li>
                                                                  <li class="active"><a href="#">10</a></li>
                                                                  <li><a href="#">20</a></li>
                                                                  <li><a href="#">50</a></li>
                                                               </ul>
                                                               <ul class="link-check">
                                                                  <li><span>Order</span></li>
                                                                  <li class="active"><a href="#">DESC</a></li>
                                                                  <li><a href="#">ASC</a></li>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="card-search search-wrap" data-search="search">
                                    <div class="card-body">
                                       <div class="search-content"><a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a><input type="text" class="form-control border-transparent form-focus-none" placeholder="Search"><button class="search-submit btn btn-icon"><em class="icon ni ni-search "></em></button></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-inner p-0" id="list"></div>
                              <div class="card-inner" id="report-pagination"></div>
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

   <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>
   <script src="<?php echo base_url('assets/js/libs/simplePagination.js'); ?>"></script>

   <script>
      $(function() {
         async function init() {
            const auth = await appModule.checkAuth();
         }

         init();
      });
      let page = 1;
      
      function getReportList(pageNumber = page, options= {})
      {
         let params = '';

         showLoader({
            title: "Please Wait",
            // text: "Fetching..."
         })
         $.ajax({
            type: "GET",
            url: api_base_url+"reports",
            data: params
         }).done(({status, data, message})=>{
            if(status)
            {
               
            }
         })
      }
   </script>
</body>
</html>

