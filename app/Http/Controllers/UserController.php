<?php

namespace App\Http\Controllers;
use App\Mail\VerifyPassword;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\Documents;
use App\Models\Post;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth;
use Mail;
class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.index');
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
                Session::put('username', $username);
                // Session::put('user_id', $user->id);
                // Lưu thông tin vào biến session
                return redirect('/home');
            } elseif ($user->ID_role == 1) {
                // Tài khoản loại 1, chuyển về /admin
                Session::put('username', $username);
                // Session::put('user_id', $user->id);
                // Lưu thông tin  vào biến session
                return redirect('/homeAdmin');
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
    // Quên Mật khẩu
    public function displayFogot()
    {
        return view('user.fogotPass');
    }
// Đổi mật khẩu
    public function displayUpdatePass()
    {
        return view('user.updatePass');
    }

    

    public function updatePass(Request $request){
        // Validate form data
        $request->validate([
            'new_password' => 'required|min:8', // New password is required and must be at least 8 characters long
            'confirm_password' => 'required|same:new_password', // Confirm password must match new password
        ]);

        $username = $request->session()->get('username');
        $user = User::where('Username', $username)->first();

        // Hash the new password
        $user->Password = bcrypt($request->new_password);
        try {
            // Save the updated password to the database
            $user->save();
            
            return redirect()->back()->with('success', 'Password updated successfully.');
        } catch (QueryException $e) {
            
            return redirect()->back()->withErrors('Lỗi chưa thể cập nhật mật khẩu lúc này.');
        }

    }


    public function logout()
    {
        Session::forget('username'); // Xóa biến session 'username'

        return redirect('/home');
    }

    public function manage(Request $request)
    {
        if ($this->isLoggedIn()) {
            $username = $request->session()->get('username');
            $user = User::where('Username', $username)->first();
            $id_user = $user->ID;

            $document = Documents::getByUserId($id_user);
            $post = Post::getPostsByUser($id_user);

            return view('user.manage', [
                'documents' => $document,
                'posts' => $post,
            ]);
        } else {
            return view('user.index')->with('');
        }
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

        try {
            $query = "UPDATE users SET full_name = '$fullname', sex = '$sex', Email = '$email', address = '$address' WHERE Username = '$username'";

            User::statement($query);

            // Cập nhật thành công
            echo 'Cập nhật thông tin người dùng thành công.';
            return back();
        } catch (QueryException $e) {
            // Xử lý ngoại lệ
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function sendResetCodeEmail(Request $request)
    {
        $user = User::where('Email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withEErrors( 'Email không tồn tại');
            //return $user.'loio';
        }
        // Tạo mã code ngẫu nhiên
        $code = Str::random(6);
        // Tạo nội dung email
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = env('MAIL_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->SMTPSecure = env('MAIL_ENCRYPTION');
        $mail->Port = env('MAIL_PORT');
        // $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        $mail->setFrom('21111065662@hunre.edu.vn', '21111065662@hunre.edu.vn');
        $mail->addAddress($user->Email);
        $mail->isHTML(true);
        $mail->Subject = 'Quên mật khẩu';
        $mail->Body = 'Đây là mã dùng một lần. Bạn vui lòng không cung cấp cho bất kì ai mã này. Mã của bạn: ' . $code;

        try {
            $mail->send();
            // Lưu mã vào cơ sở dữ liệu
            DB::table('password_resets')->insert([
                'email' => $user->Email,
                'token' => $code,
                'created_at' => now(),
            ]);
            return view('user.verify',['email'=>$request->email,])->with('success', 'Email đã được gửi để đặt lại mật khẩu');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors('Có lỗi xảy ra khi gửi email: ' . $mail->ErrorInfo);
        }
    }

    // public function sendResetCodeEmail(Request $request){
    //     $user = User::where('Email', $request->email)->first();
        
    //         Mail::to($user->Email)->send(new VerifyPassword($user));
    //         return back();

        

    // }


}
