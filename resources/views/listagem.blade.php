<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Alunos </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    </head>
    <body>
       <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <a class="navbar-brand" href="/listagem">
                <img src="{{asset('images/logotipo.png')}}" width="90" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
				<span class="navbar-toggler-icon"> </span>
			</button>
			<div class="navbar-collapse collapse" id="collapsingNavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<b> 
                            <a class="nav-link link-menu" href="/"> Sair </a>
                        </b>
					</li>
				</ul>
			</div>
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
        <div class="list-group">
            @foreach ($alunos as $aluno)
                <a href="/editar/{{$aluno->id}}" class="list-group-item list-group-item-action"> {{$aluno->nome}} </a>
            @endforeach
            <br/> <br/>
            {{$alunos->render()}}
        </div>
    </body>
</html>
