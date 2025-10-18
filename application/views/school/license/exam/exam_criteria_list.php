         
   <style>
      .components-preview .card-preview > .card-inner, .container-xl{
         padding:0px !important;
      }
      .nk-content{
         background:none !important;
         padding:0px !important;
      }
      .card-bordered{
         box-shadow:none !important;
      }
      .nk-header-fixed + .nk-content{
         margin-top: 100px;
      }
      .card{
         border:none !important;
      }
      @media (min-width: 992px){
     .wide-md {
         max-width: 985px !important;
      }
      }
   </style>
   <div class="nk-content nk-content-fluid">
      <div class="container-xl wide-lg">
         <div class="nk-content-body">
            
            <div class="nk-block">
               <div class="card card-bordered card-stretch">
                  <div class="card-inner-group">
                     <div class="card-inner position-relative card-tools-toggle">
                        <div class="card-title-group">
                           <div class="card-tools">
                              <div class="form-inline flex-nowrap gx-3">
                                 <div class="form-wrap w-150px border" style="border:none !important;">
                                    <select name='sortby' class="form-select form-select-sm js-select2" id="sortBy" data-search="off" data-placeholder="Sort By">
                                       <option value="">Choose</option>
                                       <option value="1">Ascending</option>
                                       <option value="2">Descending</option>
                                       
                                    </select>
                                 </div>
                                 <div class="btn-wrap">
                                    <!-- <span class="d-none d-md-block">
                                       <button class="btn btn-dim btn-outline-light disabled">Apply</button>
                                    </span> -->
                                    <span class="d-md-none">
                                       <button class="btn btn-dim btn-outline-light btn-icon disabled">
                                          <em class="icon ni ni-arrow-right"></em
                                          ></button>
                                    </span>
                                 </div>
                              </div>
                           </div>
                           <div class="card-tools me-n1">
                              <ul class="btn-toolbar gx-1">
                                 <li><a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search "></em></a></li>
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
                                                                  <label class="overline-title overline-title-alt status-label">Status</label>
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
                                                      <div class="dropdown-foot between"><a class="clickable" href="#">Clear Filter</a>
                                                      <!-- <a href="#">Save Filter</a> -->
                                                   </div>
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="dropdown">
                                                   <a href="#"  class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-setting"></em></a>
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
                              <div class="search-content"><a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a><input type="text" class="form-control border-transparent form-focus-none" placeholder="Search" style="border:none !important;"><button class="search-submit btn btn-icon"><em class="icon ni ni-search "></em></button></div>
                           </div>
                        </div>
                     </div>
                      <div class="card-inner p-0" id="">
                        <h4 class='text-center p-2' id="load-data"></h4>
                        <div class="nk-tb-list nk-tb-ulist" id="exam-criterias-container">
                              
                        </div>
                     </div>
                     <div class="card-inner" id="exam-criterias-pagiantion"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
  
   <?php include 'exam_criteria_details.php'; ?>
   <?php include 'clone.php'; ?>
