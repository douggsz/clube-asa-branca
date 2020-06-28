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
                    <table class="table my-0 table-hover" id="sociosTable">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Nº Associado</th>

                        </tr>
                        </thead>
                        <tbody>

                        @isset($listaSocios)
                            @foreach($listaSocios as $socio)
                                <tr>
                                    <td>
                                        <img class="rounded-circle mr-2" width="30" height="30"
                                             src="{{ asset('/storage/'. $socio->foto->img) }}"/>
                                        <a href="{{'/socios/'.$socio->id}}">{{$socio->nome}}</a></td>
                                    <td>{{$socio->n_associado}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <h3> Não há socios</h3>
                            </tr>
                        @endif

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
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary btn-sm shadow" onclick="mostraNovoUsuario()">Novo</button>
        </div>
    </div>
    </div>
    <div class="modal" tabindex="-1" id="novoUsuario">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
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
                                        <p>
                                        <form id="formNovoSocio" method="post" action="/api/socios"
                                              enctype="multipart/form-data">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                          id="inputGroupFileAddon01">Foto</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="foto" id="foto"
                                                           accept=".jpg,.jpeg,.png" required
                                                           aria-describedby="inputGroupFileAddon01">
                                                    <label class="custom-file-label" for="customFile">Selecionar
                                                        foto</label>
                                                </div>
                                            </div>
                                        </p>
                                        <p><input class="form-control" type="text" placeholder="Nome" name="nome"
                                                  id="nome" required></p>
                                        <p><input class="form-control" type="text" placeholder="Apelido" name="apelido"
                                                  id="apelido"></p>
                                        <p><input class="form-control" type="text" placeholder="Nº Associado"
                                                  name="n_associado" id="n_associado" required></p>
                                        <p>
                                            @component('components.seletorSexo')
                                            @endcomponent
                                        </p>
                                        <p><input class="form-control" type="text" maxlength="10"
                                                  placeholder="Nascimento" name="nascimento" id="nascimento"></p>
                                        <p><input class="form-control" type="text" maxlength="10" placeholder="RG"
                                                  name="rg" id="rg"></p>
                                        <p><input class="form-control" type="text" maxlength="14" placeholder="CPF"
                                                  name="cpf" id="cpf"></p>
                                        <p><input class="form-control" type="text" maxlength="11"
                                                  placeholder="Numero celular" name="n_celular" id="n_celular"></p>
                                        <p><input class="form-control" type="text" placeholder="Nº CR" name="n_cr"
                                                  id="n_cr"></p>
                                        <p><input class="form-control" type="text" maxlength="10" data-mask="00/00/0000"
                                                  placeholder="Data Expedição" name="data_expedicao"
                                                  id="data_expedicao"></p>
                                        <p><input class="form-control" type="text" maxlength="10" data-mask="00/00/0000"
                                                  placeholder="Validade" name="data_validade" id="data_validade"></p>
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })


        $('#sociosTable').DataTable();
        $('.dataTables_length').addClass('bs-select');

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
