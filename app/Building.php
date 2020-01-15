<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    //
    protected $table='building';
    protected $primaryKey= 'building_id';
    public $timestamps = false;
    protected $guarded=[];
}
