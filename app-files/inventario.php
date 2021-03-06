<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				requestInventario();

				$('.formImplemento').submit(function(event) {
					submitImplemento(event);
				});
			});
		</script>
	</head>
	<body>
		<?php include('header.php'); ?>
			<div class="container-fluid">
				<div class="container col-sm-5">
					<div id="form-messages" class="alert alert-dismissable fade in hidden">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					</div>

					<form class="formImplemento well form-horizontal" action="dml-handler.php" role="form">

						<?php include('checks.php'); ?>

						<fieldset class="fields hidden" data-ruta="RUTA_INVENTARIO" data-consulta="IMPLEMENTO_ESPECIFICO">
							<legend>Inventario</legend>
							<div class="form-group">
								<label for="nfi" class="col-sm-3 control-label">Nombre</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="nombre" id="nfi" placeholder="Nombre del implemento" autofocus>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="nfi" class="col-sm-3 control-label">Marca</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="marca" id="nfi" placeholder="Marca del implemento" autofocus>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="nfi" class="col-sm-3 control-label">Descripción</label>
								<div class="col-sm-9 inputGroupContainer">
							    <div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="descripcion" id="nfi" placeholder="Descripción del implemento" autofocus>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="nfi" class="col-sm-3 control-label">Costo</label>
								<div class="col-sm-9 inputGroupContainer">
							    <div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="number" class="form-control" name="costo" id="nfi" placeholder="Nombre del implemento" autofocus>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="nfi" class="col-sm-3 control-label">Cantidad</label>
								<div class="col-sm-9 inputGroupContainer">
							    <div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="number" class="form-control" name="cantidad" id="nfi" placeholder="Cantidad del implemento" autofocus>
									</div>
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
						<div class="panel-heading">Inventario</div>
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
