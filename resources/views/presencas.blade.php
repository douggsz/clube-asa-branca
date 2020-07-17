@extends('layout.app')
@section('titulo', 'Presenças')
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    <div>
        <div class="container-fluid" id="corpo">
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
                        @isset($presencas)
                            @foreach($presencas as $comparecimento)
                                <tr>
                                    <td>{{$comparecimento->socio->nome}}</td>
                                    <td>{{$comparecimento->ncr}}</td>
                                    <td>{{$comparecimento->calibre}}</td>
                                    <td>{{$comparecimento->tiros}}</td>
                                    <td>{{$comparecimento->data}}</td>
                                </tr>
                            @endforeach
                        @endif
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

                <button class="btn btn-primary btn-sm shadow" id="passadasAlt"><a>Passadas</a></button>
                <button class="btn btn-primary btn-sm shadow" id="mostraNovoUsuario"><a>Novo</a></button>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="novoUsuario">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title">Nova presença</h5>
                    </div>
                    <button class="close" id="fechaNovoUsuario" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="form-group">
                            <form action="/api/presencas" method="POST">
                                <a>Informações</a>
                                <div id="presencaInfo">
                                    <div>
                                        <p>
                                            <select class="form-control" name="nome" id="sociosRegistro">
                                                @isset($socios)
                                                    @foreach($socios as $registro)
                                                        <option
                                                            value="{{$registro->n_cr}}">{{$registro->socio->nome}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </p>
                                        <p><input class="form-control" type="text" name="registro" id="crSelecionado"
                                                  value="Registro: {{ $socios[0]->n_cr }}" disabled required>
                                            <input type="hidden" value=" {{ $socios[0]->n_cr }}" name="ncr"
                                                   id="idSelecionado"></p>
                                        <p><input class="form-control" type="text" name="data" id="data"
                                                  placeholder="Data presença"></p>
                                        <div class="row">
                                            <div class="form-group col">
                                                <input class="form-control" type="text" name="tiros" id="tiros"
                                                       placeholder="Nº Tiros"></div>
                                            <div class="form-group col">
                                                <input class="form-control" type="text" name="calibre" id="calibre"
                                                       placeholder="Calibre"></div>
                                        </div>
                                        <p><input class="form-control" type="text" name="modalidade" id="modalidade"
                                                  placeholder="Modalidade"></p>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal-footer">
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })

        $('#tpresencas').DataTable();
        $('.dataTables_length').addClass('bs-select');

        $('#mostraNovoUsuario').click(function () {
            $('#barraLateral').hide();
            $('#corpo').hide();
            $('#novoUsuario').show();
        })

        $('#fechaNovoUsuario').click(function () {
            $('#barraLateral').show();
            $('#corpo').show()
            $('#novoUsuario').hide()
        })

        $('#sociosRegistro').change(function () {
            $('#crSelecionado').attr('value', 'Registro: ' + $('#sociosRegistro').val());
            $('#idSelecionado').attr('value', $('#sociosRegistro').val());
        })

    </script>
@endsection
