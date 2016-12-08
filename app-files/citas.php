<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
		<script type="text/javascript">
			document.ready(function() {
				requestPacientes();
				requestDoctores();
			});

			function requestPacientes(){
				var ruta = $('.pacienteSeleccion').data("ruta");
				var consulta = $('.pacienteSeleccion').data("consulta");
				var formMessages = $('#form-messages');

				$.ajax({
					type: 'POST',
					url: 'ajax-handler.php',
					data: {ruta: ruta, consulta: consulta}
				})

				.done(function(response) {
						for(var key in response) {
							document.querySelector('.pacienteSeleccion').options.add(parseData(response[key], 'single_select'));
						}
				})

				.fail(function(data) {
					formMessages.removeClass('hidden');
					formMessages.addClass('alert-danger');

					if (data.responseText !== '')
						formMessages.innerHtml = data.responseText;
					else
						formMessages.text('Oops! An error occured.');
				});
			}

			function requestDoctores(){
				var ruta = $('.doctorSeleccion').data("ruta");
				var consulta = $('.doctorSeleccion').data("consulta");
				var formMessages = $('#form-messages');

				$.ajax({
					type: 'POST',
					url: 'ajax-handler.php',
					data: {ruta: ruta, consulta: consulta}
				})

				.done(function(response){
					for(var key in response) {
						document.querySelector('.doctorSeleccion').options.add(parseData(response[key], 'single_select'));
					}
				})

				.fail(function(data) {
					formMessages.removeClass('hidden');
					formMessages.addClass('alert-danger');

					if (data.responseText !== '')
						formMessages.innerHtml = data.responseText;
					else
						formMessages.text('Oops! An error occured.');
				});
			}
		</script>
	</head>
	<body>
		<?php include('header.php'); ?>
			<div class="container-fluid">
        <div class="row">
					<div class="col-sm-6">
						<div class="panel panel-primary">
						  <div class="panel-heading">Administracion de citas</div>
						  <div class="panel-body">
								<div id="form-messages" class="alert .alert-dismissible fade in hidden">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								</div>

									<form class="formCitas" action="ajax-handler.php" role="form">
										<div class="form-group row">
											<label for="identificadorInput"class="col-sm-4 col-form-label">Identificador</label>
											<small id="select-esp-help" class="form-text text-muted col-sm-8">Éste es el identificador de la cita</small>
											<div class="col-sm-9">
												<input type="text" id="identificadorInput" name="identificadorInput" class="form-control">
											</div>
											<div class="col-sm-3">
												<input type="button" id="buscarIdentificadorInput" name="buscarIdentificadorInput" class="form-control" value="Buscar">
											</div>
										</div>

										<div class="form-group row">
											<label for="pacienteSeleccion"class="col-sm-4 col-form-label">Pacientes</label>
											<small id="select-esp-help" class="form-text text-muted col-sm-8">Seleccione un paciente para la cita (debe estar registrado)</small>
											<div class="col-sm-12">
												<select id="pacienteSeleccion" name="pacienteSeleccion" class="pacienteSeleccion form-control" data-ruta="<?php echo RUTA_PACIENTES ?>" data-consulta="<?php echo LISTA_PACIENTES ?>">
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label for="doctorSeleccion"class="col-sm-4 col-form-label">Doctores</label>
											<small id="select-esp-help" class="form-text text-muted col-sm-8">Seleccione un doctor para la cita (debe estar registrado)</small>
											<div class="col-sm-12">
												<select id="doctorSeleccion" name="doctorSeleccion" class="doctorSeleccion form-control" data-ruta="<?php echo RUTA_DOCTORES ?>" data-consulta="<?php echo LISTA_DOCTORES ?>">
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label for="fechaInput"class="col-sm-4 col-form-label">Fecha y hora de la cita</label>
												<div class="col-sm-4">
													<input type="date" id="fechaInput" name="fechaInput" class="form-control">
												</div>
												<div class="col-sm-4">
													<select id="horaInput" name="horaInput" class="form-control">
														<option value="8:00">8:00</option>
														<option value="8:30">8:30</option>
														<option value="9:00">9:00</option>
														<option value="9:30">9:30</option>
														<option value="10:00">10:00</option>
														<option value="10:30">10:30</option>
														<option value="11:00">11:00</option>
														<option value="11:30">11:30</option>
														<option value="12:00">12:00</option>
														<option value="12:30">12:30</option>
														<option value="13:00">13:00</option>
														<option value="13:30">13:30</option>
														<option value="14:00">14:00</option>
														<option value="14:30">14:30</option>
														<option value="15:00">15:00</option>
														<option value="15:30">15:30</option>
														<option value="16:00">16:00</option>
														<option value="16:30">16:30</option>
														<option value="17:00">17:00</option>
														<option value="17:30">17:30</option>
														<option value="18:00">18:00</option>
														<option value="18:30">18:30</option>
													</select>
												</div>
										</div>

										<div class="form-group row">
											<label for="odontogramaInput"class="col-sm-4 col-form-label">Odontograma</label>
											<small id="select-esp-help" class="form-text text-muted col-sm-8">Inserte el URL de la imagen</small>
											<div class="col-sm-12">
												<input type="text" id="odontogramaInput" name="odontogramaInput" class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<label for="presupuestoInput"class="col-sm-4 col-form-label">Presupuesto</label>
											<small id="select-esp-help" class="form-text text-muted col-sm-8">En $</small>
											<div class="col-sm-12">
												<input type="text" id="presupuestoInput" name="presupuestoInput" class="form-control">
											</div>
										</div>

										<div class="form-group">
											<input type="submit" class="form-control"name="guardar" value="Agregar">
										</div>

										<div class="form-group">
											<input type="submit" class="form-control"name="update" value="Actualizar datos">
										</div>

									</form>
              </div>
            </div>
          </div>
        </div>
			</div>
		<?php include('footer.php'); ?>
	</body>
</html>
