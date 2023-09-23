@extends('crud_template')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Cadastro de Funcionarios</h2>
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

            <div class=" row">

                        <form action="{{ url('funcionarios/novo') }}" method="POST">
                            @csrf
                            <div class="row">
                                <strong>Nome:</strong>

                                <input placeholder="Digite seu nome" class class="form-control mb-3" name="nome" type="text" />
                                <strong>Idade:</strong>
                                <input placeholder="Digite a idade" class="form-control  mb-3" name="idade" type="number" />
                                <strong>Email:</strong>
                                <input placeholder="Digite seu email" class="form-control  mb-3" name="email" type="text" />
                                <div class="col">
                                    <a class="btn btn-secondary" href="{{ url('/funcionarios')}}">Voltar</a>

                                </div>

                                <div class="col">

                                    <button class="btn btn-primary" type="submit">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endsection