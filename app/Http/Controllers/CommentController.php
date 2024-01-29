<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    //
    public function upComment(Request $request)
    {
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

    }


    


}
