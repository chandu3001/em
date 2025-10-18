

  <?php include_once APPPATH . 'views/school/includes/header.php'; ?>
<style type="text/css">
   .disabled {
    pointer-events:none; 
    opacity:0.6;        
}
.btn-dim.btn-danger {
    color: #fff;
    background-color: #e85347;
    border-color: #e85347;
}
</style>
   <body class="nk-body npc-crypto bg-lighter has-sidebar " >
      <!-- Preloader -->
<!--<div id="preloader">
  <div id="status">&nbsp;</div>
</div>-->

<!--<div class="loader"><div class="pair p1"><div class="dot dot-1"></div><div class="dot dot-2"></div></div><div class="pair p2"><div class="dot dot-1"></div><div class="dot dot-2"></div></div></div>-->


<!-- Preloader -->
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
                                 <h3 class="nk-block-title page-title ftitle" style="margin-bottom:-5px;">Groups</h3>
                                 <div class="nk-block-des text-soft">
                                    <p id="total_families"></p>
                                 </div>
                              </div>
                              <div class="nk-block-head-content">
                                 <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                       <ul class="nk-block-tools g-3">
                                          <li class="nk-block-tools-opt">
                                             <button class="btn btn-icon btn-primary" title="Add Group" id="btn-add-family" ><em class="icon ni ni-plus"></em></button>
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
                                                <select id="sort-by" class="form-select form-select-sm js-select2" data-search="off" data-placeholder="Sort By">
                                                   <option value="">Choose</option>
                                                   <option value="0">Select All</option>
                                                   <option value="1">Ascending</option>
                                                   <option value="2">Descending</option>
                                                </select>
                                             </div>
                                             <!-- <div class="btn-wrap">
                                                <span class="d-none d-md-block">
                                                   <button class="btn btn-dim btn-outline-light disabled">Apply</button>
                                                </span>
                                                <span class="d-md-none">
                                                   <button class="btn btn-dim btn-outline-light btn-icon disabled">
                                                      <em class="icon ni ni-arrow-right"></em></button>
                                                   </span>
                                             </div> -->
                                          </div>
                                       </div>
                                       <div class="card-tools me-n1">
                                       <ul class="btn-toolbar gx-1">
                                          <li><a href="javascript:void(0)"
                                                class="btn btn-icon search-toggle toggle-search"
                                                data-target="search"><em class="icon ni ni-search"></em></a></li>
                                          <li class="btn-toolbar-sep"></li>
                                          <li>
                                             <div class="toggle-wrap">
                                                <a href="javascript:void(0)" class="btn btn-icon btn-trigger toggle"
                                                   data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                <div class="toggle-content" data-content="cardTools">
                                                   <ul class="btn-toolbar gx-1">
                                                      <li class="toggle-close"><a href="javascript:void(0)"
                                                            class="btn btn-icon btn-trigger toggle"
                                                            data-target="cardTools"><em
                                                               class="icon ni ni-arrow-left"></em></a></li>
                                                       <li>
                                                         <div class="dropdown">
                                                            <a href="javascript:void(0)" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                                               <div class="dot dot-primary"></div>
                                                               <em class="icon ni ni-filter-alt"></em>
                                                            </a>
                                                            <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                               <div class="dropdown-head">
                                                                  <span class="sub-title dropdown-title filter-label">Filters</span>
                                                                  <!-- <div class="dropdown"><a href="javascript:void(0)" class="btn btn-sm btn-icon"><em class="icon ni ni-more-h"></em></a></div> -->
                                                               </div>
                                                               <div class="dropdown-body dropdown-body-rg">
                                                                  <form id="filter-form">
                                                                     <div class="row gx-6 gy-3">
                                                                     
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                          <label class="overline-title overline-title-alt status-label">Status</label>
                                                                           <select name="status" id="status" class="form-select form-select-sm js-select2" data-placeholder="Select Status">
                                                                              <option value=""></option>
                                                                              <option value="1" data-translate>Active</option>
                                                                              <option value="0" data-translate>Inactive</option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                     
                                                                     <div class="col-12">
                                                                        <div class="form-group"><button type="submit" class="btn btn-secondary apply-btn">Apply</button></div>
                                                                     </div>
                                                                  </div>
                                                                  </form>
                                                               </div>
                                                               <div class="dropdown-foot between"><a class="clickable" href="javascript:void(0)" id="clear-filter" data-translate>Clear Filters</a>
                                                            </div>
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
                                                                  <li><span class="show-label">Show</span></li>
                                                               
                                                                   <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input checked   type="checkbox"  class="radio" value="1" name="fooby[1][]" id="radio1"  ></a></li>
                                                                     <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input id="radio2"  type="checkbox" class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                     <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input type="checkbox" id="radio3" class="radio" value="1" name="fooby[1][]" ></a></li>
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
                                       <form id="searchForm" class="w-100">
                                       <div class="card-body">
                                          <div class="search-content">
                                          <a href="javascript:void(0)" id="reset-search" class="search-back btn btn-icon toggle-search" data-target="search">
                                             <em class="icon ni ni-arrow-left"></em>
                                          </a>
                                          <input type="search" id="search" name="q" class="form-control border-transparent form-focus-none" placeholder="Search">
                                          <button class="search-submit btn btn-icon"><em class="icon ni ni-search "></em></button>
                                       </div>
                                       </form>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="card-inner p-0" id="families1">
                                    <h4 class='text-center p-2' id="load-data"></h4>
                                    <div class="nk-tb-list nk-tb-ulist" id="families">
                                          
                                    </div>
                                 </div>

                                 <div class="card-inner" id="families-pagination"></div>
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

      <div class="modal fade" id="familyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title family" id="exampleModalLabel">Group</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="familyForm" class="is-alter">
                  <div class="modal-body">
                     <div class="form-group mb-3">
                        <label for="fam-name" class="col-form-label family-name">Group Name:</label>
                        <div class="form-control-wrap">
                           <input type="text" name='family_name' class="form-control" id="fam-name" required data-mg="Name is required" autofocus>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Add</button>
                     <button type="button" class="btn btn-danger cancel" data-bs-dismiss="modal">Cancel</button>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>
      <script src="<?php echo base_url('assets/js/libs/simplePagination.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/school/family.js'); ?>"></script>

      <script>
         $(function() {
            async function init() {
               const auth = await appModule.checkAuth();
               getFamilies();
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

