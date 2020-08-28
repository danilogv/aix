<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view ("index");
    }

    public function cadastro() {
        return view ("cadastro");
    }

    public function login(Request $requisicao) {
        $email = $requisicao->input("email");
        $senha = $requisicao->input("senha");
        $logins = Login::all();
        for ($i = 0; $i < count($logins); $i++) {
            if ($logins[$i]->email == $email && password_verify($senha, $logins[$i]->senha)) {
                return redirect("/listagem");
            }
        }
        return redirect("/")->with('erro', "Login ou senha inválidos");
    }
}
