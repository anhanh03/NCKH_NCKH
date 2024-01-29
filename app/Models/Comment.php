<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    
    // Các trường khác trong bảng comments

    // Một comment thuộc về một user
    public function user()
    {
        return $this->belongsTo(User::class, 'ID_user');
    }

    // Một comment thuộc về một post
    public function post()
    {
        return $this->belongsTo(Post::class, 'ID_post');
    }

    // Một comment thuộc về một document
    public function document()
    {
        return $this->belongsTo(Document::class, 'ID_document');
    }
    public static function getCommentById($commentId)
    {
        return Comment::find($commentId);
    }
    public static function getCommentByPostId($postId)
    {
        return Comment::where('ID_post', $postId)->get();
    }

    // Cập nhật thông tin comment
    public function updateComment($data)
    {
        // Gán các giá trị mới cho các trường trong bảng comments
        $this->field1 = $data['field1'];
        $this->field2 = $data['field2'];
        // ...
        
        // Lưu comment đã được cập nhật vào cơ sở dữ liệu
        $this->save();
        
        return $this;
    }

    // Xóa comment
    public function deleteComment()
    {
        $this->delete();
    }
}

