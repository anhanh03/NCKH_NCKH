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
    public function index(Request $request)
    {
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
        $totalCountActiveUser = User::getActiveUserCount();

        // Lưu trữ các giá trị trong session flash
        session()->flash('totalCountUser', $totalCountUser);
        session()->flash('totalCountDoc', $totalCountDoc);
        session()->flash('totalCountPost', $totalCountPost);
        session()->flash('totalCountActiveUser', $totalCountActiveUser);
    }

    public function manageAdmin(Request $request)
    {
        $usernameAdmin = $request->session()->get('usernameAdmin'); // Lấy giá trị 'usernameAdmin' từ session
        $user = User::where('username', $usernameAdmin)->first();

        if ($user) {
            $request->session()->put('full_name', $user->full_name);
            $request->session()->put('sex', $user->sex);
            $request->session()->put('email', $user->Email);
            $request->session()->put('address', $user->address);

            return view('admin.managent.updateadmin');
        } else {
            return 'Người dùng không tồn tại.';
        }
    }

 

    public function managerMember()
    {
        // lấy ra toàn bộ bản ghi trong bảng user
        $users = User::all();
        return view('admin.managent.member', compact('users'));
    }

    public function managerDocument()
    {
        $docs= Documents::all();
        return view('admin.managent.document',compact('docs'));
    }
    public function managerPost()
    {
        return view('admin.managent.post');
    }
    public function managerTopic()
    {
        return view('admin.managent.title');
    }
    public function managerStats()
    {
        return view('admin.managent.thongke');
    }



    public function dpTitleUpdate()
    {
        return view('admin.updateform.updateTitle');
    }
    public function dpTitleAdd()
    {
        return view('admin.updateform.addTitle');
    }
    public function dpPostUpdate()
    {
        return view('admin.updateform.updatePost');
    }
    public function dpDocumentUpdate()
    {
        return view('admin.updateform.updateDocument');
    }
    public function dpMemberUpdate()
    {
        return view('admin.updateform.updateMember');
    }
    public function dpUpdateAdmin()
    {
        return view('admin.managent.updateadmin');
    }

    public function logout()
    {
        // Xóa session của tài khoản hiện tại
        Session::forget('usernameAdmin');

        // Chuyển hướng người dùng đến trang đăng nhập hoặc trang khác
        return redirect('/login')->with('message', 'Bạn đã đăng xuất thành công');
    }
}
