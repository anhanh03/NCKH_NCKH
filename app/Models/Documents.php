<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'ID_topic',
        'Document_Name',
        'Document_Type',
        'Document_Size',
        'Description',
        'Author',
        'create_date',
        'update_date',
        'count_dowload',
        'count_view',
        'Storage_Path',
        'Download_Path',
    ];


    public static function getByTopicId($topicId)
    {
        return self::where('ID_topic', $topicId)->get();
    }

    public static function getByUserId($Id)
    {
        return self::where('id_user', $Id)->get();
    }

    public static function getDocumentById($documentsId)
    {
        return self::find($documentsId);
    }
    /**
     * Tạo một tài liệu mới
     *
     * @param array $data
     * @return \App\Models\Documents
     */
    public static function createDocument($data)
    {
        return self::create($data);
    }

    /**
     * Cập nhật thông tin của một tài liệu
     *
     * @param int $documentId
     * @param array $data
     * @return bool
     */
    public static function updateDocument($documentId, $data)
    {
        $document = self::find($documentId);

        if (!$document) {
            return false;
        }

        $document->update($data);
        return true;
    }

    /**
     * Xóa một tài liệu
     *
     * @param int $documentId
     * @return bool
     */
    public static function deleteDocument($documentId)
    {
        $document = self::find($documentId);

        if (!$document) {
            return false;
        }

        $document->delete();
        return true;
    }

    public static function getAllDocuments()
    {
        return self::all();
    }

}
