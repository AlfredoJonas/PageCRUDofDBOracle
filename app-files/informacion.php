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
						<div class="panel-heading">Selección de consultas</div>
						<div class="panel-body">
							<div id="form-messages" class="alert .alert-dismissible fade in hidden">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							</div>
							<form class="formConsultas" action="ajax-handler.php">
								<div class="form-group">
							   <label for="sel">Consulta a realizar</label>
							   <select class="form-control selectConsultas" id="sel">
									 <!-- Aqui las consultas disponibles -->
									 	<?php
											foreach (CONSULTAS as $consulta => $sql) {
												echo '<option value="'.strtolower($sql).'">'.$consulta.'</option>';
											}
										 ?>
							   </select>
							 	</div>
							<!--	<div class="form-group">
									<input type="submit" class="form-control" name="buscar" value="Buscar">
								</div>-->
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include('footer.php'); ?>
	</body>
</html>
