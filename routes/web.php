<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ROTTE PUBLIC CONTROLLER
Route::get('/',[PublicController::class,'welcome'])->name('welcome');
Route::get('/categoria/{category}',[PublicController::class,'categoryShow'])->name('categoryShow');
Route::get('/ricerca/annuncio', [PublicController::class, 'searchAnnouncement'])->name('announcements.search');



// ROTTE ANNOUNCEMENT CONTROLLER
Route::middleware(['auth'])->group(function(){
    Route::get('/nuovo/annuncio', [AnnouncementController::class, 'create'])->name('announcement.create');
    Route::get('/lavora/con/noi',[PublicController::class, 'workWithUs'])->name('revisor.work');
});

Route::get('/dettaglio/annuncio/{announcement}', [AnnouncementController::class,'showAnnouncement'])->name('announcement.show');
Route::get('/tutti/annunci',[AnnouncementController::class,'indexAnnouncement'])->name('announcement.index');


// ROTTE REVISOR CONTROLLER
Route::middleware(['isRevisor'])->group(function(){
    Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
    Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');
    Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');    
});

Route::get('/makerevisor/{user}', [RevisorController::class , 'makeRevisor'])->name('makeRevisor');
Route::post('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');

// rotta lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');


//CRUD

Route::get('/announcement/{id}/edit' , [AnnouncementController::class , 'edit'])->name('announcement.edit');

Route::delete('/announcement/delete/{announcement}' , [AnnouncementController::class, 'destroy'])->name('announcement.delete');





