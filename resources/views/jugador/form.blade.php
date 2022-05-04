<h1>{{$modo}} jugador</h1>
   <!-- Grupo: Nombres del Menor -->
    <div class="formulario__grupo" id="grupo__Nombre">
        <div class="formulario__grupo-input">
            <label for="Nombre" class="formulario__label">Nombres: </label>
            <input type="text" class="formulario__input" value="{{isset($jugador->Nombre)?$jugador->Nombre:''}}" name="Nombre" id="Nombre" value="">
        </div>
        <p class="formulario__input-error">Los Nombres solo pueden contener letras y espacios.</p>
    </div>

    <!-- Grupo: Apellidos del Menor -->
    <div class="formulario__grupo" id="grupo__Apellido">
        <div class="formulario__grupo-input">
            <label for="Apellido" class="formulario__label">Apellidos: </label>
            <input type="text" class="formulario__input" value="{{isset($jugador->Apellido)?$jugador->Apellido:''}}" name="Apellido" id="Apellido" value="">
        </div>
        <p class="formulario__input-error">Los Apellidos solo pueden contener letras y espacios.</p>
    </div>

    <!-- Grupo: FechaDeNacimiento del Menor -->
    <div class="formulario__grupo" id="grupo__FechaDeNacimiento">
        <div class="formulario__grupo-input">
            <label for="FechaDeNacimiento" class="formulario__label">Fecha de Nacimiento: </label>
            <input type="date" class="formulario__input" value="{{isset($jugador->FechaDeNacimiento)?$jugador->FechaDeNacimiento:''}}" name="FechaDeNacimiento" id="FechaDeNacimiento" value="">
        </div>
        <p class="formulario__input-error">Ingrese fecha válida.</p>
    </div>          

    <!-- Grupo: Edad del Menor -->
    <div class="formulario__grupo" id="grupo__Edad">
        <div class="formulario__grupo-input">
            <label for="Edad" class="formulario__label">Edad: </label>
            <input type="number" class="formulario__input" value="{{isset($jugador->Edad)?$jugador->Edad:0}}" name="Edad" id="Edad">
        </div>
        <p class="formulario__input-error">La Edad no puede ser negativa.</p>
    </div>

    <!-- Grupo: Sexo del Menor -->
    <div class="formulario__grupo" id="grupo__Sexo">
        <div class="formulario__grupo-input">
            <label for="Sexo" class="formulario__label">Sexo: </label>
            @if(isset($jugador->Sexo))
                @if(strcmp($jugador->Sexo, "Femenino") === 0)
                    <input type="radio" class="form__radio" id="Sexo" value="Masculino" name="Sexo">Masculino
                    <input type="radio" class="form__radio" id="Sexo" value="Femenino" name="Sexo" checked>Femenino
                @else
                    <input type="radio" class="form__radio" id="Sexo" value="Masculino" name="Sexo" checked>Masculino
                    <input type="radio" class="form__radio" id="Sexo" value="Femenino" name="Sexo">Femenino
                @endif
            @else
                <input type="radio" class="form__radio" id="Sexo" value="Masculino" name="Sexo">Masculino
                <input type="radio" class="form__radio" id="Sexo" value="Femenino" name="Sexo">Femenino
            @endif
        </div>
        <p class="formulario__input-error">Seleccione sexo.</p>
    </div>
                
    <!-- Grupo: Equipo favorito del Menor -->
    <div class="formulario__grupo" id="grupoEquipoFavorito">
        <div class="formulario__grupo" id="grupo__EquipoFavorito">
            <div class="formulario__grupo-input">
                <label for="EquipoFavorito" class="formulario__label">Equipo Favorito: </label>
                <select class="formulario__input" name="EquipoFavorito" id="EquipoFavorito">
                    @if(isset($jugador->EquipoFavorito))
                        <option value="Error">Seleccione Uno …</option>
                        @if(strcmp($jugador->EquipoFavorito, "River Plate") === 0)
                            <option value="River Plate" selected>River Plate</option>
                        @else
                            <option value="River Plate">River Plate</option>
                        @endif

                        @if(strcmp($jugador->EquipoFavorito, "Boca Juniors") === 0)
                            <option value="Boca Juniors" selected>Boca Juniors</option>
                        @else
                            <option value="Boca Juniors">Boca Juniors</option>
                        @endif

                        @if(strcmp($jugador->EquipoFavorito, "Independiente") === 0)
                            <option value="Independiente" selected>Independiente</option>
                        @else
                            <option value="Independiente">Independiente</option>
                        @endif

                        @if(strcmp($jugador->EquipoFavorito, "Racing Club") === 0)
                            <option value="Racing Club" selected>Racing Club</option>
                        @else
                            <option value="Racing Club">Racing Club</option>
                        @endif

                        @if(strcmp($jugador->EquipoFavorito, "Otro") === 0)
                            <option value="Otro" selected>Otro</option>
                        @else
                            <option value="Otro">Otro</option>
                        @endif
                    @else
                        <option value="Error" selected>Seleccione Uno …</option>
                        <option value="River Plate">River Plate</option>
                        <option value="Boca Juniors">Boca Juniors</option>
                        <option value="Independiente">Independiente</option>
                        <option value="Racing Club">Racing Club</option>
                        <option value="Otro">Otro</option>
                    @endif
                </select>
            </div>
            <p class="formulario__input-error">Seleccione equipo.</p>
        </div>
                    
        <div class="formulario__grupo" id="grupo__OtroEquipo">    
            <div class="formulario__grupo-input">
                <label for="OtroEquipo" class="formulario__label">Escribe nombre: </label>
                <input type="text" class="formulario__input" id="OtroEquipo" name="OtroEquipo" value="{{isset($jugador->OtroEquipo)?$jugador->OtroEquipo:''}}" disabled>
            </div>
            <p class="formulario__input-error">Escriba equipo.</p>
        </div>
    </div>

    <!-- Grupo: Posición preferida del Menor -->
    <div class="formulario__grupo" id="grupo__PosicionPreferida">
        <div class="formulario__grupo-input">
            <label for="PosicionPreferida" class="formulario__label">Posición Preferida: </label>
            <select class="formulario__input" name="PosicionPreferida" id="PosicionPreferida">
                @if(isset($jugador->PosicionPreferida))
                    <option value="Error">Seleccione Uno …</option>
                    @if(strcmp($jugador->PosicionPreferida, "Arquero") === 0)
                        <option value="Arquero" selected>Arquero</option>
                    @else
                        <option value="Arquero">Arquero</option>
                    @endif

                    @if(strcmp($jugador->PosicionPreferida, "Defensa") === 0)
                        <option value="Defensa" selected>Defensa</option>
                    @else
                        <option value="Defensa">Defensa</option>
                    @endif

                    @if(strcmp($jugador->PosicionPreferida, "Mediocampista") === 0)
                        <option value="Mediocampista" selected>Mediocampista</option>
                    @else
                        <option value="Mediocampista">Mediocampista</option>
                    @endif

                    @if(strcmp($jugador->PosicionPreferida, "Delantero") === 0)
                        <option value="Delantero" selected>Delantero</option>
                    @else
                        <option value="Delantero">Delantero</option>
                    @endif
                @else
                    <option value="Error" selected>Seleccione Uno …</option>
                    <option value="Arquero">Arquero</option>
                    <option value="Defensa">Defensa</option>
                    <option value="Mediocampista">Mediocampista</option>
                    <option value="Delantero">Delantero</option>
                @endif
            </select>
        </div>
        <p class="formulario__input-error">Seleccione posición.</p>
    </div>

    <!-- Grupo: Dirección del Menor -->
    <div class="formulario__grupo" id="grupo__Direccion">
        <div class="formulario__grupo-input">
            <label for="Direccion" class="formulario__label">Dirección: </label>
            <input type="text" class="formulario__input" id="Direccion" name="Direccion" value="{{isset($jugador->Direccion)?$jugador->Direccion:''}}">
        </div>
        <p class="formulario__input-error">Este campo es obligatorio</p>
    </div>

    <!-- Grupo: Teléfono -->
    <div class="formulario__grupo" id="grupo__Telefono">
        <div class="formulario__grupo-input">
            <label for="Telefono" class="formulario__label">Teléfono: </label>
            <input type="tel" class="formulario__input" value="{{isset($jugador->Telefono)?$jugador->Telefono:''}}" name="Telefono" id="Telefono">
        </div>
        <p class="formulario__input-error">El Teléfono solo puede contener números y el máximo son 14 dígitos.</p>
    </div>

    <!-- Grupo: Foto -->
    <div class="formulario__grupo" id="grupo__Foto">
        <div class="formulario__grupo-input">
            <label for="Foto" class="formulario__label">Foto: </label>
            <img src="" id="imagePreview" width="25%" heigth="25%" alt="" class="img-thumbnail img-fluid" >
            @if(isset($jugador->Foto))
            <img src="{{asset('storage').'/'.$jugador->Foto}}" width="25%" heigth="25%" alt="" class="img-thumbnail img-fluid" id="imageStorage">
            @endif
            <input type="file" class="formulario__input" name="Foto" id="Foto">
        </div>
        <p class="formulario__input-error">El Teléfono solo puede contener números y el máximo son 14 dígitos.</p>
    </div>

    @if($modo != "Ver")
        @if($modo == "Crear")
            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><b>Error:</b> Por favor complete el formulario correctamente. </p>
            </div>
        @else
            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><b>Error:</b> Por favor edite el formulario correctamente. </p>
            </div>
        @endif

        <button type="submit" class="btn btn-success">Guardar datos</button>

        @if($modo == "Crear")
            <button type="reset" class="btn btn-warning" id="btn_warningC">Reiniciar formulario</button>
        @else
            <button type="reset" class="btn btn-warning" id="btn_warningE">Reestablecer cambios</button>
        @endif
    @endif
    
    <a href="{{url('jugador/')}}" class="btn btn-secondary">Regresar</a>