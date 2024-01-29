<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Comment;
class PostController extends Controller
{
    public function displayTitlePost()
    {
        $ID_topic= request("id");
        $posts = Post::getPostsByTopic($ID_topic);
        if($posts){
        return view('post.posttitle', ['posts' => $posts]);
        }else{
            return "null";
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
}