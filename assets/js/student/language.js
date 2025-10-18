
$(function() {

	const elelanguage = $("#main-language");
	var languageDetail = {};

	
	// Ajax request setup
	$.ajaxSetup({
		headers: {
			'Authorization': `Bearer ${appModule.getToken()}`
		},
		dataType: 'json'
	});

	
	// load language view
	function loadlanguageView(items) {
		brEle = '';
		if (items.length > 0) {

			elelanguage.html(`<div class="row g-gs">
                     <div class="col-lg-6"></div>
                     <div class="col-lg-6"></div>
                     <div class="col-lg-12"></div>
							 <div class="row language box-language" id="language">`);
			i=0;
			items.forEach((item) => {

				   if (i % 3 == 0 && i != 0){
				   	brEle = '<br><br><br>';
				   }
				   
				  /*if(item.language_name == 'English'){
				  	$("#language").append(`<div class="col-lg-3">    
                           <div class=""><a  class="btn btn-lg btn-outline-primary" onclick='begin(${item.id})'>${item.language_name}</a></div>
                        	</div>${brEle}`);
				  }else{
				  	$("#language").append(`<div class="col-lg-3">    
                           <div class=""><a  class="btn btn-lg btn-outline-primary" style="cursor:text;">${item.language_name}</a></div>
                        	</div>${brEle}`);
				  }*/
				  $("#language").append(`<div class="col-lg-3">    
                           <div class=""><a  class="btn btn-lg btn-outline-primary" onclick='begin(${item.id},"${item.language_code}")'>${item.language_name} ${item.native_language_name ? '/' : ''} ${item.native_language_name}</a></div>
                        	</div>${brEle}`);
				
				i++
			});

			$("#language").after('<div class="col-lg-12"></div></div>');


		} else {
			elelanguage.html(`<div class="nk-tb-item-empty">
                     <p class="text-center text-black fw-bold"> No language Available</p>
                  </div>`);
		}
	}

	// Get language list
	window.getLanguages = async function(option = {}) {
	
		const school_id = await appModule.getCookie('school_id');
		
		$.ajax({
			type: "get",
			url: formApiUrl(`get-valid-languages/${$.cookie('license_type_id')}/${$.cookie('sub_license_type_id')}`),
			beforeSend: function () {
				$("#loader").fadeIn();
			},
		}).done(function (response) {
			if (response.status == true) {
				loadlanguageView(response.data);
			} else if (response.status == false) {
				NioApp.Toast("Error Occured", "error");
			} else {
				NioApp.Toast("Invalid response status", "warning");
			}
		}).fail(function (error) {
			NioApp.Toast("Error Occured", "error");
		}).always(function () {
			$("#loader").fadeOut();
		});
	}

	NioApp.Validate("#examinationForm", {
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


	

});
