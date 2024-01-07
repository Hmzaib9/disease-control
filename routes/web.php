<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ {
    admin\AdminController,
    admin\LocationsController,
    admin\InstitutionsController,
    admin\LabTestsController,
    admin\PredefinedTestsController,
    admin\JoinRequestsController,
    authentication\admin\AdminAuthController,
    admin\NormalRangeController,
    admin\TestCategoriesController
};
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
//Auth Routes
Route::get('login', [AdminAuthController::class , 'login']);
Route::post('submit_login', [AdminAuthController::class , 'login_submit']);

//Admin Routes
Route::prefix('admin')->middleware('admin_check')->group(function () {
    Route::get('/',[AdminController::class, 'index']);
    Route::resource('/locations', LocationsController::class);
    Route::resource('/institutions', InstitutionsController::class);
    Route::resource('/lab_test', LabTestsController::class);
    Route::resource('/predefined_tests', PredefinedTestsController::class);
    Route::get('/normal_ranges/{id}', [NormalRangeController::class,'index'])->name('normal_ranges.index');
    Route::get('/normal_ranges/{id}/create', [NormalRangeController::class,'create'])->name('normal_ranges.create');
    Route::post('/normal_ranges/store', [NormalRangeController::class,'store'])->name('normal_ranges.store');
    Route::get('/normal_ranges/{id}/edit', [NormalRangeController::class,'edit'])->name('normal_ranges.edit');
    Route::delete('/normal_ranges/{id}', [NormalRangeController::class,'destroy'])->name('normal_ranges.destroy');
    Route::put('/normal_ranges/{id}/update', [NormalRangeController::class,'update'])->name('normal_ranges.update');
    Route::get('/medical_tests', [LabTestsController::class,'index'])->name('tests.index');
    Route::get('/medical_tests/{category_id}', [LabTestsController::class,'view_tests_by_category_id'])->name('tests.cat');
    Route::get('/medical_tests/{medical_number}', [LabTestsController::class,'show_tests_by_medical_number'])->name('tests.show');
    Route::post('/search', [LabTestsController::class,'search'])->name('search');

    Route::resource('/test_categories',TestCategoriesController::class);

    Route::resource('/labs_tests', LabTestsController::class);
    Route::get('/join_requests', [JoinRequestsController::class, 'index'])->name('join.index');
    Route::post('/join_refuse', [JoinRequestsController::class, 'refuse_request'])->name('join.refuse');
    Route::post('/join_accept', [JoinRequestsController::class, 'accept_request'])->name('join.accept');
    Route::get('/join_show', [JoinRequestsController::class, 'show_request'])->name('join.show');

});

