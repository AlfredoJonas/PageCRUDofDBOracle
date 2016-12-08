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
							<div class="form-group">
						   <label for="sel">Consulta a realizar</label>
						   <select class="form-control" id="sel">
								 <!-- Aqui las consultas disponibles -->
								 	<?php
										$consultas = unserialize(CONSULTAS);
										foreach ($consultas as $consulta) {
											echo '<option value="'+strtolower($consulta)+'">'+$consulta+'</option>';
										}
									 ?>
						   </select>
						 </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include('footer.php'); ?>
	</body>
</html>
