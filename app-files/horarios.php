<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.formHorario').submit(function(event) {
					submitHorario(event);
				});	
			});
		</script>
	</head>
	<body>
		<?php include('header.php');?>
			<div class="container">
				<div class="container col-sm-6">

					<div id="form-messages" class="alert alert-dismissable fade in hidden">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					</div>

					<form id="formHorario" class="formHorario well form-horizontal" action="ajax-handler.php" role="form">
						<legend>Agenda</legend>
						<fieldset>
	            <div class="form-group">
								<label for="doctorGlobal" class="col-sm-3 control-label">Tipo</label>
								<div class="col-sm-4 inputGroupContainer">
									<div class="radio">
										<label>
											<input type="radio" class="doctorGlobalRadio" name="doctorGlobal" id="doctorGlobal" value="1" onclick="insertHTML('doctor', 1)">Global
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" class="doctorGlobalRadio" name="doctorGlobal" id="doctorGlobal" value="2" onclick="insertHTML('doctor', 2)">Doctor específico
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
											<input type="radio" class="diaRangoRadio" name="diaRango" id="diaRango" value="1" onclick="insertHTML('dia', 1)">Dia específico
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" class="fdiaRangoRadio" name="diaRango" id="diaRango" value="2" onclick="insertHTML('dia', 2)">Rango de fechas
										</label>
									</div>
								</div>
							</div>

							<div class="fechasDiv form-group hidden">
								<label for="fechaespecificadiv" class="col-sm-3 control-label">Fecha</label>

								<div class="col-sm-9 inputGroupContainer dia-especifico hidden">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="date" class="diaInput form-control" id="diaInput" name="diaInput" placeholder="Día específico">
									</div>
								</div>
								<div class="input-group rango hidden">
									<div class="col-sm-6">
										<input type="date" class="dia1Input form-control" id="dia1Input" name="dia1Input">
									</div>
									<div class="col-sm-6">
										<input type="date" class="dia2Input form-control" id="dia2Input" name="dia2Input">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary">Buscar <span class="glyphicon glyphicon-plus"></span></button>
							</div>
						</fieldset>
          			</form>
        		</div>


        		<div class="container col-sm-6 hidden divTablaResultados">
	        		<div class="panel panel-primary">
						<div class="panel-heading">Resultado de la consulta</div>
						<div class="panel-body consulta-body">
			        		<table class="table table-hover table-striped">
			        			<thead class="table-head">
			        				<tr>
			        					<th>Fecha y Hora</th>
			        					<th>Nombre del doctor</th>
			        					<th>Paciente</th>
			        					<th>Tipo de actividad</th>
			        				</tr>
			        			</thead>
			        			<tbody class="cuerpoTablaResultados table-body"></tbody>
			        		</table>
			        	</div>
			        </div>
        		</div>
			</div>
		<?php include('footer.php'); ?>
	</body>
</html>
