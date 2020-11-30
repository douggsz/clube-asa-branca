@extends('layout.app')
@section('titulo', 'Investimentos')
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    @auth()
    <header style="padding: 2rem;text-align: center;">
        <h1>investimentos</h1>
    </header>
    <div class="container-fluid" id="corpo_investimento">
        <div class="row">
            <div class="col">
                <div class="card border mb-3">
                    <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                            href="#invs_traps" aria-expanded="true" id="btnCollapseInfo"
                            aria-controls="collapseExample" data-target="#invs_traps">
                        <h6 class="text font-weight-bold m-0">trap</h6>
                    </button>
                    <div class="collapse show" id="invs_traps">
                        <div class="card-body">
                            <table id="tTrap" class="table hover">
                                <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th>Descrição</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($traps)
                                    @foreach($traps as $trap)
                                        @foreach($investimentos as $invs)
                                            @if($invs->tipo === "TRAP")
                                                <tr>
                                                    <td>{{ $invs->data }}</td>
                                                    <td>{{ $trap->valor }}</td>
                                                    <td>{{ $invs->descricao }}</td>
                                                    <td><a href="/investimentos/apagar/{{$invs->id}}">apagar</a></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th>Descrição</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm" style="align-content: center" id="btn_trap">Novo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- TRAP -->
        <div class="row">
            <div class="col">
                <div class="card border mb-3">
                    <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                            href="#invs_stands" aria-expanded="true" id="btnCollapseInfo"
                            aria-controls="collapseExample" data-target="#invs_stands">
                        <h6 class="text font-weight-bold m-0">stand</h6>
                    </button>
                    <div class="collapse show" id="invs_stands">
                        <div class="card-body">
                            <table id="tStand" class="table hover">
                                <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th>Descrição</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($stands)
                                    @foreach($stands as $stand)
                                        @foreach($investimentos as $invs)

                                            @if($invs->tipo === "STAND")
                                                <tr>
                                                    <td>{{ $invs->data }}</td>
                                                    <td>{{ $stand->valor }}</td>
                                                    <td>{{ $invs->descricao }}</td>
                                                    <td><a href="/investimentos/apagar/{{$invs->id}}">apagar</a></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th>Descrição</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm" style="align-content: center" id="btn_stand">Novo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- STAND -->
        <div class="row">
            <div class="col">
                <div class="card border mb-3">
                    <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                            href="#invs_sede" aria-expanded="true" id="btnCollapseInfo"
                            aria-controls="collapseExample" data-target="#invs_sede">
                        <h6 class="text font-weight-bold m-0">sede</h6>
                    </button>
                    <div class="collapse show" id="invs_sede">
                        <div class="card-body">
                            <table id="tSede" class="table hover">
                                <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th>Descrição</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($sedes)
                                    @foreach($sedes as $sede)
                                        @foreach($investimentos as $invs)
                                            @if($invs->tipo === "SEDE")
                                                <tr>
                                                    <td>{{ $invs->data }}</td>
                                                    <td>{{ $sede->valor }}</td>
                                                    <td>{{ $invs->descricao }}</td>
                                                    <td><a href="/investimentos/apagar/{{$invs->id}}">apagar</a></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th>Descrição</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm" style="align-content:center" id="btn_sede">Novo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- SEDE -->
    </div>
    <div class="modal" tabindex="-1" id="novoInvestimento">
        <div class="modal-dialog modal-lg">
            <form class="form-inline" id="formInvestimento">
                <div class="modal-content">
                    <div class="modal-header">
                        <div>
                            <h5 class="modal-title">Novo Investimento</h5>
                        </div>
                        <button type="button" class="close" id="btn_fecha_investimento" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <dIv class="form-group">

                                <div class="input-group" style="padding: .2em">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Data</span>
                                        <input class="form-control" type="text" name="data" id="data"
                                               data-mask="00/00/0000" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="input-group" style="padding: .2em">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Tipo</span>
                                        <input class="form-control" type="text" name="tipo" id="tipo" disabled>
                                    </div>
                                </div>
                                <div class="input-group" style="padding: .2em">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Valor</span>
                                        <input class="form-control" type="text" name="valor" id="valor" required>
                                    </div>
                                </div>
                            </dIv>
                            <div class="input-group-append" style="padding: 0.5em;">
                                <span class="input-group-text">Descrição</span>
                                <input class="form-control-plaintext" type="text" name="descricao" id="descricao" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div> <!-- modAL -->
    @endauth
    @guest()
        <div style="text-align: center;">
            <a href="/controle/acesso">
                <button class="btn btn-lg btn-primary">Login</button>
            </a>
        </div>
    @endguest
@endsection
