<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
	</head>
	<body>
		<?php include('header.php'); ?>
			<div class="container">
				<div class="row">
					<div class="col-xs-5">
						<form class="form-add-implemento" action="" method="GET">
							<div class="form-group row">
								<label for="nfi" class="col-xs-2 col-form-label">Nombre</label>
								<div class="col-xs-10">
									<input type="text" class="form-control" name="nombre" id="nfi" placeholder="Ingrese el nombre del implemento" requi>
								</div>
							</div>

							<div class="form-group row">
								<label for="mfi" class="col-xs-2 col-form-label">Marca</label>
								<div class="col-xs-10">
									<input type="text" class="form-control" name="marca" id="mfi" placeholder="Ingrese la marca del implemento">
								</div>
							</div>

							<div class="form-group row">
								<label for="dfi" class="col-xs-2 col-form-label">Descripcion</label>
								<div class="col-xs-10">
									<input type="text" class="form-control" name="descripcion" id="dfi" placeholder="Ingrese la descripción del implemento">
								</div>
							</div>

							<div class="form-group row">
								<label for="cosfi" class="col-xs-2 col-form-label">Costo</label>
								<div class="col-xs-10">
									<input type="number" class="form-control" name="costo" id="cosfi" placeholder="Ingrese el costo del implemento">
								</div>
							</div>

							<div class="form-group row">
								<label for="canfi" class="col-xs-2 col-form-label">Cantidad</label>
								<div class="col-xs-10">
									<input type="number" class="form-control" name="cantidad" id="canfi" placeholder="Ingrese la cantidad del implemento">
								</div>
							</div>

							<div class="form-group">
								<input type="submit" class="form-control" name="guardar" value="Guardar">
							</div>

							<div class="form-group">
								<input type="submit" class="form-control"name="actualizar" value="Actualizar">
							</div>
						</form>
					</div>
				</div>
			</div>	
		<?php include('footer.php'); ?>
	</body>
</html>