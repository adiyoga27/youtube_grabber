<?php

namespace App\Services;

use Alaouy\Youtube\Youtube;
use Illuminate\Support\Facades\DB;

class VideosServices {
    protected $youtube;
    public function __construct(Youtube $youtube) {
        $this->youtube = $youtube;
    }

    public function getVideos($id)
    {
        $videos = $this->youtube->listChannelVideos($id, 200);
        for($i=0; $i<count($videos); $i++){
            $data = $videos[$i]->snippet;
            $row[] = array(
                'videoId' => $videos[$i]->id->videoId,
                'channelId' => $id,
                'title' => $data->title,
                'description' => $data->description,
                'liveBroadcastContent' => $data->liveBroadcastContent,
                'publishedAt' => $data->publishedAt,
                'lowImage' => $data->thumbnails->default->url,
                'mediumImage' => $data->thumbnails->medium->url,
                'highImage' => $data->thumbnails->high->url,
            );
        }
   
        DB::table('videos')->insertOrIgnore($row);
        return $row;
    }

    public function getComments($id)
    {

        $data = $this->youtube->getCommentThreadsByVideoId($id, 100,null,['snippet'],false);
        for ($i=0; $i < count($data); $i++) { 
            $arr  = array(
                'videoId' => $data[$i]->snippet->topLevelComment->snippet->videoId,
                'textOriginal' => $data[$i]->snippet->topLevelComment->snippet->textOriginal,
                'authorChannelId' => $data[$i]->snippet->topLevelComment->snippet->authorChannelId->value,
                'authorDisplayName' => $data[$i]->snippet->topLevelComment->snippet->authorDisplayName,
                'authorProfileImageUrl' => $data[$i]->snippet->topLevelComment->snippet->authorProfileImageUrl,
                'authorChannelUrl' => $data[$i]->snippet->topLevelComment->snippet->authorChannelUrl,
                'canRate' => $data[$i]->snippet->topLevelComment->snippet->canRate,
                'viewerRating' => $data[$i]->snippet->topLevelComment->snippet->viewerRating,
                'likeCount' => $data[$i]->snippet->topLevelComment->snippet->likeCount,
            );
            $videos[] = $arr;
            
        }
      
            
        # code...     
  
        // Add results key with info parameter set
        // print_r($search['results']);

        // for($i=0; $i<count($videos); $i++){
        //     $data = $videos[$i]->snippet;
        //     $row[] = array(
        //         'videoId' => $videos[$i]->id->videoId,
        //         'channelId' => $id,
        //         'title' => $data->title,
        //         'description' => $data->description,
        //         'liveBroadcastContent' => $data->liveBroadcastContent,
        //         'publishedAt' => $data->publishedAt,
        //         'lowImage' => $data->thumbnails->default->url,
        //         'mediumImage' => $data->thumbnails->medium->url,
        //         'highImage' => $data->thumbnails->high->url,
        //     );
        // }
   
        DB::table('comment')->insertOrIgnore($videos);
        return $videos;
    }

    function checkVideos($search)
    {
            // Check if we have a pageToken
            if (isset($search['info']['nextPageToken'])) {
                return $search['info']['nextPageToken'];
            }
    }
}
