<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    //
    protected $table = 'reply';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $guarded=[];
}
