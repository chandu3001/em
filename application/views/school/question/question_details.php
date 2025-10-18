      <div class="modal fade" tabindex="-1" id="view-question">
         <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
               <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross-sm"></em></a>
               <div class="modal-body modal-body-md">
                  <h5 class="modal-title">Question Details</h5>
                  <form action="#" class="mt-2">
                     <div class="row g-gs">
                        
                        <div class="col-12">
                           <div class="form-group">
                             <label class="form-label que-family" for="full-name">Question Family</label>
                               <select class="form-select js-select2 select2-hidden-accessible disable" data-search="on" data-select2-id="6" tabindex="-1" aria-hidden="true" name="family">
                                   <option value="default_option" data-select2-id="8">Default Option</option>
                                   <option value="option_select_name" data-select2-id="54">Option select name</option>
                                   <option value="option_select_name" data-select2-id="55">Option select name</option>
                               </select>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                                <label class="form-label" for="email-address">Question</label>
                                 <div class="form-control-wrap">
                                    <textarea class="form-control disable" name="question"></textarea> 
                                 </div>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <ul class="custom-control-group g-3 align-center">
                                <li>
                                  <div class="custom-control custom-control-sm custom-checkbox" style="margin-left:-20px;">
                                    <input type="checkbox" name="mycheckbox" class="mycheckbox"  style="margin-bottom: 10px;" />
                                      <label class="form-label" style="padding: 7px;">Question Image</label>
                                      <input type="checkbox" name="mycheckbox" class="mycheckbox"  style="margin-bottom: 10px;" />
                                      <label class="form-label" style="padding: 7px;">Question Video</label>
                                   </div>
                                </li>
                               
                             </ul>
                           </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group" id="question-image" style="display:none">
                               <div class="form-file">
                                    <input name="question_img" type="file" class="form-file-input disable" id="customFile">
                                    <label class="form-file-label" for="customFile">Choose file</label>
                                </div>
                           </div>
                           <div class="col-12"></div>
                        </div>


                        <div class="row" id="options--container">
                            <div class="col-12 options--list">
                            <div class="form-group">
                                 <label class="form-label" for="full-name">Options</label>
                                 <div class="form-control-wrap col-md-10">
                                    <input type="text" class="form-control question--choice disable" name="options[1]" data-optionz="1"> 
                                    <div class="checkbox" style="float: right;margin-top: -34px;margin-right: -90px;">
                                        <input type="radio" name="correct" style="" />
                                        <label class="form-label" style="padding: 7px;">Correct</label>
                                    </div>
                                 </div>
                                 <br>
                                 <div class="form-control-wrap col-md-10">
                                    <input type="text" class="form-control question--choice disable" name="options[2]" data-optionz="2"> 
                                    <div class="checkbox" style="float: right;margin-top: -34px;margin-right: -90px;">
                                        <input type="radio" name="correct" style="" />
                                        <label class="form-label" style="padding: 7px;">Correct</label>
                                    </div>
                                 </div>
                            </div>
                         </div>
                        </div>

                        <div class="col-12 text-center">
                            <a href="javascript:void(0)" data-optionz="add" class="btn btn-dim btn-primary" id="btnAdd"> 
                                <em class="icon ni ni-plus" style="font-size: 10px"></em>&nbsp; Options</a>
                        </div>

                       <div class="row gy-4">
                            <div class="col-sm-6">
                                <div class="form-group">
                                     <label class="form-label" for="email-address">Mark</label>
                                     <div class="form-control-wrap">
                                        <input type="text" class="form-control disable" name="mark"></textarea> 
                                     </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Difficulty Level</label>
                                    <select class="form-select js-select2 select2-hidden-accessible disable" data-search="on" data-select2-id="6" tabindex="-1" aria-hidden="true" name="family">
                                        <option value="default_option" data-select2-id="8">Default Option</option>
                                        <option value="option_select_name" data-select2-id="54">High</option>
                                        <option value="option_select_name" data-select2-id="55">Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                           <div class="form-group">
                               <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input disable" id="customCheck1"><label class="custom-control-label" for="customCheck1">Eliminatory Question</label></div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                           <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                              <li><a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a></li>
                           </ul>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>