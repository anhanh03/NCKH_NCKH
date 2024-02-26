<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Controllers\UserController;
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

            // Tạo một comment mới
            $newComment = new Comment();
            $newComment->ID_user = $userID;
            $newComment->ID_post = $postID;
            $newComment->ID_document = $documentID;
            $newComment->Content = $comment;
            $newComment->create_date = now();
            $newComment->save();

            // Redirect hoặc trả về view phù hợp
            // return redirect()->refresh();
            return back();
            //return $newComment;
        } else {
            return view('user.index');
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
