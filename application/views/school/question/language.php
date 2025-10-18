<?php include_once APPPATH . 'views/school/includes/header.php'; ?>

<style>
   .disable {

      pointer-events: none;
}
.nk-block-head-content .bg-white{
   background: #1e88e5 !important;
   color:#fff !important;
}
</style>



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

                              <!-- <h3 class="nk-block-title page-title">Question Pool Native Language</h3> -->

                              <div class="nk-block-des text-soft">

                                 <!-- <p id="total-pool"></p> -->

                              </div>
                              <div class="nk-block-head-content" style="float: right;right: 0; position: absolute;">
                                 <a href="javascript:void(0)"
                                    class="btn btn-outline-light back-btn bg-white d-none d-sm-inline-flex"><em
                                       class="icon ni ni-arrow-left"></em><span class="">Back</span></a>
                                 <a href="javascript:void(0)"
                                    class="btn btn-icon back-btn btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                       class="icon ni ni-arrow-left"></em></a>
                              </div>
                           </div>

                        </div>

                        <!-- <div class="nk-block-head-content">

                              <div class="toggle-wrap nk-block-tools-toggle">

                                 <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"

                                    data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>

                                 <div class="toggle-expand-content" data-content="pageMenu">

                                    <ul class="nk-block-tools g-3">

                                       <li class="nk-block-tools-opt"><a id="btn-add-question"

                                             class="btn btn-icon btn-primary" aria-expanded="false"><em

                                                class="icon ni ni-plus"></em></a></li>

                                       <li class="nk-block-tools-opt"><a id="btn-refresh-questions"

                                             class="btn btn-icon btn-primary" aria-expanded="false"><em

                                                class="icon ni ni-reload"></em></a></li>



                                    </ul>

                                 </div>

                              </div>

                           </div> -->

                     </div>

                  </div>
                  <br><br>

                  <div class="card que-card">
                     <div class="card-aside-wrap">
                        <div class="card-content">
                           <div class="card-inner">
                              <div class="nk-block">
                                 <div class="row">
                                    <div class="col-8">
                                       <div class="nk-block-head nk-block-head-sm nk-block-between questions" style="margin:0px !important;">
                                          <h6 class="title" id="preview_question"></h6>
                                       </div>
                                       <div class="form-group col-md-12 options--block" id="preview_options">
      
                                       </div>
                                       <div class="question--mark clearfix">
                                          <span class="float-left" id="preview_marks">
                                          </span>
                                       </div>
                                    </div>
                                    <div class="col-4 d-flex justify-content-center align-items-center" id="preview_media">

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br><br>

                  <!-- <div class="card">
                                <div class="card-aside-wrap">
                                    <div class="card-content">
                                        <div class="card-inner">
                                          <div class="nk-block">
                                             <div class="form-control-wrap" style="display:flex;">
                                                <textarea class="form-control disable" id="preview_question" style="height:auto;width:60%;"></textarea> 
                                                <div class="col-12" style="width:auto;" id='preview_image'>

                                                </div>

                                             </div>
                                                <br>
                                             <div class="row" id="options--container">
                                                 <div class="col-12 options--list" >
                                                 <div class="form-group" id="preview_options">
                                                 </div>
                                                 
                                              </div>
                                             </div>
                                                <div class="question--mark clearfix">
                                                    <span class="float-left" id='preview_marks'></span>
                                                    
                                                </div>

                                             </div>

                                          </div>
                                       </div>

                                    </div>
                                    </div> -->

                  <div class="nk-block">

                     <div class="card card-bordered card-stretch">

                        <div class="card-inner-group">

                           <div class="row px-2" style="height: 75vh;">

                              <div class="col-md-4 h-100 border-end px-4">

                                 <div class="pt-2 pb-1">

                                    <h5 class="mb-2 border-bottom pb-1 language-title">Language</h5>

                                    <input type="search" class="rounded form-control" name="" id="filterLanguage"
                                       placeholder="Search Language">

                                 </div>

                                 <ul id="languages_list" class="overflow-auto" style="height: 80%">

                                 </ul>

                              </div>

                              <div class="col-md-8 px-4 pt-2 h-100 overflow-auto">

                                 <form id="nativeForm">

                                    <div id="questionTextarea">

                                       <div style="height: 80%"
                                          class="d-flex justify-content-center align-items-center">

                                          <h4 class="text-light sel-language">Select language</h4>

                                       </div>

                                    </div>

                                    <br>

                                    <div class="form-group" id="options">



                                    </div>

                                    <div id="nativeForm-btn">



                                    </div>

                                 </form>

                              </div>

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

      $(function () {

         async function init() {

            const auth = await appModule.checkAuth();

         }



         init();

      });

   </script>



   <script>

      var count = 0;

      var languageId = 0;
      var defaultQuestion = '';

      $(function () {

         getLangauges();

         getOptionCount();

         

         $('.back-btn').click(function(){
            location.href = document.referrer
         })

         $("#filterLanguage").on("keyup", function () {

            var value = $(this).val().toLowerCase();

            $("#languages_list li").filter(function () {

               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

            });

         });



         NioApp.Validate("#nativeForm", {

            onkeyup: function (element) {

               $(element).valid();

            },

            onclick: function (element) {

               $(element).valid();

            },

            errorElement: "span",

            errorClass: "invalid",

            errorPlacement: function errorPlacement(error, element) {

               if (element.hasClass('correct')) {

                  NioApp.Toast("Please select atleast one correct answer.", "error")

               }

               else if (element.hasClass('option-name') || element.hasClass('form-control')) {
                  error.appendTo(element.parent())
               } else {

                  error.appendTo();

               }

            },

         });







         $("#nativeForm").on('submit', function (e) {

            e.preventDefault();



            if ($(this).valid()) {

               showLoader({

                  title: "Please Wait",

                  // text: "Updating..."

               })



               const optionsEles = document.querySelectorAll(".native-options");

               let options = [];

               optionsEles.forEach(ele => {

                  options.push({

                     option: ele.firstElementChild.firstElementChild.value,

                     is_correct: ele.lastElementChild.firstElementChild.checked ? 1 : 0

                  })



               })



               $.ajax({

                  type: "POST",

                  url: api_base_url + "add-native-question-pool",

                  data: {

                     "main_question_pool_id": getUrlParam("id"),

                     "question": $("#question").val(),

                     "language_id": languageId,

                     "options": options

                  }

               }).done(({ status, message }) => {

                  if (status) {

                     const nextLang = document.querySelector(".native-active")

                     setTimeout(() => {

                        if (nextLang.nextElementSibling != null) {

                           nextLang.nextElementSibling.click();

                        }

                     }, 1000);

                     NioApp.Toast(message, 'success')

                  }

                  else {

                     NioApp.Toast(message, 'warning')

                  }

               }).fail(() => {

                  NioApp.Toast("Error Occurred", 'error')

               }).always(() => hideLoader())

            }



         })

      })



      function getLangauges() {

        /* showLoader({

            title: "Please Wait",

            // text: "Fetching..."

         })*/

         $.ajax({

            type: "GET",

            url: api_base_url + `language/${$.cookie("school_id")}/active_list`,

         }).done(({ status, message = "something went wrong!", data }) => {

            if (status) {

               data.forEach(item => {

                  if (item.default_language != 1) {

                     $("#languages_list").append(`

                        <li onclick="showDetails(this, ${item.id})" class="btn btn-light btn-lang mt-2 w-100">${item.language_name} ${item.native_language_name ? '/' : ''} ${item.native_language_name}</li>

                     `)

                  }else{
                     if(item.language_name == 'English'){
                        $('.que-card').css('direction','ltr');
                        $('#preview_marks').removeClass('float-left');
                         $('#preview_marks').addClass('float-right');
                     }
                     
                  }

               })

            }

            else {

               NioApp.Toast(message, 'error')

            }

         }).fail(() => {

            NioApp.Toast("Error Occurred", 'error')

         }).always(() => hideLoader())

      }



      function getOptionCount() {



         $.ajax({

            type: "GET",

            url: api_base_url + "options-count/" + getUrlParam("id"),

            async: false,

         }).done(({ status, data, message, preview }) => {

            if (status) {
               count = data;
               defaultQuestion = preview;
               $("#preview_question").html(preview.question);
               $("#preview_marks").html("<b>Mark : </b> " + preview.marks)
               if (preview.image) {
                  $('#preview_media').html(`<img class='w-75' src="${preview.image}">`)
               }
               else if (preview.video) {
                  $('#preview_media').html(`<video class='w-75' controls>
                                            <source src='${preview.video}'></source>
                                        </video>`)
               }
               else
                  console.log(preview.options[0]);
               if (preview.options.length > 0) {

                  (preview.options).forEach(item => {
                     $('#preview_options').append(`

                     <div class="option--box">
                        <div class="option--item ">
                           <div style="display: flex; align-items: center; height: 2.5rem; gap:0.5em">
                              
                              <input ${item.is_correct ? 'checked' : 'disabled'} style="margin-right: 10px;" value="1" class="radio-inline"
                                 type="radio">
                                 ${item.option_name}
                           </div>
                        </div>
                     </div>
                     `)
                  })
               }
            }
            else
               NioApp.Toast(message, "warning")



         }).fail(() => {

            NioApp.Toast("error occurred", "error")

         })

      }



      function showDetails(ele, language_id) {

         languageId = language_id

         $(".btn-lang").removeClass(["btn-primary", "native-active"]).addClass("btn-light")

         $(ele).removeClass("btn-light").addClass(["btn-primary", "native-active"])

         showLoader({

            title: "Please Wait",

            // text: "Fetching..."

         })

         $.ajax({

            type: "GET",

            url: api_base_url + `get-native-question-by-language-id/${language_id}/${getUrlParam('id')}`,

         }).done(({ status, message = "something went wrong!", data }) => {

            if (status) {

               $("#questionTextarea").html(`

                  <label for="question" class="form-label quest">Question</label>

                  <textarea class="form-control" required placeholder="Enter Question" id="question" style="height: 100px">${data.question}</textarea>

               `)



               $("#options").html(`

                  <label class="form-label answers" for="full-name">Answers</label>

               `)

               const difference = count - data.options.length;


               data.options.forEach((option, inx) => {
                  if(defaultQuestion.no_shuffle == 1 && inx == data.options.length-1)
                  {
                     $("#options").append(`

                     <div class="form-control-wrap col-md-10 d-flex align-items-center mt-1 native-options">

                        <div class='w-100 d-flex flex-column border rounded ps-0 pe-0 position-relative'>
                           <input id="option${inx}" name="option${inx}" required type="text" value='${option.option_name}' class="form-control border-0 option-name">
                           ${(difference < 0 && inx > 1) ? `<div class="link link-danger" data-optionz="remove"><em class="icon ni ni-user-remove-fill"></em></div>` : ''}
                           <div style='position: absolute; ${localStorage.getItem('language-type') == 2 ? 'left: 0%' : 'right: 0%'}; bottom: -23px;'>All of the above</div>
                           </div>

                        <div class="d-flex mx-1">
                        <input id="option-radio${inx}" required type="radio" ${option.is_correct ? 'checked' : ''} name="correct" class="correct">
                        <label class="form-label correct mb-0 ms-1 correct">Correct</label>
                        </div>

                     </div>

                     `)
                  }
                  else
                  {
                     $("#options").append(`

                     <div class="form-control-wrap col-md-10 d-flex align-items-center mt-1 native-options">

                        <div class='w-100 d-flex flex-column border ps-0 pe-0 rounded px-0'>
                           <input id="option${inx}" name="option${inx}" required type="text" value='${option.option_name}' class="form-control border-0 option-name">
                           ${(difference < 0 && inx > 1) ? `<div class="link link-danger" data-optionz="remove"><em class="icon ni ni-user-remove-fill"></em></div>` : ''}
                        
                           </div>

                        <div class="d-flex mx-1">
                        <input id="option-radio${inx}" required type="radio" ${option.is_correct ? 'checked' : ''} name="correct" class="correct">
                        <label class="form-label mb-0 ms-1 correct">Correct</label>
                        </div>

                     </div>

                  `)
                  }

                  

               })

               if(difference > 0)
               {
                  for (var i = 0; i < difference; i++) {
                     if(defaultQuestion.no_shuffle == 1 && i == difference-1)
                     {
                     $("#options").append(`

                        <div class="form-control-wrap col-md-10 d-flex align-items-center mt-1 native-options">

                           <div class="w-100 position-relative">
                              <input id="option${i}" name="option${i}" required type="text" class="form-control option-name">
                           <div style='position: absolute; ${localStorage.getItem('language-type') == 2 ? 'left: 0%' : 'right: 0%'};'>All of the above</div>

                           </div>

                           <div class="d-flex mx-1">
                              <input id="option-radio${i}" required type="radio" name="correct" class="correct">
                              <label class="form-label mb-0 ms-1 correct">Correct</label>
                           </div>

                        </div>

                     `)
                  }
                  else
                  {
                     $("#options").append(`

                        <div class="form-control-wrap col-md-10 d-flex align-items-center mt-1 native-options">

                           <div class="w-100">
                              <input id="option${i}" name="option${i}" required type="text" class="form-control option-name">
                           </div>

                           <div class="d-flex mx-1">
                              <input id="option-radio${i}" required type="radio" name="correct" class="correct">
                              <label class="form-label mb-0 ms-1 correct">Correct</label>
                           </div>

                        </div>

                     `)
                  }

                  }
               }



               if (ele.nextElementSibling == null)

                  $("#nativeForm-btn").html(`<button class="btn btn-primary savebtn">Save</button>`)

               else

                  $("#nativeForm-btn").html(`<button class="btn btn-primary savenextbtn">Save and Next</button>`)
               $("#nativeForm-btn").append(`<button class="btn btn-danger ms-2 cancelbtn" type="button" ><a href="${base_url}school/question" class="text-white">Cancel</a></button>`)




            }

            else {

               $("#questionTextarea").html(`

                  <label for="question" class="form-label">Question</label>

                  <textarea required class="form-control" placeholder="Enter Question" id="question" style="height: 100px"></textarea>

               `)



               $("#options").html(`

                  <label class="form-label answers" for="full-name">Answers</label>

               `)

               for (var i = 0; i < count; i++) {
                  if(defaultQuestion.no_shuffle == 1 && i == count-1)
                     {
                  $("#options").append(`

                     <div class="form-control-wrap col-md-10 d-flex align-items-center mt-1 native-options">

                        <div class="w-100 position-relative">
                           <input id="option${i}" name="option${i}" required type="text" class="form-control option-name">
                           <div style='position: absolute; ${localStorage.getItem('language-type') == 2 ? 'left: 0%' : 'right: 0%'};'>All of the above</div>
                        </div>

                        <div class="d-flex mx-1">
                           <input id="option-radio${i}" required type="radio" name="correct" class="correct">
                           <label class="form-label mb-0 ms-1 correct">Correct</label>
                        </div>

                     </div>
                     

                  `)
                  }
                  else
                  {
                     $("#options").append(`

                     <div class="form-control-wrap col-md-10 d-flex align-items-center mt-1 native-options">

                        <div class="w-100">
                           <input id="option${i}" name="option${i}" required type="text" class="form-control option-name">
                        </div>

                        <div class="d-flex mx-1">
                           <input id="option-radio${i}" required type="radio" name="correct" class="correct">
                           <label class="form-label mb-0 ms-1 correct">Correct</label>
                        </div>

                     </div>

                  `)
                  }

               }

               if (ele.nextElementSibling == null)

                  $("#nativeForm-btn").html(`<button class="btn btn-primary">Save</button>`)

               else

                  $("#nativeForm-btn").html(`<button class="btn btn-primary">Save and Next</button>`)
               $("#nativeForm-btn").append(`<button class="btn btn-danger ms-2 " type="button" ><a href="${base_url}school/question" class="text-white">Cancel</a></button>`)


            }
            $('[data-optionz="remove"]').click(function(){
               $(this).parent().parent().remove();
            })

         }).fail(() => {

            NioApp.Toast("Error Occurred", 'error')

         }).always(() => hideLoader())

      }



   </script>





</body>



</html>