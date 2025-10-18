<?php include_once APPPATH . 'views/school/includes/header.php'; ?>



<body class="nk-body bg-white has-sidebar ">

    <!-- <div class="loader">

      

   </div> -->

    <div class="nk-app-root">

        <!-- main @s -->

        <div class="nk-main ">

            <!-- sidebar @s -->

            <?php include_once APPPATH . 'views/school/includes/sidebar.php'; ?>



            <!-- sidebar @e -->

            <!-- wrap @s -->

            <div class="nk-wrap ">

                <!-- main header @s -->

                <?php include_once APPPATH . 'views/school/includes/navbar.php'; ?>



                <!-- main header @e -->

                <!-- content @s -->

                <div class="nk-content nk-content-fluid">

                    <div class="container-xl wide-lg">

                        <div class="nk-content-body">

                            <div class="nk-block-head nk-block-head-sm">

                                <div class="nk-block-between">

                                    <div class="nk-block-head-content">

                                        <h3 class="nk-block-title page-title dtitle" style="margin-bottom:-5px;">

                                            Dashboard</h3>

                                        <div class="nk-block-des text-soft" style="margin-bottom: 0px !important;">

                                            <p id="wel-title">Welcome to School Admin Dashboard.</p>

                                        </div>

                                    </div>

                                    <div class="nk-block-head-content">

                                        <div class="toggle-wrap nk-block-tools-toggle">

                                            <a href="javascript:void(0)"
                                                class="btn btn-icon btn-trigger toggle-expand me-n1"
                                                data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>

                                            <div class="toggle-expand-content" data-content="pageMenu">

                                                <ul class="nk-block-tools g-3">

                                                    <li>
                                                        <div class="drodown">

                                                            <a href="javascript:void(0)"
                                                                class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                                                                id="filters_btn" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <em
                                                                    class="d-none d-sm-inline icon ni ni-calender-date"></em><span
                                                                    class="three-title"
                                                                    id="current_duration">Today</span><em
                                                                    class="dd-indc icon ni ni-chevron-right"></em></a>

                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="filters_btn">

                                                                <ul class="link-list-opt no-bdr pb-0">

                                                                    <li><a href="javascript:void(0)"
                                                                            onclick="getOverview(1)"><span
                                                                                class="three-title">Today</span></a>
                                                                    </li>

                                                                    <li><a href="javascript:void(0)"
                                                                            onclick="getOverview(2)"><span
                                                                                id="six-title">This Week</span></a>

                                                                    </li>
                                                                    <li><a href="javascript:void(0)"
                                                                            onclick="getOverview(3)"><span
                                                                                class="this-month" id="this-month">This
                                                                                Month</span></a>

                                                                    </li>

                                                                    <li><a href="javascript:void(0)"
                                                                            onclick="getOverview(4)"><span
                                                                                id="last-six">Last 6 Months</span></a>

                                                                    </li>

                                                                    <li><a href="javascript:void(0)"
                                                                            onclick="getOverview(5)"><span
                                                                                id="this-yr">This Year</span></a>

                                                                    </li>

                                                                    <li>
                                                                        <div>
                                                                            <button
                                                                                class="btn btn-secondary dropdown-toggle w-100 rounded-0"
                                                                                type="button" id="enableCustomDates">
                                                                                Custom Date
                                                                            </button>
                                                                            <ul class="enableCustomDates d-none px-1"
                                                                                aria-labelledby="enableCustomDates">
                                                                                <li>
                                                                                    <form id='custom_date' class="">

                                                                                        <div class="d-flex flex-column align-items-center mt-2"
                                                                                            style="gap: .5rem;">

                                                                                            <input type="text" required
                                                                                                placeholder="From date"
                                                                                                name="fromdate"
                                                                                                class="form-control">

                                                                                            <span
                                                                                                class="to-label">To</span>

                                                                                            <input type="text" required
                                                                                                placeholder="To date"
                                                                                                name="todate"
                                                                                                class="form-control">

                                                                                        </div>

                                                                                        <button
                                                                                            class='btn btn-primary mt-2 apply-btn'>Apply</button>

                                                                                    </form>
                                                                                </li>
                                                                            </ul>
                                                                        </div>

                                                                    </li>

                                                                </ul>

                                                            </div>

                                                        </div>
                                                    </li>



                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="nk-block">

                                <div class="row g-4">

                                    <div class="col-lg-7 py-0">

                                        <div class="card card-bordered h-100 shadow">

                                            <div class="card-inner">

                                                <div class="card-title-group pb-3 g-2">

                                                    <div class="card-title card-title-sm">

                                                        <h6 class="title" id="tover">Overview</h6>

                                                    </div>

                                                    <div class="card-tools shrink-0 d-none d-sm-block">

                                                        <ul class="nav nav-switch-s2 nav-tabs bg-white">

                                                            <li>

                                                                <div class="dropdown d-none">

                                                                    <a href="#"
                                                                        class="btn btn-trigger btn-icon dropdown-toggle"
                                                                        data-bs-toggle="dropdown">

                                                                        <div class="dot dot-primary"></div>

                                                                        <em class="icon ni ni-filter-alt"></em>

                                                                    </a>

                                                                    <div
                                                                        class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">

                                                                        <div class="dropdown-head">

                                                                            <span
                                                                                class="sub-title dropdown-title">Filters</span>

                                                                        </div>

                                                                        <div class="dropdown-body dropdown-body-rg">

                                                                            <form id="question_pool_filter_form">

                                                                                <div class="row gx-6 gy-3">

                                                                                    <div class="col-6">

                                                                                        <div class="form-group">

                                                                                            <label
                                                                                                class="overline-title overline-title-alt family exams">Exams</label>

                                                                                            <select id="exam_filter"
                                                                                                name="exam_id"
                                                                                                class="form-select form-select-sm form-control"
                                                                                                data-placeholder="Select Exam">

                                                                                                <option value="">

                                                                                                </option>

                                                                                                <option value="0">All

                                                                                                    Exams</option>

                                                                                            </select>

                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-6">

                                                                                        <div class="form-group">

                                                                                            <label
                                                                                                class="overline-title overline-title-alt diff-level">DATES</label>

                                                                                            <select name="dates"
                                                                                                id="dates_filter"
                                                                                                class="form-select form-select-sm form-control"
                                                                                                data-placeholder="Select">

                                                                                                <option value='1'>Today

                                                                                                </option>

                                                                                                <option value='2'>This

                                                                                                    Week</option>

                                                                                                <option value='3'>Last

                                                                                                    Week</option>

                                                                                                <option value='4'>This

                                                                                                    Month</option>

                                                                                                <option value='5'>This

                                                                                                    Year</option>

                                                                                            </select>

                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-6">

                                                                                        <div class="form-group">

                                                                                            <label
                                                                                                class="overline-title overline-title-alt from-label">From</label>

                                                                                            <input
                                                                                                placeholder="Select from date"
                                                                                                type="text"
                                                                                                name="from_date"
                                                                                                value=""
                                                                                                class="datepickerr form-control">

                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-6">

                                                                                        <div class="form-group">

                                                                                            <label
                                                                                                class="overline-title overline-title-alt from-label">To</label>

                                                                                            <input
                                                                                                placeholder="Select from date"
                                                                                                type="text"
                                                                                                name="to_date" value=""
                                                                                                class="datepickerr form-control">

                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-12">

                                                                                        <div class="form-group">

                                                                                            <button type="submit"
                                                                                                class="btn btn-secondary apply-btn">Apply</button>

                                                                                        </div>

                                                                                    </div>

                                                                                </div>

                                                                            </form>

                                                                        </div>

                                                                        <div class="dropdown-foot between"> <button
                                                                                type="reset"
                                                                                class="clickable bg-transparent border-0 text-primary"
                                                                                id="form_clear">Clear Filters</button>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </li>

                                                        </ul>

                                                    </div>

                                                </div>

                                                <div class="analytic-ov">

                                                    <div class="analytic-data-group row text-center g-3 mb-3">



                                                        <div class="analytic-data col-md-4">

                                                            <div class="title tot-stud" id="">Total Students</div>

                                                            <div class="amount z d-flex align-items-center justify-content-center"
                                                                style="gap:.4rem"></div>

                                                        </div>

                                                        <div class="analytic-data col-md-4">

                                                            <div class="title" id="">New Students</div>

                                                            <div class="amount a d-flex align-items-center justify-content-center"
                                                                style="gap:.4rem"></div>

                                                        </div>

                                                        <div class="analytic-data col-md-4">

                                                            <div class="title exams" id="etitle">Exams</div>

                                                            <div class="amount b d-flex align-items-center justify-content-center"
                                                                style="gap:.4rem"></div>

                                                        </div>



                                                    </div>

                                                    <div class="">

                                                        <div class="chartjs-size-monitor">

                                                            <div class="chartjs-size-monitor-expand">

                                                                <div class=""></div>

                                                            </div>

                                                            <div class="chartjs-size-monitor-shrink">

                                                                <div class=""></div>

                                                            </div>

                                                        </div>

                                                        <canvas class="analytics-line-large chartjs-render-monitor"
                                                            id="analyticOverview" width="491" height="175"
                                                            style="display: block; width: 491px; height: 175px;"></canvas>

                                                    </div>

                                                    <div class="chart-label-group">

                                                        <div class="chart-label" id='fromdate'></div>

                                                        <div class="chart-label d-none d-sm-block"></div>

                                                        <div class="chart-label" id='todate'></div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6 col-lg-5 py-0">

                                        <div class="card card-bordered h-100 shadow">

                                            <div class="card-inner">

                                                <div class="card-title-group align-start pb-3 g-2">

                                                    <div class="card-title card-title-sm">

                                                        <h6 class="title">Exam Statistics</h6>

                                                        <p></p>

                                                    </div>



                                                </div>

                                                <div class="analytic-au">

                                                    <div class="analytic-data-group analytic-au-group g-3">

                                                        <div class="analytic-data analytic-au-data text-center">

                                                            <div class="title attend-title" id="attend-title">Attended
                                                            </div>

                                                            <div class="amount attended"></div>

                                                        </div>

                                                        <div class="analytic-data analytic-au-data text-center">

                                                            <div class="title tpass">Passed</div>

                                                            <div class="amount passed"></div>

                                                        </div>

                                                        <div class="analytic-data analytic-au-data text-center">

                                                            <div class="title failed-title">Failed</div>

                                                            <div class="amount failed"></div>

                                                        </div>

                                                    </div>

                                                    <div class="analytic-au-ck h-auto">

                                                        <div class="chartjs-size-monitor">

                                                            <div class="chartjs-size-monitor-expand">

                                                                <div class=""></div>

                                                            </div>

                                                            <div class="chartjs-size-monitor-shrink">

                                                                <div class=""></div>

                                                            </div>

                                                        </div>

                                                        <canvas class="analytics-au-chart chartjs-render-monitor"
                                                            id="bar" width="328" height="170"
                                                            style="display: block; width: 328px; height: 170px;"></canvas>

                                                    </div>

                                                    <div class="chart-label-group">

                                                        <div class="chart-label fromdate"></div>

                                                        <div class="chart-label todate"></div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6 col-lg-5 py-0">

                                        <div class="card card-bordered h-100 shadow">

                                            <div class="card-inner">

                                                <div class="card-title-group align-start pb-3 g-2">

                                                    <div class="card-title card-title-sm">

                                                        <h6 class="title" id="stud-perf">Student Performance</h6>

                                                        <p></p>

                                                    </div>



                                                </div>

                                                <div class="analytic-wp">

                                                    <div class="analytic-wp-group g-3">

                                                        <div class="analytic-data analytic-wp-data">

                                                            <div class="analytic-wp-graph">

                                                                <div class="title" id="attend-title">Attended</div>

                                                                <div class="analytic-wp-ck">

                                                                    <div class="chartjs-size-monitor">

                                                                        <div class="chartjs-size-monitor-expand">

                                                                            <div class=""></div>

                                                                        </div>

                                                                        <div class="chartjs-size-monitor-shrink">

                                                                            <div class=""></div>

                                                                        </div>

                                                                    </div>

                                                                    <canvas
                                                                        class="analytics-line-small chartjs-render-monitor"
                                                                        id="attended" width="150" height="36"
                                                                        style="display: block; width: 150px; height: 36px;"></canvas>

                                                                </div>

                                                            </div>

                                                            <div class="analytic-wp-text">

                                                                <div class="amount amount-sm attended"></div>

                                                                <div class="subtitle current_duration">Last 30 days
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="analytic-data analytic-wp-data">

                                                            <div class="analytic-wp-graph">

                                                                <div class="title tpass">Passed</div>

                                                                <div class="analytic-wp-ck">

                                                                    <div class="chartjs-size-monitor">

                                                                        <div class="chartjs-size-monitor-expand">

                                                                            <div class=""></div>

                                                                        </div>

                                                                        <div class="chartjs-size-monitor-shrink">

                                                                            <div class=""></div>

                                                                        </div>

                                                                    </div>

                                                                    <canvas
                                                                        class="analytics-line-small chartjs-render-monitor"
                                                                        id="passed" width="150" height="36"
                                                                        style="display: block; width: 150px; height: 36px;"></canvas>

                                                                </div>

                                                            </div>

                                                            <div class="analytic-wp-text">

                                                                <div class="amount amount-sm passed"></div>

                                                                <div class="subtitle current_duration">Last 30 days
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="analytic-data analytic-wp-data">

                                                            <div class="analytic-wp-graph">

                                                                <div class="title failed-title">Failed</div>

                                                                <div class="analytic-wp-ck">

                                                                    <div class="chartjs-size-monitor">

                                                                        <div class="chartjs-size-monitor-expand">

                                                                            <div class=""></div>

                                                                        </div>

                                                                        <div class="chartjs-size-monitor-shrink">

                                                                            <div class=""></div>

                                                                        </div>

                                                                    </div>

                                                                    <canvas
                                                                        class="analytics-line-small chartjs-render-monitor"
                                                                        id="failed" width="150" height="36"
                                                                        style="display: block; width: 150px; height: 36px;"></canvas>

                                                                </div>

                                                            </div>

                                                            <div class="analytic-wp-text">

                                                                <div class="amount amount-sm failed"></div>

                                                                <div class="subtitle current_duration">Last 30 days
                                                                </div>

                                                            </div>

                                                        </div>



                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-7 py-0">

                                        <div class="card card-bordered h-100 shadow">

                                            <div class="card-inner mb-n2">

                                                <div class="card-title-group">

                                                    <div class="card-title card-title-sm">

                                                        <h6 class="title" id="exam-perf">Exam Wise Performance</h6>

                                                        <p></p>

                                                    </div>

                                                    <div class="card-tools">

                                                        <div class="drodown">

                                                            <a href="<?= base_url('school/examination') ?>"
                                                                class="btn btn-sm btn-outline-light btn-white"
                                                                id="view-more">View More

                                                                <em class="icon ni ni-arrow-right"></em>

                                                            </a>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="nk-tb-list is-loose traffic-channel-table" id='latest_exams'>

                                                <div class="nk-tb-item nk-tb-head">

                                                    <div class="nk-tb-col nk-tb-channel"><span class="exam-title">Exam
                                                            Name</span></div>

                                                    <div class="nk-tb-col nk-tb-sessions"><span
                                                            class="city satus-label">Status</span></div>

                                                    <div class="nk-tb-col nk-tb-sessions"><span class="city"
                                                            id="attend-title">Attended</span></div>

                                                    <div class="nk-tb-col nk-tb-prev-sessions"><span
                                                            class="schoolna-title tpass">Passed</span></div>

                                                    <div class="nk-tb-col nk-tb-change"><span
                                                            class="failed-title">Failed</span></div>

                                                </div>





                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- content @e -->



                <!-- footer -->

                <?php include_once APPPATH . 'views/school/includes/footer.php'; ?>



                <!-- wrap @e -->

            </div>

            <!-- main @e -->

        </div>

        <!-- app-root @e -->



        <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>

        <script src="<?php echo base_url('assets/js/charts/gd-default.js?ver=3.0.0'); ?>"></script>

        <script src="<?php echo base_url('assets/js/charts/gd-analytics.js?ver=3.0.0'); ?>"></script>

        <script src="<?php echo base_url('assets/js/libs/jqvmap.js?ver=3.0.0'); ?>"></script>

        <script>

            (function (NioApp, $) {

                appModule.checkAuth();



            })(NioApp, jQuery);



            $(function () {

                $('[name="fromdate"], [name="todate"]').datepicker({

                    endDate: new Date()

                });

                getOverview();
                $("#enableCustomDates").click(function (e) {

                    e.preventDefault();
                    e.stopPropagation();
                    $('.enableCustomDates').toggleClass('d-none');
                })
            })



            var langCode = localStorage.getItem('language-type');

            languageText(langCode);

            var dates = 3;

            var analyticOverview_chart = '';

            var attended_chart = '';

            var passed_chart = '';

            var failed_chart = '';

            var bar_chart = '';

            var fromdate = '';

            var todate = '';



            function getOverview(date = dates, customDate = 0) {

                dates = date;



                if (customDate) {

                    dates = customDate.filters;

                    $("#current_duration, .current_duration").html(`${$('[name="fromdate"]').val()} To ${$('[name="todate"]').val()}`);

                    $("#custom_date")[0].reset();

                }

                else {

                    switch (dates) {

                        case 1:

                            $("#current_duration, .current_duration").html('Today');

                            break;

                        case 2:

                            $("#current_duration, .current_duration").html('This Week');

                            break;

                        case 3:

                            $("#current_duration, .current_duration").html('This Month');

                            break;

                        case 4:

                            $("#current_duration, .current_duration").html('Last 6 Months');

                            break;

                        case 5:

                            $("#current_duration, .current_duration").html('This Year');

                            break;

                    }

                    dates = {

                        dates

                    }

                }


                $.ajax({

                    type: 'get',

                    url: api_base_url + "get-dashboard-details/" + $.cookie('school_id'),

                    data: dates

                }).done(({ status, data }) => {

                    if (status) {

                        $('.amount.z').html('<span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>' + data.total_students)

                        $('.amount.a').html('<span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>' + (data.total_registered_students_analitics).reduce((partialSum, a) => partialSum + a, 0))

                        $('.amount.b').html('<span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>' + (data.total_exams_analitics).reduce((partialSum, a) => partialSum + a, 0))

                        $('.attended').html((data.total_students_attended_the_exam_analitics).reduce((partialSum, a) => partialSum + a, 0))

                        $('.passed').html((data.total_students_passed_analitics).reduce((partialSum, a) => partialSum + a, 0))

                        $('.failed').html((data.total_students_failed_analitics).reduce((partialSum, a) => partialSum + a, 0))

                        if (data.labels.length > 0) {

                            $("#fromdate, .fromdate").html(data.labels[0])

                            $("#todate, .todate").html(data.labels[data.labels.length - 1])

                        }

                        if (data.latestExams.length == 0) {

                            $('#latest_exams').html(`
                            <div class="position-absolute h5" style="
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                            ">No Data Available!</div>
                            `)

                            $("#view-more").hide();
                        }
                        else {
                            $("#view-more").show();

                            $('#latest_exams').html(`

                            <div class="nk-tb-item nk-tb-head">

                                <div class="nk-tb-col nk-tb-channel"><span class="exam-title">Exam Name</span></div>

                                <div class="nk-tb-col nk-tb-sessions"><span

                                        class="city status-label">Status</span></div>

                                <div class="nk-tb-col nk-tb-sessions"><span

                                        class="city" id="attend-title">Attended</span></div>

                                <div class="nk-tb-col nk-tb-prev-sessions"><span

                                        class="schoolna-title tpass">Passed</span></div>

                                <div class="nk-tb-col nk-tb-change"><span class="failed-title">Failed</span></div>

                            </div>

                        `)

                            data.latestExams.forEach(exam => {

                                $("#latest_exams").append(`

                            <div class="nk-tb-item">

                                <div class="nk-tb-col nk-tb-channel">

                                    <span class="tb-lead" class="exam_name">${exam.exam_name}</span>

                                </div>

                                <div class="nk-tb-col nk-tb-sessions">

                                    <span class="tb-sub tb-amount">

                                        <span class="status ${exam.status ? 'text-success' : 'text-danger'}">${exam.status ? 'Active' : 'Inactive'}</span>

                                    </span>

                                </div>

                                <div class="nk-tb-col nk-tb-sessions">

                                <span class="tb-sub tb-amount"><span class="attended">${exam.attended}</span></span></div>

                                <div class="nk-tb-col nk-tb-prev-sessions"><span

                                        class="tb-sub tb-amount"><span class="passed">${exam.passed}</span></span></div>

                                <div class="nk-tb-col nk-tb-change"><span

                                        class="tb-sub"><span class="failed">${exam.failed}</span></span>

                                </div>

                            </div>

                            `)

                            })
                        }

                        languageText(langCode);





                        const cfg = {

                            type: 'line',

                            responsive: true,

                            bezierCurve: false,

                            datasetFill: true,



                            data: {

                                labels: data.labels,

                                dataUnit: 'People',

                                lineTension: .1,

                                datasets: [{

                                    pointBorderColor: 'rgba(0, 0, 0, 0)',

                                    pointBackgroundColor: 'rgba(0, 0, 0, 0)',

                                    pointHoverBorderColor: '#3a8dfe',

                                    label: "New Student",

                                    borderColor: "#3a8dfe",

                                    backgroundColor: NioApp.hexRGB('#3a8dfe', .15),

                                    borderWidth: 2,

                                    data: data.total_registered_students_analitics,

                                }, {

                                    pointBorderColor: 'rgba(0, 0, 0, 0)',

                                    pointBackgroundColor: 'rgba(0, 0, 0, 0)',

                                    pointHoverBorderColor: '#a9cdff',

                                    label: "Exam",

                                    borderColor: "#a9cdff",

                                    backgroundColor: 'transparent',

                                    borderDash: [5],

                                    borderWidth: 2,

                                    data: data.total_exams_analitics

                                }]

                            },

                            options: {

                                hover: {

                                    intersect: false

                                },

                                scales: {

                                    xAxes: [{

                                        ticks: {

                                            display: false,

                                        },

                                        gridLines: {

                                            color: "rgba(0, 0, 0, 0)",

                                        }

                                    }],

                                    yAxes: [{

                                        ticks: {

                                            beginAtZero: true,

                                            callback: function (value) { if (Number.isInteger(value)) { return value; } },

                                            stepSize: 1

                                        },
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Number of count'
                                        }

                                    }]

                                }

                            }

                        }



                        const attended = {

                            type: 'line',

                            responsive: true,

                            bezierCurve: false,

                            datasetFill: true,



                            data: {

                                labels: data.labels,

                                dataUnit: 'People',

                                datasets: [{

                                    pointBorderColor: 'rgba(0, 0, 0, 0)',

                                    pointBackgroundColor: 'rgba(0, 0, 0, 0)',

                                    pointHoverBorderColor: '#3a8dfe',

                                    borderColor: "#3a8dfe",

                                    backgroundColor: NioApp.hexRGB('#3a8dfe', .15),

                                    borderWidth: 2,

                                    data: data.total_students_attended_the_exam_analitics,

                                },]

                            },

                            options: {

                                tooltips: {

                                    enabled: true,

                                    rtl: NioApp.State.isRTL,

                                    callbacks: {

                                        title: function title(tooltipItem, data) {

                                            return false; //data['labels'][tooltipItem[0]['index']];

                                        },

                                        label: function label(tooltipItem, data) {

                                            return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']];

                                        }

                                    },

                                    backgroundColor: '#eff6ff',

                                    titleFontSize: 9,

                                    titleFontColor: '#6783b8',

                                    titleMarginBottom: 6,

                                    bodyFontColor: '#9eaecf',

                                    bodyFontSize: 9,

                                    bodySpacing: 4,

                                    yPadding: 6,

                                    xPadding: 6,

                                    footerMarginTop: 0,

                                    displayColors: false

                                },

                                hover: {

                                    intersect: false

                                },

                                legend: {

                                    display: false,



                                },

                                scales: {

                                    ticks: {

                                        showLabelBackdrop: false

                                    },

                                    xAxes: [{

                                        ticks: {

                                            display: false,

                                        },

                                        gridLines: {

                                            color: "rgba(0, 0, 0, 0)",

                                        },

                                        gridLines: {

                                            display: false

                                        }

                                    }],

                                    yAxes: [{

                                        ticks: {

                                            display: false,

                                        },

                                        gridLines: {

                                            color: "rgba(0, 0, 0, 0)",

                                        },

                                        gridLines: {

                                            display: false

                                        }

                                    }]

                                }

                            }

                        }

                        const passed = {

                            type: 'line',

                            responsive: true,

                            bezierCurve: false,

                            datasetFill: true,

                            data: {

                                labels: data.labels,

                                dataUnit: 'People',

                                datasets: [{

                                    pointBorderColor: 'rgba(0, 0, 0, 0)',

                                    pointBackgroundColor: 'rgba(0, 0, 0, 0)',

                                    pointHoverBorderColor: '#3a8dfe',

                                    borderColor: "#3a8dfe",

                                    backgroundColor: NioApp.hexRGB('#3a8dfe', .15),

                                    borderWidth: 2,

                                    data: data.total_students_passed_analitics,

                                },]

                            },

                            options: {

                                tooltips: {

                                    enabled: true,

                                    rtl: NioApp.State.isRTL,

                                    callbacks: {

                                        title: function title(tooltipItem, data) {

                                            return false; //data['labels'][tooltipItem[0]['index']];

                                        },

                                        label: function label(tooltipItem, data) {

                                            return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']];

                                        }

                                    },

                                    backgroundColor: '#eff6ff',

                                    titleFontSize: 9,

                                    titleFontColor: '#6783b8',

                                    titleMarginBottom: 6,

                                    bodyFontColor: '#9eaecf',

                                    bodyFontSize: 9,

                                    bodySpacing: 4,

                                    yPadding: 6,

                                    xPadding: 6,

                                    footerMarginTop: 0,

                                    displayColors: false

                                },

                                hover: {

                                    intersect: false

                                },

                                legend: {

                                    display: false,



                                },

                                scales: {

                                    ticks: {

                                        showLabelBackdrop: false

                                    },

                                    xAxes: [{

                                        ticks: {

                                            display: false,

                                        },

                                        gridLines: {

                                            color: "rgba(0, 0, 0, 0)",

                                        },

                                        gridLines: {

                                            display: false

                                        }

                                    }],

                                    yAxes: [{

                                        ticks: {

                                            display: false,

                                        },

                                        gridLines: {

                                            color: "rgba(0, 0, 0, 0)",

                                        },

                                        gridLines: {

                                            display: false

                                        }

                                    }]

                                }

                            }

                        }

                        const failed = {

                            type: 'line',

                            responsive: true,

                            bezierCurve: false,

                            datasetFill: true,



                            data: {

                                labels: data.labels,

                                dataUnit: 'People',

                                datasets: [{

                                    pointBorderColor: 'rgba(0, 0, 0, 0)',

                                    pointBackgroundColor: 'rgba(0, 0, 0, 0)',

                                    pointHoverBorderColor: '#3a8dfe',

                                    borderColor: "#3a8dfe",

                                    backgroundColor: NioApp.hexRGB('#3a8dfe', .15),

                                    borderWidth: 2,

                                    data: data.total_students_failed_analitics,

                                },]

                            },

                            options: {

                                tooltips: {

                                    enabled: true,

                                    rtl: NioApp.State.isRTL,

                                    callbacks: {

                                        title: function title(tooltipItem, data) {

                                            return false; //data['labels'][tooltipItem[0]['index']];

                                        },

                                        label: function label(tooltipItem, data) {

                                            return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']];

                                        }

                                    },

                                    backgroundColor: '#eff6ff',

                                    titleFontSize: 9,

                                    titleFontColor: '#6783b8',

                                    titleMarginBottom: 6,

                                    bodyFontColor: '#9eaecf',

                                    bodyFontSize: 9,

                                    bodySpacing: 4,

                                    yPadding: 6,

                                    xPadding: 6,

                                    footerMarginTop: 0,

                                    displayColors: false

                                },

                                hover: {

                                    intersect: false

                                },

                                legend: {

                                    display: false,



                                },

                                scales: {

                                    ticks: {

                                        showLabelBackdrop: false

                                    },

                                    xAxes: [{

                                        ticks: {

                                            display: false,

                                        },

                                        gridLines: {

                                            color: "rgba(0, 0, 0, 0)",

                                        },

                                        gridLines: {

                                            display: false

                                        }

                                    }],

                                    yAxes: [{

                                        ticks: {

                                            display: false,

                                        },

                                        gridLines: {

                                            color: "rgba(0, 0, 0, 0)",

                                        },

                                        gridLines: {

                                            display: false

                                        }

                                    }]

                                }

                            }

                        }

                        const bar = {

                            type: 'bar',

                            data: {

                                labels: data.labels,

                                datasets: [{

                                    label: 'Attended',

                                    data: data.total_students_attended_the_exam_analitics,

                                    backgroundColor: '#3a8dfe',

                                }, {

                                    label: 'Passed',

                                    data: data.total_students_passed_analitics,

                                    backgroundColor: '#03fcb99c',



                                }, {

                                    label: 'Failed',

                                    data: data.total_students_failed_analitics,

                                    backgroundColor: '#ff00008f',



                                }],

                                borderWidth: 1

                            },

                            options: {

                                scales: {

                                    y: {

                                        beginAtZero: true

                                    },

                                    ticks: {

                                        showLabelBackdrop: false

                                    },

                                    xAxes: [{

                                        ticks: {

                                            display: false,

                                        },

                                        barThickness: 10,

                                        categoryPercentage: 0.5,

                                        barPercentage: 1,

                                        gridLines: {

                                            color: "rgba(0, 0, 0, 0)",

                                        },

                                        gridLines: {

                                            display: false

                                        }

                                    }],

                                    yAxes: [{

                                        ticks: {

                                            beginAtZero: true,

                                            callback: function (value) { if (Number.isInteger(value)) { return value; } },

                                            stepSize: 1

                                        },
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Number of students'
                                        }

                                    }]

                                },



                            },

                        };

                        try {

                            analyticOverview_chart.destroy();

                            attended_chart.destroy();

                            passed_chart.destroy();

                            failed_chart.destroy();

                            bar_chart.destroy();



                        } finally {

                            analyticOverview_chart = new Chart(document.getElementById('analyticOverview'), cfg);

                            attended_chart = new Chart(document.getElementById('attended'), attended);

                            passed_chart = new Chart(document.getElementById('passed'), passed);

                            failed_chart = new Chart(document.getElementById('failed'), failed);

                            bar_chart = new Chart(document.getElementById('bar'), bar);

                        }

                    }

                }).fail(() => {

                    NioApp.Toast('Error Occurred!', 'error')

                })

            }



            $(function () {

                $("#custom_date .apply-btn").click(function (e) {
                    e.stopPropagation();
                })
                $("#custom_date").submit(function (e) {

                    e.preventDefault();
                    e.stopPropagation();
                    $(".enableCustomDates").addClass('d-none')
                    var dropdown = new bootstrap.Dropdown(document.getElementById('filters_btn'))
                    dropdown.hide();

                    getOverview(dates, { filters: $(this).serialize() });

                })

            })

        </script>

</body>



</html>