@extends('layout.app')
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    <div id="content">
        <div class="container-fluid" id="corpoProfile">
            <h3 class="text-dark mb-4" id="nome_pagina_profile"></h3>
            <div class="row mb-4">
                <div class="col-lg-4"> <!-- esquerda -->
                    <div class="card-body mb-4">
                        <div class="card-body text-center shadow">
                            <img class="rounded-circle mb-4 mt-4" src="storage/" . socio.foto.img width="160"
                                 height="160">
                            <div class="custom-file">
                                <form action="/api/fotos" method="PUT" enctype="multipart/form-data">
                                    @csrf

                                    @component('components.inputFt',[
                                    'nome' => 'foto_profile',
                                    'conteudo' => 'Foto',
                                    ])
                                    @endcomponent

                                    <button class="btn btn-primary">Salvar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{$idSocio}}" id="idSocio" name="idsocio">
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
                                    <form id="formInformacoes" action="/api/socios/" method="PUT">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nome</strong></label><input
                                                        class="form-control" type="text"
                                                        placeholder="Nome" name="nome" id="nome_profile" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Celular</strong></label><input
                                                        class="form-control" type="text" data-mask="00000-0000"
                                                        placeholder="Numero celular" name="n_celular"
                                                        id="n_celular_profile"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nº Associado</strong></label>
                                                    <input class="form-control" type="text"
                                                           placeholder="Nº Associado"
                                                           name="n_associado"
                                                           id="n_associado_profile" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nascimento</strong></label><input
                                                        class="form-control" type="text" data-mask="00/00/0000"
                                                        placeholder="Nascimento" name="nascimento"
                                                        id="nascimento_profile"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>RG</strong></label><input
                                                        class="form-control" type="text"
                                                        placeholder="RG" name="rg" id="rg_profile"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>CPF</strong></label><input
                                                        class="form-control" type="text" data-mask="000.000.000-00"
                                                        placeholder="CPF" name="cpf" id="cpf_profile"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Sexo</strong></label>
                                                    @component('components.seletorSexo')
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
                                                    @if(isset($anuidade->socio_id))
                                                        @if($anuidade->pago >= 300)
                                                            <div class="card" style="text-align: center">
                                                                <div class="card" style="text-align: center">
                                                                    <h2>Anuidade paga</h2>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="card" style="text-align: center">
                                                                <div class="card-body">
                                                                    <h2>Valor:
                                                                        R$</h2>
                                                                    <h4>Pago:
                                                                        R$</h4>
                                                                    <h4>Restante:
                                                                        R$
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
                                                                            <form>
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        <strong>
                                                                                            Pagamento da anuidade
                                                                                        </strong>
                                                                                    </label>
                                                                                    <input
                                                                                        class="form-control"
                                                                                        type="number"
                                                                                        placeholder="Valor"
                                                                                        name="valorPago"
                                                                                        id="valorPago"
                                                                                        min="0"
                                                                                        max="300"/>
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
                                                        <div id="gera_anuidade_profile">
                                                            <div style="text-align: center;">
                                                                <button class="btn-lg border py-2" id="gera_anuidade">
                                                                    Gerar Anuidade
                                                                </button>
                                                            </div>
                                                        </div>
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
                                        <form id="formEndereco" action="/api/enderecos/" method="PUT">
                                            @csrf
                                            <div class="form-group"><label><strong>Rua</strong></label><input
                                                    class="form-control" type="text"
                                                    placeholder="Rua" name="rua" id="rua_profile"></div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label><strong>Numero</strong></label><input
                                                            class="form-control" type="text"
                                                            placeholder="Numero" name="numero" id="numero_profile">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label><strong>Bairro</strong></label><input
                                                            class="form-control" type="text"
                                                            placeholder="Bairro" name="bairro" id="bairro_profile">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label><strong>Cidade</strong></label><input
                                                            class="form-control" type="text"
                                                            placeholder="Cidade" name="cidade" id="cidade_profile">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label><strong>UF</strong></label><input
                                                            class="form-control" type="text"
                                                            placeholder="UF" name="uf" id="uf_profile"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label><strong>CEP</strong></label><input
                                                            class="form-control" type="text" data-mask="00000-000"
                                                            placeholder="CEP" name="cep" id="cep_profile"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label><strong>E-Mail</strong></label><input
                                                            class="form-control" type="text"
                                                            placeholder="E-Mail" name="mail" id="mail_profile">
                                                    </div>
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
                                        <h6 class="text-primary font-weight-bold m-0">CR</h6>
                                    </button>
                                    <div class="card-body collapse" id="registroSocio">
                                        <div class="form-group">
                                            <div class="card-body">
                                                <form id="formRegistros" action="#" method="PUT">

                                                    @csrf

                                                    <div class="form-group"><label
                                                            for="address"><strong>Nº registro</strong></label><input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="Nº registro" name="n_cr" id="n_cr_profle">
                                                    </div>
                                                    <div class="form-group"><label for="address"><strong>Data
                                                                expedição</strong></label><input
                                                            class="form-control"
                                                            type="text" data-mask="00/00/0000"
                                                            placeholder="Data de Expedição"
                                                            name="data_expedicao"
                                                            id="data_expedicao_profile">
                                                    </div>
                                                    <div class="form-group"><label for="address"><strong>Data
                                                                Validade</strong></label><input
                                                            class="form-control"
                                                            type="text" data-mask="00/00/0000"
                                                            placeholder="Data de validade"
                                                            name="data_validade"
                                                            id="data_validade_profile">
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
                                <table class="table my-0" id="table_presencas_profile">
                                    <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Calibre</th>
                                        <th>Disparos</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Data</th>
                                        <th>Calibre</th>
                                        <th>Disparos</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="card-body">
                                    <div class="card mb-1">
                                        <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                                href="#insumoTable" aria-expanded="true"
                                                aria-controls="collapseExample" data-target="#insumoTable">
                                            <h6 class="text-primary font-weight-bold m-0">Insumos</h6>
                                        </button>
                                        <div class="card-body collapse" id="insumoTable">
                                            <table class="table my-0" id="tInsumos">
                                                <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Valor</th>
                                                    <th>Descrção</th>
                                                    <th>Pago</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Valor</th>
                                                    <th>Descrção</th>
                                                    <th>Pago</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div><!-- insumos -->
                                    <div class="card mb-1">
                                        <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                                href="#copaTable" aria-expanded="true"
                                                aria-controls="collapseExample" data-target="#copaTable">
                                            <h6 class="text-primary font-weight-bold m-0">Copa</h6>
                                        </button>
                                        <div class="card-body collapse" id="copaTable">
                                            <table class="table my-0" id="tCopa">
                                                <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Valor</th>
                                                    <th>Descrção</th>
                                                    <th>Pago</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Valor</th>
                                                    <th>Descrção</th>
                                                    <th>Pago</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div><!-- copa -->
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm shadow" id="mostraNovaPresenca">
                                        <a>Novo</a></button>
                                </div>
                            </div>
                        </div> <!-- presenças -->
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
                                        <a type="button" class="btn border-0" href="#">
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
                                        <p>
                                            <select class="form-control" name="n_cr" id="sociosRegistro">
                                                <option value="#####"></option>
                                            </select>
                                        </p>
                                        <p><input class="form-control text" type="text" name="registro"
                                                  id="crSelecionado"
                                                  value="Registro: ###" disabled>
                                            <input type="hidden" value="#####" name="n_cr"
                                                   id="idSelecionado"></p>
                                        <p>
                                        <div>
                                            <label for="data">Data</label>
                                            <input class="form-control"
                                                   type="text" name="data" id="data"
                                                   placeholder="Data Passada" data-mask="00/00/0000">
                                        </div>
                                        </p>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label for="disparos">Disparos</label>
                                                <input
                                                    class="form-control"
                                                    type="text" name="tiros"
                                                    id="tiros"
                                                    placeholder="Disparos"
                                                >
                                            </div>
                                            <div class="form-group col">
                                                <label for="calibre">Calibre</label>
                                                <input
                                                    class="form-control"
                                                    type="text" name="calibre"
                                                    id="calibre"
                                                    placeholder="Calibre"
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group border">
                                                <p>
                                                    <label for="insumo">Insumos</label>
                                                    <input
                                                        class="form-control"
                                                        type="text" name="insumo"
                                                        id="insumo"
                                                        placeholder="Quantidade"

                                                </p>
                                                <div>
                                                    <textarea name="descricaoInsumos" id="descricaoInsumos"
                                                              placeholder="Descrição dos gastos em insumos"></textarea>
                                                </div>
                                                <p>
                                                    <label for="pagamentoInsumo">Pago ?</label>
                                                    <select class="form-control" name="pagamentoInsumo"
                                                            id="pagamentoInsumo">
                                                        <option value="true">Sim</option>
                                                        <option value="false" selected>Não</option>
                                                    </select>
                                                </p>
                                            </div>
                                            <div class="form-group col border">
                                                <p>
                                                    <label for="copa">Copa</label>
                                                    <input
                                                        class="form-control"
                                                        type="text" name="copa"
                                                        id="copa"
                                                        placeholder="Copa">
                                                </p>
                                                <div>
                                                    <textarea name="descricaoCopa" id="descricaoCopa"
                                                              placeholder="Descrição dos gastos na copa"></textarea>
                                                </div>
                                                <p>
                                                    <label for="pagamentoCopa">Pago ?</label>
                                                    <select class="form-control" name="pagamentoCopa"
                                                            id="pagamentoCopa">
                                                        <option value="true">Sim</option>
                                                        <option value="false" selected>Não</option>
                                                    </select>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- modAL -->
    </div>
@endsection
