<style>
   .card-inner .tab-content{
      margin-top: 0px !important;
   }
</style>
<div class="nk-content nk-content-fluid" style="padding:0px !important;">
    <div class="container-xl wide-lg" style="padding-right: 0px;padding-left: 0px;">
        <div class="nk-content-body">

            <div class="nk-block">
                <div class="card card-bordered card-stretch" style="box-shadow:none !important;">
                    <div class="card-inner-group exam-inner">
                        <div class="card-inner position-relative card-tools-toggle">
                            <div class="card-title-group">
                                <div class="card-tools">
                                    <div class="form-inline flex-nowrap gx-3">
                                        <div class="form-wrap w-150px">
                                             <select id="sort_by_exam"
                                                class="form-select form-select-sm js-select2" onchange="GetExamResultLists(1,{sortBy:$(this).val()})"
                                               data-placeholder="Sort By">
                                                <option value=""></option>
                                                <option value="3" data-translate>Select All</option>
                                                <option value="1" data-translate>Ascending</option>
                                                <option value="2" data-translate>Descending</option>
                                             </select>
                                        </div>
                                      
                                    </div>
                                </div>
                                <div class="card-tools me-n1">
                                       <ul class="btn-toolbar gx-1">
                                          <li><a href="javascript:void(0)"
                                                class="btn btn-icon search-toggle toggle-search"
                                                data-target="search"><em class="icon ni ni-search"></em></a></li>
                                          <li class="btn-toolbar-sep"></li>
                                          <li>
                                             <div class="toggle-wrap">
                                                <a href="javascript:void(0)" class="btn btn-icon btn-trigger toggle"
                                                   data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                <div class="toggle-content" data-content="cardTools">
                                                   <ul class="btn-toolbar gx-1">
                                                      <li class="toggle-close"><a href="javascript:void(0)"
                                                            class="btn btn-icon btn-trigger toggle"
                                                            data-target="cardTools"><em
                                                               class="icon ni ni-arrow-left"></em></a></li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a class="btn btn-trigger btn-icon dropdown-toggle filter-dropdown"
                                                               data-bs-toggle="dropdown">
                                                               <div class="dot dot-primary"></div>
                                                               <em class="icon ni ni-filter-alt"></em>
                                                            </a>

                                                            <div
                                                               class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                               <form id="exam-filter-form">
                                                                  <div class="dropdown-head">
                                                                     <span
                                                                        class="sub-title dropdown-title filters" data-translate>Filters</span>
                                                                   
                                                                  </div>
                                                                  <div class="dropdown-body dropdown-body-rg">
                                                                     <div class="row gx-6 gy-3">
                                                                     
                                                                        <div class="col-6">
                                                                           <div class="form-group">
                                                                              <label
                                                                                 class="overline-title overline-title-alt result" data-translate>Result</label>
                                                                              <select name="result" id="result"
                                                                                 class="form-select form-select-sm js-select2" data-placeholder="Result">
                                                                                 <option value=""></option>
                                                                                 <option value="pass" data-translate>Pass</option>
                                                                                 <option value="fail" data-translate>Fail</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                       
                                                                        <div class="col-12">
                                                                           <div class="form-group"><button type="submit"
                                                                                 class="btn btn-secondary apply-btn" data-translate>Apply</button>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="dropdown-foot between"><a href="javascript:void(0)"
                                                                        class="clickable" id="clear-filter" data-translate
                                                                        >Clear Filters</a>
                                                                        <!-- <a href="javascript:void(0)">Save Filters</a> -->
                                                                     </div>
                                                               </form>
                                                            </div>

                                                         </div>
                                                      </li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="javascript:void(0)"
                                                               class="btn btn-trigger btn-icon dropdown-toggle"
                                                               data-bs-toggle="dropdown"><em
                                                                  class="icon ni ni-setting"></em></a>
                                                            <div
                                                               class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                               <ul class="link-check">
                                                                  <li><span class="show-label" data-translate>Show</span></li>
                                                                       <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input onchange="GetExamResultLists(1,{pageSize:10})" checked type="checkbox"  class="radio" value="1" name="fooby"></a></li>
                                                                   <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input onchange="GetExamResultLists(1,{pageSize:20})" type="checkbox" class="radio" value="1" name="fooby"></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input onchange="GetExamResultLists(1,{pageSize:50})" type="checkbox"  class="radio" value="1" name="fooby"></a></li>
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
                                       <form id="examSearchForm">

                                          <div class="search-content d-flex">
                                             <a href="javascript:void(0)" id="reset-search"
                                                class="search-bStudent IDk btn btn-icon toggle-search"
                                                data-target="search">
                                                <em class="icon ni ni-arrow-left"></em>
                                             </a>
                                             <input type="text" class="form-control border-transparent form-focus-none"
                                                name="q" placeholder="Search...">
                                             <button class="search-submit btn btn-icon">
                                                <em class="icon ni ni-search"></em>
                                             </button>
                                          </div>
                                       </form>

                                    </div>
                            </div>
                        </div>
                        <div class="card-inner p-0 text-center">
                           <h4 class='text-center p-2' id="load-data"></h4>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">

 $(function () {
        // async function init() {
           // const auth = await appModule.checkAuth();
         //}
          $.ajaxSetup({
                headers: {
                    'Authorization': `Bearer ${$.cookie("access_token")}`
                },
                dataType: 'json'
            });


         GetExamResultLists();
         var langCode = localStorage.getItem('language-type');

        
         //init();
      });
     
        var page = 1;

        var filters = '';

        var pageSize = 10;

        var query = '';

      function GetExamResultLists(pageNumber = page, option = {})
      {
         
         console.log(222)
         $('.dropdown-menu').removeClass('show');
         $('.filter-wg').removeClass('show');
         $('.filter-dropdown').removeClass('show');


         let params = '';

        page = pageNumber;

        var sortby = option.sortBy ? option.sortBy : 2;

        pageSize = option.pageSize ? option.pageSize : pageSize;

        filters = option.filter ? option.filter : filters;

        query = option.q ? option.q : query

        params +=`page=${page}&sortby=${sortby}&pageSize=${pageSize}&${filters}&${query}`;

         let searchParams = new URLSearchParams(window.location.search)
         let student_id = searchParams.get("student_id")
        /*showLoader({
            // title: "Data Fetching From DSMS",
            title: "Please Wait..."
        })*/
       
        console.log('options are'+option)
        $.ajax({
            type: "get",
            url: `${api_base_url}exam-result/0?${params}`,
            data: {
                        student_id
                  }
        }).done(({status, message, data, license_name, exam_name}) =>{
            if (status) {

                        $("#license_name").text(license_name)
                        $("#exam_name").text(exam_name)
                        $("#total_attended").text(data.total)
                        addTextClr= resultData = '';

                        if (data.total > 0) {
                            languageText(langCode);
                             if(langCode == 2){
                               $("#preloader2").show();
                                 setTimeout(function () {
                                    setTimeout(function () {
                                        $("#preloader2").hide();
                                    }, 1000);
                                 }, 500);
                              }
                            $("#examination_results").html(
                                `
                                <div class="nk-tb-item nk-tb-head exams-detail-list">
                                    <div class="nk-tb-col"><span class="text-black fw-bold slno">Sl.No</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold student-name" data-translate="Student Name">Student Name</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold exam-title" data-translate="Exam Name">Exam Name</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold correct-ans" data-translate="Total Correct Answers">Total Correct Answers</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold wrong-ans" data-translate="Total Wrong Answers">Total Wrong Answers</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold skip-ans" data-translate="Total Skipped Answers">Total Skipped Answers</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold tot-score" data-translate="Total Score">Total Score</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold obt-score" data-translate="Total Obtained Score">Total Obtained Score</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold result" data-translate="Result">Result</span></div>
                                    <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold action" data-translate="Action">Action</span>
                                    </div>
                                </div>
                                `
                            )
                          
                            data.data.forEach(item => {


                           function getFormattedDate(date,time) {
                              var year = date.getFullYear();
                              var month = (1 + date.getMonth()).toString();
                              month = month.length > 1 ? month : '0' + month;
                              var day = date.getDate().toString();
                              day = day.length > 1 ? day : '0' + day;

                              let hour = (time.split(':'))[0]
                              let min = (time.split(':'))[1]
                              let part = hour > 12 ? ' PM' : ' AM';
                                                  
                             min = (min+'').length == 1 ? `0${min}` : min;
                             hour = hour > 12 ? hour - 12 : hour;
                             hour = (hour+'').length == 1 ? `0${hour}` : hour;

                            return day + '-' + month + '-' + year + ' ' + hour+':' +min + part;
                           }
                           startDate = new Date(item.started_at);
                           var time = startDate.toLocaleTimeString();

                           selectedDate = getFormattedDate(startDate,time);

                            if(item.result == 'pass'){
                                 resultData =`<button  type="button" class="btn btn-sm btn-success tpass" style="background:#1abe92;padding: 4px 14px;border:none;">Pass</button>`;
                                 addTextClr = "color:#e85347;";                              
                              }else{
                                  resultData =`<button  type="button" class="btn btn-sm btn-danger failed-title" style="border:none;padding:4px 17px;">Fail</button>`
                                 addTextClr = "color:#1abe92";                              
                              }

                            $("#examination_results").append(
                                `
                            <div class="nk-tb-item">
                            <div class="nk-tb-col tb-col-md">${data.from++}</div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">
                                <div class="user-info">
                                    <span class="tb-lead">${item.student_name}</span>
                                    <span>Student ID: ${item.student_id}</span>
                                </div>
                                </div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">
                                 <div class="user-info">
                                    <span class="tb-lead">${item.exam_name}</span>
                                    <span>Date: ${selectedDate}</span>
                                </div>

                                </div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.total_correct_answers}</div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.total_wrong_answers}</div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.total_skipped_answers}</div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.total_marks}</div>
                                <div class="nk-tb-col tb-col-md student-info" data-stud-id="${item.student_id}">${item.obtained_marks}</div>
                                <div class="nk-tb-col tb-col-md student-info text-capitalize" style="${addTextClr}">${resultData}</div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                <ul class="">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle"
                                            data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="${formUrl('admin/students/answersheet?id=' + item.id)}" onclick="storeBackURL()"><em class="icon ni ni-eye"></em><span class="view-results">View Results</span></a></li>
                                                
                                            
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
                             noData =  (langCode == 2) ?  "لا توجد نتيجة فحص متاحة" : "No Examination Result Available";
                            $("#examination_results").html(`<div class="nk-tb-item-empty">
                                <p class="text-center text-black fw-bold no-exam-title">`+noData+ `</p>
                            </div>`);
                            $("#exam-list-pagination").html('')
                        }
                        
                    }
                    else {
                        NioApp.Toast(message, "warning");
                    }
        }).fail(({statusText, status, responseJSON}) =>{
            if(status == 400)
                NioApp.Toast(responseJSON.message, "error");
            else
                NioApp.Toast(statusText, "error");
        }).always(()=>{
            //hideLoader();
            
        })
      }


      $('.radio').click(function(){
         $('.radio').prop('checked', false)
         $(this).prop('checked', true)

      })
  
    $("#examSearchForm").on("submit", function(e){
      e.preventDefault();
      GetExamResultLists(1, {
         q: $(this).serialize()
      })
    })
    $("#exam-filter-form").on("submit", function(e){
        e.preventDefault();
        GetExamResultLists(1,{filter: $(this).serialize()})
    })
    $("#clear-filter").on("click", function(e){
        e.preventDefault();
        $('#result').select2('val','null');
        filters = '';
        GetExamResultLists();
    })

    $("#reset-search").click(function(){
      query = '';
      GetExamResultLists();
    })
   
 
</script>