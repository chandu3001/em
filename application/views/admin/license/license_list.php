<style>
   .nk-content-fluid{
         top: 65px;
         position: relative;
        }
         
</style>
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
                     <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                           <div class="nk-block-head-content">
                              <h3 class="nk-block-title page-title license-types" data-translate>License Types</h3>
                              <div class="nk-block-des text-soft">
                                 <!-- <p id="total_license"></p> -->
                              </div>
                           </div>
                           <div class="nk-block-head-content">
                              <div class="toggle-wrap nk-block-tools-toggle">
                                 <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                 <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                       <!-- <li class="nk-block-tools-opt"><a class="btn btn-icon btn-primary"  aria-expanded="false"><em class="icon ni ni-reload"></em></a></li> -->
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
                                              <select id="sort-by" class="form-select form-select-sm js-select2" data-search="off" data-placeholder="Sort By">
                                                   <option value="">Choose</option>
                                                   <option value="3" data-translate>Select All</option>
                                                   <option value="1" data-translate>Ascending</option>
                                                   <option value="2" data-translate>Descending</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                     <div class="card-tools me-n1">
                                       <ul class="btn-toolbar gx-1">
                                          <li><a href="#" class="btn btn-icon search-toggle toggle-search"
                                                data-target="search"><em class="icon ni ni-search"></em></a></li>
                                          <li class="btn-toolbar-sep"></li>
                                          <li>
                                             <div class="toggle-wrap">
                                                <a href="#" class="btn btn-icon btn-trigger toggle"
                                                   data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                <div class="toggle-content" data-content="cardTools">
                                                   <ul class="btn-toolbar gx-1">
                                                      <li class="toggle-close"><a href="#"
                                                            class="btn btn-icon btn-trigger toggle"
                                                            data-target="cardTools"><em
                                                               class="icon ni ni-arrow-left"></em></a></li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle"
                                                               data-bs-toggle="dropdown">
                                                               <div class="dot dot-primary"></div>
                                                               <em class="icon ni ni-filter-alt"></em>
                                                            </a>
                                                            <div
                                                               class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                            <form id="filter-form">
                                                               <div class="dropdown-head">
                                                                  <span class="sub-title dropdown-title filters" data-translate>Filters</span>
                                                                  
                                                               </div>
                                                               <div class="dropdown-body dropdown-body-rg">
                                                                  <div class="row gx-6 gy-3">
                                                                   
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt status-label">Status</label>
                                                                              <select name="status" id="stat"
                                                                                 class="form-select form-select-sm js-select2" data-placeholder="Select Status">
                                                                                 <option value=""></option>
                                                                                 <option value="1" data-translate>Active</option>
                                                                                 <option value="0" data-translate>Inactive</option>
                                                                              </select>
                                                                        </div>
                                                                     </div>

                                                                     <div class="col-12">
                                                                        <div class="form-group"><button type="submit"
                                                                              class="btn btn-secondary apply-btn" data-translate>Apply</button>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="dropdown-foot between">
                                                                  <button type="reset" class="link p-0 text-primary" id="clear-filter" data-translate>Clear Filters</button>
                                                               </div>
                                                            </form>
                                                            </div>
                                                         </div>
                                                      </li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle"
                                                               data-bs-toggle="dropdown"><em
                                                                  class="icon ni ni-setting"></em></a>
                                                            <div
                                                               class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                               <ul class="link-check">
                                                                  <li><span data-translate class="show-label">Show</span></li>
                                                                  <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input checked onchange="getLicenses(1,{pageSize:10})"  type="checkbox"  class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input onchange="getLicenses(1,{pageSize:20})" type="checkbox" class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input onchange="getLicenses(1,{pageSize:50})" type="checkbox"  class="radio" value="1" name="fooby[1][]" ></a></li>
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
                                       <form id="licenseSearchForm">

                                          <div class="search-content d-flex">
                                             <a href="javascript:void(0)" id="search-reset"
                                                class="search-bStudent IDk btn btn-icon toggle-search"
                                                data-target="search">
                                                <em class="icon ni ni-arrow-left"></em>
                                             </a>
                                             <input type="text" class="form-control border-transparent form-focus-none"
                                                name="q" placeholder="Search...">
                                             <button class="search-submit btn btn-icon">
                                                <em class="icon ni ni-search"></em>
                                             </button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                                 <div class="card-inner p-0 text-center">
                                    <h4 class='text-center p-2' id="load-data"></h4>
                                    <div id="licenses-container" class="nk-tb-list nk-tb-ulist">

                                    </div>
                                 </div>
                              <div class="card-inner" id="licenses-pagination"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Footer -->
            <?php include_once APPPATH . 'views/admin/includes/footer.php'; ?>
         </div>
      </div>
   </div>

   <?php include_once APPPATH . 'views/admin/includes/footer-scripts.php'; ?>
   <script src="<?php echo base_url('assets/js/admin/license.js'); ?>"></script>

   <script>
      $(function() {
         async function init() {
            getLicenses();
         }

         init();
      });
   </script>
   
  <script>
   // the selector will match all input controls of type :checkbox
// and attach a click event handler 
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
   </script>
</body>
</html>

