<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>

<!-- Libraries -->
<script src="<?php echo base_url('assets/js/bundle.js?ver=3.0.0');?>"></script>
<script src="<?php echo base_url('assets/js/libs/cookie.js?ver=3.0.0');?>"></script>
<script src="<?php echo base_url('assets/js/libs/moment.js?ver=3.0.0');?>"></script>

<!-- App Initiator -->
<script src="<?php echo base_url('assets/js/scripts.js?ver=3.0.0');?>"></script>

<!-- Common -->
<script src="<?php echo base_url('assets/js/app.js?ver=3.0.0');?>"></script>
<script src="<?php echo base_url('assets/js/app-module.js?ver=3.0.0');?>"></script>

<script>
   function encrypt(data)
   {
      return CryptoJS.AES.encrypt(data, key).toString();
   }

   function decrypt(data)
   {
      return CryptoJS.AES.decrypt(data, key).toString(CryptoJS.enc.Utf8);
   }

//     $('.modal').on('hidden.bs.modal', function (e) {
//   $(this)
//     .find("input,textarea,select")
//        .val('')
//        .end()
//     .find("input[type=checkbox], input[type=radio]")
//        .prop("checked", "")
//        .end();
// })
</script>

<script>

function swapSchool(ele, id)
{
   const url = new URL(base_url)

   Swal.fire({
         title: 'Alert!',
         text: "Are you sure you want to swap?",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes',
         cancelButtonText: 'No'
         }).then((result) => {
         if (result.isConfirmed) {
            $.cookie('school_id', id);
            $.cookie('school_name', ele.innerHTML);
            $.cookie('is_admin', 1);
            location.href = base_url+"school/dashboard"
         }
      })

}
$(function(){
   $("#swapModal .btn-close").click(function(){
      $("#swapModal input").val('')
      $("#swapModal button").show()
   })
})


$(function(){

   $.ajax({

      type: "GET",

      url: api_base_url+"superadmin/school-list",

      headers:{

         Authorization: $.cookie('access_token')

      }

   }).done(({status, message, data})=>{

      if(status)

      {

         $("#schoolList").html('');

         data.forEach(school =>{

            $("#schoolList").append(`

            <li class="d-flex justify-content-between">

               <button class="btn btn-light w-100 py-2 my-1" data-bs-toggle="modal" data-bs-target="#messageModal" onclick=swapSchool(this,${school.id})>${school.name}</button>

            </li>

         `)

         })

      }

   })

})


   $.ajaxSetup({
      headers: {
         "Authorization": `Bearer ${$.cookie("access_token")}`
      }
   });


   $(function(){
      if($.cookie('is_admin') && $.cookie('is_admin') == 1)
      {
         $('.nk-header-wrap h4').text('Admin')
         $('.nk-quick-nav').prepend(`
            <li class="d-none d-sm-block me-n1">
               <div class="bg-white px-2 py-1 rounded d-flex justify-content-center align-items-center">
                  <p style="color: #1e88e5" class="mb-0 fw-bolder pe-2">${$.cookie('school_name')}</p>
                  <button class="btn-close" onclick="backToAdmin()"></button>
               </div>
            </li>
         `)
      }


      $("#schoolInput").on("keyup", function() {

      var value = $(this).val().toLowerCase();

      $("#schoolList li button").filter(function() {

         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

      });

});
   })

   function backToAdmin()
   {
      $.removeCookie('school_id');
      $.removeCookie('school_name');
      $.removeCookie('is_admin');
      location.href=`${base_url}admin/dashboard`
   }

   const getFamilyList = (target = false, selected) => {
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
               if(target) {
                  data.forEach((item) => {
                     $(target).append(`<option ${(item.id == selected) && 'selected'} value='${item.id}'>${item.family_name}</option>`)
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

    const getDefficultyLevels = (target=false, selected=false, marks=false) => {
         let response;
         // Reset element content
         $(target).html('').append('<option value="">Select</option>');
         console.log('id'+target)
         $.ajax({
            type: "get",
            async: false,
            global: false,
            url: formApiUrl(`difficulty-level/list/${$.cookie("school_id")}`),
            success: function ({ data, status }) {
               if (status) {
                if(target){
                    data.forEach((item, inx) => {
                      $(target).append(`<option  ${(item.level_id == selected) && 'selected'} value='${marks ? JSON.stringify({ id: item.level_id, marks: item.marks }) : item.level_id}'>${item.level}</option>`)
                    /* $(target).append(`<option ${(selected && (item.level_id == selected)) && 'selected'} data-select2-id="${item.id}" value='${marks ? JSON.stringify({ id: item.level_id, marks: item.marks }) : item.level_id}'>${item.level}</option>`)*/
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

      const getDifficultyLevelsByQue = (target=false, selected=false, marks=false) => {
         let response;
         // Reset element content
         $(target).html('').append('<option value=""></option>');

         $.ajax({
            type: "get",
            async: false,
            global: false,
            url: formApiUrl(`get-valid-difficulty_levels/${$.cookie("school_id")}`),
            success: function ({ data, status }) {
               if (status) {
                if(target){
                    data.forEach((item) => {
                     $(target).append(`<option ${(selected && (item.level_id == selected)) && 'selected'}  value='${marks ? JSON.stringify({ id: item.level_id, marks: item.marks }) : item.level_id}'>${item.level}</option>`)
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

const getLicenseList = (target = false, selected) => {
   let response;

   // Reset element content
   $(target).html('').append('<option value="">Select</option>');
   
   $.ajax({
      type: "get",
      async: false,
      global: false,
      url: 'https://dsms.technoiq.in/backend/api/auth/all_main_license/'+$.cookie("school_id"),
      
      success: function ({ data, errors }) {
         if (!errors) {
               if(target) {
                  data.result.forEach((item) => {
                     $(target).append(`<option ${(item.id == selected) && 'selected'} value='${item.id}'>${item.name}</option>`)
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


function logout()
{
   var cookie = $.cookie();

   const is_admin = $.cookie('is_admin');

   for(let x in cookie)
   {
      $.removeCookie(x);
   }
   localStorage.clear();

   if(is_admin)
   location.href = base_url+"admin/login";
   else
   location.href = base_url+"school/login";


}

</script>

<script>
   // Get page name/path
   var pathname = new URL(window.location.href).pathname;
   let path = '';
   if(pathname != '') {
      path = pathname.split('/').pop();
   }

   $(function() {
            
        $('.nk-quick-nav-icon').removeClass('show');    
      
      if(typeof $.cookie('access_token') != 'undefined' && path != '' && path != 'login') {
         // Update nav account detail
         $("#nav-email").text($.cookie("email"));
         $(".nav-name").text($.cookie("name"));
         $("#nav-short-name").text($.cookie("name")[0]);

         // Get total exams count
         // (function getTotalExams() {
         //    $.ajax({
         //       url: formApiUrl(`total-exams/${appModule.getCookie('school_id')}`),
         //       type: 'get'
         //    }).done(function(res) {
         //       if(res.status == true) {
         //          $('#total-exams .count').html(res.data);
         //       }
         //    });
         // })();

          (function getProfileImage() {
              $.ajax({
                type: "GET",
                async: false,
                url: "https://dsms.technoiq.in/backend/api/auth/school/profile/" + $.cookie("school_id")
            }).done(({ status, message, data }) => {
                if (status) {
                    console.log('ok'+data.image)
                    $("#profile-image").attr("src", data.image);
               }
            })
         })();

      }

   });

    $('select').select2({
          minimumResultsForSearch: -1,
          placeholder: function(){
              $(this).data('placeholder');
          }
      });
    

   function changeLanguage(val){
      $('html').hide();
      location.reload();
      localStorage.setItem('language-type', val);
      langCode = localStorage.getItem('language-type');
      console.log('code is'+langCode)
      if(langCode == 2){
         
         $("head").append('<link rel="stylesheet" href="https://em.technoiq.in/test/frontend/assets/css/dashlite.rtl.css" type="text/css" />');
                $('body').addClass('has-rtl');
                $("html").children().css("direction","rtl");

         $.ajax({

            type: "GET",

            url: api_base_url+"get-lang",

            headers:{
               Authorization: $.cookie('access_token')
            }

            }).done(({status, message, data})=>{

            if(status)

            {

               $('#school-admin-title').text(data['School Admin']['Dashboard']['School Admin']);
               $('#attend-title').text(data['School Admin']['Dashboard']['Attended']);
               $('.dtitle').text(data['School Admin']['Dashboard']['Dashboard']);
               $('#etitle').text(data['School Admin']['Dashboard']['Exam']);
               $('.failed-title').text(data['School Admin']['Dashboard']['Failed']);
               $('#ftitle').text(data['School Admin']['Dashboard']['Families']);
               $('.three-title').text(data['School Admin']['Dashboard']['Last 30 days']); 
               $('#six-title').text(data['School Admin']['Dashboard']['Last 6 months']);
               $('#one-title').text(data['School Admin']['Dashboard']['Last 1 years']);
               $('.ftitle').text(data['School Admin']['Dashboard']['Families']);

               $('#tmenu').text(data['School Admin']['Dashboard']['Menu']);
               $('#tover').text(data['School Admin']['Dashboard']['Overview']); 
               $('.tpass').text(data['School Admin']['Dashboard']['Passed']);

               $('.slno').text(data['School Admin']['Manage Student']['Sl.No']);
               $('.schoolna-title').text(data['School Admin']['Dashboard']['School Name']);
               $('#sign-out').text(data['School Admin']['Dashboard']['Sign out']);
               $('#tot-exam').text(data['School Admin']['Dashboard']['Total Exam']);
               $('.views').text(data['School Admin']['Dashboard']['View']);
               $('#view-profile').text(data['School Admin']['Dashboard']['View Profile']);
               $('#wel-title').text(data['School Admin']['Dashboard']['Welcome to school admin dashboard']);

               $('label[for="first-name"],.first-name').text(data['School Admin']['Manage Student']['First Name']);
               $('label[for="second-name"]').text(data['School Admin']['Manage Student']['Second Name']);
               $('label[for="email"]').text(data['School Admin']['Manage Student']['Email ID']);
               $('label[for="mobile-number"]').text(data['School Admin']['Manage Student']['Mobile Number']);
               $('label[for="dob"]').text(data['School Admin']['Manage Student']['DOB']);
               $('label[for="gender"]').text(data['School Admin']['Manage Student']['Gender']);
               $('label[for="city"]').text(data['School Admin']['Manage Student']['City']);
               $('label[for="id-type"]').text(data['School Admin']['Manage Student']['ID Type']);
               $('label[for="id-number"]').text(data['School Admin']['Manage Student']['ID Number']);
               $('label[for="userna"]').text(data['School Admin']['Manage Student']['Username']);
               $('.password').text(data['School Admin']['Manage Student']['Password']);
               $('label[for="confirm-password"]').text(data['School Admin']['Manage Student']['Confirm Password']);
               $('.license-type').text(data['School Admin']['Manage Student']['License Type']);
               $('.sub-name').text(data['School Admin']['Manage Student']['Sub Licence Type']);

               $('label[for="sub-name"]').text(data['School Admin']['Manage Student']['Sub Licence Type']);
               $('label[for="level-selectbox"]').text(data['School Admin']['Manage Student']['Level']);
               $('label[for="plans-selectbox"]').text(data['School Admin']['Manage Student']['Plans']);
               $('label[for="stud-photo"]').text(data['School Admin']['Manage Student']['Select photo']);
               $('#level-selectbox').attr('placeholder', data['School Admin']['Manage Student']['Select level']);
               $('#plans-selectbox').attr('placeholder', data['School Admin']['Manage Student']['Select plans']);
               $('.license-type-select').data('placeholder', data['School Admin']['Manage Student']['License Type']);
               $('#sub-license-selectbox').attr('placeholder', data['School Admin']['Manage Student']['Sub Licence Type']);
               $('.status-label').text(data['School Admin']['Authenticator']['Status']);
               
               $('.que-pool-title').text(data['School Admin']['Question Pool']['Question Pool']);
               $('.apply-btn').text(data['School Admin']['Manage Student']['Apply']);
               $('.clickable').text(data['School Admin']['Manage Student']['clear filter']);
               $(".sort-by").attr("data-placeholder",data['School Admin']['Manage Student']['Sort By']);
               $('.filter-label').text(data['School Admin']['Manage Student']['Filter']);

               $('.show-label').text(data['School Admin']['Manage Student']['Show']);
               $('.back-btn').text(data['School Admin']['Manage Student']['Back']);
               $('.student-title').text(data['School Admin']['Manage Student']['Student']);
               $('.general-tab').text(data['School Admin']['Manage Student']['General Details']);
               $('.exam-tab').text(data['School Admin']['Manage Student']['Examination']);
               $('.result').text(data['School Admin']['Manage Student']['Result']);
               $('#select2-sort_by_exam-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('#select2-sort-by-container,#select2-sortBy-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('#select2-stat-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('#select2-license-filter-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['License Type']);
               $('.que-type').text(data['School Admin']['Question Pool']['Question Type']);
               $('.diff-level').text(data['School Admin']['Question Pool']['Difficulty Level']);
               $('.family').text(data['School Admin']['Question Pool']['Family']);
               $('.elim-que').text(data['School Admin']['Question Pool']['Eliminatory Questions']);
               $('.is-elim-que').text(data['School Admin']['Question Pool']['Is this an eliminatory question?']);
               $('.is-yes').text(data['School Admin']['Question Pool']['Yes']);
               $('.is-no').text(data['School Admin']['Question Pool']['No']);
               $('.question').text(data['School Admin']['Question Pool']['Questions']);
               $('.que-img').text(data['School Admin']['Question Pool']['Question Image']);
               $('.que-video').text(data['School Admin']['Question Pool']['Question Video']);
               $('.correct').text(data['School Admin']['Question Pool']['Correct']);
               $('#select2-difficulty_level-container .select2-selection__placeholder').text(data['School Admin']['Question Pool']['Difficulty Level']);
               $('.cancel').text(data['School Admin']['Examination']['Cancel']);
               $('.que-details').text(data['School Admin']['Question Pool']['Question details']);
               $('.marks').text(data['School Admin']['Question Pool']['Marks']);
               $('.language-title').text(data['School Admin']['Question Pool']['Language']);
               $('.sel-language').text(data['School Admin']['Settings']['Select Language']);

               $('.add-exam').text(data['School Admin']['Examination']['Add Examination']);
               $('.exam-name').text(data['School Admin']['Examination']['Exam Name']);
               $('#select2-sub_licence_filter-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sub Licence Type']);
               $('#select2-license_filter-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['License Type']);
               $('#select2-sort_by-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('.exam-title').text(data['School Admin']['Examination']['Exam Name']);
               $('.cont-no').text(data['School Admin']['Manage Student']['Contact Number']);
               $('.reports').text(data['School Admin']['Settings']['Reports']);
               $('.gender').text(data['School Admin']['Manage Student']['Gender']);
               $('.device-auth').text(data['School Admin']['Authenticator']['Device Authenticator']);
               $('.auth-id').text(data['School Admin']['Authenticator']['Authenticator ID']);
               $('.download-app').text(data['School Admin']['Dashboard']['Download Application']);
               $('#select2-sortby-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);

               $('.languages').text(data['School Admin']['Settings']['Languages']);
               $('.select2-selection__rendered .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('.auth-title').text(data['School Admin']['Authenticator']['Authenticator']);
               $('.settings').text(data['School Admin']['Settings']['Settings']);
               $('.instruction').text(data['School Admin']['Settings']['Instruction']);
               $('.view-detail').text(data['School Admin']['Manage Student']['View Details']);
               $('.addon-info').text(data['School Admin']['Manage Student']['Additional Information']);
               $('.active-btn').text(data['School Admin']['Settings']['Active']);
               $('.inactive-btn').text(data['School Admin']['Settings']['Inactive']);
               $('#edit-student').text(data['School Admin']['Manage Student']['Edit Students']);
               $('#edit-student-modal').text(data['School Admin']['Manage Student']['Edit Students']);
               $('.edit').text(data['School Admin']['Settings']['Edit']);
               $('.que-family').text(data['School Admin']['Question Pool']['Question Family']);
               $('.sublicensename').text(data['School Admin']['Settings']['Sub license name']);
               $('.default-langs').text(data['School Admin']['Settings']['Default Languages']);
               $('#tover').text(data['School Admin']['Dashboard']['Overview']);
               $(".action").text(data["School Admin"]["Manage Student"]["Action"]);
               $('#defaultLang').text(data['School Admin']['Settings']['Default Languages']);
               $('.update').text(data['School Admin']['Instruction page']['Update']);
               $('.add').text(data['School Admin']['Examination']['Add']);
            }  
            })
      }else{
         
               $('body').removeClass('has-rtl');
               document.body.removeAttribute('dir', 'rtl')
               localStorage.removeItem("language-type");
               $('head').find('link[data-language="rtl"]').remove();
               //location.reload();
      }
            

   }

</script>
<script src="<?php echo base_url('application/views/school/includes/language_scripts.js');?>"></script>

