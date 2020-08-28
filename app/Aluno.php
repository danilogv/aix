<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    public $timestamps = false; 
    protected $table = "aluno"; 
    protected $fillable = ["id", "nome", "matricula", "situacao", "endereco", "foto", "curso_id"];

    public function curso(){
        return $this->belongsTo(Curso::class); 
    }
}
