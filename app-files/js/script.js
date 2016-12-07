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
