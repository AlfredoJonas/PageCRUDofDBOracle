/* Atributos globales */
agenda_DoctorOGlobal = 0;
agenda_DiarioRango = 0;


function insertHTML(tipo) {
	var contenedor = $(".temp");

	switch(tipo){
		case 1:
			contenedor.html(' \
				<div class="form-group"> \
					<label for="cargo_empleado" class="col-sm-3 control-label">Cargo</label> \
					<div class="col-sm-9 inputGroupContainer">\
						<div class="input-group">\
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>\
							<input type="text" class="form-control" name="cargo" id="cargo_empleado"> \
						</div> \
					</div> \
				</div> \
			');

		break;

		case 2:
			contenedor.html(' \
				<div class="form-group"> \
					<label for="rif" class="col-sm-3 control-label">RIF</label> \
					<div class="col-sm-9 inputGroupContainer">\
						<div class="input-group">\
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>\
							<input type="text" class="form-control" name="rif" id="rif"> \
						</div> \
					</div> \
				</div> \
				 \
				<div class="form-group"> \
					<label for="numColegio" class="col-sm-3 control-label">Número del colegio</label> \
					<div class="col-sm-9 inputGroupContainer">\
						<div class="input-group">\
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>\
							<input type="text" class="form-control" name="numColegio" id="numColegio"> \
						</div> \
					</div> \
				</div> \
			');
		break;
	}
}


function parseData(data, tipo) {
	if(tipo === "multiple_select" || tipo == "single_select")
  		return new Option(data.NOMBRE.toLowerCase(), data.NOMBRE);
	else
		return null;
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
	$(".fechasDiv").append(
		'<label for="fechaespecificadiv" class="col-sm-3 control-label">Fecha</label>'
	);
		switch(option){
			case 1:
				$(".fechasDiv").append(
					'<div class="col-sm-9 inputGroupContainer">\
						<div class="input-group">\
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>\
							<input type="date" class="diaInput form-control" id="diaInput" name="diaInput" placeholder="Día específico">\
						</div>\
					</div>'
				);
			break;
			case 2:
				$(".fechasDiv").append(
					'<div class="input-group">\
						<div class="col-sm-6">\
							<input type="date" class="dia1Input form-control" id="dia1Input" name="dia1Input" placeholder="Fecha inicial">\
						</div>\
						<div class="col-sm-6">\
							<input type="date" class="dia2Input form-control" id="dia2Input" name="dia2Input" placeholder="Fecha final">\
						</div>\
					</div>'
				);
			break;
		}

	agenda_DiarioRango = option;
	$(".fechasDiv").removeClass("hidden");

}
