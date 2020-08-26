<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public $timestamps = false; 
    protected $table = "curso"; 
    protected $fillable = ["id", "nome"];
    
}
