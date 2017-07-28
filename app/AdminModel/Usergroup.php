<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Usergroup extends Model
{
    protected $fillable=['groupname'];

    protected function users()
    {
        return $this->hasMany('App\AdminModel\Admin','id');
    }
}
