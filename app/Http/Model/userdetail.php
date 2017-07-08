<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class userdetail extends Model
{
    //
    protected $table = 'userdetail';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $guarded=[];

}
