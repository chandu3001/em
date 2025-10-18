$(function() {



    const eleStudents = $("#students");

    const eleStudentsPagination = $("#students-pagination");

    const studentModalElm = $("#studentModal");

    const studentForm = $("#studentForm");

  

    var studentModal = new bootstrap.Modal(

        document.getElementById("studentModal"),

        {

            backdrop: "static",

            keyboard: false,

        }

    );



   var langCode = localStorage.getItem('language-type');

    

    const getGenderList = async (target = false, selected) => {

        let response;

        $.ajax({

            type: "get",

            url: formApiUrl(`auth/list_gender`, {

                baseUrl: 'https://dsms.technoiq.in/backend/api/'

            }),

            global:false,

            beforeSend: function() {

                $(target).html('');

            }

        }).then(function({ data, errors }) {

            if (!errors) {

                if(target) {

                    data.result.forEach((item) => {

                        $(target).append(`<div class="custom-control custom-radio me-2" onclick="genderIs();">

                            <input type="radio" class="custom-control-input" data-msg="Gender is required" name="gender" value="${item.id}" ${(item.id == selected) && 'checked'} required />

                            <label class="custom-control-label" for="reg-female">${item.name}</label>

                        </div>`);

                    });



                } else {

                    response = data.result;

                }

            } else {

                alert("something went wrong")

            }

        });


        return response;

    };



    const getLicenseTypes = async (target = false, options = {}) => {

        let response;

        const option = Object.assign({}, {

            gender_id: 0,

            selected: 0

        }, options);



        // Reset target selectbox

        $(target).html('')

            .append('<option value="">Select License</option>')

        

        $.ajax({

            type: "get",

            url: formApiUrl(`auth/main_licenses_home/${appModule.getCookie('school_id')}`, {

                baseUrl: 'https://dsms.technoiq.in/backend/api/'

            }),

            global: false

        }).then(function({ data, errors }) {

            if (!errors) {

                if(target) {

                    if(data.result.length > 0) {

                        data.result.forEach((item) => {

                            $(target).append(`<option ${(item.id == option.selected) && 'selected'} value='${item.id}'>

                                ${item.name}

                            </option>`);

                        });

                    }

                } else {

                    response = data.result;

                }

            } else {

                alert("something went wrong")

            }

        });

        return response;

    };



    const getLevelsList = async (target = false, options = {}) => {

        let response;

        const option = Object.assign({}, {

            license_type_id: 0,

            selected: 0

        }, options);



        // Reset target selectbox

        $(target).html('')

            .append('<option value="">Select Level</option>')

        const items = [

            { id:1, name:'Beginner' },

            { id:2, name:'Intermediate' },

            { id:3, name:'Expert' }

        ];

        if(option.license_type != 0) {

            items.forEach((item) => {

                $(target).append(`<option ${(item.id == option.selected) && 'selected'} value='${item.id}'>

                    ${item.name}

                </option>`);

            }); 

        }

        return response;

    };



    const getPlansList = async (target = false, options = {}) => {

        let response;

        console.log("sdhcj\dshj", options);

        const option = Object.assign({}, {

            license_type_id: $('#license-type-selectbox').val(),

            level_id: $('#level-selectbox').val(),

            school_id: appModule.getCookie('school_id'),

            selected: options.selected ? options.selected : 0

        }, options);

        

        // Reset selectbox

        $('#plans-selectbox').html('')

                .append('<option value="">Select Plan</option');



        if(parseValue(option.license_type_id) == '' && parseValue(option.level_id) == '') {

            return false;

        }



        $.ajax({

            type: "post",

            url: formApiUrl(`auth/get_subscriptionplans_home`, {

                baseUrl: 'https://dsms.technoiq.in/backend/api/'

            }),

            data: {

                'school_id': option.school_id,

                'level_id': option.level_id,

                'license_type_id': option.license_type_id

            },

            global: false,

        }).then(function({ data, errors }) {

            if (!errors) {

                if(target) {

                    if(data.result.length > 0) {

                        data.result.forEach((item) => {

                            $(target).append(`<option ${(item.id == option.selected) && 'selected'} value='${item.id}'>

                                ${item.name}

                            </option>`);

                        });

                    }

                } else {

                    response = data.result;

                }

            } else {

                alert("something went wrong")

            }

        });

        return response;

    };


    const getSubLicenseList = (target = false,options = {}) => {
           let response;

           const option = Object.assign({}, {

            license_type_id: $('#license-type-selectbox').val(),

            selected: 0

        }, options);

           // Reset element content
           $(target).html('').append('<option value="">Select</option>');
           
           $.ajax({
              type: "get",
              async: false,
              global: false,
              url: 'https://dsms.technoiq.in/backend/api/auth/sub_license_list/'+option.license_type_id,
              
              success: function ({ data, errors }) {
                 if (!errors) {
                        $(target).html(`<option value="">Select Sub License</option>`).prop('disabled', false);

                       if(target) {

                          data.result.sub_license_list.forEach((item) => {
                             $(target).append(`<option ${(item.id == option.selected) && 'selected'} value='${item.id}'>${item.name}</option>`)
                          });
                       } else {
                          response = data.result;
                       }
                 } else
                 {
                    //NioApp.Toast("Sub License is not available.", "error")
                    $(target).html(`<option value="">Sub License Not Available!</option>`).prop('disabled', true);
                    
                 }
              }
           });
            return response;
    }



    getLicenseTypes("#license-filter");





    // Gender change event

    $('#gender-list-area').on('click', '.custom-control-label', function(e) {

        $('#gender-list-area').find('.custom-control-input').removeAttr('checked');

        $(e.currentTarget).parent().find('.custom-control-input').attr('checked', true);



        getLicenseTypes('#license-type-selectbox', {

            gender_id: $(e.currentTarget).parent().find('.custom-control-input').val()

        });

        $('#level-selectbox')

            .html('')

            .append('<option value="">Select Plan</option>');;

        $('#plans-selectbox')

            .html('')

            .append('<option value="">Select Plan</option>');

    });



    // Level change event

    $('#license-type-selectbox').on('change', function(e) {

        getSubLicenseList("#sub-license-selectbox",{license_type_id: e.target.value});

        getLevelsList('#level-selectbox', {

            license_type_id: e.target.value

        });

        $('#plans-selectbox')

            .html('')

            .append('<option value="">Select Plan</option>');

    });



    // Level change event

    $('#level-selectbox').on('change', function(e) {

        getPlansList('#plans-selectbox');

    });



    var page = getUrlParam('page') ? getUrlParam('page') : 1;

    var filters = '';

    var pageSize = 10;

    var query = '';

    var sortby = 0;

    window.studentList = function(pageNumber = page, option = {}) {

        let params = '';

        page = pageNumber;

        urlPage(page)

        if(option.clear)
        {
            filters = '';
        }

        sortby = option.sortBy ? option.sortBy : sortby;

        pageSize = option.pageSize ? option.pageSize : pageSize;

        filters = option.filter ? option.filter : filters;

        query = option.q ? option.q : query;

        localStorage.setItem(location.hostname+location.pathname, page)

        params +=`page=${page}&sortby=${sortby}&pageSize=${pageSize}&${filters}&${query}`;



        /*showLoader({

            title: 'Please Wait...'

        });*/

        $.ajax({

            type: "GET",

            url: `${api_base_url}students-by-school-id/${$.cookie("school_id")}?${params}`,

        }).done(({ data }) => {

            if(data.total > 0)

            {
                var langCode = localStorage.getItem('language-type');
                languageText(langCode);

                $("#total-students").text(`Total ${data.total} Students`)

                $("#studentList").html(`<div class="nk-tb-item nk-tb-head student-det-list">

                    <div class="nk-tb-col"><span class="text-black fw-bold slno">Sl.No</span></div>

                    <div class="nk-tb-col"><span class="text-black fw-bold student-title">Student</span></div>

                    <div class="nk-tb-col"><span class="text-black fw-bold mobile">Contact No</span></div>

                    <div class="nk-tb-col"><span class="text-black fw-bold email">Email</span></div>

                    <div class="nk-tb-col"><span class="text-black fw-bold license-type">License Type</span></div>

                    <div class="nk-tb-col"><span class="text-black fw-bold sub-name">Sub License Type</span></div>

                    <div class="nk-tb-col"><span class="text-black fw-bold status-label">Status</span></div>

                    <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold action">Action</span></div>

                </div>`);
                if(langCode == 2){
                    $('.student-det-list div span').text('');
                }
                data.data.forEach((item) => {

                    $("#studentList").append(

                        `

                        <div class="nk-tb-item details">

                            <div class="nk-tb-col tb-col-md">${data.from++}</div>



                            <div class="nk-tb-col">

                                <div class="">

                                    <div class="user-info">

                                        <span class="tb-lead">${item.first_name_english} ${item.second_name_english}</span>

                                        <span>Student ID: ${item.id}
                                        <br>National ID: ${item.national_id}</span>
                                        

                                    </div>

                                </div>

                            </div>

                                <div class="nk-tb-col tb-col-md">${item.phone}</div>

                                <div class="nk-tb-col tb-col-md">${item.email}</div>

                                <div class="nk-tb-col tb-col-md">${item.license_name}</div>

                                <div class="nk-tb-col tb-col-md">${item.sub_license_name}</div>

                                <!--<div class="nk-tb-col tb-col-md">${item.no_of_attempts}</div>-->

                                <div class="nk-tb-col tb-col-md">

                                ${

                                    item.status

                                    ? `<button title="Student is Activated" type="button"

                                    class="btn btn-sm btn-success details btn-change-status active-btn active_padding" 

                                    data-student="${item.id}" style="background:#1abe92;border:none; padding: 5px 17px">Active</button>`

                                    : `<button title="Student is Deactivated" type="button"

                                    class="btn btn-sm details btn-dm btn-danger btn-change-status inactive-btn inactive_padding"

                                        data-student="${item.id}">Inactive</button>`

                                }

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

                                                <li>

                                                    <a href="${formUrl('school/students/view', { student_id: item.id})}">

                                                        <em class="icon ni ni-eye"></em><span class="view-detail">View Details</span>

                                                    </a>

                                                </li>

                                                <li>

                                                    <a href="javascript:void(0)" class="btn-edit-student" data-student="${item.id}">

                                                        <em class="icon ni ni-edit"></em><span id="edit-student" class="edit-student">Edit Student</span>

                                                    </a>

                                                </li>

                                                <li>

                                                    <a href="javascript:void(0)" class="btn-delete-student" data-student="${item.id}">

                                                        <em class="icon ni ni-archive"></em><span class="delete">Delete</span>

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

                $("#students-pagination").pagination({

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

                        studentList(pageNumber);
                        // urlPage(page)

                    },

                });

            }

            else

            {

                $("#students-pagination").html('');

                $("#studentList").html(`<h4 class='p-4 text-center'>Data Not Found!</h4>`)

            }

        }).always(function() {

            //hideLoader();

        });

    }

    

    $("#sort-by").on("change", function(e){

        studentList(page,{sortBy: e.currentTarget.value})

    })



    $("#filter-form").on("submit", function(e){

        e.preventDefault();

        studentList(1,{filter: $(this).serialize()})

    })



    $("#studentSearchForm").on("submit", function(e){

        e.preventDefault();

        studentList(page = 1,{q: $(this).serialize()})



    })

    $('#form_clear').on('click',function()
    {
        ($('#filter-form')[0]).reset();
        $('#stat').select2('val','null');
        $('#license-filter').select2('val','null');
        studentList(1,{clear : true});
    })

    


    $('#btn-refresh-students').click(function(e) {

        e.preventDefault();

        filters = '';

        query = '';

        studentList();

    });

    $("#reset-search").click(function(e) {
        query = '';
        $('#sort-by').select2('val',0);
        studentList(1);
    })



    $("#studentList").on('click', '.btn-delete-student', function(e) {

        const id = $(e.currentTarget).data('student');

        

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

                    url: `https://dsms.technoiq.in/backend/api/auth/student/delete/${id}`,

                }).done(({ data, errors }) => {

                    if (!errors) {

                        if(parseValue($("#studentList .nk-tb-item.details").length) == 1 && page != 1) {

                            --page;

                        }

                        NioApp.Toast(data.message, "success");

                        studentList(page);

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



    $("#studentList").on('click', '.btn-change-status', function(e) {

        const id = $(e.currentTarget).data('student');

        const status = $(e.currentTarget).html();





        Swal.fire({

            title: "Are you sure you want to "+ (status == "Active" ? "Inactive" : "Active"),

            // text: "Are you sure you want to "+ (status == "Active" ? "Inactive" : "Active"),

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

                    type: "get",

                    url: `https://dsms.technoiq.in/backend/api/auth/student_status/${id}`,

                })

                .done(({ status, message }) => {

                    if (status) {

                        studentList();

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

                    hideLoader();

                });

            }

        })

       

    });



    // Validate Student Form

    NioApp.Validate("#studentForm", {

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



    function addPasswordRule() {

        $('#password').rules('add', {

            required: true

        });

        $('#confirm-password').rules('add', {

            required: true,

            equalTo: '#password',
            messages: {
                equalTo: "Password is not match",
            }

        });

    }

    function removePasswordRule() {

        $('#password').rules('remove', 'required');

        $('#confirm-password').rules('remove', 'required equalTo');

    }



    // Student Form reset on Modal close

    $('[data-bs-dismiss="modal"]').on("click", function () {

        studentModalElm.find(".modal-body .modal-title").html("Student");

        studentForm

            .removeAttr("action")

            .removeAttr("method")

            .removeAttr("data-type");

        studentForm[0].reset();

        studentFormValidator.resetForm();

        $('#customFile').parent().find('.form-file-label').html('Choose file');

    });



    // Student Form submit

    studentForm.on("submit", async function (e) {

        e.preventDefault();

        let formData = new FormData(studentForm[0]);

        formData.append('school_id', appModule.getCookie('school_id'));

        formData.append('first_name_arabic', formData.get('first_name_english'));

        if(formData.get('photo').name == '') {

            formData.delete('photo');

        }

       

        if (studentFormValidator.valid()) {

            showLoader({

                title: 'Please Wait',

                // text: 'Saving Data'

            });



            $.ajax({

                type: studentForm.attr('method'),

                url: studentForm.attr('action'),

                data: formData,

                processData: false,

                contentType: false,

                cache: false

            }).done(function({ data, errors }) {

                if (!errors) {

                    if(studentForm.attr('data-type') == 'add') {

                        NioApp.Toast('Student added successfully', "success");

                    } else {

                        NioApp.Toast(data.message, "success");

                    }

                    console.log(studentForm.attr('data-type'));

                    studentList();

                    studentModalElm.find(".modal-body .modal-title").html("Student");

                    studentForm

                        .removeAttr("action")

                        .removeAttr("method")

                        .removeAttr("data-type");

                    studentForm[0].reset();

                    studentFormValidator.resetForm();

                    studentModal.hide();                    

                } else {

                    NioApp.Toast("Something Went Wrong", "error");

                }

            }).catch(function({status, responseJSON, statusText}) {
                if(status == 422)
                {
                    const errors = responseJSON.errors;
                    for(error in errors)
                    {
                        console.log(error);
                        errors[error].forEach(err=>{
                            NioApp.Toast(err, 'error')
                        })
                    }
                }else
                NioApp.Toast(statusText, "error");

            }).always(function() {

                hideLoader();

            });

        }

    });



    // Preview image upload

    window.loadImagePreview = function(type= 'single', options) {

        const option = Object.assign({}, {

            'fileEvent': '',

            'previewTarget': '#preview',

            'previewLink': ''

        }, options);



        // Empty preview block

        if(type == 'single') {

            $(option.previewTarget).html('');

        }



        if(parseValue(option.fileEvent) != '') {

            let file = option.fileEvent.target.files[0];

            if(file) {

                let reader = new FileReader();



                reader.onload = function(e) {

                    $(option.previewTarget).append(`<div class="col-3 my-2 preview-image">

                        <div class="position-relative img-thumbnail">

                            <a href="javascript:void(0)" class="btn-remove-preview new position-absolute top-0 start-100 translate-middle text-danger">

                                <em class="icon ni ni-cross"></em>

                            </a>

                            <img class="img-fluid d-block m-auto" src="${e.target.result}" alt="Preview Image" />

                        </div>

                    </div>`)

                }



                reader.readAsDataURL(option.fileEvent.target.files[0]);

            }

        }



        if(parseValue(option.previewLink) != '') {

            $(option.previewTarget).append(`<div class="col-3 my-2 preview-image">

                <div class="position-relative img-thumbnail">

                    <a href="javascript:void(0)" data-srcset="${option.previewLink}" class="btn-remove-preview exist position-absolute top-0 start-100 translate-middle text-danger">

                        <em class="icon ni ni-cross"></em>

                    </a>

                    <img class="img-fluid d-block m-auto" src="https://dsms.technoiq.in/backend/public/uploads/students/${option.previewLink}" alt="Preview Image" />

                </div>

            </div>`);

        }

    }



    studentForm.find('[name="photo"]').change(function(event) {

        loadImagePreview('single', {

            'previewTarget': '#preview-photo .preview-block',

            'fileEvent': event

        });

    });



    $('#preview-photo').on('click', '.btn-remove-preview', function(e) {

        e.preventDefault();



        if($(e.currentTarget).hasClass('exist') == true) {

            const previewLink = $(e.currentTarget).data('srcset');

            $(e.currentTarget).parent().parent().html(`<input type="hidden" name="remove_photo" value="${previewLink}" />`);

        } else {

            $(e.currentTarget).parent().remove();

        }

        studentForm.find('[name="photo"]').val('');

        studentForm.find('.form-file .form-file-label').html('Choose File');

        

    });



    // add new student

    $("#btn-add-student").click(function () {
                languageText(langCode);

        studentModalElm.find(".modal-body .modal-title").html("Add Student");

        studentForm

            .attr("action", formApiUrl(`auth/student_registration_backend`, {

                baseUrl: 'https://dsms.technoiq.in/backend/api/'

            }))

            .attr("method", 'post')

            .attr("data-type", 'add');

        studentForm

            .find('[type="submit"]')

            .removeAttr('data-student')

            .html('Add').addClass('add');

        addPasswordRule();

        getGenderList('#gender-list-area');

        $('#customFile').parent().find('.form-file-label').html('Choose file');

        $('#preview-photo .preview-block').html('');

        studentModal.show();

    });

    

    // Edit student

    $('#studentList').on("click", ".btn-edit-student", function (e) {

        e.preventDefault();



        var student_id = $(this).attr("data-student");



        $.ajax({

            url: formApiUrl(`auth/student/details/${student_id}`, {

                baseUrl: 'https://dsms.technoiq.in/backend/api/'

            }),

            type: "get",

            beforeSend: function () {

                showLoader({

                    title: 'Please Wait',

                    // text: 'Fetching Data'

                });

            },

        }).done(async function ({ errors, data }) {

            if (!errors) {

                // Set student Info
                languageText(langCode);

                studentForm

                    .attr("action", formApiUrl(`auth/student/update/${data.result.student_id}`, {

                        baseUrl: 'https://dsms.technoiq.in/backend/api/'

                    }))

                    .attr("method", 'post')

                    .attr("data-type", 'edit');

                studentForm

                    .find('[name="first_name_english"]')

                    .val(data.result.first_name_english);

                studentForm

                    .find('[name="second_name_english"]')

                    .val(data.result.second_name_english);

                studentForm

                    .find('[name="email"]')

                    .val(data.result.email);

                studentForm

                    .find('[name="mobile"]')

                    .val(data.result.phone);

                studentForm

                    .find('[name="dob"]')

                    .val(moment(data.result.dob).format('DD/MM/YYYY'));

                studentForm

                    .find('[name="city"]')

                    .val(data.result.city);

                

                studentForm

                    .find('[name="id_type"]').html(`
                        <option value="" >Select</option>
                        <option value="0" ${data.result.id_type == 0 ? 'selected' : ''}>Aadhar</option>
                        <option value="1" ${data.result.id_type == 1 ? 'selected' : ''}>PAN</option>
                        <option value="2" ${data.result.id_type == 2 ? 'selected' : ''}>License</option>
                        <option value="3" ${data.result.id_type == 3 ? 'selected' : ''}>Passport</option>
                    `)

                    

                studentForm

                    .find('[name="id_number"]')

                    .val(data.result.id_number);

                studentForm

                    .find('[name="username"]')

                    .val(data.result.username);

                

                if(parseValue(data.result.student_photo) != '') {

                    loadImagePreview('single', {

                        'previewTarget': '#preview-photo .preview-block',

                        'previewLink': data.result.student_photo

                    });

                } else {

                    studentForm.find("#preview-photo .preview-block").html('');

                }



                studentForm

                    .find('[type="submit"]')

                    .attr('data-student', data.id)

                    .html('Update').addClass('update');

                studentModalElm.find(".modal-body .modal-title").html("Edit student").addClass('edit-student');

                $('.student-modal-title').attr('id', 'edit-student-modal');


                // Show student modal

                studentModal.show();

                removePasswordRule();

                await getGenderList('#gender-list-area', data.result.gender);

                await getLicenseTypes('#license-type-selectbox', {

                    gender_id: data.result.gender,

                    selected: data.result.license_type

                });


                await getSubLicenseList('#sub-license-selectbox', {
                    
                    "license_type_id": data.result.license_type,

                    "sub_license_type_id": data.result.sub_license,

                    "selected": data.result.sub_license

                });

                await getLevelsList('#level-selectbox', {

                    "license_type_id": data.result.license_type,

                    "selected": data.result.level

                });

                await getPlansList('#plans-selectbox', {

                    "level_id": data.result.level,

                    "license_type_id": data.result.license_type,

                    "selected": data.result.subscription_id

                });

                console.log(studentForm.attr('data-type')); 

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
    
    
    $('select').on('change', function() {

        selectedID = $('select[name="id_type"]').find(":selected").val()
        selectedLicense= $('select[name="license_type"]').find(":selected").val()
        selectedLevel= $('select[name="level_id"]').find(":selected").val()
        selectedPlan= $('select[name="subscription_id"]').find(":selected").val()

          if(selectedID != ''){
            $('#id-type-error').hide();
          }
          if(selectedLicense != ''){
            $('#license-type-selectbox-error').hide();
          }
          if(selectedLevel != ''){
            $('#level-selectbox-error').hide();
          }
          if(selectedPlan != ''){
            $('#plans-selectbox-error').hide();
          }

    });

    

});

function genderIs(){
    $('#gender-error').hide();
}