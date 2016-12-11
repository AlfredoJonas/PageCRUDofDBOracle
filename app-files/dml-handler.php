<?php
	if(isset($_POST["ruta"]) && isset($_POST["operacion"]) && isset($_POST["data_extra"])){
		$data = array();
    	
    	parse_str($_POST["data_extra"],$data);

    	switch(strtolower($_POST["ruta"])) {
    		case 'RUTA_EMPLEADOS':
    			switch(strtolower($_POST["operacion"])) {
    				case 'insert':break;
    				case 'update':break;
    				case 'delete':break;
    			}
    		break;
    		case 'RUTA_CITAS':
    			switch(strtolower($_POST["operacion"])) {
    				case 'insert':break;
    				case 'update':break;
    				case 'delete':break;
    			}
    		break;
    		case 'RUTA_INVENTARIO':
    			switch(strtolower($_POST["operacion"])) {
    				case 'insert':break;
    				case 'update':break;
    				case 'delete':break;
    			}
    		break;
    		case 'RUTA_PACIENTE':
    			switch(strtolower($_POST["operacion"])) {
    				case 'insert':break;
    				case 'update':break;
    				case 'delete':break;
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
    }


    function onUpdatingDevolverParametros($parameters,$values){
    		$output = '';
    		for($parameters as $name_attribute){
    			if(array_key_exists(strtolower($name_attribute), $values)){
    				if($output =='')
    					$output = $output.' '.$name_attribute.' = '.$values[$name_attribute];
    				else
    					$output = $output.', '.$name_attribute.' = '.$values[$name_attribute];
    			}
    		}

    		return $output;
    	}

    	function onInsertingDevolverParametros($parametros,$values){
    		$output = array();
    		$parametros_presentes = '(';
    		$valores_presentes = '(';

    		for($parameters as $name_attribute){
    			if(array_key_exists(strtolower($name_attribute), $values)){
    				if(strcmp($parametros_presentes,'(') == 0)
    					$parametros_presentes = $parametros_presentes.' '.$name_attribute;
    				else
    					$parametros_presentes = $parametros_presentes.', '.$name_attribute;

    				if(strcmp($valores_presentes,'(') == 0)
    					$valores_presentes = $valores_presentes.' '.$values[$name_attribute];
    				else
    					$valores_presentes = $valores_presentes.', '.$values[$name_attribute];
    			}
    		}

    		$output = array('params' => $parametros_presentes.')', 'values' => $valores_presentes.')');

    		return $output;
    	}
?>