<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'department_id', 'role_id'
    ];

    // public function user(){
    //     return $this->hasMany('App\Models\User', 'id');
    // }

    // public function department(){
    //     return $this->hasMany('App\Models\Department', 'id');
    // }

    // public function role(){
    //     return $this->hasMany('App\Models\Role', 'id');
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
