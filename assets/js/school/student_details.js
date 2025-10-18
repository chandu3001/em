$(function () {


    const studentModalElm = $("#studentModal");

    const studentForm = $("#studentForm");

    getLicenseTypes("#license-filter");

    // Gender change event

    $('#gender-list-area').on('click', '.custom-control-label', function (e) {

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

    $('#license-type-selectbox').on('change', function (e) {

        getSubLicenseList("#sub-license-selectbox", { license_type_id: e.target.value });

        getLevelsList('#level-selectbox', {

            license_type_id: e.target.value

        });

        $('#plans-selectbox')

            .html('')

            .append('<option value="">Select Plan</option>');

    });



    // Level change event

    $('#level-selectbox').on('change', function (e) {

        getPlansList('#plans-selectbox');

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

            equalTo: '#password'

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

        if (formData.get('photo').name == '') {

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

            }).done(function ({ data, errors }) {

                if (!errors) {

                    if (studentForm.attr('data-type') == 'add') {

                        NioApp.Toast('Student added successfully', "success");

                    } else {

                        NioApp.Toast(data.message, "success");

                    }

                    console.log(studentForm.attr('data-type'));


                    studentModalElm.find(".modal-body .modal-title").html("Student");

                    studentForm

                        .removeAttr("action")

                        .removeAttr("method")

                        .removeAttr("data-type");

                    studentForm[0].reset();

                    studentFormValidator.resetForm();

                    studentModal.hide();
                    setTimeout(function () {
                        location.reload();
                    }, 2500);


                } else {

                    NioApp.Toast("Something Went Wrong", "error");

                }

            }).catch(function (error) {

                NioApp.Toast(error, "error");

            }).always(function () {

                hideLoader();

            });

        }

    });



    // Preview image upload

    window.loadImagePreview = function (type = 'single', options) {

        const option = Object.assign({}, {

            'fileEvent': '',

            'previewTarget': '#preview',

            'previewLink': ''

        }, options);



        // Empty preview block

        if (type == 'single') {

            $(option.previewTarget).html('');

        }



        if (parseValue(option.fileEvent) != '') {

            let file = option.fileEvent.target.files[0];

            if (file) {

                let reader = new FileReader();



                reader.onload = function (e) {

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



        if (parseValue(option.previewLink) != '') {

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



    studentForm.find('[name="photo"]').change(function (event) {

        loadImagePreview('single', {

            'previewTarget': '#preview-photo .preview-block',

            'fileEvent': event

        });

    });



    $('#preview-photo').on('click', '.btn-remove-preview', function (e) {

        e.preventDefault();



        if ($(e.currentTarget).hasClass('exist') == true) {

            const previewLink = $(e.currentTarget).data('srcset');

            $(e.currentTarget).parent().parent().html(`<input type="hidden" name="remove_photo" value="${previewLink}" />`);

        } else {

            $(e.currentTarget).parent().remove();

        }

        studentForm.find('[name="photo"]').val('');

        studentForm.find('.form-file .form-file-label').html('Choose File');



    });






    // Edit student


});

const studentModalElm = $("#studentModal");

const studentForm = $("#studentForm");
var studentModal = new bootstrap.Modal(
    document.getElementById("studentModal"),
    {
        backdrop: "static",
        keyboard: false,
    }
);

getGenderList = async (target = false, selected) => {

    let response;

    $.ajax({

        type: "get",

        url: formApiUrl(`auth/list_gender`, {

            baseUrl: 'https://dsms.technoiq.in/backend/api/'

        }),

        global: false,

        beforeSend: function () {

            $(target).html('');

        }

    }).then(function ({ data, errors }) {

        if (!errors) {

            if (target) {

                data.result.forEach((item) => {

                    $(target).append(`<div class="custom-control custom-radio me-2">

                            <input type="radio" class="custom-control-input" name="gender" value="${item.id}" ${(item.id == selected) && 'checked'} required />

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



getLicenseTypes = async (target = false, options = {}) => {

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

        url: formApiUrl(`auth/school_licenses/${appModule.getCookie('school_id')}/${option.gender_id}`, {

            baseUrl: 'https://dsms.technoiq.in/backend/api/'

        }),

        global: false

    }).then(function ({ data, errors }) {

        if (!errors) {

            if (target) {

                if (data.result.length > 0) {

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

getSubLicenseList = (target = false, options = {}) => {
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
        url: 'https://dsms.technoiq.in/backend/api/auth/sub_license_list/' + option.license_type_id,

        success: function ({ data, errors }) {
            if (!errors) {
                $(target).html(`<option value="">Select Sub License</option>`);

                if (target) {
                    data.result.sub_license_list.forEach((item) => {
                        $(target).append(`<option ${(item.id == option.selected) && 'selected'} value='${item.id}'>${item.name}</option>`)
                    });
                } else {
                    response = data.result;
                }
            } else {
                //NioApp.Toast("Sub License is not available.", "error")
                $(target).html(`<option value="">Select Sub License</option>`);

            }
        }
    });
    return response;
}


getLevelsList = async (target = false, options = {}) => {

    let response;

    const option = Object.assign({}, {

        license_type_id: 0,

        selected: 0

    }, options);



    // Reset target selectbox

    $(target).html('')

        .append('<option value="">Select Level</option>')

    const items = [

        { id: 1, name: 'Beginner' },

        { id: 2, name: 'Intermediate' },

        { id: 3, name: 'Expert' }

    ];

    if (option.license_type != 0) {

        items.forEach((item) => {

            $(target).append(`<option ${(item.id == option.selected) && 'selected'} value='${item.id}'>

                    ${item.name}

                </option>`);

        });

    }

    return response;

};

getPlansList = async (target = false, options = {}) => {

    let response;

    const option = Object.assign({}, {

        license_type_id: $('#license-type-selectbox').val(),

        level_id: $('#level-selectbox').val(),

        school_id: appModule.getCookie('school_id'),

        selected: 0

    }, options);



    // Reset selectbox

    $('#plans-selectbox').html('')

        .append('<option value="">Select Plan</option');



    if (parseValue(option.license_type_id) == '' && parseValue(option.level_id) == '') {

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

    }).then(function ({ data, errors }) {

        if (!errors) {

            if (target) {

                if (data.result.length > 0) {

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

function editStudent(val) {




    var student_id = val;



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

                .find('[name="id_type"]')

                .val(data.result.id_type).attr('checked', true);

            studentForm

                .find('[name="id_number"]')

                .val(data.result.id_number);

            studentForm

                .find('[name="username"]')

                .val(data.result.username);



            if (parseValue(data.result.student_photo) != '') {

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

                .html('Update');

            studentModalElm.find(".modal-body .modal-title").html("Edit student");



            // Show student modal

            studentModal.show();

            //removePasswordRule();

            getGenderList('#gender-list-area', data.result.gender);

            getLicenseTypes('#license-type-selectbox', {

                gender_id: data.result.gender,

                selected: data.result.license_type

            });

            getSubLicenseList('#sub-license-selectbox', {

                "license_type_id": data.result.license_type,

                "sub_license_type_id": data.result.sub_license_id,

                "selected": data.result.sub_license_id

            });

            getLevelsList('#level-selectbox', {

                "license_type_id": data.result.license_type,

                "selected": data.result.level

            });

            getPlansList('#plans-selectbox', {

                "level_id": data.result.gender,

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

}