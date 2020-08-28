<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Início </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    </head>
    <body>
        <form action="/login" method="post">
            @csrf
            <nav class="navbar navbar-expand-md navbar-dark bg-primary">
                <a class="navbar-brand" href="/">
                    <img src="{{asset('images/logotipo.png')}}" width="90" height="60">
                </a>
            </nav>
            <br/>
            @if (session("erro"))
                <div class="alert alert-danger">
                    {{ session("erro") }}
                </div>
            @endif
            @if (session("sucesso"))
                <div class="alert alert-success">
                    {{ session("sucesso") }}
                </div>
            @endif
            <br/>
            <h2> Login </h2>
            <br/>
            <div class="form-row">
                <div class="form-group col-3">
                    <input type="email" name="email" class="form-control" placeholder="E-mail" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-3">
                    <input type="password" name="senha" class="form-control" placeholder="Senha" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary"> Entrar </button>
        </form>
        <br/> <br/>
        <a href="/cadastro"> Cadastrar </a>
    </body>
</html>
