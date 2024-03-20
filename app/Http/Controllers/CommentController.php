<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Controllers\UserController;
use App\Models\User;

class CommentController extends Controller
{
    // khai bao lop goi den
    // o day goi UserController
    protected $userController;
    public function __construct(UserController $userController)
    {
        $this->userController = $userController;
    }

    //
    public function upComment(Request $request)
    {
        if ($this->userController->isLoggedIn()) {
            // Người dùng đã đăng nhập
            // Lấy dữ liệu từ request
            $comment = $request->input('comment');
            $userID = $request->input('user_id');
            $postID = $request->input('post_id');
            $documentID = $request->input('document_id');

            $user=User::where('Username',$userID)->First();
            // Tạo một comment mới
            $newComment = new Comment();
            $newComment->ID_user = $user->ID;
            $newComment->ID_post = $postID;
            $newComment->ID_document = $documentID;
            $newComment->Content = $comment;
            $newComment->create_date = now();
            $newComment->save();

            // Redirect hoặc trả về view phù hợp
            // return redirect()->refresh();
            return back()->with('success','Thêm bình luận thành công');
            //return $newComment;
        } else {
            return view('user.index')->with('error', 'Bạn chưa đăng nhập');

        }
    }

    public function showComment($id)
    {
        // Lấy bài viết hoặc nguồn dữ liệu dựa trên $id
        $data = Comment::find($id);
        
        if (!$data) {
            // Xử lý khi không tìm thấy bài viết hoặc nguồn dữ liệu
            return 'Không tìm thấy bài viết hoặc nguồn dữ liệu';
        }
        // Lấy các comment liên quan đến bài viết hoặc nguồn dữ liệu
        $comments = $data->comments;

        return $comments;
    }
}
