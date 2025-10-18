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
                                                        <!-- <div class="drodown">
                                                            <a href="javascript:void(0)"
                                                                class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                                                                data-bs-toggle="dropdown"><em
                                                                    class="d-none d-sm-inline icon ni ni-calender-date"></em><span
                                                                    class="three-title"><span
                                                                        class="d-none d-md-inline">Last</span> 30
                                                                    Days</span><em
                                                                    class="dd-indc icon ni ni-chevron-right"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="javacript:void(0)"><span
                                                                                class="three-title">Last 30
                                                                                Days</span></a></li>
                                                                    <li><a href="javacript:void(0)"><span
                                                                                id="six-title">Last 6 Months</span></a>
                                                                    </li>
                                                                    <li><a href="javacript:void(0)"><span
                                                                                id="one-title">Last 1 Years</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div> -->
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="card card-bordered h-100">
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
                                                                                                class="overline-title overline-title-alt family">Exams</label>
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
                                                    <div class="analytic-data-group row text-center g-3">

                                                        <div class="analytic-data col-md-3">
                                                            <div class="title" id="">Total registered students</div>
                                                            <div class="amount a"></div>
                                                        </div>
                                                        <div class="analytic-data col-md-3">
                                                            <div class="title" id="etitle">Total students that attended the exam</div>
                                                            <div class="amount b"></div>
                                                        </div>
                                                        <div class="analytic-data col-md-3">
                                                            <div class="title ftitle" id="ptitle">Total students that passed</div>
                                                            <div class="amount c"></div>
                                                        </div>
                                                        <div class="analytic-data col-md-3">
                                                            <div class="title ftitle" id="ftitle">Total students that failed</div>
                                                            <div class="amount d"></div>
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
                                                    <div class="chart-label-group ms-5">
                                                        <div class="chart-label" id='fromdate'></div>
                                                        <div class="chart-label d-none d-sm-block"></div>
                                                        <div class="chart-label" id='todate'></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6 col-lg-6">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start pb-3 g-2">
                                                    <div class="card-title card-title-sm">
                                                        <h6 class="title">Student Performance</h6>
                                                    </div>
                                                    <div class="card-tools"><em class="card-hint icon ni ni-help"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            aria-label="Performance of this month"
                                                            data-bs-original-title="Performance of this month"></em>
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
                                                                        id="BounceRateData" width="150" height="36"
                                                                        style="display: block; width: 150px; height: 36px;"></canvas>
                                                                </div>
                                                            </div>
                                                            <div class="analytic-wp-text">
                                                                <div class="amount amount-sm">1,30,700</div>
                                                                <div class="subtitle">vs. last month</div>
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
                                                                        id="PageviewsData" width="150" height="36"
                                                                        style="display: block; width: 150px; height: 36px;"></canvas>
                                                                </div>
                                                            </div>
                                                            <div class="analytic-wp-text">
                                                                <div class="amount amount-sm">5.48</div>
                                                                <div class="subtitle">vs. last month</div>
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
                                                                        id="NewUsersData" width="150" height="36"
                                                                        style="display: block; width: 150px; height: 36px;"></canvas>
                                                                </div>
                                                            </div>
                                                            <div class="analytic-wp-text">
                                                                <div class="amount amount-sm">549</div>
                                                                <div class="subtitle">vs. last month</div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start pb-3 g-2">
                                                    <div class="card-title card-title-sm">
                                                        <h6 class="title">Student Performance</h6>
                                                    </div>
                                                    <div class="card-tools"><em class="card-hint icon ni ni-help"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            aria-label="Performance of this month"
                                                            data-bs-original-title="Performance of this month"></em>
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
                                                                        id="BounceRateData" width="150" height="36"
                                                                        style="display: block; width: 150px; height: 36px;"></canvas>
                                                                </div>
                                                            </div>
                                                            <div class="analytic-wp-text">
                                                                <div class="amount amount-sm">1,30,700</div>
                                                                <div class="subtitle">vs. last month</div>
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
                                                                        id="PageviewsData" width="150" height="36"
                                                                        style="display: block; width: 150px; height: 36px;"></canvas>
                                                                </div>
                                                            </div>
                                                            <div class="analytic-wp-text">
                                                                <div class="amount amount-sm">5.48</div>
                                                                <div class="subtitle">vs. last month</div>
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
                                                                        id="NewUsersData" width="150" height="36"
                                                                        style="display: block; width: 150px; height: 36px;"></canvas>
                                                                </div>
                                                            </div>
                                                            <div class="analytic-wp-text">
                                                                <div class="amount amount-sm">549</div>
                                                                <div class="subtitle">vs. last month</div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                   
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
                $(".datepickerr").datepicker()
                getOverview();
            })
            
            var langCode = localStorage.getItem('language-type');
            languageText(langCode);

            function getOverview(){
                $.ajax({
                    type: 'get',
                    url: api_base_url+"get-dashboard-details/"+$.cookie('school_id')
                }).done(({status, data}) =>{
                    if(status)
                    {
                        

                        const datas = {
                            labels: data.labels,
                            datasets: [
                                {
                                label: 'Dataset 1',
                                data: data.total_registered_students_analitics,
                                yAxisID: 'y',
                                },
                                {
                                label: 'Dataset 2',
                                data: data.total_students_attended_the_exam_analitics,
                                borderColor: "#a9cdff",
                                backgroundColor: "#a9cdff",
                                yAxisID: 'y1',
                                }
                            ]
                        };
                        const config = {
                            type: 'line',
                            data: datas,
                            options: {
                                responsive: true,
                                interaction: {
                                mode: 'index',
                                intersect: false,
                                },
                                stacked: false,
                                plugins: {
                                title: {
                                    display: true,
                                    text: 'Chart.js Line Chart - Multi Axis'
                                }
                                },
                                scales: {
                                y: {
                                    type: 'linear',
                                    display: true,
                                    position: 'left',
                                },
                                y1: {
                                    type: 'linear',
                                    display: true,
                                    position: 'right',

                                    // grid line settings
                                    grid: {
                                    drawOnChartArea: false, // only want the grid lines for one axis to show up
                                    },
                                },
                                }
                            },
                            };

                        new Chart(document.getElementById('analyticOverview'), config);
                    }
                }).fail(()=>{
                    NioApp.Toast('Error Occurred!', 'error')
                })
            }
        </script>
</body>

</html>