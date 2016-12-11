<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="get" action="dml-handler.php">
		<input type="text" name="ruta" placeholder="ruta">
		<input type="text" name="operacion" placeholder="operacion">
		<input type="text" name="data_extra" placeholder="data_extra">
		<input type="submit" name="s" value="Enviar">
	</form>

	<?php

	if(isset($_GET["ruta"]) && isset($_GET["operacion"]) && isset($_GET["data_extra"])){
		$data = array();
    	
    	parse_str($_GET["data_extra"],$data);

    	switch(strtoupper($_GET["ruta"])) {
    		case 'RUTA_EMPLEADOS':
    			//echo 'recibido';
    			switch(strtolower($_GET["operacion"])) {
    				case 'insert':
    					onInsertingDevolverParametros(array('ID','NOMBRE','FECHA_NAC','DIRECCION','TELEFONO','SUELDO'),$data);
    				break;
    				case 'update':
    					//echo 'recibido';
    					echo onUpdatingDevolverParametros(array('ID','NOMBRE','FECHA_NAC','DIRECCION','TELEFONO','SUELDO'),$data);
    				break;
    				case 'delete':break;
    			}
    		break;
    		case 'RUTA_CITAS':
    			switch(strtolower($_GET["operacion"])) {
    				case 'insert':
    					onInsertingDevolverParametros(array('ID','URL_IMAGEN_ODONTOGRAMA','FECHA','COSTO','MOTIVO','CI_PACIENTE','CI_MEDICO'), $data);
    				break;
    				case 'update':
    					echo onUpdatingDevolverParametros(array('ID','URL_IMAGEN_ODONTOGRAMA','FECHA','COSTO','MOTIVO','CI_PACIENTE','CI_MEDICO'), $data);
    				break;
    				case 'delete':break;
    			}
    		break;
    		case 'RUTA_INVENTARIO':
    			switch(strtolower($_GET["operacion"])) {
    				case 'insert':break;
    				case 'update':break;
    				case 'delete':break;
    			}
    		break;
    		case 'RUTA_PACIENTE':
    			switch(strtolower($_GET["operacion"])) {
    				case 'insert':break;
    				case 'update':break;
    				case 'delete':break;
    			}
    		break;
    		case 'RUTA_CONSULTAS':
    			switch(strtolower($_GET["operacion"])) {
    				case 'insert':break;
    				case 'update':break;
    				case 'delete':break;
    			}
    		break;
    	}
    }


    function onUpdatingDevolverParametros($parameters,$values){
    		$output = '';
    		foreach($parameters as $name_attribute) {
    				if(isset($values[strtolower($name_attribute)])){

	    				if($output == '')
	    					$output = $output.' '.$name_attribute.' = '.$values[strtolower($name_attribute)];
	    				else
	    					$output = $output.', '.$name_attribute.' = '.$values[strtolower($name_attribute)];
    				}
    		}

    		return $output;
    	}

    	function onInsertingDevolverParametros($parameters,$values){
    		$output = array();
    		$parametros_presentes = '(';
    		$valores_presentes = '(';

    		foreach($parameters as $name_attribute) {
    			if(array_key_exists(strtolower($name_attribute), $values)){
    				if(strcmp($parametros_presentes,'(') == 0)
    					$parametros_presentes = $parametros_presentes.''.$name_attribute;
    				else
    					$parametros_presentes = $parametros_presentes.', '.$name_attribute;

    				if(strcmp($valores_presentes,'(') == 0)
    					$valores_presentes = $valores_presentes.''.$values[strtolower($name_attribute)];
    				else
    					$valores_presentes = $valores_presentes.', '.$values[strtolower($name_attribute)];
    			}
    		}
    		$parametros_presentes = $parametros_presentes.')';
    		$valores_presentes = $valores_presentes.')';

    		$output = array('params' => $parametros_presentes, 'values' => $valores_presentes.')');

    		return $output;
    	}
?>
</body>
</html>

