<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use Illuminate\Http\Request;
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
                    $nome = $requisicao->input("nome");
                    $matricula = $requisicao->input("matricula");
                    $situacao = $requisicao->input("situacao");
                    $endereco = $requisicao->input("endereco");
                    $foto = $requisicao->input("foto");
                    $curso = $requisicao->input("curso");
                    $aluno = new Aluno();
                    $aluno->nome = $nome;
                    $aluno->matricula = $matricula;
                    $aluno->situacao = $situacao;
                    $aluno->endereco = $endereco;
                    $aluno->foto = $foto;
                    $aluno->curso_id = $curso;
                    $this->validaCadastro($aluno);
                    $dados = ["nome" => $nome, "matricula" => $matricula, "situacao" => $situacao, "endereco" => $endereco, "foto" => $foto, "curso_id" => $curso];
                    Aluno::create($dados);
                    return redirect("/")->with('sucesso', 'Cadastro realizado com sucesso !');
                default :
                    throw new Exception("Requisição HTTP inválida !");
            }
        } catch (Exception $ex) {
            return redirect("cadastro-aluno")->with('erro', $ex->getMessage());
        }
    }

    public function editar($id) {
        $aluno = Aluno::where("id", $id)->first();
        $cursos = Curso::all();
        return view("editar", ["aluno" => $aluno, "cursos" => $cursos]);
    }

    public function alterar(Request $requisicao) {
        try {
            $opcao = $requisicao->input("opcao");
            $id = $requisicao->input("id");
            switch ($opcao) {
                case 'A' :
                    $nome = $requisicao->input("nome");
                    $matricula = $requisicao->input("matricula");
                    $situacao = $requisicao->input("situacao");
                    $endereco = $requisicao->input("endereco");
                    $curso = $requisicao->input("curso");
                    $aux = new Aluno();
                    $aux->nome = $nome;
                    $aux->matricula = $matricula;
                    $aux->situacao = $situacao;
                    $aux->endereco = $endereco;
                    $aux->curso_id = $curso;
                    $this->validaEdicao($aux);
                    $aluno = Aluno::find($id);
                    $aluno->nome = $nome;
                    $aluno->matricula = $matricula;
                    $aluno->situacao = $situacao;
                    $aluno->endereco = $endereco;
                    $aluno->curso_id = $curso;
                    $aluno->save();
                    return redirect("listagem")->with('sucesso', 'Alteração realizada com sucesso !');
                case 'E' :
                    Aluno::destroy($id);
                    return redirect("listagem")->with('sucesso', 'Exclusão realizada com sucesso !');
                    break;
                default :
                    throw new Exception("Opção inválida !");
            }
        } catch (Exception $ex) {
            return redirect("listagem")->with('erro', $ex->getMessage());
        }
    }

    public function listagem() {
        $alunos = Aluno::all();
        return view("listagem", ["alunos" => $alunos]);
    }

    private function validaCadastro($aluno) {
        if (empty($aluno->nome)) {
            throw new Exception("Campo NOME é obrigatório.");
        }
        if (empty($aluno->matricula)) {
            throw new Exception("Campo MATRICULA é obrigatório.");
        }
        if (empty($aluno->situacao)) {
            throw new Exception("Campo SITUAÇÃO é obrigatório.");
        }
        if (empty($aluno->endereco)) {
            throw new Exception("Campo ENDEREÇO é obrigatório.");
        }
        if (empty($aluno->curso_id)) {
            throw new Exception("Campo CURSO é obrigatório.");
        }
        if (empty($aluno->foto)) {
            throw new Exception("Campo FOTO é obrigatório.");
        }
        if (Aluno::where("matricula", $aluno->matricula)->exists()) {
            throw new Exception("Matricula do aluno já existente !");
        }
        $alunos = Aluno::all();
        for ($i = 0; $i < count($alunos); $i++) {
            if ($alunos[$i]->nome == $aluno->nome && $alunos[$i]->curso_id == $aluno->curso_id) {
                throw new Exception("Aluno já matriculado nesse curso !");
            }
        }
    }

    private function validaEdicao($aluno) {
        if (empty($aluno->nome)) {
            throw new Exception("Campo NOME é obrigatório.");
        }
        if (empty($aluno->matricula)) {
            throw new Exception("Campo MATRICULA é obrigatório.");
        }
        if (empty($aluno->situacao)) {
            throw new Exception("Campo SITUAÇÃO é obrigatório.");
        }
        if (empty($aluno->endereco)) {
            throw new Exception("Campo ENDEREÇO é obrigatório.");
        }
        if (empty($aluno->curso_id)) {
            throw new Exception("Campo CURSO é obrigatório.");
        }
        $alunos = Aluno::all();
        for ($i = 0; $i < count($alunos); $i++) {
            if ($alunos[$i]->nome == $aluno->nome && $alunos[$i]->curso_id == $aluno->curso_id) {
                throw new Exception("Aluno já matriculado nesse curso !");
            }
        }
    }
}
