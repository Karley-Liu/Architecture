<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class stories extends Model
{
    //
    protected $table='stories';
    protected $primaryKey='s_id';
    public $timestamps=false;
}
