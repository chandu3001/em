<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\DifficultyLevelMarksController;
use App\Http\Controllers\QuestionPoolController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserTokenController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\ExamCriteriaController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AuthenticatorController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\InstructionsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\reportController;


Route::get("total-exams/{id?}", [ExaminationController::class, "getTotalExams"]);
Route::get("total-active-exams/{id}", [ExaminationController::class, "getTotalActiveExams"]);
Route::get("get-application", [ExaminationController::class, "downloadExe"]);
Route::get('reports/{school_id}', [reportController::class, 'index']);
Route::get("/get-templete", [QuestionPoolController::class, "getTemplete"]);
Route::get("/get-setup/{school_id}", [QuestionPoolController::class, "getSetup"]);
Route::post("/import-default-questions/{school_id}", [QuestionPoolController::class, "importDefaultQuestions"]);
Route::get("/get-lang", [SuperAdminController::class, 'getTranslation']);

//User token

Route::post('/schooladmin/login', [UserTokenController::class, 'store']);
Route::post('/student/login', [StudentsController::class, 'login']);
Route::post('superadmin/login', [SuperAdminController::class, 'login']);

Route::post('encript-data', [AuthenticatorController::class, "encriptRequest"]);
Route::post('request-reset-password-link', [UserTokenController::class, 'resetLink']);

// ----------------------------------------------------------------------------------

Route::middleware(['shield'])->group(function () {

    // Families Route

    // add family
    Route::post('/add-family', [FamilyController::class, 'store']);

    // update family
    Route::patch('/update-family', [FamilyController::class, 'update']);

    Route::get('/total-family-questions/{id}', [FamilyController::class, 'getTotalQuestions']);


    // Update status
    Route::patch('/update-family-status', [FamilyController::class, 'update_status']);


    // show family list with pagination
    Route::get('/family/{school_id}/list-with-pagination', [FamilyController::class, 'show']);
    Route::get('/family/{school_id}/list', [FamilyController::class, 'list']);


    //get Row by id
    Route::get('/family/{id}', [FamilyController::class, 'getRow']);

    // delete family
    Route::delete('/delete-family', [FamilyController::class, 'delete']);

    // -----------------------------------------------------------------------------------------

    // difficulty level Routes

    // difficulty level marks update
    Route::patch('/update-difficulty-level', [DifficultyLevelMarksController::class, 'store']);
    // show all difficulty levels
    Route::get('/difficulty-level/list/{school_id}', [DifficultyLevelMarksController::class, 'show']);

    Route::post('/total-difficulty-questions/{diff_id}', [DifficultyLevelMarksController::class, 'getTotalQuestions']);
    Route::get('get-difflevels-by-family-id/{family_id}', [DifficultyLevelMarksController::class, 'getDiffLevelsByFamilyId']);
    Route::post('get-difflevels-by-family-ids', [DifficultyLevelMarksController::class, 'getDiffLevelsByFamilyIds']);

    // ----------------------------------------------------------------------------------------------

    // Question pool Routes

    Route::post('/add-question-pool', [QuestionPoolController::class, 'store']);
    Route::patch('/update-question-pool', [QuestionPoolController::class, 'update']);
    Route::delete('/delete-question-pool', [QuestionPoolController::class, 'delete']);
    Route::get('/question-pool/{school_id}/list', [QuestionPoolController::class, 'show']);
    Route::get('/question-pool/{id}', [QuestionPoolController::class, 'getRow']);
    Route::delete('/question-pool/media-delete', [QuestionPoolController::class, 'mediaDelete']);
    Route::post('/add-native-question-pool', [QuestionPoolController::class, 'storeNative']);
    Route::get('get-native-question-by-language-id/{language_id}/{pool_id}', [QuestionPoolController::class, 'getDetails']);
    Route::get('options-count/{pool_id}', [QuestionPoolController::class, 'getOptionsCount']);
    Route::post('get-total-eliminatory-questions', [QuestionPoolController::class, 'getTotalElimentaryQuestionCount']);
    Route::get("/def_language/{pool_id}", [QuestionPoolController::class, "deflanguague"]);
    Route::post("/get-templete", [QuestionPoolController::class, "getTemplete"]);
    Route::post("/bulk-upload", [QuestionPoolController::class, "bulkUpload"]);
    Route::get("/get-questiontype-by-family-id-diff-id/{fam_id}/{diff_id}", [QuestionPoolController::class, "getQuestionTypeByfamIdDiffId"]);

    // --------------------------------------------------------------------------------------

    // Language Route

    // add language
    Route::post('/add-language', [LanguageController::class, 'store']);

    // update language
    Route::patch('/update-language', [LanguageController::class, 'update']);

    // Update status
    Route::patch('/update-language-status', [LanguageController::class, 'update_status']);

    // show language list with pagination
    Route::get('/language/{school_id}/list', [LanguageController::class, 'show']);
    Route::get('language/{school_id}/pagination', [LanguageController::class, 'show_with_pagination']);

    Route::get('/language/{school_id}/active_list', [LanguageController::class, 'show_active']);


    // delete language
    Route::delete('/delete-language', [LanguageController::class, 'delete']);

    //get Row by id
    Route::get('/language/{id}', [LanguageController::class, 'getRow']);

    Route::patch('/language/make-default-language', [LanguageController::class, 'makeDefaultLang']);
    Route::get('/language/check-default-language/{school_id}', [LanguageController::class, 'CheckDefaultLanguage']);

    // ----------------------------------------------------------------------------------------------------

    // examination Route

    // add examination
    Route::post('/add-examination', [ExaminationController::class, 'store']);

    // update examination
    Route::patch('/update-examination', [ExaminationController::class, 'update']);

    // Update status
    Route::patch('/update-examination-status', [ExaminationController::class, 'update_status']);


    // show examination list with pagination
    Route::get('/examination/{school_id}/list', [ExaminationController::class, 'show']);

    // delete examination
    Route::delete('/delete-examination', [ExaminationController::class, 'delete']);

    //get Row by id
    Route::get('/examination/{id}', [ExaminationController::class, 'getRow']);

    Route::get('/exam-result/{exam_id}', [ExaminationController::class, 'getExamResult']);

    Route::get('/validate-license', [ExaminationController::class, 'validateLicense']);
    Route::POST('change-mock-exam-status', [ExaminationController::class, 'changeMockExamStatus']);

    Route::get('/relevent-questions/{id}', [ExaminationController::class, "releventquestions"]);


    // ---------------------------------------------------------------------------------------------------

    // Exam Criteria Routes

    //Add Exam Criteria
    Route::post('/add-exam-criteria', [ExamCriteriaController::class, 'store']);
    Route::patch('/update-exam-criteria', [ExamCriteriaController::class, 'update']);
    Route::get('/exam-criteria/{id}', [ExamCriteriaController::class, 'edit']);
    Route::get('/exam-criteria-list/{school_id}/{license_id}', [ExamCriteriaController::class, 'show']);
    Route::delete('/delete-exam-criteria', [ExamCriteriaController::class, 'delete']);
    Route::post('/exam-criteria-validation', [ExamCriteriaController::class, 'examcriteriavalidation']);
    Route::get('/get-valid-famillies/{school_id}', [ExamCriteriaController::class, 'getValidFamilies']);
    Route::get('/get-valid-difficulty_levels/{school_id}', [ExamCriteriaController::class, 'getValidDiffLevels']);
    Route::get('/get-valid-sub-license-by-license-id/{license_id}', [ExamCriteriaController::class, 'getValidSubLicense']);
    Route::get('/get-total-available-question-count/{school_id}', [ExamCriteriaController::class, 'getTotalQuestionCount']);


    //Authenticator Routes

    Route::post("/add-authenticator", [AuthenticatorController::class, 'store']);
    Route::get("/authenticator/{id}/list", [AuthenticatorController::class, 'show']);
    Route::delete("/delete-authenticator", [AuthenticatorController::class, 'delete']);
    Route::patch("/update-status-authenticator", [AuthenticatorController::class, 'status_update']);
    Route::post("/get-authenticator-credentials", [AuthenticatorController::class, 'getAuthenticatorId']);

    // Manage Students Route

    Route::post('get-questions', [StudentsController::class, 'get_questions']);
    Route::post('gett-questions', [StudentsController::class, 'gett_questions']);
    Route::get('get-valid-languages/{license_id}/{sub_license_id}', [StudentsController::class, 'getValidLanguages']);
    Route::post('save-answer', [StudentsController::class, 'saveAnswer']);
    Route::post('result', [StudentsController::class, 'validateExam']);
    Route::post('exam-preview', [StudentsController::class, 'examPreview']);
    Route::post('system-validation', [StudentsController::class, 'systemValidation']);
    Route::post('mock-exam-status', [StudentsController::class, 'mockExamStatus']);
    Route::get('get-student-license/{student_id}', [StudentsController::class, 'getStudentLicenseTypes']);
    Route::get('get-sub-license-by-license-id-student_id/{license_id}/{student_id}', [StudentsController::class, 'getStudentSubLicenseTypes']);

    //Dashboard Route

    Route::get('get-dashboard-details/{school_id}', [DashboardController::class, 'overview']);

    //Reports Routes
    Route::get('get-students-by-school-id/{school_id}', [reportController::class, 'getStudents']);
    Route::post('get-exams-by-school-ids', [reportController::class, 'getExamBySchoolIds']);
    Route::post('get-language-by-exam-ids', [reportController::class, 'getLanguagesByExamIds']);
    Route::post('get-license-by-school-ids', [reportController::class, 'getLicenseBySchoolIds']);
    Route::get('get-students-by-gender-school-id/{gender_id}', [reportController::class, 'getstudentsByGender']);

    // Super Admin Routes

    Route::prefix('superadmin')->group(function () {
        Route::get('examination/{school_id}/list', [ExaminationController::class, 'show']);
        Route::get('examination-criteria-list/{school_id}', [SuperAdminController::class, 'getExamCriteriaList']);
        Route::get('/exam-result/{exam_id}', [ExaminationController::class, 'getExamResult']);
        Route::post('/clone-question-pool', [SuperAdminController::class, 'cloneQuestionPool']);
        Route::get('/school-list', [SuperAdminController::class, 'getSchoolList']);
    });

    Route::get('/student-list-by-school-id/{school_id}', [SuperAdminController::class, 'getStudentsList']);
    Route::get('/students-by-school-id/{school_id}', [SuperAdminController::class, 'student_lists']);
    Route::get('student/details/{student_id}', [SuperAdminController::class, 'getStudent']);
    Route::get('get-sublicense-by-license-id/{license_id}', [SuperAdminController::class, 'getSubLicense']);
    Route::get('/school_info/{id}', [SuperAdminController::class, 'school_info']);

    Route::get('get-instruction/{id}/{school_id}', [InstructionsController::class, 'getIntruction']);
    Route::post('add-instruction', [InstructionsController::class, 'add']);
    Route::delete('delete-instruction', [InstructionsController::class, 'delete']);
    Route::patch('update-instruction', [InstructionsController::class, 'update']);


});