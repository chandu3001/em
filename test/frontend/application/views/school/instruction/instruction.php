<!DOCTYPE html>

  <?php include_once APPPATH . 'views/school/includes/header.php'; ?>
  <link href="<?php echo base_url('assets/css/codepen.min.css');?>">

   <style type="text/css">
      #instruction_ifr{
         height: 250px!important;;
      }
      #instruction-error{
         color: #f43424;
         font-size: 12px;
         font-style: italic;
         display: block;
      }

   </style>
   <body class="nk-body npc-crypto bg-lighter has-sidebar " >
      <div class="nk-app-root">
         <div class="nk-main ">

            <?php include_once APPPATH . 'views/school/includes/sidebar.php'; ?>

            <div class="nk-wrap ">
               
            <?php include_once APPPATH . 'views/school/includes/navbar.php'; ?>

               <!--<div class="nk-content nk-content-fluid">
                  <div class="container-xl wide-lg">
                     <div class="nk-content-body">
                        <div class="nk-block-head nk-block-head-sm">
                           <div class="nk-block-between">
                              <div class="nk-block-head-content">
                                 <h3 class="nk-block-title page-title">Instruction</h3>
                                 <div class="nk-block-des text-soft">
                                    <p id="tot-instruction"></p>
                                 </div>
                              </div>
                              <div class="nk-block-head-content">
                                 <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                       <ul class="nk-block-tools g-3">
                                       <li class="nk-block-tools-opt"><a id="btn-add-instruction" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#addLang"  aria-expanded="false"><em class="icon ni ni-plus"></em></a></li>
                                       
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
                                    
                                    <div class="card-search search-wrap" data-search="search">
                                       <div class="card-body">
                                          <div class="search-content"><a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a><input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by borrower or category"><button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="card-inner p-0 text-center" id="instructions"></div>
                                 <div class="card-inner" id="instructions-pagination"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>-->

               <div class="nk-content nk-content-fluid">

               <div class="container-xl wide-lg">

                  <div class="nk-content-body">

                     <div class="nk-block-head nk-block-head-sm">

                        <div class="nk-block-between">

                           <div class="nk-block-head-content">

                              <h3 class="nk-block-title page-title instruction-title">Instructions</h3>

                              <div class="nk-block-des text-soft">

                                 <p id="total-pool"></p>

                              </div>

                           </div>

                    

                        </div>

                     </div>

                     <div class="nk-block">

                        <div class="card card-bordered card-stretch">

                           <div class="card-inner-group">

                              <div class="row" style="height: 600px">

                                <div class="col-md-4 h-100 border-end ps-4 pe-2">

                                    <div class="pt-2 pb-1">

                                       <h5 class="mb-2 languages" style="text-align: center;">Languages</h5>
                                       <input type="search" class="w-100 border border-light p-1 rounded" name="" id="filterLanguage" placeholder="Search Language">
                                    </div>

                                    <ul id="languages_list" class="overflow-auto" style="height: 100%"></ul>

                                </div>

                                <div class="col-md-8 p-4">

                                 <form id="instructionsForm">

                                    <div id="instructionTextarea">

                                       

                                    </div>

                                   
                                    <div id="instructionsForm-btn">



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

      <div class="modal fade" id="instructionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Select Examination</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="instructionsForm"  class="is-alter">

            <div class="modal-body">
                <div class="mb-3">
                  <label for="language" class="col-form-label" style="font-weight: 600;">Language :</label>
                  <select id="language" class="form-select" name="language_id" required data-msg="Language is required"></select>
                </div>
                <div class="mb-3">
                  <label for="mytextarea"  class="col-form-label" style="font-weight: 600;">Instruction:</label>
                  <textarea id="mytextarea" name="instruction"></textarea>

                </div>
            </div>
            <div class="modal-footer">
               <button  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary" id="btn-instruction">Add</button>
            </div>
            </form>

          </div>
        </div>
      </div>


         <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>

         <script src="<?php //echo base_url('assets/js/school/instruction.js'); ?>"></script>
         <script src="<?php echo base_url('assets/js/libs/simplePagination.js'); ?>"></script>
         <script>
            $(function() {
               async function init() {
                  const auth = await appModule.checkAuth();
                 // instructionList();
                  //getLanguageList("#language");
                  getLangauges();
                  var langCode = localStorage.getItem('language-type');
                 // languageText(langCode);

               }
               init();

               $("#filterLanguage").on("keyup", function() {

                  var value = $(this).val().toLowerCase();

                  $("#languages_list li").filter(function() {

                     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

                  });

               });

            });

      </script>


            <script type="text/javascript" src="https://cdn.tiny.cloud/1/psdg4lpi6hnlaka0woujj5qtukpwrfy1dg7371hldql4lhod/tinymce/5/tinymce.min.js"></script>

      
      <script type="text/javascript">
         const instructionForm = $("#instructionsForm");


         function getLangauges(){

            /*showLoader({

               title: "Please Wait",

               // text: "Fetching..."

            })*/

            $.ajax({

               type: "GET",

               url: api_base_url+`language/${$.cookie("school_id")}/list`,

            }).done(({status, message = "something went wrong!", data})=>{

               if(status)

               {

                  data.forEach(item =>{

                     if(!item.language_name.includes('English') || !item.native_language_name.includes('english'))

                     {

                        $("#languages_list").append(`

                           <li onclick="showDetails(this, ${item.id})" class="btn btn-light btn-lang mt-2 w-100 direction">${item.language_name} ${item.native_language_name ? '/' : ''} ${item.native_language_name}</li>

                        `)

                     }else{

                        $("#languages_list").append(`
                           <li onclick="showDetails(this, ${item.id})" class="btn btn-light btn-lang mt-2 w-100 direction">${item.language_name} / ${item.native_language_name}</li>
                        `);



                             $.ajax({

                           type: "GET",

                           url: formApiUrl(`get-instruction/${item.id}/${$.cookie("school_id")}`),

                        }).done(({status, message = "something went wrong!", data})=>{

                        tinymce.execCommand('mceRemoveEditor', true, "instruction");
                        languageText(langCode);
                           if(status)
                           {console.log('true')

                              $("#instructionTextarea").html(`<div class="mb-3">
                                    <label for="instruction"  class="col-form-label instruction" style="font-weight: 600;">Instruction:</label>
                                    <textarea class="mytextarea " id="instruction" name="instruction"></textarea>
                                  </div> `)
                                 if(langCode == 1){
                                    linkURL = base_url+'assets/css/codepen-rtl.css';
                                 }else{
                                     linkURL = base_url+'assets/css/codepen.min.css'
                                 }
                                 tinymce.init({
                                    selector:'.mytextarea',
                                    branding: false,skin: 'fabric',
                                   content_css: [
                                     'fabric',
                                     linkURL
                                   ],
                                   toolbar_mode: 'floating',
                                   plugins: 'advlist anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars wordcount',
                                   toolbar: 'undo redo | formatselect | bold italic strikethrough forecolor backcolor blockquote | link image media | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | removeformat',
                                   height: 400,
                                    setup : function(ed) {
                                          ed.on('change', function(e) {
                                             // This will print out all your content in the tinyMce box
                                             console.log('the content add '+ed.getContent());

                                             words = $('.tox-statusbar__wordcount').text();
                                             if(words != '0 words'){
                                               // $("#mytextarea").text(ed.getContent()); 
                                                $('#instruction-error').text(""); 
                                             }else{
                                               // $("#mytextarea").text("");
                                                $('#instruction-error').text("Instruction is required"); 
                                             }

                                             // Your text from the tinyMce box will now be passed to your  text area ... 
                                             //$("#mytextarea").text(ed.getContent()); 
                                          });

                                          ed.on('keydown', function(e) {
                             
                                             words = $('.tox-statusbar__wordcount').text();

                                             console.log('keypresss2'+words)
                                             if(words != '0 words'){
                                                $('#instruction-error').text(""); 
                                             }
                                          });

                                           ed.on('init', function (e) {
                                            ed.setContent(data.instruction);
                                           $("#mytextarea").text(data.instruction); 

                                          });
                                    }
                                 });
                                 
                              $("#instructionsForm-btn").html(`<button type="submit" class="btn btn-primary update" id="btn-instruction">Update</button>`);
                              instructionForm.attr("action", formApiUrl("update-instruction")).attr("method", 'patch').attr("data-type", 'edit');
                              $('#instructionsForm-btn button').attr('data-instruction', data.id);
                              $('#instructionsForm-btn button').attr('data-language',item.id);
                             
                           }else{

                              console.log('false')
                              $("#instructionTextarea").html(`
                               <div class="mb-3">
                                 <label for="instruction"  class="col-form-label instruction" style="font-weight: 600;">Instruction:</label>
                                 <textarea class="mytextarea" id="instruction" name="instruction"></textarea>
                               </div>`)
                                 if(langCode == 1){
                                    linkURL = base_url+'assets/css/codepen-rtl.css';
                                 }else{
                                     linkURL = base_url+'assets/css/codepen.min.css'
                                 }
                                 tinymce.init({
                                    selector:'.mytextarea',
                                    branding: false,
                                    skin: 'fabric',
                                   content_css: [
                                     'fabric',
                                     linkURL
                                   ],
                                   toolbar_mode: 'floating',
                                   plugins: 'advlist anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars wordcount',
                                   toolbar: 'undo redo | formatselect | bold italic strikethrough forecolor backcolor blockquote | link image media | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | removeformat',
                                   height: 400,
                                    setup : function(ed) {
                                          ed.on('change', function(e) {
                                             //$("#mytextarea").text(ed.getContent()); 
                                             words = $('.tox-statusbar__wordcount').text();
                                             if(words != '0 words'){
                                                $("#mytextarea").text(ed.getContent()); 
                                                $('#instruction-error').text(""); 
                                             }else{
                                                $("#mytextarea").text("");
                                                $('#instruction-error').text("Instruction is required"); 
                                             }
                                          });
                                          ed.on('keypress', function(e) {
                             
                                             words = $('.tox-statusbar__wordcount').text();
                                             if(words != '0 words'){
                                                $('#instruction-error').text(""); 
                                             }
                                          });
                                 }
                              });
                                      
                              $("#instructionsForm-btn").html(`<button class="btn btn-primary add" id="btn-instruction">Add</button>`)
                              $('#instructionsForm-btn button').attr('data-language', item.id);
                              instructionForm.attr("action", formApiUrl(`add-instruction`)).attr("method", 'post').attr("data-type", 'add');
                           }
                          
                        })
                     }

                  })

               }

               else

               {

                  NioApp.Toast(message, 'error')

               }

            }).fail(()=>{

               NioApp.Toast("Error Occurred", 'error')

            }).always(()=> hideLoader())

         }

      
      $("#instructionsForm").on('submit', function(e){

         e.preventDefault();
         let formData   = new FormData(instructionForm[0]);
         $('#instruction-error').text('');
         const school_id = appModule.getCookie('school_id');

         let formDatas = {
            school_id: school_id,
            instruction: $("#mytextarea").text(),
            language_id: $('#btn-instruction').attr('data-language')
         }


         var editorContent = $("#mytextarea").text();
         console.log("con"+editorContent)

         words = $('.tox-statusbar__wordcount').text();

          if (words == '0 words')
          {
            $('#inst-label').after('<span id="instruction-error" class="invalid">Instruction is required</span>');
            return false;
          }
          else
          {
              $('#instruction-error').hide();
          }


         instructionID = $('#btn-instruction').attr('data-instruction');

         // Append instruction id if exist
         if(instructionID != '') {
            formDatas['id'] = $('#btn-instruction').attr('data-instruction');
         }
            showLoader({
                title: 'Please Wait',
               //  text: 'Saving Data'
            });


            $.ajax({
                type: instructionForm.attr('method'),
                url: instructionForm.attr('action'),
                data: formDatas,
            }).done(function({ data, errors }) {

                if (!errors) {

                    if(instructionForm.attr('data-type') == 'add') {
                        NioApp.Toast('Instruction added successfully', "success");
                    } else {
                        NioApp.Toast('Instruction updated successfully', "success");
                    }

                    console.log(instructionForm.attr('data-type'));

                    //instructionList();

                    instructionForm

                        .removeAttr("action")

                        .removeAttr("method")

                        .removeAttr("data-type");

                    //  instructionForm[0].reset();
                    //instructionModal.hide();                    

                } else {
                    NioApp.Toast("Something Went Wrong", "error");
                }

            }).catch(function(error) {

                NioApp.Toast(error, "error");

            }).always(function() {

                hideLoader();
            });

      });


      function showDetails(ele,language_id)
      {

         languageId = language_id;
         school_id = appModule.getCookie('school_id');

         $(".btn-lang").removeClass(["btn-primary","native-active"]).addClass("btn-light")

         $(ele).removeClass("btn-light").addClass(["btn-primary","native-active"])

         showLoader({
            
            title: "Please Wait",
            // text: "Fetching..."
         })

         $.ajax({

            type: "GET",

            url: formApiUrl(`get-instruction/${language_id}/${school_id}`),

         }).done(({status, message = "something went wrong!", data})=>{

         tinymce.execCommand('mceRemoveEditor', true, "instruction");

            if(ele.nextElementSibling == null)
            {
               $("#instructionsForm button").text("Save")
            }
            languageText(langCode);
            if(status)
            {console.log('true1')
              
               $("#instructionTextarea").html(`<div class="mb-3">
                     <label for="instruction"  class="col-form-label inst-label instruction" id="inst-label" style="font-weight: 600;">Instruction:</label>
                     <textarea class="mytextarea" id="instruction" name="instruction"></textarea>
                   </div> `)
                   if(langCode == 1){
                        linkURL = base_url+'assets/css/codepen-rtl.css';
                     }else{
                         linkURL = base_url+'assets/css/codepen.min.css'
                     }
                  tinymce.init({
                     selector:'.mytextarea',
                     branding: false,
                     skin: 'fabric',
                       content_css: [
                         'fabric',
                        linkURL
                       ],
                       toolbar_mode: 'floating',
                       plugins: 'advlist anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview searchreplace table template textpattern toc visualblocks visualchars wordcount',
                       toolbar: 'undo redo | formatselect | bold italic strikethrough forecolor backcolor blockquote | link image media | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | removeformat',
                       height: 400,
                     setup : function(ed) {
                           ed.on('change keypress keyup', function(e) {
                              // This will print out all your content in the tinyMce box
                             // console.log('the content updae '+ed.getContent());
                              // Your text from the tinyMce box will now be passed to your  text area ... 
                            // 
                              words = $('.tox-statusbar__wordcount').text();
                              console.log('wordsone' + words);
                              if(words != '0 words'){
                                 $("#mytextarea").text(ed.getContent()); 
                                 $('#instruction-error').text(""); 
                              }else{
                                // $("#mytextarea").text(""); 
                                 $('#instruction-error').text("Instruction is required"); 
                              }
                              
                           });

                           /*ed.on('keydown', function(e) {
                             
                              words = $('.tox-statusbar__wordcount').text();

                              console.log('keypresss1'+words)
                              if(words != '0 words'){
                                 $('#instruction-error').empty(); 
                              }
                           });*/

                            ed.on('init', function (e) {

                             ed.setContent(data.instruction);
                             $("#mytextarea").text(data.instruction); 
                           });
                     }
                  });
                  
               $("#instructionsForm-btn").html(`<button type="submit" class="btn btn-primary update" id="btn-instruction">Update</button>`);
               instructionForm.attr("action", formApiUrl("update-instruction")).attr("method", 'patch').attr("data-type", 'edit');
               $('#instructionsForm-btn button').attr('data-instruction', data.id);
               $('#instructionsForm-btn button').attr('data-language',languageId);
              
            }else{

               console.log('false1')
               $("#instructionTextarea").html(`
                <div class="mb-3">
                  <label for="instruction"  class="col-form-label " id="inst-label" style="font-weight: 600;">Instruction:</label>
                  <textarea class="mytextarea" id="instruction" name="instruction"></textarea>
                </div>`)
                   if(langCode == 1){
                        linkURL = base_url+'assets/css/codepen-rtl.css';
                     }else{
                         linkURL = base_url+'assets/css/codepen.min.css'
                     }
                  tinymce.init({
                     selector:'.mytextarea',
                     branding: false,skin: 'fabric',
                    content_css: [
                      'fabric',
                      linkURL
                    ],
                    toolbar_mode: 'floating',
                    plugins: 'advlist anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars wordcount',
                    toolbar: 'undo redo | formatselect | bold italic strikethrough forecolor backcolor blockquote | link image media | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | removeformat',
                    height: 400,
                     setup : function(ed) {
                           ed.on('change', function(e) {
                              //$("#mytextarea").text(ed.getContent()); 
                              words = $('.tox-statusbar__wordcount').text();
                              if(words != '0 words'){
                                 $("#mytextarea").text(ed.getContent()); 
                                 $('#instruction-error').text(""); 
                              }else{
                                 $("#mytextarea").text("");
                                 $('#instruction-error').text("Instruction is required"); 
                              }
                           });
                           ed.on('keypress', function(e) {
                             
                              words = $('.tox-statusbar__wordcount').text();
                              if(words != '0 words'){
                                 $('#instruction-error').text(""); 
                              }
                           });
                           
                  }
               });
                       
               $("#instructionsForm-btn").html(`<button class="btn btn-primary add" id="btn-instruction">Add</button>`)
               $('#instructionsForm-btn button').attr('data-language', languageId);
               instructionForm.attr("action", formApiUrl(`add-instruction`)).attr("method", 'post').attr("data-type", 'add');
            }
           
         }).fail(()=>{
            NioApp.Toast("Error Occurred", 'error')
         }).always(()=> hideLoader())

      }
    </script>
      </body>
</html>

