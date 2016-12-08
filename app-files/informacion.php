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
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-5 col-sm-offset-1">
					<div class="panel panel-primary">
						<div class="panel-heading">Selección de consultas</div>
						<div class="panel-body">
							<div id="form-messages" class="alert alert-dismissible fade in hidden">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							</div>

							<form class="formConsultas" action="ajax-handler.php">
								<div class="form-group">
							   <label for="sel">Consulta a realizar</label>
							   <select name="consulta" class="form-control selectConsultas" data-ruta="RUTA_CONSULTAS" id="sel">
									 <!-- Aqui las consultas disponibles -->
									 	<?php
											foreach (CONSULTAS as $consulta) {
												echo '<option value="'.$consulta.'">'.$consulta.'</option>';
											}
										 ?>
							   </select>
							 	</div>

								<div class="form-group row hidden implemento">
									<label for="imp-consulta" class="col-sm-3 col-form-label">ID Implemento</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="id" id="imp-consulta" placeholder="Ingrese el implemento que desea evaluar" required>
									</div>
								</div>

								<div class="buscar form-group hidden">
									<input type="submit" class="form-control" name="buscar" value="Buscar" hidden>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="col-sm-5">
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
