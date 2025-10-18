/*
 Template Name: Admiria - Bootstrap 4 Admin Dashboard
 Author: Mentric
 File: Main js
 */
 var appData = {};
 var paramDefaults = {};
 var processStatus = false;
 

$('.modal').on('shown.bs.modal', function() {
  $(this).find('[autofocus]').focus();
});

$('.card-search input').focusout(function(){
  if($('.card-search input').val() == '')
  {
    document.querySelectorAll('.search-content a').forEach(item => item.click())
  }
})

$('input.radio').click(function(){
  $('em.icon.ni.ni-setting').parent().removeClass('show')
  $('input.radio').prop('checked', false)
  $(this).prop('checked', true)

  $('.dropdown-menu.dropdown-menu-xs.dropdown-menu-end').removeClass('show')
})

$('.apply-btn').click(function(){
  $('.filter-wg.dropdown-menu.dropdown-menu-xl.dropdown-menu-end').removeClass('show').attr('aria-expanded',false)
})



// $('input.radio').click(function(){
//   $('input.radio').prop('checked', false)
//   $(this).prop('checked', true)

//   $('.dropdown-menu.dropdown-menu-xs.dropdown-menu-end').removeClass('show')
// })

document.addEventListener('scroll', function(){$(".select2-dropdown--below").css('z-index', '20')})

function storeBackURL()
{
  localStorage.setItem('backurl',document.referrer)
}

function urlPage(page = 1, pageName = "page")
{
  url = new URL((location.href));
  url.searchParams.delete(pageName)
  url.searchParams.append(pageName, page)
  history.pushState('','', url.href)
}

 // App Data
 function getAppData(appkey) {
   keydata = "";
   if (appkey && Object.keys(appData).length > 0) {
     appdata = JSON.parse(appData);
     if (typeof appdata[appkey] != "undefined") {
       keydata = appdata[appkey];
     }
   }
 
   return keydata;
 }

 $(function(){
  let url = location.href;
  url = url.replace('?','/')
  const urlArr = url.split('/')
  const role = $.cookie("role")

  if(!urlArr.includes('login') && !urlArr.includes('reset_password') && urlArr.includes('admin') && role != 1)
  {
    clearCookie();
    location.href = base_url+'admin/login'
  }
  else if(!urlArr.includes('login') && !urlArr.includes('reset_password') && urlArr.includes('school') && role != 2 && !$.cookie('is_admin'))
  {
    clearCookie();
    location.href = base_url+'school/login'
  }
  else if(!urlArr.includes('login') && !urlArr.includes('reset_password') && urlArr.includes('student') && role != 3 && !urlArr.includes('admin'))
  {
    clearCookie();
    location.href = base_url+'student/login'
  }
  // console.log(new Date().toLocaleString())
 })

 function clearCookie()
 {
  var cookies = $.cookie();
    for(var cookie in cookies) {
      $.removeCookie(cookie);
    }
 }
 
 // Get url params
 function getUrlParam(param) {
   const params = new URL(document.location).searchParams;
   return parseValue(params.get(param));
 }
 
 // Parse Value
 function parseValue(value) {
   if (typeof value != "undefined" && value != null && value != "") {
     return value;
   } else {
     return "";
   }
 }


 
 $('.dropdown-foot button').click(function(){$('.dropdown-menu, .dropdown-toggle').removeClass('show')})

 $(".back-btn").click(function()
 {
  const path = location.pathname;
  if($('[data-bs-toggle="tab"]').length)
  {
    localStorage.removeItem('active_tab')
  }
  const backto = path.includes('frontend/school') ? base_url+'school/dashboard' : path.includes('frontend/admin') ? base_url+'school/dashboard' : ''
  location.href = document.referrer ? document.referrer : backto;
 })
 
 // Form api url
 function formApiUrl(path, options = {}) {
   let paramStr = "";
   let baseurl = api_base_url;
 
   if (parseValue(options.baseUrl) != "") {
     baseurl = options.baseUrl;
   }
 
   if (parseValue(options.params) != "") {
     if (Object.keys(options.params).length > 0) {
       paramStr = "?" + $.param(options.params);
     }
   }
 
   return baseurl + path + paramStr;
 }
 
 // Form app url
 function formUrl(path, params = {}) {
   let paramStr = "";
   if (Object.keys(params).length > 0) {
     paramStr = "?" + $.param(params);
   }
 
   return base_url + path + paramStr;
 }
 
 function showLoader(){
  $("#preloader").show()
 }

 function hideLoader(){
  $("#preloader").hide()
 }
 // Loader
//  function showLoader(option = {}) {
//   // Remove element if it exist
//   if (document.body.contains(document.getElementById('loader')) == true) {
//     document.getElementById('loader').remove();
//   }
  
//   let elmLoader = document.createElement('div');
//   elmLoader.setAttribute('id', 'loader');
  
//   let elmLoaderInner = document.createElement('div');
//   elmLoaderInner.setAttribute('class', 'loader-inner d-flex justify-content-center h-100 justify-content-center');

//   let elmLoaderBody = document.createElement('div');
//   elmLoaderBody.setAttribute('class', 'loader-body d-flex justify-content-center flex-column align-items-center m-auto');

//   // Title
//   if (parseValue(option.title) != '') {
//     let elmLoaderTitle = document.createElement('h4');
//     elmLoaderTitle.setAttribute('class', 'loader-title text-primary mb-2');
//     elmLoaderTitle.textContent = option.title;
//     elmLoaderBody.append(elmLoaderTitle);
//   }

//   // spinner
//   let elmLoaderSpinner = document.createElement('div');
//   elmLoaderSpinner.setAttribute('class', 'spinner-border');
//   elmLoaderBody.append(elmLoaderSpinner);

//   // Text
//   if (parseValue(option.text) != '') {
//     let elmLoaderText = document.createElement('span');
//     elmLoaderText.setAttribute('class', 'loader-text text-secondary mt-2');
//     elmLoaderText.textContent = option.text;
//     elmLoaderBody.append(elmLoaderText);
//   }
  
//   elmLoaderInner.append(elmLoaderBody);
//   elmLoader.append(elmLoaderInner);
//   document.body.append(elmLoader);
//  }

 // Loader
//  function showLoader(option = {}) {
//   // Remove element if it exist
//   if (document.body.contains(document.getElementById('loader')) == true) {
//     document.getElementById('loader').remove();
//   }
  
//   let elmLoader = document.createElement('div');
//   elmLoader.setAttribute('id', 'loader');
  
//   let elmLoaderInner = document.createElement('div');
//   elmLoaderInner.setAttribute('class', 'loader-inner d-flex justify-content-center h-100 justify-content-center bg-transparent');

//   let elmLoaderBody = document.createElement('div');
//   elmLoaderBody.setAttribute('class', 'loader-body d-flex justify-content-center flex-column align-items-center m-auto bg-transparent');

//   // Title
//   // if (parseValue(option.title) != '') {
//   //   let elmLoaderTitle = document.createElement('h4');
//   //   elmLoaderTitle.setAttribute('class', 'loader-title text-primary mb-2');
//   //   elmLoaderTitle.textContent = option.title;
//   //   elmLoaderBody.append(elmLoaderTitle);
//   // }

//   // spinner
//   let elmLoaderSpinner = document.createElement('div');
//   elmLoaderSpinner.setAttribute('class', 'loader');

//   let elmLoaderSpinne = document.createElement('div');
//   elmLoaderSpinne.setAttribute('class', 'pair p1');

//   let elmLoaderSpinn = document.createElement('div');
//   elmLoaderSpinn.setAttribute('class', 'dot dot-1');

//   let elmLoaderSpin = document.createElement('div');
//   elmLoaderSpin.setAttribute('class', 'dot dot-2');

//   elmLoaderSpinne.append(elmLoaderSpinn);
//   elmLoaderSpinne.append(elmLoaderSpin)

//   let elmLoaderSpinne1 = document.createElement('div');
//   elmLoaderSpinne1.setAttribute('class', 'pair p2');

//   let elmLoaderSpinn1 = document.createElement('div');
//   elmLoaderSpinn1.setAttribute('class', 'dot dot-1');

//   let elmLoaderSpin1 = document.createElement('div');
//   elmLoaderSpin1.setAttribute('class', 'dot dot-2');
//   elmLoaderSpinne1.append(elmLoaderSpinn1);
//   elmLoaderSpinne1.append(elmLoaderSpin1)


//   elmLoaderSpinner.append(elmLoaderSpinne);
//   elmLoaderSpinner.append(elmLoaderSpinne1);
//   elmLoaderBody.append(elmLoaderSpinner);




//   // Text
//   if (parseValue(option.text) != '') {
//     let elmLoaderText = document.createElement('span');
//     elmLoaderText.setAttribute('class', 'loader-text text-secondary mt-2');
//     elmLoaderText.textContent = option.text;
//     elmLoaderBody.append(elmLoaderText);
//   }
  
//   elmLoaderInner.append(elmLoaderBody);
//   elmLoader.append(elmLoaderInner);
//   document.body.append(elmLoader);
//  }

//  function hideLoader() {
//   if (document.body.contains(document.getElementById('loader')) == true) {
//     document.getElementById('loader').remove();
//   }
//  }

 // Copy content to clipboard
 function copyToClipboard(value) {
   return new Promise((resolve, reject) => {
     var $tempInput = $("<textarea>");
     $tempInput.appendTo("body").val(value).select();
     document.execCommand("copy");
     $tempInput.remove();
     resolve(true);
   });
 }
 
 // Genrate Random String
 function generateRandomString(length) {
   var charset =
       "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
     retVal = "";
   for (var i = 0, n = charset.length; i < length; ++i) {
     retVal += charset.charAt(Math.floor(Math.random() * n));
   }
   return retVal;
 }

 $(function(){
  if(localStorage.getItem('language-type') == 2)
  {
    document.head.innerHTML += `<style>
    .select2-dropdown.select2-dropdown--below{
      transform: translateX(100%); 
      left: 50% !important;
    }
    </style>`
    $('.select2-dropdown.select2-dropdown--below').attr('dir','rtl')
  }

  $.cookie.defaults = {
    expires: 1,
    domain: domain_name,
    secure: false,
  };
 })
 



 //initializing
//  (function ($) {
//    "use strict";
 
//    $.cookie.defaults = {
//      expires: 1,
//      path: base_url,
//      domain: domain_name,
//      secure: false,
//    };
   
//    $.validator.addMethod(
//      "regex",
//      function (value, element, param) {
//        param = new RegExp(param);
//        return this.optional(element) || param.test(value);
//      },
//      "Invalid format."
//    );
//  })(window.jQuery);
 