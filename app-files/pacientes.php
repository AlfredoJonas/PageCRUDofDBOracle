<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				requestPacientes();

				$('.formPaciente').submit(function(event) {
					submitPaciente(event);
				});
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

					<form class="formPaciente well form-horizontal" action="dml-handler.php" role="form">

						<?php include('checks.php'); ?>

						<fieldset class="fields hidden" data-ruta="RUTA_PACIENTES" data-consulta="PACIENTE_ESPECIFICO">
							<legend>Pacientes</legend>

							<div class="form-group">
								<label for="ci-paciente" class="col-sm-3 control-label">C.I. o pasaporte</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="number" class="form-control" name="cedula" id="ci-paciente" placeholder="Ingrese la cedula de identidad o el pasaporte del paciente" required>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="nombre" class="col-sm-3 control-label">Nombre</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del paciente">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="fecha_nac" class="col-sm-3 control-label">Fecha de nacimiento</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="date" class="form-control" name="fecha_nac" id="fecha_nac">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="direccion" class="col-sm-3 control-label">Direccion</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese la direccion del paciente">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="telefono" class="col-sm-3 control-label">Teléfono</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Ingrese el teléfono del paciente">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="ocupacion" class="col-sm-3 control-label">Ocupación</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="ocupacion" id="ocupacion" placeholder="Ingrese la ocupación del paciente">
									</div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-4">
									<button type="submit" class="btn btn-primary">Guardar <span class="glyphicon glyphicon-ok"></span></button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>

				<div class="container col-sm-7">
					<div class="panel panel-primary">
						<div class="panel-heading">Pacientes</div>
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
