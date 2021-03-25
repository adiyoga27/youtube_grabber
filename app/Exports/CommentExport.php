<?php
namespace App\Exports;

use App\Http\Resources\Comment\CommentCollection;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use Maatwebsite\Excel\Concerns\FromCollection;

class CommentExport implements FromCollection{
    public function collection()
    {
        return new CommentCollection(Comment::with('detailComment')->get());
    }
}

?>