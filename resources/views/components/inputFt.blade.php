<div class="input-group" style="padding: .5em;">
    <div class="custom-file">
        <span class="custom-file-label">{{$conteudo ?? ''}}</span>
        <input class="custom-file-input" type="file" accept=".jpg,.jpeg,.png" aria-describedby="foto"
               name="{{$nome ?? ''}}" id="{{$nome ?? ''}}" {{$req ?? ''}}>
    </div>
</div>
