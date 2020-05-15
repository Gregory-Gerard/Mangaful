<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chapters';

    /**
     * Manga relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manga()
    {
        return $this->belongsTo('App\Manga');
    }

    /**
     * Pages relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany('App\Page');
    }
}
