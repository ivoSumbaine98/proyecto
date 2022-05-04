const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/, // 7 a 14 numeros.
	direccion: /^[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)*/
};

var formInscripcion = null;
var inputs = [];
var selects = [];
var btn_warning = null;
var tipoForm ="";

if(document.getElementById('formInscripcionCreate') !== null && document.getElementById('formInscripcionEdit') === null){
	formInscripcion = document.getElementById('formInscripcionCreate');
	var campos = {
		Nombre: false,
		Apellido: false,
		FechaDeNacimiento: false,
		Edad: false,
		Sexo: false,
		EquipoFavorito: false,
		OtroEquipo: false,
		PosicionPreferida: false,
		Direccion: false,
		Telefono: false
	};
	inputs = document.querySelectorAll('#formInscripcionCreate input');
	selects = document.querySelectorAll('#formInscripcionCreate select');
	btn_warning = document.getElementById('btn_warningC');
	tipoForm="Crear";
}else{
	if(document.getElementById('formInscripcionCreate') === null && document.getElementById('formInscripcionEdit') !== null){
		formInscripcion = document.getElementById('formInscripcionEdit');
		var campos = {
			Nombre: true,
			Apellido: true,
			FechaDeNacimiento: true,
			Edad: true,
			Sexo: true,
			EquipoFavorito: true,
			OtroEquipo: true,
			PosicionPreferida: true,
			Direccion: true,
			Telefono: true
		};
		inputs = document.querySelectorAll('#formInscripcionEdit input');
		selects = document.querySelectorAll('#formInscripcionEdit select');
		btn_warning = document.getElementById('btn_warningE');
		tipoForm="Editar";
	}
}

const validar__formulario = (e) =>{
	switch(e.target.name){
		case "Nombre":
			validar__campo(expresiones.nombre.test(e.target.value), e.target.name);
		break;

		case "Apellido":
			validar__campo(expresiones.nombre.test(e.target.value), e.target.name);
		break;
		
		case "Sexo":
			validar__campo((e.target.value == "Masculino" || e.target.value == "Femenino"), e.target.name);
		break;

		case "FechaDeNacimiento":
			var fechaActual = new Date().toISOString().split('T')[0];
			validar__campo((e.target.value <= fechaActual), e.target.name);
		break;

		case "Edad":
			validar__campo((e.target.value >= 0), e.target.name);
		break;

		case "EquipoFavorito":
			validar__campo((e.target.value !== "Error"), e.target.name);
			if(e.target.value == "Otro"){
				document.getElementById('OtroEquipo').disabled = false;
				validar__campo(expresiones.nombre.test(""), 'OtroEquipo');
			}
			else{
				document.getElementById('OtroEquipo').value = "";
				document.getElementById('OtroEquipo').disabled = true;
				validar__campo(expresiones.nombre.test(), 'OtroEquipo');
			}
		break;

		case "OtroEquipo":
			validar__campo(expresiones.nombre.test(e.target.value), e.target.name)
		break;

		case "PosicionPreferida":
			validar__campo((e.target.value !== "Error"), e.target.name);
		break;

		case "Direccion":
			validar__campo(expresiones.direccion.test(e.target.value), e.target.name);
		break;
		
		case "Telefono":
			validar__campo(expresiones.telefono.test(e.target.value), e.target.name);
		break;

		case "Foto":
			validar__campo(validar_foto(e.target.value), e.target.name);
		break;
	};
};

const validar__campo = (expresion, nom_campo) =>{
	if(expresion){
		document.getElementById(`grupo__${nom_campo}`).classList.remove('formulario__grupo-incorrecto');
		document.querySelector(`#grupo__${nom_campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[nom_campo] = true;
	}
	else{
		document.getElementById(`grupo__${nom_campo}`).classList.add('formulario__grupo-incorrecto');
		document.querySelector(`#grupo__${nom_campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[nom_campo] = false;
	}
};

function validar_foto(a){
	if(a !== undefined){
		var foto = document.getElementById('Foto');
		var rutaFoto = foto.value;
		var tamFoto = foto.files[0].size;
		var extValidas = /\.(jpg|png|jpeg)$/i;
		if(tamFoto > 5242880 || extValidas.exec(rutaFoto.toLowerCase()) === null)
			return false;
		else{
			mostrar(foto);
			return true;
		}	
	}
	else
		return false;
};

function mostrar(input){
	var imagen = document.getElementById('imagePreview');
	if(input !== undefined && input.files && input.files[0]){
		var reader = new FileReader();
			reader.onload = function(e){
				imagen.src=e.target.result;
			}
			if(tipoForm === "Editar"){
				document.getElementById('imageStorage').style.display = "none";
			}
			reader.readAsDataURL(input.files[0]);
	}
}

inputs.forEach( (input) => {
	if(input.name !== "Foto"){
		input.addEventListener('keyup', validar__formulario);
		input.addEventListener('blur', validar__formulario);
		input.addEventListener('change', validar__formulario);
	}
	else{
		input.addEventListener('change', validar__formulario);
	}
});

selects.forEach( (select) => {
	select.addEventListener('change', validar__formulario);
	select.addEventListener('blur', validar__formulario);
});

if(formInscripcion !== null){
	btn_warning.addEventListener('click', (e) =>{
		document.getElementById('imagePreview').src="";
		if(tipoForm === "Crear"){
			for(const campo in campos){
				validar__campo(true, campo);
				campos[campo] = false;
			}
		}
		else{
			if(tipoForm === "Editar"){
				for(const campo in campos){
					validar__campo(true, campo);
				}
				document.getElementById('imageStorage').style.display = "inline";
			}
		}
	});
	formInscripcion.addEventListener('submit', (e) =>{
		var flag = true;
		for(const campo in campos){
			if(campos[campo]==false){
				flag = false;
			}
		}
		if(flag){	
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		}
		else{
			e.preventDefault();
			document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		}
	});
}

function deshabilitar(){
	var formInscripcionRead = document.getElementById('formInscripcionRead');
	if(formInscripcionRead !== undefined){
		document.querySelectorAll('#formInscripcionRead input').forEach( (input) => {
			input.disabled=true;
		});
		document.querySelectorAll('#formInscripcionRead select').forEach( (select) => {
			select.disabled=true;
		});
	}
};
