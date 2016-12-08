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
			<div class="container-fluid">
				<div class="row containerFormHorarios">
					<div class="col-sm-6">
	          <div class="panel panel-primary">
							<div class="panel-heading">Registro del empleado</div>
						  	<div class="panel-body">
									<div id="form-messages" class="alert .alert-dismissible fade in hidden">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									</div>
									<form class="formHorario" action="ajax-handler.php" role="form">

	                  <div class="form-group row">
											<label for="doctorGlobal" class="col-sm-1 col-form-label">Tipo</label>
											<div class="col-sm-12 col-sm-offset-2">
												<div class="col-sm-6">
													<label class"radio-inline">
														<input type="radio" class="form-control doctorGlobalRadio" name="doctorGlobal" id="doctorGlobal" value="1" onclick="doctorGlobalRequest(1)">Global
													</label>
												</div>
												<div class="col-sm-6">
													<label class"radio-inline">
														<input type="radio" class="form-control doctorGlobalRadio" name="doctorGlobal" id="doctorGlobal" value="2" onclick="doctorGlobalRequest(2)">Doctor específico
													</label>
												</div>
											</div>
										</div>

										<div class="divDoctores form-group row hidden">
											<label for="doctorSeleccionDiv" class="col-sm-2 col-form-label">Doctores</label>
											<small id="select-esp-help" class="form-text text-muted col-sm-8">Seleccione un doctor para consultar su horario (debe estar registrado)</small>
											<div id="doctorSeleccionDiv" class="doctorSeleccionDiv col-sm-12">
												<select id="doctorSeleccion" name="doctorSeleccion" class="doctorSeleccion form-control" data-ruta="<?php echo RUTA_NOMBRES_DOCTORES ?>" data-consulta="<?php echo LISTA_NOMBRES_DOCTORES ?>" disabled required>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label for="diaRango" class="col-sm-1 col-form-label">Periodo</label>
											<div class="col-sm-12 col-sm-offset-2">
												<div class="col-sm-6">
													<label class"radio-inline">
														<input type="radio" class="form-control diaRangoRadio" name="diaRango" id="diaRango" value="1" onclick="diarioRangoRequest(1)">Dia específico
													</label>
												</div>
												<div class="col-sm-6">
													<label class"radio-inline">
														<input type="radio" class="form-control diaRangoRadio" name="diaRango" id="diaRango" value="2" onclick="diarioRangoRequest(2)">Rango de fechas
													</label>
												</div>
											</div>
										</div>

										<div class="fechasDiv form-group row hidden">
										</div>

	 									<div class="form-group">
											<input type="submit" class="form-control" name="buscar" value="Buscar">
										</div>

		              </form>
	              </div>
	            </div>
						</div>
          </div>
        </div>
			</div>
		<?php include('footer.php'); ?>
	</body>
</html>
