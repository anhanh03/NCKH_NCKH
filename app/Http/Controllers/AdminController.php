<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function index(Request $request){
        // return view('admin.index');
        // Kiểm tra xem có biến session 'usernameAdmin' được thiết lập không
        if (Session::has('usernameAdmin')) {
            // Nếu có, tiếp tục hiển thị trang admin
            return view('admin.index');
        } else {
            // Nếu không, chuyển hướng người dùng đến trang đăng nhập
            return redirect('/login')->with('error', 'Bạn phải đăng nhập để truy cập trang admin');
        }
    }
    public function manageAdmin($type){
        return Redirect('/homeAdmin?type='.$type);
    }
    public function dpTitleUpdate(){
        return view('admin.updateform.updateTitle');
    }
    public function dpTitleAdd(){
        return view('admin.updateform.addTitle');
    }
    public function dpPostUpdate(){
        return view('admin.updateform.updatePost');
    }
    public function dpDocumentUpdate(){
        return view('admin.updateform.updateDocument');
    }
    public function dpMemberUpdate(){
        return view('admin.updateform.updateMember');
    }
}
