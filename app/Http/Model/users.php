<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $guarded=[];
}
