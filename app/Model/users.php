<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //
    protected $table='users';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=['id','name','email','password','user_type_id','avatar'];
    // protected $guarded=['user_type_id'];
}
