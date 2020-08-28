<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Edição </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
        <script src="{{asset('js/jquery.js')}}"> </script>
        <script src="{{asset('js/jquery.mask.js')}}"> </script>
        <script src="{{asset('js/evento.js')}}"> </script>
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
        <form action="/alterar" method="post">
            @csrf
            <div style="text-align:center; padding: 5px">
                <img src="data:image/png;base64,<?= base64_encode($aluno->foto) ?>" width="100" height="100" />
            </div>
            <div class="form-row">
                <div class="form-group col-3">
                    <label> Nome : </label>
                    <input type="text" id="nome" name="nome" class="form-control" value="{{$aluno->nome}}"/>
                </div>
                <div class="form-group col-3">
                    <label> Matricula : </label>
                    <input type="number" name="matricula" class="form-control" value="{{$aluno->matricula}}" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-1">
                    <label> Situação : </label>
                </div>
                <div class="form-group col-1">
                    @if ($aluno->situacao == "ativo")
                        <input type="radio" name="situacao" value="ativo" checked />
                    @else
                        <input type="radio" name="situacao" value="ativo" />
                    @endif
                    <label> Ativo </label>
                </div>
                <div class="form-group col-1">
                    @if ($aluno->situacao == "inativo")
                        <input type="radio" name="situacao" value="inativo" checked />
                    @else
                        <input type="radio" name="situacao" value="inativo" />
                    @endif
                    <label> Inativo </label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-2">
                    <label> CEP : </label>
                    <input type="text" id="cep" class="form-control" />
                </div>
                <div class="form-group col-7">
                    <label> Endereço : </label>
                    <input type="text" id="endereco" name="endereco" class="form-control" value="{{$aluno->endereco}}" readonly />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-2">
                    <label> Curso : </label>
                    <select name="curso" class="form-control">
                        <option value=""> Selecione ... </option>
                        @foreach ($cursos as $curso)
                            @if ($aluno->curso_id == $curso->id)
                                <option value="{{$curso->id}}" selected> {{$curso->nome}} </option>
                            @else
                                <option value="{{$curso->id}}"> {{$curso->nome}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="id" value="{{$aluno->id}}" />
            <button type="submit" id="alterar" name="opcao" value="A" class="btn btn-primary"> Alterar </button>
            <button type="submit" id="remover" name="opcao" value="E" class="btn btn-primary"> Remover </button>
        </form>
    </body>
</html>
