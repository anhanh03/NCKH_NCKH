<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Documents;
use App\Models\Post;
use App\Models\Report;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Catch_;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Builder;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        // Kiểm tra xem có biến session 'usernameAdmin' được thiết lập không
        if (Session::has('usernameAdmin')) {
            // Nếu có, tiếp tục hiển thị trang admin
            // Lưu trữc giá trị của bản ghi vào sesion
            $startDate = Carbon::now()->subWeek()->startOfWeek(); // Ngày đầu tuần trước
            $endDate = Carbon::now()->subWeek()->endOfWeek(); // Ngày cuối tuần trước
    
            $newAccounts = User::whereBetween('joindate', [$startDate, $endDate])
                ->selectRaw('DATE(joindate) as join_date, COUNT(*) as count')
                ->groupBy('join_date')
                ->get()
                ->pluck('count')
                ->toArray();
    
            $postCounts = Post::whereBetween('create_date', [$startDate, $endDate])
                ->selectRaw('DAYOFWEEK(create_date) as day_of_week, COUNT(*) as count')
                ->groupBy('day_of_week')
                ->orderBy('day_of_week')
                ->get()
                ->pluck('count')
                ->toArray();
    
            $this->totalCount();
            return view('admin.index', [
                'newAccounts' => $newAccounts,
                'postCounts' => $postCounts,
            ]);
        } else {
            // Nếu không, chuyển hướng người dùng đến trang đăng nhập
            return redirect('/login')->with('error', 'Bạn phải đăng nhập để truy cập trang admin');
        }
    }

    public function totalCount()
    {
        // Gọi phương thức tĩnh để lấy tổng số bản ghi
        // $totalCountUser = User::getTotalCountUser();
        // $totalCountDoc = Documents::getTotalCountDocument();
        // $totalCountPost = Post::getTotalCountPost();
        // $totalCountActiveUser = User::getActiveUserCount();

        // // Lưu trữ các giá trị trong session flash
        // session()->flash('totalCountUser', $totalCountUser);
        // session()->flash('totalCountDoc', $totalCountDoc);
        // session()->flash('totalCountPost', $totalCountPost);
        // session()->flash('totalCountActiveUser', $totalCountActiveUser);
    }

    public function manageAdmin(Request $request)
    {
        $usernameAdmin = $request->session()->get('usernameAdmin'); // Lấy giá trị 'usernameAdmin' từ session
        $user = User::where('username', $usernameAdmin)->first();

        if ($user) {
            $request->session()->put('full_name', $user->full_name);
            $request->session()->put('sex', $user->sex);
            $request->session()->put('email', $user->Email);
            $request->session()->put('address', $user->address);

            return view('admin.managent.updateadmin');
        } else {
            return 'Người dùng không tồn tại.';
        }
    }

    public function managerMember()
    {
        // lấy ra toàn bộ bản ghi trong bảng user
        $users = User::all();
        return view('admin.managent.member', compact('users'));
    }

    public function managerDocument()
    {
        $docs = Documents::all();
        return view('admin.managent.document', compact('docs'));
    }

    public function managerPost()
    {
        $post = Post::all();
        return view('admin.managent.post', compact('post'));
    }
    public function managerTopic()
    {
        $topic = Topic::all();
        return view('admin.managent.title', compact('topic'));
    }
    public function managerStats()
    {
        $startDate = Carbon::now()->subWeek()->startOfWeek(); // Ngày đầu tuần trước
        $endDate = Carbon::now()->subWeek()->endOfWeek(); // Ngày cuối tuần trước

        $newAccounts = User::whereBetween('joindate', [$startDate, $endDate])
            ->selectRaw('DATE(joindate) as join_date, COUNT(*) as count')
            ->groupBy('join_date')
            ->get();
        return view('admin.managent.thongke', [
            'newAccounts' => $newAccounts,
        ]);
    }
    public function accountAdmin()
    {
        
        $users = User::whereIn('ID_role', [1, 3])->get(); // Lấy danh sách tài khoản admin
        
    
        return view('admin.managent.adaccount',compact('users'));
    }
    public function addAcount(){
        return view('admin.managent.addAcount');
    }
    public function dpTitleUpdate(Request $request)
    {
        $ID = $request->input('id');
        $topic = Topic::find($ID);

        return view('admin.updateform.updateTitle', [
            'id' => $ID,
            'topic' => $topic,
        ]);
    }

    public function UpdateTopic(Request $request)
    {
        $id = $request->input('id');
        $TopicName = $request->input('topicName');
        $description = $request->input('description');
        $topic = Topic::find($id);

        if ($topic) {
            $topic->TopicName = $TopicName;
            $topic->Description = $description;
            $topic->save();
            return redirect()->back()->with('success', 'Cập nhật chủ đề thành công!');
        } else {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Không tìm thấy chủ đề'])
                ->withInput();
        }
    }

    public function dpTitleAdd()
    {
        return view('admin.updateform.addTitle');
    }

    public function addTitle(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'TopicName' => 'required|string|max:255',
            'Description' => 'required|string',
        ]);

        // Create a new Topic instance
        $topic = new Topic();
        $topic->TopicName = $request->input('TopicName');
        $topic->Description = $request->input('Description');

        // Save the Topic to the database
        if ($topic->save()) {
            // Redirect back with success message
            return redirect()->back()->with('success', 'Chủ đề đã được thêm!');
        } else {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Lỗi, bạn vui lòng thử lại.'])
                ->withInput();
        }
    }

    public function dpDocumentUpdate(Request $request)
    {
        $id = $request->input('id');
        $document = Documents::find($id);

        return view('admin.updateform.updateDocument', [
            'id' => $document->ID,
            'name' => $document->Document_Name,
            'description' => $document->Description,
            'author' => $document->Author,
        ]);
    }
    public function documentUpdate(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $author = $request->input('author');
        $description = $request->input('description');
        $document = Documents::find($id);

        // $topic=Topic::where('ID',$document->ID_topic);

        if ($document) {
            $document->Document_Name = $name;
            $document->Description = $description;
            $document->Author = $author;
            $document->save();
            return redirect()->back()->with('success', 'Cập nhật tài liệu thành công!');
        } else {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Không tìm thấy tài liệu'])
                ->withInput();
        }
    }

    public function dpPostUpdate(Request $request)
    {
        $ID = $request->input('id');
        $post = Post::find($ID);
        return view('admin.updateform.updatePost', [
            'post' => $post,
            'id' => $ID,
        ]);
    }
    public function PostUpdate(Request $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $content = $request->input('content');
        $post = Post::find($id); // Sử dụng find() để tìm Post với id tương ứng

        if ($post) {
            // Kiểm tra xem Post có tồn tại không
            $post->title = $title;
            $post->content = $content;
            $post->save();
            return redirect()->back()->with('success', 'Cập nhật bài viết thành công!');
        } else {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Không tìm thấy bài viết'])
                ->withInput();
            // Thêm withInput() để giữ lại dữ liệu trong form sau khi chuyển hướng
        }
    }

    public function dpMemberUpdate(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        return view('admin.updateform.updateMember', ['id' => $id, 'fullName' => $user->full_name, 'email' => $user->Email]);
    }

    public function MemberUpdate(Request $request)
    {
        $id = $request->input('id');
        $fullName = $request->input('fullName');
        $email = $request->input('email');
        $user = User::find($id); // Sử dụng find() để tìm user với id tương ứng

        if ($user) {
            // Kiểm tra xem user có tồn tại không
            $user->full_name = $fullName;
            $user->Email = $email; // Chỉnh sửa lại 'Email' thành 'email' để tuân thủ quy tắc đặt tên của Eloquent
            $user->save();
            return redirect()->back()->with('success', 'Cập nhật tài khoản thành công!');
        } else {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Không tìm thấy người dùng'])
                ->withInput();
            // Thêm withInput() để giữ lại dữ liệu trong form sau khi chuyển hướng
        }
    }

    public function dpUpdateAdmin()
    {
        return view('admin.managent.updateadmin');
    }
















    public function deleteMember(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'Xóa thành viên thành công!');
        } else {
            return redirect()->back()->withErrors('Không tìm thấy thành viên để xóa.');
        }
    }

    public function deleteDocument(Request $request)
    {
        $ID = $request->input('id');

        // Xóa các bình luận có ID_document tương ứng với ID của tài liệu
        Comment::where('ID_document', $ID)->delete();
        // Xóa các báo cáo có Document_ID tương ứng với ID của tài liệu
        Report::where('Document_ID', $ID)->delete();

        // Sau khi xóa các bình luận, tiến hành xóa tài liệu
        $docs = Documents::find($ID);

        if ($docs) {
            $docs->delete();
            return redirect()->back()->with('success', 'Xóa tài liệu thành công!');
        } else {
            return redirect()->back()->withErrors('Không tìm thấy tài liệu để xóa.');
        }
    }

    public function deletePost(Request $request)
    {
        $ID = $request->input('id');
        $post = Post::find($ID);
        // Xóa các bình luận có ID_document tương ứng với ID của tài liệu
        Comment::where('ID_post', $ID)->delete();
        // Xóa các báo cáo có Document_ID tương ứng với ID của tài liệu
        Report::where('Post_ID', $ID)->delete();

        if ($post) {
            $post->delete();
            return redirect()->back()->with('success', 'Xóa bài viết thành công!');
        } else {
            return redirect()->back()->withErrors('Không tìm bài viết viên để xóa.');
        }
    }

    public function deleteTopic(Request $request)
    {
        $ID = $request->input('id');
        $topic = Topic::find($ID);

        if ($topic) {
            // Sau khi xóa các tài liệu, kiểm tra thành công trước khi xóa chủ đề
            $topic->delete();
            return redirect()->back()->with('success', 'Xóa chủ đề thành công!');
        } else {
            return redirect()->back()->withErrors('Không tìm thấy chủ đề để xóa.');
        }
    }

    public function logout()
    {
        // Xóa session của tài khoản hiện tại
        Session::forget('usernameAdmin');

        // Chuyển hướng người dùng đến trang đăng nhập hoặc trang khác
        return redirect('/login')->with('message', 'Bạn đã đăng xuất thành công');
    }
}
