<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
	</head>
	<body>
		<?php include('header.php'); ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<div class="panel panel-primary">
							<div class="panel-heading">Registro del paciente</div>
							<div class="panel-body">
								<div id="form-messages" class="alert .alert-dismissible fade in hidden">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								</div>
								<form class="formEmpleado" action="ajax-handler.php" role="form">
									<div class="form-group row">
										<label for="ci-paciente" class="col-sm-2 col-form-label">C.I. o pasaporte</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="cedula" id="ci-paciente" placeholder="Ingrese la cedula de identidad o el pasaporte del empleado" required>
										</div>
									</div>

									<div class="form-group row">
										<label for="nombre-paciente" class="col-sm-2 col-form-label">Nombre</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="nombre" id="nombre-paciente" placeholder="Ingrese el nombre del empleado">
										</div>
									</div>

									<div class="form-group row">
										<label for="apellido-paciente" class="col-sm-2 col-form-label">Apellido</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="apellido" id="apellido-paciente" placeholder="Ingrese el apellido del empleado">
										</div>
									</div>

									<div class="form-group row">
										<label for="nac-paciente" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
										<div class="col-sm-10">
											<input type="date" class="form-control" name="fechaNacimiento" id="nac-paciente">
										</div>
									</div>

									<div class="form-group row">
										<label for="dir-paciente" class="col-sm-2 col-form-label">Direccion</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="direccion" id="dir-paciente" placeholder="Ingrese la direccion del empleado">
										</div>
									</div>

									<div class="form-group row">
										<label for="tel-paciente" class="col-sm-2 col-form-label">Teléfono</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="telefono" id="tel-paciente" placeholder="Ingrese el teléfono del empleado">
										</div>
									</div>

									<div class="form-group row">
										<label for="ocu-paciente" class="col-sm-2 col-form-label">Ocupación</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="telefono" id="ocu-paciente" placeholder="Ingrese el teléfono del empleado">
										</div>
									</div>

									<div class="form-group">
										<input type="submit" class="form-control" name="guardar" value="Agregar">
									</div>

									<div class="form-group">
										<input type="submit" class="form-control" name="update" value="Actualizar datos">
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
