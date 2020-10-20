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
            <div class="row mb-4">
                <div class="col-lg-4"> <!-- esquerda -->
                    <div class="card-body mb-4">
                        <div class="card-body text-center shadow">
                            <img class="rounded-circle mb-4 mt-4" src="{{ asset('storage/'. $socio->foto->img )}}"
                                 width="160" height="160">
                            <div class="custom-file">
                                <form action="/fotos/edit/{{ $socio->foto->id }}" method="POST"
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
                    <input type="hidden" value="{{ $socio->id }}" id="idSocio" name="idsocio">


                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                        href="#informacoesSocio" aria-expanded="true"
                                        aria-controls="collapseExample" data-target="#informacoesSocio">
                                    <h6 class="text-primary font-weight-bold m-0">Informações do socio</h6>
                                </button>
                                <div class="card-body collapse" id="informacoesSocio">
                                    <form id="formInformacoes" action="/socios/edit/{{ $socio->id }}" method="POST">
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
                                    <div class="card mb-1">
                                        <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                                href="#anuidadeSocio" aria-expanded="true"
                                                aria-controls="collapseExample" data-target="#anuidadeSocio">
                                            <h6 class="text-primary font-weight-bold m-0">Anuidade</h6>
                                        </button>
                                        <div class="card-body collapse" id="anuidadeSocio">
                                            <div class="form-group">
                                                <div class="card-body">
                                                    @if(isset($socio->anuidade->socio_id))
                                                        @if($socio->anuidade->pago >= 300)
                                                            <div class="card" style="text-align: center">
                                                                <div class="card" style="text-align: center">
                                                                    <h2>Anuidade paga</h2>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="card" style="text-align: center">
                                                                <div class="card-body">
                                                                    <h2>Valor:
                                                                        R$ {{number_format($socio->anuidade->valor, 2)}}</h2>
                                                                    <h4>Pago:
                                                                        R$ {{number_format($socio->anuidade->pago, 2)}}</h4>
                                                                    <h4>Restante:
                                                                        R$ {{number_format($socio->anuidade->valor - $socio->anuidade->pago, 2)}}
                                                                    </h4>
                                                                </div>
                                                                <button type="button" class="btn shadow py-3"
                                                                        data-toggle="collapse"
                                                                        href="#pgAnuidade" aria-expanded="true"
                                                                        aria-controls="collapseExample"
                                                                        data-target="#pgAnuidade">
                                                                    <h6 class="text font-weight-bold m-0">
                                                                        Resgistrar pagamento</h6>
                                                                </button>
                                                                <div class="card-body collapse" id="pgAnuidade">
                                                                    <div class="form-group">
                                                                        <div class="card-body">
                                                                            <form
                                                                                action="/anuidade/{{$socio->anuidade->id}}/edit"
                                                                                method="POST">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <label><strong>Pagamento da
                                                                                            anuidade</strong></label><input
                                                                                        class="form-control" type="number"
                                                                                        placeholder="Valor"
                                                                                        name="valorPago"
                                                                                        id="valorPago"
                                                                                        min="0"
                                                                                        max="{{$socio->anuidade->valor - $socio->anuidade->pago}}">
                                                                                    <div class="card-footer">
                                                                                        <button type="submit"
                                                                                                class="btn btn-primary">
                                                                                            Registrar
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <a href="/anuidade/{{$socio->id}}/new">
                                                            <div style="text-align: center;">
                                                                <button class="btn-lg border py-2">Gerar Anuidade
                                                                </button>
                                                            </div>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- anuidade -->
                                    <div class="card mb-1">
                                        <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                                href="#enderecoSocios" aria-expanded="true"
                                                aria-controls="collapseExample" data-target="#enderecoSocios">
                                            <h6 class="text-primary font-weight-bold m-0">Endereços</h6>
                                        </button>
                                        <div class="card-body collapse" id="enderecoSocios">
                                            <form id="formEndereco" action="/enderecos/edit/{{$socio->endereco->id}}"
                                                  method="POST">
                                                @csrf
                                                <div class="form-group"><label><strong>Rua</strong></label><input
                                                        class="form-control" type="text"
                                                        @isset($socio->endereco->rua) value="{{$socio->endereco->rua}}"
                                                        @endif placeholder="Rua" name="rua" id="rua"></div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label><strong>Numero</strong></label><input
                                                                class="form-control" type="text"
                                                                @isset($socio->endereco->numero) value="{{$socio->endereco->numero}}"
                                                                @endif placeholder="Numero" name="numero" id="numero">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label><strong>Bairro</strong></label><input
                                                                class="form-control" type="text"
                                                                @isset($socio->endereco->bairro) value="{{$socio->endereco->bairro}}"
                                                                @endif placeholder="Bairro" name="bairro" id="bairro">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label><strong>Cidade</strong></label><input
                                                                class="form-control" type="text"
                                                                @isset($socio->endereco->cidade) value="{{$socio->endereco->cidade}}"
                                                                @endif placeholder="Cidade" name="cidade" id="cidade">
                                                        </div>
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
                                                        <div class="form-group">
                                                            <label><strong>CEP</strong></label><input
                                                                class="form-control" type="text" data-mask="00000-000"
                                                                @isset($socio->endereco->cep) value="{{$socio->endereco->cep}}"
                                                                @endif placeholder="CEP" name="cep" id="cep"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label><strong>E-Mail</strong></label><input
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
                                    </div> <!-- endereços -->
                                    <div class="card mb-1">
                                        <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                                href="#registroSocio" aria-expanded="true"
                                                aria-controls="collapseExample" data-target="#registroSocio">
                                            <h6 class="text-primary font-weight-bold m-0">Registros</h6>
                                        </button>
                                        <div class="card-body collapse" id="registroSocio">
                                            <div class="form-group">
                                                <div class="card-body">
                                                    <form id="formRegistros"
                                                          action="/registros/edit/{{$socio->registro->id}}"
                                                          method="POST">
                                                        @csrf
                                                        <div class="form-group"><label
                                                                for="address"><strong>Nº registro</strong></label><input
                                                                class="form-control @if ($errors->has('n_cr')) is-invalid @endif"
                                                                type="text"
                                                                @isset($socio->registro->n_cr) value="{{$socio->registro->n_cr}}"
                                                                @endif placeholder="Nº registro" name="n_cr" id="n_cr">
                                                            @if($errors->has('n_cr'))
                                                                <div class="invalid-feedback">
                                                                    {{$errors->first('n_cr')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group"><label for="address"><strong>Data
                                                                    expedição</strong></label><input
                                                                class="form-control @if ($errors->has('data_expedicao')) is-invalid @endif"
                                                                type="text" data-mask="00/00/0000"
                                                                @isset($socio->registro->data_expedicao)
                                                                value="{{$socio->registro->data_expedicao}}"
                                                                @endif placeholder="Data de Expedição"
                                                                name="data_expedicao"
                                                                id="data_expedicao">
                                                            @if($errors->has('data_expedicao'))
                                                                <div class="invalid-feedback">
                                                                    {{$errors->first('data_expedicao')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group"><label for="address"><strong>Data
                                                                    Validade</strong></label><input
                                                                class="form-control @if ($errors->has('data_validade')) is-invalid @endif"
                                                                type="text" data-mask="00/00/0000"
                                                                @isset($socio->registro->data_validade)
                                                                value="{{$socio->registro->data_validade}}"
                                                                @endif placeholder="Data de validade"
                                                                name="data_validade"
                                                                id="data_validade">
                                                            @if($errors->has('data_validade'))
                                                                <div class="invalid-feedback">
                                                                    {{$errors->first('data_validade')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-primary btn-sm">Salvar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- registros -->
                                </div>
                            </div> <!-- informaçoes -->
                            <div class="card shadow mb-4">
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
                                                <th>Data</th>
                                                <th>Calibre</th>
                                                <th>Disparos</th>
                                                <th>Insumos</th>
                                                <th>Copa</th>
                                                <th>Pago</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($presenca as $comparecimento)
                                                <tr>
                                                    <td>{{$comparecimento->data}}</td>
                                                    <td>{{$comparecimento->calibre}}</td>
                                                    <td>{{$comparecimento->tiros}}</td>
                                                    <td>{{$comparecimento->insumos}}</td>
                                                    <td>{{$comparecimento->copa}}</td>
                                                    <td>
                                                        @if($comparecimento->calibre == null &&
                                                            $comparecimento->tiros == null &&
                                                            $comparecimento->insumos == null &&
                                                            $comparecimento->copa == null)
                                                            Somente assinatura
                                                        @else
                                                            @if($comparecimento->pago)
                                                                Sim
                                                            @else
                                                                Não
                                                            @endif
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a class="close"
                                                           href="/socios/presencas/excluir/{{$comparecimento->id}}/{{$socio->id}}">
                                                            <span aria-hidden="true">x</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Data</th>
                                                <th>Calibre</th>
                                                <th>Disparos</th>
                                                <th>Insumos</th>
                                                <th>Copa</th>
                                                <th>Pago</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    @else
                                        <h3 class="text-center">Não há presenças</h3>
                                    @endif
                                    <div class="modal-footer">
                                        <button class="btn btn-primary btn-sm shadow" id="mostraNovaPresenca">
                                            <a>Novo</a></button>
                                    </div>
                                </div>
                            </div> <!-- presenças -->
                            <div class="card shadow mb-4">
                                <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                        href="#pagamentosSocios" aria-expanded="true"
                                        aria-controls="collapseExample" data-target="#pagamentosSocios">
                                    <h6 class="text-primary font-weight-bold m-0">Pagamentos</h6>
                                </button>
                                <div class="card-body collapse" id="pagamentosSocios">

                                </div>
                            </div> <!-- pagamento -->
                            <div class="card shadow mb-4">
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
                            </div> <!-- apagar -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="novaPresenca">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title">Nova Presença</h5>
                    </div>
                    <button class="close" id="fechaNovaPresença" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="form-group">
                            <form action="/presencas/new" method="POST">
                                @csrf
                                <div id="presencaInfo">
                                    <div>
                                        <input type="hidden" value="{{ $socio->id }}" id="idSocio" name="idsocio">
                                        <p>
                                            <select class="form-control" name="n_cr" id="sociosRegistro"
                                                    @if(is_null($socio->registro->n_cr))
                                                    hidden
                                                @endif>
                                                @isset($registros)
                                                    @foreach($registros as $registro)
                                                        <option
                                                            value="{{$registro->n_cr}}">{{$registro->socio->nome}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </p>
                                        <p><input class="form-control" type="text" name="registro" id="crSelecionado"
                                                  value="Registro: {{ $socios[0]->n_cr }}" disabled
                                                  @if(is_null($socio->registro->n_cr))
                                                  hidden
                                                @endif>
                                            <input type="hidden" value=" {{ $socios[0]->n_cr }}" name="n_cr"
                                                   id="idSelecionado"></p>
                                        <p>
                                        <div>
                                            <input class="form-control @if ($errors->has('data')) is-invalid @endif"
                                                   type="text" name="data" id="data"
                                                   placeholder="Data Passada" data-mask="00/00/0000">
                                            @if($errors->has('data'))
                                                <div class="invalid-feedback">
                                                    {{$errors->first('data')}}
                                                </div>
                                            @endif
                                        </div>
                                        </p>
                                        <div class="row">
                                            <div class="form-group col">
                                                <input
                                                    class="form-control"
                                                    type="text" name="tiros"
                                                    id="tiros"
                                                    placeholder="Disparos"
                                                    @if(is_null($socio->registro->n_cr))
                                                    hidden
                                                    @endif
                                                >
                                            </div>
                                            <div class="form-group col">
                                                <input
                                                    class="form-control"
                                                    type="text" name="calibre"
                                                    id="calibre"
                                                    placeholder="Calibre"
                                                    @if(is_null($socio->registro->n_cr))
                                                    hidden
                                                    @endif>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group
                                                @if(isset($socio->registro->n_cr)))
                                                col
                                                 @endif">
                                                <input
                                                    class="form-control"
                                                    type="text" name="insumos"
                                                    id="insumos"
                                                    placeholder="Insumos"
                                                    @if(is_null($socio->registro->n_cr))
                                                    hidden
                                                    @endif>
                                            </div>
                                            <div class="form-group col">
                                                <input
                                                    class="form-control"
                                                    type="text" name="copa"
                                                    id="copa"
                                                    placeholder="Copa">
                                            </div>

                                        </div>
                                        <p>
                                            <label for="pagamento">Pago ?</label>
                                            <select class="form-control" name="pagamento" id="pagamento">
                                                <option value="true">Sim</option>
                                                <option value="false" selected>Não</option>
                                            </select>
                                        </p>
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
@endsection
