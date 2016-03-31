<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // enable mass assignment
    protected $fillable = [
        'title',
        'body'
    ];
}
