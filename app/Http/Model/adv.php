<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class adv extends Model
{
    //
    protected $table = 'adv';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $guarded=[];
}
