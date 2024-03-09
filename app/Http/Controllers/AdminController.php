<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //

    public function index(Request $request){
        // Kiểm tra xem có biến session 'usernameAdmin' được thiết lập không
        if (Session::has('usernameAdmin')) {
            // Nếu có, tiếp tục hiển thị trang admin
            return view('admin.index');
        } else {
            // Nếu không, chuyển hướng người dùng đến trang đăng nhập
            return redirect('/login')->with('error', 'Bạn phải đăng nhập để truy cập trang admin');
        }
    }
}
