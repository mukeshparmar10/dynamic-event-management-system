<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', [AdminController::class,'index'])->name('root');
Route::get('/add-event',function(){
    return view('add-event');
});

Route::get('/event-view-edit/{id}',function($id){
    return view('view-edit-event',['id'=>$id]);
});
