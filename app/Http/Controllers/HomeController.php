<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\User;
use App\Models\Documents;
class HomeController extends Controller
{
    protected $userController;
    public function __construct(UserController $userController)
    {
        $this->userController = $userController;
    }

    public function displayInfor(Request $request)
    {
        $username = $request->session()->get('username'); // Lấy giá trị 'username' từ session
        $user = User::where('Username', $username)->first();

        if ($user) {
            return view('home.updateuser', [
                'full_name' => $user->full_name,
                'sex' => $user->sex,
                'email' => $user->Email,
                'address' => $user->address,
            ]);
        } else {
            return 'Người dùng không tồn tại.';
        }
    }
    //
    public function index()
    {
        $topics = Topic::paginate(10); // Thay thế getAllTopics() bằng paginate(10)

        return view('home.index', [
            'topics' => $topics,
        ])->with('success','Teest thoio');
    }

    public function indexD()
    {
        $documents = Documents::paginate(10); // Thay thế getAllDocuments() bằng paginate(10)
        return view('home.indexdoc', [
            'documents' => $documents,
        ]);
    }
}
