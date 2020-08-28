<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use Illuminate\Http\Request;
use Exception;

class CursoController extends Controller
{
    public function cadastro(Request $requisicao) {
        try {
            switch ($requisicao->method()) {
                case "GET" :
                    return view("cadastro-curso");
                case "POST" :
                    $nome = $requisicao->input("nome");
                    $aluno = new Aluno();
                    $aluno->nome = $nome;
                    $this->validaCadastro($aluno);
                    $dados = ["nome" => $nome];
                    Curso::create($dados);
                    return redirect("/")->with('sucesso', 'Cadastro realizado com sucesso !');
                default :
                    throw new Exception("Requisição HTTP inválida !");
            }
        } catch (Exception $ex) {
            return redirect("cadastro-curso")->with('erro', $ex->getMessage());
        }
    }

    private function validaCadastro($aluno) {
        if (empty($aluno->nome)) {
            throw new Exception("Campo CURSO é obrigatório.");
        }
        if (Curso::where("nome", $aluno->nome)->exists()) {
            throw new Exception("Curso já cadastrado !");
        }
    }
}
