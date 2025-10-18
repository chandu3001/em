<style>
   .nk-content-fluid{
         top: 65px;
         position: relative;
        }
</style>
<?php include_once APPPATH . 'views/admin/includes/header.php'; ?>

<body class="nk-body npc-crypto bg-lighter has-sidebar ">
   <div class="nk-app-root">
      <div class="nk-main ">

         <?php include_once APPPATH . 'views/admin/includes/sidebar.php'; ?>

         <div class="nk-wrap ">

            <?php include_once APPPATH . 'views/admin/includes/navbar.php'; ?>

            <div class="nk-content nk-content-fluid">
               <div class="container-xl wide-lg">
                  <div class="nk-content-body">
                     <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                           <div class="nk-block-head-content">
                              <h3 class="nk-block-title page-title schools" data-translate>Schools</h3>
                              <div class="nk-block-des text-soft">
                                 <!-- <p id="total_records">Loading....</p> -->
                              </div>
                           </div>
                           <div class="nk-block-head-content">
                              <div class="toggle-wrap nk-block-tools-toggle">
                                 <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                    data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
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
                                            <select id="sort_by" class="form-select form-select-sm js-select2 select2-hidden-accessible"
                                                data-search="off" data-pplaceholder="Sort By">
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
                                                            <form id="filter-form">
                                                               <div class="dropdown-head">
                                                                  <span class="sub-title dropdown-title filters" data-translate>Filters</span>
                                                                  <!-- <div class="dropdown"><a href="#"
                                                                        class="btn btn-sm btn-icon"><em
                                                                           class="icon ni ni-more-h"></em></a></div> -->
                                                               </div>
                                                               <div class="dropdown-body dropdown-body-rg">
                                                                  <div class="row gx-6 gy-3">
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt license-type" data-translate>License Type</label>
                                                                              <select name="license_id"
                                                                                 id="license_filter1"
                                                                                 class="form-select form-select-sm js-select2" 
                                                                                 data-pplaceholder="License Type">
                                                                              </select>
                       
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt sub-name" data-translate>Sub License Type</label>
                                                                              <select name="sub_id"
                                                                                 id="sub-license-filter"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-pplaceholder="Sub License">
                                                                              </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt country" data-translate>Country</label>
                                                                              <select name="country_id"
                                                                                 id="country-filter"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-pplaceholder="Country">
                                                                              </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt city" data-translate>City</label>
                                                                              <select name="city_id"
                                                                                 id="city-filter"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-pplaceholder="City">
                                                                              </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label
                                                                              class="overline-title overline-title-alt status-label" data-translate>Status</label>
                                                                              <select name="status" id="stat"
                                                                                 class="form-select form-select-sm js-select2" data-pplaceholder="Status">
                                                                                 <option value="1" data-translate>Published</option>
                                                                                 <option value="2" data-translate>Unpublished</option>
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
                                                                  <button type="reset" id="clear-filter" class="link p-0 text-primary" onclick="getSchoolList(1, {filter: 'clearFilter'})" data-translate>Clear Filters</button>
                                                               </div>
                                                            </form>
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
                                                                  <li><span class="show-label"data-translate>Show</span></li>
                                                                  <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input checked onchange=" getSchoolList(1,{pageSize:10})"  type="checkbox"  class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input onchange=" getSchoolList(1,{pageSize:20})" type="checkbox" class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input onchange=" getSchoolList(1,{pageSize:50})" type="checkbox"  class="radio" value="1" name="fooby[1][]" ></a></li>
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
                                         <form id="searchSchool">
                                          <div class="search-content d-flex"><a id="search-resett" href="javascript:void(0)" class="search-bStudent IDk btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                             <input name="q" type="search" class="form-control border-transparent form-focus-none" placeholder="Search">
                                             <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-inner p-0 text-center">
                                 <h4 class='text-center p-2' id="load-data"></h4>

                                 <div class="nk-tb-list nk-tb-ulist" id="school_list">
                                    
                                 </div>
                              </div>
                              <div class="card-inner" id="school-list-pagination">

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <?php include_once APPPATH . 'views/admin/includes/footer.php'; ?>
            <?php include 'clone.php'; ?>

         </div>
      </div>
   </div>

   <?php //include 'school_form.php'; ?>
   <?php include_once APPPATH . 'views/admin/includes/footer-scripts.php'; ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
   <script>

      $(function () {
         getSchoolList();
         getLicenseList();
         getCountryList();
         $('#addSchool').click(function () {
            $('#add-school').modal('show');
            return false;
         })

      });

      $.ajaxSetup({
         headers: {
            'Authorization': `Bearer ${$.cookie("access_token")}`
         },
         dataType: 'json'
      });


      function showCloneModal(id)
      {
         $('#cur-school-id').val(id);
          getSchoolsList('#school-id');
         $('#modalClone').modal('show');
         return false;
      }

      var page = getUrlParam('page') ? getUrlParam('page') : 1;
      var filters = '';
      var pageSize = 10;
      let query = '';
      var sortby = 0;

      function getSchoolList(pageNumber = page, option = {})
      {
         /*showLoader({
            // title: "Data Fetching From DSMS",
            title: "Please Wait..."
         })*/
         urlPage(pageNumber)
         
         
         $('.dropdown-menu').removeClass('show');

         let params  = '';
         page        = pageNumber;
         sortby      = option.sortBy ? option.sortBy : sortby;
         pageSize    = option.pageSize ? option.pageSize : pageSize;
         filters     = option.filter ? option.filter : filters;
         query       = option.q ? option.q : query;

         localStorage.setItem(location.hostname+location.pathname, page)
         params +=`&sortby=${sortby}&pageSize=${pageSize}&${filters}&${query}`;
   
         $.ajax({
            type: "GET",
            url: "https://dsms.technoiq.in/backend/api/auth/all_schools?page="+page,
            data: params,
         }).done(({errors, status_code, data}) =>{
            if(errors == false && status_code == 200)
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

               $("#total_records").text(`Total ${data.result.total} Schools`)
               $("#school_list").html(
                  `
                  <div class="nk-tb-item nk-tb-head school-detail-list">
                     <div class="nk-tb-col"><span class="fw-bold text-black slno" data-translate="Sl.No">Sl.No</span></div>
                     <div class="nk-tb-col"><span class="fw-bold text-black school-name" data-translate="School Name">School Name</span></div>
                     <div class="nk-tb-col"><span class="fw-bold text-black city" data-translate="City">City</span></div>
                     <div class="nk-tb-col tb-col-sm"><span class="fw-bold text-black mobile" data-translate="Contact">Contact</span>
                     </div>
                     <div class="nk-tb-col tb-col-md"><span class="fw-bold text-black status-label" data-translate="Status">Status</span>
                     </div>
                     <div class="nk-tb-col tb-col-md"><span class="fw-bold text-black clone-que" data-translate="Clone Question Pool">Clone Question Pool</span></div>
                     <div class="nk-tb-col tb-col-md"><span class="fw-bold text-black action" data-translate="Action">Action</span>
                     </div>
                  </div>
                  `
               )

               data.result.data.forEach(item =>{
                  $("#school_list").append(`
                  <div class="nk-tb-item ">
                  <div class="nk-tb-col"><span>${data.result.from++}</span></div>
                     <div class="nk-tb-col">
                        <div class="user-info">
                           <span class="tb-lead">${item.name}</span>
                           <span># ${item.id}</span>
                        </div>
                     </div>

                     <div class="nk-tb-col"><span>${item.city_name}</span></div>
                     <div class="nk-tb-col tb-col-sm"><span>${item.phone}</span></div>

                     <div class="nk-tb-col tb-col-md"><span
                           class="badge badge-dim ${item.status ? 'bg-success active-btn' : 'bg-danger inactive-btn'}">${item.status ? 'Published' : 'Unpublished'}</span></div>
                     <div class="nk-tb-col tb-col-md">
                        <button type="button" class="btn btn-sm btn-primary clone" onclick="showCloneModal(${item.id})"
                           title="Question pool of this school will be cloned">Clone</button>
                     </div>
                     <div class="nk-tb-col nk-tb-col-tools">
                        <ul class="">

                           <li>
                              <div class="drodown">
                                 <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle"
                                    data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                 <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                       <li><a href="${base_url}admin/schools/details?id=${item.id}"><em
                                                class="icon ni ni-eye"></em><span class="view-detail" data-translate>View
                                                Details</span></a></li>
                                    </ul>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  `)
               })
               $("#school-list-pagination").pagination({
                     items: parseInt(data.result.total),
                     itemsOnPage: parseInt(data.result.per_page),
                     currentPage: data.result.current_page,
                     displayedPages: 3,
                     navStyle: "pagination justify-content-center justify-content-md-start",
                     listStyle: "page-item",
                     linkStyle: "page-link",
                     onPageClick: function (pageNumber, event) {
                        event ? event.preventDefault() : '';
                        getSchoolList(pageNumber);
                     }
                  })
            }
         }).fail(({statusText, status, responseJSON}) =>{
            if(status == 400)
                NioApp.Toast(responseJSON.message, "error");
            else if(status == 404)
               {
                  $("#school_list").html(`<h5 class='text-center p-2'>No School Found</h5>`)
                  $("#school-list-pagination").html('');
               }
            else
                NioApp.Toast(statusText, "error");
        }).always(()=>{
            //hideLoader();
           
        })
      }



      const getSchoolsList = (target = false) => {
           let response;

           // Reset element content
           $(target).html('').append('<option value="">Select</option>');
           
           $.ajax({
              type: "get",
              async: false,
              global: false,
              url: 'https://dsms.technoiq.in/backend/api/auth/all_schools_list',
              
              success: function ({ data, errors }) {
                 if (!errors) {
                       if(target) {

                           schoolIDIs = $('#cur-school-id').val();

                          data.result.forEach((item) => {
                           if(schoolIDIs != item.id){
                              $(target).append(`<option value='${item.id}'>${item.name}</option>`)
                           }
                          });
                       } else {
                          response = data.result;
                       }
                 } else {
                    alert("something went wrong")
                 }
              }
           });
         return response;
      }

            
           

            $("#cloneForm").on("submit", function (event) {
                event.preventDefault();

               var selVal =  $('#school-id').val();
               var listSchoolID  =  $('#cur-school-id').val();

                if (selVal != '') { 
                    
                 let formDatas = {
                     from_school_id: listSchoolID,
                     to_school_id: selVal,
                 }
        
                  $.ajax({
                       type: "post",
                        url: formApiUrl(`superadmin/clone-question-pool`),
                        data: formDatas,
                        beforeSend: function () {
                                    showLoader({
                                       title: 'Please Wait...',
                                       // text: 'fetching'
                                    });
                                 },
                           }).done(function({ data, errors }) {

                if (!errors) {

                  NioApp.Toast('Question pool cloned successfully', "success");
                  getSchoolList();
                   $('#modalClone').modal("hide");
                   $(".modal-body select").val("")

                } else {
                    NioApp.Toast("Something Went Wrong", "error");
                }

            }).fail(function (error) {
                           NioApp.Toast("Error Occured", "error");
                        }).always(function () {
                           hideLoader();
                           translate();
                           
                        });

               }
            })

       $(function () {
         $(".btn-close").click(function () {
         $(".modal-body select").val("")
           $(".modal").modal("hide");
         });
       });

      $('#btn-refresh-examination').click(function(e) {
        e.preventDefault();
        filters = '';
        query = '';
        getSchoolList();
      });

      $('#clear-filter').click(function(e) {
           e.preventDefault();
           $("#city-filter").empty().trigger('change');

           $('#license_filter1').select2('val','null');
           $('#sub-license-filter').select2('val','null');
           $('#country-filter').select2('val','null');
           //$('#city-filter').select2('val','null');
           $('#stat').select2('val','null');
           $('.filter-wg').removeClass('show');
           filters = '';
           getSchoolList(1, {filter: 'clearFilter'});
      });

      $("#sort_by").on("change", function(){
         getSchoolList(page, {
            sortBy: $(this).val()
         })
      });
      
      $("#searchSchool").on("submit", function(e){
         e.preventDefault();
         getSchoolList(1, {
            q: $(this).serialize()
         })
      });

      $("#search-resett").click(function(e){
         // $('#sort_by').select2('val','null');
         query = '';
         getSchoolList(1);
      })

      $("#filter-form").on("submit", function(e){
           e.preventDefault();
           getSchoolList(1,{filter: $(this).serialize()})
      });

      function getLicenseListOLD()
      {
         $.ajax({
            type: "get",
            url: `https://dsms.technoiq.in/backend/api/auth/all_main_license/${0}`
         }).done(({errors, data}) =>{
            if(!errors)
            {
               $("#license_filter1").html('')
               data.result.forEach(item =>{
                  $("#license_filter1").append(`<option value="">Choose license</option><option value="${item.id}">${item.name}</option>`)
               })
            }
            else
            {
               NioApp.Toast("Error Occurred", "error");
            }
         })
      }

      function getLicenseList() {
      $.ajax({
         type: "get",
            url: `https://dsms.technoiq.in/backend/api/auth/all_main_license/${0}`
      }).done(({ errors, data }) => {
         if (!errors) {
             langCode = localStorage.getItem('language-type');
               languageText(langCode);
            $("#license_filter1").html(`<option value=""></option>`);

            data.result.forEach(item => {
               $("#license_filter1").append(`
                  <option value="${item.id}">${item.name}</option>
               `)
            })
         }
      })
   }

      function getCountryList()
      {
         $.ajax({
            type: "get",
            url: `https://dsms.technoiq.in/backend/api/auth/get_countries`
         }).done(({errors, data}) =>{
            if(!errors)
            {
               /*$("#country-filter").html('')
               data.result.forEach(item =>{
                  $("#country-filter").append(`<option value="">Choose country</option>
                     <option value="${item.id}">${item.name}</option>`)
               })*/

                langCode = localStorage.getItem('language-type');
               languageText(langCode);
            $("#country-filter").html(`<option value=""></option>`);

            data.result.forEach(item => {
               $("#country-filter").append(`
                  <option value="${item.id}">${item.name}</option>
               `)
            })


            }
            else
            {
               NioApp.Toast("Error Occurred", "error");
            }
         })
      }


      $('#country-filter').on('change', function() {
           selval =  this.value ;
           getCityList("#city-filter",selval);

      });

      $('#license_filter1').on('change', function() {
           selval =  this.value ;
           getSubLicenseList("#sub-license-filter",selval);

      });


      const getCityList = (target = false, country_id) => {
           let response;

           // Reset element content
           
           $.ajax({
              type: "get",
              async: false,
              global: false,
              url: 'https://dsms.technoiq.in/backend/api/auth/get_city/'+country_id,
              
              success: function ({ data, errors }) {
                 if (!errors) {
                       if(target) {
                         langCode = localStorage.getItem('language-type');
               languageText(langCode);
                          $(target).html('').append('<option value="">Select</option>');

                          data.result.forEach((item) => {
                             $(target).append(`<option value='${item.id}'>${item.name}</option>`)
                          });
                       } else {
                          response = data.result;
                       }
                 } else {
                    
                 }
              },
              complete:()=>{}
           });
            return response;
        }

      const getSubLicenseList = (target = false, license_id) => {
           let response;

           // Reset element content
           $(target).html('').append('<option value="">Select</option>');
           
           $.ajax({
              type: "get",
              async: false,
              global: false,
              url: 'https://dsms.technoiq.in/backend/api/auth/sub_license_list/'+license_id,
            
              
              success: function ({ data, errors }) {
                 if (!errors) {
                       if(target) {
                         langCode = localStorage.getItem('language-type');
                     languageText(langCode);
                          data.result.sub_license_list.forEach((item) => {
                             $(target).append(`<option value='${item.id}'>${item.name}</option>`)
                          });
                       } else {
                          response = data.result;
                       }
                 } else {
                    
                 }
              },
              complete:()=>{}
           });
            return response;
        }

   </script>
   
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
</body>

</html>