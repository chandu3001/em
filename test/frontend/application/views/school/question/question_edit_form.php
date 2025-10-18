<div class="modal fade" tabindex="-1" id="editQuestionModal">

    <div class="modal-dialog modal-md" role="document">

        <div class="modal-content">

            <a class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross-sm"></em></a>

            <div class="modal-body modal-body-md">

                <h5 class="modal-title edit-que">Edit Question</h5>

                <form id="questionPoolEditForm" class="mt-2 is-alter" enctype="multipart/form-data">

                    <div class="row g-gs">

                        <div class="col-12">

                            <div class="form-group">

                                <label class="form-label que-family" for="full-name">Question Group</label>

                                <select id="editfamilySelect" class="form-select" name="family_id">

                                    <option value="">Select Group</option>

                                </select>

                            </div>

                        </div>

                        <div class="row my-4">

                            <div class="col-sm-6">

                                <div class="form-group">

                                    <label class="form-label diff-level" for="full-name">Difficulty Level</label>

                                    <select id="edit_difficulty_level" onchange="showMarks(this, '#edit-marks')"

                                        class="form-select js-select2" name="difficulty_level_id" data-placeholder="Select Difficulty Level">

                                        <option value="">Select Difficulty Level</option>


                                    </select>

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="form-group">

                                    <label class="form-label marks" for="email-address">Mark</label>

                                    <div class="form-control-wrap">

                                        <input required id="edit-marks" type="text" class="form-control" disabled

                                            name="marks">

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-sm-12 mb-3 mt-2">

                            <div class="form-group d-flex align-items-center gap-2">

                                <h5 class="form-label fw-bold mb-0 is-elim-que">Is this an eliminatory question?</h5>

                                <div class="d-flex align-items-center gap-3 py-2">

                                    <div class="form-control-wrap inner d-flex align-items-center gap-1">

                                        <input type="radio" class="" id="edit-yes" value="1" name="eliminatory"

                                            title="If student marks a wrong answer for an eliminatory question then the student will be terminated immediately">

                                        <label class="form-label mb-0 is-yes" for="yes">Yes</label>

                                    </div>

                                    <div class="form-control-wrap inner d-flex align-items-center gap-1">

                                        <input type="radio" class="" id="edit-no" value="0" name="eliminatory">

                                        <label class="form-label mb-0 is-no" for="no">No</label>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-12">

                            <div class="form-group">

                                <label class="form-label question" for="email-address">Question</label>

                                <div class="form-control-wrap">

                                    <textarea required class="form-control" name="question"

                                        id="edit-question"></textarea>

                                </div>

                            </div>

                        </div>

                        <div class="col-12">

                            <div class="form-group">

                                <ul class="custom-control-group g-3 align-center">

                                    <li>

                                        <div class="custom-control custom-control-sm custom-checkbox" style="margin-left:-20px;">

                                            <input type="checkbox"  id="imageCheck" data-target="#edit-question-image"

                                                name="mycheckbox" class="mycheckbox" style="margin-bottom: 10px;" />

                                            <label class="form-label que-img" for="imageCheck" style="padding: 7px;">Question

                                                with Image</label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="custom-control custom-control-sm custom-checkbox"

                                            style="margin-left:-20px;">

                                            <input type="checkbox" id="videoCheck" data-target="#edit-question-video" name="mycheckbox" class="mycheckbox"

                                                style="margin-bottom: 10px;" />

                                            <label class="form-label que-video" for="videoCheck" style="padding: 7px;">Question

                                                with Video</label>

                                        </div>

                                    </li>

                                </ul>

                            </div>

                        </div>



                        <div class="col-12">

                            <div class="d-flex align-items-start">

                                <div class="form-group" id="edit-question-image" style="display:none">

                                    <div class="form-file form-control-wrap inner mb-2">

                                        <input name="editimage" type="file"

                                            data-rule-extensions="jpeg|png|jpg|gif|svg|webp"

                                            data-msg-extensions="Choose image file" data-rule-filesize="2048"

                                            data-msg-filesize="Maximun file size is 2Mb" accept="image/*"

                                            class="form-file-input" id="editimage">

                                        <label class="form-file-label text-truncate" for="editimage">Choose

                                            file</label>

                                    </div>

                                    <div class="mt-2 row">

                                        <div class="col">

                                            <span class="fw-bold">Note:</span><br />

                                        <span class="small text-secondary">Maximum upload size: <span

                                                class="text-muted">2Mb</span></span><br />

                                        <span class="small text-secondary">Allowed Extensions: <span

                                                class="text-muted">jpeg, png, jpg, gif, svg, webp</span></span>

                                        <span class="small text-secondary">Maximum image pixels: <span

                                                class="text-muted">max-width: 273px, max-height: 255px</span></span>

                                        </div>

                                        <div id="previewImg" class="position-relative mb-2 mx-auto col"></div>

                                    </div>

                                </div>

                                

                            </div>

                        </div>

                        <div class="col-12 mb-2">

                            <div class="form-group" id="edit-question-video" style="display:none">

                                <div class="form-file form-control-wrap inner mb-2">

                                    <input name="editvideo" type="file"

                                        class="form-file-input" data-rule-extensions="mp4|mkv|mov"

                                        data-msg-extensions="Choose image file" data-rule-filesize="10240"

                                        data-msg-filesize="Maximun file size is 10Mb" accept="video/*"

                                        id="editvideo">

                                    <label class="form-file-label text-truncate" for="editvideo">Choose file</label>

                                </div>

                                <div class="mt-2 row align-items-center">

                                    <div class="col">

                                        <span class="fw-bold">Note:</span><br />

                                        <span class="small text-secondary">Maximun upload size: 

                                            <span class="text-muted">10Mb</span>

                                        </span><br />

                                        <span class="small text-secondary">Allowed Extensions: 

                                            <span class="text-muted">mp4, mkv, mov</span>

                                        </span>

                                    </div>

                                    <div class="col position-relative" id="videoPrivew">

                                        

                                    </div>

                                </div>

                            </div>

                            <div class="col-12"></div>

                        </div>

                        <div class="row editt" id="options--container">

                            <div class="col-10 options--list">

                                <div id="editOptions" class="form-group">



                                </div>

                            </div>
                            <div class="col-2 text-center mt-auto mb-4" style="margin-bottom: 12px !important;">
                                <a href="javascript:void(0)" class="btn btn-dim btn-primary" style="color: #fff !important; background-color: #0971fe !important;" onclick="addOption()">
                                    <em class="icon ni ni-plus" style="font-size: 10px"></em>
                                </a>

                            </div>

                        </div>

                        <div class="col-12">

                            <ul class="align-center flex-wrap flex-sm-nowrap my-4 gx-4">

                                <li><button class="btn btn-lg btn-primary update-que">Update Question</button></li>

                                <li>

                                    <button type="button" id="editQuestionModal" data-bs-dismiss="modal"

                                        class="btn btn-lg btn-danger cancel">

                                        Cancel</button>

                                </li>

                            </ul>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>