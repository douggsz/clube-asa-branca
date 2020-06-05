@extends('layout.app')
@section('titulo', '$socio->nome')
@section('body')
    <div id="novaPresenca">
        <form>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div>
                            <h5 class="modal-title">Presenças de {{ '$socio->nome' }}</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <table class="table my-0" id="dataTable">
                            <thead>
                            <tr>
                                <th>Nome</th>
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
