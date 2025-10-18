$(function() {

	const difficultyLevelsForm = $("#difficultyLevelsForm");
	
	// Ajax request setup
	$.ajaxSetup({
		headers: {
			'Authorization': `Bearer ${appModule.getToken()}`
		},
		dataType: 'json'
	});

    // load difficulty levels view
	function loadDifficultyLevelsView(levels) {
		if (levels.length > 0) {
			levels.forEach(function(level) {
                difficultyLevelsForm.find('[name="level'+ level.level_id +'-marks"]').val(level.marks);
            });
		}
	}

    // Get family list
	window.getDifficultyLevels = async function() {
	
		const school_id = await appModule.getCookie('school_id');
		var langCode = localStorage.getItem('language-type');
         languageText(langCode);

		/*showLoader({
            title: 'Please Wait...',
            // text: 'fetching'
        });*/

		$.ajax({
			type: "get",
			url: formApiUrl(`difficulty-level/list/${school_id}`)
		}).done(function (response) {
			if (response.status == true) {
				loadDifficultyLevelsView(response.data);
			} else if (response.status == false) {
				NioApp.Toast("Error Occured", "error");
			} else {
				NioApp.Toast("Invalid response status", "warning");
			}
		}).fail(function (error) {
			NioApp.Toast("Error Occured", "error");
		}).always(function () {
			//hideLoader();
		});
	}

    // Validate Family Form
	NioApp.Validate("#difficultyLevelsForm", {
		onkeyup: function (element) {
			$(element).valid();
		},
		onclick: function (element) {
			$(element).valid();
		},
		errorElement: "span",
		errorClass: "invalid",
		errorPlacement: function errorPlacement(error, element) {
			if (element.parents().hasClass("input-group")) {
				error.appendTo(element.parent().parent());
			} else {
				error.appendTo(element.parent());
			}
		},
	});

    // Family Form submit
	difficultyLevelsForm.on("submit", async function (e) {
		e.preventDefault();
		let btnSubmit = $('#btn-update');
        let difficultyLevels = [];
		let btnSubmitText = btnSubmit.html();
		// Changed button attribute after submit
		btnSubmit.attr('disabled', true).html('Loading...');

		var formData = new FormData(difficultyLevelsForm[0]);
		const school_id = await appModule.getCookie('school_id');
        for(let i=1; i<=10; i++) {
            difficultyLevels.push({
                level_id: i,
                marks: formData.get(`level${i}-marks`)
            });
        }	

		if (difficultyLevelsFormValidator.valid()) {
			showLoader({
				title: 'Please Wait...',
				// text: 'updaing'
			});

			$.ajax({
				type: 'patch',
				url: formApiUrl('update-difficulty-level'),
				data: {
                    school_id: school_id,
			        difficulty_levels: difficultyLevels
                },
                beforeSend: function () {
                    $("#loader").fadeIn();
                },
			}).done(function (response) {
                if(response.status == true) {
                    NioApp.Toast(response.message, "success");
                    getDifficultyLevels();
                } else if (response.status == false) {
					NioApp.Toast(response.message, "error");
				} else {
					NioApp.Toast("Invalid response status", "warning");
				}
			})
			.fail(function (error) {
				NioApp.Toast("Error Occured", "error");
			})
			.always(function () {
                hideLoader();
				btnSubmit.attr('disabled', false).html(btnSubmitText);
			});
		}
	});

    $('#btn-cancel').click(function(e) {
        e.preventDefault();

        getDifficultyLevels();
    });
});