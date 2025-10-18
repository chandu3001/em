

 function languageText(langCode) {
    console.log("one"+langCode);
    //setting page url
      /* $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null) {
           return null;
        }
        return decodeURI(results[1]) || 0;
    }*/
    //enlangCode = localStorage.getItem('language-type');

    if (langCode == 2) {
        arabicFlag = base_url+'assets/images/arabic.png';
        $('.lang-flag img').attr('src',arabicFlag);
         arabicCss = base_url+'assets/css/dashlite.rtl.css';
         $('head').append(`link[href="${arabicCss}"]`);
                $('body').addClass('has-rtl');
                $("html").children().css("direction","rtl");
                //$( '#status' ).delay( 1350 ).fadeOut( 'slow' ); // will first fade out the loading animation 
                //$( '#preloader' ).delay( 1500 ).fadeOut( 'slow' ); // will fade out the white DIV that covers the website. 
               /* $( 'body' ).delay( 50 ).css( {
                    'overflow': 'visible'
                } );*/
               // const data = await getArabic()
                $.ajax({
                type: "GET",

                url: api_base_url + "get-lang",

                headers: {
                Authorization: $.cookie("access_token"),
                },
                }).done(({ status, message, data }) => {
                if (status) {

                $(".first-name").text(data["School Admin"]["Manage Student"]["First Name"]);
                $(".sec-name").text(data["School Admin"]["Manage Student"]["Second Name"]);
                $(".email").text(data["School Admin"]["Manage Student"]["Email ID"]);
                $(".mobile").text(data["School Admin"]["Manage Student"]["Mobile Number"]);
                $(".dob").text(data["School Admin"]["Manage Student"]["DOB"]);
                $(".gender,#select2-gender-container .select2-selection__placeholder").text(data["School Admin"]["Manage Student"]["Gender"]);
                $(".city").text(data["School Admin"]["Manage Student"]["City"]);
                $(".id-type").text(data["School Admin"]["Manage Student"]["ID Type"]);
                $(".id-number").text(data["School Admin"]["Manage Student"]["ID Number"]);
                $(".license-type,#select2-license_filter-container .select2-selection__placeholder").text(data["School Admin"]["Manage Student"]["License Type"]);
                $(".sub-name,#select2-sub-license-filter-container .select2-selection__placeholder").text(data["School Admin"]["Manage Student"]["Sub Licence Type"]);
                $(".level").text(data["School Admin"]["Manage Student"]["Level"]);
                $(".plans").text(data["School Admin"]["Manage Student"]["Plans"]);
                $(".username").text(data["School Admin"]["Manage Student"]["Username"]);
                $(".addon-info").text(data["School Admin"]["Manage Student"]["Additional information"]);
                $(".exam-title").text(data["School Admin"]["Examination"]["Exam Name"]);
                $(".result,#select2-result-container .select2-selection__placeholder").text(data["School Admin"]["Manage Student"]["Result"]);
                $("#select2-sort_by-container .select2-selection__placeholder").text(data["School Admin"]["Manage Student"]["Sort By"]);
                $(".status-label,#select2-Status-container .select2-selection__placeholder,#select2-result-t7-container .select2-selection__placeholder").text(data["School Admin"]["Authenticator"]["Status"]);
                $(".action").text(data["School Admin"]["Manage Student"]["Action"]);
                $(".slno").text(data["School Admin"]["Manage Student"]["Sl.No"]);
                $(".student-title,.student").text(data["School Admin"]["Manage Student"]["Student"]);
                $("#select2-license-filter-container .select2-selection__placeholder").text(data["School Admin"]["Manage Student"]["License Type"]);
                $(".marks").text(data["School Admin"]["Question Pool"]["Marks"]);
                $(".correct").text(data["School Admin"]["Question Pool"]["Correct"]);
                $("#select2-difficulty_level-container .select2-selection__placeholder").text(data["School Admin"]["Question Pool"]["Difficulty Level"]);
                $(".cancel").text(data["School Admin"]["Examination"]["Cancel"]);
                $(".tot-questions").text(data["School Admin"]["Question Pool"]["Total Questions"]);
                $(".tot-stud").text(data["School Admin"]["Manage Student"]["Total Students"]);
                $(".pass").text(data["School Admin"]["Manage Student"]["Pass"]);
                $(".no-exam-title").text(data["School Admin"]["Manage Student"]["No Examination Result Available"]);
                $(".sublicensename").text(data["School Admin"]["Settings"]["Sub license name"]);
                $(".license-name").text(data["School Admin"]["Settings"]["License name"]);
                $(".exam").text(data["School Admin"]["Dashboard"]["Exam"]);
                $(".password").text(data["School Admin"]["Manage Student"]["Password"]);
                $(".view-detail").text(data["School Admin"]["Manage Student"]["View Details"]);
                $(".active-btn").text(data["School Admin"]["Settings"]["Active"]);
                $(".inactive-btn").text(data["School Admin"]["Settings"]["Inactive"]);
                $('.exam-tab').text(data['School Admin']['Manage Student']['Examination']);
                $('.reports').text(data['School Admin']['Settings']['Reports']);
                $('.settings').text(data['School Admin']['Settings']['Settings']);
                $('.instruction').text(data['School Admin']['Settings']['Instruction']);
                $('.dtitle').text(data['School Admin']['Dashboard']['Dashboard']);
                $('#tmenu').text(data['School Admin']['Dashboard']['Menu']);
                $('.status-label').text(data['School Admin']['Authenticator']['Status']);
                $('#sub-license-selectbox,#select2-sub_license_filter-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sub Licence Type']);
                $('#select2-sort_by_exam-container .select2-selection__placeholder,#select2-sort-by-stud-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('#select2-sort-by-container,#select2-sortBy-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('#select2-stat-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('#select2-license-filter-container .select2-selection__placeholder,#select2-license_filters-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['License Type']);
                $('#tover').text(data['School Admin']['Dashboard']['Overview']);
               $('.ftitle').text(data['School Admin']['Dashboard']['Families']);
               $('.schoolna-title,.school-name').text(data['School Admin']['Dashboard']['School Name']);
               $('#attend-title').text(data['School Admin']['Dashboard']['Attended']);
               $('.tpass').text(data['School Admin']['Dashboard']['Passed']);
               $('.failed-title').text(data['School Admin']['Dashboard']['Failed']);
               $('.apply-btn').text(data['School Admin']['Manage Student']['Apply']);
               $('select option:contains("Select All")').text(data['School Admin']['Manage Student']['Select All']);
               $('select option:contains("Descending")').text(data['School Admin']['Manage Student']['Descending']);
               $('select option:contains("Ascending")').text(data['School Admin']['Manage Student']['Ascending']);
               $('.back-btn,.back--btn').text(data['School Admin']['Manage Student']['Back']);
               $('.general-tab').text(data['School Admin']['Manage Student']['General Details']);
               $('select option:contains("Pass")').text(data['School Admin']['Manage Student']['Pass']);
               $('select option:contains("Fail")').text(data['School Admin']['Manage Student']['Fail']);

               $('label[for="first-name"],.first-name').text(data['School Admin']['Manage Student']['First Name']);
               $('label[for="second-name"]').text(data['School Admin']['Manage Student']['Second Name']);
               $('label[for="email"],.email').text(data['School Admin']['Manage Student']['Email ID']);
               $('label[for="mobile-number"]').text(data['School Admin']['Manage Student']['Mobile Number']);
               $('label[for="dob"]').text(data['School Admin']['Manage Student']['DOB']);
               $('label[for="gender"]').text(data['School Admin']['Manage Student']['Gender']);
               $('label[for="city"],#select2-city-filter-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['City']);
               $('label[for="id-type"]').text(data['School Admin']['Manage Student']['ID Type']);
               $('label[for="id-number"]').text(data['School Admin']['Manage Student']['ID Number']);
               $('label[for="userna"]').text(data['School Admin']['Manage Student']['Username']);
               $('.password').text(data['School Admin']['Manage Student']['Password']);
               $('label[for="confirm-password"]').text(data['School Admin']['Manage Student']['Confirm Password']);
               $('.license-type').text(data['School Admin']['Manage Student']['License Type']);
               $('.sub-name').text(data['School Admin']['Manage Student']['Sub Licence Type']);
               $('.show-label').text(data['School Admin']['Manage Student']['Show']);
               $('select option:contains("Active")').text(data['School Admin']['Settings']['Active']);
               $('select option:contains("Inactive")').text(data['School Admin']['Settings']['Inactive']);
               $('.exam-criteria').text(data['School Admin']['Settings']['Exam Criteria']);
               $('.clone-que').text(data['Super Admin']['Manage School']['Clone Question Pool']);
               $('.clone').text(data['Super Admin']['Manage School']['Clone']);
               $('.reg-no').text(data['Super Admin']['Manage School']['Register of Commerce Number']);
               $('.tot-no-stud').text(data['Super Admin']['Manage School']['Total Number of Students']);
               $('.tot-no-license').text(data['Super Admin']['Manage School']['Total Number of Licenses']);
               $('.tot-no-sublicense').text(data['Super Admin']['Manage School']['Total Number of Sub-License']);
               $('.tot-no-activeexam').text(data['Super Admin']['Manage School']['Total Number of Active exam']);
               $('.log-out').text(data['School Admin']['Dashboard']['Sign out']);
                $(".by-country").text(data["Super Admin"]["Dashboard"]["By country"]);
               $(".wel-title").text(data["Super Admin"]["Dashboard"]["Welcome to Adimn Dashboard"]);
               $('#view-profile').text(data['School Admin']['Dashboard']['View Profile']);
               $('.address').text(data['School Admin']['Settings']['Address']);
               $('.phone-no').text(data['Super Admin']['Manage School']['Phone Number']);
               $('.presonal').text(data['Super Admin']['Manage Students']['Personal']);
               $('.school-name').text(data['School Admin']['Dashboard']['School Name']);
               $(".view-detail").text(data["School Admin"]["Manage Student"]["View Details"]);
                //$(".three-title").text(data["School Admin"]["Dashboard"]["Last 30 days"]);
                $("#six-title,#last-six").text(data["School Admin"]["Dashboard"]["Last 6 months"]);
                $("#one-title").text(data["School Admin"]["Dashboard"]["Last 1 years"]);
                $(".manage-student").text(data["School Admin"]["Manage Student"]["Manage Students"]);
                $('.sub-license-types').text(data['School Admin']['Sub license type page']['Sub license types']);
               $('.license-types').text(data['School Admin']['License type page']['License types']);
                $('#form_clear,#clear-filter,#reset-filter').text(data['School Admin']['Manage Student']['Clear Filter']);
                $('#select2-school-id-container .select2-selection__placeholder,#select2-school-filter-container .select2-selection__placeholder').text(data['Super Admin']['Manage School']['Select School']);
               $('.view-results').text(data['School Admin']['Exam View result page']['View results']);
               $('.national-id').text(data['School Admin']['Student view result page']['National ID']);
                $(".sub-plan").text(data["School Admin"]["Manage Student"]["Subscription plan"]);
                $(".student-id").text(data["Super Admin"]["Manage Students"]["Student ID"]);
               $('.exam-name').text(data['School Admin']['Posible questions page']['Examination Name']);
               $('.tot-exam-attend').text(data['School Admin']['Exam View result page']['Total attended to exam']);
               $('.obt-score').text(data['School Admin']['Exam View result page']['Obtained Score']);
                $('.wrong-ans').text(data['School Admin']['Report page']['Wrong Answers']);
               $('.correct-ans').text(data['School Admin']['Report page']['Correct Answers']);
              $('.tot-score').text(data['School Admin']['Exam View result page']['Total Score']);
               $('.date-time').text(data['School Admin']['Report page']['Date &Time']);
               $('.student-name').text(data['School Admin']['Exam View result page']['Student Name']);
                $('.percentage,.precentage').text(data['School Admin']['Student view result page']['Percentage']);
                 $('.duration').text(data['School Admin']['Student view result page']['Duration']);
               $('.ans-sheet').text(data['School Admin']['Student view result page']['Answer Sheet']);
              $('.total-marks').text(data['School Admin']['Report page']['Total Marks']);
               $('.scores').text(data['School Admin']['Report page']['Score']);
                $('.download').text(data['School Admin']['Report page']['Download']);
                $(".question").text(data["School Admin"]["Question Pool"]["Questions"]);
               $('.family-name').text(data['School Admin']['Families page']['Family name']);
               $('.personal-info').text(data['School Admin']['Settings']['Personal information']);
               $('.search').text(data['Super Admin']['others']['Search']);
               $('#schoolInput').attr('placeholder', data['Super Admin']['others']['Search School']);
               $('.active-school').text(data['Super Admin']['others']['Active Schools']);
               $('.tot-active-school').text(data['Super Admin']['others']['Total Number of Active Schools']);
               $('.daily').text(data['School Admin']['others']['Daily (Avg)']);
               $('.week').text(data['School Admin']['others']['Weekly']);
               $('.month').text(data['School Admin']['others']['Monthly']);
               $('.exams').text(data['School Admin']['others']['Exams']);
               $('.students').text(data['School Admin']['others']['Students']);
               $('.schools').text(data['Super Admin']['others']['Schools']);
               $('#tot-school-att').text(data['School Admin']['others']['How have your School, Students, Exams trended']);
               $('.school-wise').text(data['Super Admin']['others']['School Wise Performance']);
               $('#school-perf').text(data['Super Admin']['others']['Performance of the schools']);
               $('#day-7').text(data['School Admin']['others']['Days 7']);
               $('#day-15').text(data['School Admin']['others']['Days 15']);
               $('#day-30').text(data['School Admin']['others']['Days 30']);

               $('.stud-perf').text(data['School Admin']['others']['Student Performance']);
               $('#sample-stud-perf').text(data['School Admin']['others']['Sample student performance']);
               $(".country,#select2-country-filter-container .select2-selection__placeholder").text(data["School Admin"]["others"]["Country"]);
               $(".change").text(data["School Admin"]["others"]["Change"]);
               $(".trend").text(data["School Admin"]["others"]["Trend"]);
               $(".manage-school").text(data["Super Admin"]["others"]["Manage Schools"]);
               $('.filters,.filter-label').text(data['School Admin']['others']['Filters']);
                $('.sel-school .select2-search--inline .select2-search__field').attr('placeholder', data['Super Admin']['Manage School']['Select School']);
               $('#select2-license_filter-container .select2-selection__placeholder,.select2-selection #select2-license_filter-container,#select2-license_filter-container .select2-selection__placeholder,#select2-license_filter-container').text(data['Super Admin']['others']['Select License Type']);
               $('.select2-selection #select2-date-filter-container').text(data['School Admin']['others']['Select Date']);
                $(".dates").text(data["School Admin"]["others"]["Dates"]);
               $(".to-label").text(data["School Admin"]["others"]["To"]);
               $(".from-label").text(data["School Admin"]["others"]["From"]);
               $("#this-month,.this-month").text(data["School Admin"]["others"]["This Month"]);
               $("#eng-lang").text(data["Super Admin"]["others"]["English"]);
               $("#ar-lang").text(data["Super Admin"]["others"]["Arabic"]);
               $('select option:contains("Published")').text(data['Super Admin']['Manage School']['Published']);
               $('select option:contains("Unpublished")').text(data['Super Admin']['Manage School']['UnPublished']);
               $('#view-more').text(data['Super Admin']['others']['View More']);
               $('.active-school').text(data['Super Admin']['others']['Active Schools']);
               $('#swap-user').text(data['Super Admin']['others']['Swap user']);
               $(".basic").text(data["Super Admin"]["others"]["Basics"]);
               $(".full-name").text(data["School Admin"]["others"]["Full name"]);
               $(".phone-no").text(data["Super Admin"]["others"]["Phone Number"]);
               $(".edit-profile").text(data["School Admin"]["others"]["Update profile"]);
               $(".address").text(data["School Admin"]["Settings"]["Address"]);
               $("#update-add").text(data["Super Admin"]["others"]["Update Address"]);
               $(".country").text(data["School Admin"]["others"]["Country"]);
               $(".change-password").text(data["School Admin"]["others"]["Change Password"]);
               $('label[for="current-password"]').text(data['Super Admin']['others']['Current password']);
               $('label[for="new-password"]').text(data['Super Admin']['others']['New password']);
               $("#admin-title").text(data["Super Admin"]["others"]["Admin"]);

               $(".active-stud").text(data["School Admin"]["others"]["Attended Students"]);
               $(".att-lang").text(data["Super Admin"]["others"]["ATTENDED LANGUAGE"]);
               $(".student-details").text(data["Super Admin"]["others"]["Student Details"]);
               $("#this-yr").text(data["School Admin"]["others"]["This year"]);
               $("#enableCustomDates").text(data["School Admin"]["others"]["Custom Dates"]);
               $(".todays").text(data["Super Admin"]["others"]["Today"]);
               $(".total_exams").text(data["Super Admin"]["others"]["Total Exams"]);
               $(".performance").text(data["Super Admin"]["others"]["Performance"]);
               $('#select2-att-lang-list-container .select2-selection__placeholder').text(data['School Admin']['Settings']['Select Language']);

               $('.from-date,#datepicker').attr('placeholder', data["School Admin"]["others"]["From date"]);
               $('.to-date,#datepicker1').attr('placeholder', data["School Admin"]["others"]["To date"]);
               $('.swap-heading').text(data['Super Admin']['others']['Swap']);
                $('#select2-sel-statuss-container .select2-selection__placeholder').text(data['Super Admin']['others']['Select status']);
               $('.school-title').text(data['Super Admin']['others']['School']);
               $('#current_password').attr('placeholder',data['School Admin']['others']['Enter current password']);
               $('#new_password').attr('placeholder',data['School Admin']['others']['Enter new password']);
               $('#new_password_confirmation').attr('placeholder',data['School Admin']['others']['Enter confirm password']);
                $('.select2-search__field').attr('placeholder',data['School Admin']['Question Pool']['Select']);
                $('.language-title').html(data['School Admin']['Question Pool']['Language'])
               $('.skip-ans').text("إجمالي الإجابات التي تم تخطيها");
                $("#select2-license_filter1-container .select2-selection__placeholder").text(data["School Admin"]["Manage Student"]["License Type"]);
                $("#select2-license_filter-container .select2-selection__placeholder").text(data["School Admin"]["Manage Student"]["License Type"]);

               $('#select2-admin_license_filter-container .select2-selection__placeholder').text(data["School Admin"]["Manage Student"]["License Type"]);
           }
   });
    } 
}

