<div class="input-group" style="padding: .5em;">
    <div class="input-group-prepend">
        <span class="input-group-text">{{$conteudo ?? ''}}</span>
        <input class="{{$class ?? ''}}" type="{{$tipo ?? ''}}" maxlength="{{$tamanho ?? ''}}" {{$obs ?? ''}}
        placeholder="{{$conteudo ?? ''}}" name="{{$nome ?? ''}}" id="{{$nome ?? ''}}" {{$req ?? ''}}>
    </div>
</div>
