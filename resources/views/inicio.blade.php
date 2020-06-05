@extends('layout.app')
@section('titulo', 'Lista de socios')
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    <div class="container-fluid" id="corpo">
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
                        @isset($socios)
                        @foreach($socios as $s)
                            <tr>
                                <td><img class="rounded-circle mr-2" width="30" height="30" src="{{asset('img/avatars/avatar1.jpeg')}}">
                                    <a href="{{ 'socios/' . $s->id }}">Teste</a></td>
                                <td>{{ $s->n_associado }}</td>
                            <tr></tr>
                            <tr></tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><strong>Nome</strong></td>
                            <td><strong>Nº Associado</strong></td>
                        </tr>
                        </tfoot>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td>
                                    <h4>Não há socios</h4>
                                </td>
                            </tr>
                        @endisset
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Numero de socios: {{ $socios->count() }}</p>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" onclick="mostraNovoUsuario()">Novo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal" tabindex="-1" id="novoUsuario">
        <form>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <img height="50%" src="{{asset('img/avatars/avatar2.jpeg')}}"/>
                    <input type="file" name="foto">
                    <div>
                        <h5 class="modal-title">Novo Socio</h5>
                    </div>
                    <button type="button" class="close" onclick="fecha()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="form-group">
                            <a>Informações</a>
                            <div id="socioInfo">
                                <div>
                                    <div>
                                        <input class="form-control" type="text" placeholder="Nome" name="nome" id="nome" required>
                                        <input class="form-control" type="email" placeholder="Apelido" name="apelido" id="apelido">
                                        <input class="form-control" type="text" placeholder="Nº Associado" name="nassociado" id="nassociado" required>
                                        <input class="form-control" type="text" placeholder="Nascimento" name="nascimento" id="nascimento">
                                        <input class="form-control" type="text" placeholder="Sexo" name="sexo" id="sexo">
                                        <input class="form-control" type="text" placeholder="RG" name="rg" id="rg">
                                        <input class="form-control" type="text" placeholder="CPF" name="cpf" id="cpf">
                                        <input class="form-control" type="text" placeholder="Numero celular" name="tcelular" id="tcelular">
                                        <input class="form-control" type="text" placeholder="Nº CR" name="ncr" id="ncr">
                                    </div>
                                </div>
                                </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                </div>
            </div>
    </form>
    </div>
@endsection
@section('javascript')
    <SCRIPT type="text/javascript">
        function mostraNovoUsuario() {
            $('#barraLateral').hide();
            $('#corpo').hide();
            $('#novoUsuario').show();
        }
        function fecha() {
            $('#barraLateral').show();
            $('#corpo').show()
            $('#novoUsuario').hide()
        }
    </SCRIPT>
@endsection
