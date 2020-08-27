<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Cadastro </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <a class="navbar-brand" href="/">
                <img src="{{asset('images/logotipo.png')}}" width="90" height="60">
            </a>
        </nav>
        <br/> <br/>
        <div class="list-group">
            <a href="/cadastro-aluno" class="list-group-item list-group-item-action"> Aluno </a>
            <a href="/cadastro-curso" class="list-group-item list-group-item-action"> Curso </a>
        </div>
    </body>
</html>
