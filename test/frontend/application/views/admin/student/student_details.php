<?php include_once APPPATH . 'views/admin/includes/header.php'; ?>
<style>
    .btn-student{
        float: right;
        margin-right: 15px;
        margin-top: -58px;
    }
</style>
<body class="nk-body bg-white has-sidebar">
    <div class="nk-app-root">
        <div class="nk-main">
            <?php include_once APPPATH . 'views/admin/includes/sidebar.php'; ?>

            <div class="nk-wrap">
                <?php include_once APPPATH . 'views/admin/includes/navbar.php'; ?>

                <div class="nk-content nk-content-fluid" style="margin-top: 50px;">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between g-3">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title student-title" data-translate>Student / <strong
                                                class="text-primary small" id="student_name"></strong></h3>
                                        <div class="nk-block-des text-soft">
                                            <ul class="list-inline">
                                                <li data-translate class="student-id">Student ID </li><li>: <span class="text-base" id="student_id"></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content" style="margin-top:30px;">
                                        <a 
                                            class="btn back--btn btn-primary d-none d-sm-inline-flex"><em
                                                class="icon ni ni-arrow-left"></em><span data-translate>Back</span></a>
                                        <a 
                                            class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                                class="icon ni ni-arrow-left"></em></a>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="card card-bordered card-preview">
                                      <div class="card-inner">
                                          <ul class="nav nav-tabs mt-n3">
                                              <li class="nav-item">
                                                  <a class="nav-link active" data-bs-toggle="tab" href="#tabItem5"><em class="icon ni ni-user"></em><span class="general-tab" data-translate>General Details</span></a>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link" onclick="GetExamResultLists()" data-bs-toggle="tab" href="#tabItem6"><em class="icon ni ni-lock-alt"></em><span class="exam-tab" data-translate>Examination</span></a>
                                              </li>
                                             
                                          </ul>
                                          <div class="tab-content">
                                              <div class="tab-pane active" id="tabItem5">

                                              </div>
                                              
                                              <div class="tab-pane" id="tabItem6">
                                                <?php include 'exam_list.php'; ?>
                                                  
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

      <?php include_once APPPATH . 'views/admin/includes/footer-scripts.php'; ?>


    <script>

        $(function()
        {
        
            
            if(localStorage.getItem('active_tab'))
            {
                $(`[href='${localStorage.getItem('active_tab')}']`).tab('show')

            }
            $('[data-bs-toggle="tab"]').click(function () {
                localStorage.setItem('active_tab', $(this).attr('href'))
            })
            $('.nk-menu-item, .back--btn').click(function(){
                localStorage.removeItem('active_tab')
                //history.back();
            })
            

        })

        $('.back--btn').click(function(){
            pgIs = localStorage.getItem('pageNO');
            const url = new URL(base_url+"admin/students?page=");
            const backUrl = url.hostname+url.pathname;
            location.href=url+pgIs;

        })


        $(function () {
           // Ajax request setup
            $.ajaxSetup({
                headers: {
                    'Authorization': `Bearer ${$.cookie("access_token")}`
                },
                dataType: 'json'
            });
            getSchoolDeatils();

        });   

        var url = new URL(document.location.href);
        var id = url.searchParams.get("student_id");

      function getSchoolDeatils()
      {

        if($("#tabItem5").children().length > 0)
        {
            return 0;
        }
        /*showLoader({
            title: "Please Wait..."
            // text: "Please Wait..."
        })*/

        $.ajax({
            type: "GET",
            url: `https://dsms.technoiq.in/backend/api/auth/student/details/${id}`
        }).done(({data})=>{
               data = data.result;
                $("#student_name").text(data.first_name_english + " " + data.second_name_english)
                $("#student_id").text(data.student_id)
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
                                <div class="profile-ud wider"><span class="profile-ud-label first-name" data-translate="First Name">First Name</span><span class="profile-ud-value">${data.first_name_english}</span></div>
                            </div>
                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label sec-name" data-translate="Second Name">Second Name</span><span
                                                        class="profile-ud-value">${data.second_name_english}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label email" data-translate="Email ID">Email ID</span><span
                                                        class="profile-ud-value">${data.email}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label mobile" data-translate="Mobile No">Mobile No</span><span
                                                        class="profile-ud-value">${data.phone}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label dob" data-translate="DOB">DOB</span><span
                                                        class="profile-ud-value">${data.dob}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label gender" data-translate="Gender">Gender</span><span
                                                        class="profile-ud-value">${data.gender == 1 ? 'Male' : 'Female'}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span
                                                        class="profile-ud-label id-type" data-translate="ID Type">ID Type</span><span
                                                        class="profile-ud-value">
                                                        ${data.id_type == 0
                                                        ?
                                                        "Aadhar"
                                                        :
                                                        data.id_type == 1
                                                        ?
                                                        "PAN"
                                                        :
                                                        data.id_type == 2
                                                        ?
                                                        "License"
                                                        :
                                                        data.id_type == 3
                                                        ?
                                                        "Passport"
                                                        :
                                                        ''
                                                        }
                                                    </span>
                                                </div>
                                            </div>
                                          
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label" data-translate="City">City</span><span
                                                        class="profile-ud-value city">${data.city}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label national-id" data-translate="National Id">National Id</span><span
                                                        class="profile-ud-value">${data.national_id}</span></div>
                                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-block-head nk-block-head-line"><h6 class="title overline-title text-base addon-info" data-translate data-translate="Additional Information">Additional Information</h6></div>
                                                                <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label username" data-translate="Username">Username</span><span
                                                        class="profile-ud-value ">${data.username}</span></div>
                                            </div>
                                            
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label license-type" data-translate="License Type">License Type</span><span
                                                        class="profile-ud-value">${data.license_name}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label sub-name" data-translate="Sub License Type">Sub License Type</span><span
                                                        class="profile-ud-value">${data.sub_license_name}</span></div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span
                                                        class="profile-ud-label level" data-translate="level">level</span><span
                                                        class="profile-ud-value">
                                                        ${data.level == 1
                                                        ?
                                                        "Beginner"
                                                        :
                                                        data.level == 2
                                                        ?
                                                        "Intermediate"
                                                        :
                                                        data.level == 3
                                                        ?
                                                        "Expert"
                                                        : ''
                                                        }
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider"><span
                                                        class="profile-ud-label sub-plan" data-translate="Subscription Plan">Subscription Plan</span><span
                                                        class="profile-ud-value">${data.plan_name}</span></div>
                                            </div>
                                            
                                        </div>
                    </div>
                    
                </div>

                `)
           
        }).fail(({statusText, status, responseJSON}) =>{
            if(status == 400)
                NioApp.Toast(responseJSON.message, "error");
            else
                NioApp.Toast(statusText, "error");
        }).always(()=>{
            hideLoader();
         
        })
      }
       
    </script>
   