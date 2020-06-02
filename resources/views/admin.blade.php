@extends('layout.app')
@section('titulo','#')
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    <div id="content">
        <div class="container-fluid">
            <h3 class="text-dark mb-4">#</h3>
            <div class="row mb-3">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center shadow">
                            <img class="rounded-circle mb-3 mt-4" src="" width="160" height="160">
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm" onclick="alert('')" type="button">Mudar foto</button></div>
                        </div>
                    </div>
                    <input type="hidden" value="#" id="idSocio">
                    <button class="card shadow mb-4"><div>
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0" onclick="presencas()">Presenças</h6>
                        </div>
                        </div></button>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0" onclick="">Anuidades</h6>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0" onclick="">Registros</h6>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0">Telefones</h6>
                        </div>
                        <div class="card-body">
                            <form id="formTelefones">
                                <div class="form-group"><label for="address"><strong>Celular</strong></label><input class="form-control" type="text" placeholder="Numero celular" name="tcelular" id="tcelular"></div>
                                <div class="form-group"><label for="address"><strong>Fixo</strong></label><input class="form-control" type="text" placeholder="Telefone Fixo" name="tfixo" id="tfixo"></div>
                                <div class="form-group"><button class="btn btn-primary btn-sm">Salvar</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Informações do socio</p>
                                </div>
                                <div class="card-body">
                                    <form id="formInformacoes">
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nome</strong></label><input class="form-control" type="text" placeholder="Nome" name="nome" id="nome" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Apelido</strong></label><input class="form-control" type="email" placeholder="Apelido" name="apelido" id="apelido"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nº Associado</strong></label><input class="form-control" type="text" placeholder="Nº Associado" name="nassociado" id="nassociado" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nascimento</strong></label><input class="form-control" type="text" placeholder="Nascimento" name="nascimento" id="nascimento"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>RG</strong></label><input class="form-control" type="text" placeholder="RG" name="rg" id="rg"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>CPF</strong></label><input class="form-control" type="text" placeholder="CPF" name="cpf" id="cpf"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Sexo</strong></label><input class="form-control" type="text" placeholder="Sexo" name="sexo" id="sexo"></div>
                                            </div>
                                        </div>
                                        <div class="form-group"><button class="btn btn-primary btn-sm">Salvar</button></div>
                                    </form>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Contato</p>
                                </div>
                                <div class="card-body">
                                    <form id="formContato">
                                        <div class="form-group"><label for="address"><strong>Rua</strong></label><input class="form-control" type="text" placeholder="Rua" name="rua" id="rua"></div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="city"><strong>Numero</strong></label><input class="form-control" type="text" placeholder="Numero" name="numero" id="numero"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="country"><strong>Bairro</strong></label><input class="form-control" type="text" placeholder="Bairro" name="bairro" id="bairro"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="country"><strong>Cidade</strong></label><input class="form-control" type="text" placeholder="Cidade" name="cidade" id="cidade"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="country"><strong>UF</strong></label><input class="form-control" type="text" placeholder="UF" name="uf" id="uf"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="city"><strong>CEP</strong></label><input class="form-control" type="text" placeholder="CEP" name="cep" id="cep"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="city"><strong>E-Mail</strong></label><input class="form-control" type="text" placeholder="E-Mail" name="mail" id="mail"></div>
                                            </div>
                                        </div>
                                        <div class="form-group"><button class="btn btn-primary btn-sm">Salvar</button></div>
                                    </form>
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

        public function presencas() {
            alert('');
        }

    </script>
@endsection
