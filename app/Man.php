<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Man extends Model
{
    protected $table='man';
    protected $primaryKey= 'man_id'; 
    public $timestamps = false;
    protected $guarded=[];
}
