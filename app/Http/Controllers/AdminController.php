<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Catch_;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Builder;

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
        $docs = Documents::all();
        return view('admin.managent.document', compact('docs'));
    }

    public function managerPost()
    {
        $post = Post::all();
        return view('admin.managent.post', compact('post'));
    }
    public function managerTopic()
    {
        $topic = Topic::all();
        return view('admin.managent.title', compact('topic'));
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
    public function dpMemberUpdate(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        return view('admin.updateform.updateMember', ['id' => $id,'fullName'=>$user->full_name,'email'=>$user->Email]);
    }

    public function MemberUpdate(Request $request)
    {
        $id = $request->input('id');
        $fullName = $request->input('fullName');
        $email = $request->input('email');
        $user = User::find($id); // Sử dụng find() để tìm user với id tương ứng

        if ($user) {
            // Kiểm tra xem user có tồn tại không
            $user->full_name = $fullName;
            $user->Email = $email; // Chỉnh sửa lại 'Email' thành 'email' để tuân thủ quy tắc đặt tên của Eloquent
            $user->save();
            return redirect()->back()->with('success', 'Cập nhật tài khoản thành công!');
        } else {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Không tìm thấy người dùng'])
                ->withInput();
            // Thêm withInput() để giữ lại dữ liệu trong form sau khi chuyển hướng
        }
    }

    public function dpUpdateAdmin()
    {
        return view('admin.managent.updateadmin');
    }

    public function deleteMember(Request $request)
{
    $id = $request->input('id');
    $user = User::find($id);

    if ($user) {
        $user->delete();
        return redirect()->back()->with('success', 'Xóa thành viên thành công!');
    } else {
        return redirect()->back()->withErrors('Không tìm thấy thành viên để xóa.');
    }
}









    public function logout()
    {
        // Xóa session của tài khoản hiện tại
        Session::forget('usernameAdmin');

        // Chuyển hướng người dùng đến trang đăng nhập hoặc trang khác
        return redirect('/login')->with('message', 'Bạn đã đăng xuất thành công');
    }
}
