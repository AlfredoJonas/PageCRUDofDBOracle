<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('head.php'); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.formGraficas').submit(function(event) {
					submitGraficas(event);
				});
			});
		</script>
	</head>
	<body>
		<?php include('header.php'); ?>
      <div class="container-fluid">
        <div class="container col-sm-6">
          <div id="form-messages" class="alert alert-dismissable fade in hidden">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          </div>

          <form class="formGraficas well form-horizontal" action="graficas-handler.php" role="form">

            <fieldset class="fields">
              <legend>Graficas</legend>
              <div class="form-group">
                <div class="col-sm-12 col-sm-offset-2 inputGroupContainer">
                  <div class="radio-inline">
                    <label>
                      <input type="radio" name="graficas" id="graficas" value="IMPLEMENTOS_MAS_USADOS" onclick="insertHTML('graficas', 1)">Implementos mas usados
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                      <input type="radio" name="graficas" id="graficas" value="GANANCIA_POR_MES" onclick="insertHTML('graficas', 2)">Ganancia por mes
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                      <input type="radio" name="graficas" id="graficas" value="GRAFICA_X" onclick="insertHTML('graficas', 3)">Otra grafica x
                    </label>
                  </div>
                </div>
              </div>

  						<div class="form-group campo-grafica campo-grafica-2 hidden">
  							<label for="ocupacion" class="col-sm-3 control-label">Mes</label>
  							<div class="col-sm-9 inputGroupContainer">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  									<input type="text" class="form-control" name="mes" id="mes" placeholder="Ingrese el mes a evaluar">
  								</div>
  							</div>
  						</div>

  						<div class="form-group campo-grafica campo-grafica-3 campo-grafica-2 hidden">
  							<label for="ocupacion" class="col-sm-3 control-label">Año</label>
  							<div class="col-sm-9 inputGroupContainer">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  									<input type="text" class="form-control" name="ano" id="año" placeholder="Ingrese el año a evaluar">
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

        <div class="container container col-sm-6">
          <canvas class="charts" id="chart" width="400" height="400">
          </canvas>
        </div>
      </div>
		<?php include('footer.php'); ?>
	</body>
</html>
