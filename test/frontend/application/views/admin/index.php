<style>
   .nk-content-fluid {
      top: 65px;
      position: relative;
   }

   .row>* {
      margin-top: 1.5rem !important;
   }

   .nk-block-between .nk-block-des {
      margin-bottom: 0px !important;
   }
</style>
<?php include_once APPPATH . 'views/admin/includes/header.php'; ?>


<body class="nk-body bg-white has-sidebar ">
   <div class="nk-app-root">
      <!-- main @s -->
      <div class="nk-main ">
         <!-- sidebar @s -->
         <?php include_once APPPATH . 'views/admin/includes/sidebar.php'; ?>

         <!-- sidebar @e -->
         <!-- wrap @s -->
         <div class="nk-wrap ">
            <?php include_once APPPATH . 'views/admin/includes/navbar.php'; ?>

            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content nk-content-fluid">
               <div class="container-xl wide-lg">
                  <div class="nk-content-body">
                     <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                           <div class="nk-block-head-content">
                              <h3 class="nk-block-title page-title dtitle" data-translate="Dashboard">Dashboard</h3>
                              <div class="nk-block-des text-soft">
                                 <p class="wel-title" data-translate="Welcome to Admin Dashboard">Welcome to Admin
                                    Dashboard.</p>
                              </div>
                           </div>
                           <div class="nk-block-head-content">
                              <div class="toggle-wrap nk-block-tools-toggle">
                                 <a href="javascript:void(0)" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                 <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                       <li>
                                          <div class="drodown">

                                             <a href="javascript:void(0)"
                                                class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                                                id="filters_btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                <em class="d-none d-sm-inline icon ni ni-calender-date"></em><span
                                                   class="three-title" id="current_duration">Today</span><em
                                                   class="dd-indc icon ni ni-chevron-right"></em></a>

                                             <div class="dropdown-menu dropdown-menu-end" aria-labelledby="filters_btn">

                                                <ul class="link-list-opt no-bdr pb-0">

                                                   <li><a href="javascript:void(0)" onclick="getOverview(1)"><span
                                                            class="three-title">Today</span></a>
                                                   </li>

                                                   <li><a href="javascript:void(0)" onclick="getOverview(2)"><span
                                                            id="six-title">This Week</span></a>

                                                   </li>
                                                   <li><a href="javascript:void(0)" onclick="getOverview(3)"><span
                                                            class="this-month" id="this-month">This Month</span></a>

                                                   </li>

                                                   <li><a href="javascript:void(0)" onclick="getOverview(4)"><span
                                                            id="last-six">Last 6 Months</span></a>

                                                   </li>

                                                   <li><a href="javascript:void(0)" onclick="getOverview(5)"><span
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

                                                                  <div
                                                                     class="d-flex flex-column align-items-center mt-2"
                                                                     style="gap: .5rem;">

                                                                     <input type="text" required placeholder="From date"
                                                                        name="fromdate" class="form-control">

                                                                     <span class="to-label">To</span>

                                                                     <input type="text" required placeholder="To date"
                                                                        name="todate" class="form-control">

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
                        <div class="row g-gs">
                           <div class="col-lg-7 py-0">
                              <div class="card card-bordered h-100 shadow">
                                 <div class="card-inner">
                                    <div class="card-title-group pb-3 g-2">
                                       <div class="card-title card-title-sm">
                                          <h6 class="title" id="tover" data-translate="Overview">Overview</h6>
                                          <p></p>
                                       </div>
                                    </div>
                                    <div class="analytic-ov">
                                       <div class="analytic-data-group analytic-ov-group g-3 justify-content-center">
                                          <div class="analytic-data analytic-ov-data text-center">
                                             <div class="title schools" data-translate="Schools">Schools</div>
                                             <div class="amount a d-flex justify-content-center"></div>
                                          </div>
                                          <div class="analytic-data analytic-ov-data text-center">
                                             <div class="title students" data-translate="Students">Students</div>
                                             <div class="amount b d-flex justify-content-center"></div>
                                          </div>
                                          <div class="analytic-data analytic-ov-data text-center">
                                             <div class="title exams" data-translate="Exams">Exams</div>
                                             <div class="amount c d-flex justify-content-center"></div>
                                          </div>

                                       </div>
                                       <div class="analytic-ov-ck h-auto">
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
                           <div class="col-md-6 py-0 col-lg-5">
                              <div class="card card-bordered h-100 shadow">
                                 <div class="card-inner">
                                    <div class="card-title-group align-start pb-3 g-2">
                                       <div class="card-title card-title-sm">
                                          <h6 class="title active-school" data-translate="Active Schools">Active Schools
                                          </h6>
                                       </div>
                                    </div>
                                    <div class="analytic-au">
                                       <div class="analytic-data-group analytic-au-group g-3">
                                          <div class="analytic-data analytic-au-data text-center">
                                             <div class="title month" data-translate="Monthly">Monthly</div>
                                             <div class="amount m"></div>
                                          </div>
                                          <div class="analytic-data analytic-au-data text-center">
                                             <div class="title week" data-translate="Weekly (Avg)">Weekly (Avg)</div>
                                             <div class="amount w"></div>
                                          </div>
                                          <div class="analytic-data analytic-au-data text-center">
                                             <div class="title daily" data-translate="Daily (Avg)">Daily (Avg)</div>
                                             <div class="amount day"></div>
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
                                          <canvas class="analytics-au-chart chartjs-render-monitor" id="bar" width="328"
                                             height="170" style="display: block; width: 328px; height: 170px;"></canvas>
                                       </div>
                                       <div class="chart-label-group">
                                          <div class="chart-label fromdate"></div>
                                          <div class="chart-label todate"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 py-0 col-lg-5 py-0">

                              <div class="card card-bordered h-100 shadow">

                                 <div class="card-inner">

                                    <div class="card-title-group align-start pb-3 g-2">

                                       <div class="card-title card-title-sm">

                                          <h6 class="title stud-perf" id="stud-perf">Student Performance</h6>

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

                                                   <canvas class="analytics-line-small chartjs-render-monitor"
                                                      id="attended" width="150" height="36"
                                                      style="display: block; width: 150px; height: 36px;"></canvas>

                                                </div>

                                             </div>

                                             <div class="analytic-wp-text">

                                                <div class="amount amount-sm attended"></div>

                                                <div class="subtitle current_duration this-month">Last 30 days
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

                                                   <canvas class="analytics-line-small chartjs-render-monitor"
                                                      id="passed" width="150" height="36"
                                                      style="display: block; width: 150px; height: 36px;"></canvas>

                                                </div>

                                             </div>

                                             <div class="analytic-wp-text">

                                                <div class="amount amount-sm passed"></div>

                                                <div class="subtitle current_duration this-month">Last 30 days
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

                                                   <canvas class="analytics-line-small chartjs-render-monitor"
                                                      id="failed" width="150" height="36"
                                                      style="display: block; width: 150px; height: 36px;"></canvas>

                                                </div>

                                             </div>

                                             <div class="analytic-wp-text">

                                                <div class="amount amount-sm failed"></div>

                                                <div class="subtitle current_duration this-month">Last 30 days
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
                                          <h6 class="title school-wise" data-translate="School Wise Performance">School
                                             Wise Performance</h6>
                                       </div>
                                       <div class="card-tools">
                                          <div class="drodown">
                                             <a href="<?= base_url('admin/examination') ?>"
                                                class="btn btn-sm btn-outline-light btn-white" id="view-more">View More

                                                <em class="icon ni ni-arrow-right"></em>

                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="nk-tb-list is-loose traffic-channel-table" id="latest_exams">

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- content @e -->
            <!-- footer @s -->
            <div class="nk-footer">
               <div class="container-fluid">
                  <div class="nk-footer-wrap">
                     <div class="nk-footer-copyright"> © 2022 Mentric. <a href="https://softnio.com"
                           target="_blank"></a></div>
                  </div>
               </div>
               <!-- footer @e -->
            </div>
            <!-- wrap @e -->
         </div>
         <!-- main @e -->
      </div>
      <!-- app-root @e -->

      <?php include_once APPPATH . 'views/admin/includes/footer-scripts.php'; ?>

      <script src="<?php echo base_url('assets/js/charts/gd-default.js?ver=3.0.0'); ?>"></script>
      <script src="<?php echo base_url('assets/js/charts/gd-analytics.js?ver=3.0.0'); ?>"></script>
      <script src="<?php echo base_url('assets/js/libs/jqvmap.js?ver=3.0.0'); ?>"></script>
      <script>

         // (function (NioApp, $) {

         //    appModule.checkAuth();

         // })(NioApp, jQuery);

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

               const from = $('[name="fromdate"]').val();
               const to = $('[name="todate"]').val();

               $("#current_duration, .current_duration").html(`${from} To ${to}`);

               var diff = moment(to).diff(from, 'day');
               if (diff > 30) {
                  $('.title.month').html("Monthly (Avg)")
               }

               $("#custom_date")[0].reset();

            }

            else {
               $(".title.month").html('Monthly')

               switch (dates) {

                  case 1:

                     $("#current_duration, .current_duration").html('Today');
                     $(".amount.m").html('-')
                     $(".amount.w").html('-')

                     break;

                  case 2:

                     $("#current_duration, .current_duration").html('This Week');
                     $(".amount.m").html('-')
                     break;

                  case 3:

                     $("#current_duration, .current_duration").html('This Month');

                     break;

                  case 4:

                     $("#current_duration, .current_duration").html('Last 6 Months');
                     $(".title.month").html('6 Months')

                     break;

                  case 5:

                     $("#current_duration, .current_duration").html('This Year');
                     $(".title.month").html('This Year')

                     break;

               }

               dates = {

                  dates

               }

            }


            $.ajax({
               type: 'get',
               url: api_base_url + "get-dashboard-details/0",
               data: dates,
               headers: {
                  Authorization: $.cookie('access_token')
               }
            }).done(({ status, data }) => {

               if (status) {

                  $('.amount.b').html('<span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>' + (data.total_registered_students_analitics).reduce((partialSum, a) => partialSum + a, 0))

                  $('.amount.a').html('<span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>' + (data.school_analitics).reduce((partialSum, a) => partialSum + a, 0))

                  $('.amount.c').html('<span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>' + (data.total_exams_analitics).reduce((partialSum, a) => partialSum + a, 0))

                  $('.attended').html((data.total_students_attended_the_exam_analitics).reduce((partialSum, a) => partialSum + a, 0))

                  $('.passed').html((data.total_students_passed_analitics).reduce((partialSum, a) => partialSum + a, 0))

                  $('.failed').html((data.total_students_failed_analitics).reduce((partialSum, a) => partialSum + a, 0))

                  let total = (data.activeSchoolAnalitics).reduce((partialSum, a) => partialSum + a, 0);

                  if (customDate && diff > 30) {
                     $('.amount.m').html(Math.round(total / 30))

                  }
                  else {
                     $('.amount.m').html(data.activeSchoolAnalitics.length >= moment().diff(moment().startOf('month'), 'days') ? total : '-')
                  }
                  $('.amount.w').html(data.activeSchoolAnalitics.length >= moment().diff(moment().startOf('week'), 'days') ? Math.round(total / 7) : '-')
                  $('.amount.day').html(data.activeSchoolAnalitics.length >= 1 ? Math.round(total / 30) : '0')



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
                     $('#latest_exams').html(`

                  <div class="nk-tb-item nk-tb-head">
                  <div class="nk-tb-col nk-tb-prev-sessions"><span class="school-name"
                           data-translate="School Name">School Name</span></div>
                     <div class="nk-tb-col nk-tb-sessions"><span class="city"
                           data-translate="City">City</span></div>
                     <div class="nk-tb-col nk-tb-change"><span class="total_exams"
                           data-translate="Total Exams">Total Exams</span></div>
                     <div class="nk-tb-col nk-tb-trend tb-col-sm text-end"><span class="performance"
                           data-translate="performance">Performance</span></div>
                  </div>

            `)

                     data.latestExams.forEach((school, inx) => {

                        $("#latest_exams").append(`
                     <div class="nk-tb-item">
                     <div class="nk-tb-col nk-tb-sessions"><span class="tb-sub tb-amount"><span
                                 data-translate>${school.name}</span></span></div>
                        <div class="nk-tb-col nk-tb-channel"><span class="tb-lead"
                              data-translate>${school.city_name}</span></div>
                        <div class="nk-tb-col nk-tb-prev-sessions"><span class="tb-sub tb-amount"><span
                                 data-translate>${school.total_exams}</span></span></div>
                        <div class="nk-tb-col nk-tb-trend text-end">
                           <div class="traffic-channel-ck ms-auto">
                              <div class="chartjs-size-monitor">
                                 <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                 </div>
                                 <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                 </div>
                              </div>
                              <canvas class="analytics-line-small chartjs-render-monitor"
                                 id="school${inx}" width="130" height="44"
                                 style="display: block; width: 130px; height: 44px;"></canvas>
                           </div>
                        </div>
                     </div>
                     `)
                        const tempp = {
                           type: 'line',
                           responsive: true,
                           bezierCurve: false,
                           datasetFill: true,
                           data: {
                              labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                              dataUnit: 'People',
                              datasets: [{
                                 pointBorderColor: 'rgba(0, 0, 0, 0)',
                                 pointBackgroundColor: 'rgba(0, 0, 0, 0)',
                                 pointHoverBorderColor: '#9a89ff',
                                 borderColor: "#9a89ff",
                                 backgroundColor: NioApp.hexRGB('#9a89ff', .15),
                                 borderWidth: 2,
                                 data: school.pass_analitics,
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

                        new Chart(document.getElementById('school' + inx), tempp);
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

                        datasets: [
                           {

                              pointBorderColor: 'rgba(0, 0, 0, 0)',

                              pointBackgroundColor: 'rgba(0, 0, 0, 0)',

                              pointHoverBorderColor: '#9a89ff',

                              label: "Schools",

                              borderColor: "#9a89ff",

                              backgroundColor: NioApp.hexRGB('#9a89ff', .15),

                              borderWidth: 2,

                              data: data.school_analitics,

                           }, {

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

                           pointHoverBorderColor: '#9a89ff',

                           borderColor: "#9a89ff",

                           backgroundColor: NioApp.hexRGB('#9a89ff', .15),

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

                           pointHoverBorderColor: '#ffa9ce',

                           borderColor: "#ffa9ce",

                           backgroundColor: NioApp.hexRGB('#ffa9ce', .15),

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

                           label: 'Active Schools',

                           data: data.activeSchoolAnalitics,
                           borderColor: "#3a8dfe",
                           backgroundColor: NioApp.hexRGB('#3a8dfe', .15),
                           borderWidth: 1
                        }],


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
                                 labelString: 'Number of active schools'
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