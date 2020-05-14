<?php

namespace App\Http\Resources;

use \App\Http\Resources\Manga as MangaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Author extends JsonResource
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
            'fullname' => $this->fullname,
            'mangas' => MangaResource::collection($this->whenLoaded('mangas'))
        ];
    }
}
