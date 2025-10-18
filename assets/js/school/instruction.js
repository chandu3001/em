 $(function() {



    const eleinstructions = $("#instructions");

	const eleinstructionsPagination = $("#instructions-pagination");

	const instructionModalElm = $("#instructionModal");

	const instructionForm = $("#instructionsForm");



    var instructionModal = new bootstrap.Modal(

		document.getElementById("instructionModal"),

		{

			backdrop: "static",

			keyboard: false,

		}

	);

    var page = 1;

    var pageSize = 10;

    window.instructionList = async function(pageNumber = page, option = {}) {

        let params = '';

        page = pageNumber;

        var sortby = option.sortBy;

        const school_id = await appModule.getCookie('school_id');

        params = {
            'page': page
        };

        showLoader({

            title: 'Please Wait'

        });

        $.ajax({

            type: "GET",

            url: formApiUrl(`language/${school_id}/pagination`, {params: params}),

        }).done(({ data }) => {

            if(data.total > 0)

            {

                $("#instructions").html(`<div class="list-area nk-tb-list nk-tb-ulist">

                    <div class="nk-tb-item nk-tb-head">

                    <div class="nk-tb-col"><span class="text-black fw-bold">Sl.No</span></div>

                    <div class="nk-tb-col text-start"><span class="text-black fw-bold">Language</span></div>

                    <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold">Action</span></div>
                    </div>
                </div>`);

                data.data.forEach((item) => {

                    $("#instructions .list-area").append(

                        `<div class="nk-tb-item details">

                            <div class="nk-tb-col tb-col-md">${data.from++}</div>

                            <div class="nk-tb-col">

                                <div class="">

                                    <div class="user-info text-start">
                                        <span class="tb-lead">${item.language_name}</span>
                                    </div>
                                </div>
                            </div>
                    
                                <div class="nk-tb-col nk-tb-col-tools">

                                <ul class="">

                                    <li>

                                        <div class="drodown">

                                            <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown">

                                                <em class="icon ni ni-more-h"></em>

                                            </a>

                                        <div class="dropdown-menu dropdown-menu-end">

                                            <ul class="link-list-opt no-bdr">

                                               <!-- <li>

                                                    <a href="${formUrl('school/languages/view', { id: item.id})}">

                                                        <em class="icon ni ni-eye"></em><span class="">View Details</span>

                                                    </a>

                                                </li>-->

                                                <li>

                                                    <a href="javascript:void(0)" class="btn-edit-instruction" data-language="${item.id}">

                                                        <em class="icon ni ni-edit"></em><span>Edit Instruction</span>

                                                    </a>

                                                </li>

                                            </ul>

                                        </div>

                                    </div>

                                </li>

                                </ul>

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

            

        });

    }

    

    /* $("#sort-by").on("change", function(e){
        instructionList(page, {
            sortBy: $(this).val()
         })
    })


    $("#instructions").on('click', '.btn-delete-instruction', function(e) {

        const id = $(e.currentTarget).data('instruction');
        var instruction_id = $(this).attr("data-instruction");

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
                    text: 'Deleting Data'
                });

                $.ajax({

                    type: "delete",
                    url: formApiUrl("delete-instruction"),
                    data: {
                        id: instruction_id,
                    }

                }).done(({ data, errors }) => {

                    if (!errors) {

                        if(parseValue($("#instruction .nk-tb-item.details").length) == 1 && page != 1) {
                            --page;
                        }

                        NioApp.Toast('instruction deleted successfully', "success");

                        instructionList(page);

                    } else {
                        NioApp.Toast("Something went wrong", "error");
                    }

                }).fail(({ statusText }) => {

                    NioApp.Toast(statusText, "error");

                }).always(function() {

                    
                });
            }

        });

    });



    $("#instructions").on('click', '.btn-change-status', function(e) {

        const id = $(e.currentTarget).data('instruction');
        var lang_status = $(this).attr("data-status");

        Swal.fire({

            title: "Are you sure?",

            text: "Are you sure you want to "+ (status == "Activated" ? "Deactivate" : "Activate"),

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
                    text: 'Updating Status'
                });

                $.ajax({
                    type: "patch",
                    url: formApiUrl("update-instruction-status/"),
                    data: {
                        id: id,
                        status:lang_status == 1 ? 0 : 1,
                    }
                })

                .done(({ status, message }) => {

                    if (status) {

                        instructionList();

                        setTimeout(() => {

                            NioApp.Toast(message, "success");

                        }, 1000);

                    } else {

                        NioApp.Toast("Something Went Wrong", "error");

                    }

                })

                .fail(({ statusText }) => {

                    NioApp.Toast(statusText, "error");

                }).always(function() {

                    

                });

            }

        })

       

    });*/



    // Validate Student Form

	NioApp.Validate("#instructionsForm", {

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

	/*$('[data-bs-dismiss="modal"]').on("click", function () {

		instructionModalElm.find(".modal-body .modal-title").html("Student");

		instructionForm

			.removeAttr("action")

			.removeAttr("method")

            .removeAttr("data-type");

		instructionForm[0].reset();

		instructionFormValidator.resetForm();

	});*/



	$('#btn-instruction').on("click", async function (e) {

		e.preventDefault();

        let formData = new FormData(instructionForm[0]);

        const school_id =await appModule.getCookie('school_id');;

        let formDatas = {
            school_id: school_id,
            instruction: $("#mytextarea").text(),
            language_id: formData.get('language_id')
        }

        langID = $('#btn-instruction').attr('data-instruction');
       
        // Append instruction id if exist
        if(langID != '') {
            formDatas['id'] = $('#btn-instruction').attr('data-instruction');
        }
        

        if (instructionForm.valid()) {

            showLoader({
                title: 'Please Wait',
                // text: 'Saving Data'
            });

            $.ajax({

                type: instructionForm.attr('method'),

                url: instructionForm.attr('action'),

                data: formDatas,

            }).done(function({ data, errors }) {

                if (!errors) {

                    if(instructionForm.attr('data-type') == 'add') {

                        NioApp.Toast('instruction added successfully', "success");

                    } else {

                        NioApp.Toast('instruction updated successfully', "success");

                    }

                    console.log(instructionForm.attr('data-type'));

                    instructionList();

                    instructionForm

                        .removeAttr("action")

                        .removeAttr("method")

                        .removeAttr("data-type");

                    instructionForm[0].reset();
                    instructionModal.hide();                    

                } else {

                    NioApp.Toast("Something Went Wrong", "error");

                }

            }).catch(function(error) {

                NioApp.Toast(error, "error");

            }).always(function() {

                

            });

        }

    });


    // add new instruction

	$("#btn-add-instruction").click(function () {

		instructionModalElm.find(".modal-body .modal-title").html("Add instruction");

		instructionForm

			.attr("action", formApiUrl(`add-instruction`))

			.attr("method", 'post')

            .attr("data-type", 'add');

		instructionForm

			.find('[type="submit"]')

			.removeAttr('data-instruction')

			.html('Add');

		instructionModal.show();

	});

    // Edit instruction
    $(eleinstructions).on("click", ".btn-edit-instruction", function (e) {

		e.preventDefault();

		var language_id = $(this).attr("data-language");

        $.ajax({
            url: formApiUrl(`get-instruction-by-language-id/${language_id}`),
            type: "get",

        }).done(async function ({ errors, data }) {

            if (!errors) {
                
                        instructionForm

                            .attr("action", formApiUrl("update-instruction"))

                            .attr("method", 'patch')

                            .attr("data-type", 'edit');

                        instructionForm

                            .find('[name="language_id"]')

                            .val(data.language_id);
                       
                         tinyMCE.activeEditor.setContent(data.instruction);


                        $('#btn-instruction').attr('data-instruction', data.id)
                        $('#btn-instruction').html('Update');

                        instructionModalElm.find(".modal-title").html("Edit instruction");

                        instructionModal.show();

                        console.log(instructionForm.attr('data-type')); 

                    } else {

                        NioApp.Toast(data.message, "error");

                    }
        }).fail(function (jqXHR, textStatus, errorThrown) {

            NioApp.Toast(`${textStatus} <br />${errorThrown}`, "error");

        })



	});

    
    });

