@extends('layout.app')
@section('titulo', 'Login')
@section('body')
    @guest()
    <div style="text-align: center; vertical-align: center">
        <p>você esta acessando uma área restrita é necessario inserir suas credenciais</p>
        <img src="{{asset('/img/icons/android-icon-144x144.png')}}"
             style="margin-bottom: 4rem;" class="img-fluid figure-img">
        <form method="POST" action="{{route('usuario.login.submit')}}">
            @csrf
            <p><label class="label" for="user">Usuario</label>
                <input type="text" id="user" name="user" class="text" placeholder="Usuario"></p>
            <p><label class="label" for="pass">Senha</label>
                <input type="password" id="password" name="password" class="text" placeholder="Senha"></p>
            <button type="submit" class="btn btn-primary btn-sm">entrar</button>
        </form>
    </div>
    @endguest
@endsection
