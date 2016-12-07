function insertarRestoDelFormulario(tipo) {
	var contenedor = $(".temp");

	switch(tipo){
		case 1:

			contenedor.html(' \
				<div class="form-group row"> \
					<label for="cargo_empleado" class="col-md-2 col-form-label">Cargo inicial del empleado</label> \
					<div class="col-md-10"> \
						<input type="text" class="form-control" name="cargo" id="cargo_empleado"> \
					</div> \
				</div> \
			');

		break;

		case 2:

			contenedor.html(' \
				<div class="form-group row"> \
					<label for="rif" class="col-md-2 col-form-label">RIF</label> \
					<div class="col-md-10"> \
						<input type="text" class="form-control" name="rif" id="rif"> \
					</div> \
				</div> \
				 \
				<div class="form-group row"> \
					<label for="numColegio" class="col-md-2 col-form-label">Número de Colegio de Odontólogos</label> \
					<div class="col-md-10"> \
						<input type="text" class="form-control" name="numColegio" id="numColegio"> \
					</div> \
				</div> \
			');
		break;
	}
}

function agregarCamposSeleccionEspecializaciones() {
	var cantidad_especializaciones = parseInt($("#numEspecializaciones").val());
	var divEspecializaciones = $("#especializacionesSeleccion");

	divEspecializaciones.html('');

	/*$.ajax("consultarEspecializacionesDisponibles.php")
	.done(
			function() {

			}
		)
	.fail(
			function() {

			}
		)
	.always(
			function() {

			}
		);*/
	for (var i = 0; i < cantidad_especializaciones; i++) {
		divEspecializaciones.append(' \
				<div class="form-group row"> \
					<label for="especializacion-' + i + '" class="col-md-2 col-form-label">Cantidad de especializaciones</label> \
						<select class="form-control" id="especializacion-' + i + '" name="especializacion-' + i + '"> \
							<option value="Ginecología">Ginecología</option> \
							<option value="Doctor de las tetas">Doctor de las tetas</option> \
							<option value="Doctor de las caderas">Doctor de las caderas</option> \
							<option value="Doctor de las piernas">Doctor de las piernas</option> \
						</select> \
			');
	};
}
