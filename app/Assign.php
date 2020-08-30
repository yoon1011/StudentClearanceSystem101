<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    //
    protected $fillable = [
    	'tec_id',
        'sub_id', 
        'sem',
        'sy'
    ];
}
