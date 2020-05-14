<?php

namespace App\Http\Resources;

use \App\Http\Resources\Author as AuthorResource;
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
            'authors' => $this->when($this->authors !== null, AuthorResource::collection($this->authors)),
            'cover' => $this->when($this->cover !== null, asset("/storage/{$this->cover}")),
            'banner' => $this->when($this->banner !== null, asset("/storage/{$this->banner}")),
            'description' => $this->when($this->description !== null, $this->description),
            'status' => $this->when($this->status !== null, $this->status),
            'is_webcomic' => $this->is_webcomic,
            'release' => $this->when($this->release !== null, $this->release->format('Y-m-d'))
        ];
    }
}
