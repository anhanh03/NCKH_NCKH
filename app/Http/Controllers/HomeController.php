<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
class HomeController extends Controller
{
   

    public  function displayInfor(){
        return view('home.updateuser');
    }
    //
    public function index(){
        $topics = Topic::getAllTopics();
        return view('home.index', ['topics' => $topics]);
        
    }
    
}
