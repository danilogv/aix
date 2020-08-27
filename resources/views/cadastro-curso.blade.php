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
        <br/> <br/>
        <form action="/cadastro-curso" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-3">
                    <input type="text" name="nome" class="form-control" placeholder="Curso" />
                </div>
                <div class="form-group col-3">
                    <button type="submit" class="btn btn-primary"> Salvar </button>
                </div>
            </div>
        </form>
    </body>
</html>
