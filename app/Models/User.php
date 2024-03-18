<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    public $timestamps = false;
    protected $table = 'users';
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $primaryKey = 'ID';
   

    protected $fillable = [
        'Username',
        'password',
        'full_name',
        'Email',
        'Avatar',
        'Birthday',
        'address',
        'sex',
        'countcomment',
        'ID_role',
        'joindate',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'password' => 'hashed',
    // ];


    public function updateUser(array $data)
    {
        $this->fill($data);
        $this->save();
    }

    public static function statement($query)
    {
        DB::statement($query);
    }

    public static function getTotalCountUser()
    {
        return self::count(); // Lấy tổng số bản ghi của bảng 
    }

    public static function getActiveUserCount()
    {
        return self::where('count_active_user', 1)->count();
    }
   



}
