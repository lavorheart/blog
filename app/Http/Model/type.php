<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    //
    protected $table = 'type';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $guarded=[];
}
