<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
	</head>
	<body>
		<?php include('header.php'); ?>
			<div class="container">

				<div class="container col-sm-5">
					<div id="form-messages" class="alert .alert-dismissible fade in hidden">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					</div>

					<form class="formImplemento well form-horizontal" action="ajax-handler.php" role="form">

						<legend>Inventario</legend>

						<fieldset>
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
								<label for="nfi" class="col-sm-3 control-label">Nombre</label>
								<div class="col-sm-9 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="nombre" id="nfi" placeholder="Nombre del implemento" autofocus>
									</div>
								</div>
							</div>

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
								<label for="nfi" class="col-sm-3 control-label">Nombre</label>
								<div class="col-sm-9 inputGroupContainer">
							    <div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="nombre" id="nfi" placeholder="Nombre del implemento" autofocus>
									</div>
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
