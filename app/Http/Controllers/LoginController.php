<?php

namespace App\Http\Controllers;

class LoginController extends Controller
{
    public function index() {
        return view ("index");
    }

    public function cadastro() {
        return view ("cadastro");
    }
}
