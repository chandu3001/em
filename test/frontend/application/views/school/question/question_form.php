<style>
   .btn-dim.btn-primary {
      color: #fff;
      background-color: #0971fe;
      border-color: #0971fe;
   }
</style>
<div class="modal fade" tabindex="-1" id="addQuestionModal">
   <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
         <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross-sm"></em></a>
         <div class="modal-body modal-body-md">
            <h5 class="modal-title add-que">Add Question</h5>
            <span id='defaultLang' class=""></span>

            <form id="questionPoolAddForm" action="add-question-pool" method="post" class="mt-2 is-alter"
               enctype="multipart/form-data">
               <div class="row g-gs">

                  <div class="col-12 mb-2" style="margin-bottom: 20px !important;">
                     <div class="form-group">
                        <label class="form-label que-family" for="full-name">Question Group</label>
                        <div class="form-control-wrap inner">
                           <select id="familySelect" class="form-select" data-placeholder="Select Group"
                              name="family_id" required data-msg="Group is required">
                              <option value="">Select Group</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="form-label diff-level" for="full-name">Difficulty Level</label>
                           <div class="form-control-wrap inner">
                              <select id="difficulty_level" required data-msg="Difficulty Level is required"
                                 onchange="showMarks(this,'#marks')" class="form-control"
                                 data-placeholder="Select Difficulty Level" name="difficulty_level_id">
                                 <option value="">Select Difficulty Level</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="form-label marks" for="email-address">Mark</label>
                           <div class="form-control-wrap">
                              <input required id="marks" type="text" class="form-control" disabled name="marks">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12 mb-3 mt-2">
                     <div class="form-group d-flex align-items-center gap-2">
                        <h5 class="form-label fw-bold mb-0 is-elim-que">Is this an eliminatory question?</h5>
                        <div class="d-flex align-items-center gap-3 py-2">
                           <div class="form-control-wrap inner d-flex align-items-center gap-1">
                              <input type="radio" class="" id="yes" value="1" name="eliminatory"
                                 title="If student marks a wrong answer for an eliminatory question then the student will be terminated immediately">
                              <label class="form-label mb-0 is-yes" for="yes">Yes</label>
                           </div>
                           <div class="form-control-wrap inner d-flex align-items-center gap-1">
                              <input type="radio" class="" id="no" value="0" name="eliminatory">
                              <label class="form-label mb-0 is-no" for="no">No</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 mb-2">
                     <div class="form-group">
                        <label class="form-label question" for="email-address">Question</label>
                        <div class="form-control-wrap">
                           <textarea required data-msg="Question is required" class="form-control" name="question"
                              id="question" style="height:auto; min-height:0px !important;"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 mb-2" style="margin-bottom:0 !important;">
                     <div class="form-group">
                        <ul class="custom-control-group g-3 align-center">
                           <li>
                              <div class="custom-control custom-control-sm custom-checkbox">
                                 <input type="checkbox" name="mycheckbox" data-target="#question-image"
                                    class="mycheckbox" id="option-question-image" style="margin-bottom: 10px;" />
                                 <label class="form-label que-img" for="option-question-image"
                                    style="padding: 7px;">Question
                                    with Image</label>
                              </div>
                           </li>
                           <li>
                              <div class="custom-control custom-control-sm custom-checkbox">
                                 <input type="checkbox" name="mycheckbox" class="mycheckbox" id="option-question-video"
                                    data-target="#question-video" style="margin-bottom: 10px;" />
                                 <label class="form-label que-video" for="option-question-video"
                                    style="padding: 7px;">Question
                                    with Video</label>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-12 mb-2" style="margin-bottom:0 !important;">
                     <div class="form-group" id="question-image" style="display:none">
                        <div class="form-file form-control-wrap inner mb-2">
                           <input name="image" required data-msg-required="Image is required" type="file"
                              class="form-file-input drop-zone__input" data-rule-extensions="jpeg|png|jpg|gif|svg|webp"
                              data-msg-extensions="Choose image file" data-rule-filesize="2048"
                              data-msg-filesize="Maximun file size is 2Mb" accept="image/*" id="image">
                           <label class="form-file-label text-truncate" for="image">Choose file</label>
                        </div>
                        <div class="mt-2">
                           <span class="fw-bold">Note:</span><br />
                           <span class="small text-secondary">Maximum upload size: <span
                                 class="text-muted">2Mb</span></span><br />
                           <span class="small text-secondary">Allowed Extensions: <span class="text-muted">jpeg, png,
                                 jpg, gif,
                                 svg, webp</span></span></br />
                           <span class="small text-secondary">Maximum image pixels: <span class="text-muted">max-width:
                                 273px, max-height: 255px</span></span>
                        </div>
                     </div>
                     <div class="col-12"></div>
                  </div>
                  <div class="col-12 mb-2" style="margin-bottom:0 !important;">
                     <div class="form-group" id="question-video" style="display:none">
                        <div class="form-file form-control-wrap inner mb-2">
                           <input name="video" required data-msg-required="Video is required" type="file"
                              class="form-file-input" data-rule-extensions="mp4|mkv|mov"
                              data-msg-extensions="Choose image file" data-rule-filesize="10240"
                              data-msg-filesize="Maximun file size is 10Mb" accept="video/*" id="editvideo">
                           <label class="form-file-label text-truncate" for="video">Choose file</label>
                        </div>
                        <div class="mt-2">
                           <span class="fw-bold">Note:</span><br />
                           <span class="small text-secondary">Maximun upload size: <span
                                 class="text-muted">10Mb</span></span><br />
                           <span class="small text-secondary">Allowed Extensions: <span class="text-muted">mp4, mkv,
                                 mov</span></span>
                        </div>
                     </div>
                     <div class="col-12"></div>
                  </div>

                  <div class="row mb-2" id="options--container">
                     <div class="col-12 options--list">
                        <label class="form-label answers" for="full-name">Answers</label>
                        <div class="row">
                           <div class="col-12 option-div mb-2 adding_answer_question">
                              <div class="row">
                                 <div class="col-9">
                                    <div class="form-control-wrap">
                                       <input required data-msg="This field is required" type="text"
                                          class="form-control question--choice" name="options[1]" data-optionz="1">
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="form-control-wrap inner">
                                       <div class="form-check form-control checkbox border-0" id="answer_checkbox"
                                          style="margin-top:7px !important">
                                          <input type="radio" name="correct" class="form-check-input"
                                             id="option1-answer" value="correct" required
                                             data-msg="Choose correct answer" />
                                          <label class="form-check-label correct" for="option1-answer">Correct</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 option-div mb-2">
                              <div class="row">
                                 <div class="col-9">
                                    <div class="form-control-wrap">
                                       <input required data-msg="This field is required" type="text"
                                          class="form-control question--choice" name="options[2]" data-optionz="2">
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="form-control-wrap">
                                       <div class="form-check checkbox" style="margin-top:7px !important">
                                          <input type="radio" name="correct" class="form-check-input"
                                             id="option2-answer" value="correct" value="correct" required
                                             data-msg="Choose correct answer" />
                                          <label class="form-check-label correct" for="option2-answer">Correct</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-9 d-flex align-items-center" style='gap:.5rem'>
                        <input type="checkbox" value='1' name='afta' id='afta'>
                        <label for="afta">All of the above</label>
                     </div>
                     <div id='aftaOption' class="col-3 d-flex align-items-center d-none">
                        <div class="form-control-wrap inner">
                           <div class="form-check form-control checkbox border-0" id="answer_checkbox"
                              style="margin-top:7px !important">
                              <input type="radio" name="correct" class="form-check-input" id="optionafta-answer"
                                 value="correct" required data-msg="Choose correct answer" />
                              <label class="form-check-label correct" for="optionafta-answer">Correct</label>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-12 text-center mb-2">
                     <a href="javascript:void(0)" data-optionz="add" class="btn btn-dim btn-primary" id="btnAdd"
                        style="float: right;bottom: 75px; height: 30px;width: 35px;">
                        <em class="icon ni ni-plus" style="font-size: 10px; margin-left: -5px;"></em>&nbsp;
                        <!-- Answers -->
                     </a>
                  </div>
                  <div class="col-12 mt-2">
                     <ul class="align-center flex-wrap flex-sm-nowrap gx-4 mb-2" style="margin-top: -2.75rem;">
                        <li><button class="btn btn-lg btn-primary add-que">Add Question</button></li>
                        <li>
                           <button id="closeModal" type="button" data-bs-dismiss="modal"
                              class="btn btn-lg btn-danger cancel">Cancel</button>
                        </li>
                     </ul>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>