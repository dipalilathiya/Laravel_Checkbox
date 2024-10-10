<?php
use App\Http\Controllers\usercontroller;
use App\Models\Tbluser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formview',[usercontroller::class,'formview'])->name('formview');
Route::post('/create',[usercontroller::class,'create'])->name('create');
Route::get('/viewdata',[usercontroller::class,'viewdata'])->name('viewdata');
Route::get('/edit/{id}',[usercontroller::class,'edit'])->name('edit');
Route::get('/delete/{id}',[usercontroller::class,'delete'])->name('delete');
// Route::get('/search',[usercontroller::class,'search'])->name('search');
Route::get('/header', function (){
            return view('layout/header');
});
