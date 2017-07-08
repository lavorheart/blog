<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $table = 'post';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $guarded=[];

}
