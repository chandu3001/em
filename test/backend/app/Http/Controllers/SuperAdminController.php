<?php

namespace App\Http\Controllers;

use App\Models\UserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use App\Models\Examination;
use App\Models\MainQuestionPool;
use App\Models\Option;
use App\Models\LanguagesQuestionPool;
use App\Models\family;
use App\Models\DifficultyLevelMarks;
use App\Models\Language;
use DB;


class SuperAdminController extends Controller
{

    function getTranslation()
    {
        $json = [
            "School Admin" => [
                "others" => [
                    'Filter All exams' => 'تصفية الاختبارات',
                    'Specific exam' => 'امتحان محدد',
                    'Time filter' => 'تصفية الوقت',
                    'Today' => 'اليوم',
                    'This week' => 'هذا الاسبوع',
                    'Last week' => 'الأسبوع الماضي',
                    'This Month' => 'هذا الشهر',
                    'Year to date' => 'منذ بدلية العام',
                    'Free Hand Date' => 'ادخل التاريخ',
                    'Custom Dates' => 'حدد التاريخ',
                    'Total registered students' => 'إجمالي الطلاب المسجلين',
                    'Total students that attended the exam' => 'مجموع الطلاب الذين حضروا الامتحان',
                    'Total students that passed' => 'مجموع الطلاب الناجحين',
                    'Total students that failed' => 'مجموع الطلاب الراسبين',
                    '% Pass' => 'نسبة النجاح',
                    '% Fail' => 'نسبة الرسوب',
                    'Active Students' => 'الطلاب المفعلين',
                    'Total Number of Active Students' => 'مجموع الطلاب المفعلين',
                    'Daily (Avg)' => 'المتوسط ​​اليومي',
                    'Weekly' => 'أسبوعيا',
                    'Monthly' => 'شهريا',
                    'How have your School, Students, Exams trended' => 'الاتجاه على وسائل التواصل الاجتماعي',
                    'Exams' => 'اختبارات',
                    'Students' => 'متدرب',
                    'Exam Wise Performance' => 'الاداء في الاختبارات',
                    'Performance of the Exam' => 'الاداء في الاختبار',
                    'Trend' => 'اتجاه',
                    'Change' => 'تغيير',
                    'Country' => 'البلد',
                    'Student Performance' => 'اداء الطالب',
                    'Sample student performance' => 'عينة عن اداء الطالب',
                    'Skipped Answers' => 'لا جواب',
                    'Add Question' => 'اضافة سؤال',
                    'Bulk Upload' => 'تحميل',
                    'Possible Questions' => 'الأسئلة المحتملة',
                    'Students Name' => 'اسم الطالب',
                    'Dates' => 'التاريخ',
                    'From' => 'من',
                    'To' => 'الى',
                    'Select Date' => 'حدد التاريخ',
                    'Filters' => 'تصفية',
                    'Edit Family' => 'تحرير العائلة',
                    'Change Password' => 'تغيير كلمة السر',
                    'New password' => 'كلمة السر الجديدة',
                    'Current password' => 'كلمة السر الحالية',
                    'Full name' => 'الأسم الكامل',
                    'All of the above' => 'كل اعلاه',
                    'Update profile' => 'تحديث الملف الشخصي',
                ],
                "Dashboard" => [
                    "Attended" => "الحضور",
                    "Dashboard" => "لوحة القيادة",
                    "Download Application" => "تحميل التطبيق",
                    "Exam" => "الاختبار",
                    "Failed" => "رسوب",
                    "Families" => "مجموعة  الأسئلة",
                    "Last 1 years" => "اخر سنة",
                    "Last 30 days" => "اخر ثلاثين يوم",
                    "Last 6 months" => "اخر ستة اشهر",
                    "Menu" => "القائمة",
                    "Overview" => "الملخص",
                    "Passed" => "نجاح",
                    "School Admin" => "مدير المدرسة",
                    "School Name" => "اسم المدرسة",
                    "Sign out" => "تسجيل الخروج",
                    "Total Exam" => "اجمالي الامتحان",
                    "View" => "عرض",
                    "View Profile" => "عرض الصفحة الرئسية",
                    "Welcome to school admin dashboard" => "مرحبا بك في لوحة تحكم مسؤول المدرسة",
                ],
                "Manage Student" => [
                    "Action" => "النشاط",
                    "Activated" => "نشط",
                    "Activation" => "التنشيط",
                    "Additional information" => "معلومات اضافية",
                    "Apply" => "تطبيق",
                    "Ascending" => "تصاعدي",
                    "Back" => "الخلف",
                    "Beginner" => "مبتدئ",
                    "Clear Filter" => "مسح البحث",
                    "Confirm Password" => "تاكيد كلمة المرور",
                    "Contact Number" => "رقم التواصل",
                    "Deactivated" => "معطل",
                    "Delete" => "حذف",
                    "Descending" => "تنازلي",
                    "DOB" => "تاريخ الميلاد",
                    "Edit Students" => "تفاصيل الطلاب",
                    "Edit Student" => "تحرير ملف المتدرب",
                    "Male" => "ذكر",
                    "Female" => "انثى",
                    "City" => "المدينة",
                    "Sublicense type" => "نوع الترخيص الفرعي",
                    "Student photo" => "صورة المتدرب",
                    "Update" => "تحديث",
                    "Email ID" => "البريد الالكتروني",
                    "Examination" => "الامتحان",
                    "Expert" => "خبير",
                    "Fail" => "فشل",
                    "Filter" => "تصفية",
                    "First Name" => "الاسم الاول",
                    "Gender" => "الجنس",
                    "General Details" => "التفاصيل العامة",
                    "ID Number" => "رقم الهوية",
                    "ID Type" => "نوع الهوية",
                    "intermediate" => "متوسط",
                    "Level" => "المستوى",
                    "License Type" => "نوع الرخصه",
                    "Manage Students" => "ادارة الطلاب",
                    "Mobile Number" => "رقم الجوال",
                    "Nationality Id" => "الجنسية",
                    "No Examination Result Available" => "لا توجد نتيجة فحص متاحة",
                    "Pass" => "تجاوز",
                    "Password" => "الرقم السري",
                    "Plans" => "الخطط",
                    "Result" => "النتيجة",
                    "Save filter" => "حفظ عامل التصفية",
                    "Second Name" => "الاسم الثاني",
                    "Select All" => "تحديد الكل",
                    "Select level" => "اختر المستوى",
                    "Select photo" => "اختر الصورة",
                    "Select plans" => "اختر الخطة",
                    "Show" => "اظهر",
                    "Sl.No" => "الرقم",
                    "Sort By" => "ترتيب حسب",
                    "Student" => "الطالب",
                    "Sub Licence Type" => "نوع الترخيص الفعلي",
                    "Subscription plan" => "خطة الاشتراك",
                    "Total Students" => "مجموع الطلاب",
                    "Username" => "اسم المستخدم",
                    "View Details" => "عرض التفاصيل",
                ],
                "Question Pool" => [
                    "Correct" => "صحيح",
                    "Difficulty Level" => "درجة الصعوبة",
                    "Eliminatory Questions" => "أسئلة الرسوب الفوري",
                    "Family" => "المجموعة",
                    "Is this an eliminatory question?" => "هل هذا سؤال رسوب فوري؟",
                    "Language" => "اللغه",
                    "Marks" => "الدرجات",
                    "Next" => "التالي",
                    "No" => "لا",
                    "Bulk upload" => "تحميل متعدد",
                    "Options" => "الخيارات",
                    "Question details" => "تفاصيل السؤال",
                    "Question Family" => "اسئلة المجموعة",
                    "Question Image" => "صورة السؤال",
                    "Question Pool" => "كل الاسئلة",
                    "Question Type" => "نوع السؤال",
                    "Question Video" => "فيديو السؤال",
                    "Questions" => "الاسئلة",
                    "Select" => "حدد",
                    "Total Questions" => "مجموع الاسئلة",
                    "Yes" => "نعم",
                    "Template" => "نموذج",
                    "Upload" => "تحميل",
                    "Default Language" => "اللغة الرئيسية",
                    "Do you want to add Questions to another language" => "هل تريد اضافة اسئلة بلغة اخرى",
                    "Download Template" => "تحميل النوذج",
                    "Answers" => "الاجوبة",
                    "Edit Question" => "تحرير السؤال",
                    "Update question" => "تحديث السؤال",
                    "Answers" => "الاجوبة",
                    "Back" => "الى الخلف",
                    "Languages" => "اللغات",
                    "Cancel" => "حذف",
                    "Save" => "حفظ",
                ],
                'Report page' => [
                    'Score' => 'النتيجة',
                    'Wrong Answers' => 'الاجابات الخاطئة',
                    'Correct Answers' => 'الاجابات الصحيحة',
                    'Total Marks' => 'اجمالي النتيجة',
                    'Date &Time' => 'التاريخ والوقت',
                    'Download' => 'تحميل',
                    'Pass' => 'نجاح',
                    'Fail' => 'رسوب',
                ],

                "Examination" => [
                    "Add Examination" => "اضافة اختبار",
                    'Add' => 'اضافة',
                    "Cancel" => "الغاء",
                    "Exam Name" => "اسم الاختبار",
                    "Examination" => "الاختبار",
                    "Mock exam is activated" => "تم تفعيل الامتحان الوهمي",
                    "No examination Available" => "لا يوجد امتحان",
                    "Sub licence type is required" => "نوع الترخيص الفرعي مطلوب",
                    "Total exam" => "اجمالي الامتحان",
                    "Mock exam deactivated" => "الاختبار التجريبي غير مفعل",
                    "Mock exam activated" => "الاختبار التجريبي مفعل",
                    "Active" => "مفعل",
                    "Inactive" => "غير مفعل",
                    "Sort By" => "ترتيب",
                    'Sub license type' => 'نوع الرخصة الفرعية',
                    'Select license type' => 'اختيار نوع الرخصة',
                    'Select sublicense type' => 'تحديد نوع الرخصة الفرعية',
                    'Edit Examination' => 'تحرير الاختبار',
                    'Update' => 'تحديث',

                ],
                'Exam View result page' => [
                    'View results' => 'اظهار النتائج',
                    'Total attended to exam' => 'مجموع الحضور في الاختبار',
                    'Examination Name' => 'اسم الاختبار',
                    'Student Name' => 'اسم المتدرب',
                    'Date & Time' => 'التاريخ و الوقت',
                    'Total Score' => 'مجموع النتيجة',
                    'Correct Answer' => 'اجابة صحيحة',
                    'Wrong Answer' => 'اجابة خاطئة',
                    'Obtained Score' => 'النتيجة',
                    'Fail' => 'رسوب',
                    'Pass' => 'نجاح',
                    'Back' => 'الى الخلف',
                    'Sort By' => 'ترتيب حسب',
                ],
                'Student view result page' => [
                    'View results' => 'اظهار النتائج',
                    'Back' => 'الى الخلف',
                    'Answer Sheet' => 'صفحة الاجوبة',
                    'Student Name' => 'اسم المتدرب',
                    'School Name' => 'اسم المدرسة',
                    'National ID' => 'رقم الهوية',
                    'Exam Name' => 'اسم الاختبار',
                    'License Type' => 'نوع الرخصة',
                    'Sub License Type' => 'نوع الرخصة الفرعي',
                    'Total Questions' => 'اجمال الاسئلة',
                    'Correct Answers' => 'الاجوبة الصحيحة',
                    'Wrong Answers' => 'الاجوبة الخاطئة',
                    'Percentage' => 'النسبة',
                    'Duration' => 'الوقت',
                    'Mark' => 'النتيجة',
                    'Date' => 'التاريخ',
                    'Time' => 'الوقت',
                    'Gained' => 'الاجمالي',
                ],
                'Posible questions page' => [
                    'Total Difficulty Levels' => 'مجموع مستوى الصعوبات',
                    "Total Difficulty Levels 10" => 'عشرةمجموع مستوى الصعوبات',
                    'Total Families' => 'مجموع انواع الاسئلة',
                    'Total Questions' => 'مجموع الاسئلة',
                    'Sub License Type' => 'نوع الرخصة الفرعي',
                    'License Type' => 'نوع الرخصة',
                    'Examination Name' => 'اسم الاختبار',
                ],
                "Authenticator" => [
                    "Authenticator" => "المصادقة",
                    "Authenticator ID" => "معرف المصادقة",
                    "Device Authenticator" => "اداة مصادقة الجهاز",
                    "Host" => "الحسوب المضيف",
                    "Mac ID" => "معرف MAC",
                    "Request Date" => "تاريخ الطلب",
                    "Status" => "الحالة",
                    "Total Devices" => "مجموع الاجهزة",
                ],
                "Settings" => [
                    "Active/Inactive" => "فعال / غير فعال",
                    "Active" => "غير فعال",
                    "Inactive" => "فعال",
                    "Address" => "العنوان",
                    "Copy" => "نسخ",
                    "Cut" => "قص",
                    "Default Languages" => "اللغات الافتراضية",
                    "Difficulty Level" => "مستوى الصعوبة",
                    "Edit" => "تحرير",
                    "Edit Languages" => "تحرير اللغة",
                    "Exam Criteria" => "معايير الامتحان",
                    "Families" => "المجموعات",
                    "File" => "الملف",
                    "Format" => "الشكل",
                    "Instruction" => "التعليمات",
                    "Language in native" => "اللغة الام",
                    "Languages" => "اللغات الافتراضية",
                    "License name" => "اسم الرخصة",
                    "Native Language" => "اللغه الام",
                    "New document" => "مستند جديد",
                    "Paste" => "لصق",
                    "Personal information" => "المعلومات الشخصية",
                    "Phone number" => "رقم الجوال",
                    "Redo" => "اعادة",
                    "Reports" => "التقارير",
                    "Security Settings" => "اعدادات الامان",
                    "Select all" => "تحديد الكل",
                    "Select Language" => "اختر اللغة",
                    "Settings" => "الاعدادات",
                    "Sub license name" => "اسم الترخيص الفرعي",
                    "Undo" => "الغاء",
                    "View" => "اظهر",
                    "Visual aids" => "المعينات البصرية",
                ],
                'Language page' => [
                    "Active" => "مفعل",
                    "Inactive" => "غير مفعل",
                ],
                'Families page' => [
                    'Families' => 'نوع الاسئلة',
                    'Name' => 'الاسم',
                    "Active" => "مفعل",
                    "Inactive" => "غير مفعل",
                    'Edit Family' => 'تحرير نوع الاسئلة',
                    "Update" => "تحديث",
                    'Family name' => 'العائلة',
                ],
                'Difficulty Level page' => [
                    'Difficulty Levels' => 'مستويات الصعوبة',
                    'Level' => 'المستوى',
                    'Marks' => 'النتائج',
                    "Update" => "تحديث",
                ],
                'License type page' => [
                    'License types' => 'انواع الرخص',
                    'Exam criteria' => 'معايير الاختبار',
                ],
                'Exam criteria page' => [
                    'Pass Percentage' => 'نسبة النجاح',
                    'Total Family' => 'اجمالي انواع الاسئلة',
                    'Add' => 'اضافة',
                ],
                'Add Exam criteria pop up' => [
                    'Pass Percentage' => 'نسبة النجاح',
                    'Duration (HH:MM)' => 'الوقت',
                    'Select license type' => 'اختيار نوع الرخصة',
                    'Total number of questions' => 'مجموع الاسئلة',
                    'Save and Next' => 'حفظ والتالي',
                    'Select family' => 'اختيار نوع الاسئلة',
                    'Select difficulty level' => 'اختيار مستوى الصعوبة',
                    'Eliminatory Question' => 'سؤال الرسوب الفوري',
                    'Add' => 'اضافة',
                ],
                'Instruction page' => [
                    'Instructions' => 'التعليمات',
                    'Update' => 'تحديث',
                ],
                'Sub license type page' => [
                    'Sub license types' => 'انواع الرخص الفرعية',
                ],
            ],
            "Super Admin" => [
                "others" => [
                    'Admin' => 'مدير النظام',
                    'Active Schools' => 'المدارس المفعلَة',
                    'Total Number of Active Schools' => 'اجمالي المدارس المفعلَة',
                    'How have your School, Students, Exams trended' => 'الاتجاه على وسائل التواصل الاجتماعي',
                    'Schools' => 'المدارس',
                    'School Wise Performance' => 'اداء المدرسة',
                    'Performance of the schools' => 'اداء المدارس',
                    'Days 15' => '15 يومًا',
                    'Days 30' => '30 يومًا',
                    'Days 7' => 'أيام 7',
                    'Manage Schools' => 'ادارة المدارس',
                    'Swap user' => 'بدل المستخدم',
                    'Search' => 'البحث',
                    'Search School' => 'بحث المدرسة',
                    'Student Details' => 'معلومات الطالب',
                    'Active Students' => 'الطلاب المفعَلين',
                    'Arabic' => 'العربية',
                    'English' => 'الانغليزية',
                    'Change Password' => 'تغيير كلمة السر',
                    'New password' => 'كلمة السر الجديدة',
                    'Current password' => 'كلمة السر الحالية',
                    'Full name' => 'الاسم الكامل',
                    'Update profile' => 'تحديث الملف الشخصي',
                    'Add student' => 'اضافة طالب',
                    'Previous' => 'سابق',
                    'Next' => 'التالي',
                    'Result' => 'النتيجة',
                    'Phone' => 'الهاتف',
                    'Email' => 'بريد إلكتروني',
                    'National ID' => 'رقم الهوية',
                    'Approved' => 'مقبول',
                    'Disapproved' => 'غير مقبول',
                    'Yes' => 'نعم',
                    'Cancel' => 'الغاء',
                    'Default' => 'الإعدادات الافتراضية',
                    'Are you sure to delete?' => 'هل انت متأكد من الحذف؟',
                    'You won\'t be able to revert this' => 'لن يمكنك الرجوع الى الخلف',
                    'Attended' => 'حضور',
                    'Passed' => 'نجاح',
                    'Failed' => 'رسوب',
                    'Registered Student' => 'طالب مسجًل',
                    'Status' => 'الحالة',
                    'View More' => 'المزيد',
                    'Exam Name' => 'اسم الاختبار',
                    'Select ID Type' => 'اختيار نوع الهوية',
                    'License' => 'رخصة',
                    'Select License Type' => 'اختر نوع الرخصة',
                    'Select Plan' => 'اختيار البرنامج',
                    'Select Level' => 'اختيار المستوى',
                    'Browse' => 'تصفَح',
                    'No results Found' => 'لا يوجد نتائج',
                    'General' => 'عام',
                    'Level' => 'مستوى',
                    'Choose Family' => 'اختير المجموعة',
                    'Select Question Type' => 'اختار نوع السؤال',
                    'Text' => 'النص',
                    'With Image' => 'مع صورة',
                    'With Video' => 'مع فيديو',
                    'All' => 'الجميع',
                    'Note' => 'ملاحظة',
                    'Eliminatory Question' => 'سؤال رسوب فوري',
                    'Records' => 'ملفَات',
                    'Gender' => 'الجنس',
                    'Today' => 'اليوم',
                    'Last 1 Week' => 'الاسبوع الماضي',
                    'Last 15 days' => 'آخر 15 يوم',
                    'Last 1 Month' => 'آخر شهر',
                    'MAC' => 'MAC',
                    'No Exam Criteria Available' => 'لا يوجد اعدادات للاختبار',
                    'Total Available Questions' => 'مجموع الاسئلة المتاحة',
                    'Search Language' => 'اللغة',
                    'View Profile' => 'رؤية الملف الشخصي',
                    'Sign out' => 'الخروج',
                    'Address' => 'العنوان',
                    'Full Name' => 'الاسم الكامل',
                    'Phone Number' => 'رقم الهاتف',
                    'Email Id' => 'بريد إلكتروني',
                    'Country' => 'البلد',
                    'Update Address' => 'تحديث العنوان',
                    'Basics' => 'اساسيات',
                ],
                "Dashboard" => [
                    "By country" => "حسب البلد",
                    "Welcome to Adimn Dashboard" => "مرحبًا بك في لوحة تحكم المسؤول",
                ],
                "Manage School" => [
                    "Additional Information" => "المعلومات الاضافية",
                    "Clone" => "استنساخ",
                    "Clone Question Pool" => "استنساخ كل الأسئلة",
                    "Contact" => "اتصال",
                    "Data fetching from DSMS" => "جلب البيانات من DSMS",
                    "Phone Number" => "رقم  الهاتف",
                    "Published" => "نشرت",
                    "Register of Commerce Number" => "رقم السجل التجاري",
                    "Select School" => "اختر المدرسة",
                    "Total Number of Active exam" => "العدد الاجمالي للاختبارات النشطة",
                    "Total Number of Licenses" => "العدد الاجمالي للرخص",
                    "Total Number of Students" => "العدد الاجمالي للطلاب",
                    "Total Number of Sub-License" => "العدد الاجمالي من للرخص الفرعية",
                    "UnPublished," => "لم تنشر",
                    "Web Link" => "رابط الموقع",
                ],
                'Student view result page' => [
                    'View results' => 'اظهار النتائج',
                    'Back' => 'الى الخلف',
                    'Answer Sheet' => 'صفحة الاجوبة',
                    'Student Name' => 'اسم المتدرب',
                    'School Name' => 'اسم المدرسة',
                    'National ID' => 'رقم الهوية',
                    'Exam Name' => 'اسم الاختبار',
                    'License Type' => 'نوع الرخصة',
                    'Sub License Type' => 'نوع الرخصة الفرعي',
                    'Total Questions' => 'اجمال الاسئلة',
                    'Correct Answers' => 'الاجوبة الصحيحة',
                    'Wrong Answers' => 'الاجوبة الخاطئة',
                    'Percentage' => 'النسبة',
                    'Duration' => 'الوقت',
                    'Mark' => 'النتيجة',
                    'Date' => 'التاريخ',
                    'Time' => 'الوقت',
                    'Gained' => 'الاجمالي',
                ],
                "Manage Students" => [
                    "Contact Number" => "رقم التواصل",
                    "Personal" => "شخصي",
                    "Student" => "الطالب",
                    "Student ID" => "هوية الطالب",
                    "City" => "المدينة",
                ],
                "Examination" => [
                    "Exam name" => "اسم الاختبار",
                    "Examination" => "الاختبار",
                    "Next" => "التالي",
                    "Prev" => "السابق",
                    "Active" => "مفعل",
                    "Inactive" => "غير مفعل",
                    "Sort By" => "ترتيب",
                ],
                "Settings" => [
                    "Fetching licence from DSMS" => "إحضار الترخيص من DSMS",
                    "Sort By" => "ترتيب حسب",
                ],
                'Families page' => [
                    'Families' => 'نوع الاسئلة',
                    'Name' => 'الاسم',
                    "Active" => "مفعل",
                    "Inactive" => "غير مفعل",
                ],
                'Language page' => [
                    "Active" => "مفعل",
                    "Inactive" => "غير مفعل",
                ],
                'Sub license type page' => [
                    'Sub license types' => 'انواع الرخص الفرعية',
                ],
            ],

            "Students Login" => [
                "Authenticated" => "مصدق",
                "Choose your preferred language" => "اختر لغتك المفضلة",
                "Device is autherized" => "الجهاز مصرح به",
                "Mock exam is not activated" => "لم يتم تنشيط الاختبار الوهمي",
                "No language Available" => "لا توجد لغة متاحة",
                "System Name" => "اسم النظام",
            ],
        ];

        return response()->json(['status' => true, "data" => $json], 200);

    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "email" => "required",
            "password" => "required",
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => false, 'message' => $validate->messages()], 422);
        }

        $res = Http::post('https://dsms.technoiq.in/backend/api/auth/superadmin_login', [
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($res['errors']) {
            return response()->json(["status" => false, "message" => $res["data"]["message"]], 401);
        }

        $user_id = Arr::get($res, "data.result.userdata.id");
        $role = Arr::get($res, "data.result.userdata.role");
        $school_id = Arr::get($res, "data.result.userdata.school_id");
        $token = Arr::get($res, "data.result.access_token");

        UserToken::create([
            "user_id" => $user_id,
            "role" => $role,
            "school_id" => $school_id,
            "token" => $token
        ]);
        return response()->json(['status' => true, 'message' => "Login Successfull", "data" => $res["data"]['result']], 200);
    }

    function getStudent($student_id)
    {
        $data = DB::table('sql_dsms_mentric.students')
            ->select('students.*', 'students.id_number as national_id', 'users.email', 'sub_license.name as sub_license_name', 'license_types.name as license_name')
            ->leftJoin('sql_dsms_mentric.users', 'users.id', 'students.user_id')
            ->leftJoin("sql_dsms_mentric.license_types", "students.license_type", 'license_types.id')
            ->leftJoin("sql_dsms_mentric.license_types as sub_license", "students.sub_license", 'sub_license.id')
            ->where('students.id', $student_id)
            ->get()->first();
        return response()->json(["status" => true, "message" => "student details", "data" => $data], 200);

    }

    function getSubLicense($license_id)
    {
        $data = DB::table('license_types')->where('parent_id', $license_id)->where('registration_status', 1)->where('deleted_status', 0)->get();
        foreach ($data as $da) {
            $da->image = env("DSMS_APP_URL") . $da->image;
        }
        return response()->json(["status" => true, "data" => $data], 200);
    }

    function getSchoolList()
    {
        $data = DB::table('schools')->select('id', 'name')->get();
        return response()->json(["status" => true, "message" => "school list", "data" => $data], 200);

    }

    function getStudentsList($school_id, Request $request)
    {
        $data = DB::table('sql_dsms_mentric.students')->select('students.*', 'users.email', 'students_answers_subs.id as reference_id', 'examinations.exam_name', 'sublicense.name as sub_license_name', 'license_types.name as license_name')
            ->join('sql_dsms_mentric.users', 'users.id', 'students.user_id')
            ->join('sql_em_mentric_uat22.students_answers_subs', "students_answers_subs.student_id", "students.id")
            ->join('sql_em_mentric_uat22.examinations', 'examinations.id', 'students_answers_subs.exam_id')
            ->join("sql_dsms_mentric.license_types", "students.license_type", 'license_types.id')
            ->leftJoin('license_types as sublicense', 'sublicense.id', 'examinations.sub_license_id')
            ->whereNotNull('students.user_id')
            ->where('total_marks', '>', 0)
            ->where('students.first_name_english', '!=', '')
            ->where('students.school_id', $school_id);

        if ($request->has('sortby') && $request->sortby) {
            if ($request->sortby == 1) {
                $data = $data->orderBy('first_name_english', 'asc');
            } else {
                $data = $data->orderBy('first_name_english', 'desc');
            }
        } else {
            $data = $data->latest('id');
        }

        if ($request->has('q') && $request->q) {
            $data = $data->where('first_name_english', 'LIKE', "%$request->q%")->orWhere('exam_name', 'LIKE', "%$request->q%");
        }

        if ($request->has('gender') && $request->gender) {
            $data = $data->where('users.gender', $request->gender);
        }

        if ($request->has('status') && $request->status) {
            if ($request->status == 1) {
                $data = $data->where("users.status", 1);
            } else {
                $data = $data->where("users.status", 0);
            }
        }

        if ($request->has('license_id') && $request->license_id) {
            $data = $data->where('license_type', $request->license_id);
        }

        $pagesize = ($request->has('pageSize') && $request->pageSize) ? $request->pageSize : 10;

        $data = $data->paginate($pagesize);

        return response()->json(["status" => true, "message" => "student List", "data" => $data], 200);

    }

    public function school_info($id)
    {
        $data = DB::table('schools')->select("schools.*", "countries.name as country_name", "cities.name as city_name", "users.email")
            ->join("users", "users.schools_id", "schools.id")
            ->join("cities", "cities.id", "schools.city_id")
            ->join("countries", "countries.id", "schools.country_id")
            ->where("schools.id", $id)
            ->where("users.role", 2)->first();

        $data->total_student = DB::table('students')->where("school_id", $id)->where('status', 1)->count();
        $data->total_license_type = DB::table('license_types')->whereNull("parent_id")->where("schools_id", $id)->count();
        $data->total_sub_license_type = DB::table('license_types')->whereNotNull("parent_id")->where("schools_id", $id)->count();

        $data->total_active_exams = Examination::where('school_id', $id)->where('status', 1)->count();


        return response()->json(["status" => true, "message" => "School Details", "data" => $data], 200);
    }

    public function student_lists($id, Request $request)
    {
        $list = DB::table('students')->selectRaw('students.*,COALESCE(students.first_name_english, "") as first_name_english, COALESCE(students.second_name_english, "") as second_name_english,COALESCE(sub_licesnse.name, "--") as sub_license_name,students.id_number as national_id,license_types.id as license_id,license_types.name as license_name, users.email,users.phone')
            ->join("users", "users.id", "students.user_id")
            ->join("license_types", "license_types.id", "students.license_type")
            ->leftJoin('license_types as sub_licesnse', 'sub_licesnse.id', 'students.sub_license')
            ->where('first_name_english', '!=', '');

        if ($id) {
            $list = $list->where('students.school_id', $id);
        } else {
            $list = $list->join('schools', 'students.school_id', 'schools.id')->addSelect('schools.name as school_name');
            if ($request->has('school_id') && $request->school_id) {
                $list = $list->where('schools.id', $request->school_id);
            }
        }
        if ($request->has('sortby') && $request->sortby) {
            if ($request->sortby == 1) {
                $list = $list->orderby('first_name_english', 'asc');
            } else {
                $list = $list->orderby('first_name_english', 'desc');
            }
        } else {
            $list = $list->latest("students.id");
        }
        if ($request->has('gender') && $request->gender) {
            $list = $list->where("users.gender", $request->gender);
        }
        if ($request->has("status") && $request->status != '') {
            $list = $list->where("students.status", $request->status);
        }
        if ($request->has("license_id") && $request->license_id) {
            $list = $list->where("students.license_type", $request->license_id);
        }
        if ($request->has('q') && $request->q) {
            $var = explode(' ', $request->q);

            foreach ($var as $key => $items) {
                if ($key == 0) {
                    $list = $list->where(function ($condition) use ($items, $request) {
                        $condition->where('students.first_name_english', 'LIKE', "%$items%")
                            ->orwhere('students.second_name_english', 'LIKE', "%$items%")
                            ->orwhere("users.email", "LIKE", "%$request->q%")
                            ->orwhere("users.phone", "LIKE", "%$request->q%")
                            ->orwhere('students.id', $request->q)
                            ->orwhere('students.id_number', "like", "%$request->q%");
                    });
                } else {
                    $list = $list->where(function ($condition) use ($items, $request) {
                        $condition->where('students.first_name_english', 'LIKE', "%$items%")
                            ->orwhere('students.second_name_english', 'LIKE', "%$items%")
                            ->orwhere("users.email", "LIKE", "%$request->q%")
                            ->orwhere("users.phone", "LIKE", "%$request->q%")
                            ->orwhere('students.id', $request->q)
                            ->orwhere('students.id_number', "like", "%$request->q%");
                    });
                }

            }
        }

        $list = $list->paginate($request->pageSize);

        return response()->json(["status" => true, "message" => "students List", "data" => $list], 200);



    }

    function examinationList()
    {
        $data = Examination::paginate(10);
        return response()->json(["status" => true, "message" => "Examinations List", "data" => $data], 200);
    }

    function getExamCriteriaList($school_id)
    {
        $data = Examination::select("examinations.exam_name", "examinations.id", "exam_criterias.total_questions", "exam_criterias.licence_id", "exam_criterias.sub_licence_id")
            ->join("exam_criterias", "exam_criterias.licence_id", "examinations.licence_id")
            ->where("examinations.school_id", $school_id)
            ->paginate(10);

        $res = Http::get("https://dsms.technoiq.in/backend/api/auth/student/get-name/" . $school_id);

        $license_names = $res["license_types"];
        $sub_licenses = $res["sub_licenses"];

        foreach ($data as $da) {
            $da->license_name = $license_names[$da->licence_id];
            $da->sub_license_name = $sub_licenses[$da->sub_licence_id];
        }

        return response()->json(["status" => true, "message" => "Exam criteria list", "data" => $data], 200);
    }


    function addLanguages($school_id)
    {
        $defaultLanguage = [
            ["school_id" => $school_id, "language_code" => "ar-XA", "language_name" => "Arabic", "native_language_name" => "العربية"],
            ["school_id" => $school_id, "language_code" => "bn-IN", "language_name" => "Bengali", "native_language_name" => "বাংলা"],
            ["school_id" => $school_id, "language_code" => "en-IN", "language_name" => "English", "native_language_name" => "English"],
            ["school_id" => $school_id, "language_code" => "hi-IN", "language_name" => "Hindi", "native_language_name" => "हिन्दी"],
            ["school_id" => $school_id, "language_code" => "kn", "language_name" => "Kannada", "native_language_name" => "ಕನ್ನಡ"],
            ["school_id" => $school_id, "language_code" => "la", "language_name" => "Latin", "native_language_name" => "latine / lingua latina"],
            ["school_id" => $school_id, "language_code" => "ml-IN", "language_name" => "Malayalam", "native_language_name" => "മലയാളം"],
            ["school_id" => $school_id, "language_code" => "ta-IN", "language_name" => "Tamil", "native_language_name" => "தமிழ்"],
            ["school_id" => $school_id, "language_code" => "fil-PH", "language_name" => "Tagalog", "native_language_name" => "Wikang Tagalog"],
            ["school_id" => $school_id, "language_code" => "ur", "language_name" => "Urdu", "native_language_name" => "اردو"]
        ];

        foreach ($defaultLanguage as $df) {
            $ch = Language::where('language_code', $df['language_code'])->where('school_id', $school_id)->count();
            if ($ch == 0) {
                Language::create($df);
            }
        }
    }


    function startClone($data, $from, $to)
    {

        foreach ($data as $da) {
            $cloneFamily = family::find($da->family_id);


            $family_id = family::updateOrCreate(
                ['family_name' => $cloneFamily->family_name, 'school_id' => $to],
                [
                    "status" => $cloneFamily->status,
                    "default_family" => $cloneFamily->default_family
                ]
            )->id;

            $cloneDiffucultyLevel = DifficultyLevelMarks::where('level_id', $da->difficulty_level_id)->where('school_id', $from)->get()->first();


            DifficultyLevelMarks::updateOrCreate(["level_id" => $da->difficulty_level_id, "school_id" => $to], [
                "marks" => $cloneDiffucultyLevel->marks,
            ]);

            $main_pool_id = MainQuestionPool::insertGetId([
                "school_id" => $to,
                "marks" => $da->marks,
                "family_id" => $family_id,
                "difficulty_level_id" => $da->difficulty_level_id,
                "image" => $da->image,
                "video" => $da->video,
                "eliminatory_question" => $da->eliminatory_question,
                "no_shuffle" => $da->no_shuffle,

            ]);

            $getLang = MainQuestionPool::select('languages_question_pools.language_id')
                ->join('languages_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                ->where("school_id", $from)
                ->where('languages_question_pools.main_question_pool_id', $da->id)->distinct('languages_question_pools.language_id')->get();

            foreach ($getLang as $lang) {
                $cloneLang = Language::find($lang->language_id);

                $lang_id = Language::updateOrCreate(["language_code" => $cloneLang->language_code, "school_id" => $to], [
                    "native_language_name" => $cloneLang->native_language_name,
                    "language_name" => $cloneLang->language_name,
                    "default_language" => $cloneLang->default_language,
                    "status" => $cloneLang->status
                ])->id;

                $question = LanguagesQuestionpool::select('id', 'question')
                    ->where('main_question_pool_id', $da->id)
                    ->where('language_id', $lang->language_id)->get()->first();

                $pool_id = LanguagesQuestionPool::insertGetId([
                    "main_question_pool_id" => $main_pool_id,
                    "question" => $question->question,
                    "language_id" => $lang_id
                ]);

                $options = Option::where("question_pool_id", $question->id)->get();

                foreach ($options as $option) {
                    Option::create([
                        "question_pool_id" => $pool_id,
                        "option_name" => $option->option_name,
                        "is_correct" => $option->is_correct,
                    ]);
                }
            }
        }
    }

    function cloneQuestionPool(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "from_school_id" => "required",
            "to_school_id" => "required",
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => false, 'message' => $validate->messages()], 422);
        }

        if ($request->from_school_id == $request->to_school_id) {
            return response()->json(["status" => false, "message" => "Both school IDs must be unique."], 200);
        }

        $this->addLanguages($request->to_school_id);

        $data = MainQuestionPool::select('main_question_pools.*')
            ->join('languages_question_pools', 'languages_question_pools.main_question_pool_id', 'main_question_pools.id')
            ->join('languages', 'languages.id', 'languages_question_pools.language_id')
            ->where('languages.default_language', 1)
            ->where("main_question_pools.school_id", $request->from_school_id)->chunk(500, function ($record) use ($request) {
                // dispatch(new cloneJob($record, $request->from_school_id, $request->to_school_id));
                DB::transaction(function () use ($request, $record) {
                    $this->startClone($record, $request->from_school_id, $request->to_school_id);
                });
            });

        if ($data) {

            return response()->json(["status" => true, "message" => "Cloneing has succussfully completed."], 200);

        } else {
            return response()->json(["status" => false, "message" => "Question Pool Not Found!"], 200);
        }


    }

}