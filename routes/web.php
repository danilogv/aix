<?php

use Illuminate\Support\Facades\Route;

Route::get("/", ["uses" => "LoginController@index"]);
Route::get("/cadastro", ["uses" => "LoginController@cadastro"]);
Route::get("/cadastro-curso", ["uses" => "CursoController@cadastro"]);
Route::post("/cadastro-curso", ["uses" => "CursoController@cadastro"]);
Route::get("/cadastro-aluno", ["uses" => "AlunoController@cadastro"]);
Route::post("/cadastro-aluno", ["uses" => "AlunoController@cadastro"]);
