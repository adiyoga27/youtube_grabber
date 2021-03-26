<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = "comment";
    protected $primaryKey = "id";
    protected $fillable = [
        'videoId',
        'textOriginal',
        'authorChannelId',
        'authorDisplayName',
        'authorProfileImageUrl',
        'authorChannelUrl',
        'canRate', 
        'viewerRating', 
        'likeCount', 
    ];

    protected $dates = ['created_at','updated_at'];

    public function detailComment()
    {
        return $this->hasOne(Video::class, 'videoId', 'videoId');
    }
}
