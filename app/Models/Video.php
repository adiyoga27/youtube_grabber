<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    
    protected $table = "videos";
    protected $primaryKey = "videoId";
    protected $fillable = [
        'videoId',
        'title',
        'description',
        'liveBroadcastContent',
        'lowImage',
        'mediumImage',
        'highImage', 
        'highImage', 
    ];

    protected $dates = ['created_at','updated_at'];

    public function comment()
    {
        return $this->hasOne(Comment::class, 'videoId', 'videoId');
    }
}
