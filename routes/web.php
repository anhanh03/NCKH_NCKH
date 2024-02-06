<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DocumentsController;
use App\Models\HomeController as ModelsHomeController;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Http\Request;

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

// Dường dẫn sai
Route::fallback(function () {
    return redirect('/');
});

// đăng ký đăng nhập
Route::get("/displayForgotPass", [UserController::class,"displayFogot"])->name("displayFogot");

Route::get("/displayUpdatePass", [UserController::class,"displayUpdatePass"])->name("displayUpdatePass");

Route::get('/signinorsignup', [UserController::class, 'index'])->name('signinorsignup');

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/signup', [UserController::class, 'signup'])->name('signup');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//Hiển thị trang quản lý bài đăng cho người dùng đăng bài
Route::get('/displayManage', [UserController::class, 'manage'])->name('manage');

// đăng nhập đăng ký FB, Google
Route::get('/auth/facebook/callback', function () {
    return 'callback login fb';
});

Route::get('/auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('fblogin');

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('gglogin');

Route::get('/auth/facebook/callback', function () {
    return 'callback login gg';
});

// trang chủ
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);
// hiển thị các bài viết trong chủ đề
Route::get('/tpost', [PostController::class, 'displayTitlePost'])->name('displayTitlePost');
//bài viết
Route::get('/postcontent', [PostController::class, 'displayPost'])->name('displayPost');

//Hiển thị form thêm bài đăng
Route::get('/displayAddPosst', [PostController::class, 'displayAddPost'])->name('displayAddPost');
//cập nhật hồ sơ người dùng
Route::get('/updateuser', [HomeController::class, 'displayInfor'])->name('displayInfor');
// show comment
Route::get('/comment', [CommentController::class, 'commentshow'])->name('commentshow');
// đăng coment
Route::get('/upcomment', [CommentController::class, 'upComment'])->name('upcomment');

// Tạo rài liệu
Route::get('/createdocument', [DocumentsController::class, 'showCreate'])->name('showCreateDocument');

//trang tải tài liệu
Route::get('/ShowDocument', [DocumentsController::class, 'showDocument'])->name('showDocument');

// gợi ý chủ đề
Route::get('/topic-suggestions', function (Request $request) {
    $query = $request->input('query');
    $topics = Topic::where('TopicName', 'like', '%' . $query . '%')->pluck('TopicName');

    return response()->json($topics);
});

Route::get('chinh-sach-rieng-tu', function () {
    return '<h1>Chinh sach rieng tu</h1>';
});
