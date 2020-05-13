<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mangas';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'release',
    ];

    /**
     * Author relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    /**
     * Chapters relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chapters()
    {
        return $this->hasMany('App\Chapter');
    }
}
