<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
	</head>
	<body>
		<?php include('header.php'); ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-4">
						<div class="panel panel-primary">
						  <div class="panel-heading">Registro del empleado</div>
						  <div class="panel-body">
								<form class="form-agregarEmpleado" action="" method="GET" role="form">
									<div class="form-group row">
										<label for="cifi" class="col-sm-2 col-form-label">Cédula de identidad o pasaporte</label>
										<div class="col-sm-10">
											<input type="text" class="form-control"name="cedula" id="cifi" placeholder="Ingrese la cedula de identidad o el pasaporte  del empleado" required>
										</div>
									</div>

									<div class="form-group row">
										<label for="nfi" class="col-sm-2 col-form-label">Nombre Completo</label>
										<div class="col-sm-10">
											<input type="text" class="form-control"name="nombre" id="nfi" placeholder="Ingrese el nombre del empleado">
										</div>
									</div>

									<div class="form-group row">
										<label for="ffi" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
										<div class="col-sm-10">
											<input type="date" class="form-control" name="fechaNacimiento" id="ffi">
										</div>
									</div>

									<div class="form-group row">
										<label for="dfi" class="col-sm-2 col-form-label">Direccion</label>
										<div class="col-sm-10">
											<input type="text" class="form-control"name="direccion" id="dfi" placeholder="Ingrese la direccion del empleado">
										</div>
									</div>

									<div class="form-group row">
										<label for="telffi" class="col-sm-2 col-form-label">Teléfono</label>
										<div class="col-sm-10">
											<input type="text" class="form-control"name="telefono" id="telffi" placeholder="Ingrese el teléfono del empleado">
										</div>
									</div>

									<div class="form-group row">
										<label for="tipoEmpleado" class="col-sm-2 col-form-label">Tipo de empleado</label>
										<div class="col-sm-5">
											<input type="radio" class="form-control"name="tipoEmpleado" id="tipoEmpleado" value="1" onclick="insertarRestoDelFormulario(1)">Empleado</input>
										</div>
										<div class="col-sm-5">
											<input type="radio" class="form-control"name="tipoEmpleado" id="tipoEmpleado" value="2" onclick="insertarRestoDelFormulario(2)">Doctor</input>
										</div>
									</div>

									<div class="temp"></div>

									<div class="form-group row">
											<label for="numEspecializaciones" class="col-sm-2 col-form-label">Cantidad de especializaciones</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="numEspecializaciones" id="numEspecializaciones">
											</div>
											<div class="col-sm-2">
												<input type="button" class="form-control" name="numEspecializacionesButton" id="numEspecializacionesButton" onclick="agregarCamposSeleccionEspecializaciones()" value="OK">
											</div>
										</div>

										<div class="row" id="especializacionesSeleccion"></div>

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
