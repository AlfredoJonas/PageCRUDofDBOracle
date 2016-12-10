<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				requestEspecializaciones();
			});
		</script>
	</head>
	<body>
		<?php include('header.php');?>
			<div class="container">
				<div class="container col-sm-5">

					<div id="form-messages" class="alert .alert-dismissible fade in hidden">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					</div>

					<form class="formEmpleado well form-horizontal" action="ajax-handler.php" role="form">

						<legend>Empleados</legend>

						<fieldset>
							<div class="form-group">
								<label for="cifi" class="col-sm-3 control-label">C.I. o pasaporte</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="cedula" id="cifi" placeholder="Ingrese la cedula de identidad o el pasaporte del empleado" required>
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
								<label for="afi" class="col-sm-3 control-label">Apellido</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="apellido" id="afi" placeholder="Ingrese el apellido del empleado">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="ffi" class="col-sm-3 control-label">Fecha de nacimiento</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="date" class="form-control" name="fechaNacimiento" id="ffi">
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
										<input type="text" class="form-control" name="telefono" id="telffi" placeholder="Ingrese el teléfono del empleado">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="tipoEmpleado" class="col-sm-3 control-label">Tipo</label>
								<div class="col-sm-4 inputGroupContainer">
									<div class="radio">
										<label>
											<input type="radio" name="tipoEmpleado" id="tipoEmpleado" value="1" onclick="insertHTML(1)">Empleado
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="tipoEmpleado" id="tipoEmpleado" value="2" onclick="insertHTML(2)">Doctor
										</label>
									</div>
								</div>
							</div>

							<div class="temp"></div>

							<div class="form-group">
								<label for="especializacion" class="col-sm-3 control-label">Especializacion</label>
								<div class="col-sm-8 pull-right inputGroupContainer">
									<select multiple class="form-control especializaciones" id="especializacion" name="especializacion" data-ruta="RUTA_EMPLEADOS" data-consulta="LISTA_ESPECIALIZACIONES">
										<!-- aqui va lo que devuelva el ajax -->
									</select>
								</div>
								<div class="col-sm-4">
									<small class="form-text text-muted">Puede seleccionar mas de una</small>
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
