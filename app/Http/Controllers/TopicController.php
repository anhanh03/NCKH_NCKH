<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\topic;

class TopicController extends Controller
{
    //
    public function index()
    {
        $topics = topic::all();

        return view('topics.index', ['topics' => $topics]);
    }
}
