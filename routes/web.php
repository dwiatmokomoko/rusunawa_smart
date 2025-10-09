<?php

use App\Http\Controllers\feature\bo\auth\AuthenticationController;
use App\Http\Controllers\feature\bo\criteria\CriteriaController;
use App\Http\Controllers\feature\bo\dashboard\DashboardController;
use App\Http\Controllers\feature\bo\data_testing\DataTestingController;
use App\Http\Controllers\feature\bo\data_training\DataTrainingController;
use App\Http\Controllers\feature\bo\sub_criteria\SubCriteriaController;
use App\Http\Controllers\feature\bo\user\UserController;
use App\Http\Controllers\feature\fo\home\Home_foController;
use App\Http\Controllers\feature\fo\about\About_foController;
use App\Http\Controllers\feature\fo\contact\Contact_foController;
use App\Http\Controllers\feature\fo\count\CountController;
use App\Http\Controllers\feature\fo\count\PreEligibilityController;
use App\Http\Controllers\feature\fo\ourteam\Ourteam_foController;
use App\Http\Controllers\feature\fo\diagnosis\DiagnosisController;
use Illuminate\Support\Facades\Route;




//bo
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['guest:admin']], function () {
        Route::get('/login', [AuthenticationController::class, 'index'])->name('admin.login');
        Route::post('/login', [AuthenticationController::class, 'auth'])->name('admin.auth');
    });

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.home');
        Route::post('/logout', [AuthenticationController::class, 'logout'])->name('admin.logout');

        Route::resource('/criteria', CriteriaController::class);
        Route::get('criterias', [CriteriaController::class, 'datas'])->name("criterias.data");

        Route::resource('/sub-criteria', SubCriteriaController::class);
        Route::get('sub-criterias', [SubCriteriaController::class, 'datas'])->name("sub-criterias.data");

        Route::resource('/data-training', DataTrainingController::class);
        Route::get('data-trainings', [DataTrainingController::class, 'datas'])->name("data-trainings.data");

        Route::resource('/data-testing', DataTestingController::class);
        Route::get('data-testings', [DataTestingController::class, 'datas'])->name("data-testings.data");

        Route::resource('/user', UserController::class);
        Route::get('users', [UserController::class, 'datas'])->name("users.data");
    });
});

//fo
Route::get('/', [Home_foController::class, 'index'])->name('fo.home.index');
Route::get('/about', [About_foController::class, 'index'])->name('fo.about.index');
Route::get('/contact', [Contact_foController::class, 'index'])->name('fo.contact.index');

Route::get('/pra-kelayakan', function () {return view('feature.fo.count.pre_eligibility');})->name('pre-eligibility.form');

Route::post('/pra-kelayakan/check', [PreEligibilityController::class, 'check'])->name('pre-eligibility.check');


Route::get('/count', [CountController::class, 'index'])->name('fo.count.index');
Route::post('/count', [CountController::class, 'predict'])->name('fo.count.predict');
Route::get('/ourteam', [Ourteam_foController::class, 'index'])->name('fo.ourteam.index');
Route::get('/diagnosis/register', [DiagnosisController::class, 'showRegistrationForm'])->name('fo.diagnosis.register');
Route::post('/diagnosis/register', [DiagnosisController::class, 'register'])->name('fo.diagnosis.register.submit');
Route::get('/diagnosis', [DiagnosisController::class, 'showDiagnosisForm'])->name('feature.fo.diagnosis.index');
Route::post('/diagnosis/submit', [DiagnosisController::class, 'submit'])->name('feature.fo.diagnosis.submit');


