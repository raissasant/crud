@extends('crud_template')
@section('content')

<div class="card mt-5">
    <div class="card-header">
        <h2>Lista de funcionarios</h2>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col">
                @if ($message= Session::get('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <div>{{ $message }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col mt-1 mr-1 mb-2">
                <a class="btn btn-success float-end" href="{{ url('/funcionarios/novo') }} ">Novo</a>
            </div>

        </div>


        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Email</th>
                        <th width="280px">Ações</th>

                    </tr>
                    @foreach($funcionarios as $funcionarios)
                    <tr>
                        <td>{{ $funcionarios['nome']}}</td>
                        <td>{{ $funcionarios['idade']}}</td>
                        <td>{{ $funcionarios['email']}}</td>

                        <td>
                            <a class="btn btn-primary" href="{{ url('/funcionarios/editar', ['id'=>$funcionarios['id']]) }}">Editar</a>
                            <a onclick="confirma(this)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" href="{{ url('/funcionarios/delete', ['id'=>$funcionarios['id']]) }}">Excluir</a>

                        </td>

                    </tr>
                    @endforeach
                </table>
            </div>

        </div>
        <div class="row">
            <div class="col mt-1 mr-1">
                <a class="btn btn-secondary float-end" href="{{ url('/welcome') }} ">Voltar</a>
            </div>

        </div>

    </div>

</div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deseja Realmente excluir esse funcionario?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="Modal">Cancelar</button>
                <a id=btnConfirma class="btn btn-primary" href="" >Confirmar</a>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function confirma(elemento) {
        document.getElementById('btnConfirma').setAttribute('href',elemento.href);
    }

</script>