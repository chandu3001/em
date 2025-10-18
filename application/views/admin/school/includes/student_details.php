
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">

            <div class="nk-block">
                <div class="card card-bordered card-stretch">
                    <div class="card-inner-group">
                        <div class="card-inner position-relative card-tools-toggle">
                            <div class="card-title-group">
                                <div class="card-tools">
                                    <div class="form-inline flex-nowrap gx-3">
                                        <div class="form-wrap w-150px">
                                             <select id="sort-by-stud"
                                                class="form-select form-select-sm js-select2" onchange="GetStudentLists(1,{sortBy:$(this).val()})"
                                               data-placeholder="Sort By">
                                                <option value=""></option>
                                                <option value="0" data-translate>Select All</option>
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
                                                            <a class="btn btn-trigger btn-icon dropdown-toggle"
                                                               data-bs-toggle="dropdown">
                                                               <div class="dot dot-primary"></div>
                                                               <em class="icon ni ni-filter-alt"></em>
                                                            </a>

                                                            <div
                                                               class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                               <form id="stu-filter-form">
                                                                  <div class="dropdown-head">
                                                                     <span
                                                                        class="sub-title dropdown-title filters" data-translate>Filters</span>
                                                                     <!-- <div class="dropdown"><a href="javascript:void(0)"
                                                                           class="btn btn-sm btn-icon"><em
                                                                              class="icon ni ni-more-h"></em></a></div> -->
                                                                  </div>
                                                                  <div class="dropdown-body dropdown-body-rg">
                                                                     <div class="row gx-6 gy-3">
                                                                       
                                                                        <div class="col-12">
                                                                           <div class="form-group">
                                                                              <label
                                                                                 class="overline-title overline-title-alt license-type" data-translate>License
                                                                                 Type</label>
                                                                              <select name="license_id"
                                                                                 id="license-filter"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-placeholder="License Type">
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
                                                                  <div class="dropdown-foot between">
                                                                  <button type="reset" id="clear-filter" class="link p-0 text-primary"
                                                                  onclick="GetStudentLists(1, {filter: 'clearFilter'})" data-translate>Clear
                                                                  Filters</button>
                                                                        <!-- <a href="javascript:void(0)">Save  Filters</a> -->
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
                                                                   <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input checked onchange="GetStudentLists(1,{pageSize:10})"  type="checkbox"  class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                   <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input onchange="GetStudentLists(1,{pageSize:20})" type="checkbox" class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input onchange="GetStudentLists(1,{pageSize:50})" type="checkbox"  class="radio" value="1" name="fooby[1][]" ></a></li>
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
                                       <form id="studentSearchForm">

                                          <div class="search-content d-flex">
                                             <a href="javascript:void(0)" id="search-resett"
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
                            <h4 class='text-center p-2' id="load-datas"></h4>

                            <div class="nk-tb-list nk-tb-ulist" id="students_list">
                                
                                
                            </div>
                        </div>
                        <div class="card-inner" id="students_list_pagination">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script>
   // the selector will match all input controls of type :checkbox
// and attach a click event handler 
$("input:checkbox").on('click', function() {
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
<script type="text/javascript">


      $(function () {

         getLicenseList();

        $("#stu-filter-form").on("submit", function(e){
           e.preventDefault();
           GetStudentLists(page,{filter: $(this).serialize()})
          });
      });

      function getLicenseList()
      {
         $.ajax({
            type: "get",
            url: `https://dsms.technoiq.in/backend/api/auth/all_main_license/${getUrlParam('id') ? getUrlParam('id') : 0}`
         }).done(({errors, data}) =>{
            if(!errors)
            {
               $("#license-filter").html('')
               data.result.forEach(item =>{
                  $("#license-filter").append(`<option value="">Choose license</option><option value="${item.id}">${item.name}</option>`)
               })
            }
            else
            {
               NioApp.Toast("Error Occurred", "error");
            }
         })
      }

      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      const convertURL =  urlParams.get('page');


        var pageNo = convertURL ? convertURL : 1;

        var filters1 = '';

        var pageSize = 10;

        var query = '';
        var sortby = 0;

      function GetStudentLists(pageNumber = pageNo, option = {})
      {
         console.log('pno'+pageNumber)
        
         urlPage(pageNumber)

         let params = '';

        page = pageNumber;

        var sortby = option.sortBy ? option.sortBy : "";

        pageSize = option.pageSize ? option.pageSize : pageSize;

        filters1 = option.filter ? option.filter : filters1;

        query = option.q ? option.q : query

        params +=`page=${page}&sortby=${sortby}&pageSize=${pageSize}&${filters1}&${query}`;


         $('.dropdown-menu').removeClass('show');
         $('.filter-wg').removeClass('show');
         $('.dropdown-toggle').removeClass('show');

        /*showLoader({
            // title: "Data Fetching From DSMS",
            title: "Please Wait..."
        })*/

         let searchParams = new URLSearchParams(window.location.search);
         let schoolID = searchParams.get("id");
        $.ajax({
            type: "get",
            url:`https://dsms.technoiq.in/backend/api/auth/students_lists/${schoolID}?${params}`,
           // url: `${api_base_url}student-list-by-school-id/${schoolID}?${params}`,
        }).done(({status, message, data}) =>{
            //if(status)
            //{
                if(data.result.total > 0)
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

                    $("#students_list").html(`
                        <div class="nk-tb-item nk-tb-head student-detail-list">
                           <div class="nk-tb-col"><span class="text-black fw-bold slno" data-translate="Sl.No">Sl.No</span></div>
                           <div class="nk-tb-col"><span class="text-black fw-bold student" data-translate="Student">Student</span></div>
                           <div class="nk-tb-col"><span class="text-black fw-bold mobile" data-translate="Contact No">Contact No</span></div>
                           <div class="nk-tb-col"><span class="text-black fw-bold email" data-translate="Email">Email</span></div>
                            <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold license-type" data-translate="License Type">License Type</span></div>
                            <div class="nk-tb-col"><span class="text-black fw-bold sub-name" data-translate="Sub-License Type">Sub License Type</span></div>
                            <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold action" data-translate="Action">Action</span></div>
                        </div>
                    `)

                    
                    data.result.data.forEach(item =>{
                $("#students_list").append(`
                    <div class="nk-tb-item details">
                        <div class="nk-tb-col tb-col-md">${data.result.from++}</div>

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
                        <div class="nk-tb-col tb-col-md"><span>${item.license_name}</span></div>
                        <div class="nk-tb-col"><span>${item.sub_license_name}</span></div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="">

                                <li>
                                    <div class="drodown">
                                        <a class="btn btn-sm btn-icon btn-trigger dropdown-toggle"
                                            data-bs-toggle="dropdown"><em
                                                class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                   <!-- <a href="${formUrl('admin/schools/student?id='+item.id+'?'+id)}">-->
                                                   <a href="${formUrl('admin/schools/student?id='+item.id)}">
                                                        <em class="icon ni ni-eye"></em>
                                                        <span class="view-detail">View Details</span>
                                                    </a>
                                                </li>
                                               <!-- <li>
                                                    <a id="viewExam" href="${formUrl('admin/schools/answersheet?id='+item.reference_id)}">
                                                        <em class="icon ni ni-eye"></em>
                                                        <span>View Answers</span>
                                                    </a>
                                                </li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>`)
                })
                $("#students_list_pagination").pagination({
                    items: parseInt(data.result.total),
                    itemsOnPage: parseInt(data.result.per_page),
                    currentPage: data.result.current_page,
                    displayedPages: 3,
                    navStyle: "pagination justify-content-center justify-content-md-start",
                    listStyle: "page-item",
                    linkStyle: "page-link",

                    onPageClick: function (pageNumber, event) {
                        event ? event.preventDefault() : '';
                        GetStudentLists(pageNumber);
                    }
                })
                }
                else
                {
                    $("#students_list").html(`<div class="nk-tb-item-empty">
                        <p class="text-center text-black fw-bold"> No Student Available</p>
                    </div>`);
                    $("#students_list_pagination").html('')
                }
                
            /*}
            else
            {
                NioApp.Toast(message, "warning");
            }*/
        }).fail(({statusText, status, responseJSON}) =>{
            if(status == 400)
                NioApp.Toast(responseJSON.message, "error");
            else
                NioApp.Toast(statusText, "error");
        }).always(()=>{
            hideLoader();
        })
      }

    $("#studentSearchForm").on("submit", function(e){
        e.preventDefault();
        GetStudentLists(page,{q: $(this).serialize()})
    });

    $("#search-resett").click(function(){
      query = "";
      GetStudentLists(1);
    })

 
</script>