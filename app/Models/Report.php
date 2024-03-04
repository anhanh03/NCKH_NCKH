<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'User_ID',
        'Post_ID',
        'Document_ID',
        'Report_Content',
        'Report_Time',
    ];


    public function user() {
        return $this->belongsTo(User::class, 'User_ID');
    }

    public function post() {
        return $this->belongsTo(Post::class, 'Post_ID');
    }

    public function document() {
        return $this->belongsTo(Documents::class, 'Document_ID');
    }
}
