<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="dml-handler.php">
		<input type="text" name="ruta" placeholder="ruta">
		<input type="text" name="operacion" placeholder="operacion">
		<input type="text" name="data_extra" placeholder="data_extra">
		<input type="submit" name="s" value="Enviar">
	</form> -->

<?php
	//require_once 'constants.php';
	require_once 'conexion.php';

	$sentencia_dml = 0;

	if(isset($_POST["ruta"]) && isset($_POST["operacion"]) && isset($_POST["data_extra"])){

		$data = array();

    	parse_str($_POST["data_extra"],$data);

    	comprobarData($data);

    	switch(strtoupper($_POST["ruta"])) {
    		case 'RUTA_EMPLEADOS':
    			//echo 'recibido';
    			switch(strtolower($_POST["operacion"])) {
    				case 'insert':
    					$array_suplantable = onInsertingDevolverParametros(array('CI','NOMBRE','FECHA_NAC','DIRECCION','TELEFONO','SUELDO'),$data);

    					$sentencia_dml = str_replace(':campos', $array_suplantable['params'], DML_SENTENCES['EMPLEADO']['insert']);
    					$sentencia_dml = str_replace(':valores', $array_suplantable['values'], $sentencia_dml);
    				break;
    				case 'update':
    					if(isset($data["ci"])){
    						$clave_valor = onUpdatingDevolverParametros(array('CI','NOMBRE','FECHA_NAC','DIRECCION','TELEFONO','SUELDO'),$data);

    						$sentencia_dml = str_replace(':columna_valores', $clave_valor, DML_SENTENCES['EMPLEADO']['update']);
	    					$sentencia_dml = str_replace(':ci', $data["ci"], $sentencia_dml);
    					}
    				break;
    				case 'delete':
                        if(isset($data["ci"]))
                            $sentencia_dml = str_replace(':ci', $data["ci"], DML_SENTENCES['EMPLEADO']['delete']);
                    break;
    			}
    		break;

    		case 'RUTA_DOCTORES':
    			switch(strtolower($_POST["operacion"])) {
    				case 'insert':
    					$array_suplantable = onInsertingDevolverParametros(array('CI','NOMBRE','FECHA_NAC','DIRECCION','TELEFONO','RIF','NUM_COLEGIO'),$data);

    					$sentencia_dml = str_replace(':campos', $array_suplantable['params'], DML_SENTENCES['MEDICO']['insert']);
    					$sentencia_dml = str_replace(':valores', $array_suplantable['values'], $sentencia_dml);
    				break;
    				case 'update':
    					if(isset($data["ci"]) || isset($data["num_colegio"]) ){
    						$clave_valor = onUpdatingDevolverParametros(array('NOMBRE','FECHA_NAC','DIRECCION','TELEFONO','RIF','NUM_COLEGIO'),$data);

    						$sentencia_dml = str_replace(':columna_valores', $clave_valor, DML_SENTENCES['MEDICO']['update']);
	    					$sentencia_dml = str_replace(':ci', (isset($data["ci"]))?$data["ci"]:'-1', $sentencia_dml);
	    					$sentencia_dml = str_replace(':num_cole', (isset($data["num_colegio"]))?$data["num_colegio"]:'-1', $sentencia_dml);
    					}
    				break;
    				case 'delete':
                        if(isset($data["ci"]) || isset($data["num_colegio"])){
                           $sentencia_dml = str_replace(':ci', (isset($data["ci"]))?$data["ci"]:'-1', DML_SENTENCES['MEDICO']['delete']);
                            $sentencia_dml = str_replace(':num_cole', (isset($data["num_colegio"]))?$data["num_colegio"]:'-1', $sentencia_dml);
                        }
                    break;
    			}
    		break;

				case 'RUTA_PACIENTES':
    			switch(strtolower($_POST["operacion"])) {
    				case 'insert':
    					$array_suplantable = onInsertingDevolverParametros(array('CI','NOMBRE','FECHA_NAC','DIRECCION','TELEFONO','OCUPACION'),$data);

    					$sentencia_dml = str_replace(':campos', $array_suplantable['params'], DML_SENTENCES['PACIENTE']['insert']);
    					$sentencia_dml = str_replace(':valores', $array_suplantable['values'], $sentencia_dml);
    				break;
    				case 'update':
    					if(isset($data["ci"])){
    						$clave_valor = onUpdatingDevolverParametros(array('NOMBRE','FECHA_NAC','DIRECCION','TELEFONO','OCUPACION'),$data);

    						$sentencia_dml = str_replace(':columna_valores', $clave_valor, DML_SENTENCES['PACIENTE']['update']);
	    					$sentencia_dml = str_replace(':ci', $data["ci"], $sentencia_dml);
    					}
    				break;
    				case 'delete':
              if(isset($data["ci"]))
                  $sentencia_dml = str_replace(':ci', $data["ci"],DML_SENTENCES['PACIENTE']['delete']);
          	break;
    			}
    		break;

    		case 'RUTA_CITAS':
    			switch(strtolower($_POST["operacion"])) {
    				case 'insert':
    					$array_suplantable = onInsertingDevolverParametros(array('ID','URL_IMAGEN_ODONTOGRAMA','FECHA','COSTO','MOTIVO','CI_PACIENTE','CI_MEDICO'), $data);

    					$sentencia_dml = str_replace(':campos', $array_suplantable['params'], DML_SENTENCES['CITA']['insert']);
    					$sentencia_dml = str_replace(':valores', $array_suplantable['values'], $sentencia_dml);

    				break;
    				case 'update':
    					if(isset($data["id"])){
	    					$clave_valor = onUpdatingDevolverParametros(array('ID','URL_IMAGEN_ODONTOGRAMA','FECHA','COSTO','MOTIVO','CI_PACIENTE','CI_MEDICO'), $data);

	    					$sentencia_dml = str_replace(':columna_valores', $clave_valor, DML_SENTENCES['CITA']['update']);
	    					$sentencia_dml = str_replace(':id', $data["id"], $sentencia_dml);
    					}
    				break;
    				case 'delete':
                        if(isset($data["id"]))
                            $sentencia_dml = str_replace(':id', $data["id"], DML_SENTENCES['CITA']['delete']);
                    break;
    			}
    		break;

    		case 'RUTA_INVENTARIO':
    			switch(strtolower($_POST["operacion"])) {
    				case 'insert':
    					$array_suplantable = onInsertingDevolverParametros(array('ID','NOMBRE','MARCA','DESCRIPCION','COSTO','CANTIDAD'), $data);

    					$sentencia_dml = str_replace(':campos', $array_suplantable['params'], DML_SENTENCES['IMPLEMENTO']['insert']);
    					$sentencia_dml = str_replace(':valores', $array_suplantable['values'], $sentencia_dml);

    				break;
    				case 'update':
    					if(isset($data["id"])){
	    					$clave_valor = onUpdatingDevolverParametros(array('ID','NOMBRE','MARCA','DESCRIPCION','COSTO','CANTIDAD'), $data);

	    					$sentencia_dml = str_replace(':columna_valores', $clave_valor, DML_SENTENCES['IMPLEMENTO']['update']);
	    					$sentencia_dml = str_replace(':id', $data["id"], $sentencia_dml);
    					}
    				break;
    				case 'delete':
                        if(isset($data["id"]))
                            $sentencia_dml = str_replace(':id', $data["id"], DML_SENTENCES['IMPLEMENTO']['delete']);
                    break;
    			}
    		break;

                case 'RUTA_CITA_TRATAMIENTO':
                    switch(strtolower($_POST["operacion"])) {
                        case 'insert':
                            $array_suplantable = onInsertingDevolverParametros(array('CITA_ID','TRATAMIENTO_ID','CI_MEDICO','FECHA','COSTO','ABONADO'), $data);

                            $sentencia_dml = str_replace(':campos', $array_suplantable['params'], DML_SENTENCES['CITA_TRATAMIENTO']['insert']);
                            $sentencia_dml = str_replace(':valores', $array_suplantable['values'], $sentencia_dml);
                        break;
                        case 'update':
                            if(isset($data["cita_id"]) && isset($data["tratamiento_id"]) && isset($data["fecha"])){
                                $clave_valor = onUpdatingDevolverParametros(array('CITA_ID','TRATAMIENTO_ID','CI_MEDICO','FECHA','COSTO','ABONADO'), $data);

                                $sentencia_dml = str_replace(':columna_valores', $clave_valor, DML_SENTENCES['CITA_TRATAMIENTO']['update']);
                                $sentencia_dml = str_replace(':ci', $data["cita_id"], $sentencia_dml);
                                $sentencia_dml = str_replace(':ti', $data["tratamiento_id"], $sentencia_dml);
                                $sentencia_dml = str_replace(':fecha', $data["fecha"], $sentencia_dml);
                            }
                        break;
                        case 'delete':
                            if(isset($data["cita_id"]) && isset($data["tratamiento_id"]) && isset($data["fecha"])){
                                 $sentencia_dml = str_replace(':ci', $data["cita_id"], DML_SENTENCES['CITA_TRATAMIENTO']['delete']);
                                $sentencia_dml = str_replace(':ti', $data["tratamiento_id"], $sentencia_dml);
                                $sentencia_dml = str_replace(':fecha', $data["fecha"], $sentencia_dml);
                            }
                        break;
                    }
                break;

    		case 'RUTA_TRATAMIENTO_IMPLEMENTO':
    			switch(strtolower($_POST["operacion"])) {
    				case 'insert':
                        $array_suplantable = onInsertingDevolverParametros(array('TRATAMIENTO_ID','IMPLEMENTO_ID','CITA_ID','CANTIDAD','COSTO'), $data);

                        $sentencia_dml = str_replace(':campos', $array_suplantable['params'], DML_SENTENCES['TRATAMIENTO_IMPLEMENTO']['insert']);
                        $sentencia_dml = str_replace(':valores', $array_suplantable['values'], $sentencia_dml);

                    break;
    				case 'update':
                        if(isset($data["cita_id"]) && isset($data["tratamiento_id"]) && isset($data["implemento_id"])){
                            $clave_valor = onUpdatingDevolverParametros(array('TRATAMIENTO_ID','IMPLEMENTO_ID','CITA_ID','CANTIDAD','COSTO'), $data);

                            $sentencia_dml = str_replace(':columna_valores', $clave_valor, DML_SENTENCES['TRATAMIENTO_IMPLEMENTO']['update']);
                            $sentencia_dml = str_replace(':ci', $data["cita_id"], $sentencia_dml);
                            $sentencia_dml = str_replace(':ti', $data["tratamiento_id"], $sentencia_dml);
                            $sentencia_dml = str_replace(':ii', $data["implemento_id"], $sentencia_dml);
                        }
                    break;
    				case 'delete':
                        if(isset($data["cita_id"]) && isset($data["tratamiento_id"]) && isset($data["implemento_id"])){
                             $sentencia_dml = str_replace(':ci', $data["cita_id"], DML_SENTENCES['TRATAMIENTO_IMPLEMENTO']['delete']);
                            $sentencia_dml = str_replace(':ti', $data["tratamiento_id"], $sentencia_dml);
                            $sentencia_dml = str_replace(':ii', $data["implemento_id"], $sentencia_dml);
                        }
                    break;
    			}
    		break;

            case 'RUTA_CONSULTAS':
                switch(strtolower($_POST["operacion"])) {
                    case 'insert':break;
                    case 'update':break;
                    case 'delete':break;
                }
            break;
    	}

    	//if($sentencia_dml != 0){
    		echo $sentencia_dml;
    		exec_query($sentencia_dml);
    	//}
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

    		$output = array('params' => $parametros_presentes, 'values' => $valores_presentes);

    		return $output;
    	}

    	function comprobarData(&$data){
            $array_varchares_db = array('NOMBRE','MARCA','DESCRIPCION','RIF','DIRECCION','TELEFONO','OCUPACION');

            foreach ($array_varchares_db as $value) {
                if(array_key_exists(strtolower($value), $data)){
                    $data[strtolower($value)] = '\''.$data[strtolower($value)].'\'';
                    //echo $data[strtolower($value)];
                }
            }

    		if(isset($data["fecha_nac"]))
			$data["fecha_nac"] = 'TO_DATE(\''.$data["fecha_nac"].'\', \'YYYY-MM-DD\')';

			if(isset($data["fecha"]))
				$data["fecha"] = 'TO_DATE(\''.$data["fecha"].'\', \'YYYY-MM-DD\')';
    	}
?>

<!-- </body>
</html> -->
