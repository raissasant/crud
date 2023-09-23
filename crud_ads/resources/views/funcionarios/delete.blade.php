@extends('crud_template')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Excluir funcionarios</h2>
        <div class="card-body">
            <div clas="row">
                <div class="col">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <strong> Existem alguns problemas com seus dados:</strong>
                        <br>
                        @foreach($errors->all() as $error)
                        <li> {{ $error }}</li>
                        @endforeach
                    </div>

                    @endif
                </div>
            </div>


            <body>
                <form action="{{ url('funcionarios/excluir') }}" method="POST">
                    @csrf
                    <!-- campo oculto passando o ID como parâmetro no request -->
                    <input type="hidden" name="id" value="{{ $funcionarios['id'] }}">
                    <label>Nome:</label><br> <!-- valor preenchido -->
                    <input name="nome" type="text" value="{{ $funcionarios['nome'] }}" /><br>
                    <label>Idade:</label><br> <!-- valor preenchido -->
                    <input name="idade" type="text" value="{{ $funcionarios['idade'] }}" /><br>
                    <label>Email:</label><br> <!-- valor preenchido -->
                    <input name="email" type="text" value="{{ $funcionarios['email'] }}" /><br>
                    <input type="submit" value="Salvar" />

                </form>
            </body>

            </html>