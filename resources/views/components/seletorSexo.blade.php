<select class="form-control" name="sexo">
    <option value="Masculino"
            @isset($slot)
                @if($slot == "MASCULINO")
                    selected
                @endif
            @endif
    >Masculino</option>

    <option value="Feminino"
            @isset($slot)
                @if($slot == "FEMININO")
                    selected
                @endif
            @endif
    >Feminino</option>
</select>
