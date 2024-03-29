<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Comment;
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
        $posts = Post::getPostsByTopic($ID_topic);
        if ($posts) {
            return view('post.posttitle', ['posts' => $posts]);
        } else {
            return 'null';
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
        if(!$idPost){
            $ID = request()->input('idpost');
        }else{
            $ID=$idPost;
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
        // Lấy dữ liệu từ request
        $title = $request->input('Document_Name');
        $content = $request->input('Description');
        $topicId = $request->input('ID_topic');
        // Lấy ID_user từ đăng nhập hoặc thông tin người dùng hiện tại

        // Tạo bản ghi mới trong bảng "post"
        $username = $request->session()->get('username');
        $user = User::where('Username', $username)->first();

        $post = new Post();
        $post->ID_user = $user->ID; // Gán ID_user từ người dùng hiện tại
        $post->ID_topic = $topicId;
        $post->title = $title;
        $post->content = $content;
        $post->create_date = now();
        $post->count_view = 0;
        
        try{
            // Lưu bản ghi vào cơ sở dữ liệu
            $post->save();
            // Điều hướng người dùng đến trang thành công hoặc trang khác tùy ý
            return back()->with('success','Thêm bài viết thành công');

        }catch(QueryException $e){
            return back()->withErrors('Lỗi khi thêm bài viết');
        }
        
    }

    public function editPost(Request $request)
    {
        return back();
    }

    public function deletePost(Request $request)
    {
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
    }
}
