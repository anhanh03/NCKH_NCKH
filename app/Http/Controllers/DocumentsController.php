<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;
use app\Models\Topic;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CommentController;
use App\Models\Comment;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class DocumentsController extends Controller
{
    protected $userController;
    public function __construct(UserController $userController)
    {
        $this->userController = $userController;
    }

    public function getByTopicId($topicId)
    {
        $documents = Documents::getByTopicId($topicId);
        return response()->json($documents);
    }

    public function showCreate()
    {
        return view('document.createDocument');
    }

    
    public function createDocument(Request $request)
    {
        if($this->userController->isLoggedIn()){

        
        $request->validate([
            'document_file' => 'required|mimes:pdf|max:1024',
            'ID_topic' => 'required',
            'Document_Name' => 'required',
            'Description' => 'required',
            'Author' => 'required',
        ]);

        // Lưu trữ tệp tin
        $file = $request->file('document_file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move('storage/uploads/documents', $filename);

        // Lấy kích thước tệp tin
        //$documentSize = $file->getSize();
        $documentSize = '';
        $username = $request->session()->get('username');
        $id_user = DB::table('users')->where('Username', $username)->value('id');

        // Lưu thông tin tài liệu vào cơ sở dữ liệu
        $document = [
            'ID_topic' => $request->ID_topic,
            'id_user' => $id_user,
            'Document_Name' => $request->Document_Name,
            'Document_Type' => $file->getClientOriginalExtension(),
            'Document_Size' => $documentSize,
            'Description' => $request->Description,
            'Author' => $request->Author,
            'Storage_Path' => 'storage/uploads/documents/' . $filename,
            'Download_Path' => 'storage/uploads/documents/' . $filename,
            'count_view' => 0,
            'create_date' => now(),
            'update_date' => now(),
        ];

        DB::table('documents')->insert($document);

        return back()->with('success', 'Tài liệu đã được thêm!');
    }else{
        return back()->withErrors('Bạn phải đăng nhập!');
    }
}

    public function showDocument()
    {
        

        $ID_document = request('id');
        
        $document = Documents::getDocumentById($ID_document);

        if ($document) {
            // Tăng giá trị của count_view lên 1 và lưu vào cơ sở dữ liệu
            $document->count_view += 1;
            $document->save();
    
            $id_username = $document->id_user;
            $user = User::find($id_username);
            // Lấy tên người dùng
            $document->uploaded_by = $user->Username;
    
            // Lấy chủ đề của tài liệu hiện tại
            $documentTopic = $document->ID_topic;
    
            // Tìm các tài liệu khác có cùng chủ đề
            $relatedDocuments = Documents::where('ID_topic', $documentTopic)
                                        ->where('id', '!=', $ID_document) // Loại bỏ tài liệu hiện tại
                                        ->take(5) // Giới hạn số lượng tài liệu liên quan
                                        ->get();
        }
    
        // Sử dụng Query Builder để lấy các comment và sắp xếp chúng theo thứ tự giảm dần của create_date
        $comments = Comment::where('ID_document', $ID_document)->orderBy('create_date', 'desc')->take(5)->get();
    
        // Lấy thông tin người dùng cho mỗi comment
        foreach ($comments as $comment) {
            $id_user = $comment->ID_user;
            $user = User::find($id_user);
            $comment->user_name = $user->Username;
        }
    
        if ($document) {
            return view('document.showDocument', [
                'document' => $document,
                'comment' => $comments,
                'relatedDocuments' => $relatedDocuments // Truyền danh sách các tài liệu liên quan vào view
            ]);
        } else {
            return 'null';
        }
    }
    public function show($idDoc)
    {
        if(!$idDoc){
            $ID_document = request('id');
        } else {
            $ID_document = $idDoc;
        }
    
        $document = Documents::getDocumentById($ID_document);
    
        if ($document) {
            // Tăng giá trị của count_view lên 1 và lưu vào cơ sở dữ liệu
            $document->count_view += 1;
            $document->save();
    
            $id_username = $document->id_user;
            $user = User::find($id_username);
            // Lấy tên người dùng
            $document->uploaded_by = $user->Username;
    
            // Lấy chủ đề của tài liệu hiện tại
            $documentTopic = $document->ID_topic;
    
            // Tìm các tài liệu khác có cùng chủ đề
            $relatedDocuments = Documents::where('ID_topic', $documentTopic)
                                        ->where('id', '!=', $ID_document) // Loại bỏ tài liệu hiện tại
                                        ->take(5) // Giới hạn số lượng tài liệu liên quan
                                        ->get();
        }
    
        // Sử dụng Query Builder để lấy các comment và sắp xếp chúng theo thứ tự giảm dần của create_date
        $comments = Comment::where('ID_document', $ID_document)->orderBy('create_date', 'desc')->take(5)->get();
    
        // Lấy thông tin người dùng cho mỗi comment
        foreach ($comments as $comment) {
            $id_user = $comment->ID_user;
            $user = User::find($id_user);
            $comment->user_name = $user->Username;
        }
    
        if ($document) {
            return view('document.showDocument', [
                'document' => $document,
                'comment' => $comments,
                'relatedDocuments' => $relatedDocuments // Truyền danh sách các tài liệu liên quan vào view
            ]);
        } else {
            return 'null';
        }
    }
    


    public function updateDocument(Request $request, $documentId)
    {
        $data = $request->all();
        $result = Documents::updateDocument($documentId, $data);

        if ($result) {
            return response()->json(['message' => 'Tài liệu đã được cập nhật']);
        } else {
            return response()->json(['message' => 'Không tìm thấy tài liệu hoặc cập nhật không thành công'], 404);
        }
    }

    // hàm xóa chính
    public function deleteDocument(Request $request)
{
    $documentId = $request->id;
    $document = Documents::find($documentId);

    if ($document) {
        // Xóa tất cả các bản ghi con trong bảng comments
        $document->comments()->delete();

        // Tiếp tục xóa bản ghi cha trong bảng documents
        $result = $document->delete();

        if ($result) {
            return back()->with('success', 'Tài liệu đã được xóa');
        } else {
            return back()->withErrors('Xóa tài liệu không thành công');
        }
    } else {
        return back()->withErrors('Không tìm thấy tài liệu');
    }
}

    // Cần sửa lại hàm này
    public function editDocument(Request $request)
    {
        return back();
    }

    public function getDocuments()
    {
        $documents = Documents::paginate(10);
        return response()->json($documents);
    }

    public function report(Request $request)
    {
        // Validate the request data
        $request->validate([
            'document_id' => 'required|exists:documents,ID',
            'reason' => 'required|string|max:255',
        ]);


        // Tạo bản ghi mới trong bảng "post"
        $username = $request->session()->get('username');
        $user = User::where('Username', $username)->first();
        // Tạo một bản ghi mới trong bảng Report
        $report = new Report();
        $report->User_ID = $user->ID;;
        //$report->Post_ID = $request->document_id;
        $report->Document_ID = $request->document_id;
        $report->Report_Content = $request->reason;
        $report->Report_Time = now();
        $report->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Báo cáo đã được gửi thành công!');
    }




}
