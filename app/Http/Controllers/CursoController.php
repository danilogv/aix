<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Exception;

class CursoController extends Controller
{
    public function cadastro(Request $requisicao) {
        try {
            switch ($requisicao->method()) {
                case "GET" :
                    return view("cadastro-curso");
                case "POST" :
                    $id = Uuid::uuid4()->toString();
                    $nome = $requisicao->input("nome");
                    if (Curso::where("nome", $nome)->exists()) {
                        throw new Exception("Curso já cadastrado !");
                    }
                    $dados = ["id" => $id, "nome" => $nome];
                    Curso::create($dados);
                    return redirect("/")->with('sucesso', 'Cadastro realizado com sucesso !');
                default :
                    throw new Exception("Requisição HTTP inválida !");
            }
        } catch (Exception $ex) {
            return redirect("/")->with('erro', $ex->getMessage());
        }
    }
}
