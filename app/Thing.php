<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    //
    protected $table='thing';
    protected $primaryKey= 'thing_id'; 
    public $timestamps = false;
    protected $guarded=[];
}
