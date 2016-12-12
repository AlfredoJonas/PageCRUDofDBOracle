<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
		<script type="text/javascript">
			$(document).ready(function() {

				insertHTML('consultas');
				var clone = $("#form-messages").clone();

				$('.selectConsultas').change(function(event) {
					insertHTML('consultas');
					$("#form-messages").replaceWith(clone.clone());
				});

				$('.formConsultas').submit(function(event) {
					submitConsultas(event);
				});
			});
		</script>
	</head>
	<body>
		<?php include('header.php'); ?>
			<div class="container-fluid">
			<div class="container col-sm-5">
				<div id="form-messages" class="alert alert-dismissable fade in hidden">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
				</div>

				<form class="formConsultas well form-horizontal" action="ajax-handler.php">

					<legend>Información</legend>

					<fieldset>
					<div class="form-group">
				   <label for="sel" class="col-sm-3 control-label">Consulta a realizar</label>
					 <div class="col-sm-9 inputGroupContainer">
					   <select name="consulta" class="form-control selectConsultas" data-ruta="RUTA_CONSULTAS" id="sel">
							 <!-- Aqui las consultas disponibles -->
							 	<?php
									foreach (CONSULTAS as $key => $value) {
										echo '<option data-consulta="'.$value.'" value="'.$value.'">'.$key.'</option>';
									}
								 ?>
					   </select>
				 		</div>
			 		</div>

					<div class="<?php echo CONSULTAS['El doctor derrochador']?> hidden">
						<div class="form-group">
							<label for="doc-consulta" class="col-sm-3 control-label">ID Implemento</label>
							<div class="col-sm-9 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" class="form-control" name="id" id="doc-consulta" placeholder="Ingrese el implemento que desea evaluar">
								</div>
							</div>
						</div>
					</div>

					<div class="<?php echo CONSULTAS['Historial de citas']?> hidden">
						<div class="form-group">
							<label for="imp-consulta" class="col-sm-3 control-label">CI Paciente</label>
							<div class="col-sm-9 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" class="form-control" name="ci" id="imp-consulta" placeholder="Ingrese el CI del paciente">
								</div>
							</div>
						</div>
					</div>

					<div class="<?php echo CONSULTAS['Historial de tratamientos']?> hidden">
						<div class="form-group">
							<label for="imp2-consulta" class="col-sm-3 control-label">CI Paciente</label>
							<div class="col-sm-9 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" class="form-control" name="ci" id="imp2-consulta" placeholder="Ingrese el CI del paciente">
								</div>
							</div>
						</div>
					</div>

					<div class="<?php echo CONSULTAS['Tratamientos realizados']?> hidden">
						<div class="form-group">
							<label for="trat-consulta" class="col-sm-3 control-label">Fecha a revisar</label>
							<div class="col-sm-9 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="date" class="form-control" name="fecha" id="trat-consulta">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary">Buscar <span class="glyphicon glyphicon-plus"></span></button>
						</div>
					</div>
				</form>
			</div>

			<div class="container col-sm-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Resultado de la consulta</div>
					<div class="panel-body consulta-body">
						<table class="table table-hover table-striped">
					    <thead class="table-head">

					    </thead>
					    <tbody class="table-body">

					    </tbody>
					  </table>
					</div>
				</div>
			</div>
		</div>
		<?php include('footer.php'); ?>
	</body>
</html>
