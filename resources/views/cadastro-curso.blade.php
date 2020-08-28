<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Curso </title>
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
        <br/> 
        @if (session('sucesso'))
            <div class="alert alert-success">
                {{ session('sucesso') }}
            </div>
        @endif
        @if (session("erro"))
            <div class="alert alert-danger">
                {{ session("erro") }}
            </div>
        @endif
        <br/>
        <form action="/cadastro-curso" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-3">
                    <label> Curso : </label>
                    <input type="text" name="nome" class="form-control" placeholder="Curso" />
                </div>
                <div class="form-group col-3">
                    <br/>
                    <button type="submit" class="btn btn-primary"> Salvar </button>
                </div>
            </div>
        </form>
        <a href="/importar"> Importar XML </a>
    </body>
</html>
