<?php

use Illuminate\Support\Facades\Route;

Route::get("/", ["uses" => "LoginController@index"]);
Route::post("/", ["uses" => "LoginController@index"]);
Route::get("/cadastro", ["uses" => "LoginController@cadastro"]);
Route::get("/cadastro-curso", ["uses" => "CursoController@cadastro"]);
Route::post("/cadastro-curso", ["uses" => "CursoController@cadastro"]);
Route::get("/cadastro-aluno", ["uses" => "AlunoController@cadastro"]);
Route::post("/cadastro-aluno", ["uses" => "AlunoController@cadastro"]);
Route::post("/login", ["uses" => "LoginController@login"]);
Route::get("/listagem", ["uses" => "AlunoController@listagem"]);
Route::get("/editar/{id}", ["uses" => "AlunoController@editar"]);
Route::post("/alterar", ["uses" => "AlunoController@alterar"]);
Route::get("/importar", ["uses" => "CursoController@importar"]);
Route::post("/importar", ["uses" => "CursoController@importar"]);

