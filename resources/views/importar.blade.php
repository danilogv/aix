<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Edição </title>
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
        <br/> <br/>
        <form action="/importar" method="post" mimetype="text/xml" enctype="multipart/form-data">
            @csrf
            <input type="file" name="arquivo" accept="text/xml" class="form-control">
            <br/> <br/>
            <button type="submit" class="btn btn-primary"> Enviar </button>
        </form>
    </body>
</html>