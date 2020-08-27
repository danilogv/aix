<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Exception;

class AlunoController extends Controller
{
    public function cadastro(Request $requisicao) {
        try {
            switch ($requisicao->method()) {
                case "GET" :
                    $cursos = Curso::all();
                    return view("cadastro-aluno", ["cursos" => $cursos]);
                case "POST" :
                    $id = Uuid::uuid4()->toString();
                    $nome = $requisicao->input("nome");
                    $matricula = $requisicao->input("matricula");
                    $situacao = $requisicao->input("situacao");
                    $endereco = $requisicao->input("endereco");
                    $curso = $requisicao->input("curso");
                    if (Aluno::where("matricula", $matricula)->exists()) {
                        throw new Exception("Matricula do aluno já existente !");
                    }
                    /*$alunos = Aluno::find();
                    for ($i = 0; $i < count($alunos); $i++) {
                        if ($alunos[$i]->nome == $nome && $alunos[$i]->curso_id == $curso) {
                            throw new Exception("Aluno já matriculado em outro curso !");
                        }
                    }*/
                    $dados = ["id" => $id, "nome" => $nome, "matricula" => $matricula, "situacao" => $situacao, "endereco" => $endereco, "curso" => $curso];
                    Aluno::create($dados);
                    return redirect("/")->with('sucesso', 'Cadastro realizado com sucesso !');
                default :
                    throw new Exception("Requisição HTTP inválida !");
            }
        } catch (Exception $ex) {
            return redirect("/")->with('erro', $ex->getMessage());
        }
    }
}
