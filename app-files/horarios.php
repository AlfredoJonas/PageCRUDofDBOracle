<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
		<script type="text/javascript">
			/*$(document).ready(function() {
				requestEspecializaciones();
			});*/
		</script>
	</head>
	<body>
		<?php include('header.php');?>
			<div class="container">
				<div class="container col-sm-5">

					<div id="form-messages" class="alert alert-dismissable fade in hidden">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					</div>

					<form class="formHorario well form-horizontal" action="ajax-handler.php" role="form">

						<legend>Empleados</legend>

						<fieldset>
	            <div class="form-group">
								<label for="doctorGlobal" class="col-sm-3 control-label">Tipo</label>
								<div class="col-sm-4 inputGroupContainer">
									<div class="radio">
										<label>
											<input type="radio" class="doctorGlobalRadio" name="doctorGlobal" id="doctorGlobal" value="1" onclick="doctorGlobalRequest(1)">Global
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" class="doctorGlobalRadio" name="doctorGlobal" id="doctorGlobal" value="2" onclick="doctorGlobalRequest(2)">Doctor específico
										</label>
									</div>
								</div>
							</div>

							<div class="divDoctores form-group hidden">
								<label for="doctorSeleccionDiv" class="col-sm-3 control-label">Doctores</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<select id="doctorSeleccion" name="doctorSeleccion" class="doctorSeleccion form-control" data-ruta="RUTA_CITAS" data-consulta="LISTA_NOMBRES_DOCTORES" disabled required>
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="diaRango" class="col-sm-3 control-label">Periodo</label>
								<div class="col-sm-4 inputGroupContainer">
									<div class="radio">
										<label>
											<input type="radio" class="diaRangoRadio" name="diaRango" id="diaRango" value="1" onclick="diarioRangoRequest(1)">Dia específico
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" class="fdiaRangoRadio" name="diaRango" id="diaRango" value="2" onclick="diarioRangoRequest(2)">Rango de fechas
										</label>
									</div>
								</div>
							</div>

							<div class="fechasDiv form-group hidden">
							<small id="select-esp-help" class="form-text text-muted">\
							  Seleccione la(s) fecha(s) de su consulta.</small>
							</div>


							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary">Guardar <span class="glyphicon glyphicon-plus"></span></button>
							</div>
						</fieldset>
          </form>
        </div>
			</div>
		<?php include('footer.php'); ?>
	</body>
</html>
