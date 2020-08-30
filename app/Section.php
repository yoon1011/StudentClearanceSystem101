<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $fillable = [
        'sub_id', 
        'section',
        'sem',
        'sy'
    ];
}
