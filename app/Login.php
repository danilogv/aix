<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $timestamps = false; 
    protected $table = "login"; 
    protected $fillable = ["id", "email", "senha"];
}
