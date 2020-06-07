@extends('layout.app')
@section('titulo', 'Presenças')
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    <div id="novaPresenca">
        <form>
            <div class="container-fluid">
                <div class="shadow card">
                    <div class="modal-header">
                        <div>
                            <h5 class="modal-title">Lista de presenças</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <table class="table my-0" id="tpresencas">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Nº CR</th>
                                <th>Calibre</th>
                                <th>Tiros</th>
                                <th>Data</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Nº CR</th>
                                <th>Calibre</th>
                                <th>Tiros</th>
                                <th>Data</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn-primary btn-sm"><a>Novo</a></button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
@endsection
