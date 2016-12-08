/* Atributos globales */
agenda_DoctorOGlobal = 0;
agenda_DiarioRango = 0;


function insertHTML(tipo) {
	var contenedor = $(".temp");

	switch(tipo){
		case 1:
			contenedor.html(' \
				<div class="form-group row"> \
					<label for="cargo_empleado" class="col-sm-2 col-form-label">Cargo</label> \
					<div class="col-sm-10"> \
						<input type="text" class="form-control" name="cargo" id="cargo_empleado"> \
					</div> \
				</div> \
			');

		break;

		case 2:
			contenedor.html(' \
				<div class="form-group row"> \
					<label for="rif" class="col-sm-2 col-form-label">RIF</label> \
					<div class="col-sm-10"> \
						<input type="text" class="form-control" name="rif" id="rif"> \
					</div> \
				</div> \
				 \
				<div class="form-group row"> \
					<label for="numColegio" class="col-sm-2 col-form-label">Número del colegio</label> \
					<div class="col-sm-10"> \
						<input type="text" class="form-control" name="numColegio" id="numColegio"> \
					</div> \
				</div> \
			');
		break;
	}
}

function parseData(data, tipo) {
  if (tipo === 'multiple_select') {
    //Esto es porque yo tengo en mi BD una tabla con una columna usuario
    //pero ustedes me entienden
    return new Option(data.USUARIO.toLowerCase(), data.USUARIO);
  }
  else if (tipo === 'single_select'){
    return new Option(data.USUARIO.toLowerCase(), data.USUARIO);
  }
}
function doctorGlobalRequest(option){
	switch(option){
		case 1: 
			//cosas globales
		break;
		case 2:
			//requestDoctores();
			$(".divDoctores").removeClass("hidden");
			$(".doctorSeleccion").removeAttr("disabled");
		break;
	}

	agenda_DoctorOGlobal = option;
}

function diarioRangoRequest(option){
	$(".fechasDiv").html("");
	$(".fechasDiv").append('<label for="fechaSeleccion"class="col-sm-4 col-form-label">Fecha</label>\
										<small id="select-esp-help" class="form-text text-muted col-sm-8">Seleccione la(s) fecha(s) de su consulta.</small>');
		switch(option){
				case 1: 
					$(".fechasDiv").append('<label for="fechaespecificadiv" class="col-sm-6 col-form-label" >Día específico</label><div id="fechaespecificadiv form-group" class="col-sm-6"><input type="date" class="diaInput" id="diaInput" name="diaInput"></div>');
				break;
				case 2:
					$(".fechasDiv").append(' \<label for="fechaespecificadiv1 conjunto" class="col-sm-3 col-form-label" >Fecha inicio</label><div id="fechaespecificadiv1 form-group" class="col-sm-3"><input type="date" class="dia1Input" id="dia1Input" name="dia1Input"></div><label for="fechaespecificadiv2 conjunto" class="col-sm-3 col-form-label" >Fecha fin</label><div id="fechaespecificadiv2 form-group" class="col-sm-3"><input type="date" class="dia2Input" id="dia2Input" name="dia2Input"></div>');
				break;
		}

	agenda_DiarioRango = option;
	$(".fechasDiv").removeClass("hidden");

}
