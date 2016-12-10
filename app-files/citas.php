<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				requestPacientes();
				requestDoctores();
			});
		</script>
	</head>
	<body>
		<?php include('header.php'); ?>
			<div class="container">
				<div class="container col-sm-5">
					<div id="form-messages" class="alert alert-dismissable fade in hidden">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					</div>

					<form class="formCitas well form-horizontal" action="ajax-handler.php" role="form">

						<legend>Empleados</legend>

						<fieldset>
							<div class="form-group">
								<label for="identificadorInput" class="col-sm-3 control-label">Identificador</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<input type="search" id="identificadorInput" name="identificadorInput" class="identificadorInput form-control" data-ruta="RUTA_CITAS" data-consulta="LISTA_ATRIBUTOS_CITA" placeholder="Buscar">
										<span class="input-group-btn">
											<button type="button" id="buscarIdentificadorInput" name="buscarIdentificadorInput" class="btn btn-info btn-md" value="buscar" onclick="requestInformacionCita()">
												<i class="glyphicon glyphicon-search"></i>
											</button>
										</span>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="pacienteSeleccion" class="col-sm-3 control-label">Pacientes</label>
								<div class="col-sm-9 inputGroupContainer">
									<select id="pacienteSeleccion" name="pacienteSeleccion" class="pacienteSeleccion form-control" data-ruta="RUTA_CITAS" data-consulta="LISTA_NOMBRES_PACIENTES">
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="doctorSeleccion" class="col-sm-3 control-label">Doctores</label>
								<div class="doctorSeleccionDiv col-sm-9 inputGroupContainer">
									<select id="doctorSeleccion" name="doctorSeleccion" class="doctorSeleccion form-control" data-ruta="RUTA_CITAS" data-consulta="LISTA_NOMBRES_DOCTORES">
									</select>
								</div>
							</div>

							<div class="fechaHoraDiv form-group">
								<label for="fechaInput" class="col-sm-3 control-label">Cita</label>
								<div class="col-sm-9 input-group">
									<div class="fechaInputDiv col-sm-7">
										<input type="date" id="fechaInput" name="fechaInput" class="form-control">
									</div>
									<div class="horaInputDiv col-sm-5">
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
							</div>

							<div class="odontogramaInputDiv form-group">
								<label for="odontogramaInput" class="col-sm-3 control-label">Odontograma</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="url" id="odontogramaInput" name="odontogramaInput" class="form-control">
									</div>
									<small id="select-esp-help" class="form-text text-muted">Inserte el URL de la imagen</small>
								</div>
							</div>

							<div class="presupuestoInputDiv form-group">
								<label for="presupuestoInput" class="col-sm-3 control-label">Presupuesto</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" id="presupuestoInput" name="presupuestoInput" class="form-control">
									</div>
									<small id="select-esp-help" class="form-text text-muted">En USD</small>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary">Guardar <span class="glyphicon glyphicon-plus"></span></button>
									<button type="submit" class="btn btn-primary" >Actualizar <span class="glyphicon glyphicon-refresh"></span></button>
								</div>
							</div>
						</fieldset>
					</form>
        </div>
			</div>
		<?php include('footer.php'); ?>
	</body>
</html>
