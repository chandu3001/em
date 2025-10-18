<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



<script src="<?php echo base_url('assets/js/bundle.js?ver=3.0.0');?>"></script>

<script src="<?php echo base_url('assets/js/scripts.js?ver=3.0.0');?>"></script>

<script src="<?php echo base_url('assets/js/libs/cookie.js?ver=3.0.0');?>"></script>

<script src="<?php echo base_url('assets/js/libs/simplePagination.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/app.js?ver=3.0.0'); ?>"></script>
<script src="<?php echo base_url('assets/js/libs/moment.js?ver=3.0.0');?>"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>





<script>
   function encrypt(data)
   {
      return CryptoJS.AES.encrypt(data, key).toString();
   }

   function decrypt(data)
   {
      return CryptoJS.AES.decrypt(data, key).toString(CryptoJS.enc.Utf8);
   }

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
            $.cookie('school_id', id, {path: '/school'});
            $.cookie('school_name', ele.innerHTML, {path: '/school'});
            $.cookie('name', ele.innerHTML, {path: '/school'});
            $.cookie('email', '', {path: '/school'});
            $.cookie('is_admin', 1, {path: '/school'});
            $.cookie('access_token', $.cookie('access_token'), {path: '/school'});

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

   $(document).ready(function(){

      $('.nk-menu-item, .back-btn').click(function(){
      localStorage.removeItem('active_tab')
   })

      $("#schoolInput").on("keyup", function() {

         var value = $(this).val().toLowerCase();

         $("#schoolList li button").filter(function() {

            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

         });

      });

   });

</script>



<script>

   // Get page name/path

   var pathname = new URL(window.location.href).pathname;

   let path = '';

   if(pathname != '') {

      path = pathname.split('/').pop();

   }

  

   function getParam(param)

   {

      let searchParams = new URLSearchParams(window.location.search)

      return searchParams.get(param)

   }

   

   function logout()

   {

      var cookie = $.cookie();



      for(let x in cookie)

      {

         $.removeCookie(x);

      }

      

      location.href = base_url+"admin/login";
      localStorage.clear();
   }



   $(function(){

      

      // Check auth

      if(typeof $.cookie('access_token') == 'undefined' && path != '' && path != 'login') {

         if(getParam('redirect') != null) {

            window.location.href = formUrl('admin/login', { redirect: getParam('redirect') });

         } else {

            window.location.href = formUrl('admin/login');

         } 

      }



      // Get total exams count

      if(typeof $.cookie('access_token') != 'undefined' && path != '' && path != 'login') {

         // Update nav account detail

         $(".nav-email").text($.cookie("email"));

         $(".nav-name").text($.cookie("name"));

         $(".nav-short-name").text($.cookie("name")[0]);



         // Get total exams count

         (function getTotalExams() {

            $.ajax({

               url: formApiUrl(`total-exams`),

               type: 'get'

            }).done(function(res) {

               if(res.status == true) {

                  $('#total-exams .count').html(res.data);

               }

            });

         });

      }

   });


$(".modal").on("hidden.bs.modal", function(){
   $('#schoolList li button').show();
    $("#schoolInput").val("");
});

$('#schoolInput').on("click", function(){
   $('#schoolList li button').show();
});

   
function changeLanguage(val){
   
$('html').hide();
      localStorage.setItem('language-type', val);
      langCode = localStorage.getItem('language-type');
      console.log('code is'+langCode)
      
      if(langCode == 2){
         location.reload();
         arabicCss = base_url+'assets/css/dashlite.rtl.css';
         $('head').append(`link[href="${arabicCss}"]`);
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
               $('label[for="userna"]').text(data['School Admin']['Manage Student']['Username']);
               $('.password').text(data['School Admin']['Manage Student']['Password']);
               $('label[for="confirm-password"]').text(data['School Admin']['Manage Student']['Confirm Password']);
               $('.license-type').text(data['School Admin']['Manage Student']['License Type']);
               $('.sub-name').text(data['School Admin']['Manage Student']['Sub Licence Type']);
               $('.license-type-select').data('placeholder', data['School Admin']['Manage Student']['License Type']);
               $('#sub-license-selectbox').attr('placeholder', data['School Admin']['Manage Student']['Sub Licence Type']);
               $('.status-label').text(data['School Admin']['Authenticator']['Status']);
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
               $('.correct').text(data['School Admin']['Question Pool']['Correct']);
               $('.marks').text(data['School Admin']['Question Pool']['Marks']);

               $('.exam-name').text(data['School Admin']['Examination']['Exam Name']);
               $('#select2-sub_licence_filter-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sub Licence Type']);
               $('#select2-license_filter-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['License Type']);
               $('#select2-sort_by-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('.exam-title').text(data['School Admin']['Examination']['Exam Name']);
               $('.cont-no').text(data['School Admin']['Manage Student']['Contact Number']);
               $('.reports').text(data['School Admin']['Settings']['Reports']);
               $('.gender').text(data['School Admin']['Manage Student']['Gender']);
               $('#select2-sortby-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('.select2-selection__rendered .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('.settings').text(data['School Admin']['Settings']['Settings']);
               $('.view-detail').text(data['School Admin']['Manage Student']['View Details']);
               $('.addon-info').text(data['School Admin']['Manage Student']['Additional Information']);
               $('.sublicensename').text(data['School Admin']['Settings']['Sub license name']);
               $('#tover').text(data['School Admin']['Dashboard']['Overview']);
               $(".action").text(data["School Admin"]["Manage Student"]["Action"]);
               $(".tot-questions").text(data["School Admin"]["Question Pool"]["Total Questions"]);
               $(".by-country").text(data["Super Admin"]["Dashboard"]["By country"]);
               $(".wel-title").text(data["Super Admin"]["Dashboard"]["Welcome to Adimn Dashboard"]);
               $('label[for="email"],.email').text(data['School Admin']['Manage Student']['Email ID']);
               $('.log-out').text(data['School Admin']['Dashboard']['Sign out']);
               $('.address').text(data['School Admin']['Settings']['Address']);
               $('.phone-no').text(data['Super Admin']['Manage School']['Phone Number']);
               $('.presonal').text(data['Super Admin']['Manage Students']['Personal']);

            }  
            })
      }else{
               $('body').removeClass('has-rtl');
               document.body.removeAttribute('dir', 'rtl')
               localStorage.removeItem("language-type");
               $('head').find('link[data-language="rtl"]').remove();
               location.reload();
      }
}
$.urlParam = function(name){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results==null) {
            return null;
            }
            return decodeURI(results[1]) || 0;
         }
</script>
<script src="<?php echo base_url('assets/js/arabic.js');?>"></script>

<script src="<?php echo base_url('assets/js/admin/language_scripts.js');?>"></script>

