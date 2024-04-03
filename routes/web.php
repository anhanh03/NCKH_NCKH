<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\TopicController;
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
Route::get('/error/{errorCode}/{errorMessage}', [ErrorController::class, 'showError'])->name('error');
// đăng ký đăng nhập
Route::get('/displayForgotPass', [UserController::class, 'displayFogot'])->name('displayFogot');

Route::get('/displayUpdatePass', [UserController::class, 'displayUpdatePass'])->name('displayUpdatePass');

Route::get('/updatePassword', [UserController::class, 'updatePass'])->name('updatePassword');


Route::get('/displayVerify', [UserController::class, 'sendResetCodeEmail'])->name('displayVerify');

Route::get('/verifyCode', [UserController::class, 'verifyCode'])->name('verifyCode');

Route::get('/signinorsignup', [UserController::class, 'index'])->name('signinorsignup');

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/signup', [UserController::class, 'signup'])->name('signup');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

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

Route::get('/home-D', [HomeController::class, 'indexD'])->name('homeD');

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/documents/{id}', [DocumentsController::class, 'show'])->name('documents.show');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');



//cập nhật hồ sơ người dùng
Route::get('/updateuser', [HomeController::class, 'displayInfor'])->name('displayInfor');
Route::get('/updateInforUser', [UserController::class, 'updateInforUser'])->name('updateInforUser');


Route::get('/', [HomeController::class, 'index']);
// hiển thị các bài viết trong chủ đề
Route::get('/tpost', [PostController::class, 'displayTitlePost'])->name('displayTitlePost');
//bài viết
Route::get('/postcontent', [PostController::class, 'displayPost'])->name('displayPost');

Route::get('/editPost', [PostController::class, 'editPost'])->name('editPost');

Route::get('/deletePost', [PostController::class, 'deletePost'])->name('deletePost');

//Hiển thị trang quản lý bài đăng cho người dùng đăng bài
Route::get('/displayManage', [UserController::class, 'manage'])->name('manage');
//Hiển thị form thêm bài đăng
Route::get('/addPost', [PostController::class, 'addPost'])->name('addPost');
Route::get('/displayAddPosst', [PostController::class, 'displayAddPost'])->name('displayAddPost');
// show comment
Route::get('/comment', [CommentController::class, 'commentshow'])->name('commentshow');
// đăng coment
Route::get('/upcomment', [CommentController::class, 'upComment'])->name('upcomment');

// Tạo rài liệu
Route::get('/createdocument', [DocumentsController::class, 'showCreate'])->name('showCreateDocument');

Route::post('/addDocument', [DocumentsController::class, 'createDocument'])->name('addDocument');

//trang tải tài liệu
Route::get('/ShowDocument', [DocumentsController::class, 'showDocument'])->name('showDocument');

Route::get('/editDocument', [DocumentsController::class, 'editDocument'])->name('editDocument');

Route::get('/deleteDocument', [DocumentsController::class, 'deleteDocument'])->name('deleteDocument');
// gợi ý chủ đề
Route::get('/topic-suggestions', function (Request $request) {
    $query = $request->input('query');
    $topics = Topic::where('TopicName', 'like', '%' . $query . '%')->pluck('ID', 'TopicName');

    return response()->json($topics);
});

Route::get('chinh-sach-rieng-tu', function (Request $request) {
    return view('help.privacy');
})->name("privacy");


Route::get('/contact',function(Request $request){
    return view('help.contact');
})->name('contact');

Route::get('/spp',function(Request $request){
    return view('help.suppost');
})->name('suppost');

Route::get('/report', [DocumentsController::class, 'report'])->name('report');

Route::get('/about',function(Request $request){
    return view('abouts.about');
})->name('about');

// -----------------------------------  ADMIN Route ----------------------------------------------


Route::get('/homeAdmin', [AdminController::class, 'index'])->name('homeAdmin');
Route::get('/manageAdmin',[AdminController::class, 'manageAdmin'])->name('manageAmin');
Route::get('/admin/managerMember',[AdminController::class, 'managerMember'])->name('managerMember');
Route::get('/admin/managerDocument',[AdminController::class, 'managerDocument'])->name('managerDocument');
Route::get('/admin/managerPost',[AdminController::class, 'managerPost'])->name('managerPost');
Route::get('/admin/managerTopic',[AdminController::class, 'managerTopic'])->name('managerTopic');
Route::get('/admin/managerStats',[AdminController::class, 'managerStats'])->name('managerStats');
Route::get('/admin/accountAdmin',[AdminController::class, 'accountAdmin'])->name('accountAdmin');
Route::get('/admin/addAccount',[AdminController::class,'addAcount'])->name('addAcount');
Route::get('/admin/createAccount',[AdminController::class,'createAdmin'])->name('createAccount');
Route::get('/admin/logout',[AdminController::class, 'logout'])->name('logoutadmin');


//////////////////////

Route::get('/updateTitle',[AdminController::class, 'dpTitleUpdate'])->name('dpTitleUpdate');

Route::get('/updatePost',[AdminController::class, 'dpPostUpdate'])->name('dpPostUpdate');
Route::get('/adminUpdatePost',[AdminController::class, 'PostUpdate'])->name('PostUpdate');
Route::get('/deletePost',[AdminController::class, 'deletePost'])->name('deletePost');

Route::get('/updateDocument',[AdminController::class, 'dpDocumentUpdate'])->name('dpDocumentUpdate');
Route::get('/adminUpdateDocument',[AdminController::class, 'documentUpdate'])->name('documentUpdate');
Route::get('/deleteDocument',[AdminController::class, 'deleteDocument'])->name('deleteDocument');

Route::get('/updateMember',[AdminController::class, 'dpMemberUpdate'])->name('dpMemberUpdate');
Route::get('/adminUpdateMember',[AdminController::class, 'MemberUpdate'])->name('MemberUpdate');
Route::get('/deleteMember',[AdminController::class, 'deleteMember'])->name('deleteMember');


Route::get('/updateTitle',[AdminController::class, 'dpTitleUpdate'])->name('dpTitleUpdate');
Route::get('/addTitle',[AdminController::class, 'dpTitleAdd'])->name('dpTitleAdd');
Route::get('/adminAddTitle',[AdminController::class, 'addTitle'])->name('addTitle');
Route::get('/adminUpdateTitle',[AdminController::class, 'UpdateTopic'])->name('UpdateTopic');
Route::get('/deleteTopic',[AdminController::class, 'deleteTopic'])->name('deleteTopic');

