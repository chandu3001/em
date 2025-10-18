<div class="modal fade" tabindex="-1" id="examCriteriaModal">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em
                    class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="modal-title">Exam Criteria</h5>
                <form id="examCriteriaForm" class="gy-3 is-alter">
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="license-name">Licence Type</label>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="license_name" readonly id="license-name" value="Private" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="sublicence">Sub Licence</label>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <select readonly class="form-select" id="sublicence" disabled>
                                        <option value="" >----------</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="total-questions">Total Questions</label>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input name="total_questions" id="total-questions" type="text" class="form-control form-field" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="pass-percentage">Pass percentage</label>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input name="pass_percentage" id="pass-percentage" type="text" class="form-control form-field" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="exam-duration">Duration (HH:MM)</label>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input name="duration" type="text" id="exam-duration" class="form-control form-field" placeholder="HH:MM" required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group"></div>

                    <div class="" id="options--container">
                        <div id="optionList" class="family-options--list row g-3 align-center"></div>
                    </div>

                    <div class="col-12 text-center">
                        <a href="javascript:void(0)" class="btn btn-dim btn-primary btn--action" data-family-option="add">
                            <em class="icon ni ni-plus" style="font-size: 10px"></em>&nbsp; Family</a>
                    </div>

                    <div class="row g-3">
                        <div class="col-lg-7 offset-lg-5">
                            <div class="form-group mt-2" style="float: right;">
                                <button type="submit" class="btn btn-md btn-primary btn--action">Save</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .form-note {
        margin-top: 10px;
    }
    .add-diff-level{
        margin-right: 150px;
    }
</style>