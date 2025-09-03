<?php

use App\Http\Controllers\Api\ApiAboutTeamController;
use App\Http\Controllers\Api\ApiCareerController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiClientsController;
use App\Http\Controllers\Api\ApiCompanyController;
use App\Http\Controllers\Api\ApiContactController;
use App\Http\Controllers\Api\ApiGalleryController;
use App\Http\Controllers\Api\ApiJobController;
use App\Http\Controllers\Api\ApiMainController;
use App\Http\Controllers\Api\ApiMessagesController;
use App\Http\Controllers\Api\ApiNewsController;
use App\Http\Controllers\Api\ApiPortofolioController;
use App\Http\Controllers\Api\ApiProfileSettingController;
use App\Http\Controllers\Api\ApiReviewController;
use App\Http\Controllers\Api\ApiServiceController;
use App\Http\Controllers\Api\ApiValueController;
use App\Http\Controllers\Api\ApiVisionMissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FixPortoImageController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/about/teams', [ApiAboutTeamController::class, 'index']);
Route::get('/career', [ApiCareerController::class, 'index']);
Route::get('/career/{id}', [ApiCareerController::class, 'show']);
Route::get('/category', [ApiCategoryController::class, 'index']);
Route::get('/about/clients', [ApiClientsController::class, 'index']);
Route::get('/profile-setting', [ApiCompanyController::class, 'index']);
Route::get('/contact', [ApiContactController::class, 'index']);
Route::get('/gallery', [ApiGalleryController::class, 'index']);
Route::get('/job', [ApiJobController::class, 'index']);
Route::get('/about/main', [ApiMainController::class, 'index']);
Route::get('/messages', [ApiMessagesController::class, 'index']);
Route::get('/news', [ApiNewsController::class, 'index']);
Route::get('/news/{id}', [ApiNewsController::class, 'show']);
Route::get('/portofolio', [ApiPortofolioController::class, 'index']);
Route::get('/portofolio/{id}', [ApiPortofolioController::class, 'show']);
Route::get('/profile', [ApiProfileSettingController::class, 'index']);
Route::get('/review', [ApiReviewController::class, 'index']);
Route::get('/service', [ApiServiceController::class, 'index']);
Route::get('/value', [ApiValueController::class, 'index']);
Route::get('/vision', [ApiVisionMissionController::class, 'index']);
