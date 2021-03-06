<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				requestCitas();
				requestNombrePacientes();
				requestNombreDoctores();

				$('.formCita').submit(function(event) {
					submitCita(event);
				});
			});
		</script>
	</head>
	<body>
		<?php include('header.php'); ?>
			<div class="container-fluid">
				<div class="container col-sm-5">
					<div id="form-messages" class="alert alert-dismissable fade in hidden">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					</div>

					<form class="formCita well form-horizontal" action="dml-handler.php" role="form">

						<?php include('checks.php'); ?>

						<fieldset class="fields hidden" data-ruta="RUTA_CITAS" data-consulta="CITA_ESPECIFICA">
							<legend>Control de citas</legend>

							<div class="odontogramaInputDiv form-group">
								<label for="odontogramaInput" class="col-sm-3 control-label">Odontograma</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" id="odontogramaInput" maxlength="250" name="url_imagen_odontograma" class="form-control odontogramaInput">
									</div>
									<small id="select-esp-help" class="form-text text-muted">Inserte el URL de la imagen</small>
								</div>
							</div>

							<div class="fechaHoraDiv form-group">
								<label for="fechaInput" class="col-sm-3 control-label">Cita</label>
								<div class="col-sm-9 input-group">
									<div class="fechaInputDiv col-sm-7">
										<input type="date" id="fechaInput" name="fecha" class="form-control fechaInput">
									</div>
									<div class="horaInputDiv col-sm-5">
										<select id="horaInput" name="hora" class="form-control horaInput">
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
							</div>

							<div class="presupuestoInputDiv form-group">
								<label for="presupuestoInput" class="col-sm-3 control-label">Presupuesto</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" id="presupuestoInput" name="costo" class="form-control presupuestoInput">
									</div>
									<small id="select-esp-help" class="form-text text-muted">En USD</small>
								</div>
							</div>

							<div class="motivo form-group">
								<label for="motivo" class="col-sm-3 control-label">Motivo</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" id="motivo" name="motivo" class="form-control motivo">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="pacienteSeleccion" class="col-sm-3 control-label">Pacientes</label>
								<div class="col-sm-9 inputGroupContainer pacienteSeleccionDiv">
									<select id="pacienteSeleccion" name="ci_paciente" class="pacienteSeleccion form-control" data-ruta="RUTA_CITAS" data-consulta="LISTA_NOMBRES_PACIENTES">
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="doctorSeleccion" class="col-sm-3 control-label">Doctores</label>
								<div class="doctorSeleccionDiv col-sm-9 inputGroupContainer">
									<select id="doctorSeleccion" name="ci_doctor" class="doctorSeleccion form-control" data-ruta="RUTA_CITAS" data-consulta="LISTA_NOMBRES_DOCTORES">
									</select>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-4">
									<button type="submit" class="btn btn-primary">Guardar <span class="glyphicon glyphicon-ok"></span></button>
								</div>
							</div>
						</fieldset>
					</form>

					<div class="forms">
					</div>

        </div>

				<div class="container col-sm-7">
					<div class="panel panel-primary">
						<div class="panel-heading">Citas</div>
						<div class="panel-body consulta-body">
							<table class="table table-hover table-striped">
								<thead class="table-head">
								</thead>
								<tbody class="table-body"></tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		<?php include('footer.php'); ?>
	</body>
</html>
