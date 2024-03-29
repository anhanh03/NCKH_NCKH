<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use app\Models\Documents;
class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID_user',
        'ID_post',
        'ID_document',
        'Content',
        'create_date',
    ];
    
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
    public function document() {
        return $this->belongsTo(Documents::class, 'ID_document');
    }

    // Một comment thuộc về một document
    
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

