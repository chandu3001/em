<?php include_once APPPATH . 'views/admin/includes/header.php'; ?>

<body class="nk-body bg-white has-sidebar">
    <div class="nk-app-root">
        <div class="nk-main">
            <?php include_once APPPATH . 'views/admin/includes/sidebar.php'; ?>

            <div class="nk-wrap">
                <?php include_once APPPATH . 'views/admin/includes/navbar.php'; ?>

                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between g-3">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title" data-translate>Student / <strong
                                                class="text-primary small" id="student_name"></strong></h3>
                                        <div class="nk-block-des text-soft">
                                            <ul class="list-inline">
                                                <li data-translate>Student ID: <span class="text-base"
                                                        id="student_id"></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <a href="<?php echo base_url('admin/students');?>"
                                            class="btn btn-primary d-none d-sm-inline-flex"><em
                                                class="icon ni ni-arrow-left"></em><span data-translate>Back</span></a>
                                        <a href="<?php echo base_url('admin/students');?>"
                                            class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                                class="icon ni ni-arrow-left"></em></a>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div id="details" class="card card-bordered">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once APPPATH . 'views/admin/includes/footer.php'; ?>
            </div>
        </div>
    </div>
    <?php include_once APPPATH . 'views/admin/includes/footer-scripts.php'; ?>

    <script>
        $(function () {
            // Ajax request setup
            $.ajaxSetup({
                headers: {
                    'Authorization': `Bearer ${$.cookie("access_token")}`
                },
                dataType: 'json'
            });
        });   
    </script>
    <script>
        var url = new URL(document.location.href);
        var id = url.searchParams.get("student_id");
        $(function () {
            $.ajax({
                type: "get",
                url: `https://dsms.technoiq.in/backend/api/auth/student/details/${id}`
            }).done(({ data }) => {
                data = data.result;
                $("#student_name").text(data.first_name_english + " " + data.second_name_english)
                $("#student_id").text(data.student_id)
                $("#details").html(
                    `
                    <div class="card-aside-wrap">
                        <div class="card-content">
                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                <li class="nav-item">
                                    <a data-bs-toggle="tab" href="#personal" class="nav-link active">
                                        <em class="icon ni ni-user-circle"></em><span data-translate="Personal">Personal</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a data-bs-toggle="tab" onclick="GetExamResultLists()" href="#examination" class="nav-link">
                                        <em class="icon ni ni-user-circle"></em><span data-translate="Examination">Examination</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="card-inner tab-pane active" id="personal">
                                    <div class="nk-block">
                                        <div class="nk-block-head">
                                            <h5 class="title"></h5>
                                        </div>
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label" data-translate="First Name">First Name</span>
                                                    <span class="profile-ud-value">${data.first_name_english}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label" data-translate="Second Name">Second Name</span><span
                                                        class="profile-ud-value">${data.second_name_english}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label" data-translate="Email ID">Email ID</span><span
                                                        class="profile-ud-value">${data.email}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label" data-translate="Mobile No">Mobile No</span><span
                                                        class="profile-ud-value">${data.phone}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label" data-translate="DOB">DOB</span><span
                                                        class="profile-ud-value">${data.dob}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label" data-translate="Gender">Gender</span><span
                                                        class="profile-ud-value">${data.gender == 1 ? 'Male' : data.gender == 2 ? 'Female' : 'others'}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span
                                                        class="profile-ud-label" data-translate="ID Type">ID Type</span><span
                                                        class="profile-ud-value">
                                                        ${data.id_type == 0
                        ?
                        "Aadhar"
                        :
                        data.id_type == 1
                            ?
                            "PAN"
                            :
                            data.id_type == 2
                                ?
                                "License"
                                :
                                data.id_type == 3
                                    ?
                                    "Passport"
                                    :
                                    ''
                    }
                                                    </span>
                                                </div>
                                            </div>
                                    
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label" data-translate="City">City</span><span
                                                        class="profile-ud-value">${data.city}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label" data-translate="National Id">National Id</span><span
                                                        class="profile-ud-value">${data.national_id}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-block">
                                        <div class="nk-block-head nk-block-head-line">
                                            <h6 class="title overline-title text-base" data-translate="Additional Information">Additional Information</h6>
                                        </div>
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label" data-translate="Username">Username</span><span
                                                        class="profile-ud-value">${data.username}</span></div>
                                            </div>
                                            
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label" data-translate="License Type">License Type</span><span
                                                        class="profile-ud-value">${data.license_name}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label" data-translate="Sub License Type">Sub License Type</span><span
                                                        class="profile-ud-value">${data.sub_license_name}</span></div>
                                            </div>

                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span
                                                        class="profile-ud-label" data-translate="level">level</span><span
                                                        class="profile-ud-value">
                                                        ${data.level == 1
                        ?
                        "Beginner"
                        :
                        data.level == 2
                            ?
                            "Intermediate"
                            :
                            data.level == 3
                                ?
                                "Expert"
                                : ''
                    }
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label" data-translate="Subscription Plan">Subscription Plan</span><span
                                                        class="profile-ud-value">${data.plan_name}</span></div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                </div>
                                <div class="card-inner tab-pane" id="examination">
                                <div class="nk-block">
                                    <div class="card card-bordered card-stretch">
                                    <div class="card-inner-group">
                                        <div class="card-inner position-relative card-tools-toggle">
                                            <div class="card-title-group">
                                                <div class="card-tools">
                                                <div class="form-inline flex-nowrap gx-3">
                                                    <div class="form-wrap w-150px">
                                                        <select
                                                            class="form-select form-select-sm js-select2" data-search="off"
                                                             data-placeholder="Sort By">
                                                            <option value=""></option>
                                                            <option value="1" data-translate="Ascending">Ascending</option>
                                                            <option value="2" data-translate="Descending">Descending</option>
                                                        </select>
                                                    </div>
                                                 
                                                </div>
                                                </div>
                                                <div class="card-tools me-n1">
                                                <ul class="btn-toolbar gx-1">
                                                    <li><a href="#"
                                                            class="btn btn-icon search-toggle toggle-search "
                                                            data-target="search"><em class="icon ni ni-search "></em></a></li>
                                                    <li class="btn-toolbar-sep"></li>
                                                    <li>
                                                        <div class="toggle-wrap">
                                                            <a href="#" class="btn btn-icon btn-trigger toggle"
                                                            data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                            <div class="toggle-content" data-content="cardTools">
                                                            <ul class="btn-toolbar gx-1">
                                                                <li class="toggle-close"><a href="#"
                                                                        class="btn btn-icon btn-trigger toggle"
                                                                        data-target="cardTools"><em
                                                                        class="icon ni ni-arrow-left"></em></a></li>
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#"
                                                                        class="btn btn-trigger btn-icon dropdown-toggle"
                                                                        data-bs-toggle="dropdown">
                                                                        <div class="dot dot-primary"></div>
                                                                        <em class="icon ni ni-filter-alt"></em>
                                                                        </a>
                                                                        <div
                                                                        class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                                        <div class="dropdown-head">
                                                                            <span class="sub-title dropdown-title" data-translate="Filters">Filters</span>
                                                                          
                                                                        </div>
                                                                        <div class="dropdown-body dropdown-body-rg">
                                                                            <div class="row gx-6 gy-3">
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                    <label
                                                                                        class="overline-title overline-title-alt" data-translate="Exam/License Type">Exam/License Type</label>
                                                                                    <select
                                                                                        class="form-select form-select-sm js-select2">
                                                                                        <option value="1" data-translate="Type 1">Type 1</option>
                                                                                        <option value="2" data-translate="Type 2">Type 2</option>
                                                                                        <option value="3" data-translate="Type 3">Type 3</option>
                                                                                        <option value="4" data-translate="Type 4">Type 4</option>
                                                                                    </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary" data-translate=""Apply>Apply
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="dropdown-foot between"><a class="clickable"
                                                                                href="#" data-translate="Clear Filters">Clear Filters</a>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#"
                                                                        class="btn btn-trigger btn-icon dropdown-toggle"
                                                                        data-bs-toggle="dropdown"><em
                                                                            class="icon ni ni-setting"></em></a>
                                                                        <div
                                                                        class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                                        <ul class="link-check">
                                                                            <li><span data-translate="Show">Show</span></li>
                                                                            <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input onchange=" GetExamResultLists(1,{pageSize:10})" checked  type="checkbox"  class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                            <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input onchange=" GetExamResultLists(1,{pageSize:20})" type="checkbox" class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                            <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input onchange=" GetExamResultLists(1,{pageSize:50})" type="checkbox"  class="radio" value="1" name="fooby[1][]" ></a></li>
                                                                             </ul>
                                                                       
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                </div>
                                            </div>
                                            <div class="card-search search-wrap" data-search="search">
                                                <div class="card-body">
                                                <div class="search-content d-flex"><a href="#"
                                                        class="search-bStudent IDk btn btn-icon toggle-search"
                                                        data-target="search"><em class="icon ni ni-arrow-left"></em></a><input
                                                        type="text" class="form-control border-transparent form-focus-none"
                                                        plStudent IDeholder="Search"><button class="search-submit btn btn-icon"><em
                                                            class="icon ni ni-search "></em></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner p-0">
                                            <div class="nk-tb-list nk-tb-ulist" id="examination_results">
                                                
                                            </div>
                                        </div>
                                        <div class="card-inner" id="exam-list-pagination">

                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl"
                            data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true"
                            data-toggle-body="true">
                            <div class="card-inner-group" data-simplebar>
                                <div class="card-inner">
                                    <div class="user-card user-card-s2">
                                        <div class="user-avatar lg bg-primary"><span data-translate="AB">AB</span></div>
                                        <div class="user-info">
                                            <div class="badge bg-outline-light rounded-pill ucap">
                                                ${data.role_name}</div>
                                            <h5>${data.first_name_english} ${data.second_name_english}</h5>
                                            <span class="sub-text">${data.email}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner card-inner-sm">
                                    <ul class="btn-toolbar justify-center gx-1">
                                        <li>
                                            <a  class="btn btn-trigger btn-icon"><em
                                                    class="icon ni ni-shield-off"></em></a>
                                        </li>
                                        <li>
                                            <a  class="btn btn-trigger btn-icon"><em
                                                    class="icon ni ni-mail"></em></a>
                                        </li>
                                        <li>
                                            <a  class="btn btn-trigger btn-icon"><em
                                                    class="icon ni ni-download-cloud"></em></a>
                                        </li>
                                        <li>
                                            <a  class="btn btn-trigger btn-icon"><em
                                                    class="icon ni ni-bookmark"></em></a>
                                        </li>
                                        <li>
                                            <a  class="btn btn-trigger btn-icon text-danger"><em
                                                    class="icon ni ni-na"></em></a>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                    `
                )
                $('[data-bs-toggle="tab"]').click(function () {
                    localStorage.setItem('active_tab', $(this).attr('href'))
                })
            })
        })

        var page = 1;
        function GetExamResultLists(pageNumber) {

            page = pageNumber;
            showLoader({
                title: "Please Wait..."
                // text: "Fetching..."
            })
            let searchParams = new URLSearchParams(window.location.search)
            let student_id = searchParams.get("student_id")
            $.ajax({
                type: "get",
                url: `${api_base_url}exam-result/0?page=${page}`,
                data: {
                    student_id
                }
            }).done(({ status, message, data, license_name, exam_name }) => {
                if (status) {
                    $("#license_name").text(license_name)
                    $("#exam_name").text(exam_name)
                    $("#total_attended").text(data.total)

                    if (data.total > 0) {
                        $("#examination_results").html(
                            `
                                <div class="nk-tb-item nk-tb-head">
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold" data-translate="Student Name">Student Name</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold" data-translate="Exam Name">Exam Name</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold" data-translate="Total Correct Answers">Total Correct Answers</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold" data-translate="Total Wrong Answers">Total Wrong Answers</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold" data-translate="Total Skipped Answers">Total Skipped Answers</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold" data-translate="Total Score">Total Score</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold" data-translate=" Total Obtained Score">Total Obtained Score</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold" data-translate="Result">Result</span></div>
                                    <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold" data-translate="Action">Action</span>
                                    </div>
                                </div>
                                `
                        )

                        data.data.forEach(item => {
                            $("#examination_results").append(
                                `
                            <div class="nk-tb-item">
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">
                                <div class="user-info">
                                    <span class="tb-lead">${item.student_name}</span>
                                    <span>Student ID: ${item.student_id}</span>
                                </div>
                                </div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.exam_name}</div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.total_correct_answers}</div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.total_wrong_answers}</div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.total_skipped_answers}</div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.total_marks}</div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.obtained_marks}</div>
                                <div class="nk-tb-col tb-col-md student-info">${item.result}</div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                <ul class="">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle"
                                            data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="${formUrl('admin/students/answersheet?id=' + item.id + '/' + item.student_id)}"><em class="icon ni ni-eye"></em><span>View Answers</span></a></li>
                                                
                                            
                                            </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                </div>
                            </div>
                            `
                            )
                        })


                        $("#exam-list-pagination").pagination({
                            items: parseInt(data.total),
                            itemsOnPage: parseInt(data.per_page),
                            currentPage: data.current_page,
                            displayedPages: 3,
                            navStyle: "pagination justify-content-center justify-content-md-start",
                            listStyle: "page-item",
                            linkStyle: "page-link",
                            onPageClick: function (pageNumber, event) {
                                event ? event.preventDefault() : '';
                                GetExamResultLists(pageNumber);
                            }
                        })
                    }
                    else {
                        $("#examination_results").html(`<div class="nk-tb-item-empty">
                                <p class="text-center text-black fw-bold"> No Examination Result Available</p>
                            </div>`);
                    }

                }
                else {
                    NioApp.Toast(message, "warning");
                }
            }).fail(({ statusText, status, responseJSON }) => {
                if (status == 400)
                    NioApp.Toast(responseJSON.message, "error");
                else
                    NioApp.Toast(statusText, "error");
            }).always(() => {
                hideLoader();
                // translate();
            })
        }

    </script>


    <script>


        // the selector will match all input controls of type :checkbox
        // and attach a click event handler 
        $("input:checkbox").on('click', function () {
            // in the handler, 'this' refers to the box clicked on
            var $box = $(this);
            if ($box.is(":checked")) {
                // the name of the box is retrieved using the .attr() method
                // as it is assumed and expected to be immutable
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                // the checked state of the group/box on the other hand will change
                // and the current value is retrieved using .prop() method
                $(group).prop("checked", false);
                $box.prop("checked", true);
            } else {
                $box.prop("checked", false);
            }
        });
    </script>