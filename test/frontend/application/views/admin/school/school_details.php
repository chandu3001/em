<style>
   .nk-content-fluid{
         margin-top: 102px !important;
         position: relative;
     }
  .tab-pane .nk-content-fluid{
         top: -17px;
         background: #fff;
         padding:0px !important;
         left: -19px;
         width: 104%;
    }
 .card-bordered{
         box-shadow:none !important;
    }
        </style>
<?php include_once APPPATH . 'views/admin/includes/header.php'; ?>

   <body class="nk-body npc-crypto bg-lighter has-sidebar " >
      <div class="nk-app-root">
         <div class="nk-main ">

            <?php include_once APPPATH . 'views/admin/includes/sidebar.php'; ?>

            <div class="nk-wrap ">
               
            <?php include_once APPPATH . 'views/admin/includes/navbar.php'; ?>

               <div class="nk-content nk-content-fluid exam_list_align">
                  <div class="container-xl wide-lg">
                    <div class="nk-content-body">
                        <div class="components-preview wide-md mx-auto">
                                    
                                   
                              <div class="nk-block nk-block-lg">
                                  <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between g-3">
                                    <div class="nk-block-head-content">
                                       
                                    </div>
                                    <div class="nk-block-head-content" style="margin-bottom: 10px !important;">
                                        <a class="btn bg-primary back--btn" style="color: white;"><em
                                                class="icon ni ni-arrow-left" ></em><span class="back-btn">Back</span></a>
                                        <a href="javascript:void(0)" class="btn back--btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                                class="icon ni ni-arrow-left"></em></a>
                                    </div>
                                </div>
                            </div>
                                  <div class="card card-bordered card-preview">
                                      <div class="card-inner">
                                          <ul class="nav nav-tabs mt-n3">
                                              <li class="nav-item">
                                                  <a class="nav-link active" data-bs-toggle="tab" href="#tabItem5"><em class="icon ni ni-user"></em><span class="general-tab" data-translate>General Details</span></a>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link" onclick="GetExaminationLists()" data-bs-toggle="tab" href="#tabItem6"><em class="icon ni ni-lock-alt"></em><span class="exam-tab" data-translate>Examination</span></a>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link" onclick="GetStudentLists()" data-bs-toggle="tab" href="#tabItem3"><em class="icon ni ni-user"></em><span class="student-details" data-translate>Student Details</span></a>
                                              </li>
                                          </ul>
                                          <div class="tab-content">
                                              <div class="tab-pane active" id="tabItem5">

                                              </div>
                                              <div class="tab-pane" id="tabItem6" style="margin-top: -85px!important;">
                                                   
                                                  <?php include 'includes/exam_criteria_list.php'; ?>

                                              </div>   
                                              <div class="tab-pane" id="tabItem3" style="margin-top: -85px!important;">
                                                <?php include 'includes/student_details.php'; ?>
                                                  
                                              </div>   
                                          </div>
                                      </div>
                                  </div>
                                 
                              </div>
                            
                          </div>
                      </div>
                  </div>
               </div>
               
               <?php include_once APPPATH . 'views/admin/includes/footer.php'; ?>


            </div>
         </div>
      </div>

      
       <?php //include 'includes/exam_criteria_form.php'; ?>
       <?php include_once APPPATH . 'views/admin/includes/footer-scripts.php'; ?>

      <script>

       $(function(){

        getSchoolDeatils();
             

       /* $('#addExam').click(function(){
           $('#add-exam').modal('show');
           return false;
         })*/
         if(localStorage.getItem('active_tab'))
        {
            $(`[href='${localStorage.getItem('active_tab')}']`).tab('show')
            if($(`[href='${localStorage.getItem('active_tab')}']`).attr('onclick'))
            {
                $(`[href='${localStorage.getItem('active_tab')}']`).click();
            }

        }
        $('[data-bs-toggle="tab"]').click(function () {
            localStorage.setItem('active_tab', $(this).attr('href'))
        })

        $('.nk-menu-item, .back-btn').click(function(){
            localStorage.removeItem('active_tab')
        })

      });
      $.ajaxSetup({
        headers:{
            "Authorization": `Bearer ${$.cookie("access_token")}`
        }
      })

      let searchParams = new URLSearchParams(window.location.search)
      const id = getParam("id")


      function getSchoolDeatils()
      {
        if($("#tabItem5").children().length > 0)
        {
            return 0;
        }
        /*showLoader({
            // title: "Data Fetching From DSMS",
            title: "Please Wait..."
        })*/

        $.ajax({
            type: "GET",
            url: api_base_url+"school_info/"+id
        }).done(({data, message, status})=>{
            if(status)
            {
               var langCode = localStorage.getItem('language-type');
               languageText(langCode);

                $("#tabItem5").html(`
                <div class="card-inner">
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title"></h5>
                        </div>
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label school-name" data-translate="School Name">School Name</span><span class="profile-ud-value">${data.name}</span></div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label school-type" data-translate="School Type">School Type</span><span class="profile-ud-value">${data.school_type == 0 ? 'Male' : data.school_type == 1 ? "Women" : 'Mixed'}</span></div>
                            </div>
                           <!-- <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label" data-translate="Web Link">Web Link</span><span class="profile-ud-value">${data.school_url}</span></div>
                            </div>-->
                            <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label status-label" data-translate="Status">Status</span><span class="profile-ud-value">${data.status ? "active" : 'inactive'}</span></div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label email" data-translate="Email ID">Email ID</span><span class="profile-ud-value">${data.email}</span></div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label mobile" data-translate="Phone Number">Phone Number</span><span class="profile-ud-value">${data.phone}</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-block-head nk-block-head-line"><h6 class="title overline-title text-base addon-info" data-translate="Additional Information">Additional Information</h6></div>
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label country" data-translate="Country">Country</span><span class="profile-ud-value">${data.country_name}</span></div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label city" data-translate="City">City</span><span class="profile-ud-value">${data.city_name}</span></div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label reg-no" data-translate="Register of Commerce Number">Register of Commerce Number</span><span class="profile-ud-value">${data.reg_of_commerce}</span></div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label tot-no-stud" data-translate="Total Number of Students">Total Number of Students</span><span class="profile-ud-value">${data.total_student}</span></div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label tot-no-license" data-translate="Total Number of Licenses">Total Number of Licenses</span><span class="profile-ud-value">${data.total_license_type}</span></div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label tot-no-sublicense" data-translate="Total Number of Sub-License">Total Number of Sub-License</span><span class="profile-ud-value">${data.total_sub_license_type}</span></div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider"><span class="profile-ud-label tot-no-activeexam" data-translate="Total Number of Active Exams">Total Number of Active Exams</span><span class="profile-ud-value">${data.total_active_exams}</span></div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                `)
            }
            else
            {
                NioApp.Toast(message, "error");
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

      $('.back--btn').click(function(){
        const url = new URL(base_url+"admin/schools");
        const backUrl = url.hostname+url.pathname;
        if(localStorage.getItem(backUrl))
        {
            url.searchParams.append('page',localStorage.getItem(backUrl))
            localStorage.removeItem("active_tab")
            localStorage.removeItem(backUrl)

            location.href = url.href;
        }

      })




      var page2 = 1
    
   </script>
   </body>
</html>

