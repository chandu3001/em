window.familyOptionsLength = 1;

$(function () {
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
        familiesOptions[optionId].questions.push(option.levelRowId);

        if ($(element).find('.difficulty-level--list').length >= 1) {
            actionButton = `<a href="javascript:void(0)" data-target="#difficulty-level--list${option.levelRowId}" data-family-row="${optionId}" data-level-row="${option.levelRowId}" data-difficulty-level-option="remove" class="btn btn-sm btn-danger"> 
            <em class="icon ni ni-minus" style="font-size: 10px"></em></a>`;
        } else {
            actionButton = `<a href="javascript:void(0)" data-family-row="${optionId}" data-target="#difficulty-level-options-list${optionId}" data-difficulty-level-option="add" class="btn btn-sm btn-primary"> 
            <em class=" icon ni ni-plus" style="font-size: 10px"></em></a>`;
        }

        $(element).append(`<div id="difficulty-level--list${option.levelRowId}" class="row g-3 difficulty-level--list">
            <div class="col-lg-6 ">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <select class="form-select form-control difficulty-level-id form-select-difficulty-level" data-family-row="${optionId}" data-difficulty-row="${option.levelRowId}" id="options${optionId}-questions${option.levelRowId}-difficulty_levels" name="options[${optionId}][questions][${option.levelRowId}][difficulty_id]" ${option.visibility == false ? 'disabled' : ''}
                            data-rule-required="true" data-msg-required="required" 
                            data-rule-checkduplicate_dlevel="familyRow:${optionId}" data-msg-checkduplicate_dlevel="Difficulty level exist"
                        >
                            <option value="">Select Difficulty Level</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <input type="number" value="${parseValue(option.totalQuestions)}" class="form-control level-total-questions" id="options${optionId}-questions${option.levelRowId}-no_of_questions" name="options[${optionId}][questions][${option.levelRowId}][no_of_questions]" 
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
        </div>`);

        // Load difficulty levels
        getDefficultyLevels('#options'+optionId+'-questions'+option.levelRowId+'-difficulty_levels', parseValue(option.difficultyLevelId));

        // get family level questions total
        if(option.type == 'exist') {
            onFamilySelectDifficultyLevel(optionId, option.levelRowId, option.difficultyLevelId, 'exist', option.totalQuestions);
        }
    }

    window.loadFamilyOptionView = async function(options = {}) {
        const option = Object.assign({}, {
            visibility: true,
            type: 'new',
            familyRowId: (new Date()).getTime(),
            familyId: 0,
            familyTotalQuestions: 0,
            familyRemove: true,
            difficultyLevels: []
        }, options);
        
        // Add family option
        familiesOptions[option.familyRowId] = {
            rowId: option.familyRowId,
            questions: []
        };

        let familyRemoveButton = '';
        if (parseValue(option.familyRemove) == true) {
            familyRemoveButton = `<em class="icon ni ni-cross text-primary pe-auto" style="font-size: 20px;" data-target="#family-option${option.familyRowId}" data-family-option="remove"></em>`;
        }        

        optionsContainer.find('.family-options--list').append(`<div id="family-option${option.familyRowId}" class="bq-note-text family-option--list form-helper text-end">
              ${familyRemoveButton}
              <div class="row family-group">
                  <div class="col-6">
                      <div class="form-group">
                        <div class="form-control-wrap">
                            <select class="form-select form-select-family-level form-control" data-family-row="${option.familyRowId}" id="options${option.familyRowId}-family" name="options[${option.familyRowId}][family_id]" ${option.visibility == false ? 'disabled' : ''} 
                            required data-msg-required="Required" data-rule-checkduplicate_family="true" data-msg-checkduplicate_family="Family exist">
                                <option value="">Select Family</option>
                            </select>
                        </div>
                      </div>
                  </div>
                  <div class="col-5">
                      <div class="form-group">
                          <div class="form-control-wrap">
                              <input type="number" value="${parseValue(option.familyTotalQuestions)}" min="1" class="form-control family-total-questions" id="options${option.familyRowId}-questions" 
                              name="options[${option.familyRowId}][total_questions]" placeholder="Total No of Question From Family"
                              ${option.visibility == false ? 'disabled' : ''} required data-msg-required="Required"
                              data-rule-digits="true" data-msg-digits="Must be numeric"
                              data-rule-checkquestions_family="true" data-msg-checkquestions_family="no of questions exceeded"
                              />
                          </div>
                      </div>
                  </div>
                  <div class="col-12 align-start">
                    <span class="form-note">Total No of Question Available in the family</span>
                  </div>
              </div>
              <div class="form-group"></div>
              <div id="difficulty-level-options-list${option.familyRowId}"></div>
              <div class="form-group"></div>
              <div class="col-lg-12">
                  <div class="form-group">
                      <div class="form-control-wrap">
                          <input type="text" class="form-control" name="questions" placeholder="Elementary Question" disabled>
                      </div>
                  </div>
              </div>
          </div>`);

        // Load family list
        getFamilyList('#options' + option.familyRowId +'-family', parseValue(option.familyId));

        // get family level questions total
        if(option.type == 'exist') {
            onFormSelectFamilyLevel(option.familyId, option.familyRowId, 'exist', option.familyTotalQuestions);
        }

        // Load Difficulty Level
        console.log(option.difficultyLevels);
        if (option.difficultyLevels.length > 0) {
            option.difficultyLevels.forEach(async (level) => {
                await loadDifficultyLevelView(
                    `#difficulty-level-options-list${option.familyRowId}`, 
                    option.familyRowId, {
                        visibility: option.visibility,
                        type: option.type,
                        difficultyLevelId: level.difficulty_id,
                        totalQuestions: level.no_of_questions
                    }
                );
            });
        } else {
            // await loadDifficultyLevelView(
            //     `#difficulty-level-options-list${option.familyRowId}`, 
            //     option.familyRowId
            // );
        }
        
        familyOptionsLength++;
    }

    // Family option actions
    $(document).on("click", '[data-family-option="remove"]', function (e) {
        e.preventDefault();
        $($(this).data('target')).fadeOut(400).remove();
    });

    window.checkFamilyQuestions = async function() {
        let totalQuestions = $('#total-questions').val();
        let sumofQuestions = 0;
       
        optionsContainer.find('.family-option--list .family-total-questions').each(function(index, element) {
            if (parseValue(element.value) != '') {
                sumofQuestions = parseInt(sumofQuestions) + parseInt(element.value);
            }            
        });
        
        if(totalQuestions <= sumofQuestions) {
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

    window.checkDifficultyQuestions = async function(target, family_row) {
        let totalQuestions = $('#options'+ family_row + '-questions').val();
        let sumofQuestions = 0;

        $(target).find('.difficulty-level--list .level-total-questions').each(function(index, element) {
            sumofQuestions = (sumofQuestions + parseInt(element.value));
        });
        
        if(totalQuestions <= sumofQuestions) {
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
       const optionElm =  $('#options'+ option.row_id +'-questions');
        // Resetting content & input
        $('#family-option'+ option.row_id +' .family-group')
            .find('.form-note').html(option.note);
        
        for(const prop in option.attr) {
            if(parseValue(option.attr[prop]) != '') {
                optionElm.attr(prop, option.attr[prop])
            } else {
                optionElm.removeAttr(prop)
            }
        }

        optionElm.val(option.value);
    }

    async function updateDifficultyQuestionsView(option) {
        const optionElm =  $('#options'+option.family_row_id+'-questions'+option.difficulty_row_id+'-no_of_questions');
         // Resetting content & input
         $('#difficulty-level--list'+ option.difficulty_row_id)
             .find('.form-note').html(option.note);
         
         for(const prop in option.attr) {
             if(parseValue(option.attr[prop]) != '') {
                 optionElm.attr(prop, option.attr[prop])
             } else {
                 optionElm.removeAttr(prop)
             }
         }
 
         optionElm.val(option.value);
    }

    $(document).on("click", '[data-family-option="add"]', async function(e) {
        e.preventDefault();
        const response = await checkFamilyQuestions();
        if(response.total <= 0) {
            NioApp.Toast('Specify total questions', 'warning');
            return false;
        }

        if(!response.status) {
            NioApp.Toast('Sorry,  you cant add one more family row', 'warning');
            return false;
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
        if(response.total <= 0) {
            NioApp.Toast('Specify family total questions', 'warning');
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
        
        if(familiesOptions[rowId].questions.indexOf(levelRowId)) {
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
            'note': `Total No of Question Available in the family`,
            'value': no_of_questions
        });

        $.ajax({
			type: "get",
			url: formApiUrl(`total-family-questions/${family_id}`)
		}).done(async function (response) {
			if (response.status == true) {
                const questions = await checkFamilyQuestions();
                const total_questions = questions.sum;
                let family_total_questions = 0;
                let family_max_questions = 0;
                
                // Setting question attributes & value
                if (response.total_questions > 0) {
                    if (total_questions >= response.total_questions) {
                        family_max_questions = response.total_questions;
                        family_total_questions = response.total_questions;
                    } else if(response.total_questions > total_questions) {
                        family_max_questions = response.total_questions;
                        family_total_questions = total_questions;
                    }

                    // add difficulty level
                    if(type == 'new') {
                        $('#difficulty-level-options-list'+family_row_id).html('');
                        await loadDifficultyLevelView(
                            `#difficulty-level-options-list${family_row_id}`, 
                            family_row_id
                        );
                    }
                }
				
                updateFamilyQuestionsView({
                    'row_id': family_row_id,
                    'attr': {
                        'max': family_max_questions,
                        'disabled': false,
                    },
                    'value': no_of_questions,
                    'note': `Total No of Question Available in the family ${response.total_questions}`
                });
			} else if (response.status == false) {
				NioApp.Toast(response.message, "error");
			} else {
				NioApp.Toast("Invalid response status", "warning");
			}
		}).fail(function (error) {
			NioApp.Toast("Error Occured", "error");
		}).always(function () {
			// $('#options'+ family_row_id +'-questions').removeAttr('disabled');
		});
    }

    $(document).on('change', '.form-select-family-level', function(e) {
        e.preventDefault();
        const family_id = $(this).val();
        const family_row_id = $(this).data('family-row');

        onFormSelectFamilyLevel(family_id, family_row_id);
    });

    //Difficulty level change action
    function onFamilySelectDifficultyLevel(family_row_id, difficulty_row_id, level_id, type = 'new', no_of_questions = 0) {
        const family_id = $('#options'+family_row_id+'-family').val();
        
        updateDifficultyQuestionsView({
            'difficulty_row_id': difficulty_row_id,
            'family_row_id': family_row_id,
            'attr': {
                'max': false,
                'disabled': true,
            },
            'note': `Total No of Question`,
            'value': no_of_questions
        });
        $.ajax({
			type: "get",
			url: formApiUrl(`total-difficulty-questions/${level_id}/${family_id}`)
		}).done(async function (response) {
			if (response.status == true) {
                const questions = await checkDifficultyQuestions();
                const total_questions = questions.sum;
                let difficulty_total_questions = 0;
                
                // Setting question attributes & value
                if (response.total_questions > 0) {
                    if (total_questions >= response.total_questions) {
                        difficulty_max_questions = response.total_questions;
                        difficulty_total_questions = response.total_questions;
                    } else if(response.total_questions > total_questions) {
                        difficulty_max_questions = response.total_questions;
                        difficulty_total_questions = total_questions;
                    }

                }
				
                updateDifficultyQuestionsView({
                    'difficulty_row_id': difficulty_row_id,
                    'family_row_id': family_row_id,
                    'attr': {
                        'max': difficulty_max_questions,
                        'disabled': false,
                    },
                    'value': no_of_questions,
                    'note': `Total No of Question ${response.total_questions}`
                });
			} else if (response.status == false) {
				NioApp.Toast(response.message, "error");
			} else {
				NioApp.Toast("Invalid response status", "warning");
			}
		}).fail(function (error) {
			NioApp.Toast("Error Occured", "error");
		}).always(function () {
			// $('#options'+ family_row_id +'-questions').removeAttr('disabled');
		});
    }

    $(document).on('change', '.form-select-difficulty-level', function(e) {
        e.preventDefault();
        const family_row_id = $(this).data('family-row');
        const difficulty_row_id = $(this).data('difficulty-row');

        const level_id = $(this).val();
        onFamilySelectDifficultyLevel(family_row_id, difficulty_row_id, level_id);
    });
    
});
  


  