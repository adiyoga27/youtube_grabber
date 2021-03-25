<?php

namespace App\Services;

use Alaouy\Youtube\Youtube;
use Illuminate\Support\Facades\DB;

class ChannelServices
{
    protected $youtube;
    public function __construct(Youtube $youtube)
    {
        $this->youtube = $youtube;
    }
    
    public function getChannel($id)
    {
        $channel = $this->youtube->getChannelById($id)->snippet;
        $row = array(
            'channelId' => $id,
            'title' => $channel->title,
            'description' => $channel->description,
            'customUrl' => $channel->customUrl,
            'publishedAt' => $channel->publishedAt,
            'lowImage' => $channel->thumbnails->default->url,
            'mediumImage' => $channel->thumbnails->medium->url,
            'highImage' => $channel->thumbnails->high->url,
        );

        DB::table('channel')->insertOrIgnore($row);
        return $row;
    }
}
