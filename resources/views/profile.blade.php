@extends('layout.app')
@section('titulo', $titulo)
@section('body')

    <div id="content">
        <div class="container-fluid">
            <h3 class="text-dark mb-4">NOME</h3>
            <div class="row mb-3">
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body text-center shadow">
                            <img class="rounded-circle mb-3 mt-4" src="{{asset('img/dogs/image2.jpeg')}}" width="160" height="160">
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm" onclick="alert('')" type="button">Change Photo</button></div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0">Projects</h6>
                        </div>
                        <div class="card-body">
                            <h4 class="small font-weight-bold">Server migration<span class="float-right">20%</span></h4>
                            <div class="progress progress-sm mb-3">
                                <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="sr-only">20%</span></div>
                            </div>
                            <h4 class="small font-weight-bold">Sales tracking<span class="float-right">40%</span></h4>
                            <div class="progress progress-sm mb-3">
                                <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="sr-only">40%</span></div>
                            </div>
                            <h4 class="small font-weight-bold">Customer Database<span class="float-right">60%</span></h4>
                            <div class="progress progress-sm mb-3">
                                <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only">60%</span></div>
                            </div>
                            <h4 class="small font-weight-bold">Payout Details<span class="float-right">80%</span></h4>
                            <div class="progress progress-sm mb-3">
                                <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span></div>
                            </div>
                            <h4 class="small font-weight-bold">Account setup<span class="float-right">Complete!</span></h4>
                            <div class="progress progress-sm mb-3">
                                <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row mb-3 d-none">
                        <div class="col">
                            <div class="card text-white bg-primary shadow">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="m-0">Peformance</p>
                                            <p class="m-0"><strong>65.2%</strong></p>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                    </div>
                                    <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-success shadow">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="m-0">Peformance</p>
                                            <p class="m-0"><strong>65.2%</strong></p>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                    </div>
                                    <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Informações do socio</p>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nome</strong></label><input class="form-control" type="text" placeholder="Nome" name="nome" id="nome" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Apelido</strong></label><input class="form-control" type="email" placeholder="Apelido" name="apelido" id="apelido" required></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nº Associado</strong></label><input class="form-control" type="text" placeholder="Nº Associado" name="nassociado" id="nassociado" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nascimento</strong></label><input class="form-control" type="text" placeholder="Nascimento" name="nascimento" id="nascimento" required></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>RG</strong></label><input class="form-control" type="text" placeholder="RG" name="rg" id="rg" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Emissor</strong></label><input class="form-control" type="text" placeholder="Emissor" name="emissor" id="emissor" required></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Data de expedição</strong></label><input class="form-control" type="text" placeholder="Data de expedição" name="demissor" id="demissor" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>CPF</strong></label><input class="form-control" type="text" placeholder="CPF" name="cpf" id="cpf" required></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Sexo</strong></label><input class="form-control" type="text" placeholder="Sexo" name="sexo" id="sexo" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Estado Civil</strong></label><input class="form-control" type="text" placeholder="Estado Civil" name="estadocivil" id="estadocivil" required></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nacionalidade</strong></label><input class="form-control" type="text" placeholder="Nacionalidade" name="nacionalidade" id="nacionalidade" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Naturalidade</strong></label><input class="form-control" type="text" placeholder="Naturalidade" name="naturalidade" id="naturalidade" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Salvar</button></div>
                                    </form>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Contato</p>
                                </div>
                                <div class="card-body">
                                    <form>
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
                                        <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Salvar</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Forum Settings</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form>
                                <div class="form-group"><label for="signature"><strong>Signature</strong><br></label><textarea class="form-control" rows="4" name="signature"></textarea></div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch"><input class="custom-control-input" type="checkbox" id="formCheck-1"><label class="custom-control-label" for="formCheck-1"><strong>Notify me about new replies</strong></label></div>
                                </div>
                                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
