<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    //
    public function index(Request $request){
        // return view('admin.index');
        // Kiểm tra xem có biến session 'usernameAdmin' được thiết lập không
        if (Session::has('usernameAdmin')) {
            // Nếu có, tiếp tục hiển thị trang admin
            // Lưu trữc giá trị của bản ghi vào sesion
            $this->totalCount();
            return view('admin.index');
        } else {
            // Nếu không, chuyển hướng người dùng đến trang đăng nhập
            return redirect('/login')->with('error', 'Bạn phải đăng nhập để truy cập trang admin');
        }
    }


    public function totalCount()
    {
        // Gọi phương thức tĩnh để lấy tổng số bản ghi
        $totalCountUser = User::getTotalCountUser();
        $totalCountDoc = Documents::getTotalCountDocument();
        $totalCountPost = Post::getTotalCountPost();
        $totalCountActiveUser=User::getActiveUserCount();

        // Lưu trữ các giá trị trong session flash
        session()->flash('totalCountUser', $totalCountUser);
        session()->flash('totalCountDoc', $totalCountDoc);
        session()->flash('totalCountPost', $totalCountPost);
        session()->flash('totalCountActiveUser', $totalCountActiveUser);

        
    }

    
    public function manageAdmin($type)
    {
        // Gọi phương thức tĩnh để lấy tổng số bản ghi
        

        return redirect('/homeAdmin?type='.$type);
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

    public function logout()
{
    // Xóa session của tài khoản hiện tại
    Session::forget('usernameAdmin');

    // Chuyển hướng người dùng đến trang đăng nhập hoặc trang khác
    return redirect('/login')->with('message', 'Bạn đã đăng xuất thành công');
}
}
