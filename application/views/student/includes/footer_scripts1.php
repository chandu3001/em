
 <script src="<?php echo base_url('assets/student/js/app.js');?>"></script>
<script src="<?php echo base_url('assets/student/js/quiz-start.min.js');?>"></script>
<!-- Libraries -->
<script src="<?php echo base_url('assets/js/bundle.js?ver=3.0.0');?>"></script>
<script src="<?php echo base_url('assets/js/libs/cookie.js?ver=3.0.0');?>"></script>
<script src="https://code.responsivevoice.org/responsivevoice.js?key=IpWT3TLh"></script>
<!-- App Initiator -->
<script src="<?php echo base_url('assets/js/scripts.js?ver=3.0.0');?>"></script>

<!-- Common -->
<script src="<?php echo base_url('assets/js/app.js?ver=3.0.0');?>"></script>
<script src="<?php echo base_url('assets/js/app-module.js?ver=3.0.0');?>"></script>
        
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
<script>
    $(function(){
        $('.authenticated').html(`${$.cookie('device_status') == 1 ? 'Authenticated' : 'Unauthenticated'}`)
        
        if($.cookie('avatar'))
        $('.user_img > img').attr('src', $.cookie('avatar'));

        $(".system_name").html(`${$.cookie('host')}`)
    $('#host-name-area').html(`<h2 class="nk-block-title fw-normal" id="host-name" style="margin-left: -4px;">System Name:</h2>
             <div class="nk-block-des"><p id="host-name-value">${$.cookie('host')}</p></div>`);
    // $("#host-name").html('System Name: <p>'+$.cookie('host') +'</p>')
    $('#device-status-area').html(`<h2 class="nk-block-title fw-normal" id="device-status" style="margin-left: -4px;">Device Status:</h2>
             <div class="nk-block-des"><p class="${$.cookie("device_status") == 1 ? 'text-success fw-bold' : 'text-danger'}" id="device-status-value">${$.cookie("device_status") == 1 ? 'Authenticated' : 'Not Authenticated'}</p></div>`);
    // $("#device-status").html(`<p class="${$.cookie("device_status") == 1 ? 'text-success fw-bold' : 'text-danger'}">Device Status : ${$.cookie("device_status") == 1 ? 'Authenticated' : 'Not Authenticated'}</p>`)
   })
   function checkAuth()
   {
    if (typeof $.cookie('access_token') === 'undefined'){
        location.href = base_url+"student/login"
    }
   }

   if(!(location.href).includes("login"))
   {
    checkAuth();
   }

    $(function(){
        $("#username1").html($.cookie("username"))
        $("#student_id, .student_id").html('Student ID : ' + $.cookie("student_id"))
        $("#school-name").html($.cookie("school_name"))
        $("#school-logo").attr('src',$.cookie("school_logo"))
        $("#student_name, .student_name").html($.cookie("firstname")+' '+$.cookie("lastname"))
        $("#user_email").html($.cookie("email"))
        $("#user_short_name").text($.cookie("name")[0]);
        $(".user_name").html($.cookie("firstname")+' '+$.cookie("lastname"))
        $('#student-name').html($.cookie("firstname")+' '+$.cookie("lastname"));

          //get window size
        var w = window.innerWidth;
        var h = window.innerHeight;

        window.localStorage.setItem("window-height", h);
        window.localStorage.setItem("window-width", w);

    })

    function logout()
    {
        const cookie = $.cookie()
       const auth = $.cookie("auth");

        for(let x in cookie)
        {
                $.removeCookie(x)
        }
        window.localStorage.clear();

        location.href= base_url+"student"+"/login?auth="+auth
    }
</script>