<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clearance extends Model
{
    //
    protected $fillable = [
        'sub_id', 
        'sec_id',
        'stud_id',
        'stat',
        'remark'
    ];
}
