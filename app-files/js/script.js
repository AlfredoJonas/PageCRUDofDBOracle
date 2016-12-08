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
