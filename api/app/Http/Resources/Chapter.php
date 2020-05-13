<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Chapter extends JsonResource
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
            'manga_id' => $this->manga_id,
            'number' => $this->number,
            'title' => $this->title,
            'number_title' => $this->when(is_null($this->number) === false && is_null($this->title) === false, "#{$this->number} : {$this->title}"),
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at
        ];
    }
}
