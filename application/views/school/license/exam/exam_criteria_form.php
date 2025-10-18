<style>
    .difficulty__field {
        margin-top: 30px;
        width: 100%;
    }

    .field__level {
        width: 225px;
    }

    .question__level {
        width: 189px;
    }

    .field_difficulty input {
        height: 36px;
        margin-bottom: 15px;
        border-radius: 4px;

    }

    .field_difficulty input::placeholder {
        padding-left: 0px !important;
    }

    .field_difficulty input:focus {
        border-color: #0971fe;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgb(85 155 251 / 25%);
    }

    .field_difficulty input::placeholder {
        color: #b8c8e4;
        font-size: 13px;
        padding-left: 15px;
    }

    .field_difficulty .remove_difficultylevel {
        width: 36px;
        height: 31px;
        background-color: #0971fe;
        color: #fff;
        border-radius: 4px;
        border: none;
    }

    .difficulty__level {
        font-weight: bold;
        color: #344357;
        width: 100%;
        font-size: 17px !important;
        margin-bottom: 16px;
    }

    #formid12 {
        background: #f5f6fa;
    }

    .diff_questions {
        font-size: 12px;
        color: #8094ae;
        font-style: italic;
        display: block;
    }

    .back-arrow {
        width: 40px;
        height: 40px;
        border: 0;
        margin: 6px;
        background-size: cover !important;
        background: url(<?php echo base_url("assets/images/back-arrow.svg") ?>);
    }

    #hh-error {
        position: relative;
        left: 107px;
        color: #fff;
        font-size: 11px;
        line-height: 1;
        bottom: calc(100% + 4px);
        background: #ed756b;
        padding: 0.3rem 0.5rem;
        z-index: 1;
        border-radius: 3px;
        white-space: nowrap;
        top: -33px;
        font-style: italic;
    }

    #mm-error {
        display: none !important;
    }

    .Elementary_heading {
        font-size: 17px !important;
        font-weight: bold;
    }

    .is-alter .form-control~.invalid {
        bottom: calc(100% + 2px) !important;
    }

    .text-end {
        text-align: unset !important;
    }

    #optionList {
        background: #f5f6fa;
    }

    .form-control:focus,
    .dual-listbox .dual-listbox__search:focus,
    div.dataTables_wrapper div.dataTables_filter input:focus {
        border-color: lightgray;
    }
    .difficulty-total-questions {
    padding: 0 1rem !important;
}
#available_elimentary_questions{
    padding-top:0px !important;
}

</style>
<div class="modal fade" tabindex="-1" id="examCriteriaModal">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <button id="backBtn" class="back-arrow d-none" title="back"></button>
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em
                    class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-sm">
                <h5 class="modal-title exam-criteria">Exam Criteria</h5>
                <form id="examCriteriaForm" class="gy-3 is-alter">
                    <div id="saved__criteria">
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label license-type" for="license-name">License Type</label>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="licence_id" readonly
                                            id="license-name" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label sub-name" for="sublicence">Sub License</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select name="sub_licence_id" class="form-control js-select2"
                                            data-placeholder="Select Sub License Type" id="sublicence"
                                            aria-describedby="sublicence-error">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 align-center">
                            <div class="col-lg-5 mt-2">
                                <div class="form-group">
                                    <label class="form-label tot-questions mb-0" for="total-questions">Total
                                        Questions</label>
                                    <div class="text-sm exc-que" style="font-size: 12px;">Note:- Excluding Eliminatory Questions
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 mt-2">
                                <div class="form-group">
                                    <div class="form-control-wrap d-flex align-items-center border">
                                        <input name="total_questions" min="1" id="total-questions" type="number"
                                            class="form-control form-field border-0 w-75" required />
                                        <div class="btn-light btn rounded-0 w-25"><span>Nos</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5 mt-1">
                                <div class="form-group">
                                    <label class="form-label pass-precent" for="pass-percentage">Pass Percentage</label>
                                </div>
                            </div>
                            <div class="col-lg-7 mt-1">
                                <div class="form-group">
                                    <div class="form-control-wrap d-flex align-items-center border">
                                        <input name="pass_percentage" id="pass-percentage" type="number"
                                            class="form-control form-field border-0 w-75" required min="1" max="100" />
                                        <div class="btn-light btn rounded-0 fw-bolder w-25">
                                            <span>%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label durations" for="exam-duration">Duration (HH:MM)</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap contia">
                                        <div class="timepicker" dir="ltr">
                                            <input type="text" id="hh" name="hh" class="hh N duration-exam"
                                                placeholder="HH" minlength="0" maxlength="2" required="required" />:
                                            <input type="text" name='mm' id='mm' class="mm N duration-exam"
                                                minlength="2" maxlength="2" placeholder="MM" required="required" />
                                        </div>
                                        <span class="text-danger duration-error d-none">Invalid Duration Format</span>
                                    </div>
                                </div>
                            </div>
                            <div class="save__button text-center mt-4">
                                <button type="button" onclick="savedDetails()"
                                    class="btn btn-white btn-outline-primary save-nxt">Save & Next</button>
                            </div>
                        </div>
                    </div>

                    <div id="form__container" class="d-none mt-3">
                        <div class="" id="options--container">
                            <p class="adding_family h6 family">Group</p>

                            <div id="optionList" class="p-4" style=" gap: 1rem; display: flex; flex-direction: column;">
                                <div id="family-option0"
                                    class="bq-note-text p-0 family-option--list form-helper text-end">
                                    <div class="row family-group align-items-center">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <select onchange="getDiff(this)"
                                                        class="form-select js-select2 form-select-family-level form-control invalid"
                                                        data-family-row="0" id="options0-family"
                                                        name="family_options[0][family_id]" required=""
                                                        data-msg-required="Required"
                                                        data-rule-checkduplicate_family="true"
                                                        data-msg-checkduplicate_family="Group exist"
                                                        aria-describedby="options0-family-error" aria-invalid="true"
                                                        data-placeholder="Select Group">

                                                    </select>
                                                    <span id="options1-family-error" class="invalid">Required</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">

                                                <div class="form-control-wrap">
                                                    <div class="d-flex align-items-center">
                                                        <input type="number" value="" min="1"
                                                            class="form-control shadow-none w-75 rounded-0 rounded-start family-total-questions invalid nos"
                                                            id="options0-questions"
                                                            name="family_options[0][total_questions]"
                                                            placeholder="No of Question" required=""
                                                            data-msg-required="Required" data-rule-digits="true"
                                                            data-msg-digits="Must be numeric"
                                                            data-rule-checkquestions_family="true"
                                                            data-msg-checkquestions_family="no of questions exceeded"
                                                            aria-describedby="options0-questions-error">

                                                        <div
                                                            class="btn-light btn rounded-0 w-25 p-1 border-2 border-start-0 rounded-end">
                                                            <span>Nos</span></div>
                                                        <span id="options0-questions-error"
                                                            class="invalid">Required</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 actionBtnsDefault">
                                            <div class="form-group" id="defaultBtn">
                                                <a href="javascript:void(0)" id="open__family" data-family-option="add"
                                                    class="btn btn-primary btn--action ">
                                                    <em class="icon ni ni-plus" style="font-size: 15px"></em></a>
                                            </div>
                                        </div>



                                        <div class="col-12 align-start">
                                            <span class="form-note"></span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="bg-light border p-1">Note:- Total No of Questions Excluding Eliminatory Questions</div>
                        </div>
                        <div class="difficulty__field">
                            <p class="difficulty__level diff-level">Difficulty Level</p>
                            <div id="formid12" class="p-4" style=" gap: 1.5rem; display: flex; flex-direction: column;">
                                <div class="field_difficulty">
                                    <div class="row align-items-center">
                                        <div class="col position-relative">
                                            <select name="difficulty_options[0][difficulty_id]"
                                                class="form-select form-select-diff-level form-control js-select2"
                                                required onchange="getdiffAvailableQuestionCount(this)"
                                                data-msg-required="Required" data-rule-checkduplicate_diff="true"
                                                data-msg-checkduplicate_diff="Difficulty Level exist"
                                                aria-describedby="options0-diff-error" aria-invalid="true"
                                                id="difficulty-level-options-list0"
                                                data-placeholder="Select Difficulty Level">
                                            </select>
                                        </div>
                                        <div class="col position-relative">
                                            <div class="d-flex align-items-center">
                                                <input type="number" name="difficulty_options[0][no_of_questions]"
                                                    placeholder="No of Questions" min="1"
                                                    class="form-control mb-0 shadow-none w-75 rounded-0 rounded-start difficulty-total-questions nos"
                                                    id="diff0-questions" required data-msg-required="Required"
                                                    data-rule-digits="true" data-msg-digits="Must be numeric"
                                                    data-rule-checkquestions_diff="true"
                                                    data-msg-checkquestions_diff="no of questions exceeded"
                                                    aria-describedby="diff0-questions-error">
                                                <div
                                                    class="btn-light btn rounded-0 w-25 p-1 border-2 border-start-0 rounded-end">
                                                    <span>Nos</span></div>
                                            </div>
                                        </div>
                                        <div class="col-3 actionDiffBtnsDefault">
                                            <button type="button" class="btn btn-primary"
                                                onclick="addField(this,'formid12')">
                                                <em class="icon ni ni-plus text-white pe-auto"
                                                    style="font-size: 10px;"></em>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="diff_questions"></p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light border p-1">Note:- Total No of Questions Excluding Eliminatory Questions</div>




                        <div class="col-lg-12 elementry__question" style="margin-top: 30px;">
                            <div class="form-group">
                                <p class="Elementary_heading elim-que">Eliminatory Questions</p>

                                <div class="form-control-wrap d-flex gap-2 exam_criteria_elimintory">
                                    <div class="w-100" style="margin-right:13px">
                                        <p type="text" id="" class="form-control elementary_width" disabled>Eliminatory
                                            Question</p>
                                        <p id="available_elimentary_questions"></p>
                                    </div>
                                    <div class="w-100 d-flex align-items-start">
                                        <input type="number" min='0' id="elimentary_count"
                                            class="form-control shadow-none w-75 rounded-0 rounded-start elementary_width_control nos"
                                            name="no_of_elimentary_questions" placeholder="No of Questions"
                                            data-msg-required="Required" data-rule-digits="true"
                                            data-msg-digits="Must be numeric" data-rule-checkquestions_family="true"
                                            data-msg-checkquestions_family="no of questions exceeded"
                                            aria-describedby="elimentary_count-error" />
                                        <div class="btn-light btn rounded-0 w-25"><span
                                                style="display:flex; justify-content:center;">Nos</span></div>
                                    </div>
                                </div>
                                <P class="elementary__no" style="margin-left:30px">No of Questions</P>

                            </div>
                        </div>

                        <!-- <div class="col-12 text-center">
                        <a href="javascript:void(0)" class="btn btn-dim btn-primary btn--action" data-family-option="add">
                            <em class="icon ni ni-plus" style="font-size: 10px"></em>&nbsp; Family</a>
                    </div> -->

                        <div class="row g-3">
                            <div class="col-lg-7 offset-lg-5 exam_criteria_button">
                                <div class="form-group mt-2" style="float: right;">
                                    <button type="submit" id="helper"
                                        class="btn btn-md btn-primary btn--action">Save</button>
                                    <button type="button" class="btn btn-danger cancel"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .contia {}

    .form-note {
        margin-top: 10px;
    }

    .add-diff-level {
        margin-right: 150px;
    }

    input[type=time]::-webkit-datetime-edit-ampm-field {
        display: none;
    }

    .timepicker {
        border: 1px solid #dbdfea;
        /* height: calc(2.125rem + 2px); */
        border-radius: 4px;
        padding: 2px;
        height: 35px;
    }

    .timepicker .hh {
        width: 30px;
        height: 30px;
        outline: none;
        border: none;
        text-align: center;
    }

    .timepicker .mm {
        width: 30px;
        height: 30px;
        outline: none;
        border: none;
        text-align: center;
        margin-left: -4px;
    }

    .timepicker.valid {
        border: solid 1px springgreen;
    }

    .timepicker.invalid {
        border: solid 1px red;
    }
</style>
<script>
    //     function formatTime(timeInput) {

    // intValidNum = timeInput.value;

    // if ( intValidNum.length == 2) {
    //     timeInput.value = timeInput.value + ":";
    // }


    // if (intValidNum.length == 4 && (parseInt(intValidNum[intValidNum.length-1]) == 6 || parseInt(intValidNum[intValidNum.length-1]) > 6)) {

    //   timeInput.value = timeInput.value.slice(0, 3);
    //   return false;
    // }
    // if (intValidNum.length == 5 && intValidNum.slice(-2) > 59) {
    //   timeInput.value = timeInput.value.length"";
    //   return false;
    // }
    // if (intValidNum.length == 5 && intValidNum.slice(-2) == 59) {
    //   timeInput.value = timeInput.value.slice(0, 5) + "";
    //   return false;
    // }
    var contia = document.getElementsByClassName("contia")[0];
    contia.onkeyup = function (e) {
        var target = e.srcElement || e.target;
        var maxLength = parseInt(target.attributes["maxlength"].value, 10);
        var myLength = target.value.length;
        if (myLength >= maxLength) {
            var next = target;
            while (next = next.nextElementSibling) {
                if (next == null)
                    break;
                if (next.tagName.toLowerCase() === "input") {
                    next.focus();
                    break;
                }
            }
        }
        // Move to previous field if empty (user pressed backspace)
        else if (myLength === 0) {
            var previous = target;
            while (previous = previous.previousElementSibling) {
                if (previous == null)
                    break;
                if (previous.tagName.toLowerCase() === "input") {
                    previous.focus();
                    break;
                }
            }
        }
    }

    var input = document.getElementById('total-questions');
    input.onkeydown = function (e) {
        var k = e.which;

        if ((k < 48 || k > 57) && (k < 96 || k > 105) && k != 8) {
            e.preventDefault();
            return false;
        }
    };
var langCode = localStorage.getItem('language-type');
        languageText(langCode);

</script>