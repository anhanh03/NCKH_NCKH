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
        if ($this->userController->isLoggedIn()) {
            $request->validate([
                'document_file' => 'required|mimes:pdf|max:10240',
                'ID_topic' => 'required',
                'Document_Name' => 'required',
                'Description' => 'required',
                'Author' => 'required',
            ], [
                'document_file.required' => 'File tài liệu là bắt buộc.',
                'document_file.mimes' => 'Vui lòng chỉ chấp nhận các file PDF.',
                'document_file.max' => 'Dung lượng file không được vượt quá 1024KB.',
                'ID_topic.required' => 'Chủ đề là bắt buộc.',
                'Document_Name.required' => 'Tên tài liệu là bắt buộc.',
                'Description.required' => 'Mô tả là bắt buộc.',
                'Author.required' => 'Tác giả là bắt buộc.',
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
            $user = User::where('Username', $username)->first();
            $user->active_dowload = +1;
            $user->save();

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
        } else {
            return back()->withErrors('Bạn phải đăng nhập!');
        }
    }

    public function showDocument(Request $request)
    {
        // return view('document.showDocument');
        if ($this->userController->isLoggedIn()) {
            $ID_document = request('id');

            $document = Documents::getDocumentById($ID_document);

            $username = $request->session()->get('username'); // Lấy giá trị 'username' từ session
            $user = User::where('Username', $username)->first();
            // $remaining_downloads = $user->active_dowload;
            if ($this->CheckDowload($username)) {
                $remaining_downloads = 1;
            } else {
                $remaining_downloads = 0;
            }
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
                    'relatedDocuments' => $relatedDocuments, // Truyền danh sách các tài liệu liên quan vào view
                    'remaining_downloads' => $remaining_downloads,
                ]);
            } else {
                return 'null';
            }
        } else {
            return back()->withErrors('Bạn phải đăng nhập!');
        }
    }
    public function show($idDoc, Request $request)
    {
        if ($this->userController->isLoggedIn()) {
            if (!$idDoc) {
                $ID_document = request('id');
            } else {
                $ID_document = $idDoc;
            }

            $document = Documents::getDocumentById($ID_document);
            $username = $request->session()->get('username'); // Lấy giá trị 'username' từ session
            $user = User::where('Username', $username)->first();
            // $remaining_downloads = $user->active_dowload;
            if ($this->CheckDowload($username) == 1) {
                $remaining_downloads = 1;
            } else {
                $remaining_downloads = 0;
            }

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
                    'relatedDocuments' => $relatedDocuments, // Truyền danh sách các tài liệu liên quan vào view
                    'remaining_downloads' => $remaining_downloads,
                ]);
            } else {
                return 'null';
            }
        } else {
            return back()->withErrors('Bạn phải đăng nhập!');
        }
    }

    public function updateDocument(Request $request, $documentId)
    {
        if ($this->userController->isLoggedIn()) {
            $data = $request->all();
            $result = Documents::updateDocument($documentId, $data);

            if ($result) {
                return response()->json(['message' => 'Tài liệu đã được cập nhật']);
            } else {
                return response()->json(['message' => 'Không tìm thấy tài liệu hoặc cập nhật không thành công'], 404);
            }
        } else {
            return back()->withErrors('Bạn phải đăng nhập!');
        }
    }

    // hàm xóa chính
    public function deleteDocument(Request $request)
    {
        if ($this->userController->isLoggedIn()) {
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
        } else {
            return back()->withErrors('Bạn phải đăng nhập!');
        }
    }

    // Cần sửa lại hàm này
    public function editDocument(Request $request)
    {
        $id = $request->input('id');
        $document = Documents::find($id);

        return view('document.update', [
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

    public function getDocuments()
    {
        $documents = Documents::paginate(10);
        return response()->json($documents);
    }

    public function report(Request $request)
    {
        if ($this->userController->isLoggedIn()) {
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
            $report->User_ID = $user->ID;
            //$report->Post_ID = $request->document_id;
            $report->Document_ID = $request->document_id;
            $report->Report_Content = $request->reason;
            $report->Report_Time = now();
            $report->save();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Báo cáo đã được gửi thành công!');
        } else {
            return back()->withErrors('Bạn phải đăng nhập!');
        }
    }

    public function CheckDowload(string $username)
    {
        $user = User::where('Username', $username)->first();
        if ($user->active_dowload >= 1) {
            return 1;
        } else {
            return 0;
        }
    }
    public function DowloadDocument(Request $request)
    {
        $ID = $request->input('id');
        $username = $request->session()->get('username');

        // Lấy thông tin người dùng từ tên người dùng
        $user = User::where('Username', $username)->first();

        // Giảm giá trị của active_download đi 1
        $user->active_dowload -= 1;
        $user->save();

        // Lấy thông tin về tài liệu cần tải xuống
        $document = Documents::findOrFail($ID);

        // Redirect đến đường dẫn lưu trữ của tài liệu để bắt đầu quá trình tải xuống
        return view('document.checkDowload',['document'=>$document]);
    }
}
