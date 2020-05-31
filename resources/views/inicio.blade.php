@extends('layout.app')
@section('titulo', 'Lista de socios')
@section('body')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Socios</p>
            </div>
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Nº Associado</th>

                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td><img class="rounded-circle mr-2" width="30" height="30" src="{{asset('img/avatars/avatar1.jpeg')}}">
                            <a href="{{route('teste')}}">Teste</a></td>
                            <td>842294629</td>
                        </tr>

                        <tr></tr>
                        <tr></tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><strong>Nome</strong></td>
                            <td><strong>Nº Associado</strong></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Numero de socios: 1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
