<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    //
    protected $fillable=['typeid','title','keywords','content','intro'];
}
