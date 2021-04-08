<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable=[
      "firstName",
      "lastName",
      "email",
      "password",
      "role_id"
    ];

//    public function blogs(){
//
//        return $this->hasMany(Blog::class);
//    }
}
