<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $table = 'topic';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'TopicName',
        'Description',
    ];
    // Hàm để thêm mới một bản ghi
    public static function createTopic($data)
    {
        return self::create($data);
    }

    // Hàm để cập nhật một bản ghi
    public static function updateTopic($id, $data)
    {
        return self::where('id', $id)->update($data);
    }

    // Hàm để xóa một bản ghi
    public static function deleteTopic($id)
    {
        return self::where('id', $id)->delete();
    }

    // Hàm để lấy tất cả các bản ghi
    public static function getAllTopics()
    {
        return self::all();
    }

    // Hàm để lấy một bản ghi dựa trên ID
    public static function getTopicById($id)
    {
        return self::find($id);
    }

}
