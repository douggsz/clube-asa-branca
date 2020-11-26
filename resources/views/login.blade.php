@extends('layout.app')
@section('titulo', 'Login')
@section('body')
    <div style="text-align: center; vertical-align: center">
        <p>você esta acessando uma área restrita é necessario inserir suas credenciais</p>
        <img src="{{asset('/img/icons/android-icon-144x144.png')}}"
             style="margin-bottom: 4rem;" class="img-fluid figure-img">
        <p><label class="label" for="user">Usuario</label>
            <input type="text" id="user" class="text" placeholder="Usuario"></p>
        <p><label class="label" for="pass">Senha</label>
            <input type="text" id="pass" class="text" placeholder="Senha"></p>
        <button type="submit" class="btn btn-primary btn-sm">entrar</button>
    </div>
@endsection
