$(function() {



    const elelanguages = $("#languages");

	const elelanguagesPagination = $("#languages-pagination");

	const languageModalElm = $("#languageModal");

	const languageForm = $("#languagesForm");

  // Ajax request setup
    $.ajaxSetup({
        headers: {
            'Authorization': `Bearer ${appModule.getToken()}`
        },
        dataType: 'json'
    });

    var languageModal = new bootstrap.Modal(

		document.getElementById("languageModal"),
		{
			backdrop: "static",
			keyboard: false,
		}
	);

    var page = 1;
    var pageSize = 10;
    var query = '';
    var sortby = 0;

    window.languageList = async function(pageNumber = page, option = {}) {

        let params = '';

        page = pageNumber;

        sortby = option.sortby ? option.sortby : sortby;

        pageSize = option.pageSize ? option.pageSize : pageSize;

        query = option.q ? option.q : query;
        
        const school_id = await appModule.getCookie('school_id');

        params +=`page=${page}&sortby=${sortby}&pageSize=${pageSize}&${query}`
        $('.dropdown-menu').removeClass('show');
        $('.filter-wg').removeClass('show');
        
        /*showLoader({

            title: 'Please Wait'

        });*/

        $.ajax({

            type: "GET",

            url: formApiUrl(`language/${school_id}/pagination?${params}`),

        }).done(({ data }) => {

            if(data.total > 0)

            {   
                var langCode = localStorage.getItem('language-type');
                languageText(langCode);
                if(langCode == 2){
                     $("#preloader2").show();
                       setTimeout(function () {
                          setTimeout(function () {
                              $("#preloader2").hide();
                          }, 1000);
                       }, 500);
                   }
                $("#tot-language").text(`Total ${data.total} languages`)

                $("#languages").html(`<div class="list-area nk-tb-list nk-tb-ulist lang-det-list">

                    <div class="nk-tb-item nk-tb-head">

                    <div class="nk-tb-col"><span class="text-black fw-bold slno">Sl.No</span></div>

                    <div class="nk-tb-col "><span class="text-black fw-bold language-title">Language</span></div>

                    <div class="nk-tb-col"><span class="text-black fw-bold native-lang">Native Language</span></div>

                    <div class="nk-tb-col"><span class="text-black fw-bold status-label">Status</span></div>

                    <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold action">Action</span></div>
                    </div>
                </div>`);

                data.data.forEach((item) => {
                    console.log('def'+item.default_language)
                    if(item.default_language == 1){

                        defaultLang = `<span class="nk-menu-badge default_alignment" style="background: #09c2de;color: white;margin-right: 6px;">Default</span>`;
                    }else{
                        defaultLang = `<span class="nk-menu-badge"></span>`;
                    }

                    $("#languages .list-area").append(

                        `

                        <div class="nk-tb-item details">

                            <div class="nk-tb-col tb-col-md">${data.from++}</div>



                            <div class="nk-tb-col">

                                <div class="">

                                    <div class="user-info ">

                                        <span class="tb-lead">${item.language_name}</span>
                                        ${defaultLang}
                                    </div>

                                </div>

                            </div>

                            <div class="nk-tb-col tb-col-md">${item.native_language_name}</div>
                            <div class="nk-tb-col tb-col-md text-center">
                               <label class="btn ${item.status? "btn-success" : "btn-dim btn-danger"} btn-sm btn-change-status" 
                               data-language="${item.id}" data-status="${item.status}" >${item.status == 1 ? "<span class='active-btn'>Active</span>" : "<span class='inactive-btn'>Inactive</span>"}</label>
                            </div>

                                <div class="nk-tb-col nk-tb-col-tools">
                                ${
                                    item.default_language == 0 ? 
                                `<ul class="">

                                    <li>

                                        <div class="drodown">

                                            <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown">

                                                <em class="icon ni ni-more-h"></em>

                                            </a>

                                        <div class="dropdown-menu dropdown-menu-end">

                                            <ul class="link-list-opt no-bdr">

                                               

                                                <li class='d-none'>

                                                    <a href="javascript:void(0)" class="btn-edit-language" data-language="${item.id}">

                                                        <em class="icon ni ni-edit"></em><span>Edit Language</span>

                                                    </a>

                                                </li>

                                                <li class='d-none'>

                                                    <a href="javascript:void(0)" class="btn-delete-language" data-language="${item.id}">

                                                        <em class="icon ni ni-archive"></em><span>Delete</span>

                                                    </a>

                                                </li>
                                                
                                                    <li><a href="javascript:void(0)" class="btn-default-language" data-language="${item.id}" data-lang-status="${item.status}">
                                                        <em class="icon ni ni-user"></em><span class="default-langs">Default Language</span>
                                                    </a></li>
                                                
                                            </ul>

                                        </div>

                                    </div>

                                </li>

                                </ul>` : ''}

                            </div>

                        </div>

                            `

                    );

                });

                $("#languages-pagination").pagination({

                    items: parseInt(data.total),

                    itemsOnPage: parseInt(data.per_page),

                    currentPage: data.current_page,

                    displayedPages: 3,

                    navStyle: "pagination justify-content-center justify-content-md-start",

                    listStyle: "page-item",

                    linkStyle: "page-link",

                    onPageClick: function (pageNumber, event) {

                        event ? event.preventDefault() : '';

                        page = pageNumber;

                        languageList(pageNumber);

                    },

                });

            }

            else

            {

                $("#languages-pagination").html('');

                $("#languagesList").html(`<h4 class='p-4 text-center'>Data Not Found!</h4>`)

            }

        }).always(function() {

            //hideLoader();

        });

    }

    

     $("#sort-by").change(function(e){
        languageList(page, {
            sortby: $(this).val()
         })
    }) 

    $('#search').change(function(e)
    {
        // e.preventDefault();
        languageList(page,{
            q : $(this).serialize()
        })
    })

    $('#reset-search').click(function(){
        query = "";
        $('#sort-by').select2('val','0');
        languageList();
    })


    /*$("#languagesearchForm").on("submit", function(e){

        e.preventDefault();

        languageList(page,{q: $(this).serialize()})

    })*/

     $("#languages").on('click', '.btn-default-language', function(e) {

        const id = $(e.currentTarget).data('language');
        var language_id = $(this).attr("data-language");
        var language_status = $(this).attr("data-lang-status");

        if(language_status == 0){
             NioApp.Toast('Please activate this language to set it as the default.', "warning");
        }else{

            Swal.fire({

                title: "Set as default language?",

                text: "",

                icon: "warning",

                showCancelButton: true,

                confirmButtonColor: "#3085d6",

                cancelButtonColor: "#d33",

                confirmButtonText: "Yes",

                cancelButtonText: "No",

                focusCancel: true,

            }).then((result) => {

                if (result.isConfirmed) {

                    showLoader({
                        title: 'Please Wait',
                        // text: 'Updating Data'
                    });

                    $.ajax({

                        type: "patch",
                        url: formApiUrl("language/make-default-language"),
                        data: {
                            id: language_id,
                        }

                    }).done(({ status, message }) => {

                        if (status) {

                            languageList();

                            setTimeout(() => {

                                NioApp.Toast(message, "success");

                            }, 1000);

                        } else {

                            NioApp.Toast("Something Went Wrong", "error");

                        }

                    }).fail(({ statusText }) => {

                        NioApp.Toast(statusText, "error");

                    }).always(function() {

                        hideLoader();
                    });
                }

            });
        }
    });

    $("#languages").on('click', '.btn-delete-language', function(e) {

        const id = $(e.currentTarget).data('language');
        var language_id = $(this).attr("data-language");

        Swal.fire({

            title: "Are you sure to delete?",

            text: "You won't be able to revert this!",

            icon: "warning",

            showCancelButton: true,

            confirmButtonColor: "#3085d6",

            cancelButtonColor: "#d33",

            confirmButtonText: "Yes",

            cancelButtonText: "No",

            focusCancel: true,

        }).then((result) => {

            if (result.isConfirmed) {

                showLoader({
                    title: 'Please Wait',
                    // text: 'Deleting Data'
                });

                $.ajax({

                    type: "delete",
                    url: formApiUrl("delete-language"),
                    data: {
                        id: language_id,
                    }

                }).done(({ data, errors }) => {

                    if (!errors) {

                        if(parseValue($("#language .nk-tb-item.details").length) == 1 && page != 1) {
                            --page;
                        }

                        NioApp.Toast('Language deleted successfully', "success");

                        languageList(page);

                    } else {
                        NioApp.Toast("Something went wrong", "error");
                    }

                }).fail(({ statusText }) => {

                    NioApp.Toast(statusText, "error");

                }).always(function() {

                    hideLoader();
                });
            }

        });

    });



    $("#languages").on('click', '.btn-change-status', function(e) {

        const id = $(e.currentTarget).data('language');
        var lang_status = $(this).attr("data-status");

        Swal.fire({

            title: "Are you sure you want to "+ (lang_status == 1 ? "Inactive" : "Active"),

            // text: "Are you sure you want to "+ (lang_status == 1 ? "Deactivate" : "Activate"),

            icon: "warning",

            showCancelButton: true,

            confirmButtonColor: "#3085d6",

            cancelButtonColor: "#d33",

            confirmButtonText: "Yes",

            cancelButtonText: "No",

            focusCancel: true,

        }).then((result)=>{

            if(result.isConfirmed)
            {
                showLoader({
                    title: 'Please Wait',
                    // text: 'Updating Status'
                });

                $.ajax({
                    type: "patch",
                    url: formApiUrl("update-language-status/"),
                    data: {
                        id: id,
                        status:lang_status == 1 ? 0 : 1,
                    }
                })

                .done(({ status, message }) => {

                    if (status) {

                        languageList();

                        setTimeout(() => {

                            NioApp.Toast(message, "success");

                        }, 1000);

                    } else {

                        NioApp.Toast(message, "error");

                    }

                })

                .fail(({ statusText }) => {

                    NioApp.Toast(statusText, "error");

                }).always(function() {

                    hideLoader();

                });

            }

        })

       

    });



    // Validate Student Form

	NioApp.Validate("#languagesForm", {

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





	// Student Form reset on Modal close

	$('[data-bs-dismiss="modal"]').on("click", function () {

		languageModalElm.find(".modal-body .modal-title").html("Student");

		languageForm

			.removeAttr("action")

			.removeAttr("method")

            .removeAttr("data-type");

		languageForm[0].reset();

		languageFormValidator.resetForm();

	});


        var langCodeArr = [];

	$('#btn-language').on("click", async function (e) {

		e.preventDefault();

        let formData = new FormData(languageForm[0]);

        const school_id =await appModule.getCookie('school_id');;
        var langName  = formData.get('name').charAt(0).toUpperCase() + formData.get('name').slice(1);

        $(iso).each(function (index, item) {
           // each iteration
           if(item.name == langName){
                 langCodeArr = item.code;
           }
       });

        let formDatas = {
            school_id: school_id,
            name: formData.get('name'),
            native_name: formData.get('native_name'),
            code: langCodeArr
        }
        
        langID = $('#btn-language').attr('data-language');
       
        // Append language id if exist
        if(langID != '') {
            formDatas['id'] = $('#btn-language').attr('data-language');
        }
        

        if (languageForm.valid()) {

            showLoader({
                title: 'Please Wait',
                // text: 'Saving Data'
            });

            $.ajax({

                type: languageForm.attr('method'),

                url: languageForm.attr('action'),

                data: formDatas,

            }).done(function({ data, errors }) {

                if (!errors) {

                    if(languageForm.attr('data-type') == 'add') {

                        NioApp.Toast('Language added successfully', "success");

                    } else {

                        NioApp.Toast('Language updated successfully', "success");

                    }

                    console.log(languageForm.attr('data-type'));

                    languageList();

                    languageForm

                        .removeAttr("action")

                        .removeAttr("method")

                        .removeAttr("data-type");

                    languageForm[0].reset();
                    languageModal.hide();                    

                } else {

                    NioApp.Toast("Something Went Wrong", "error");

                }

            }).catch(function(error) {

                NioApp.Toast(error, "error");

            }).always(function() {

                hideLoader();

            });

        }

    });


    // add new language

	$("#btn-add-language").click(function () {

		languageModalElm.find(".modal-body .modal-title").html("Add Language");

		languageForm

			.attr("action", formApiUrl(`add-language`))

			.attr("method", 'post')

            .attr("data-type", 'add');

		languageForm

			.find('[type="submit"]')

			.removeAttr('data-student')

			.html('Add');

		languageModal.show();

	});

    

    // Edit language
    $(elelanguages).on("click", ".btn-edit-language", function (e) {

		e.preventDefault();

		var language_id = $(this).attr("data-language");

		$.ajax({

			 url: formApiUrl(`language/${language_id}`),

			type: "get",

			beforeSend: function () {

				showLoader({

                    title: 'Please Wait',

                    // text: 'Fetching Data'

                });

			},

		}).done(async function ({ errors, data }) {

			if (!errors) {

				languageForm

					.attr("action", formApiUrl("update-language"))

					.attr("method", 'patch')

                    .attr("data-type", 'edit');

				languageForm

					.find('[name="name"]')

					.val(data.language_name);

                languageForm

					.find('[name="native_name"]')

					.val(data.native_language_name);

                $('#btn-language').attr('data-language', data.id)
                $('#btn-language').html('Update');

                languageModalElm.find(".modal-title").html("Edit Language");



				// Show student modal

				languageModal.show();

                console.log(languageForm.attr('data-type')); 

			} else {

				NioApp.Toast(data.message, "error");

			}

		})

		.fail(function (jqXHR, textStatus, errorThrown) {

			NioApp.Toast(`${textStatus} <br />${errorThrown}`, "error");

		})

        .always(function () {

            hideLoader();

        });

	});


    var iso =[
      
      {"code":"ar-XA","name":"Arabic","nativeName":"العربية"},
      {"code":"bn-IN","name":"Bengali","nativeName":"বাংলা"},
      {"code":"en-IN","name":"English","nativeName":"English"},
      {"code":"hi-IN","name":"Hindi","nativeName":"हिन्दी, हिंदी"},
      {"code":"kn","name":"Kannada","nativeName":"ಕನ್ನಡ"},
      {"code":"la","name":"Latin","nativeName":"latine, lingua latina"},
      {"code":"ml-IN","name":"Malayalam","nativeName":"മലയാളം"},
      {"code":"ta-IN","name":"Tamil","nativeName":"தமிழ்"},
      {"code":"fil-PH","name":"Tagalog","nativeName":"Wikang Tagalog, ᜏᜒᜃᜅ᜔ ᜆᜄᜎᜓᜄ᜔"},
      {"code":"ur","name":"Urdu","nativeName":"اردو"},
    ]


});

