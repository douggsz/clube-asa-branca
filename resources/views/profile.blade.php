@extends('layout.app')
@section('titulo', $socio->nome )
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    <div id="content">
        <div class="container-fluid" id="corpo">
            <h3 class="text-dark mb-4">{{ $socio->nome }}</h3>
            <div class="row mb-3">
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body text-center shadow">
                            <img class="rounded-circle mb-3 mt-4" src="{{ asset('storage/'. $socio->foto->img )}}"
                                 width="160" height="160">
                            <div class="custom-file">
                                <form action="/fotos/{{ $socio->foto->id }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" class="custom-file-input" name="foto" id="foto"
                                           accept=".jpg,.jpeg,.png">
                                    <label class="custom-file-label" for="customFile">Mudar foto</label>
                                    <br><br>
                                    <button class="btn btn-primary">Salvar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{ $socio->id }}" id="idSocio">

                    <div class="card shadow mb-3">
                        <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                href="#pagamentoSocio" aria-expanded="true"
                                aria-controls="collapseExample" data-target="#pagamentoSocio">
                            <h6 class="text-primary font-weight-bold m-0">Pagamentos</h6>
                        </button>
                        <div class="card-body collapse shadow" id="pagamentoSocio">
                            @if(count($pagamentos) > 0)
                                <table class="table my-0" id="tpagamentos">
                                    <thead>
                                    <th>Descrição</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($pagamentos as $pagamento)
                                        <tr>
                                            <td>{{$pagamento->descricao}}</td>
                                            <td>{{$pagamento->data}}</td>
                                            <td>R${{$pagamento->valor}}</td>
                                            <td><a href="/socios/pagamento/{{$pagamento->id}}/pago">x</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <th>Descrição</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th></th>
                                    </tfoot>
                                </table>
                            @else
                                <h4 class="text-center">Nenhum Pagamento Pendente</h4>
                            @endif
                        </div>
                    </div>

                    <div class="card shadow mb-3">
                        <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                href="#registroSocio" aria-expanded="true"
                                aria-controls="collapseExample" data-target="#registroSocio">
                            <h6 class="text-primary font-weight-bold m-0">Registros</h6>
                        </button>
                        <div class="card-body collapse" id="registroSocio">
                            <div class="form-group">
                                <div class="card-body">
                                    <form id="formRegistros" action="/registros/{{$socio->registro->id}}" method="POST">
                                        @csrf
                                        <div class="form-group"><label
                                                for="address"><strong>Nº registro</strong></label><input
                                                class="form-control" type="text"
                                                @isset($socio->registro->n_cr) value="{{$socio->registro->n_cr}}"
                                                @endif placeholder="Nº registro" name="n_cr" id="n_cr">
                                        </div>
                                        <div class="form-group"><label for="address"><strong>Data
                                                    expedição</strong></label><input
                                                class="form-control" type="text" data-mask="00/00/0000"
                                                @isset($socio->registro->data_expedicao)
                                                value="{{$socio->registro->data_expedicao}}"
                                                @endif placeholder="Data de Expedição" name="data_expedicao"
                                                id="data_expedicao"></div>
                                        <div class="form-group"><label for="address"><strong>Data
                                                    Validade</strong></label><input
                                                class="form-control" type="text" data-mask="00/00/0000"
                                                @isset($socio->registro->data_validade)
                                                value="{{$socio->registro->data_validade}}"
                                                @endif placeholder="Data de validade" name="data_validade"
                                                id="data_validade"></div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-3">
                        <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                href="#dialogEx" aria-expanded="true" id="btnExcluir"
                                aria-controls="collapseExample" data-target="#dialogEx">
                            <h6 class="text-danger font-weight-bold m-0">APAGAR SOCIO</h6>
                        </button>
                        <div class="card-body collapse" id="dialogEx">
                            <div class="form-group">
                                <div class="card-body">
                                    <button type="button" class="btn border-0" id="dialogCn"><h6
                                            class="text-center font-weight-bold m-0">CANCELAR</h6>
                                    </button>
                                    <a type="button" class="btn border-0"
                                       href="@isset($socio->id) {{'/socios/apagar/' . $socio->id}} @endif">
                                        <h6 class="text-danger font-weight-bold m-0">APAGAR</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-3">

                                <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                        href="#informacoesSocio" aria-expanded="true"
                                        aria-controls="collapseExample" data-target="#informacoesSocio">
                                    <h6 class="text-primary font-weight-bold m-0">Informações do socio</h6>
                                </button>

                                <div class="card-body collapse" id="informacoesSocio">
                                    <form id="formInformacoes" action="/socios/{{ $socio->id }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nome</strong></label><input
                                                        class="form-control" type="text"
                                                        @isset($socio->nome) value="{{$socio->nome}}"
                                                        @endif placeholder="Nome" name="nome" id="nome" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Celular</strong></label><input
                                                        class="form-control" type="text" data-mask="00000-0000"
                                                        @isset($socio->n_celular) value="{{$socio->n_celular}}"
                                                        @endif placeholder="Numero celular" name="n_celular"
                                                        id="n_celular"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nº Associado</strong></label>
                                                    <input class="form-control" type="text"
                                                           @isset($socio->n_associado) value="{{$socio->n_associado}}"
                                                           @endif placeholder="Nº Associado"
                                                           name="n_associado"
                                                           id="n_associado" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nascimento</strong></label><input
                                                        class="form-control" type="text" data-mask="00/00/0000"
                                                        @isset($socio->nascimento) value="{{$socio->nascimento}}"
                                                        @endif placeholder="Nascimento" name="nascimento"
                                                        id="nascimento"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>RG</strong></label><input
                                                        class="form-control" type="text"
                                                        @isset($socio->rg) value="{{$socio->rg}}"
                                                        @endif placeholder="RG" name="rg" id="rg"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>CPF</strong></label><input
                                                        class="form-control" type="text" data-mask="000.000.000-00"
                                                        @isset($socio->cpf) value="{{$socio->cpf}}"
                                                        @endif placeholder="CPF" name="cpf" id="cpf"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Sexo</strong></label>
                                                    @component('components.seletorSexo')
                                                        {{$socio->sexo}}
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card shadow mb-3">
                                <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                        href="#enderecoSocios" aria-expanded="true"
                                        aria-controls="collapseExample" data-target="#enderecoSocios">
                                    <h6 class="text-primary font-weight-bold m-0">Endereços</h6>
                                </button>
                                <div class="card-body collapse" id="enderecoSocios">
                                    <form id="formEndereco" action="/enderecos/{{$socio->endereco->id}}" method="POST">
                                        @csrf
                                        <div class="form-group"><label><strong>Rua</strong></label><input
                                                class="form-control" type="text"
                                                @isset($socio->endereco->rua) value="{{$socio->endereco->rua}}"
                                                @endif placeholder="Rua" name="rua" id="rua"></div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Numero</strong></label><input
                                                        class="form-control" type="text"
                                                        @isset($socio->endereco->numero) value="{{$socio->endereco->numero}}"
                                                        @endif placeholder="Numero" name="numero" id="numero"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Bairro</strong></label><input
                                                        class="form-control" type="text"
                                                        @isset($socio->endereco->bairro) value="{{$socio->endereco->bairro}}"
                                                        @endif placeholder="Bairro" name="bairro" id="bairro"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Cidade</strong></label><input
                                                        class="form-control" type="text"
                                                        @isset($socio->endereco->cidade) value="{{$socio->endereco->cidade}}"
                                                        @endif placeholder="Cidade" name="cidade" id="cidade"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>UF</strong></label><input
                                                        class="form-control" type="text"
                                                        @isset($socio->endereco->uf) value="{{$socio->endereco->uf}}"
                                                        @endif placeholder="UF" name="uf" id="uf"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>CEP</strong></label><input
                                                        class="form-control" type="text" data-mask="00000-000"
                                                        @isset($socio->endereco->cep) value="{{$socio->endereco->cep}}"
                                                        @endif placeholder="CEP" name="cep" id="cep"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>E-Mail</strong></label><input
                                                        class="form-control" type="text"
                                                        @isset($socio->endereco->mail) value="{{$socio->endereco->mail}}"
                                                        @endif placeholder="E-Mail" name="mail" id="mail"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card shadow mb-3">
                                <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                        href="#presencaSocio" aria-expanded="true"
                                        aria-controls="collapseExample" data-target="#presencaSocio">
                                    <h6 class="text-primary font-weight-bold m-0">Presenças</h6>
                                </button>
                                <div class="card-body collapse" id="presencaSocio">

                                    @if(count($presenca) > 0)
                                        <table class="table my-0" id="tpresencas">
                                            <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Nº CR</th>
                                                <th>Calibre</th>
                                                <th>Tiros</th>
                                                <th>Data</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($presenca as $comparecimento)
                                                <tr>
                                                    <td>{{$comparecimento->socio->nome}}</td>
                                                    <td>{{$comparecimento->ncr}}</td>
                                                    <td>{{$comparecimento->calibre}}</td>
                                                    <td>{{$comparecimento->tiros}}</td>
                                                    <td>{{$comparecimento->data}}</td>
                                                    <td>
                                                        <a class="close"
                                                           href="/socios/presencas/excluir/{{$comparecimento->id}}">
                                                            <span aria-hidden="true">x</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Nº CR</th>
                                                <th>Calibre</th>
                                                <th>Tiros</th>
                                                <th>Data</th>
                                                <th></th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    @else
                                        <h3 class="text-center">Não há presenças</h3>
                                    @endif

                                </div>
                            </div>
                            <div class="card shadow mb-3">
                                <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                        href="#passadaSocio" aria-expanded="true"
                                        aria-controls="collapseExample" data-target="#passadaSocio">
                                    <h6 class="text-primary font-weight-bold m-0">Passadas</h6>
                                </button>
                                <div class="card-body collapse" id="passadaSocio">
                                    @if(count($passadas) > 0)
                                        <table class="table my-0" id="tpresencas">
                                            <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Data</th>
                                                <th>Nº passadas</th>
                                                <th>Modalidade</th>
                                                <th>Pagamento</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($passadas as $passada)
                                                <tr>
                                                    <td>{{$passada->socio->nome}}</td>
                                                    <td>{{$passada->data}}</td>
                                                    <td>{{$passada->n_passadas}}</td>
                                                    <td>{{$passada->modalidade}}</td>
                                                    <td>@if($passada->pagamento->pago == 0)
                                                            Não foi pago
                                                        @else
                                                            Pago
                                                        @endif</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Data</th>
                                                <th>Nº passadas</th>
                                                <th>Modalidade</th>
                                                <th>Pagamento</th>
                                            </tr>
                                            </tfoot>
                                        </table>

                                    @else
                                        <h3 class="text-center">Nenhuma passada</h3>
                                    @endif
                                </div>
                            </div>
                            <div class="card shadow mb-3">
                                <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                        href="#quitadosSocios" aria-expanded="true"
                                        aria-controls="collapseExample" data-target="#quitadosSocios">
                                    <h6 class="text-primary font-weight-bold m-0">Quitados</h6>
                                </button>
                                <div class="card-body collapse" id="quitadosSocios">
                                    @if(count($quitados) > 0)
                                        <table class="table my-0" id="tquitados">
                                            <thead>
                                            <th>Descrição</th>
                                            <th>Data</th>
                                            <th>Valor</th>
                                            </thead>
                                            <tbody>
                                            @foreach($quitados as $quitado)
                                                <tr>
                                                    <td>{{$quitado->descricao}}</td>
                                                    <td>{{$quitado->data}}</td>
                                                    <td>R${{$quitado->valor}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <th>Descrição</th>
                                            <th>Data</th>
                                            <th>Valor</th>
                                            </tfoot>
                                        </table>
                                        @if(count($pagamentos) > 0)
                                            <h4 class="text-center">Há dividas</h4>
                                        @endif
                                    @else
                                        <h4 class="text-center">Há dividas</h4>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        function presencas() {
            $('#barraLateral').hide();
            $('#corpo').hide();
            $('#novaPresenca').show();
        }

        function fecha() {
            $('#barraLateral').show();
            $('#corpo').show()
            $('#novaPresenca').hide()
        }

        function pagamentos() {
            alert('');
        }

        function registros() {
            alert('');
        }

        $('#btnExcluir').click(function () {
            $('#btnExcluir').hide();
            $('#dialogCn').click(function () {
                $('#btnExcluir').click();
                $('#btnExcluir').show();
            })
        });

    </script>
@endsection
