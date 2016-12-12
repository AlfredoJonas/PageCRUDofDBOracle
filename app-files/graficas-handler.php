<?php

	require_once 'conexion.php';

	$query = generarConsultaFuncion();

	$statement = exec_query($query);

  $json = array();

  while($data = oci_fetch_array($statement, OCI_ASSOC + OCI_FETCHSTATEMENT_BY_ROW)) {
    if(!$data)
      throw_error(oci_error($statement)['message']);

    $json[] = $data;
  }

  oci_free_statement($statement);

  header('Content-Type: application/json; charset=UTF-8');
  echo json_encode($json);

	function generarConsultaFuncion(){
		$consulta = 0;
		if(isset($_POST["ruta"]){
			switch ($_POST["ruta"]) {
				case 'PORCENTAJE_TRATAMIENTOS':
					if(isset($_POST["mes"]) && isset($_POST["ano"])){
						$consulta = GRAFICO_BARRAS_SQL;
					}
					break;

				case 'GANANCIA_POR_MES':
					if(isset($_POST["mes"]) && isset($_POST["ano"])){
						$consulta = oci_parse($conn, 'begin :r := myfunc(:mes,:anho); end;');
						oci_bind_by_name($stid, ':mes', $_POST["mes"]);
						oci_bind_by_name($stid, ':anho', $_POST["ano"], 40);
					}
					break;

				case 3:
					'GRAFICA_X'
					break;

				case 4:
					'ganancias año'
					break;
			}
		return $consulta;
	}

?>
