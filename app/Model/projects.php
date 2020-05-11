<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    //
    protected $table='projects';
    protected $primaryKey='p_id';
    public $timestamps=false;
}
