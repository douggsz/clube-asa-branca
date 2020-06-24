<?php

namespace App\Http\Controllers;

use App\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{

    public function index()
    {
        //
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
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $novaFoto = Foto::all()->find($id);
        Storage::disk('public')->delete($novaFoto->img);
        $patch = $request->file('foto')->store('img','public');
        $novaFoto->img = $patch;
        $novaFoto->save();
        return redirect('/socios/'. $novaFoto->socio_id);
    }

    public function destroy($id)
    {
        //
    }
}
