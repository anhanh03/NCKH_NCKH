<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\topic;

class TopicController extends Controller
{
    protected $userController;
    public function __construct(UserController $userController)
    {
        $this->userController = $userController;
    }

    //
    public function index()
    {
        $topics = topic::all();

        return view('topics.index', ['topics' => $topics]);
    }
}
