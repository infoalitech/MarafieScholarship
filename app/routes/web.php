<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\ApplicantController;
use App\Http\Controllers\web\GuardianController;
use App\Http\Controllers\web\EducationalExperienceController;
use App\Http\Controllers\web\ScholarshipController;
use App\Http\Controllers\web\CurrentSemesterComtroller;
use App\Http\Controllers\web\ExportController as WebExportController;
use App\Http\Controllers\web\DegreeProgramController;
use App\Http\Controllers\web\StudyFieldController;
use App\Http\Controllers\Admin\AdminController;


use App\Http\Controllers\Admin\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\ExportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Export routes for scholarship details
Route::prefix('admin/export')->group(function () {
    Route::get('/all/{id}', [ExportController::class, 'all'])->name('export.all');
    Route::get('/pending/{id}', [ExportController::class, 'pending'])->name('export.pending');
    Route::get('/accepted/{id}', [ExportController::class, 'accepted'])->name('export.accepted');
    Route::get('/rejected/{id}', [ExportController::class, 'rejected'])->name('export.rejected');
    Route::get('/review/{id}', [ExportController::class, 'review'])->name('export.review');
});

Route::get('/export_fresh',[WebExportController::class,'fresh'])->name('export_fresh');
Route::get('/export_renewal',[WebExportController::class,'Renewal'])->name('export_renewal');
Route::get('/freshGeneral',[WebExportController::class,'freshGeneral'])->name('freshGeneral');
Route::get('/renewalGeneral',[WebExportController::class,'renewalGeneral'])->name('renewalGeneral');
Route::get('/freshSadaat',[WebExportController::class,'freshSadaat'])->name('freshSadaat');
Route::get('/renewalSadaat',[WebExportController::class,'renewalSadaat'])->name('renewalSadaat');
Route::get('/freshAbshaar',[WebExportController::class,'freshAbshaar'])->name('freshAbshaar');
Route::get('/renewalAbshaar',[WebExportController::class,'renewalAbshaar'])->name('renewalAbshaar');



Route::get('/admin/applicants',[AdminController::class,'index'])->name('admin.applicants');
Route::get('/admin/scholarships',[AdminController::class,'scholarships'])->name('admin.scholarships');
Route::get('/admin/scholarships/applicant/{id}',[AdminController::class,'scholarship_applicants'])->name('admin.scholarships.index');
Route::get('/admin/scholarships/applicant/show/{id}',[AdminController::class,'show'])->name('admin.scholarship.applicant.show');
Route::post('/admin/scholarships/applicant/show/accept/',[AdminController::class,'update'])->name('admin.applicant.detail.update');


Route::get('/admin/scholarships/applicant/accepted/{id}',[AdminController::class,'scholarshipApplicantAccepted'])->name('admin.scholarships.accepted');
Route::get('/admin/scholarships/applicant/rejected/{id}',[AdminController::class,'scholarshipApplicantRejected'])->name('admin.scholarships.rejected');
Route::get('/admin/scholarships/applicant/review/{id}',[AdminController::class,'scholarshipApplicantReview'])->name('admin.scholarships.review');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/dashboard2', function () {
    return view('dashboard2');
})->middleware(['auth'])->name('dashboard2');
Route::prefix('admin')->group(function() {
    // List all users
    Route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
    
    // Create a new user (show create form)
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.user.create');
    
    // Store the new user (form submission)
    Route::post('/users', [UserController::class, 'store'])->name('admin.user.store');
    
    // Show the edit form for a specific user
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    
    // Update an existing user (form submission)
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('admin.user.show');
    
    // Delete a user
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
});
Route::middleware('auth')->group(function () {

    Route::resource('/personal_info',ApplicantController::class);
    Route::resource('/guardian_detail',GuardianController::class);
    Route::resource('/educational_record',EducationalExperienceController::class);
    Route::resource('/scholarship',ScholarshipController::class);
    Route::resource('/current',CurrentSemesterComtroller::class);

    Route::resource('/study_field',StudyFieldController::class);
    Route::resource('/degree_field',DegreeProgramController::class);


    

    // scholarship

});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


require __DIR__.'/auth.php';
