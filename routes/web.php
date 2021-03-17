<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructionsController;

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

// Kotisivu
Route::get('/', [HomeController::class, 'index'])->name('home');

// Ideat
Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas');

//Käyttöohjeet
Route::get('/instructions', [InstructionsController::class, 'index'])->name('instructions');

// Kirjautuneet käyttäjät
Route::group(['middleware' => 'auth'], function () {

    // Käyttäjän asetukset
    Route::get('/settings', [UserController::class, 'settings'])->name('settings');

    // Salasanan vaihto
    Route::post('/settings', [UserController::class, 'change_password'])->name('change_password');

    // Uloskirjautuminen
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

});

// Kirjautuneet käyttäjät, paitsi admin
Route::group(['middleware' => 'auth.not.admin'], function () {

        // Idean tiedot
        Route::get('/idea', [IdeaController::class, 'show_idea'])->name('idea');
    
        // Idean lisäys
        Route::get('/add-idea', [IdeaController::class, 'add_idea'])->name('add_idea');
        Route::post('/add-idea', [IdeaController::class, 'insert']);
    
        // Idean muokkaus
        Route::get('/edit-idea', [IdeaController::class, 'edit_idea'])->name('edit_idea');
        Route::post('/edit-idea', [IdeaController::class, 'alter']);
    
        // Idean poisto
        Route::post('/remove-idea', [IdeaController::class, 'delete'])->name('remove_idea');
    
        //Tiimijäsenen lisäys ideaan
        Route::post('/add-member', [MembershipController::class, 'insert'])->name('add_member');
    
        // Tiimijäsenen poisto ideasta
        Route::post('/remove-member', [MembershipController::class, 'delete'])->name('remove_member');
    
        // Yhteystiedot
        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    
        // Yhteystiedon tiedot
        Route::get('/contact', [ContactController::class, 'show_contact'])->name('contact');
    
        // Yhteystietojen lisäys
        Route::get('/add-contact', [ContactController::class, 'add_contact'])->name('add_contact');
        Route::post('/add-contact', [ContactController::class, 'insert']);
    
        // Yhteystiedon muokkaus
        Route::get('/edit-contact', [ContactController::class, 'edit_contact'])->name('edit_contact');
        Route::post('/edit-contact', [ContactController::class, 'alter']);
    
        // Yhteystiedon poisto
        Route::post('/remove-contact', [ContactController::class, 'delete'])->name('remove_contact');

});

// Admin-käyttäjä
Route::group(['middleware' => 'admin'], function () {

    //Käyttäjät
    Route::get('/users', [UserController::class, 'index'])->name('users');

    // Käyttäjän lisäys
    Route::get('/add-user', [UserController::class, 'add_user'])->name('add_user');
    Route::post('/add-user', [UserController::class, 'insert']);

    // Käyttäjän poisto
    Route::post('/remove-user', [UserController::class, 'delete'])->name('remove_user');

});

// Kirjautumattomat käyttäjät
Route::group(['middleware' => 'guest'], function () {

    // Sisäänkirjautuminen
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
});