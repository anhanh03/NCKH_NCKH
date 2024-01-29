<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\HomeController as ModelsHomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


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

// Route::get('/', function () {
//     return 'Xin chào!';
// });
// Dường dẫn sai 
Route::fallback(function () {
    return redirect('/'); 
});

Route::get("/signinorsignup", [UserController::class,"index"])->name("signinorsignup");

Route::get("/login", [UserController::class,"login"])->name("login");

Route::get("/signup", [UserController::class,"signup"])->name("signup");

Route::get("/logout", [UserController::class,"logout"])->name("logout");

Route::get("/auth/facebook/callback",function(){
    return "callback login fb";
});

Route::get("/auth/facebook",function(){
    return Socialite::driver('facebook')->redirect();
})->name("fblogin");

Route::get("/auth/google",function(){
    return Socialite::driver('google')->redirect();
})->name("gglogin");


Route::get("/auth/facebook/callback",function(){
    return "callback login gg";
});


Route::get('/home', [HomeController::class,'index'])->name("home");

Route::get('/', [HomeController::class,'index']);

Route::get("/tpost",[PostController::class,'displayTitlePost'])->name("displayTitlePost");

Route::get("/postcontent",[PostController::class,'displayPost'])->name("displayPost");

Route::get("/updateuser",[HomeController::class,'displayInfor'])->name("displayInfor");

 Route::get("/comment",[CommentController::class,'commentshow'])->name('commentshow');

Route::get('/upcomment',[CommentController::class,'upcomment'])->name('upcomment');


Route::get('chinh-sach-rieng-tu',function(){
    return '<h1>Chinh sach rieng tu</h1>';
});