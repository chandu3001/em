<?php include_once APPPATH . 'views/school/includes/header.php'; ?>
<style>
   .disable {
      pointer-events: none;

   }

   @media (min-width: 1024px) {
      .nk-tb-item .nk-tb-col {
         min-width: 115px !important;
      }
   }

   .nk-tb-item .width_question {
      word-break: break-all;
   }

   #correct-error {
      bottom: 60px !important;
      position: relative !important;
      width: 120px !important;
   }

   .details #question-dir {
      left: 10px;
      position: relative;
   }

   span#correct-error {
      color: white;
      padding: 4px;
   }
</style>

<body class="nk-body npc-crypto bg-lighter has-sidebar ">
   <div class="modal fade" id="bulkUploadModal" tabindex="-1" aria-labelledby="bulkUploadModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="bulkUploadModalLabel">Bulk Upload</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
               <div>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                     <button class="nav-link me-3 active template-tab" id="nav-home-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                        aria-selected="true">Template</button>
                     <button class="nav-link upload-tab" id="nav-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                        aria-selected="false">Upload</button>
                  </div>
               </div>
               <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                     <form id="templeteForm">
                        <div class="mb-3">
                           <label for="default-lang" class="col-form-label def-lang">Default Language:</label>
                           <input class="form-control d-none" name="from" id="from" data-placeholder="Select Language">
                           <input type='text' class="form-control" disabled id="fromView">
                        </div>
                        <div class="mb-3 d-flex align-items-center" style="gap:.5em">
                           <label for="to" class="col-form-label" id="temp-confirm">Do you want to add Questions to
                              another language?:</label>
                           <input class="form-check-input m-0" onchange="showToDropdown(this)" type="checkbox">
                           <label for="to" class="col-form-label is-yes">Yes</label>

                        </div>
                        <div class="mb-3 d-none" id="to-lang">
                           <label for="to" class="col-form-label">To:</label>
                           <select class="form-control" name="to" id="to" data-placeholder="Select Language">
                              <option value=""></option>
                           </select>
                        </div>
                        <button class="btn btn-primary" id="download-temp">Downlod Template</button>
                     </form>
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                     <form id="bulkupload" enctype="multipart/form-data">
                        <div class="mb-3">
                           <label for="file" class="col-form-label upload-tab">Upload:</label>
                           <input type="file" class="form-control" id="file" name="file">
                        </div>
                        <button class="btn btn-primary upload-tab">Upload</button>

                     </form>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>
   <div class="modal fade" id="makeLanguageDefault" tabindex="-1" aria-labelledby="makeLanguageDefaultLabel"
      aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="makeLanguageDefaultLabel">Set Default Language</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="makeLanguageDefaultForm">
               <div class="modal-body">
                  <div class="mb-3">
                     <label for="recipient-name" class="col-form-label">Languages:</label>
                     <select name="id" id="language_id" class="form-control" id="">

                     </select>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               </div>
            </form>

         </div>
      </div>
   </div>
   <div class="nk-app-root">
      <div class="nk-main ">

         <?php include_once APPPATH . 'views/school/includes/sidebar.php'; ?>

         <div class="nk-wrap ">

            <?php include_once APPPATH . 'views/school/includes/navbar.php'; ?>

            <div class="nk-content nk-content-fluid">
               <div class="container-xl wide-lg">
                  <div class="nk-content-body">
                     <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                           <div class="nk-block-head-content">
                              <h3 class="nk-block-title page-title que-pool-title" style="margin-bottom:-5px;">Question
                                 Pool</h3>
                              <div class="nk-block-des text-soft">
                                 <p id="total-pool"></p>
                              </div>
                           </div>
                           <div class="nk-block-head-content">
                              <div class="toggle-wrap nk-block-tools-toggle">
                                 <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                    data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                 <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                       <li class="nk-block-tools-opt"><a data-bs-toggle="modal"
                                             data-bs-target="#bulkUploadModal" class="btn btn-primary bulk-uploadlabel"
                                             aria-expanded="false">Bulk Upload</a></li>
                                       <li class="nk-block-tools-opt"><a id="btn-add-question"
                                             class="btn btn-icon btn-primary" aria-expanded="false"><em
                                                class="icon ni ni-plus"></em></a></li>
                                       <!-- <li class="nk-block-tools-opt"><a id="btn-refresh-questions"
                                             class="btn btn-icon btn-primary" aria-expanded="false"><em
                                                class="icon ni ni-reload"></em></a></li> -->

                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="nk-block">
                        <div class="card card-bordered card-stretch">
                           <div class="card-inner-group">
                              <div class="card-inner position-relative card-tools-toggle">
                                 <div class="card-title-group">
                                    <div class="card-tools">
                                       <div class="form-inline flex-nowrap gx-3">
                                          <div class="form-wrap w-150px">
                                             <select id="sortBy" class="form-select form-select-sm js-select2 "
                                                data-search="off" data-placeholder="Sort By">
                                                <option value=""></option>
                                                <option value="0">Select All</option>
                                                <option value="1">Ascending</option>
                                                <option value="2">Descending</option>

                                             </select>
                                          </div>
                                          <div class="btn-wrap">
                                             <span class="d-md-none"><button
                                                   class="btn btn-dim btn-outline-light btn-icon disabled"><em
                                                      class="icon ni ni-arrow-right"></em></button></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="card-tools me-n1">
                                       <ul class="btn-toolbar gx-1">
                                          <li><a href="#" class="btn btn-icon search-toggle toggle-search"
                                                data-target="search"><em class="icon ni ni-search"></em></a></li>
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
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle"
                                                               data-bs-toggle="dropdown">
                                                               <div class="dot dot-primary"></div>
                                                               <em class="icon ni ni-filter-alt"></em>
                                                            </a>
                                                            <div
                                                               class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                               <div class="dropdown-head">
                                                                  <span class="sub-title dropdown-title">Filters</span>
                                                                  <!-- <div class="dropdown"><a href="#" class="btn btn-sm btn-icon"><em class="icon ni ni-more-h"></em></a></div> -->
                                                               </div>
                                                               <div class="dropdown-body dropdown-body-rg">
                                                                  <form id="question_pool_filter_form">
                                                                     <div class="row gx-6 gy-3">
                                                                        <div class="col-6">
                                                                           <div class="form-group">
                                                                              <label
                                                                                 class="overline-title overline-title-alt family">Group</label>
                                                                              <select id="family_filter"
                                                                                 name="family_id"
                                                                                 class="form-select form-select-sm form-control"
                                                                                 data-placeholder="Choose Group">
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                           <div class="form-group">
                                                                              <label
                                                                                 class="overline-title overline-title-alt diff-level">Difficulty
                                                                                 Level</label>
                                                                              <select name="difficulty_level"
                                                                                 id="difficulty_level_filter"
                                                                                 class="form-select form-select-sm form-control"
                                                                                 data-placeholder="Choose difficult level">

                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                           <div class="form-group">
                                                                              <label
                                                                                 class="overline-title overline-title-alt que-type">Question
                                                                                 Type</label>
                                                                              <select name="question_type"
                                                                                 class="form-select form-select-sm form-control"
                                                                                 id="question_type"
                                                                                 data-placeholder="Select Question Type">
                                                                                 <option value=""></option>
                                                                                 <option value="1">Text</option>
                                                                                 <option value="2">With Image</option>
                                                                                 <option value="3">With Video</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                           <div class="d-flex align-items-center">
                                                                              <input type="checkbox" value="1"
                                                                                 name='is_elimentry' class="me-2" />
                                                                              <label class="elim-que">Eliminatory
                                                                                 Questions</label>

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
                                                               <div class="dropdown-foot between"> <button type="reset"
                                                                     class="clickable bg-transparent border-0 text-primary"
                                                                     id="form_clear">Clear Filters</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle"
                                                               data-bs-toggle="dropdown"><em
                                                                  class="icon ni ni-setting"></em></a>
                                                            <div
                                                               class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                               <ul class="link-check">
                                                                  <li><span class="show-label">Show</span></li>
                                                                  <li><a href="javascript:void(0)"
                                                                        style="justify-content: space-between;">10
                                                                        <input
                                                                           onchange="getQuestionpool(1,{page_size:10})"
                                                                           checked type="checkbox" class="radio"
                                                                           value="1" name="fooby[1][]"></a></li>
                                                                  <li><a href="javascript:void(0)"
                                                                        style="justify-content: space-between;">20
                                                                        <input
                                                                           onchange="getQuestionpool(1,{page_size:20})"
                                                                           type="checkbox" class="radio" value="1"
                                                                           name="fooby[1][]"></a></li>
                                                                  <li><a href="javascript:void(0)"
                                                                        style="justify-content: space-between;">50
                                                                        <input
                                                                           onchange="getQuestionpool(1,{page_size:50})"
                                                                           type="checkbox" class="radio" value="1"
                                                                           name="fooby[1][]"></a></li>
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
                                    <form id="search_pool" class="mb-0 w-100">
                                       <div class="search-content d-flex">
                                          <a href="javascript:void(0)" id="search-reset"
                                             class="search-bk btn btn-icon toggle-search" data-target="search"><em
                                                class="icon ni ni-arrow-left"></em></a>
                                          <input name="q" id="q" type="search"
                                             class="form-control border-transparent form-focus-none"
                                             placeholder="Search">
                                          <button class="search-submit btn btn-icon"><em
                                                class="icon ni ni-search"></em></button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              <div class="card-inner p-0 text-center">
                                 <h4 class='text-center p-2' id="load-data"></h4>
                                 <div id="qlist" class="nk-tb-list nk-tb-ulist">

                                 </div>
                              </div>
                              <div class="card-inner" id="questions-pagination">

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <?php include_once APPPATH . 'views/school/includes/footer.php'; ?>

         </div>
      </div>
   </div>

   <?php include 'question_form.php'; ?>
   <?php include 'question_edit_form.php'; ?>
   <?php include 'question_details.php'; ?>
   <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>
   <script src="<?php echo base_url('assets/js/libs/simplePagination.js'); ?>"></script>
   <script>
      let defaultLanguage = '';
      $(function () {

         var langCode = localStorage.getItem('language-type');
         languageText(langCode);


         async function init() {
            const auth = await appModule.checkAuth();
         }

         init();
         let languagesArr = [];
         $.ajax({
            type: "GET",
            async: false,
            url: `${api_base_url}language/${$.cookie('school_id')}/active_list`,
         }).done(({ status, data, message }) => {
            if (status) {
               languagesArr = data;
               $("#from, #to").html(`
                        <option value="">Select Language</option>
                  `)
               data.forEach(item => {
                  if (item.default_language == 1) {
                     $("#from").val(item.id)
                     $("#fromView").val(item.language_name)
                  }
               })

               $("#to").html(`<option value="">Select Language</option>`)
               languagesArr.forEach(item => {
                  if (item.default_language == 0) {
                     $("#to").append(`
                           <option value="${item.id}">${item.language_name}</option>
                        `)
                  }
               })
            }
         })


         $.ajax({
            type: "GET",
            url: `${api_base_url}language/check-default-language/${$.cookie('school_id')}`
         }).done(({ status, data }) => {
            if (!status) {
               $("#defaultLang").html("Default Language: None")

               $.ajax({
                  type: "GET",
                  url: `${api_base_url}language/${$.cookie('school_id')}/list`
               }).done(({ status, message, data }) => {
                  if (status) {
                     $("#language_id").html(`
                           <option value=''>Select Default Language</option>
                        `)
                     data.forEach(item => {
                        $("#language_id").append(`
                           <option value='${item.id}'>${item.language_name}${item.native_language_name ? '/' : ''} ${item.native_language_name}</option>
                        `)
                     })

                     $("#makeLanguageDefault").modal("show")
                  }
                  else {
                     NioApp.Toast(message, 'error')
                  }
               }).fail(() => {
                  NioApp.Toast("Error Occurred", 'error')
               })
            }
            else {
               defaultLanguage = data.language_name;
               $("#defaultLang").html("Default Language: " + defaultLanguage)
            }
         })

         $("#makeLanguageDefaultForm").on('submit', function (e) {
            e.preventDefault();

            $.ajax({
               type: "PATCH",
               url: `${api_base_url}language/make-default-language`,
               data: $(this).serialize()
            }).done(({ status, message, data }) => {
               if (status) {
                  $("#defaultLang").html("Default Language: " + data)

                  NioApp.Toast("Set Default Language Successfully", 'success')
                  $("#makeLanguageDefault").modal("hide")
               }
               else {
                  NioApp.Toast(message, 'error')
               }
            }).fail(() => {
               NioApp.Toast("Error Occurred", 'error')
            })
         })

         $("#templeteForm").on('submit', function (e) {
            if ($(this).valid()) {
               e.preventDefault();
               showLoader()
               $.ajax({
                  type: "POST",
                  xhrFields: {
                     responseType: 'blob'
                  },
                  url: api_base_url + "get-templete",
                  data: $(this).serialize()
               }).done((response) => {
                  var blob = new Blob([response]);
                  var link = document.createElement('a');
                  link.href = window.URL.createObjectURL(blob);
                  link.download = "template.xlsx";
                  link.click();

               }).fail(({ status }) => {
                  if (status == 444) {
                     NioApp.Toast("All Questions are already available in " + $("option[value='" + $("#to").val() + "']").html() + " language.", 'error')
                  }
                  else if(status == 443) {
                     NioApp.Toast("No questions are available in the default language.", 'error');
                  }
                  else {
                     NioApp.Toast('Error Occurred!', 'error')
                  }
               }).always(() => {
                  hideLoader()
                  $("#to").select2("val", " ")
                  $("#bulkUploadModal").modal('hide')
               })
            }
         })

         $(".btn-close").click(function () {
            $("#to").select2("val", " ")
            $("#to").val("")

         })

         $("#bulkupload").on('submit', function (e) {
            e.preventDefault();
            showLoader({
               title: "Loading..."
            })
            $.ajax({
               type: "POST",
               url: api_base_url + "bulk-upload",
               data: new FormData(this),
               contentType: false,
               cache: false,
               processData: false,
            }).done(({ status, message }) => {
               if (status) {
                  $(this)[0].reset();
                  NioApp.Toast(message, 'success')
                  getQuestionpool();
               }
               else {
                  NioApp.Toast(message, 'error')
               }
            }).fail(() => {
               NioApp.Toast("Error Occurred", 'error')

            }).always(() => {
               hideLoader();
               $("#bulkUploadModal").modal('hide');
            })
         })
      });   
   </script>
   <!-- check box -->
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


   <script>
      var page = getUrlParam('page') ? getUrlParam('page') : 1;
      var filters = '';
      var pageSize = 10;
      var query = '';
      var sortby = 0;
      function getQuestionpool(pageNumber = page, option = {}) {

         languageText(langCode);

         if (langCode == 2) {
            $('#load-data').html("Data Loading");
            $('.que-detail-list div span').text('');

            $("#qlist,#questions-pagination").hide();
            setTimeout(function () {
               setTimeout(function () {
                  $("#qlist,#questions-pagination").show(); $("#load-data").html('');
               }, 1000);
            }, 500);
         }


         urlPage(page)

         sortby = option.sortBy ? option.sortBy : sortby;
         pageSize = option.page_size ? option.page_size : pageSize;
         filters = option.filters ? option.filters : filters;
         query = option.q ? option.q : query
         page = pageNumber;

         $('.dropdown-toggle').removeClass('show');

         if (option.clear) {
            filters = '';
            getDifficultyLevelsByFamily("#difficulty_level_filter", '0');
            getDifficultyLevelsByQue("#difficulty_level_filter", false, true);
            $("#question_type").html(`
            <option value=""></option>
            <option value="1">Text</option>
            <option value="2">With Image</option>
            <option value="3">With Video</option>
            `)
         }

         const params = `page=${page}&sortby=${sortby}&pageSize=${pageSize}&${filters}&q=${query}`

         /*showLoader({
            title: 'Please Wait...',
            // text: 'fetching'
         });*/

         $('.dropdown-menu').removeClass('show');
         $('.filter-wg').removeClass('show');

         $.ajax({
            type: "get",
            url: formApiUrl(`question-pool/${$.cookie("school_id")}/list`),
            data: params
         }).done(function ({ data, status }) {
            $("#total-pool").text(`Total ${data.total} Questions`)
            if (data.data.length == 0) {
               $("#qlist").html('<p class="text-center text-secondary fw-bold nk-tb-item-empty">No Questions Available!</p>')
               $("#questions-pagination").html('')
               return 0;
            }
            languageText(langCode);

            $("#qlist").html(`
                     <div class="nk-tb-item nk-tb-head que-detail-list">
                        <div class="nk-tb-col"><span class="text-black fw-bold slno">Sl.No</span></div>
                        <div class="nk-tb-col text-center"><span class="text-black fw-bold question">Question</span></div>
                        <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold family">Group</span></div>
                        <div class="nk-tb-col"><span class="text-black fw-bold diff-level">Difficulty Level</span></div>
                        <div class="nk-tb-col"><span class="text-black fw-bold que-type">Question Type</span></div>
                        <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold marks">Marks</span></div>
                        <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold action">Action</span></div>
                     </div>  
               `);
            if (status) {
               data.data.forEach((item) => {
                  $("#qlist").append(`
                        <div class="nk-tb-item details">
                           <div class="nk-tb-col tb-col-md" id="question-dir"><span>${data.from++}</span></div>
                           <div class="nk-tb-col tb-col-md w-50 width_question"><span>${item.question}</span></div>
                           <div class="nk-tb-col tb-col-md"><span>${item.family_name}</span></div>
                           <div class="nk-tb-col">${item.level}</div>
                           <div class="nk-tb-col"><span>${item.image ? 'Image' : item.video ? 'Video' : 'Text'}</span></div>
                           <div class="nk-tb-col tb-col-sm" id="qpool_num" style="text-align: center !important; padding-right: 70px;"><span>${item.marks}</span></div>
                           <div class="nk-tb-col nk-tb-col-tools">
                              <ul class="">
                                 <li>
                                    <div class="drodown">
                                       <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <ul class="link-list-opt no-bdr">
                                             <li><a href="javascript:void(0)" onclick='showQuestionPoolDetails(${JSON.stringify(item).replace("'", '')})'><em class="icon ni ni-eye"></em><span class="view-detail">View Details</span></a></li>
                                             <li><a href="javascript:void(0)" data-item="${item.question_pool_id}" class="btn-edit-question"><em class="icon ni ni-edit"></em><span class="edit">Edit</span></a></li>
                                             <li><a href="javascript:void(0)" onclick="deleteQuestionPool(${item.question_pool_id})"><em class="icon ni ni-trash"></em><span class="delete">Delete</span></a></li>
                                             <li><a href="${base_url}school/question/language?id=${item.id}"><em class="icon ni ni-edit"></em><span class="language-title">Language</span></a></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>                     
                     `)
               });


               $("#questions-pagination").pagination({
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
                     getQuestionpool(pageNumber);
                     // urlPage(page)

                  }
               })
            }

         }).fail(({ responseJSON }) => {
            console.log(responseJSON);
            if (!responseJSON.status && responseJSON.message == "invalid token") {
               document.location.href = formUrl('school/login');
            }
         }).always(function () {
            //hideLoader()
         });
      }

      $('#btn-refresh-questions').click(function (e) {
         e.preventDefault();
         $("#question_pool_filter_form")[0].reset()
         getQuestionpool(page, {
            clear: true
         });
      });
      $("#sortBy").on("change", function () {
         getQuestionpool(page, {
            sortBy: $(this).val()
         })
      })

      $(".page_size").click(function (e) {
         e.preventDefault();
         getQuestionpool(1, {
            page_size: $(this).html()
         })
      })

      $("#search_pool").on("submit", function (e) {
         e.preventDefault();
         getQuestionpool(page = 1, {
            q: $("#q").val()
         })
      })

      $("#question_pool_filter_form").on("submit", function (e) {
         e.preventDefault();
         getQuestionpool(1, { filters: $(this).serialize() })


      })

      $("#search-reset").click(function () {
         query = "";
         $('#sortBy').select2('val', 'null');
         getQuestionpool();
      })

      $('#clearform').click(function () {
         $('.filter-wg').removeClass('show');

         $('#question_pool_filter_form')[0].reset();
         $("#question_type").select2('val', '0');
         $("#family_filter").select2('val', '0');
         $("#difficulty_level_filter").select2('val', '0');
         getQuestionpool(page, { clear: true })
      })


      $('#family_filter').on('change', function () {
         selval = this.value;
         if (selval) {
            getDifficultyLevelsByFamily("#difficulty_level_filter", selval);
         }

         selLevel = $('#difficulty_level_filter').find(":selected").val();
         if (selLevel == '') {
            selLevel = 0;
         }
         if (selval != '' && selLevel != '') {
            //   console.log('level'+selval+'familuy'+selFamily)
            getQuestionTypes("#question_type", selval, selLevel);
         }

      });

      $('#difficulty_level_filter').on('change', function () {
         selval = this.value;

         selFamily = $('#family_filter').find(":selected").val();
         if (selFamily == '') {
            selFamily = 0;
         }
         if (selval != '' && selFamily != '') {
            console.log('level' + selval + 'familuy' + selFamily)
            getQuestionTypes("#question_type", selFamily, selval);
         }

      });

      const getQuestionTypes = (target = false, selected = false, selectedlevel = false) => {
         let response;
         // Reset element content
         $('#question_type').html('').append('<option value="">Select</option>');

         $.ajax({
            type: "get",
            async: false,
            global: false,
            url: formApiUrl(`get-questiontype-by-family-id-diff-id/${selected}/${selectedlevel}`),
            success: function ({ data, status }) {
               if (status) {
                  if (target) {
                     data.forEach((item) => {
                        $('#question_type').append(`<option value="${item.id}" >${item.type}</option>`)
                     });
                  } else {
                     response = data;
                  }
               } else {
                  alert("something went wrong")
               }
            }
         })
         return response;

      }

      const getDifficultyLevelsByFamily = (target = false, selected = false) => {
         let response;
         // Reset element content
         $(target).html('').append('<option value="">Select</option>');

         $.ajax({
            type: "get",
            async: false,
            global: false,
            url: formApiUrl(`get-difflevels-by-family-id/${selected}`),
            success: function ({ data, status }) {
               if (status) {
                  if (target) {
                     data.forEach((item) => {
                        $(target).append(`<option value="${item.id}" >${item.level}</option>`)
                     });
                  } else {
                     response = data;
                  }
               } else {
                  alert("something went wrong")
               }
            }
         })
         return response;

      }

      function showToDropdown(ele) {
         if (ele.checked) {
            $('#to-lang').removeClass('d-none')
            $('#to').attr('required', true)

         }
         else {
            $('#to-lang').addClass('d-none')
            $('#to').attr('required', false).val('')
         }
      }

      function showQuestionPoolDetails(data) {
         console.log((data.options));
         const optionsArr = data.options;
         let options = '';
         optionsArr.forEach(item => {
            totWords = item.option_name.length;
            if (totWords > 55) {

               options += ` <div class="form-control-wrap col-md-10 my-2">
                              <textarea class="form-control question--choice disable" name="options[1]" data-optionz="1" style="min-height: 30%!important;overflow:hidden;position: relative; text-indent: -4px;"> ${item.option_name}</textarea>
                              ${item.is_correct ?
                     `<div class="checkbox" style="float: right;margin-top: -34px;margin-right: -90px;">
                                    <input type="radio" checked />
                                    <label class="form-label correct" style="padding: 7px;">Correct</label>
                                 </div>` : ''
                  }
                           </div>`

            } else {

               options += ` <div class="form-control-wrap col-md-10 my-2">
                              <input type="text" class="form-control question--choice disable" value="${item.option_name}" name="options[1]" data-optionz="1"> 
                              ${item.is_correct ?
                     `<div class="checkbox" style="float: right;margin-top: -34px;margin-right: -90px;">
                                    <input type="radio" checked />
                                    <label class="form-label correct" style="padding: 7px;">Correct</label>
                                 </div>` : ''
                  }
                           </div>`
            }

         })

         languageText(langCode);

         document.body.innerHTML +=
            `<div class="modal-backdrop fade show"></div>
         <div class="modal fade show" style="display: block;" tabindex="-1">
         <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
               <a onclick="location.reload()" style="cursor: pointer;" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross-sm"></em></a>
               <div class="modal-body modal-body-md">
                  <h5 class="modal-title que-details">Question Details</h5>
                  <form action="#" class="mt-2">
                     <div class="row g-gs" style="gap:1em">
                        
                        <div class="col-12">
                           <div class="form-group">
                             <label class="form-label que-family" for="full-name">Question Group</label>
                               <select class="form-select disable" data-search="on" data-select2-id="6" tabindex="-1" aria-hidden="true" name="family">
                                   <option value="default_option" data-select2-id="8">${data.family_name}</option>
                               </select>
                           </div>
                        </div>
                        <div class="row gy-4" style="margin-top: 0px !important;">
                            <div class="col-sm-6 mt-0">
                                <div class="form-group">
                                    <label class="form-label diff-level" for="full-name">Difficulty Level</label>
                                    <select class="form-select disable" data-search="on" data-select2-id="6" tabindex="-1" aria-hidden="true" name="family">
                                        <option value="default_option" data-select2-id="8">${data.level}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-0">
                                <div class="form-group">
                                     <label class="form-label marks" for="email-address">Mark</label>
                                     <div class="form-control-wrap">
                                        <input type="text" class="form-control disable" name="mark" value="${data.marks}">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group d-flex align-items-center gap-2">
                                <h5 class="form-label fw-bold mb-0 is-elim-que">Is this an eliminatory question?</h5>
                                <div class="d-flex align-items-center gap-3 py-2">
                                ${data.eliminatory_question ? 'Yes' : 'No'}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                                <label class="form-label question" for="email-address">Question</label>
                                 <div class="form-control-wrap">
                                    <textarea class="form-control disable" name="question">${data.question}</textarea> 
                                 </div>
                           </div>
                        </div>
                        <div class="col-12 d-none">
                           <div class="form-group">
                              <ul class="custom-control-group g-3 align-center">
                                <li>
                                  <div class="custom-control custom-control-sm custom-checkbox" style="margin-left:-20px;">
                                    <input ${data.image && 'checked'} type="checkbox" name="mycheckbox" class="mycheckbox" disabled  style="margin-bottom: 10px;" />
                                      <label class="form-label que-img" style="padding: 7px;">Question Image</label>
                                      <input type="checkbox" ${data.video && 'checked'} name="mycheckbox" class="mycheckbox" disabled  style="margin-bottom: 10px;" />
                                      <label class="form-label que-video" style="padding: 7px;">Question Video</label>
                                   </div>
                                </li>
                               
                             </ul>
                           </div>
                        </div>
                        ${data.image ?
               `<div class="col-12">
                           <div class="form-group">
                               <img width="200" src="${data.image}" />
                           </div>
                        </div>` : ''
            }

                        ${data.video ?
               `<div class="col-12">
                           <div class="form-group">
                               <video width="200" controls>
                               <source src="${data.video}" />
                               </video>
                           </div>
                        </div>` : ''
            }
                        <div class="row" id="options--container">
                            <div class="col-12 options--list">
                            <div class="form-group">
                                 <label class="form-label answers" for="full-name">Answers</label>
                                 ${options}
                            </div>
                         </div>
                        </div>
                       
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
            `
      }

      const getFamiliesList = (target = false) => {
         let response;
         // Reset element content
         $(target).html('').append('<option value="">Select</option>');

         $.ajax({
            type: "get",
            async: false,
            global: false,
            url: formApiUrl(`family/${$.cookie("school_id")}/list`),
            success: function ({ data, status }) {
               if (status) {
                  if (target) {
                     data.forEach((item) => {
                        if (item.default_family == 1) {
                           selected = 'selected';
                        } else {
                           selected = '';
                        }
                        $(target).append(`<option ${selected} data-select2-id="${item.id}" value='${item.id}'>${item.family_name}</option>`)
                     });
                  } else {
                     response = data;
                  }
               } else {
                  alert("something went wrong")
               }
            }
         });

         return response;
      }

      $(function () {


         getFamilyList("#family_filter");
         getDifficultyLevelsByQue("#difficulty_level_filter", false, true);

         const radio = document.querySelectorAll("[type='radio']");
         radio.checked = false;



         $("#option-question-video, #videoCheck").on('change', function () {
            if ($(this).is(":checked")) {
               $("#option-question-image, #imageCheck").prop("checked", false);
               $("#edit-question-image, #question-image").hide()
               $("input[name='image']").val('')
               $("input[name='editimage']").val('')
               $(`label[for='image']`).text('Choose file');
               $(`label[for='editimage']`).text('Choose file');
               $($(this).attr("data-target")).show();
            }
            else {
               const videoEle = document.querySelector($(this).attr('data-target') + " div input");
               $(videoEle).val('')
               $($(this).attr("data-target")).hide();
            }

         })

         $("#option-question-image, #imageCheck").click(function () {
            if ($(this).is(":checked")) {
               $("#option-question-video, #videoCheck").prop("checked", false);
               $("#edit-question-video, #question-video").hide()
               $("input[name='video']").val('')
               $("input[name='editvideo']").val('')
               $(`label[for='video']`).text('Choose file');
               $(`label[for='editvideo']`).text('Choose file');
               $($(this).attr("data-target")).show();
            }
            else {
               const imageEle = document.querySelector($(this).attr('data-target') + " div input");
               $(imageEle).val('')
               $($(this).attr("data-target")).hide();
            }
         });



         // Validate examination Form
         NioApp.Validate("#questionPoolAddForm", {
            onkeyup: function (element) {
               $(element).valid();
            },
            onclick: function (element) {
               $(element).valid();
            },
            errorElement: "span",
            errorClass: "invalid",
            errorPlacement: function errorPlacement(error, element) {
               if (element.parents().hasClass("input-group") || element.parent().hasClass('checkbox')) {
                  error.appendTo(element.parent().parent());
               } else {
                  error.appendTo(element.parent());
               }
            },
         });

         NioApp.Validate("#templeteForm", {
            onkeyup: function (element) {
               $(element).valid();
            },
            onclick: function (element) {
               $(element).valid();
            },
            errorElement: "span",
            errorClass: "invalid",
            errorPlacement: function errorPlacement(error, element) {
               if (element.parents().hasClass("input-group") || element.parent().hasClass('checkbox')) {
                  error.appendTo(element.parent().parent());
               } else {
                  error.appendTo(element.parent());
               }
            },
         });

         $('#btn-add-question').click(function () {
            $('#questionPoolAddForm')[0].reset();
            $('#question-image').hide();
            $('#question-image .form-file-label').html('Choose File');
            $('#questionPoolAddForm .options--list .optionz--element.dynamic').remove();
            questionPoolAddFormValidator.resetForm();
            $('#addQuestionModal').modal('show');
            getFamiliesList("#familySelect");
            getDefficultyLevels("#difficulty_level", false, true);
            $('select').select2({
               minimumResultsForSearch: -1,
               placeholder: function () {
                  $(this).data('placeholder');
               }
            });

            return false;
         });

         // examination Form reset on Modal close
         $('#addQuestionModal [data-bs-dismiss="modal"]').on("click", function () {
            $('#questionPoolAddForm')[0].reset();
            $('#question-image').hide();
            $('#question-image .form-file-label').html('Choose File');
            $('#questionPoolAddForm .options--list .optionz-element.dynamic').remove();
            $("#difficulty_level").select2("val", "");

            questionPoolAddFormValidator.resetForm();
         });

         getQuestionpool();

         $("#questionPoolAddForm").on("submit", function (e) {
            e.preventDefault();

            $('#questionPoolAddForm button:first').prop('disabled', true).text("Loading...");

            if (questionPoolAddFormValidator.valid()) {
               /*showLoader({
                  title: 'Please Wait...',
                  // text: 'saving'
               });*/

               const formdata = new FormData();
               formdata.append("family_id", $("#familySelect").val())
               formdata.append("question", $("#question").val())
               formdata.append("image", $("[name='image']")[0].files[0] != undefined ? $("[name='image']")[0].files[0] : '')
               formdata.append("video", $("[name='video']")[0].files[0] != undefined ? $("[name='video']")[0].files[0] : '')
               formdata.append("difficulty_level_id", $("#difficulty_level").val() ? JSON.parse($("#difficulty_level").val()).id : '')
               formdata.append("eliminatory_question", $("#yes")[0].checked ? 1 : 0)
               formdata.append("school_id", $.cookie("school_id"))
               formdata.append("marks", $("#marks").val())

               let questionInput = $(".option-div input[type='text']");
               let options = $(".option-div input[type='radio']");
               let arr = [];
               for (var i = 0; i < options.length; i++) {
                  arr.push({
                     option: questionInput[i].value,
                     correct: options[i].checked,
                     no_shuffle: 0
                  })
               }
               if ($("#afta")[0].checked) {
                  arr.push({
                     option: "All of the above",
                     correct: $("#optionafta-answer")[0].checked,
                     no_shuffle: 1
                  })

                  formdata.append("no_shuffle", 1);
               }
               formdata.append("options", JSON.stringify(arr))
               $("#difficulty_level").select2("val", "");

               $.ajax({
                  type: "POST",
                  url: formApiUrl("add-question-pool"),
                  data: formdata,
                  processData: false,
                  contentType: false,
               }).done((res) => {
                  if (res.status) {
                     $("#closeModal").click();
                     $('#questionPoolAddForm button:first').prop('disabled', false).text("Add Question")
                     getQuestionpool();
                     NioApp.Toast(res.message, "success");
                  }
                  else {
                     NioApp.Toast(res.message, "error");
                  }
               }).fail(({ statusText, status, responseJSON }) => {
                  if (status == 422) {
                     responseJSON.message.image.forEach(error => {
                        NioApp.Toast(error, "warning");
                     })

                  } else
                     NioApp.Toast(statusText, "error");
               }).always(() => {
                  //hideLoader();
                  $('#questionPoolAddForm button:first').prop('disabled', false).text("Add Question")

               });
            } else {
               $('#questionPoolAddForm button:first').prop('disabled', false).text("Add Question")
            }
         })

      });
      function deleteQuestionPool(id) {
         Swal.fire({
            title: 'Are you sure to delete?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            focusCancel: true,
         }).then((result) => {
            if (result.isConfirmed) {
               showLoader({
                  text: "Please Wait..."
               });

               $.ajax({
                  type: "DELETE",
                  url: `${api_base_url}delete-question-pool`,
                  data: {
                     id
                  }
               }).done(({ status, message }) => {
                  if (status) {
                     console.log($("#qlist .nk-tb-item.details").length);
                     if (parseValue($("#qlist .nk-tb-item.details").length) == 1 && page != 1) {
                        --page;
                     }
                     getQuestionpool(page);
                     Swal.fire({
                        icon: 'success',
                        title: 'Deleted'
                     }
                     )
                  } else {
                     Swal.fire({
                        icon: 'warning',
                        text: message
                     }
                     )
                  }
               }).always(() => {
                  hideLoader();
               })

            }
         })
      }
   </script>

   <script type="text/javascript">
      function showMarks(e, target) {
         var val = JSON.parse(e.value);
         $(target).val(val.marks)
         //    $('select').select2({
         //    minimumResultsForSearch: -1,
         //    placeholder: function () {
         //       $(this).data('placeholder');
         //    }
         // });

      }

      $(function () {

         const options_container = $('#options--container');
         const options_list = options_container.find('.options--list');
         const answerSelectbox = $('#answerSelectbox');
         const answerBox = $('#answer--box');
         var actionType = 'add';

         var optionz_action = '';
         var choicesArr = [];
         var answer = '';
         var question_type = '';
         var optionzCount = '3';


         var myModalEl = document.getElementById('bulkUploadModal')
         myModalEl.addEventListener('hidden.bs.modal', function (event) {
            $("#bulkupload")[0].reset()
            $("#bulkUploadModal input[type='checkbox']")[0].checked ? $("#bulkUploadModal input[type='checkbox']").click() : '';
         })

         $('#btnAdd').click(function (e) {
            e.preventDefault();

            if (options_list.find('.optionz--element').length > 0) {
               optionz_action = '<a href="javascript:void(0)" data-optionz="remove" class="input-group-append btn btn-light"><em class="icon ni ni-user-remove-fill"></em></a>';
            }
            var langCode = localStorage.getItem('language-type');
            languageText(langCode);

            options_list.append(`<div class="form-control-wrap row option-div optionz--element dynamic mb-2">
               <div class="form-group col-12">
                  <div class="row">
                     <div class="col-9">
                        <div class="position-relative form-control-wrap">
                           <input required data-msg="This field is required" type="text" style="padding-right: 42px;" class="form-control floating question--choice" required name="options[${optionzCount}]" data-optionz="${optionzCount}" />
                           <div class="link link-danger position-absolute top-0 bottom-0 end-0 mx-2" data-optionz="remove"><em class="icon ni ni-user-remove-fill"></em></div>
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="form-check form-control checkbox border-0" id="answer_checkbox" style="margin-top:7px !important">
                           <input type="radio" class="form-check-input" name="correct"  id="option${optionzCount}-answer" required data-msg="Choose correct answer"/>
                           <label class="form-check-label correct" for="option${optionzCount}-answer">Correct</label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>`);

            optionzCount++;

         });
      });

      $(document).on('click', '#options--container [data-optionz="remove"]', function (e) {
         e.preventDefault();
         $(this).parents('.optionz--element').fadeOut(400).remove();
         // formChoicesArray(answer);
      });


   </script>

   <script>
      let questionPoolAddForm_id;
      let editOptionzCount = 0;
      function getQuestionDetails(id) {
         showLoader({
            title: 'Please Wait...',
            // text: 'fetching'
         });

         $.ajax({
            type: "get",
            async: false,
            global: false,
            url: `${api_base_url}question-pool/${id}`
         }).then((res) => {
            if (res.status) {
               editOptionzCount = 1;
               questionPoolAddForm_id = res.data.id;
               getFamilyList("#editfamilySelect", res.data.family_id);
               getDefficultyLevels("#edit_difficulty_level", res.data.difficulty_level_id, true);
               document.getElementById("edit-question").value = res.data.question;
               $("#edit-marks").val(res.data.marks);
               if (res.data.eliminatory_question) {
                  $("#edit-yes").prop("checked", true)
               }
               else
                  $("#edit-no").prop("checked", true)

               if (res.data.image) {
                  $("#imageCheck")[0].checked = true;
                  $("#edit-question-image").show();
                  $("#previewImg").html(`
                  <em class="icon ni ni-cross position-absolute text-white rounded fs-3" style="background: #0000009c; top: 6px; right: 20px; cursor: pointer; z-index: 60" onclick="deleteMedia(this, ${res.data.id}, 'image')"></em>
                  <img class="img-fluid d-block mx-auto w-100" src='${res.data.url}${res.data.image}' />
                  `)

               }
               else {
                  $("#previewImg").html('')
               }
               if (res.data.video) {
                  $("#videoCheck")[0].checked = true;
                  $('#edit-question-video').show();
                  $('#videoPrivew').html(`
                  <em class="icon ni ni-cross position-absolute text-white rounded fs-3" style="background: #0000009c; top: 6px; right: 20px; cursor: pointer; z-index: 60" onclick="deleteMedia(this, ${res.data.id}, 'video')"></em>
                  <video class='w-100' controls>
                     <source src="${res.data.url}${res.data.video}">
                  </video>
                  `)

               }

               let options = (res.data.options);
               $("#editOptions").html(`
                <label class="form-label answers" for="full-name">Answers</label>
                `);
               var langCode = localStorage.getItem('language-type');
               languageText(langCode);

               options.forEach((item, inx) => {

                  if (res.data.no_shuffle == 1) {
                     if (inx == options.length - 1) {
                        $(".editt .options--list").append(`
                        <div class='row all'>
                        <div class="col-9 d-flex align-items-center" style='gap:.5rem'>
                        <input type="checkbox" checked value='1' name='eafta' id='eafta'>
                        <label for="eafta">All of the above</label>
                     </div>
                     <div id='eaftaOption' class="col-3 d-flex align-items-center">
                        <div class="form-control-wrap inner">
                           <div class="form-check form-control checkbox border-0" id="answer_checkbox" style="margin-top:7px !important">
                              <input type="radio" ${item.correct && 'checked'} name="correct" class="form-check-input"
                                 id="optioneafta-answer" value="correct" required
                                 data-msg="Choose correct answer" />
                              <label class="form-check-label correct" for="optioneafta-answer">Correct</label>
                           </div>
                        </div>
                     </div>
                        </div>
                     `)
                     }
                     else {
                        $("#editOptions").append(`<div class="form-control-wrap row my-2 edit-option-div">
                     <div class="form-group col-12">
                        <div class="row">
                           <div class="col-9">
                              <div class="position-relative form-control-wrap">
                                 <input required data-msg="This field is required" type="text" style="padding-right: 42px;" class="form-control floating question--choice" value="${item.option}" name="options[${editOptionzCount}]" data-optionz="${editOptionzCount}" />
                                 ${inx > 1 ? '<div class="link link-danger position-absolute top-0 bottom-0 end-0 mx-2" data-optionz="remove"><em class="icon ni ni-user-remove-fill"></em></div>' : ''}
                              </div>
                           </div>
                           <div class="col-3">
                              <div class="form-check form-control checkbox border-0" style="margin-top:7px !important">
                                 <input required type="radio" class="form-check-input" id="edit-option${editOptionzCount}-answer" name="correct" value="correct" ${item.correct && 'checked'} required data-msg="Choose correct answer"/>
                                 <label class="form-check-label correct" for="edit-option${editOptionzCount}-answer">Correct</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>`);
                        editOptionzCount++;
                     }

                  }
                  else {
                     if (inx == options.length - 1) {
                        $(".editt .options--list").append(`
                        <div class='row all'>
                        <div class="col-9 d-flex align-items-center" style='gap:.5rem'>
                        <input type="checkbox" value='1' name='eafta' id='eafta'>
                        <label for="eafta">All of the above</label>
                     </div>
                     <div id='eaftaOption' class="col-3 d-flex align-items-center d-none">
                        <div class="form-control-wrap inner">
                           <div class="form-check form-control checkbox border-0" id="answer_checkbox" style="margin-top:7px !important">
                              <input type="radio" name="correct" class="form-check-input"
                                 id="optioneafta-answer" value="correct" required
                                 data-msg="Choose correct answer" />
                              <label class="form-check-label correct" for="optioneafta-answer">Correct</label>
                           </div>
                        </div>
                     </div>
                        </div>
                     `)
                     }

                     $("#editOptions").append(`<div class="form-control-wrap row my-2 edit-option-div">
                     <div class="form-group col-12">
                        <div class="row">
                           <div class="col-9">
                              <div class="position-relative form-control-wrap">
                                 <input required data-msg="This field is required" type="text" style="padding-right: 42px;" class="form-control floating question--choice" value="${item.option}" name="options[${editOptionzCount}]" data-optionz="${editOptionzCount}" />
                                 ${inx > 1 ? '<div class="link link-danger position-absolute top-0 bottom-0 end-0 mx-2" data-optionz="remove"><em class="icon ni ni-user-remove-fill"></em></div>' : ''}
                              </div>
                           </div>
                           <div class="col-3">
                              <div class="form-check form-control checkbox border-0" style="margin-top:7px !important">
                                 <input required type="radio" class="form-check-input" id="edit-option${editOptionzCount}-answer" name="correct" value="correct" ${item.correct && 'checked'} required data-msg="Choose correct answer"/>
                                 <label class="form-check-label correct" for="edit-option${editOptionzCount}-answer">Correct</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>`);
                     editOptionzCount++;
                  }

               })
               $("#eafta").click(function () {
                  if ($(this)[0].checked) {
                     $("#eaftaOption").removeClass('d-none')
                  }
                  else {
                     $("#eaftaOption").addClass('d-none')
                  }
                  $("#optioneafta-answer")[0].checked = false

               })

            }
            else {
               NioApp.Toast("something went wrong!", "error");
            }
         }).always(function () {
            hideLoader();
         });
      }
      function addOption() {
         var langCode = localStorage.getItem('language-type');
         languageText(langCode);


         $("#editOptions").append(`<div class="form-control-wrap row my-2 edit-option-div">
            <div class="form-group col-12">
               <div class="row">
                  <div class="col-9">
                     <div class="position-relative form-control-wrap">
                        <input required data-msg="This field is required" type="text" style="padding-right: 42px;" class="form-control floating question--choice" required name="options[${editOptionzCount}]" data-optionz="${editOptionzCount}" />
                        <div class="link link-danger position-absolute top-0 bottom-0 end-0 mx-2" data-optionz="remove"><em class="icon ni ni-user-remove-fill"></em></div>
                     </div>
                  </div>
                  <div class="col-3"> 
                     <div class="form-check form-control checkbox border-0" style="margin-top:7px !important">
                        <input required type="radio" id="edit-option${editOptionzCount}-answer" class="form-check-input" name="correct" value="correct" />
                        <label class="form-check-label correct" for="edit-option${editOptionzCount}-answer">Correct</label>
                     </div>
                  </div>
               </div>
            </div>
         </div>`);

         editOptionzCount++;
      }

      $(document).on('click', '#editOptions [data-optionz="remove"]', function (e) {
         e.preventDefault();
         $(this).parents('.edit-option-div').fadeOut(400).remove();
         // formChoicesArray(answer);
      });

      function toggleImage(e) {
         $(e)[0].checked ? $("#edit-question-image").show() : $("#edit-question-image").hide();
      }

      // Validate examination edit form
      $.validator.addMethod('filesize', function (value, element, param) {
         // console.log((element.files[0].size/1024).toFixed(2));
         return this.optional(element) || (element.files[0].size / 1024).toFixed(2) <= param
      }, 'File size should be less than or equal to {0}');

      $.validator.addMethod('extensions', function (value, element, param) {
         let extensions = [];
         let ext = '';
         if (parseValue(element.files[0]?.name) != '') {
            ext = element.files[0].name.split('.').pop();
            extensions = param.split('|');
         }
         return this.optional(element) || extensions.includes(ext.toLowerCase())
      }, 'File extension should be valid');

      NioApp.Validate("#questionPoolEditForm", {
         onkeyup: function (element) {
            $(element).valid();
         },
         onclick: function (element) {
            $(element).valid();
         },
         errorElement: "span",
         errorClass: "invalid",
         errorPlacement: function errorPlacement(error, element) {
            if (element.parents().hasClass("input-group") || element.parent().hasClass('checkbox')) {
               error.appendTo(element.parent().parent());
            } else {
               error.appendTo(element.parent());
            }
         },
      });

      // Question Edit button click
      $('#qlist').on('click', '.btn-edit-question', function (e) {
         e.preventDefault();

         $('#questionPoolEditForm')[0].reset();
         $('#edit-editquestion-image').hide();
         $('#edit-question-image .form-file-label').html('Choose File');
         $('#questionPoolEditForm .options--list .edit-option-div').remove();
         questionPoolEditFormValidator.resetForm();
         $('#editQuestionModal').modal('show');
         $('.row.all').remove();
         getQuestionDetails($(e.currentTarget).data('item'));
         return false;
      });

      // examination Form reset on Modal close
      $('#editQuestionModal [data-bs-dismiss="modal"]').on("click", function () {
         $('#questionPoolEditForm')[0].reset();
         $('#edit-question-image').hide();
         $('#edit-question-image .form-file-label').html('Choose File');
         $('#questionPoolEditForm .options--list .edit-option-div').remove();
         $("#edit_difficulty_level").select2("val", "");

         questionPoolEditFormValidator.resetForm();
      });

      document.getElementById("questionPoolEditForm").addEventListener("submit", function (e) {
         e.preventDefault();
         $("#questionPoolEditForm button:first").prop("disabled", true).text("Loading...");
         if (questionPoolEditFormValidator.valid()) {
            showLoader({
               title: 'Please Wait...',
               // text: 'saving'
            });

            const formdata = new FormData();
            formdata.append("id", questionPoolAddForm_id)
            formdata.append("_method", "PATCH")
            formdata.append("family_id", $("#editfamilySelect").val())
            formdata.append("question", $("#edit-question").val())
            formdata.append("image", $("[name='editimage']")[0].files[0] != undefined ? $("[name='editimage']")[0].files[0] : '')
            formdata.append("video", $("[name='editvideo']")[0].files[0] != undefined ? $("[name='editvideo']")[0].files[0] : '')
            formdata.append("difficulty_level_id", $("#edit_difficulty_level").val() ? JSON.parse($("#edit_difficulty_level").val()).id : '')
            formdata.append("eliminatory_question", $("#edit-yes")[0].checked ? 1 : 0)
            formdata.append("school_id", $.cookie("school_id"))
            formdata.append("marks", $("#edit-marks").val())

            $("#edit_difficulty_level").select2("val", "");

            languageText(langCode);


            let questionInput = $(".edit-option-div input[type='text']");
            let options = $(".edit-option-div input[type='radio']");
            let arr = [];
            for (var i = 0; i < options.length; i++) {
               arr.push({
                  option: questionInput[i].value,
                  correct: options[i].checked,
                  no_shuffle: 0
               })
            }
            if ($("#eafta")[0].checked) {
               arr.push({
                  option: "All of the above",
                  correct: $("#optioneafta-answer")[0].checked,
                  no_shuffle: 1
               })
               formdata.append("no_shuffle", 1);

            }
            else {
               formdata.append("no_shuffle", 0);

            }
            formdata.append("options", JSON.stringify(arr))
            $.ajax({
               type: "post",
               url: formApiUrl("update-question-pool"),
               data: formdata,
               processData: false,
               contentType: false,
            }).done((res) => {
               $('#editQuestionModal [data-bs-dismiss="modal"]').trigger('click');
               $("#questionPoolEditForm button:first").prop("disabled", false).text("Update Question").addClass('update-que');
               getQuestionpool();
               NioApp.Toast(res.message, "success");

            }).fail(({ statusText, status, responseJSON }) => {
               if (status == 422) {
                  responseJSON.message.image.forEach(error => {
                     NioApp.Toast(error, "warning");
                  })

               } else
                  NioApp.Toast(statusText, "error");
            }).always(function () {
               hideLoader();
               $("#questionPoolEditForm button:first").prop("disabled", false).text("Update Question").addClass('update-que');

            });
         } else {
            $("#questionPoolEditForm button:first").prop("disabled", false).text("Update Question").addClass('update-que');
         }
      })

      function deleteMedia(e, id, type) {
         showLoader({
            title: "Please Wait",
            // text: "Deleting..."
         })
         $.ajax({
            type: "DELETE",
            url: api_base_url + "question-pool/media-delete",
            data: {
               type,
               id
            }
         }).done(({ status, message }) => {
            if (status) {
               e.parentElement.innerHTML = ''
               $(`#option-question-${type}, #${type}Check`).prop("checked", false);
               $(`#edit-question-${type}, #question-${type}`).hide()
               $(`input[name='${type}']`).val('')
               $(`input[name='edit${type}']`).val('')
               $(`label[for='${type}']`).text('Choose file');
               $(`label[for='edit${type}']`).text('Choose file');

               getQuestionpool();
               NioApp.Toast(message, 'success')

            }
            else
               NioApp.Toast(message, 'warning')
         }).fail(() => {
            NioApp.Toast("Error Occurred", 'error')
         }).always(() => {
            hideLoader()
         })
      }

      $('#form_clear').on('click', function () {
         ($('#question_pool_filter_form')[0]).reset();
         $('#family_filter').select2('val', 'null');
         $('#difficulty_level_filter').select2('val', 'null');
         $('#question_type').select2('val', 'null');
         $('#question_type').html('');

         getQuestionpool(1, { clear: true });
      })

      $('select').select2({
         minimumResultsForSearch: -1,
         placeholder: function () {
            $(this).data('placeholder');
         }
      });

      $('select').on('change', function () {

         selectedLevel = $('select[name="difficulty_level_id"]').find(":selected").val()

         if (selectedLevel != '') {
            $('#difficulty_level-error').hide();
         }

      });

      $("#afta").click(function () {
         if ($(this)[0].checked) {
            $("#aftaOption").removeClass('d-none')
            
         }
         else {
            $("#aftaOption").addClass('d-none')
         }
         $("#optionafta-answer")[0].checked = false
      })

   </script>

</body>

</html>