<?php

namespace App\Http\Resources\Comment;

use App\Models\Video;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'videoId' => $this->videoId,
            'authorChannelId' => $this->authorChannelId,
            'videoTitle' => $this->title,
             // 'variant_name' => VariantResource::collection($this->whenLoaded('variant')),
            // 'transaction_detail' => Transaction::where('customer_phone', $this->customer_phone)->where('status', 3)->get(),

        ];
    }
}
