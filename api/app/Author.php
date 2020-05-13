<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'authors';

    /**
     * Manga relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mangas()
    {
        return $this->hasMany('App\Manga');
    }
}
