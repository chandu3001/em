window.familyOptionsLength = 1;

$.ajaxSetup({
    headers: {
        Authorization: "Bearer "+$.cookie("access_token")
    }
})


let difficulty_levels = [];
let families = [];



$(function () {


    $("#license-name").val(license_name)

    $("select, input").change(function(){
        $(this).valid()
    })
    
    

    const optionsContainer = $("#options--container");

    async function loadDifficultyLevelView(element, optionId, options = {}) {

        let actionButton = '';
        const option = Object.assign({}, {
            visibility: true,
            type: 'new',
            levelRowId: (new Date()).getTime(),
            difficultyLevelId: 0,
            totalQuestions: 0,
        }, options);

        // Add questions to families option
        // familiesOptions[optionId].questions.push(option.levelRowId);

        if ($(element).find('.difficulty-level--list').length >= 1) {
            actionButton = `<a href="javascript:void(0)" data-target="#difficulty-level--list${option.levelRowId}" data-family-row="${optionId}" data-level-row="${option.levelRowId}" data-difficulty-level-option="remove" class="btn btn-sm btn-danger"> 
            <em class="icon ni ni-minus" style="font-size: 10px"></em></a>`;
        }
        else {

            actionButton = `<a href="javascript:void(0)" data-target="#difficulty-level--list${option.levelRowId}" data-family-row="${optionId}" data-level-row="${option.levelRowId}" data-difficulty-level-option="remove" class="btn btn-sm btn-danger"> 
                <em class="icon ni ni-minus" style="font-size: 10px"></em></a>`;
            // actionButton = `<a href="javascript:void(0)" data-family-row="${optionId}" data-target="#difficulty-level-options-list${optionId}" data-difficulty-level-option="add" class="btn btn-sm btn-primary"> 
            // <em class=" icon ni ni-plus" style="font-size: 10px"></em></a>`;
        }

        $(element).append(`<div id="difficulty-level--list${option.levelRowId}" class="row g-3 difficulty-level--list">
            <div class="col-lg-6 ">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <select class="form-select form-control difficulty-level-id form-select-difficulty-level js-select2" data-family-row="${optionId}" data-difficulty-row="${option.levelRowId}" id="options${optionId}-questions${option.levelRowId}-difficulty_levels" name="options[${optionId}][questions][${option.levelRowId}][difficulty_id]" ${option.visibility == false ? 'disabled' : ''}
                            data-rule-required="true" data-msg-required="required" data-placeholder="Select Difficulty Level"
                            data-rule-checkduplicate_dlevel="familyRow:${optionId}" data-msg-checkduplicate_dlevel="Difficulty level exist"
                        >
                            <option value="">Select Difficulty Level</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <input type="number" value="${(option.totalQuestions)}" class="form-control level-total-questions" id="options${optionId}-questions${option.levelRowId}-no_of_questions" name="options[${optionId}][questions][${option.levelRowId}][no_of_questions]" 
                    placeholder="number of questions" 
                    ${option.visibility == false ? 'disabled' : ''}
                    data-rule-required="true" data-msg-required="required"
                    data-rule-digits="true" data-msg-digits="Must be numeric" 
                    data-rule-checkquestions_dlevel="familyRow:${optionId}" data-msg-checkquestions_dlevel="no of questions exceeded" 
                    />
                </div>  
            </div>
            <div class="col-lg-1">
                <div class="form-group">
                    ${option.visibility == false ? '' : actionButton}
                </div>
            </div>
            <div class="col-12 align-start">
                <span class="form-note mt-0">No of Question</span>
            </div>
            <div class="form-group"></div>
              <div id="difficulty-level-options-list${option.familyRowId}"></div>
              <div class="form-group"></div>
        </div>`);

        // Load difficulty levels
        getDefficultyLevels('#options' + optionId + '-questions' + option.levelRowId + '-difficulty_levels', (option.difficultyLevelId));

        // get family level questions total
        if (option.type == 'exist') {
            onFamilySelectDifficultyLevel(optionId, option.levelRowId, option.difficultyLevelId, 'exist', option.totalQuestions);
        }
    }


    $('.nos').on('input', function(){
        if($(this).val())
        {
            $(this)[0].previousElementSibling.innerHTML = "Nos"
        }
        else
        {
            $(this)[0].previousElementSibling.innerHTML = ""
        }
    })

    
    window.loadFamilyOptionView = async function (options = {}) {
       
    }

    // Family option actions
    $(document).on("click", '[data-family-option="remove"]', function (e) {
        e.preventDefault();
        $($(this).data('target')).fadeOut(400).remove();
    });

    window.checkFamilyQuestions = async function () {
        let totalQuestions = $('#total-questions').val();
        let sumofQuestions = 0;

        if(families.length <= document.querySelectorAll('.family-option--list').length)
        {
            return {"status": false}
        }
        $("#options--container .family-option--list .family-total-questions").each(function (index, element) {
            if ((element.value) != '') {
                sumofQuestions = parseInt(sumofQuestions) + parseInt(element.value);
            }
        });

        if (totalQuestions <= sumofQuestions) {
            return {
                'status': false,
                'total': totalQuestions,
                'sum': sumofQuestions
            }
        } else {
            return {
                'status': true,
                'total': totalQuestions,
                'sum': sumofQuestions
            };
        }
    }

    window.checkDifficultyQuestions = async function (target, family_row) {
        let totalQuestions = $('#options' + family_row + '-questions').val();
        let sumofQuestions = 0;

        $(target).find('.difficulty-level--list .level-total-questions').each(function (index, element) {
            sumofQuestions = (sumofQuestions + parseInt(element.value));
        });

        if (totalQuestions <= sumofQuestions) {
            return {
                'status': false,
                'total': totalQuestions,
                'sum': sumofQuestions
            }
        } else {
            return {
                'status': true,
                'total': totalQuestions,
                'sum': sumofQuestions
            };
        }
    }

    async function updateFamilyQuestionsView(option) {
        
        const optionElm = $('#options' + option.row_id + '-questions');
        // Resetting content & input
        $('#family-option' + option.row_id + ' .family-group')
            .find('.form-note').html(option.note);

        for (const prop in option.attr) {
            if ((option.attr[prop]) != '') {
                optionElm.attr(prop, option.attr[prop])
            } else {
                optionElm.removeAttr(prop)
            }
        }

        optionElm.val(option.value);
    }

    async function updateDifficultyQuestionsView(option) {
        const optionElm = $('#options' + option.family_row_id + '-questions' + option.difficulty_row_id + '-no_of_questions');
        // Resetting content & input
        $('#difficulty-level--list' + option.difficulty_row_id)
            .find('.form-note').html(option.note);

        for (const prop in option.attr) {
            if ((option.attr[prop]) != '') {
                optionElm.attr(prop, option.attr[prop])
            } else {
                optionElm.removeAttr(prop)
            }
        }

        optionElm.val(option.value);
    }

    $(document).on("click", '[data-family-option="add"]', async function (e) {
        e.preventDefault();
        const response = await checkFamilyQuestions();
        if (response.total <= 0) {
            NioApp.Toast('Specify total questions', 'warning');
            return false;
        }

        if (!response.status) {
            NioApp.Toast('Sorry,  you cant add one more group row', 'warning');
            return false;
        }
        else
        {
            openFamily(e.currentTarget)
        }

        loadFamilyOptionView({
            familyRowId: familyOptionsLength
        });
    });



    // Difficulty level option actions
    $(document).on("click", '[data-difficulty-level-option="add"]', async function (e) {
        e.preventDefault();
        let dlTarget = $(e.currentTarget).data('target');
        let familyRow = $(e.currentTarget).data('family-row');

        const response = await checkDifficultyQuestions(dlTarget, familyRow);
        if (response.total <= 0) {
            NioApp.Toast('Specify group total questions', 'warning');
            return false;
        }

        if (!response.status) {
            NioApp.Toast('Sorry,  you cant add one more difficulty level question row', 'warning');
            return false;
        }

        loadDifficultyLevelView(
            $(e.currentTarget).data('target'),
            $(e.currentTarget).data('family-row')
        );
    });

    $(document).on("click", '[data-difficulty-level-option="remove"]', function (e) {
        e.preventDefault();
        const rowId = $(e.currentTarget).data('family-row');
        const levelRowId = $(e.currentTarget).data('level-row');

        if (familiesOptions[rowId].questions.indexOf(levelRowId)) {
            familiesOptions[rowId].questions.splice(familiesOptions[rowId].questions.indexOf(levelRowId), 1);
        }
        $($(this).data('target')).fadeOut(400).remove();
    });

    //Family change action
    function onFormSelectFamilyLevel(family_id, family_row_id, type = 'new', no_of_questions = 0) {
        
        updateFamilyQuestionsView({
            'row_id': family_row_id,
            'attr': {
                'max': false,
                'disabled': true,
            },
            'note': `Total No of Question Available in the group`,
            'value': no_of_questions
        });

        $.ajax({
            type: "get",
            url: `${api_base_url}total-family-questions/${family_id}`,
        }).done(async function (response) {
            if (response.status == true) {
                const questions = await checkFamilyQuestions();
                const total_questions = questions.sum;
                let family_total_questions = 0;
                var family_max_questions = 0;

                // Setting question attributes & value
                if (response.total_questions > 0) {
                    if (total_questions >= response.total_questions) {
                        family_max_questions = response.total_questions;
                        family_total_questions = response.total_questions;
                    } else if (response.total_questions > total_questions) {
                        family_max_questions = response.total_questions;
                        family_total_questions = total_questions;
                    }

                    // add difficulty level
                    // if(type == 'new') {
                    //     $('#difficulty-level-options-list'+family_row_id).html('');
                    //     await loadDifficultyLevelView(
                    //         `#difficulty-level-options-list${family_row_id}`, 
                    //         family_row_id
                    //     );
                    // }
                }
                
                updateFamilyQuestionsView({
                    'row_id': family_row_id,
                    'attr': {
                        'max': response.total_questions,
                        'disabled': false,
                    },
                    'value': no_of_questions,
                    'note': `Total No of Question Available in the group ${response.total_questions}`
                });
            } else if (response.status == false) {
                NioApp.Toast(response.message, "error");
            } else {
                NioApp.Toast("Invalid response status", "warning");
            }


            $.ajax({
                type: "POST",
                url: `${api_base_url}get-total-eliminatory-questions`,
                data: {
                    family_ids: getFamilyIds(),
                }
            }).done(({status, message, total_questions}) =>{
                if(status)
                {
                    $("#available_elimentary_questions").html("Available eliminatory questions "+total_questions);
                    $("#elimentary_count").attr("max",total_questions)
                    
                }
            }).fail(()=>{
                NioApp.Toast("Error Occurred!", "error")
            })

        }).fail(function (error) {
            NioApp.Toast("Error Occured", "error");
        }).always(function () {
            // $('#options'+ family_row_id +'-questions').removeAttr('disabled');
        });
    }

    $(document).on('change', '.form-select-family-level', function (e) {
        e.preventDefault();
        getdifficultyLevels();
        const family_id = $(this).val();
        const family_row_id = $(this).data('family-row');
        if(family_id)
        onFormSelectFamilyLevel(family_id, family_row_id);
    });

    //Difficulty level change action
    // function onFamilySelectDifficultyLevel(family_row_id, difficulty_row_id, level_id, type = 'new', no_of_questions = 0) {
    //     const family_id = $('#options' + family_row_id + '-family').val();

    //     updateDifficultyQuestionsView({
    //         'difficulty_row_id': difficulty_row_id,
    //         'family_row_id': family_row_id,
    //         'attr': {
    //             'max': false,
    //             'disabled': true,
    //         },
    //         'note': `Total No of Question`,
    //         'value': no_of_questions
    //     });
    //     $.ajax({
    //         type: "get",
    //         url: `${api_base_url}total-difficulty-questions/${level_id}/${family_id}`
    //     }).done(async function (response) {
    //         if (response.status == true) {
    //             const questions = await checkDifficultyQuestions();
    //             const total_questions = questions.sum;
    //             let difficulty_total_questions = 0;

    //             // Setting question attributes & value
    //             if (response.total_questions > 0) {
    //                 if (total_questions >= response.total_questions) {
    //                     difficulty_max_questions = response.total_questions;
    //                     difficulty_total_questions = response.total_questions;
    //                 } else if (response.total_questions > total_questions) {
    //                     difficulty_max_questions = response.total_questions;
    //                     difficulty_total_questions = total_questions;
    //                 }

    //             }

    //             updateDifficultyQuestionsView({
    //                 'difficulty_row_id': difficulty_row_id,
    //                 'family_row_id': family_row_id,
    //                 'attr': {
    //                     'max': difficulty_max_questions,
    //                     'disabled': false,
    //                 },
    //                 'value': no_of_questions,
    //                 'note': `Total No of Question ${response.total_questions}`
    //             });
    //         } else if (response.status == false) {
    //             NioApp.Toast(response.message, "error");
    //         } else {
    //             NioApp.Toast("Invalid response status", "warning");
    //         }
    //     }).fail(function (error) {
    //         NioApp.Toast("Error Occured", "error");
    //     }).always(function () {
    //         // $('#options'+ family_row_id +'-questions').removeAttr('disabled');
    //     });
    // }

    $(document).on('change', '.form-select-difficulty-level', function (e) {
        e.preventDefault();
        const family_row_id = $(this).data('family-row');
        const difficulty_row_id = $(this).data('difficulty-row');

        const level_id = $(this).val();
        onFamilySelectDifficultyLevel(family_row_id, difficulty_row_id, level_id);
    });

});

$.ajax({
    type: "GET",
    url: `${api_base_url}get-valid-famillies/${$.cookie('school_id')}`,
    async: false
}).done(({status, data})=>{
    if(status)
    {
        families = data;

        $("#options0-family").html(`
                <option value="">Select</option>
        `);
        families.forEach(item => {
                $("#options0-family").append(`
                <option value="${item.id}">${item.family_name}</option>
            `)})
    }
})



    $.ajax({
        type: "GET",
        url: `${api_base_url}get-valid-difficulty_levels/${$.cookie('school_id')}`,
        async: false
    }).done(({status, data})=>{
        if(status)
        {
            difficulty_levels = data;
            $("#difficulty-level-options-list0").html(`
                <option value="">Select</option>
            `)
            difficulty_levels.forEach(item => {
                $("#difficulty-level-options-list0").append(`
                <option value="${item.id}">${item.level}</option>
            `)
            })
        }
    })


    function getValidSubLicense(id = '')
    {
        if(id)
        {
            data = {
                id
            }
        }
        else
        {
            data = ''
        }
        $.ajax({
            type: "GET",
            url: api_base_url+"get-valid-sub-license-by-license-id/"+getUrlParam('id'),
            data: data,
            async: false
        }).done(({status, data, message, option})=>{
            if(status)
            {
                
                // $("#btn-add-exam-criteria").prop('disabled', false)
                if(!id && data.length > 0)
                    $("#btn-add-exam-criteria").show()
    
                if(data.length > 0)
                {
                    
                    $("#sublicence").html(`
                        <option value="">Select</option>
                   `)
                    $("#sublicence").prop("disabled", false)
                    $("#sublicence").attr('required', true)

                    data.forEach(item =>{
                        $("#sublicence").append(`
                            <option ${(item.id == id || data.length == 1) ? 'selected' : ''} value="${item.id}">${item.name}</option>
                        `)
                    })
    
                }
                else
                {

                    // $("#btn-add-exam-criteria").prop('disabled', false)
                    $("#btn-add-exam-criteria").show()
                    $("#sublicence").parent().html('<p class="form-control disable">Sub license not available</p>')
                }
                
            }
            else
            {
                if(option)
                {
                    // $("#btn-add-exam-criteria").prop('disabled', true)
                    $("#btn-add-exam-criteria").hide()

                }
    
                $("#sublicence").prop("disabled", true)
                $("#sublicence").html(`<option value="">${message}</option>`)
            }
        }).always(()=> hideLoader())
    }

function openFamily(ele) {
    // $(ele).parent().html(`
    // // <a href="" id="close__family" onclick="closeFamily()" data-target="#family-option1" data-family-option="remove" style="display: block;">
    // // <em class="icon ni ni-minus text-primary pe-auto" style="font-size: 20px;"></em></a>
    // // `)
    // document.getElementById("close__family").style.display="block";
    // document.getElementById("open__family").style.display="none";
    // document.getElementById("removing_heading").style.display="none";

    // $(ele).html(`<em class="icon ni ni-minus text-white pe-auto" style="font-size: 15px;"></em>`)
    // $(ele).removeClass("btn-primary").addClass("btn-danger")
    // $(ele).attr('onclick', "closeFamily(this)")
    // $(ele).attr("data-family-option", "edit")

    // if(familyDivCount == 1)
    // {
    //     $(ele).hide();
    // }
    var familyDivCount = document.querySelectorAll('.family-option--list').length+1;

    $('[data-family-option="add"]').parent().remove();
    $("#optionList").append(`
        <div id="family-option${familyDivCount}" class="bq-note-text p-0 family-option--list form-helper text-end">
            <div class="row family-group align-items-center">
                <div class="col">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <select required="required" onchange="getDiff(this)" class="form-select form-select-family-level form-control valid js-select2" data-family-row="${familyDivCount}" id="options${familyDivCount}-family" name="family_options[${familyDivCount}][family_id]" data-msg-required="Required" data-rule-checkduplicate_family="true" data-msg-checkduplicate_family="Group exist" aria-describedby="options${familyDivCount}-family-error" aria-invalid="false" data-placeholder="Select Group">
                            <option value="">Select Group</option>
                            ${
                                families.map(item =>{
                                    return `<option value='${item.id}'>${item.family_name}</option>`
                                })
                            }
                            </select>
                            <span id="options${familyDivCount}-family-error" class="invalid" style="display: none;"></span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <div class="d-flex align-items-center">
                                <input required="required" type="number" value="" min="1" class="form-control shadow-none w-75 rounded-0 rounded-start family-total-questions invalid nos" id="options${familyDivCount}-questions" name="family_options[${familyDivCount}][total_questions]" placeholder="No of Question" data-msg-required="Required" data-rule-digits="true" data-msg-digits="Must be numeric" data-rule-checkquestions_family="true" data-msg-checkquestions_family="no of questions exceeded" aria-describedby="options${familyDivCount}-questions-error" aria-invalid="false">
                                <div class="btn-light btn rounded-0 w-25 p-1 border-2 border-start-0 rounded-end"><span>Nos</span></div>
                                <span id="options${familyDivCount}-questions-error" class="invalid" style="display: none;"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex actionBtns align-items-center" style="gap:1em">
                    <div class="">
                        <a href="javascript:void(0)" data-family-option="edit" class="btn btn--action btn-danger" onclick="closeFamily(this)"><em class="icon ni ni-minus text-white pe-auto" style="font-size: 10px;"></em></a>
                    </div>
                    <div class="">
                        <a href="javascript:void(0)" data-family-option="add" class="btn btn-primary btn--action"><em class="icon ni ni-plus text-white pe-auto" style="font-size: 10px;"></em></a>
                    </div>
                </div>
                <div class="col-12 align-start" >
                    <span class="form-note"></span>
                </div>
            </div>
        </div>
    `)

    $("select, input").change(function(){
        $(this).valid()
    })

    $('.nos').on('input', function(){
        if($(this).val())
        {
            $(this)[0].previousElementSibling.innerHTML = "Nos"
        }
        else
        {
            $(this)[0].previousElementSibling.innerHTML = ""
        }
    })
    $('select').select2({
        placeholder: $(this).attr('data-placeholder'),
        minimumResultsForSearch: -1
    });

}

function getdifficultyLevels()
{

    let family = document.querySelectorAll('.form-select-family-level');
    family =  Array.from(family)
    const family_ids = family.map(item => item.value);
    console.log('check', family_ids);
    if(family_ids.length > 0 && family_ids[0] != '')
    {
        $.ajax({
            type: "POST",
            url: api_base_url+"get-difflevels-by-family-ids",
            data: {
                "family_ids": family_ids
            },
        }).done(({status, data}) =>{
            if(status)
            {
                const diff = document.querySelectorAll('.form-select-diff-level');
    
                diff.forEach((di) =>{
                    var currentVal = di.value;
                    
                    data.forEach((item, inx) =>{
                        if(inx == 0)
                        {
                            $(di).html(`<option value=''></option>`)
                        }
                        $(di).append(`<option ${currentVal == item.id ? 'selected' : ''} value='${item.id}'>${item.level}</option>`)
                       
            
                    })
                })
            }
        })
    }
}

function getDiff(){
    
    getdifficultyLevels();
    const diff = document.querySelectorAll('.form-select-diff-level');
    const diffies =  Array.from(diff)
    diffies.forEach(item => getdiffAvailableQuestionCount(item));
    

    

    
    // $('.form-select-diff-level').select2('val', "null")
    // $('.diff_questions').html('')

}
$('#sublicence').change(function(e){

        const ExamCriteriaId = $("#examCriteriaForm #helper").attr('data-exam-criteria');
        
        subLicenseID =  $('#sublicence').val();
        const school_id = appModule.getCookie('school_id');
        $.ajax({
             type: "post",
             url: formApiUrl(`exam-criteria-validation`),
             data: {
                'school_id':school_id,
                license_id:getUrlParam('id'),
                sub_license_id:$(this).val(),
                exam_criteria_id: ExamCriteriaId
            },
             beforeSend: function () {
                $("#loader").fadeIn();
             },
          }).done(function (response) {
          if (response.status == true) {
            $(".save__button").removeClass('d-none');

           // $("#saved__criteria").addClass('d-none');
            //$("#form__container, #backBtn").removeClass('d-none');
              //NioApp.Toast(response.message, "success");
          } else if (response.status == false) {
            $(".save__button").addClass('d-none');

             NioApp.Toast(response.message, "error");
          } else {
             NioApp.Toast("Invalid response status", "warning");
          }
       }).fail(function (error) {
          NioApp.Toast("Error Occured", "error");
       }).always(function () {
          $("#loader").fadeOut();
       });

});


/*function savedDetails() {
    if($("#examCriteriaForm").valid())
    {
        
        const ExamCriteriaId = $("#examCriteriaForm #helper").attr('data-exam-criteria');
        
        subLicenseID =  $('#sublicence').val();
        const school_id = appModule.getCookie('school_id');
        $.ajax({
             type: "post",
             url: formApiUrl(`exam-criteria-validation`),
             data: {
                'school_id':school_id,
                license_id:getUrlParam('id'),
                sub_license_id:subLicenseID,
                exam_criteria_id: ExamCriteriaId
            },
             beforeSend: function () {
                $("#loader").fadeIn();
             },
          }).done(function (response) {
          if (response.status == true) {

            $("#saved__criteria").addClass('d-none');
            $("#form__container, #backBtn").removeClass('d-none');
              //NioApp.Toast(response.message, "success");
          } else if (response.status == false) {

             NioApp.Toast(response.message, "error");
          } else {
             NioApp.Toast("Invalid response status", "warning");
          }
       }).fail(function (error) {
          NioApp.Toast("Error Occured", "error");
       }).always(function () {
          $("#loader").fadeOut();
       });



    }
    // document.getElementById("").required = false;

}*/

    $('select').select2({
          minimumResultsForSearch: -1,
          placeholder: function(){
              $(this).data('placeholder');
          }
      });

function savedDetails() {
    
    if($("#examCriteriaForm").valid())
    {
        $("#saved__criteria").addClass('d-none');
        $("#form__container, #backBtn").removeClass('d-none');
    }
    // document.getElementById("").required = false;

}

$("#backBtn, #btn-add-exam-criteria").click(function(){
    $("#saved__criteria").removeClass('d-none');
    $("#form__container, #backBtn").addClass('d-none');
})
$("#btn-add-exam-criteria").click(function(){
    $("#sublicence").select2('val', " ")
    getValidSubLicense();
})

function resetCRForm()
{
    $("#saved__criteria").removeClass('d-none');
    $("#form__container, #backBtn").addClass('d-none'); 
    $("div.family-option--list:not(:last), div.field_difficulty:not(:last)").remove();
    $(".form-note, .diff_questions, #available_elimentary_questions").html('')
}

$(".close, #btn-add-exam-criteria").click(function(){
    $("#saved__criteria").removeClass('d-none');
    $("#form__container, #backBtn").addClass('d-none'); 
    $("div.family-option--list:not(:last), div.field_difficulty:not(:last)").remove();
    $(".form-select-family-level, .form-select-diff-level").select2('val', " ")
    $("#optionList .actionBtns, #optionList .actionBtnsDefault").html(`<div class="form-group">
        <a href="javascript:void(0)" data-family-option="add" class="btn btn-primary btn--action"><em class="icon ni ni-plus text-white pe-auto" style="font-size: 10px;"></em></a>
    </div>`)
    $(".form-note, .diff_questions, #available_elimentary_questions, .nos-text").html('')
    $(".actionDiffBtns, .actionDiffBtnsDefault").html(`<button type="button" class="btn btn-primary" onclick="addField(this,'formid12')">
    <em class="icon ni ni-plus text-white pe-auto" style="font-size: 10px;"></em>
</button>`)

    $('input, select').prop('disabled', false);
    hideLoader();
})

$("#btn-add-exam-criteria").click(function(){
    $("div.field_difficulty:last select").val('')
    $("div.field_difficulty:last input").val('')
    $("div.family-option--list:last select").val('')
    $("div.family-option--list:last input").val('')

})


var diffIdCount = 1;
function addField(ele, target) {
    let totalQuestions = $('#total-questions').val();
    const difficultyInputElements = document.querySelectorAll(".difficulty-total-questions");
    let diffTotalNoQuestions = 0;
    difficultyInputElements.forEach(elee => {
        diffTotalNoQuestions += parseInt(elee.value)
    })

    

    if(totalQuestions <= diffTotalNoQuestions || difficulty_levels.length <= $(".form-select-diff-level").length)
    {
        NioApp.Toast('Sorry,  you cant add one more difficulty level row', 'warning')
        return;
    }


    if($("#formid12").children().length == 1)
    {
        $(ele).remove();

    }
    // else
    // {
    //     ele.innerHTML = `<em class="icon ni ni-minus text-white pe-auto" style="font-size: 10px;"></em>`
    //     ele.setAttribute("onclick", "removeField(this.parentElement.parentElement.parentElement)")
    //     ele.setAttribute('data-diff-option','add')
    //     $(ele).removeClass("btn-primary").addClass('btn-danger')
    // }

    $('[data-diff-option="edit"]').remove();
    


    $("#"+target).append(`
    <div class="field_difficulty">
        <div class="row align-items-center">
            <div class="col position-relative">
                <select class="form-select form-select-diff-level form-control js-select2" 
                onchange="getdiffAvailableQuestionCount(this)" required
                name="difficulty_options[${diffIdCount}][difficulty_id]" 
                data-msg-required="Required"
                data-rule-checkduplicate_diff="true"
                data-msg-checkduplicate_diff="Difficulty Level exist"
                aria-describedby="options${diffIdCount}-diff-error" aria-invalid="true"
                id="difficulty-level-options-list${diffIdCount}" data-placeholder="Select Difficulty Level">
                <option value="">Select Difficulty Level</option>
                </select>
            </div>
            <div class="col position-relative">
                <div class="d-flex align-items-center">
                    <input type="number" min='1' name="difficulty_options[${diffIdCount}][no_of_questions]" 
                    placeholder="No of Questions" required
                    id="diff${diffIdCount}-questions"
                    class="form-control mb-0 shadow-none w-75 rounded-0 rounded-start difficulty-total-questions nos"
                    data-msg-required="Required" data-rule-digits="true"
                    data-msg-digits="Must be numeric"
                    data-rule-checkquestions_diff="true"
                    data-msg-checkquestions_diff="no of questions exceeded"
                    aria-describedby="diff${diffIdCount++}-questions-error">
                    <div class="btn-light btn rounded-0 w-25 p-1 border-2 border-start-0 rounded-end"><span>Nos</span></div>
                </div>
            </div>
            <div class="col-3 d-flex align-items-start actionDiffBtns" style="gap:1em">
                <button type="button" data-diff-option="add" class="btn btn-danger" onclick="removeField(this.parentElement.parentElement.parentElement)"><em class="icon ni ni-minus text-white pe-auto" style="font-size: 10px;"></em></button>
                <button type="button" data-diff-option="edit" class="btn btn-primary" onclick="addField(this,'formid12')"><em class="icon ni ni-plus text-white pe-auto" style="font-size: 10px;"></em></button>
            </div>
        </div>
        <p class="diff_questions"></p>
    </div>
    `);
    getdifficultyLevels();
    $("select, input").change(function(){
        $(this).valid()
    })

    $('select').select2({
        placeholder: $(this).attr('data-placeholder'),
        minimumResultsForSearch: -1
    });
}

function getFamilyIds()
{
    const formSelectFamilyLevel = document.querySelectorAll(".form-select-family-level");
    const result = [];
    formSelectFamilyLevel.forEach(item => {
        result.push(item.value)
    });
    return result;
}

function getDiffIds()
{
    const formSelectDiffLevel = document.querySelectorAll(".form-select-diff-level");
    const result = [];
    formSelectDiffLevel.forEach(item => {
        result.push(item.value)
    });
    return result;
}

function closeFamily(ele)
{
    $(ele).parent().parent().parent().parent().remove();

    if($('#optionList .actionBtns').length)
    {
        $('#optionList .actionBtns:last').html(`
        <div class="">
            <a href="javascript:void(0)" data-family-option="edit" class="btn btn--action btn-danger" onclick="closeFamily(this)"><em class="icon ni ni-minus text-white pe-auto" style="font-size: 10px;"></em></a>
        </div>
        <div class="">
            <a href="javascript:void(0)" data-family-option="add" class="btn btn-primary btn--action"><em class="icon ni ni-plus text-white pe-auto" style="font-size: 10px;"></em></a>
        </div>`)
    }
    else
    {
        $(".actionBtnsDefault").html(`<div class="">
        <a href="javascript:void(0)" data-family-option="add" class="btn btn-primary btn--action"><em class="icon ni ni-plus text-white pe-auto" style="font-size: 10px;"></em></a>
        </div>`)
    }
    getDiff();

}

function removeField(ele) {
    $(ele).remove();
    if($('#formid12 .actionDiffBtns').length)
    {
        $('#formid12 .actionDiffBtns:last').html(`
            <button type="button" data-diff-option="add" class="btn btn-danger " onclick="removeField(this.parentElement.parentElement.parentElement)"><em class="icon ni ni-minus text-white pe-auto" style="font-size: 10px;"></em></button>
            <button type="button" data-diff-option="edit" class="btn btn-primary" onclick="addField(this,'formid12')"><em class="icon ni ni-plus text-white pe-auto" style="font-size: 10px;"></em></button>`)
    }
    else
    {
        $(".actionDiffBtnsDefault").html(`<button type="button" data-diff-option="edit" class="btn btn-primary" onclick="addField(this,'formid12')">
        <em class="icon ni ni-plus text-white pe-auto" style="font-size: 10px;"></em>
    </button>`)
    }
}
function getdiffAvailableQuestionCount(e){

    
    const familyIds = getFamilyIds();
    
    if(e.value)
    {
        showLoader({
            text: "Loading..."
        })
        
        $.ajax({
            type: "post",
            url: `${api_base_url}total-difficulty-questions/${e.value}`,
            data: {
                family_ids: familyIds
            }
        }).done(({status, message, total_questions})=>{
            if(status)
            {
                
                $($(e).parent().parent().children()[1]).children().children()[0].setAttribute("max",total_questions)
                $(e).parent()[0].nextElementSibling.lastElementChild.value = 0
                $($(e).parent().parent().parent())[0].lastElementChild.innerHTML = `No of Questions ${total_questions}`
            }
            else
            {
                NioApp.Toast(message, "error")
            }
        }).fail(()=>{
            NioApp.Toast("Error Occurred", "error")
        }).always(()=>{
            hideLoader();
        })
    }
}
