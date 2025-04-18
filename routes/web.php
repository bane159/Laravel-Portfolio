<?php

use App\Models\User;
use App\Mail\testmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectsController;

Route::get('/', [HomeController::class , 'index'])->name('home');

// Route::get('/home', [HomeController::class , 'index'])->name('home');

Route::get('/contact', [ContactController::class ,"index"]) -> name('contact');


Route::post('/contact/send', [ContactController::class ,"send"]);

Route::get('/login', [AdminController::class ,"login"])->name('login')->middleware('checkTokenAndIp');

Route::post('/login', [AdminController::class ,"authenticate"]);

Route::get('/dashboard', [AdminController::class , 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/logout', [AdminController::class , 'logout'])->name('logout')->middleware('auth');


Route::get('projects/delete/{id}', [ProjectsController::class, 'delete'])->name('projects.delete')->middleware('auth');

Route::post("projects/create", [ProjectsController::class, "create"]) ->name("projects.create")->middleware('auth');

Route::get("projects/{project}", [ProjectsController::class, "show"]) ->name("projects.show");






// Route::get('/test', function () {
//     $user = User::create([
//         'name' => 'bane',
//         'email' => 'branislavr03@gmail.com',
//         'password' => Hash::make('bane') // bcrypt automatski
//     ]);

//     return response()->json([
//         'message' => 'Korisnik kreiran!',
//         'user' => $user
//     ]);
// });
// Route::get('/about', [AboutController::class ,"index"]);

// Route::get('/projects', [HomeController::class ,"nesto"]);

// Route::get('/blogs', [HomeController::class ,"nesto"]);
