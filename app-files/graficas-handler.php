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

	function generarConsultaFuncion() {
		$consulta = 0;

		$data = array();
		parse_str($_POST["data_extra"],$data);

		switch ($_POST["consulta"]) {
			case 'TRATAMIENTOS_MES':
				$consulta = GRAFICO_BARRAS_SQL;
				break;

			case 'GANANCIA_POR_MES':
				$consulta = oci_parse(get_conexion(), 'begin :r := GANANCIA(:mes,:anho); end;');
				oci_bind_by_name($consulta, ':mes', $_POST["mes"]);
				oci_bind_by_name($consulta, ':anho', $_POST["ano"]);
				oci_bind_by_name($consulta, ':r', $_SESSION["resp"], 40);
				break;

			case 'GRAFICA_X':
				$consulta = oci_parse(get_conexion(), 'begin :r := GRAFICOANIO(:anho); end;');
				oci_bind_by_name($consulta, ':anho', $_POST["ano"]);
				oci_bind_by_name($consulta, ':r', $_SESSION["resp"], 40);
				break;
		}

		return $consulta;
	}

?>
