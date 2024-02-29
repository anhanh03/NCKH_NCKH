<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID_user',
        'ID_topic',
        'title',
        'content',
        'create_date',
        'count_view',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'ID_user', 'ID');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'ID_topic', 'ID');
    }

    // Phương thức tạo mới một bài viết
    public static function createPost($data)
    {
        return self::create($data);
    }

    // Phương thức lấy danh sách tất cả bài viết
    public static function getAllPosts()
    {
        return self::all();
    }

    // Phương thức lấy thông tin một bài viết theo ID
    public static function getPostById($postId)
    {
        return self::find($postId);
    }
    
    public static function getPostsByUser($ID)
    {
        return self::where('ID_user', $ID)->get();
    }

    public static function getPostsByTopic($ID_topic)
    {
        return self::where('ID_topic', $ID_topic)->get();
    }
    // Phương thức cập nhật thông tin một bài viết
    public function updatePost($data)
    {
        return $this->update($data);
    }

    // Phương thức xóa một bài viết
    public function deletePost()
    {
        return $this->delete();
    }

    public static function statement($query)
    {
        DB::statement($query);
    }
    
}
