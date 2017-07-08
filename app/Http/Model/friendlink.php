<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class friendlink extends Model
{
    //
    protected $table = 'friendlink';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $guarded=[];
}
