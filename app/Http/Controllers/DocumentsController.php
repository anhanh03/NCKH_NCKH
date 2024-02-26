<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;
use app\Models\Topic;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CommentController;
use App\Models\Comment;
use App\Models\User;

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
    $request->validate([
        'document_file' => 'required|mimes:pdf,docx,txt|max:1024',
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
    $documentSize = "";
    $username = $request->session()->get('username');
    $id_user = DB::table('users')
    ->where('Username', $username)
    ->value('id');

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
        'create_date' => now(),
        'update_date' => now(),
        
    ];

    DB::table('documents')->insert($document);

    return back();
}

public function showDocument()
{
    $ID_document = request("id");
    $document = Documents::getDocumentById($ID_document);
    if($document) {
        $id_username = $document->id_user;
        $user = User::find($id_username);

        $document->uploaded_by = $user->Username;
    }
    // $comments = new Comment();
    $comments = Comment::document($ID_document);
    if ($comments === null) {
        $comments = [];
    }
    
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
        ]);
        // return $document;

    } else {
        return "null";
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

    public function deleteDocument($documentId)
    {
        $result = Documents::deleteDocument($documentId);

        if ($result) {
            return response()->json(['message' => 'Tài liệu đã được xóa']);
        } else {
            return response()->json(['message' => 'Không tìm thấy tài liệu hoặc xóa không thành công'], 404);
        }
    }
}
