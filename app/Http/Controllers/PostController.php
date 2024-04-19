<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
class PostController extends Controller
{
    protected $userController;
    public function __construct(UserController $userController)
    {
        $this->userController = $userController;
    }

    public function displayTitlePost()
    {
        $ID_topic = request('id');

        $customQuery = DB::table('post')->select('*')->where('ID_topic', $ID_topic);
        $paginatedPosts = $customQuery->paginate(10);

        if ($paginatedPosts) {
            return view('post.posttitle', ['posts' => $paginatedPosts]);
        } else {
            return 'lỗi rồi';
        }
    }

    public function displayPost()
    {
        $ID = request()->input('idpost');

        $post = Post::getPostById($ID);

        $comments = Comment::getCommentByPostId($ID);
        $commentsWithUsernames = [];

        foreach ($comments as $comment) {
            $commentWithUsername = $comment;
            $username = $comment->user->Username; // Lấy tên người dùng từ mô hình User liên quan
            $commentWithUsername->username = $username; // Thêm tên người dùng vào đối tượng comment
            $commentsWithUsernames[] = $commentWithUsername;
        }

        if ($post) {
            return view('post.post', ['post' => $post, 'comments' => $comments]);
        } else {
            return 'null';
        }
    }
    public function show($idPost)
    {
        if (!$idPost) {
            $ID = request()->input('idpost');
        } else {
            $ID = $idPost;
        }

        $post = Post::getPostById($ID);

        $comments = Comment::getCommentByPostId($ID);
        $commentsWithUsernames = [];

        foreach ($comments as $comment) {
            $commentWithUsername = $comment;
            $username = $comment->user->Username; // Lấy tên người dùng từ mô hình User liên quan
            $commentWithUsername->username = $username; // Thêm tên người dùng vào đối tượng comment
            $commentsWithUsernames[] = $commentWithUsername;
        }

        if ($post) {
            return view('post.post', ['post' => $post, 'comments' => $comments]);
        } else {
            return 'null';
        }
    }

    public function displayAddPost()
    {
        return view('post.addPost');
    }

    //     public function addPost(Request $request)
    // {
    //     // Lấy dữ liệu từ request
    //     $title = $request->input('Document_Name');
    //     $content = $request->input('Description');
    //     $topicId = $request->input('ID_topic');

    //     // Lấy ID_user từ đăng nhập hoặc thông tin người dùng hiện tại
    //     $userId = auth()->user()->id;

    //     try {
    //         $query = "INSERT INTO post (ID_user, ID_topic, title, content, create_date, count_view) VALUES ('$userId', '$topicId', '$title', '$content', NOW(), 0)";

    //         Post::statement($query);

    //         // Thêm bài viết thành công
    //         return $userId;
    //     } catch (QueryException $e) {
    //         // Xử lý ngoại lệ
    //         echo "Lỗi: " . $e->getMessage();
    //     }
    // }

    public function addPost(Request $request)
{
    if ($this->userController->isLoggedIn()) {
        // Lấy dữ liệu từ request
        $request->validate([
            'Document_Name' => 'required',
            'Description' => 'required',
        ],[
            'Document_Name.required'=>'Cần nhập tên bài đăng',
            'Description.required'=>'Cần nhập mô tả',
        ]);

        $title = $request->input('Document_Name');
        $content = $request->input('Description');
        $topicId = $request->input('ID_topic');
        // Lấy ID_user từ đăng nhập hoặc thông tin người dùng hiện tại

        // Tạo bản ghi mới trong bảng "post"
        $username = $request->session()->get('username');
        $user = User::where('Username', $username)->first();

        if ($this->checkContent($content)==false){
            return back()->withErrors('Nội dung chứa từ không hợp lệ');
        }

        $post = new Post();
        $post->ID_user = $user->ID; // Gán ID_user từ người dùng hiện tại
        $post->ID_topic = $topicId;
        $post->title = $title;
        $post->content = $content;
        $post->create_date = now();
        $post->count_view = 0;
        
        try {
            // Lưu bản ghi vào cơ sở dữ liệu
            $post->save();
            // Điều hướng người dùng đến trang thành công hoặc trang khác tùy ý
            return back()->with('success', 'Thêm bài viết thành công');
        } catch (QueryException $e) {
            return back()->withErrors('Lỗi khi thêm bài viết');
        }
    } else {
        return back()->withErrors('Bạn phải đăng nhập!');
    }
}

    public function editPost(Request $request)
    {
        return back();
    }

    public function deletePost(Request $request)
    {
        if ($this->userController->isLoggedIn()) {
            $postId = $request->id;

            // Xóa các bản ghi con trong bảng comments
            DB::table('comments')->where('ID_post', $postId)->delete();

            // Tiếp tục xóa bản ghi cha trong bảng post
            $result = DB::table('post')->where('ID', $postId)->delete();

            if ($result) {
                return back()->with('success', 'Bài viết đã được xóa');
            } else {
                return back()->withErrors('Xóa bài viết không thành công');
            }
        } else {
            return back()->withErrors('Bạn phải đăng nhập!');
        }
    }

    public function checkContent(string $content) {
        // Đường dẫn đến file blacklist.txt
        $blacklistPath = public_path('blacklists.txt');
    
        // Đọc nội dung của file
        $blacklist = file($blacklistPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
        // Tách nội dung thành các từ
        $words = preg_split('/\s+/', $content);
    
        // Kiểm tra nội dung
        foreach ($words as $contentWord) {
            foreach ($blacklist as $word) {
                if (strpos($contentWord, $word) !== false) {
                    return false;
                }
            }
        }
    
        return true;
    }


    public function report(Request $request)
    {
        if ($this->userController->isLoggedIn()) {
            // Validate the request data
            $request->validate([
                'post_id' => 'required|exists:post,ID',
                'reason' => 'required|string|max:255',
            ]);

            // Tạo bản ghi mới trong bảng "post"
            $username = $request->session()->get('username');
            $user = User::where('Username', $username)->first();
            // Tạo một bản ghi mới trong bảng Report
            $report = new Report();
            $report->User_ID = $user->ID;
            $report->Post_ID = $request->post_id;
            $report->Report_Content = $request->reason;
            $report->Report_Time = now();
            $report->save();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Báo cáo đã được gửi thành công!');
        } else {
            return back()->withErrors('Bạn phải đăng nhập!');
        }
    }
    
    

}
