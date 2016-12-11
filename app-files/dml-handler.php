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
?>