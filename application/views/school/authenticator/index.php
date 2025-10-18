<?php include_once APPPATH . 'views/school/includes/header.php'; ?>
<div class="modal fade" id="addExam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title auth-id" id="exampleModalLabel">Authenticator ID</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="username" class="col-form-label auth-id">Authenticator Id:</label>
            <input type="text" disabled value='' class="form-control" id="username">
          </div>
          <div class="mb-3">
            <label for="password" class="col-form-label password">Password:</label>
            <input type="text" disabled value='' class="form-control" id="pass">
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<!-- approve modal -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to authenticate?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reject</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Approve</button>
      </div>
    </div>
  </div>
</div>



<body class="nk-body npc-crypto bg-lighter has-sidebar " >
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
                              <h3 class="nk-block-title page-title device-auth" style="margin-bottom:-5px;">Device Authenticator</h3>
                              <div class="nk-block-des text-soft">
                                 <span id="tot-device">Total Devices <span id="total_auth"> </span></span>
                              </div>
                           </div>
                           <div class="nk-block-head-content">
                              <div class="toggle-wrap nk-block-tools-toggle">
                                 <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                 <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                       <li class="nk-block-tools-opt"><a href="#" class="btn btn-icon btn-primary px-2 auth-id" data-bs-toggle="modal" data-bs-target="#addExam"  aria-expanded="false">Authenticator ID</a></li>

                                       <li class="nk-block-tools-opt"><a href="<?php echo $this->config->item('api_base_url').'get-application'?>" class="btn btn-primary download-app"  aria-expanded="false">Download Application</a></li>
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
                                             <select id='sortby' class="form-select form-select-sm js-select2" data-search="off" data-plStudent data-placeholder="Sort By">
                                                <option value=""></option>
                                                <option value="0">Select All</option>
                                                <option value="1">Ascending</option>
                                                <option value="2">Descending</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="card-tools me-n1">
                                       <ul class="btn-toolbar gx-1">
                                          <li><a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a></li>
                                          <li class="btn-toolbar-sep"></li>
                                          <li>
                                             <div class="toggle-wrap">
                                                <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                <div class="toggle-content" data-content="cardTools">
                                                   <ul class="btn-toolbar gx-1">
                                                      <li class="toggle-close"><a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a></li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle d-none" data-bs-toggle="dropdown">
                                                               <div class="dot dot-primary"></div>
                                                               <em class="icon ni ni-filter-alt"></em>
                                                            </a>
                                                            <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                               <div class="dropdown-head">
                                                                  <span class="sub-title dropdown-title clickable">Filters</span>
                                                                  <div class="dropdown"><a href="#" class="btn btn-sm btn-icon"><em class="icon ni ni-more-h"></em></a></div>
                                                               </div>
                                                               <div class="dropdown-body dropdown-body-rg">
                                                                  <div class="row gx-6 gy-3">
                                                                    
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label class="overline-title overline-title-alt">Status</label>
                                                                           <select class="form-select form-select-sm js-select2">
                                                                              <option value="1">Approved</option>
                                                                              <option value="0">In Approved</option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-6">
                                                                        <div class="form-group">
                                                                           <label class="overline-title overline-title-alt">Exam/License Type</label>
                                                                           <select class="form-select form-select-sm js-select2">
                                                                              <option value="1">Type 1</option>
                                                                              <option value="2">Type 2</option>
                                                                              <option value="3">Type 3</option>
                                                                              <option value="4">Type 4</option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-12">
                                                                        <div class="form-group"><button type="button" class="btn btn-secondary apply-btn">Apply</button></div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="dropdown-foot between"><a class="clickable" href="#">Clear Filters</a><a href="#">Save Filters</a></div>
                                                            </div>
                                                         </div>
                                                      </li>
                                                      <li>
                                                         <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-setting"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                               <ul class="link-check">
                                                                  <li><span class="show-label">Show</span></li>
                                                                  <li ><a href="javascript:void(0)" style="justify-content: space-between;">10 <input checked onchange="getAuthList(1,{page_size:10})"  type="checkbox"  class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">20 <input onchange="getAuthList(1,{page_size:20})" type="checkbox" class="radio" value="1" name="fooby[1][]"  ></a></li>
                                                                  <li><a href="javascript:void(0)" style="justify-content: space-between;">50 <input onchange="getAuthList(1,{page_size:50})" type="checkbox"  class="radio" value="1" name="fooby[1][]" ></a></li>
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
                                       <div class="search-content d-flex">
                                          <a href="javascript:void" id="search-reset" class="search-bStudent IDk btn btn-icon toggle-search" data-target="search">
                                             <em class="icon ni ni-arrow-left"></em></a>
                                          <input id='search' type="search" class="form-control border-transparent form-focus-none" plStudent IDeholder="Search">
                                          <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-inner p-0 text-center">
                                  <h4 class='text-center p-2' id="load-data"></h4>
                                 <div class="nk-tb-list nk-tb-ulist" id="auth-list">
                                    
                                    
                                 </div>
                              </div>
                              <div class="card-inner" id='auth-pagination'>
                                 
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
   
   <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>
   <script src="<?php echo base_url('assets/js/libs/simplePagination.js'); ?>"></script>

   <script>
      $(function() {
         async function init() {
            const auth = await appModule.checkAuth();
            getAuthList();
         }
         getAuthenticatorCredentials();
         init();
      });
      
      var page = 1;
      let query = "";
      let sortby = 0;
      let page_size = 10;
      function getAuthList(pageNumber = page,options = {})
      {
         page_size = options.page_size ? options.page_size : page_size;
         options.page_size = page_size;

         sortby = options.sortby ? options.sortby : sortby; 
         options.sortby = sortby;

         query = options.q ? options.q : query;
         options.q = query;


        showLoader()
         page = pageNumber;

         $('.dropdown-menu').removeClass('show');
         $('.filter-wg').removeClass('show');

         $.ajax({
            type: "GET",
            url: `${api_base_url}authenticator/${$.cookie("school_id")}/list?page=${page}`,
            data: options
         }).done(({status, message, data})=>{

            if(status)
            {
               $("#total_auth").text(`${data.total}`)
               if(data.total > 0)
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

                  $("#auth-list").html(`
                     <div class="nk-tb-item nk-tb-head auth-detail-list">
                        <div class="nk-tb-col"><span class="text-black fw-bold slno">Sl.No</span></div>
                        <div class="nk-tb-col"><span class="text-black fw-bold host">Host</span></div>
                        <div class="nk-tb-col"><span class="text-black fw-bold mac-id">MAC ID</span></div>
                        <div class="nk-tb-col tb-col-md"><span class="text-black fw-bold req-date">Request Date</span></div>
                        <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold status-label">Status</span></div>
                        <div class="nk-tb-col tb-col-sm"><span class="text-black fw-bold action">Action</span></div>
                     </div>
                  `);

                  data.data.forEach(item => {
                     $("#auth-list").append(`
                        <div class="nk-tb-item">
                        <div class="nk-tb-col tb-col-md">${data.from++}</div>

                           <div class="nk-tb-col">
                              <div class="">
                                 <div class="user-info"><span class="tb-lead">${item.host}</span></div>
                              </div>
                           </div>
                           <div class="nk-tb-col tb-col-md">${item.mac_id}</div>
                           <div class="nk-tb-col tb-col-md">${item.request_date}</div>
                           <div class="nk-tb-col"><span class="badge badge-dim ${item.status == 1 ? 'bg-success' : item.status == -1 ? 'bg-danger' :'bg-warning'}" data-bs-toggle="modal" onclick="chanageStatus(${item.id}, ${item.status})">${item.status == 1 ? 'Approved' : item.status == -1 ? 'Disapproved' :'Approve'}</span></div>
                           <div class="nk-tb-col nk-tb-col-tools">
                              <ul class="">
                                 <li>
                                    <div class="drodown">
                                       <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <ul class="link-list-opt no-bdr">
                                             <li><a onclick="authDel(${item.id})"><em class="icon ni ni-trash"></em><span class="delete">Delete</span></a></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     `)
                  })
                  $("#auth-pagination").pagination({

                  items: parseInt(data.total),

                  itemsOnPage: parseInt(data.per_page),

                  currentPage: data.current_page,

                  displayedPages: 3,

                  navStyle: "pagination justify-content-center justify-content-md-start",

                  listStyle: "page-item",

                  linkStyle: "page-link",

                  onPageClick: function (pageNumber, event) {

                     event ? event.preventDefault() : '';

                     getAuthList(pageNumber);

                  },

                  });
               }
               else
               {
                  $("#auth-list").html(`
                     <h4 class="p-4 text-center">No Devices Available</h4>
                  `)
               }
            }
            else
            {
               NioApp.Toast(message, 'warning');
            }

         }).fail(()=>{
            NioApp.Toast("Error Occured", "error");
         }).always(()=>{
           hideLoader();
         })
      }

      $(function()
      {
         $('#sortby').change(function(e)
         {
            getAuthList(page,{
               sortby : e.currentTarget.value
            })
         })
      })

      $(function()
      {
         $('#search').change(function(e)
         {
            getAuthList(page = 1,{
               q : e.currentTarget.value
            })
         })
      })

      $('#search-reset').click(function(){
         query = "";
         $('#sortby').select2('val','null');
         getAuthList(); 
      })

      function chanageStatus(id, status)
      {
         Swal.fire({
         title: 'Are you sure?',
         text: `Are you sure you want ${status == 1 ? 'disapprove' : 'approve'}!`,
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: 'No',
         confirmButtonText: 'Yes'
         }).then((result) => {
         if (result.isConfirmed) {
            showLoader({
            title: "Please Wait",
            // text: "Updating..."
         })
            $.ajax({
               type: "PATCH",
               url: api_base_url+"update-status-authenticator",
               data:{
                  id: id,
                  status: status == 1 ? -1 : 1
               }
            }).done(({status, message})=>{
               if(status)
               {
                  getAuthList();
                  NioApp.Toast(message, "success");
               }
               else
               {
                  NioApp.Toast(message, "warning");
               }
            }).fail(()=>{
               NioApp.Toast("Error Occured", "error");
            }).always(()=>{
               hideLoader();
            })
         }
         })
      }

      function authDel(id)
      {
         Swal.fire({
         title: 'Are you sure?',
         text: "Are you sure you want delete!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: 'No',
         confirmButtonText: 'Yes'
         }).then((result) => {
         if (result.isConfirmed) {
            showLoader({
            title: "Please Wait",
            // text: "Deleting..."
         })
            $.ajax({
               type: "DELETE",
               url: api_base_url+"delete-authenticator",
               data:{
                  id
               }
            }).done(({status, message})=>{
               if(status)
               {
                  getAuthList();
                  NioApp.Toast(message, "success");
               }
               else
               {
                  NioApp.Toast(message, "warning");
               }
            }).fail(()=>{
               NioApp.Toast("Error Occured", "error");
            }).always(()=>{
               hideLoader();
            })
         }
         }) 
      }

      function getAuthenticatorCredentials()
      {
         $.ajax({
            type: "POST",
            url: api_base_url+"get-authenticator-credentials",
            data: {
               school_id: $.cookie("school_id")
            }
         }).done(({status, message, data})=>{
            if(status)
            {
               $("#username").val(data.username);
               $("#pass").val(data.password);
            }
            else
            {
               NioApp.Toast(message, "warning");
            }
         }).fail(({message}) =>{
            NioApp.Toast(message, "error");

         })
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