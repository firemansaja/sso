<?php

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

Route::get("/", "AuthController@index")->name("homebase");
Route::get("/logout", "AuthController@logout")->name("logout");
Route::post("/login", "AuthController@login")->name("login");

Route::middleware("sesi.aktif")->group(function()  {
    Route::middleware("admin")->group(function() {
        Route::prefix("/admin")->group(function() {
            Route::get("/", "AdminController@index")->name("admin");
            Route::prefix("/web")->group(function() {
                Route::get("/", "WebController@index")->name("admin.web");
                Route::post("/simpan", "WebController@simpan")->name("admin.web.simpan");
                Route::post("/simpan-urutan", "WebController@simpan_urutan")->name("admin.web.simpan.urutan");
                Route::get("/hapus/{website_id}", "WebController@hapus")->name("admin.web.hapus");
            });
            Route::prefix("/pengguna")->group(function() {
                Route::get("/aktif", "PenggunaController@aktif")->name("admin.pengguna.aktif");
                Route::get("/tidak-aktif", "PenggunaController@tidak_aktif")->name("admin.pengguna.tidak_aktif");
            });
        });
    });
    Route::post("/landing", "AuthController@landing")->name("landing");
    Route::prefix("/user")->group(function() {
        Route::get("/", "WelcomeController@dashboard")->name("user.home");
    });
});
