<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // enable mass assignment
    protected $fillable = [
        'name'
    ];
}
