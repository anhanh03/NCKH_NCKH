<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use app\Models\topic;
use App\Models\User;

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


    public function report(Request $request)
    {
        // Validate the request data
        $request->validate([
            'topic_id' => 'required|exists:topic,ID',
            'reason' => 'required|string|max:255',
        ]);


        // Tạo bản ghi mới trong bảng "post"
        $username = $request->session()->get('username');
        $user = User::where('Username', $username)->first();
        // Tạo một bản ghi mới trong bảng Report
        $report = new Report();
        $report->User_ID = $user->ID;;
        $report->Post_ID = $request->topic_id;
        //$report->Document_ID = $request->Document_ID;
        $report->Report_Content = $request->reason;
        $report->Report_Time = now();
        $report->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Báo cáo đã được gửi thành công!');
    }
}
