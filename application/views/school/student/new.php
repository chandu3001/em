<style>
   #student_center{
      padding-right: 57px;
      text-align:center !important;
   }
   
</style>
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg" style="right: 0px !important; position:relative;">
        <div class="nk-content-body">

            <div class="nk-block">
                <div class="card card-bordered card-stretch">
                    <div class="card-inner-group">
                        <div class="card-inner position-relative card-tools-toggle">
                            <div class="card-title-group">
                                <div class="card-tools">
                                    <div class="form-inline flex-nowrap gx-3">
                                        <div class="form-wrap w-150px">
                                             <select id="sort_by_exam"
                                                class="form-select form-select-sm js-select2 sort-by" onchange="GetExamResultLists(1,{sortBy:$(this).val()})"
                                               data-placeholder="Sort By">
                                                <option value=""></option>
                                                <option value="0">Select All</option>
                                                <option value="1">Ascending</option>
                                                <option value="2">Descending</option>
                                             </select>
                                        </div>
                                      
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
                                                            <a class="btn btn-trigger btn-icon dropdown-toggle"
                                                               data-bs-toggle="dropdown">
                                                               <div class="dot dot-primary"></div>
                                                               <em class="icon ni ni-filter-alt"></em>
                                                            </a>

                                                            <div
                                                               class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                               <form id="exam-filter-form">
                                                                  <div class="dropdown-head">
                                                                     <span
                                                                        class="sub-title dropdown-title filter-label">Filters</span>
                                                                     <!-- <div class="dropdown"><a href="javascript:void(0)"
                                                                           class="btn btn-sm btn-icon"><em
                                                                              class="icon ni ni-more-h"></em></a></div> -->
                                                                  </div>
                                                                  <div class="dropdown-body dropdown-body-rg">
                                                                     <div class="row gx-6 gy-3">
                                                                     
                                                                        <div class="col-6">
                                                                           <div class="form-group">
                                                                              <label
                                                                                 class="overline-title overline-title-alt result">Result</label>
                                                                              <select name="result" id="sel-res" data-placeholder="Select Result"
                                                                                 class="form-select form-select-sm js-select2">
                                                                                 <option value=""></option>

                                                                                 <option value="pass">Pass</option>
                                                                                 <option value="fail">Fail</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                       
                                                                        <div class="col-12">
                                                                           <div class="form-group"><button type="submit"
                                                                                 class="btn btn-secondary apply-btn">Apply</button>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="dropdown-foot between">
                                                                  <button type='reset'
                                                                        class="clickable bg-transparent border-0 text-primary" id="clear-filter"
                                                                        onclick="GetExamResultLists(1, {filter: 'clearFilter'})">Clear
                                                                        Filters</button>
                                                                     
                                                                        <!-- <a href="javascript:void(0)">Save Filters</a> -->
                                                                     </div>
                                                               </form>
                                                            </div>

                                                         </div>
                                                      </li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="javascript:void(0)"
                                                               class="btn btn-trigger btn-icon dropdown-toggle"
                                                               data-bs-toggle="dropdown"><em
                                                                  class="icon ni ni-setting"></em></a>
                                                            <div
                                                               class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                               <ul class="link-check">
                                                                  <li><span class="show-label">Show</span></li>
                                                                   <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input checked onchange="GetExamResultLists(1,{pageSize:10})"  type="checkbox"  class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input onchange="GetExamResultLists(1,{pageSize:20})" type="checkbox" class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input onchange="GetExamResultLists(1,{pageSize:50})" type="checkbox"  class="radio" value="1" name="fooby[1][]" ></a></li>
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
                                       <form id="examSearchForm">

                                          <div class="search-content d-flex">
                                             <a href="javascript:void(0)"
                                                class="search-bk btn btn-icon toggle-search"
                                                data-target="search" id="search-reset">
                                                <em class="icon ni ni-arrow-left"></em>
                                             </a>
                                             <input type="search" class="form-control border-transparent form-focus-none"
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

                            <div class="nk-tb-list nk-tb-ulist" id="examination_results" >
                                
                            </div>
                        </div>
                        <div class="card-inner" id="exam-list-pagination">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
