<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    //
    public function index(){
        return view("user.index");
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Kiểm tra thông tin đăng nhập
        $user = User::where('username', $username)->first();

        if ($user && password_verify($password, $user->password)) {
            // Kiểm tra loại tài khoản
            if ($user->ID_role == 0) {
                // Tài khoản loại 0, chuyển về /home
                Session::put('username', $username); // Lưu thông tin $username vào biến session
                return redirect('/home');
            } elseif ($user->ID_role == 1) {
                // Tài khoản loại 1, chuyển về /admin
                Session::put('username', $username); // Lưu thông tin full_name vào biến session
                return redirect('/admin');
            }
        }
        // Đăng nhập thất bại
        return redirect()->back()->withInput()->withErrors('Đăng nhập không thành công');
    }

    public function signup(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        // Kiểm tra xem người dùng đã tồn tại hay chưa
        $existingUser = User::where('Username', $username)->orWhere('Email', $email)->first();

        if ($existingUser) {
            // Người dùng đã tồn tại
            return redirect()->back()->withInput()->withErrors('Người dùng đã tồn tại');
        }

        // Tạo tài khoản mới
        $user = new User();
        $user->Username = $username;
        $user->Email = $email;
        $user->Password = bcrypt($password); // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        // Set các thuộc tính khác của người dùng (FullName, DateOfBirth, Address, Gender, UserType, JoinDate, vv.)
        $user->JoinDate = date('Y-m-d H:i:s');
        // Lưu tài khoản mới vào cơ sở dữ liệu
        $user->save();

        // Chuyển hướng đến trang đăng nhập với thông báo thành công
        return redirect('/login')->with('success', 'Đăng ký thành công');
    }
    public function displayFogot(){
        return view('user.fogotPass');
    }
    public function displayUpdatePass(){
        return view('user.updatePass');
    }

    public function logout()
    {
        Session::forget('username'); // Xóa biến session 'username'

        return redirect('/home');
    }

    public function manage(){
        return view("user.manage");
    }
    public function isLoggedIn()
    {
        // Kiểm tra xem biến session 'username' đã tồn tại hay không
        if (Session::has('username')) {
            // Người dùng đã đăng nhập
            return true;
        }

        // Người dùng chưa đăng nhập
        return false;
    }


    // public function showInforUser(Request $request)
    // {
        
    // }
    
    public function updateInforUser(Request $request)
    {
        // Lấy thông tin từ biểu mẫu
        $fullname = $request->input('Fullname');
        $sex = $request->input('Sex');
        $email = $request->input('Email');
        $address = $request->input('Address');

        // Cập nhật thông tin người dùng trong cơ sở dữ liệu
        $username = $request->session()->get('username'); // Lấy giá trị 'username' từ session

        // Tìm người dùng theo tên người dùng
        $user = User::where('Username', $username)->first(); 
        if ($user) {
            if($user->update([
                'full_name' => $fullname,
                'sex' => $sex,
                'email' => $email,
                'address' => $address,
            ])){
                //return back();
                return "Cập nhật thông tin người dùng thành công. {{$user}}";
            }  
        } else {
            return "Người dùng không tồn tại.";
        }
    }
}
