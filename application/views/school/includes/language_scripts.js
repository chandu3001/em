$(function(){
    $.ajaxSetup({
        complete: function(){
            languageText(localStorage.getItem('language-type'))
        }
    });
})

async function languageText(langCode) {
    console.log("one"+langCode);

    if(langCode == null){
         localStorage.setItem('language-type', 1);
    }

    if (langCode == 2) {

        $('.ar-sfilter,.ar-examfilter').show();
        $('.en-sfilter,.en-examfilter').hide();

       //$('.mce-content-body p').css('direction','rtl');
        $('#licencee').data('placeholder',"اختيار نوع الرخصة");

         arabicFlag = base_url+'assets/images/arabic.png';
       $('.lang-flag img').attr('src',arabicFlag);
       $('.direction--rtl').css('direction','rtl');
       $('.direction--email').css('text-align','right');
        $('body').addClass('has-rtl');
        $("html").children().css("direction","rtl");
         $("head").append(`<link rel="stylesheet" href="${base_url}/assets/css/dashlite.rtl.css" type="text/css" />`);
                const data = await getArabic()
                $("#school-admin-title").text(data["School Admin"]["Dashboard"]["School Admin"]);
                $(".first-name").text(data["School Admin"]["Manage Student"]["First Name"]);
                $(".sec-name").text(data["School Admin"]["Manage Student"]["Second Name"]);
                $(".email").text(data["School Admin"]["Manage Student"]["Email ID"]);
                $(".mobile").text(data["School Admin"]["Manage Student"]["Mobile Number"]);
                $(".dob").text(data["School Admin"]["Manage Student"]["DOB"]);
                $(".gender,#select2-gender-container .select2-selection__placeholder").text(data["School Admin"]["Manage Student"]["Gender"]);
                $(".city").text(data["School Admin"]["Manage Student"]["City"]);
                $(".id-type").text(data["School Admin"]["Manage Student"]["ID Type"]);
                $(".id-number").text(data["School Admin"]["Manage Student"]["ID Number"]);
                $(".license-type").text(data["School Admin"]["Manage Student"]["License Type"]);
                $(".sub-name").text(data["School Admin"]["Manage Student"]["Sub Licence Type"]);
                $(".level").text(data["School Admin"]["Manage Student"]["Level"]);
                $(".plans,#select2-plans-selectbox-container .select2-selection__placeholder").text(data["School Admin"]["Manage Student"]["Plans"]);
                $(".username").text(data["School Admin"]["Manage Student"]["Username"]);
                $(".addon-info").text(data["School Admin"]["Manage Student"]["Additional information"]);
                $(".exam-title").text(data["School Admin"]["Examination"]["Exam Name"]);
                $(".result").text(data["School Admin"]["Manage Student"]["Result"]);
                $("#select2-sort_by_exam-container .select2-selection__placeholder").text(data["School Admin"]["Manage Student"]["Sort By"]);
                $(".status-label").text(data["School Admin"]["Authenticator"]["Status"]);
                $(".action").text(data["School Admin"]["Manage Student"]["Action"]);
                $(".slno").text(data["School Admin"]["Manage Student"]["Sl.No"]);
                $(".student-title").text(data["School Admin"]["Manage Student"]["Student"]);
                $("#select2-license-filter-container .select2-selection__placeholder").text(data["School Admin"]["Manage Student"]["License Type"]);
                $(".marks").text(data["School Admin"]["Question Pool"]["Marks"]);
                $(".que-type").text(data["School Admin"]["Question Pool"]["Question Type"]);
                $(".diff-level").text(data["School Admin"]["Question Pool"]["Difficulty Level"]);
                $(".family").text(data["School Admin"]["Question Pool"]["Family"]);
                $(".que-type").text(data["School Admin"]["Question Pool"]["Question Type"]);
                $(".que-family").text(data["School Admin"]["Question Pool"]["Question Family"]);
                $(".options").text(data["School Admin"]["Question Pool"]["Options"]);
                $(".elim-que").text(data["School Admin"]["Question Pool"]["Eliminatory Questions"]);
                $(".is-elim-que").text(data["School Admin"]["Question Pool"]["Is this an eliminatory question?"]);
                $(".is-yes").text(data["School Admin"]["Question Pool"]["Yes"]);
                $(".is-no").text(data["School Admin"]["Question Pool"]["No"]);
                $(".question").text(data["School Admin"]["Question Pool"]["Questions"]);
                $(".quest").text(data["School Admin"]["Question Pool"]["Question"]);
                $(".que-img").text(data["School Admin"]["Question Pool"]["Question Image"]);
                $(".que-video").text(data["School Admin"]["Question Pool"]["Question Video"]);
                $(".correct").text(data["School Admin"]["Question Pool"]["Correct"]);
                $("#select2-difficulty_level-container .select2-selection__placeholder").text(data["School Admin"]["Question Pool"]["Difficulty Level"]);
                $(".cancel").text(data["School Admin"]["Examination"]["Cancel"]);
                $(".que-details").text(data["School Admin"]["Question Pool"]["Question details"]);

                $(".mock-active").text(data["School Admin"]["Examination"]["Mock exam is activated"]);
                // $('.mock-inactive').text(data['School Admin']['Examination']['Cancel']);

                $(".tot-questions").text(data["School Admin"]["Question Pool"]["Total Questions"]);

                $(".tot-stud").text(data["School Admin"]["Manage Student"]["Total Students"]);
                //$('.active-stud').text(data['School Admin']['Manage Student']['Action']);
                $(".pass").text(data["School Admin"]["Manage Student"]["Pass"]);
                $(".no-exam-title").text(data["School Admin"]["Manage Student"]["No Examination Result Available"]);
                $(".gender").text(data["School Admin"]["Manage Student"]["Gender"]);

                $(".sublicensename").text(data["School Admin"]["Settings"]["Sub license name"]);
                $(".license-name").text(data["School Admin"]["Settings"]["License name"]);
                $(".exam").text(data["School Admin"]["Dashboard"]["Exam"]);
                $(".host").text(data["School Admin"]["Authenticator"]["Host"]);
                $(".mac-id").text(data["School Admin"]["Authenticator"]["Mac ID"]);
                $(".req-date").text(data["School Admin"]["Authenticator"]["Request Date"]);
                $(".password").text(data["School Admin"]["Manage Student"]["Password"]);
                $(".language-title").text(data["School Admin"]["Question Pool"]["Language"]);
                $(".native-lang").text(data["School Admin"]["Settings"]["Native Language"]);

                $(".exam-criteria").text(data["School Admin"]["Settings"]["Exam Criteria"]);
                $(".view-detail").text(data["School Admin"]["Manage Student"]["View Details"]);
                $("#edit-student").text(data["School Admin"]["Manage Student"]["Edit Students"]);
                $(".delete").text(data["School Admin"]["Manage Student"]["Delete"]);
                $(".active-btn").text(data["School Admin"]["Settings"]["Active"]);
                $(".inactive-btn").text(data["School Admin"]["Settings"]["Inactive"]);
                $("#edit-student-modal").text(data["School Admin"]["Manage Student"]["Edit Students"]);
                $(".edit").text(data["School Admin"]["Settings"]["Edit"]);
                $(".default-langs").text(data["School Admin"]["Settings"]["Default Languages"]);
                $('.que-pool-title').text(data['School Admin']['Question Pool']['Question Pool']);
                $('.exam-tab').text(data['School Admin']['Manage Student']['Examination']);
                $('.reports').text(data['School Admin']['Settings']['Reports']);
                $('.auth-title').text(data['School Admin']['Authenticator']['Authenticator']);
                $('.settings').text(data['School Admin']['Settings']['Settings']);
                $('.instruction').text(data['School Admin']['Settings']['Instruction']);
                $('.dtitle').text(data['School Admin']['Dashboard']['Dashboard']);
                $('.languages').text(data['School Admin']['Settings']['Languages']);
                $('#tmenu').text(data['School Admin']['Dashboard']['Menu']);
                $('.status-label').text(data['School Admin']['Authenticator']['Status']);
                $('#sub-license-selectbox').attr('placeholder', data['School Admin']['Manage Student']['Sub Licence Type']);
                $('#select2-sort_by_exam-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('#select2-sort-by-container,#select2-sortBy-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('#select2-stat-container .select2-selection__placeholder,#select2-sort_by-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['Sort By']);
               $('#select2-license-filter-container .select2-selection__placeholder').text(data['School Admin']['Manage Student']['License Type']);
                $('#tover').text(data['School Admin']['Dashboard']['Overview']);
                $('#wel-title').text(data['School Admin']['Dashboard']['Welcome to school admin dashboard']);
               $('.ftitle').text(data['School Admin']['Settings']['Families']);
               $('.schoolna-title').text(data['School Admin']['Dashboard']['School Name']);
               $('#attend-title,.attend-title').text(data['School Admin']['Dashboard']['Attended']);
               $('.tpass').text(data['School Admin']['Dashboard']['Passed']);
               $('.failed-title').text(data['School Admin']['Dashboard']['Failed']);
               $('.apply-btn').text(data['School Admin']['Manage Student']['Apply']);
               $('select option:contains("Select All")').text(data['School Admin']['Manage Student']['Select All']);
               $('select option:contains("Descending")').text(data['School Admin']['Manage Student']['Descending']);
               $('select option:contains("Ascending")').text(data['School Admin']['Manage Student']['Ascending']);
               $('.back-btn').text(data['School Admin']['Manage Student']['Back']);
               $('.general-tab').text(data['School Admin']['Manage Student']['General Details']);
               $('select option:contains("Pass"),.pass').text(data['School Admin']['Manage Student']['Pass']);
               $('select option:contains("Fail"),.fail').text(data['School Admin']['Manage Student']['Fail']);

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
               $('#defaultLang').text(data['School Admin']['Settings']['Default Languages']);
               $('.correct').text(data['School Admin']['Question Pool']['Correct']);
               $('.sel-language').text(data['School Admin']['Settings']['Select Language']);
               //$('.add-exam').text(data['School Admin']['Examination']['Add Examination']);
               // $('modal-header .modal-title .add-exam').text(data['School Admin']['Examination']['Add Examination']);
               $('.device-auth').text(data['School Admin']['Authenticator']['Device Authenticator']);
                $('.auth-id').text(data['School Admin']['Authenticator']['Authenticator ID']);
               $('.download-app').text(data['School Admin']['Dashboard']['Download Application']);
               $('.show-label').text(data['School Admin']['Manage Student']['Show']);
               $('select option:contains("Active")').text(data['School Admin']['Settings']['Active']);
               $('select option:contains("Inactive")').text(data['School Admin']['Settings']['Inactive']);
               $('.exam-criteria').text(data['School Admin']['Settings']['Exam Criteria']);
               $('.instruction-title').text(data['School Admin']['Instruction page']['Instructions']);
               $('.update').text(data['School Admin']['Instruction page']['Update']);
               $('.add').text(data['School Admin']['Examination']['Add']);
               $('.sub-license-types').text(data['School Admin']['Sub license type page']['Sub license types']);
               $('.pass-precent').text(data['School Admin']['Add Exam criteria pop up']['Pass Percentage']);
               $('.durations').text(data['School Admin']['Add Exam criteria pop up']['Duration (HH:MM)']);
               $('.tot-family').text(data['School Admin']['Exam criteria page']['Total Family']);
               $('.license-types').text(data['School Admin']['License type page']['License types']);
               $('.diff-levels').text(data['School Admin']['Difficulty Level page']['Difficulty Levels']);
               $('.tot-diff-level').text(data['School Admin']['Posible questions page']['Total Difficulty Levels']);
               $('.tot-families').text(data['School Admin']['Posible questions page']['Total Families']);
               $('.tot-diff-level10').text(data['School Admin']['Posible questions page']['Total Difficulty Levels 10']);
               $('.names').text(data['School Admin']['Families page']['Name']);
               $('.family-name').text(data['School Admin']['Families page']['Family name']);
               $('.family-edit').text(data['School Admin']['others']['Edit Family']);
              // $('.family-add').text(data['School Admin']['Families page']['Add Family']);
               $('#tot-device').text(data['School Admin']['Authenticator']['Total Devices']);
               $('.download').text(data['School Admin']['Report page']['Download']);
               $('.scores').text(data['School Admin']['Report page']['Score']);
               $('.wrong-ans').text(data['School Admin']['Report page']['Wrong Answers']);
               $('.correct-ans').text(data['School Admin']['Report page']['Correct Answers']);
               $('.total-marks').text(data['School Admin']['Report page']['Total Marks']);
               $('.date-time').text(data['School Admin']['Report page']['Date &Time']);
               $('.view-results').text(data['School Admin']['Exam View result page']['View results']);
               $('.edit-exam').text(data['School Admin']['Exam View result page']['View results']);
               $('.sub-type,label[for="sub-name"]').text(data['School Admin']['Student view result page']['Sub License Type']);
               $('.exam-name').text(data['School Admin']['Posible questions page']['Examination Name']);
               $('.tot-exam-attend').text(data['School Admin']['Exam View result page']['Total attended to exam']);
               $('.obtain-score,.obt-score').text(data['School Admin']['Exam View result page']['Obtained Score']);
               $('.tot-score').text(data['School Admin']['Exam View result page']['Total Score']);
               $('.student-name').text(data['School Admin']['Exam View result page']['Student Name']);
               $('.percentage').text(data['School Admin']['Student view result page']['Percentage']);
               $('.national-id').text(data['School Admin']['Student view result page']['National ID']);
               $('.schoolna-title').text(data['School Admin']['Student view result page']['School Name']);
               $('.duration').text(data['School Admin']['Student view result page']['Duration']);
               $('.ans-sheet').text(data['School Admin']['Student view result page']['Answer Sheet']);
               $('#form_clear,#clear-filter').text(data['School Admin']['Manage Student']['Clear Filter']);
               $('.answers').text(data['School Admin']['Question Pool']['Answers']);
               $('.update-que').text(data['School Admin']['Question Pool']['Update question']);
               $('.edit-que').text(data['School Admin']['Question Pool']['Update question']);
               $('#bulkUploadModalLabel,.bulk-uploadlabel').text(data['School Admin']['Question Pool']['Bulk upload']);
               $('.template-tab').text(data['School Admin']['Question Pool']['Template']);
               $('.upload-tab').text(data['School Admin']['Question Pool']['Upload']);
               $('.def-lang').text(data['School Admin']['Question Pool']['Default Language']);
               $('#download-temp').text(data['School Admin']['Question Pool']['Download Template']);
               $('#temp-confirm').text(data['School Admin']['Question Pool']['Do you want to add Questions to another language']);
               $('label[for="stud-photo"]').text(data['School Admin']['Manage Student']['Student photo']);
                $(".edit-student").text(data["School Admin"]["Manage Student"]["Edit Student"]);
                $(".sub-plan").text(data["School Admin"]["Manage Student"]["Subscription plan"]);
              //  $(".three-title").text(data["School Admin"]["Dashboard"]["Last 30 days"]);
                $(".todays").text(data["Super Admin"]["others"]["Today"]);
                $(".this-week").text(data["School Admin"]["others"]["This week"]);

                $("#six-title").text(data["School Admin"]["Dashboard"]["Last 6 months"]);
                $("#one-title").text(data["School Admin"]["Dashboard"]["Last 1 years"]);
               $('.personal-info').text(data['School Admin']['Settings']['Personal information']);
               $('.personal').text(data['Super Admin']['Manage Students']['Personal']);
               $('#last-six').text(data['School Admin']['Dashboard']['Last 6 months']);
               $('label[for="enableCustomDates"],#enableCustomDates').text(data['School Admin']['others']['Custom Dates']);
               $('.exams').text(data['School Admin']['others']['Exams']);
               $('#exam-perf').text(data['School Admin']['others']['Exam Wise Performance']);
              $('#stud-perf').text(data['School Admin']['others']['Student Performance']);
               $('.this-month').text(data['School Admin']['others']['This Month']);
               $('#view-more').text(data['Super Admin']['others']['View More']);
               $('.student-modal-title').text(data['Super Admin']['others']['Add student']);
               $('.skip-ans').text(data['School Admin']['others']['Skipped Answers']);
               $('.add-que').text(data['School Admin']['others']['Add Question']);
               $('label[for="afta"],label[for="eafta"]').text(data['School Admin']['others']['All of the above']);
               $('#filterLanguage').attr('placeholder', data['Super Admin']['others']['Search Language']);
               $('#select2-licence-container .select2-selection__placeholder,#select2-license_filter-container .select2-selection__placeholder,.select2-selection #select2-license_filter-container,#select2-license-type-selectbox-container .select2-selection__placeholder,#select2-license_filter-container').text(data['Super Admin']['others']['Select License Type']);
               $('#select2-sub_licence-container .select2-selection__placeholder,#select2-sub_licence_filter-container .select2-selection__placeholder,#select2-sub-license-filter-container .select2-selection__placeholder,#select2-sub-license-selectbox-container .select2-selection__placeholder,#select2-sublicence-container .select2-selection__placeholder').text(data['School Admin']['Examination']['Select sublicense type']);
               $('.possible-que').text(data['School Admin']['others']['Possible Questions']);
               $('.stud-name').text(data['School Admin']['others']['Students Name']);
               $('.filters,.filter-label').text(data['School Admin']['others']['Filters']);
               $('#select2-family_filter-container .select2-selection__placeholder').text(data['Super Admin']['others']['Select sublicense type']);
               $(".dates").text(data["School Admin"]["others"]["Dates"]);
               $(".to-label").text(data["School Admin"]["others"]["To"]);
               $(".from-label").text(data["School Admin"]["others"]["From"]);
               $("#this-month").text(data["School Admin"]["others"]["This Month"]);
               $('.select2-selection #select2-date-filter-container').text(data['School Admin']['others']['Select Date']);
               $("#eng-lang").text(data["Super Admin"]["others"]["English"]);
               $("#ar-lang").text(data["Super Admin"]["others"]["Arabic"]);
               $("#view-profile").text(data["Super Admin"]["others"]["View Profile"]);
               $("#sign-out").text(data["Super Admin"]["others"]["Sign out"]);
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
                $('.from-date,#datepicker').attr('placeholder', data["School Admin"]["others"]["From date"]);
               $('.to-date,#datepicker1').attr('placeholder', data["School Admin"]["others"]["To date"]);
                $('.change-photo').text(data["School Admin"]["others"]["Change photo"]);
                $('#current_password').attr('placeholder',data['School Admin']['others']['Enter current password']);
               $('#new_password').attr('placeholder',data['School Admin']['others']['Enter new password']);
               $('#new_password_confirmation').attr('placeholder',data['School Admin']['others']['Enter confirm password']);
               $("#this-yr").text(data["School Admin"]["others"]["This year"]);
               $(".exm-stat").text(data["School Admin"]["others"]["Exam Statistics"]);
               $('#select2-sel-res-container .select2-selection__placeholder').text(data['School Admin']['others']['Select Result']);
               $(".att-lang").text(data["Super Admin"]["others"]["ATTENDED LANGUAGE"]);
               $('#select2-id-type-container .select2-selection__placeholder').text(data['Super Admin']['others']['Select ID Type']);
               $('#select2-level-selectbox-container .select2-selection__placeholder').text(data['Super Admin']['others']['Select Level']);
               $('label[for="reg-female"]').text(data['School Admin']['Manage Student']['Female']);
               $('label[for="reg-male"]').text(data['School Admin']['Manage Student']['Male']);
               $('#select2-difficulty_level_filter-container .select2-selection__placeholder').text(data['School Admin']['others']['Choose difficulty level']);
               $('#select2-family_filter-container .select2-selection__placeholder').text(data['School Admin']['others']['Choose group']);
               $('#select2-question_type-container .select2-selection__placeholder').text(data['Super Admin']['others']['Select Question Type']);
               $('#select2-att-lang-list-container .select2-selection__placeholder').text(data['School Admin']['Settings']['Select Language']);
                $('#select2-status-container .select2-selection__placeholder').text(data['Super Admin']['others']['Select status']);
               $("#taq").text(data["Super Admin"]["others"]["Total Available Questions"]);
               $(".exc-que").text(data["School Admin"]["others"]["Note-Excluding Eliminatory Questions"]);
              $(".savenextbtn").text(data["School Admin"]["Add Exam criteria pop up"]["Save and Next"]);
              $(".savebtn").text(data["School Admin"]["Question Pool"]["Save"]);
              $(".cancelbtn").text(data["School Admin"]["Question Pool"]["Cancel"]);
              $(".save-nxt").text(data["School Admin"]["Question Pool"]["Next"]);
               $('#select2-license_filters-container .select2-selection__placeholder').text("اختيار نوع الرخصة");

               $('#select2-school_license_filter-container .select2-selection__placeholder').text("اختيار نوع الرخصة");


               $("#helper").text(data["School Admin"]["Add Exam criteria pop up"]["Add"]);
                $('.select2-search__field').attr('placeholder',data['School Admin']['Question Pool']['Select']);
                $(".active-stud").text(data["School Admin"]["others"]["Attended Students"]);
                $("#new-stud").text(data["School Admin"]["others"]["New Students"]);

    } else {
        console.log('eng lang');
        $('.en-sfilter,.en-examfilter,#en-filterstud-block').show();
        $('.ar-sfilter,.ar-examfilter,#ar-filterstud-block').hide();

        $('.mce-content-body p').css('direction','ltr !important');
        $('.mce-content-body p').css('text-align','left');

    }
    return true;
}

