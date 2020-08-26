<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $timestamps = false; 
    protected $table = "login"; 
    protected $fillable = ["email", "senha", "aluno_id"];

    public function aluno(){
        return $this->belongsTo(Aluno::class); 
    }
}
