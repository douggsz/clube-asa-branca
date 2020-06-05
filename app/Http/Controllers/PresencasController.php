<?php

namespace App\Http\Controllers;

use App\Presenca;
use Illuminate\Http\Request;

class PresencasController extends Controller
{
    public function index()
    {
        //
    }
    public function listaJSON(){
        $presencas = Presenca::all();
        return json_encode('$presencas');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
