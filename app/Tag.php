<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // enable mass assignment
    protected $fillable = [
        'name'
    ];

    /**
     * The posts that belong to the tag.
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_tags');
    }
}
