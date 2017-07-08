<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class config extends Model
{
    //
    protected $table = 'config';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $guarded=[];
}
