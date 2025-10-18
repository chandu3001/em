<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png');?>">
    <!-- Page Title  -->
    <title>Exam Module</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashlite.css?ver=3.0.0');?>">
    <link id="skin-default" rel="stylesheet" href="<?php echo base_url('assets/css/theme.css?ver=3.0.0');?>">
    <script>
        const base_url = "<?php echo base_url()?>";
        const domain_name = "<?php echo $this->config->item('domain_name')?>";
        const domain_path = "<?php echo $this->config->item('domain_path')?>";
        const api_base_url = "<?php echo $this->config->item('api_base_url')?>";
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div id="preloader">
       <div id="status-loader">&nbsp;
          <div class="duo duo1" >
             <div class="dotload dot-a" style="background:#ffc000;"></div>
             <div class="dotload dot-b" style="background:#73913c;" ></div>
          </div>
          <div class="duo duo2">
             <div class="dotload dot-a" style="background:#f9474e;"></div>
             <div class="dotload dot-b" style="background:#ffc000;"></div>
          </div>
       </div>
    </div>


     <div id="preloader2" style="display: none;">
       <div id="status-loader2">&nbsp;
          <div class="duo duo1" >
             <div class="dotload dot-a" style="background:#ffc000;"></div>
             <div class="dotload dot-b" style="background:#73913c;" ></div>
          </div>
          <div class="duo duo2">
             <div class="dotload dot-a" style="background:#f9474e;"></div>
             <div class="dotload dot-b" style="background:#ffc000;"></div>
          </div>
       </div>
    </div>

    <style>
        #scrollbar::-webkit-scrollbar {
            width: 3px;
        }
        #scrollbar::-webkit-scrollbar-thumb {
        background: gray; 
        }
    </style>
     <style type="text/css">

          #preloader2 {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fff;
            z-index: 5555;
        }
        #status-loader2 {
            top: 22%;
            position: relative;
            width: 80px;
            margin: 100px auto;
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fff;
            z-index: 5555;
        }
        #status-loader {
            top: 22%;
            position: relative;
            width: 80px;
            margin: 100px auto;
        }

        .duo {
            height: 20px;
            width: 50px;
            background: hsla(0, 0%, 0%, 0.0);
            position: absolute;
  
        }

        .duo, .dotload {
            animation-duration: 0.8s;
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
        }

        .duo1 {
            left: 0;
        }

        .duo2 {
            left: 30px
        }


        .dotload {
            width: 20px;
            height: 20px;
            border-radius: 10px;
            background: #333;
            position: absolute;
        }

        .dot-a {
            left: 0px;  
        }

        .dot-b {
            right: 0px;
        }


        @keyframes spin {
            0% { transform: rotate(0deg) }
            50% { transform: rotate(180deg) }
            100% { transform: rotate(180deg) }
        }

        @keyframes onOff {
            0% { opacity: 0; }
            49% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 1; }
        }

        .duo1 {
            animation-name: spin;
        }

        .duo2 {
           animation-name: spin;
           animation-direction: reverse;
        }

        .duo2 .dot-b {
           animation-name: onOff;
        }

        .duo1 .dot-a {
            opacity: 0;
            animation-name: onOff;
            animation-direction: reverse;
         }

    </style>

    <script>
        var existingLangCode = localStorage.getItem('language-type');
        var langCode = existingLangCode ? existingLangCode : 1;
   
        $( window ).on( 'load', function () { // makes sure the whole site is loaded 
            languageText(langCode);
            if(langCode == 2){
                $("head").append('<link rel="stylesheet" href="<?php echo base_url("assets/css/dashlite.rtl.css");?>">" type="text/css" />');
                $('body').addClass('has-rtl');
                $("html").children().css("direction","rtl");
                $( '#status' ).delay( 3500 ).fadeOut( 'slow' ); // will first fade out the loading animation 
                $( '#preloader' ).delay( 3500 ).fadeOut( 'slow' ); // will fade out the white DIV that covers the website. 
                $( 'body' ).delay( 100 ).css( {
                    'overflow': 'visible'
                } );
            }else{
                $('body').removeClass('has-rtl');
                $("html").children().css("direction","ltr");
               // $('head').append('<link rel="stylesheet" href="<?php //echo base_url("assets/css/dashlite.css?ver=3.0.0");?>">');
                $( '#status' ).delay( 350 ).fadeOut( 'slow' ); // will first fade out the loading animation 
                $( '#preloader' ).delay( 350 ).fadeOut( 'slow' ); // will fade out the white DIV that covers the website. 
                $( 'body' ).delay( 350 ).css( {
                'overflow': 'visible'
                } );
            }
        } )
    </script>

</head>
