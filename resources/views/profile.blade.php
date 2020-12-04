@extends('layout.app')
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    @auth()
        <div id="content">
            <div class="container-fluid" id="corpoProfile">
                <h3 class="text-dark mb-4" id="nome_pagina"></h3>
                <div class="row mb-4">
                    <div class="col-lg-4"> <!-- esquerda -->
                        <div class="card-body mb-4">
                            <div class="card-body text-center shadow">
                                <img class="rounded-circle mb-4 mt-4" src="storage/" . socio.foto.img width="160"
                                     height="160">
                                <div class="custom-file">
                                    <form action="/controle/fotos/edit/{{$socio->id}}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @component('components.inputFt',[
                                        'nome' => 'foto',
                                        'conteudo' => 'Foto',
                                        ])
                                        @endcomponent
                                        <button class="btn btn-primary">Salvar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="{{$socio->id}}" id="idSocio" name="idsocio">
                        @isset($socio->anuidade)
                            <input type="hidden" value="{{$socio->anuidade->id}}" id="idAnuidade" name="idsocio">
                        @endif
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-4">
                                    <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                            href="#informacoesSocio" aria-expanded="true" id="btnCollapseInfo"
                                            aria-controls="collapseExample" data-target="#informacoesSocio">
                                        <h6 class="text-primary font-weight-bold m-0">Informações do socio</h6>
                                    </button>
                                    <div class="card-body collapsed" id="informacoesSocio">
                                        <form id="formInformacoes" method="PUT">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label><strong>Nome</strong></label><input
                                                            class="form-control" type="text"
                                                            placeholder="Nome" name="nome" id="nome" required></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label><strong>Celular</strong></label><input
                                                            class="form-control" type="text"
                                                            placeholder="Numero celular" name="n_celular"
                                                            id="n_celular"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label><strong>Nº Associado</strong></label>
                                                        <input class="form-control" type="text"
                                                               placeholder="Nº Associado"
                                                               name="n_associado"
                                                               id="n_associado" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label><strong>Nascimento</strong></label><input
                                                            class="form-control" type="text" maxlength="10"
                                                            placeholder="Nascimento" name="nascimento"
                                                            id="nascimento"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label><strong>RG</strong></label><input
                                                            class="form-control" type="text" maxlength="10"
                                                            placeholder="RG" name="rg" id="rg"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label><strong>CPF</strong></label><input
                                                            class="form-control" type="text" maxlength="11"
                                                            placeholder="CPF" name="cpf" id="cpf"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label><strong>Sexo</strong></label>
                                                        <input class="form-control" type="text" name="sexo"
                                                               id="sexo"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-sm" id="btn_informacoes">Salvar
                                                </button>
                                            </div>
                                        </form>
                                        <div class="card mb-1">
                                            <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                                    href="#anuidadeSocio" aria-expanded="true"
                                                    aria-controls="collapseExample" data-target="#anuidadeSocio">
                                                <h6 class="text-primary font-weight-bold m-0">Anuidade</h6>
                                            </button>
                                            <div class="card-body collapsed" id="anuidadeSocio">
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
                                                                        <h3>Valor: R$<h2 id="valor"></h2></h3>
                                                                        <h4>Pago: R$<h3 id="pago"></h3></h4>
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
                                                                                            type="text"
                                                                                            placeholder="Valor"
                                                                                            name="valorPago"
                                                                                            id="valorPago"/>
                                                                                        <div class="card-footer">
                                                                                            <button type="button"
                                                                                                    id="btn_registra_pagamento"
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
                                                            <div id="gera_anuidade">
                                                                <div style="text-align: center;">
                                                                    <button class="btn-lg border py-2"
                                                                            id="gera_anuidade">
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
                                                <form id="formEndereco" action="#" method="PUT">
                                                    @csrf
                                                    <div class="form-group"><label><strong>Rua</strong></label><input
                                                            class="form-control" type="text"
                                                            placeholder="Rua" name="rua" id="rua"></div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label><strong>Numero</strong></label><input
                                                                    class="form-control" type="text"
                                                                    placeholder="Numero" name="numero" id="numero">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label><strong>Bairro</strong></label><input
                                                                    class="form-control" type="text"
                                                                    placeholder="Bairro" name="bairro" id="bairro">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label><strong>Cidade</strong></label><input
                                                                    class="form-control" type="text"
                                                                    placeholder="Cidade" name="cidade" id="cidade">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label><strong>UF</strong></label><input
                                                                    class="form-control" type="text"
                                                                    placeholder="UF" name="uf" id="uf"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label><strong>CEP</strong></label><input
                                                                    class="form-control" type="text"
                                                                    placeholder="CEP" name="cep" id="cep"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label><strong>E-Mail</strong></label><input
                                                                    class="form-control" type="text"
                                                                    placeholder="E-Mail" name="mail" id="mail">
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
                                                                    for="address"><strong>Nº
                                                                        registro</strong></label><input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Nº registro" name="n_cr" id="n_cr">
                                                            </div>
                                                            <div class="form-group"><label for="address"><strong>Data
                                                                        expedição</strong></label><input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Data de Expedição"
                                                                    name="data_expedicao"
                                                                    id="data_expedicao">
                                                            </div>
                                                            <div class="form-group"><label for="address"><strong>Data
                                                                        Validade</strong></label><input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Data de validade"
                                                                    name="data_validade"
                                                                    id="data_validade">
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-primary btn-sm">Salvar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- registros -->
                                        <div class="card mb-1">
                                            <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                                    href="#presencaSocio" aria-expanded="true"
                                                    aria-controls="collapseExample" data-target="#presencaSocio">
                                                <h6 class="text-primary font-weight-bold m-0">Presenças</h6>
                                            </button>
                                            <div class="card-body collapse" id="presencaSocio">

                                                <table class="table my-0 hover" id="table_presencas">
                                                    <thead>
                                                    <tr>
                                                        <th>Data</th>
                                                        <th>Calibre</th>
                                                        <th>Disparos</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Data</th>
                                                        <th>Calibre</th>
                                                        <th>Disparos</th>
                                                        <th></th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                                <div class="card-body">
                                                    <div class="card mb-1">
                                                        <button type="button" class="btn border-0 py-3"
                                                                data-toggle="collapse"
                                                                href="#insumoTable" aria-expanded="true"
                                                                aria-controls="collapseExample"
                                                                data-target="#insumoTable">
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
                                                                    <th></th>
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
                                                                    <th></th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div><!-- insumos -->
                                                    <div class="card mb-1">
                                                        <button type="button" class="btn border-0 py-3"
                                                                data-toggle="collapse"
                                                                href="#copaTable" aria-expanded="true"
                                                                aria-controls="collapseExample"
                                                                data-target="#copaTable">
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
                                                                    <th></th>
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
                                                                    <th></th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div><!-- copa -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary btn-sm shadow" id="carregarPresenca">
                                                        <a>Carregar</a>
                                                    </button>
                                                    <button class="btn btn-primary btn-sm shadow"
                                                            id="mostraNovaPresenca">
                                                        <a>Novo</a></button>
                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                        </div> <!-- presenças -->
                                    </div>
                                </div> <!-- informaçoes -->
                                <div class="card shadow mb-1">
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
                                                <a type="button" class="btn border-0" id="btn_apaga_socio">
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
                                <form id="formPresenca">
                                    @csrf
                                    <div id="presencaInfo">
                                        <div>
                                            <div>
                                                <label for="data">Data</label>
                                                <input class="form-control"
                                                       type="text" name="data" id="data"
                                                       placeholder="Data da presença">
                                            </div>
                                            </p>
                                            <div class="row">
                                                <div class="form-group col" id="tiros_div">
                                                    <label for="tiros">Disparos</label>
                                                    <input
                                                        class="form-control"
                                                        type="text" name="tiros"
                                                        id="tiros"
                                                        placeholder="Disparos">
                                                </div>
                                                <div class="form-group col" id="calibre_div">
                                                    <label for="calibre">Calibre</label>
                                                    <input
                                                        class="form-control"
                                                        type="text" name="calibre"
                                                        id="calibre"
                                                        placeholder="Calibre"
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group border" style="padding:2em" id="insumo_div">
                                                    <p>
                                                        <label for="insumo">Insumos</label>
                                                        <input
                                                            class="form-control"
                                                            type="text" name="insumo"
                                                            id="insumo"
                                                            placeholder="Quantidade">
                                                    </p>
                                                    <div>
                                                    <textarea name="descricaoInsumos" id="descricaoInsumos"
                                                              placeholder="Descrição dos gastos em insumos"></textarea>
                                                    </div>
                                                    <p style="padding:1em">
                                                        <label for="pagamentoInsumo">Pago ?</label>
                                                        <select class="form-control" name="pagamentoInsumo"
                                                                id="pagamentoInsumo">
                                                            <option value="1">Sim</option>
                                                            <option value="0" selected>Não</option>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="form-group col border" style="padding:2em" id="copa_div">
                                                    <p>
                                                        <label for="copa">Copa</label>
                                                        <input
                                                            class="form-control"
                                                            type="numeric" name="copa"
                                                            id="copa"
                                                            placeholder="Copa">
                                                    </p>
                                                    <div>
                                                    <textarea name="descricaoCopa" id="descricaoCopa"
                                                              placeholder="Descrição dos gastos na copa"></textarea>
                                                    </div>
                                                    <p style="padding:1em">
                                                        <label for="pagamentoCopa">Pago ?</label>
                                                        <select class="form-control" name="pagamentoCopa"
                                                                id="pagamentoCopa">
                                                            <option value="1">Sim</option>
                                                            <option value="0" selected>Não</option>
                                                        </select>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                    <button type="reset" class="btn btn-danger" id="btn_limpa_presenca">Limpar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- modAL -->
        </div>
    @endauth
    @guest()
        <div style="text-align: center;">
            <a href="/controle/acesso">
                <button class="btn btn-lg btn-primary">Login</button>
            </a>
        </div>
    @endguest
@endsection
