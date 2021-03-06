<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				requestEspecializaciones();
				requestEmpleados();

				$('.formEmpleado').submit(function(event) {
					submitEmpleado(event);
				});
			});
		</script>
	</head>
	<body>
		<?php include('header.php');?>
			<div class="container-fluid">
				<div class="container col-sm-5">

					<div id="form-messages" class="alert alert-dismissable fade in hidden">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					</div>

					<input type="text" class="form-control" name="id_especializacion" hidden>

					<form class="formEmpleado well form-horizontal" action="dml-handler.php" role="form">

						<?php include('checks.php'); ?>

						<fieldset class="fields hidden" data-ruta="RUTA_EMPLEADOS" data-consulta="EMPLEADO_ESPECIFICO">
							<legend>Empleados</legend>
							<div class="form-group">
								<label for="cifi" class="col-sm-3 control-label">C.I. o pasaporte</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="ci" id="cifi" placeholder="Ingrese la cedula de identidad o el pasaporte del empleado" required>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="nfi" class="col-sm-3 control-label">Nombre</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="nombre" id="nfi" placeholder="Ingrese el nombre del empleado">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="ffi" class="col-sm-3 control-label">Fecha de nacimiento</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="date" class="form-control" name="fecha_nac" id="ffi">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="dfi" class="col-sm-3 control-label">Dirección</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="direccion" id="dfi" placeholder="Ingrese la direccion del empleado">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="telffi" class="col-sm-3 control-label">Teléfono</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="tel" class="form-control" name="telefono" id="telffi" placeholder="Ingrese el teléfono del empleado">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="tipo_empleado" class="col-sm-3 control-label">Tipo</label>
								<div class="col-sm-4 inputGroupContainer">
									<div class="radio">
										<label>
											<input type="radio" name="tipo_empleado" id="tipo_empleado" value="1" onclick="insertHTML('empleados', 1)">Empleado
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="tipo_empleado" id="tipo_empleado" value="2" onclick="insertHTML('empleados', 2)">Doctor
										</label>
									</div>
								</div>
							</div>

							<div class="empleado hidden">
								<div class="form-group">
									<label for="sueldo" class="col-sm-3 control-label">Sueldo</label>
									<div class="col-sm-9 inputGroupContainer">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											<input type="tel" class="form-control" name="sueldo" id="sueldo" placeholder="Ingrese el sueldo del empleado">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="cargo_empleado" class="col-sm-3 control-label">Cargo</label>
									<div class="col-sm-9 inputGroupContainer">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											<input type="text" class="form-control" name="cargo" id="cargo_empleado" placeholder="Ingrese el cargo del empleado">
										</div>
									</div>
								</div>
							</div>

							<div class="doctor hidden">
								<div class="form-group">
									<label for="rif" class="col-sm-3 control-label">RIF</label>
									<div class="col-sm-9 inputGroupContainer">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											<input type="text" class="form-control" name="rif" id="rif" placeholder="Ingrese el RIF del doctor">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="numColegio" class="col-sm-3 control-label">Número del colegio</label>
									<div class="col-sm-9 inputGroupContainer">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											<input type="text" class="form-control" name="num_colegio" id="numColegio" placeholder="Ingrese el número de colegio del doctor">
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="especializacion" class="col-sm-3 control-label">Especializacion</label>
								<div class="col-sm-8 pull-right inputGroupContainer">
									<select multiple class="form-control especializaciones" id="especializacion" name="especializacion" data-ruta="RUTA_EMPLEADOS" data-consulta="LISTA_ESPECIALIZACIONES">
										<!-- aqui va lo que devuelva el ajax -->
									</select>
								</div>
								<div class="col-sm-4">
									<small class="form-text text-muted">Siempre mantenga presionado CTRL</small>
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
						<div class="panel-heading">Empleados</div>
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
