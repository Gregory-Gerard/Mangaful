<?php

namespace App\Http\Resources;

use App\Author;
use Illuminate\Http\Resources\Json\JsonResource;

class Manga extends JsonResource
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
            'title' => $this->title,
            'author' => [
                'id' => $this->author->id,
                'fullname' => $this->author->fullname
            ],
            'cover' => is_null($this->cover) ? null : asset("/storage/{$this->cover}"),
            'banner' => is_null($this->banner) ? null : asset("/storage/{$this->banner}"),
            'description' => $this->description,
            'status' => $this->status,
            'is_webcomic' => $this->is_webcomic,
            'release' => $this->release->format('Y-m-d')
        ];
    }
}
