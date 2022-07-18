<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // use HasFactory;

    protected $guarded = [];

    public function child(){
        return $this->hasMany('App\Models\Role', 'parent_id');
    }

    public function employees(){
        return $this->hasMany('App\Models\Employee', 'role_id');
    }
}
