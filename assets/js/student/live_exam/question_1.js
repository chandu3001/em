$(function() {

	const elequestion = $("#assessment");
	var questionDetail = {};
	var href = location.href;
    license_id = href.match(/([^\/]*)\/*$/)[1];
	
    baseImgURL = domain_path+'assets/images/play.jpg';

	// Ajax request setup
	$.ajaxSetup({
		headers: {
			'Authorization': `Bearer ${appModule.getToken()}`
		},
		dataType: 'json'
	});

	const alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
	// load question view

	function loadQuestionView(items,details) {
		alpha = html_string = "";
		var j=i=1;
		m=0;
		totQue = items.length;
		//console.log('red'+details.reference_id);
	if(totQue >= 1){
		$('#total-available-que').val(totQue);
		media_url = details.media_url;
		$('#exam-name').html('Exam Name: '+details.exam_name);
		$('#timer-val').val(details.duration);
		$('#que-analysis').show();
	    window.localStorage.setItem("examination", details.exam_name);
		window.localStorage.setItem("total-duration1",details.duration);

 		$('input[name="reference-id"]').val(details.reference_id);
	  
		//timer begin
		function convertH2M(timeInHour){
			var timeParts = timeInHour.split(":");
			return Number(timeParts[0]) * 60 + Number(timeParts[1]);
		}

		var timeInMinutes = convertH2M(details.duration);
		var duration = timeInMinutes * 60;
		var display = document.querySelector('#timer');

	   window.localStorage.setItem("total-duration",timeInMinutes);


	  	function startTimer(duration, display) {
	        var timer = duration, minutes, seconds;
	        var interval = setInterval(function () {
	            minutes = parseInt(timer / 60, 10);
	            seconds = parseInt(timer % 60, 10);
	            minutes = minutes < 10 ? "0" + minutes : minutes;
	            seconds = seconds < 10 ? "0" + seconds : seconds;
	            //display.innerHTML = minutes + "m : " + seconds + 's';
	            $('#timer-convert').html(minutes +':'+seconds);

				function timeConvert(n) {
					var num = n;
					var hours = (num / 60);
					var rhours = Math.floor(hours);
					var minutes = (hours - rhours) * 60;
					var rminutes = Math.round(minutes);
					
					if(rhours == 0){
						$('#timer-convert').attr('data-hour',0)
						display.innerHTML = minutes + "m : " + seconds + 's';
					}else{
						$('#timer-convert').attr('data-hour',1);
						if(rhours < 10){
							rhours = "0"+rhours;
						}
						display.innerHTML = rhours + "h : " + rminutes + 'm';
					}

					if(rhours < 10){
						rhours = "0"+rhours;
					}
					$('#finish-timer-val').val(rhours + ":" + rminutes);

					return num + " minutes = " + rhours + " h" + rminutes + " m";
				}
					timeConvert(minutes);
				//console.log('t'+timeConvert(minutes));



	            if(minutes < 1){
	                $('#timer').css('color','red');
	                $('#timer').addClass('blink_me');

	            }
	           // console.log('mi is'+minutes+'sec is'+seconds)
	            if(minutes == 0 && seconds == 0){
	            	liftoff();
	            }

	            if (--timer < 0) {
	                clearInterval(interval);
	                
	            }
	        }, 1000);
	    }

	    startTimer(duration, display);

		//timer end

		jQuery.each(items, (index, item) => {
	     		option_html = que_img='';

				jQuery.each(item.options, (index, option) => {
						 
	                  option_html +='<div class="form-group">'+
	                    '<div class="form-check form-check-inline">'+
	                        '<div class="qhscrol">'+
	                            '<input class="form-check-input" type="radio" value="'+option.id+'" name="question-'+j+'" id="question-'+j+'-option'+i+'"  onclick="checkedQue(\'question-'+j+'-option'+i+'\','+j+',this);"/>'+
	                            '<label for="question-'+j+'-option'+i+'" class="form-check-label d-flex align-items-center">'+
	                                '<span class="optionIndex">'+alphabet[index]+'</span>'+
	                                '<h6>'+option.option_name+'</h6>'+
	                            '</label>'+
	                        '</div>'+
	                    '</div>'+
	                '</div>';
	                i++;         
	            });

				que_type='';

				//checking image is assigned or not if show preview in right block
				if(item.image != ''){
					
					 que_type ='image';
					 que_img +=`<input type="hidden" data-type="image" id="que-type`+j+`" data-id-hidden="`+j+`" data-src="${item.image}"/>`

	                if(j == 1 && item.image != ''){
	                    $('.que-details').empty('');
	                   	$('.que-details').append(`<div class="image-container video-btn que-image`+j+`" data-type="image" data-src="${media_url+''+item.image}" onclick="showImage(this);" >
		                            <img src="${media_url+''+item.image}"  />
		                        </div>`);
		                $('.que-details').attr("style", "display: flex !important");
		                $('.que-details').addClass('with-contents');
		                $('#assessment').removeClass('col-md-12');
	            	}

				}else if(item.video != '' ){
					console.log('this is video content')
					que_type ='video';
					que_img +=`<input type="hidden" data-type="video" id="que-type`+j+`" data-id-hidden="`+j+`" data-src="${item.video}"/>`

					if(j == 1 && item.video != ''){
	                    $('.que-details').empty('');
	                   	$('.que-details').append(`<div class="image-container video-btn que-image`+j+`" data-type="video" data-src="${media_url+''+item.video}" onclick="showImage(this);" >
		                     
		                     <img src="${baseImgURL}"  />

		                </div>`);
		                $('.que-details').attr("style", "display: flex !important");
		                $('.que-details').addClass('with-contents');
		                $('#assessment').removeClass('col-md-12');
	            	}

				}else{
					que_img +=`<input type="hidden" data-type="text"  id="que-type`+j+`" data-id-hidden="`+j+`" data-src=""/>`
				}

				if (j != 1) {  
					dispClass = 'display:none'; 
					prevBtn = ''; 
                }else{
                	dispClass = '';
                	prevBtn = 'display:none'; 
                	console.log(j)
                	
                } 
                
  				if(item.eliminatory_question == '1'){
  					console.log("question-"+j+"="+item.eliminatory_question);
  					console.log('#elementory-que'+m);
					$('#elementory-que'+m).css('display','block');
					elemQue = "display:block";

                }else{
                	//console.log("Not elmentray question-"+j+"="+item.eliminatory_question);
					
					$('#elementory-que'+m).hide();

					elemQue = "display:none";

                }
              
				
				$("#assessment").append(`<div class="col-md-12 eval_tab" id="eval_quest`+j+`" style="`+dispClass+`">
					
					<span id="elementory-que`+m+`" class="elementory-question" style="`+elemQue+`">Warning : This is an Eliminatory Question. An incorrect answer will result in failure of the exam.</span>
					
					<form method="post" class="quizForm_`+j+`" id="quiz" name="quizForm">
								<fieldset class="ques-list question-step question-step-`+j+ ` ques-list " id="question-step-`+j+`">
	                            <ul>
	                                <li id="question-`+j+`">
	                                    <div class="d-flex align-items-center justify-content-between">
	                                        <p class="text-gray font-14 text-question">
	                                            <span>Question Marks : ${item.marks} </span>
	                                        </p>
	                                        <div class="rounded-sm border border-gray200 p-15 text-gray">`+j+`/`+totQue+`</div>
	                                    </div>

	                                    <div class="qhscrol">
	                                        <p class="voice-over-`+j+`">${item.question}</p>

	                                    </div>
	                                </li>
	                            </ul>
	                            <ul>
	                                <li> ${option_html} </li>
	                            </ul>
	                        </fieldset>
	                       
	                        <input type="hidden" name="answer-`+j+`"  value="" />
	                        <input type="hidden" name="selected-option-`+j+`"  value="" />
	                		<input type="hidden" name="question-pool-id`+j+`" value="`+item.id+`"/>
		      				
		      				<button id="play"  class="VOICE btn btn-sm btn-warning mr-20" data-voice="`+j+`"  type="submit">Play Audio</button>
		      				
	                        <button type="button" style="`+prevBtn+`" data-pid="`+j+`" class="previous1 btn btn-sm btn-primary mr-20 =" `+prevBtn+` data-btn-val="prev">Previous</button>
	                        <button type="button" data-id="`+j+`" data-btn-val="next" class="next1 btn btn-sm btn-primary mr-auto pp`+j+`">Next</button>
	                        <button type="submit" class="btn btn-sm btn-danger finish" data-btn-val="finish" style="float:right;">Finish</button>
 								
                
	                        </div></form></div>${que_img}`);
					j++;m++;i =1;
			});


			/* let speech = new SpeechSynthesisUtterance();

			// Set Speech Language
			speech.lang = "en";
			$('.VOICE').click(function(e){
			event.preventDefault();

			var voiceVal = $(this).attr("data-voice");

			speech.text = $('.voice-over-'+voiceVal).text();

			console.log(speech.text)				
			 //speech.text = document.querySelector("textarea").value;

			// Start Speaking
			window.speechSynthesis.speak(speech);

			});*/


			var synth = window.speechSynthesis;
			var langCode = localStorage.getItem("sel-language-code");
			function speak(speech1){
			  if(speech1 !== ''){
			    var utterThis = new SpeechSynthesisUtterance(speech1);
			   	utterThis.lang = langCode;

			    synth.speak(utterThis);
			  }
			}

			$('.VOICE').click(function(e){
			    e.preventDefault();
				var voiceVal = $(this).attr("data-voice");	
				speech1 = $('.voice-over-'+voiceVal).text();
			    speak(speech1);
			});

			//append to question preview block bottom
			$('#qUnAnsweredCount').html(totQue);

			breakHtml='';
			for(k=1;k<=totQue;k++){
	                
	          if(k % 3 == 0) {
	              breakHtml =  '<br><br>';
	          }
	          if(totQue < 28){
	          	$('#que-analysis').css('height',155);
	          }
				$('.options').append('<div class="user-avatar sq not-done" style="cursor: pointer;"  id="question-nav-'+k+'" onclick="questionIs('+k+')"><span>'+k+'</span></div>&nbsp;'+breakHtml+'');
			}
			//end

			$('.next1').click(function(e){
	            event.preventDefault();
	         
	            nval = $(this).attr("data-id");
	            $('#eval_quest' + nval).css("display", "none");
             
                //submitQuizForm(".quizForm_"+nval,nval);
                
              //end
	            nval++;
	            if(nval == totQue){
	                $('.next1').hide();
	            }

                $('#eval_quest' + nval).css("display", "block");
	          //  $(this).attr('data-id', nval);
	         
	              for(var i = 1; i <= totQue; i++) {
	                if(i > 1){
	            	$('#eval_quest1').css("display", "none");
	                    $('.previous1').removeClass('disabled');
	                }
	                if(i == nval){
	                     $('#question-step-'+nval).show();
	                }else{
	                    $('.question-step-'+i).hide();
	                }
	              }

	              	//checking urrent que type 
	              	que_val= $('#que-type'+nval).attr('data-id-hidden');
	            	//console.log('nxt val'+nval+'hid nval'+que_val)
	              	 if(nval == que_val){
	              	 	get_src = $('#que-type'+que_val).attr('data-src');
	              	 	get_type = $('#que-type'+que_val).attr('data-type');
 						 //console.log('next clicksrc'+get_src+'next click'+que_val)
 						 $('.que-details').empty('');
	              	 	/*if(get_src != ''){
	              	 		//console.log('this is containg img')
	              	 		
	              	 		$('.que-details').append(`<div class="image-container video-btn" data-type="image" data-src="https://em.technoiq.in/development/backend${get_src}" onclick="showImage(this);" >
                            <img src="https://em.technoiq.in/development/backend${get_src}"  />
                        	</div>`);
			                $('.que-details').attr("style", "display: flex !important");
			                $('.que-details').addClass('with-contents');
			                $('#assessment').removeClass('col-md-12');
	              	 	}*/
	              	 	if(get_type == 'image'){
                    
		                        $('.que-details').empty('');
		                        $('.que-details').append(`<div class="image-container video-btn que-image`+que_val+`" data-type="image" data-src="${media_url+''+get_src}" onclick="showImage(this);" >
		                                    <img src="${media_url+''+get_src}"  />
		                                </div>`);
		                        $('.que-details').attr("style", "display: flex !important");
		                        $('.que-details').addClass('with-contents');
		                        $('#assessment').removeClass('col-md-12');
		                

		                }else if(get_type == 'video' ){
		                
		                        $('.que-details').empty('');
		                        $('.que-details').append(`<div class="image-container video-btn que-image`+que_val+`" data-type="video" data-src="${media_url+''+get_src}" onclick="showImage(this);" >
		                             <img src="${baseImgURL}"  />
		                        </div>`);
		                        $('.que-details').attr("style", "display: flex !important");
		                        $('.que-details').addClass('with-contents');
		                        $('#assessment').removeClass('col-md-12');
		                }
	              	 	else{
	              	 	   //console.log('this is containg text')
			               // question_type ='text';
			                $('.que-details').attr("style", "display: none !important");
			                $('#assessment').addClass('col-md-12');
			            }
	              	 }
	              //end
	        });

	        $('.previous1').click(function(e){
	            event.preventDefault();
	            nval = $(this).attr("data-pid");
	            //console.log('active'+nval)
	            $('#eval_quest' + nval).css("display", "none");

	            if(nval >1){
	                nval--;
	            }
	            $('#eval_quest' + nval).css("display", "block");

	            for(var i = 1; i <= totQue; i++) {
	              if(i>=1){
	                if(i == nval){
	                     $('#question-step-'+nval).show();
	                }else{
	                    $('.question-step-'+i).hide();
	                }
	              }
	            }

	            $('.next1').show();
	           // $('.next1').attr('data-id', nval);

	            //checking urrent que type 
	              	que_val= $('#que-type'+nval).attr('data-id-hidden');
	           	    get_type = $('#que-type'+que_val).attr('data-type');

	              	 if(nval == que_val){
	              	 	get_src = $('#que-type'+que_val).attr('data-src');
 						// console.log('next clicksrc'+get_src+'next click'+que_val)

	              	 	if(get_type == 'image'){
                    
		                        $('.que-details').empty('');
		                        $('.que-details').append(`<div class="image-container video-btn que-image`+que_val+`" data-type="image" data-src="${media_url+''+get_src}" onclick="showImage(this);" >
		                                    <img src="${media_url+''+get_src}"  />
		                                </div>`);
		                        $('.que-details').attr("style", "display: flex !important");
		                        $('.que-details').addClass('with-contents');
		                        $('#assessment').removeClass('col-md-12');
		                
		                }else if(get_type == 'video' ){
		                
		                        $('.que-details').empty('');
		                        $('.que-details').append(`<div class="image-container video-btn que-image`+que_val+`" data-type="video" data-src="${media_url+''+get_src}" onclick="showImage(this);" >
		                             <img src="${baseImgURL}"  />
		                        </div>`);
		                        $('.que-details').attr("style", "display: flex !important");
		                        $('.que-details').addClass('with-contents');
		                        $('#assessment').removeClass('col-md-12');
		                }else{
	              	 	  // console.log('this is containg text')
			               // question_type ='text';
			                $('.que-details').attr("style", "display: none !important");
			                $('#assessment').addClass('col-md-12');
			            }
	              	 }
	              //end
	        });

	        $('.finish').click(function(e){
            	event.preventDefault();
                
	            total_duration        =  window.localStorage.getItem("total-duration");
	            converted_time        =  window.localStorage.getItem("converted-timer");
	           
	            var duration = total_duration * 60;

	            function startTimer(duration) {
	                var timer = duration, minutes, seconds;
	                    minutes = parseInt(timer / 60, 10);
	                    seconds = parseInt(timer % 60, 10);
	                    minutes = minutes < 10 ? "0" + minutes : minutes;
	                    seconds = seconds < 10 ? "0" + seconds : seconds;
	                    totalDuration = minutes +':'+seconds;
	                    //console.log('splited time'+minutes +':'+seconds)
	                    return totalDuration;
	            }
				var today = new Date();
				var month = today.getMonth()+1;
				var day = today.getDate();

				var output = today.getFullYear() + '/' +
				    (month<10 ? '0' : '') + month + '/' +
				    (day<10 ? '0' : '') + day;

	            var totalDurationIs =   startTimer(duration);


		 	var valuestart = totalDurationIs;
        	var valuestop = $('#timer-convert').text();


            var dateObj = new Date();
            var month = dateObj.getUTCMonth() + 1; //months from 1-12
            var day = dateObj.getUTCDate();
            var year = dateObj.getUTCFullYear();
            newdate = year + "-" + month + "-" + day;

            var isHrExist = $("#timer-convert").attr("data-hour");
            if(isHrExist == 1){
				var date1 = new Date(newdate+' '+$('#timer-val').val()+':00');
	            var date2 = new Date(newdate+' '+$('#finish-timer-val').val()+':00');
            }else{
				var date1 = new Date(newdate+' 00:'+valuestart);
            	var date2 = new Date(newdate+' 00:'+valuestop);
            }
		   	
            var diffInSeconds = Math.abs(date1 - date2) / 1000;
            var days = Math.floor(diffInSeconds / 60 / 60 / 24);
            var hours1 = Math.floor(diffInSeconds / 60 / 60 % 24);
            var minutes1 = Math.floor(diffInSeconds / 60 % 60);
            var seconds1 = Math.floor(diffInSeconds % 60);
            var milliseconds = Math.round((diffInSeconds - Math.floor(diffInSeconds)) * 1000);

          	hourIs = ('0' + hours1 + 'h').slice(-2);
			secondsIs = ('0' + seconds1 + 's').slice(-2);
			if (('0' + minutes1).slice(-2) > '00') {
			minutesIs = ('0' + minutes1).slice(-2) + 'm';
			} else {
			minutesIs = '00'+ 'm';
			}

			var examDuration = '';
			if(isHrExist == 1){
				examDuration =  hourIs + ':' + minutesIs;
            }else{
				examDuration =  minutesIs + ':' + secondsIs;

            }


			//console.log('completed'+examDuration);return false;
                 total = $('#total-available-que').val();
                 attended = $('#qAnsweredCount').html();
                 notattended = $('#qUnAnsweredCount').html();
                var str= '<span class="que-info" id="que-info">Total Questions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '+ total + '</span><br>'+'<span class="que-info" id="que-info1" >Attended Questions &nbsp;&nbsp; : '+ attended + '</span><br><span class="que-info">'+'Unattended Questions : '+ notattended+'</span>';
                 Swal.fire({
                               title: 'Once you submit, you will no longer be able to change your answers for this attempt.',
                                html: str ,

                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#d33',
                              cancelButtonColor: '#3085d6',
                              confirmButtonText: 'End Exam'
                            }).then((result) => {
                              if (result.isConfirmed) {

                              	var href = location.href;
							    var resUrl = href.split("/");
								var pos = resUrl.indexOf('start');
								var license_id 	   = resUrl[pos+1];
								var sub_license_id = resUrl[pos+2];
	    						reference_id = $('input[name="reference-id"]').val();

							    let formDatas = {
								          student_id: parseInt($.cookie("student_id")),
								          license_id: parseInt(license_id),
								          sub_license_id: parseInt(sub_license_id),
								          //duration: minutesIs + ':' + secondsIs,
								          duration: examDuration,
								          reference_id:reference_id
							    }

							    dataToSend = JSON.stringify( formDatas );

							        $.ajax({
											contentType: 'application/json; charset=utf-8',
											dataType: 'json',            
											type: "post",
											url: formApiUrl(`result`),
											data: dataToSend,
							            }).done(function (response) {
											if (response.status == true) {
											console.log('finished success');
												timer_convert = $('#timer-convert').html();
												var correct_ans = response.data.correct_answers;
												var wrong_ans = response.data.wrong_answers;
												var total_que = response.data.total_question;
												var total_marks = response.data.total_marks;
												var percentage = response.data.percentage;
												var obtained_marks = response.data.obtained_marks;
												var duration = response.data.duration;
	    										console.log('my diration is'+duration)
	    										window.localStorage.setItem("attended-que", attended);
	    										window.localStorage.setItem("correct-ans", correct_ans);
	    										window.localStorage.setItem("wrong-ans", wrong_ans);
	    										window.localStorage.setItem("questions", total_que);
	    										window.localStorage.setItem("total", total_marks);
	    										window.localStorage.setItem("percentage", percentage);
	    										window.localStorage.setItem("marks", obtained_marks);
	    										window.localStorage.setItem("duration", duration);
	    										
	    										window.localStorage.setItem("attended-duration", duration);

	    										window.localStorage.setItem("converted-timer", timer_convert);

												if(response.data.result == 'pass'){
												    window.location.href = base_url + "student/live_exam/passed";
												}else{
													window.location.href = base_url + "student/live_exam/failed";
												}
											} else if (response.status == false) {
												console.log('err')
												NioApp.Toast("Error Occured", "error");
											} else {
												NioApp.Toast("Invalid response status", "warning");
											}
										}).fail(function (error) {
											NioApp.Toast("Error Occured", "error");
										}).always(function () {
											$("#loader").fadeOut();
										});


                                //
                              }
                        })
        	});

		}else{
			elequestion.html(`<h3 style="text-align:center;"> No exam Available</h3>`);
			$('#que-analysis').attr("style", "display: none !important");
		}
	}
	
	// Get question list
	window.getquestions = async function(option = {}) {
	
		const school_id = await appModule.getCookie('school_id');
		var href = location.href;
		var resUrl = href.split("/");
		var pos = resUrl.indexOf('start');
		var license_id 	   = resUrl[pos+1];
		var sub_license_id = resUrl[pos+2];

		day     = new Date().toLocaleString();
        dateAr  = day.split(' ')[0].split('/');
        time    = day.split(' ')[1]
        var newSysDate = dateAr[2].replace(/,/g, "") + '-'+dateAr[0].replace(/,/g, "")+ '-'+dateAr[1].replace(/,/g, "") + ' '+ time;
	   // alert(license_id+sub_license_id)
		let formDatas = {
                  school_id: school_id,
                  license_id: parseInt(license_id),
                  sub_license_id: parseInt(sub_license_id),
		          student_id: parseInt($.cookie("student_id")),
		          exam_type : 2,
		          language_id :  localStorage.getItem("sel-language-id"),
		          date_time :  moment().format()

               }

		$.ajax({
			type: "post",
			url: formApiUrl(`get-questions`),
			data: formDatas,
			beforeSend: function () {
				$("#loader").fadeIn();
			},
		}).done(function (response) {
			if (response.status == true) {
			
				loadQuestionView(response.data.data,response.data);
			} else if (response.status == false) {
				
				console.log('false')
				NioApp.Toast("Error Occured", "error");
			} else {
				NioApp.Toast("Invalid response status", "warning");
			}
		}).fail(function (error) {
			NioApp.Toast("Error Occured", "error");
		}).always(function () {
			$("#loader").fadeOut();
		});
	}

	function submitQuizForm(quizForm,nval) {

        var href = location.href;
        license_id = href.match(/([^\/]*)\/*$/)[1];

        option = $('input[name="selected-option-'+nval+'"]').val();
        question_pool_id = $('input[name="question-pool-id'+nval+'"]').val();
        reference_id = $('input[name="reference-id"]').val();

        day     = new Date().toLocaleString();
        dateAr  = day.split(' ')[0].split('/');
        time    = day.split(' ')[1]
        var newSysDate = dateAr[2].replace(/,/g, "") + '-'+dateAr[0].replace(/,/g, "")+ '-'+dateAr[1].replace(/,/g, "") + ' '+ time;

       let formDatas = {
	          student_id: parseInt($.cookie("student_id")),
	          licence_id: parseInt(license_id),
	          option_id: parseInt(option),
	          exam_type : 2,
	          question_pool_id : parseInt(question_pool_id),
	          reference_id : parseInt(reference_id),
	          date_time :  moment().format()

        }

        dataToSend = JSON.stringify( formDatas );

        $.ajax({
				contentType: 'application/json; charset=utf-8',
				dataType: 'json',            
				type: "post",
				url: formApiUrl(`save-answer`),
				data: dataToSend,
            }).done(function (response) {
				if (response.status == true) {
				console.log('saved success')
				} else if (response.status == false) {
					console.log('err')
					NioApp.Toast("Error Occured", "error");
				} else {
					NioApp.Toast("Invalid response status", "warning");
				}
			}).fail(function (error) {
				NioApp.Toast("Error Occured", "error");
			}).always(function () {
				$("#loader").fadeOut();
			});
    }

    //timer end

	function liftoff(){
        console.log('ENDED timer');

	            total_duration        =  window.localStorage.getItem("total-duration");
	            converted_time        =  window.localStorage.getItem("converted-timer");
	           
	            var duration = total_duration * 60;

	            function startTimer(duration) {
	                var timer = duration, minutes, seconds;
	                    minutes = parseInt(timer / 60, 10);
	                    seconds = parseInt(timer % 60, 10);
	                    minutes = minutes < 10 ? "0" + minutes : minutes;
	                    seconds = seconds < 10 ? "0" + seconds : seconds;
	                    totalDuration = minutes +':'+seconds;
	                    //console.log('splited time'+minutes +':'+seconds)
	                    return totalDuration;
	            }
				var today = new Date();
				var month = today.getMonth()+1;
				var day = today.getDate();

				var output = today.getFullYear() + '/' +
				    (month<10 ? '0' : '') + month + '/' +
				    (day<10 ? '0' : '') + day;

	            var totalDurationIs =   startTimer(duration);


		 	var valuestart = totalDurationIs;
        	var valuestop = $('#timer-convert').text();


            var dateObj = new Date();
            var month = dateObj.getUTCMonth() + 1; //months from 1-12
            var day = dateObj.getUTCDate();
            var year = dateObj.getUTCFullYear();
            newdate = year + "-" + month + "-" + day;

            var isHrExist = $("#timer-convert").attr("data-hour");
            if(isHrExist == 1){
				var date1 = new Date(newdate+' '+$('#timer-val').val()+':00');
	            var date2 = new Date(newdate+' '+$('#finish-timer-val').val()+':00');
            }else{
				var date1 = new Date(newdate+' 00:'+valuestart);
            	var date2 = new Date(newdate+' 00:'+valuestop);
            }
		   	
            var diffInSeconds = Math.abs(date1 - date2) / 1000;
            var days = Math.floor(diffInSeconds / 60 / 60 / 24);
            var hours1 = Math.floor(diffInSeconds / 60 / 60 % 24);
            var minutes1 = Math.floor(diffInSeconds / 60 % 60);
            var seconds1 = Math.floor(diffInSeconds % 60);
            var milliseconds = Math.round((diffInSeconds - Math.floor(diffInSeconds)) * 1000);

          	hourIs = ('0' + hours1 + 'h').slice(-2);
			secondsIs = ('0' + seconds1 + 's').slice(-2);
			if (('0' + minutes1).slice(-2) > '00') {
			minutesIs = ('0' + minutes1).slice(-2) + 'm';
			} else {
			minutesIs = '00'+ 'm';
			}

			var examDuration = '';
			if(isHrExist == 1){
				examDuration =  hourIs + ':' + minutesIs;
            }else{
				examDuration =  minutesIs + ':' + secondsIs;
            }

	  	var href = location.href;
	    var resUrl = href.split("/");
		var pos = resUrl.indexOf('start');
		var license_id 	   = resUrl[pos+1];
		var sub_license_id = resUrl[pos+2];
	    reference_id = $('input[name="reference-id"]').val();

	    let formDatas = {
          student_id: parseInt($.cookie("student_id")),
          license_id: parseInt(license_id),
          sub_license_id: parseInt(sub_license_id),
		  duration: examDuration,
          reference_id : parseInt(reference_id)
	    }

	    dataToSend = JSON.stringify( formDatas );
	     attended = $('#qAnsweredCount').html();
         notattended = $('#qUnAnsweredCount').html();
	        $.ajax({
					contentType: 'application/json; charset=utf-8',
					dataType: 'json',            
					type: "post",
					url: formApiUrl(`result`),
					data: dataToSend,
	            }).done(function (response) {
					if (response.status == true) {
						console.log('finished success');
						
						timer_convert 	= $('#timer-convert').html();

						var correct_ans = response.data.correct_answers;
						var wrong_ans 	= response.data.wrong_answers;
						var total_que 	= response.data.total_question;
						var total_marks = response.data.total_marks;
						var percentage 	= response.data.percentage;
						var obtained_marks = response.data.obtained_marks;
						var duration 	= response.data.duration;
						percentageVal 	= parseFloat(percentage).toFixed(2)

						window.localStorage.setItem("correct-ans", correct_ans);
						window.localStorage.setItem("wrong-ans", wrong_ans);
						window.localStorage.setItem("questions", total_que);
						window.localStorage.setItem("total", total_marks);
						window.localStorage.setItem("percentage", percentageVal);
						window.localStorage.setItem("marks", obtained_marks);
						window.localStorage.setItem("duration", duration);
						window.localStorage.setItem("converted-timer", timer_convert);
	    				window.localStorage.setItem("attended-que", attended);
	    			   window.localStorage.setItem("attended-duration", duration);

						if(response.data.result == 'pass'){
						    window.location.href = base_url + "student/live_exam/passed";
						}else{
							window.location.href = base_url + "student/live_exam/failed";
						}
					} else if (response.status == false) {
						console.log('err')
						NioApp.Toast("Error Occured", "error");
					} else {
						NioApp.Toast("Invalid response status", "warning");
					}
				}).fail(function (error) {
					NioApp.Toast("Error Occured", "error");
				}).always(function () {
					$("#loader").fadeOut();
				});
			}
	});
