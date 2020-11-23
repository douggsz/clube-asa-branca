@extends('layout.app')
@section('titulo', 'Investimentos')
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    <header style="padding: 2rem;text-align: center;"><h1>investimentos</h1></header>
    <div class="container-fluid" id="corpo_investimento">
        <div class="row mb-3">
            <div class="col">
                <div class="card shadow border">
                    <div class="card-header">
                        <div style="text-align: center;"><h3>Trap</h3></div>
                    </div>
                    <div class="card-body">
                        <table id="tTrap" class="table hover my-0">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Valor</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($traps)
                                @foreach($traps as $trap)
                                    @foreach($investimentos as $invs)
                                        @if($invs->descricao === "TRAP")
                                            <tr>
                                                <td>{{ $invs->data }}</td>
                                                <td>{{ $trap->valor }}</td>
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
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" style="align-content: center" id="btn_trap">Novo</button>
                    </div>
                </div>
            </div> <!-- TRAP -->
            <div class="col">
                <div class="card shadow border">
                    <div class="card-header">
                        <div style="text-align: center;"><h3>Stand</h3></div>
                    </div>
                    <div class="card-body">
                        <table id="tStand" class="table hover my-0">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Valor</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($stands)
                                @foreach($stands as $stand)
                                    @foreach($investimentos as $invs)

                                        @if($invs->descricao === "STAND")
                                            <tr>
                                                <td>{{ $invs->data }}</td>
                                                <td>{{ $stand->valor }}</td>
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
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" style="align-content: center" id="btn_stand">Novo</button>
                    </div>
                </div>
            </div> <!-- STAND -->
            <div class="col">
                <div class="card shadow border">
                    <div class="card-header">
                        <div style="text-align: center;"><h3>Sede</h3></div>
                    </div>
                    <div class="card-body">
                        <table id="tSede" class="table hover my-0">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Valor</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($sedes)
                                @foreach($sedes as $sede)
                                    @foreach($investimentos as $invs)
                                        @if($invs->descricao === "SEDE")
                                            <tr>
                                                <td>{{ $invs->data }}</td>
                                                <td>{{ $sede->valor }}</td>
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
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" style="align-content:center" id="btn_sede">Novo</button>
                    </div>
                </div>
            </div> <!-- SEDE -->
        </div>
    </div>
    <div class="modal" tabindex="-1" id="novoInvestimento">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formInvestimento">
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
                            <div class="form-group">
                                <p><input class="form-control text" type="text" name="data" id="data"></p>
                                <p><input class="form-control text" type="text" name="descricao"
                                          id="descricao_investmento" disabled></p>
                                <p><input class="form-control text" type="text" name="valor" id="valor"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- modAL -->
@endsection
