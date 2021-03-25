<?php

namespace App\Http\Controllers\Api;

use App\Exports\CommentExport;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class CommentController extends Controller
{
    protected $excel;
    public function __construct(Excel $excel) {
        $this->excel = $excel;
    }
    public function exportComment()
    {
        return $this->excel->download(new CommentExport, 'export.xlsx');
    }

    public function test()
    {
       return Comment::with('detailComment')->get();
    }
}
