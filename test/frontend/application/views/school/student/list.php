<?php include_once APPPATH . 'views/school/includes/header.php'; ?>

<body class="nk-body npc-crypto bg-lighter has-sidebar ">

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
                              <h3 class="nk-block-title page-title student-title" style="margin-bottom:-5px;">Students</h3>
                              <div class="nk-block-des text-soft">
                                 <p class="text-black" id="total-students"></p>
                              </div>
                           </div>
                           <div class="nk-block-head-content">
                              <div class="toggle-wrap nk-block-tools-toggle">
                                 <a href="javascript:void(0)" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                    data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                 <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                       <li class="nk-block-tools-opt"><button id="btn-add-student"
                                             class="btn btn-icon btn-primary" aria-expanded="false"><em
                                                class="icon ni ni-plus"></em></button></li>

                                       <!-- <li class="nk-block-tools-opt"><a id="btn-refresh-students"
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
                                             <select id="sort-by"
                                                class="form-select form-select-sm js-select2 select2-hidden-accessible sort-by"
                                                data-search="off" data-placeholder="Sort By">
                                                <option value=""></option>
                                                <option value="0">Select All</option>
                                                <option value="1">Ascending</option>
                                                <option value="2">Descending</option>
                                             </select>
                                          </div>
                                          <!-- <div class="btn-wrap">
                                             <span class="d-none d-md-block">
                                                <button class="btn btn-dim btn-outline-light disabled">Apply</button>
                                             </span>
                                             <span class="d-md-none">
                                                <button class="btn btn-dim btn-outline-light btn-icon disabled">
                                                   <em class="icon ni ni-arrow-right"></em>
                                                </button>
                                             </span>
                                          </div> -->
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
                                                               <form id="filter-form">
                                                                  <div class="dropdown-head">
                                                                     <span
                                                                        class="sub-title dropdown-title filter-label">Filters</span>
                                                                     <!-- <div class="dropdown"><a href="javascript:void(0)"
                                                                           class="btn btn-sm btn-icon"><em
                                                                              class="icon ni ni-more-h"></em></a></div> -->
                                                                  </div>
                                                                  <div class="dropdown-body dropdown-body-rg">
                                                                     <div class="row gx-6 gy-3">
                                                                      <!--  <div class="col-6">
                                                                           <div class="form-group">
                                                                              <label
                                                                                 class="overline-title overline-title-alt">Gender</label>
                                                                              <select name="gender"
                                                                                 class="form-select form-select-sm js-select2"
                                                                                 data-placeholder="Gender">
                                                                                 <option selected value=""></option>
                                                                                 <option value="0">All</option>
                                                                                 <option value="1">Male</option>
                                                                                 <option value="2">Female</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>-->
                                                                        <div class="col-5">
                                                                           <div class="form-group">
                                                                              <label
                                                                                 class="overline-title overline-title-alt status-label">Status</label>
                                                                              <select name="status" id="stat"
                                                                                 class="form-select form-select-sm js-select2" data-placeholder="Status">
                                                                                 <option value=''></option>
                                                                                 <option value="1">Active</option>
                                                                                 <option value="0">Inactive</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-7">
                                                                           <div class="form-group">
                                                                              <label
                                                                                 class="overline-title overline-title-alt license-type">License
                                                                                 Type</label>
                                                                              <select name="license_id" id="license-filter"
                                                                                 class="form-select form-select-sm js-select2 license-type-select"
                                                                                 data-placeholder="License Type">
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                           <div class="form-group"><button type="submit"
                                                                                 class="btn btn-secondary apply-btn">Apply</button>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="dropdown-foot between">
                                                                     <button type='reset'
                                                                        class="clickable bg-transparent border-0 text-primary"
                                                                        id='form_clear'>Clear
                                                                        Filters</button>
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
                                                                  <li><span class="show-label">Show</span></li>
                                                                  <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input onchange="studentList(1,{pageSize:10})" checked type="checkbox"  class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                   <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input onchange="studentList(1,{pageSize:20})" type="checkbox" class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input onchange="studentList(1,{pageSize:50})" type="checkbox"  class="radio" value="1" name="fooby[1][]" ></a></li>
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
                                             <a href="javascript:void(0)" id="reset-search"
                                                class="search-bStudent IDk btn btn-icon toggle-search"
                                                data-target="search">
                                                <em class="icon ni ni-arrow-left"></em>
                                             </a>
                                             <input type="search" class="form-control border-transparent form-focus-none"
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
                                 <div id="studentList" class="nk-tb-list nk-tb-ulist">

                                 </div>
                              </div>
                              <div id="students-pagination" class="card-inner">

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

   <?php include 'student_form.php'; ?>
   <?php //include 'student_edit_form.php'; ?>
   <!-- Modal -->
   <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               Are you sure you want to delete this student?
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
               <button type="button" class="btn btn-primary">Yes</button>
            </div>
         </div>
      </div>
   </div>
   <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>
   <script src="<?php echo base_url('assets/js/libs/simplePagination.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/school/student.js'); ?>"></script>
   <style>
      #spanFileName{
         color: #e85347;
         font-size: 11px;
         font-style: italic;
         margin-top: 0.25rem;
         display: block;
      }
      #license-type-selectbox-error,#id-type-error,#level-selectbox-error,#plans-selectbox-error{
         position: absolute;
         color: #fff;
         font-size: 11px;
         line-height: 1;
         bottom: calc(100% + 4px);
         background: #ed756b;
         padding: 0.3rem 0.5rem;
         z-index: 1;
         border-radius: 3px;
         white-space: nowrap;
         bottom: calc(100% + 6px) !important;
         left: auto;
         right: 0;
      }
/*.is-alter .form-control ~ .invalid::before{

   left: auto;
    right: 10px;
    border-right-color: #ed756b;
    border-left-color: transparent;
    bottom: -4px;
}*/

#plans-selectbox-error::before{
    right: 10px;
    border-right-color: #ed756b;
    border-left-color: transparent;
}


   </style>
   <script>
      $(function () {
         async function init() {
            const auth = await appModule.checkAuth();
            studentList();
            getFilterLicenseList()
         }
         init();

      });

      


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


   $(function() {
     $('.valid-char').keydown(function(e) {
       if (e.shiftKey || e.ctrlKey || e.altKey) {
         e.preventDefault();
       } else {
         var key = e.keyCode;
         if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
           e.preventDefault();
         }
       }
     });
      var currentDate = new Date();

      $('#dob').datepicker({
      format: 'dd/mm/yyyy',
       closeOnSelected: true,
         endDate: "currentDate",
         maxDate: currentDate
      });

     

      $('#dob').keypress(function(e) {
      var a = [];
      var k = e.which;

      for (i = 48; i < 58; i++)
      a.push(i);

      if (!(a.indexOf(k)>=0))
      e.preventDefault();
      });

   });


   $( document ).ready(function() {
   $('#dob').bind('keyup','keydown', function(event) {
   var inputLength = event.target.value.length;
    if (event.keyCode != 8){
      if(inputLength === 2 || inputLength === 5){
        var thisVal = event.target.value;
        thisVal += '/';
        $(event.target).val(thisVal);
      }
    }
  })
});


   $('#customFile').on("change",function () {

       var fileExtension = ['jpeg', 'jpg','png'];
       if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
           $('#customFile').val("");
           $('#preview-photo').hide();
           $('#spanFileName').html(this.value);
           $('#spanFileName').html("Only jpeg,jpg,png formats are allowed.");
       }
       else {
           $('#spanFileName').html('');
          //do what ever you want
         $('#preview-photo').show();
       } 
 }) 

      </script>


</body>

</html>