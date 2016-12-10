<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.selectConsultas').change(function(event) {
					requestConsultas(event);
				});
			});
		</script>
	</head>
	<body>
		<?php include('header.php'); ?>
		<div class="container">
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
										echo '<option value="'.$value.'">'.$key.'</option>';
									}
								 ?>
					   </select>
				 		</div>
			 		</div>

					<div class="<?php echo CONSULTAS['El doctor derrochador']?> hidden">
						<div class="form-group implemento">
							<label for="imp-consulta" class="col-sm-3 control-label">ID Implemento</label>
							<div class="col-sm-9 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" class="form-control" name="id" id="imp-consulta" placeholder="Ingrese el implemento que desea evaluar" required>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary">Guardar <span class="glyphicon glyphicon-plus"></span></button>
						</div>
					</div>
				</form>
			</div>

				<div class="container col-sm-7">
					<div class="panel panel-primary">
						<div class="panel-heading">Resultado de la consulta</div>
						<div class="panel-body consulta-body">
							<table class="table table-hover">
						    <thead>

						    </thead>
						    <tbody class="table-body">

						    </tbody>
						  </table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include('footer.php'); ?>
	</body>
</html>
