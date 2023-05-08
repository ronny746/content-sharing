<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\JoinGroupController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Help;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NotificationModelController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[Controller::class,'Register']);

Route::post('/login',[Controller::class,'Login']);

Route::post('/update',[Controller::class,'update']);
Route::post('/createGroup',[GroupsController::class,'createGroup']);
Route::post('/join-create',[JoinGroupController::class,'joinGroup']);
Route::get('/get-communit/{data}',[GroupsController::class,'getCommunity']);
Route::post('/my-group',[GroupsController::class,'mygroup']);
Route::post('/joinmy-group',[JoinGroupController::class,'joinMyGroup']);
Route::delete('/delete/{id}',[AdminController::class,'delete']);
Route::get('/allgroup',[GroupsController::class,'allgroups']);
Route::get('/groupbyId/{id}',[GroupsController::class,'groupById']);
Route::get('/students',[Controller::class,'allstudents']);
Route::get('/teachers',[Controller::class,'allteachers']);
Route::get('/alluser',[Controller::class,'alluser']);
Route::get('/staff',[Controller::class,'allstaff']);
Route::post('/send-feedback',[FeedbackController::class,'create']);
Route::get('/contact-us',[Help::class,'contactus']);

Route::get('/about-us',[Help::class,'aboutus']);
Route::get('/privacy-policy',[Help::class,'privacy']);

Route::get('/term-condition',[Help::class,'termcondition']);


Route::post('/send-public-notification',[NotificationModelController::class,'notifyuser']);
Route::post('/send-group-message',[MessageController::class,'groupMessage']);
Route::post('/update-request',[MessageController::class,'updateRequest']);
Route::post('/send_request',[MessageController::class,'sendRequest']);
Route::get('/get-group-message/{group_id}',[MessageController::class,'getGroupmessage']);
Route::get('/get-requests',[MessageController::class,'getRequest']);
Route::delete('/delete-message/{id}',[MessageController::class,'destroy']);
Route::delete('/delete-request/{id}',[MessageController::class,'deletRequest']);
Route::get('/get-allnotification',[NotificationModelController::class,'getallNotification']);

Route::post('/send-otp',[Controller::class,'sendOtp']);
//Route::post('/send-otp',[Controller::class,'sendOtp']);