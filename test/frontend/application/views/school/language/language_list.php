
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
                                 <h3 class="nk-block-title page-title language-title languages" style="margin-bottom:-5px;">Language</h3>
                                 <div class="nk-block-des text-soft">
                                    <p id="tot-language"></p>
                                 </div>
                              </div>
                              <div class="nk-block-head-content">
                                 <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                       <!-- <ul class="nk-block-tools g-3">
                                       <li class="nk-block-tools-opt"><a id="btn-add-language" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#addLang"  aria-expanded="false"><em class="icon ni ni-plus"></em></a></li>
                                       
                                       </ul> -->
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
                                                                                 <option value="approved">Approved</option>
                                                                                 <option value="pending">Pending</option>
                                                                                 <option value="rejected">Rejected</option>
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
                                                                     <li><span class="show-label">Show</span></li>
                                                                     <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input checked onchange="languageList(1,{pageSize:10})"  type="checkbox"  class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                     <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input onchange="languageList(1,{pageSize:20})" type="checkbox" class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                     <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input onchange="languageList(1,{pageSize:50})" type="checkbox"  class="radio" value="1" name="fooby[1][]" ></a></li>
                                                                   </ul>
                                                                  <!-- <ul class="link-check">
                                                                     <li><span>Order</span></li>
                                                                     <li class="active"><a href="#">DESC</a></li>
                                                                     <li><a href="#">ASC</a></li>
                                                                  </ul> -->
                                                                  
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
                                       <!-- <form id="studentSearchForm"> -->

                                          <div class="search-content d-flex"> 
                                             <a href="javascript:void(0)" id="reset-search"
                                                class="search-bStudent IDk btn btn-icon toggle-search"
                                                data-target="search">
                                                <em class="icon ni ni-arrow-left"></em>
                                             </a>
                                             <input id='search' type="search" class="form-control border-transparent form-focus-none"
                                                name="q" placeholder="Search...">
                                             <button class="search-submit btn btn-icon">
                                                <em class="icon ni ni-search"></em>
                                             </button>
                                          </div>
                                       <!-- </form> -->

                                    </div>
                                 </div>
                                 </div>
                                 <div class="card-inner p-0" id="languages"></div>
                                 <div class="card-inner" id="languages-pagination"></div>
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

      <div class="modal fade" id="languageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Language</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
               <form  id="languagesForm" class="is-alter">
                  <div class="mb-3">
                     <label for="language-name" class="col-form-label">Language In English:</label>
                     <div class="form-control-wrap">
                        <input type="text" class="form-control" autofocus name="name" id="language-name" data-msg="Language name is required" required/>
                     </div>                     
                  </div>
                  <div class="mb-3">
                     <label for="native-name" class="col-form-label">Language In Native:</label>
                     <input type="text" class="form-control" name="native_name" id="native-name"/>
                  </div>
               </form>
               </div>
               <div class="modal-footer">
               <button  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary" id="btn-language">Add</button>
               </div>
            </div>
         </div>
         </div>

         <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>
         <script src="<?php echo base_url('assets/js/school/language.js'); ?>"></script>
         <script src="<?php echo base_url('assets/js/libs/simplePagination.js'); ?>"></script>
         <script>
            $(function() {
               async function init() {
                  const auth = await appModule.checkAuth();
                  languageList();
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

