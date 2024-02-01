<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;
use app\Models\Topic;

class DocumentsController extends Controller
{
    public function getByTopicId($topicId)
    {
        $documents = Documents::getByTopicId($topicId);
        return response()->json($documents);
    }
    public function showCreate()
    {
        return view('document.create');
    }

    

    public function createDocument(Request $request)
    {
        // Kiểm tra xem tệp tin đã được gửi lên chưa
        if ($request->hasFile('document_file')) {
            // Lấy thông tin về tệp tin
            $file = $request->file('document_file');

            // Kiểm tra loại tệp tin
            $allowedTypes = ['docx', 'pdf', 'txt'];
            $extension = $file->getClientOriginalExtension();
            if (!in_array($extension, $allowedTypes)) {
                return response()->json(['message' => 'Chỉ chấp nhận tệp tin định dạng docx, pdf, txt'], 400);
            }

            // Xử lý tên tệp tin
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('documents', $filename);

            // Lưu thông tin tài liệu vào cơ sở dữ liệu
            $data = $request->all();
            $data['file_path'] = 'documents/' . $filename;
            $document = Documents::create($data);

            return response()->json($document, 201);
        }

        return response()->json(['message' => 'Không tìm thấy tệp tin'], 400);
    }
    public function showDocument()
    {
        return view('document.showDocument');
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
