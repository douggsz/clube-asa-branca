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
                    <div class="card mb-4">
                        <div class="card-body text-center shadow">
                            <img class="rounded-circle mb-3 mt-4" src="{{ asset('storage/'. $socio->foto->img )}}" width="160" height="160">
                            <div class="custom-file">
                                <form action="/fotos/{{ $socio->foto->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" class="custom-file-input" name="foto" id="foto" accept=".jpg,.jpeg,.png">
                                    <label class="custom-file-label" for="customFile">Mudar foto</label>
                                    <br><br><button class="btn btn-primary">Salvar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{ $socio->id }}" id="idSocio">
                    <div class="card shadow mb-4">
                        <button type="button" class="card-header border-0 py-3" onclick="pagamentos()">
                            <h6 class="text-primary font-weight-bold m-0">Pagamentos</h6>
                        </button>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0">Telefones</h6>
                        </div>
                        <div class="card-body">
                            <form id="formTelefones" action="/contatos/{{$socio->contato->id}}" method="POST">
                                @csrf
                                <div class="form-group"><label for="address"><strong>Celular</strong></label><input class="form-control" type="text" @isset($socio->contato->n_celular) value="{{$socio->contato->n_celular}}" @endif placeholder="Numero celular" name="n_celular" id="n_celular"></div>
                                <div class="form-group"><label for="address"><strong>Fixo</strong></label><input class="form-control" type="text" @isset($socio->contato->n_fixo) value="{{$socio->contato->n_fixo}}" @endif placeholder="Telefone Fixo" name="n_fixo" id="n_fixo"></div>
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
                                    <form id="formInformacoes" action="/socios/{{ $socio->id }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nome</strong></label><input class="form-control" type="text" @isset($socio->nome) value="{{$socio->nome}}" @endif placeholder="Nome" name="nome" id="nome" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Apelido</strong></label><input class="form-control" type="text" @isset($socio->apelido) value="{{$socio->apelido}}" @endif placeholder="Apelido" name="apelido" id="apelido"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nº Associado</strong></label><input class="form-control" type="text" @isset($socio->n_associado) value="{{$socio->n_associado}}" @endif placeholder="Nº Associado" name="n_associado" id="n_associado" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Nascimento</strong></label><input class="form-control" type="text" @isset($socio->nascimento) value="{{$socio->nascimento}}" @endif placeholder="Nascimento" name="nascimento" id="nascimento"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>RG</strong></label><input class="form-control" type="text" @isset($socio->rg) value="{{$socio->rg}}" @endif placeholder="RG" name="rg" id="rg"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>CPF</strong></label><input class="form-control" type="text" @isset($socio->cpf) value="{{$socio->cpf}}" @endif placeholder="CPF" name="cpf" id="cpf"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Sexo</strong></label>
                                                    @component('components.seletorSexo')
                                                    {{$socio->sexo}}
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"><button class="btn btn-primary btn-sm">Salvar</button></div>
                                    </form>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Endereços</p>
                                </div>
                                <div class="card-body">
                                    <form id="formContato" action="/enderecos/{{$socio->endereco->id}}" method="POST">
                                        @csrf
                                        <div class="form-group"><label><strong>Rua</strong></label><input class="form-control" type="text" @isset($socio->endereco->rua) value="{{$socio->endereco->rua}}" @endif placeholder="Rua" name="rua" id="rua"></div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Numero</strong></label><input class="form-control" type="text" @isset($socio->endereco->numero) value="{{$socio->endereco->numero}}" @endif placeholder="Numero" name="numero" id="numero"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Bairro</strong></label><input class="form-control" type="text" @isset($socio->endereco->bairro) value="{{$socio->endereco->bairro}}" @endif placeholder="Bairro" name="bairro" id="bairro"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Cidade</strong></label><input class="form-control" type="text" @isset($socio->endereco->cidade) value="{{$socio->endereco->cidade}}" @endif placeholder="Cidade" name="cidade" id="cidade"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>UF</strong></label><input class="form-control" type="text" @isset($socio->endereco->uf) value="{{$socio->endereco->uf}}" @endif placeholder="UF" name="uf" id="uf"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>CEP</strong></label><input class="form-control" type="text" @isset($socio->endereco->cep) value="{{$socio->endereco->cep}}" @endif placeholder="CEP" name="cep" id="cep"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>E-Mail</strong></label><input class="form-control" type="text" @isset($socio->endereco->mail) value="{{$socio->endereco->mail}}" @endif placeholder="E-Mail" name="mail" id="mail"></div>
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

    </script>
@endsection
