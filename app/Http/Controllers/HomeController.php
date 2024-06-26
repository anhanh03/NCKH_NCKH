<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\User;
use App\Models\Documents;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    protected $userController;
    public function __construct(UserController $userController)
    {
        $this->userController = $userController;
    }

    public function showStatistics()
    {
        // Lấy số lượng bản ghi trong bảng Post
        $postCount = Post::count();

        // Lấy số lượng bản ghi trong bảng Comment
        $commentCount = Comment::count();

        // Lưu trữ số lượng bản ghi trong session
        Session::put('postCount', $postCount);
        Session::put('commentCount', $commentCount);

        // Trả về view với thông tin thống kê
        return true;
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
    public function homeTopic()
    {
        $this->showTopic();
        $this->showStatistics();
        $topics = Topic::paginate(10); // Thay thế getAllTopics() bằng paginate(10)

        return view('home.indexTopic', [
            'topics' => $topics,
        ]);
    }

    public function indexD()
    {
        $this->showTopic();
        $this->showStatistics();
        $documents = Documents::paginate(10); // Thay thế getAllDocuments() bằng paginate(10)
        return view('home.indexdoc', [
            'documents' => $documents,
        ]);
    }

    public function index(){
        $this->showStatistics();
        $this->showTopic();
        
        $adminController = new AdminController();
        $adminController->totalCount();

        //$posts = Post::paginate(10); // Thay thế getAllposts() bằng paginate(10)
        $posts = Post::orderBy('create_date', 'desc')->paginate(5);
        return view('home.index', [
            'posts' => $posts,
        ]);
    }


    public function showTopic()
    {
        $topics=Topic::take(4)->get();
        Session::put('topics', $topics);
    }    
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request
        $keyword = $request->input('keyword');

        // Tìm kiếm trong bảng documents
        $documents = Documents::where('Document_Name', 'like', '%' . $keyword . '%')
            ->orWhere('Description', 'like', '%' . $keyword . '%')
            ->get();

        // Tìm kiếm trong bảng posts
        $posts = Post::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('content', 'like', '%' . $keyword . '%')
            ->get();

        // Trả về view search.blade.php với dữ liệu tìm kiếm
        return view('search.search', compact('documents', 'posts', 'keyword'));
    }
}
