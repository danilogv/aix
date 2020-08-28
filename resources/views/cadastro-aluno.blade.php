<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Aluno </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
        <script src="{{asset('js/jquery.js')}}"> </script>
        <script src="{{asset('js/jquery.mask.js')}}"> </script>
        <script src="{{asset('js/evento.js')}}"> </script>
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
        <form action="/cadastro-aluno" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-3">
                    <label> Nome : </label>
                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" />
                </div>
                <div class="form-group col-3">
                    <label> Matricula : </label>
                    <input type="number" name="matricula" class="form-control" placeholder="Matricula" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-1">
                    <label> Situação : </label>
                </div>
                <div class="form-group col-1">
                    <input type="radio" name="situacao" value="ativo">
                    <label> Ativo </label>
                </div>
                <div class="form-group col-1">
                    <input type="radio" name="situacao" value="inativo">
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
                    <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço" readonly />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-2">
                    <label> Curso : </label>
                    <select name="curso" class="form-control">
                        <option value=""> Selecione ... </option>
                        @foreach ($cursos as $curso)
                            <option value="{{$curso->id}}"> {{$curso->nome}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-2">
                    <label> Imagem do aluno : </label>
                    <input type="file" name="foto" accept="image/png">
                </div>
            </div>
            <button type="submit" class="btn btn-primary"> Salvar </button>
        </form>
    </body>
</html>
