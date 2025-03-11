<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::get('/event',[EventController::class,'getEvent'])->name('event');
Route::post('/event/add',[EventController::class,'saveEvent'])->name('event-save');
Route::get('/event/{id}',[EventController::class,'editEvent']);
Route::put('/event/update/{id}',[EventController::class,'updateEvent'])->name('event-update');
Route::delete('/event/delete/{id}',[EventController::class,'deleteEvent']);

Route::get('/listevent/{filter}',[EventController::class,'listEvent'])->name('listevent');