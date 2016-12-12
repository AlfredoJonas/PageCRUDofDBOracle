<?php

	require_once 'conexion.php';

	$statement = generarConsultaFuncion();
	oci_execute($statement);

  $json = array();

  while($data = oci_fetch_array($statement, OCI_ASSOC + OCI_RETURN_NULLS)) {
    if(!$data)
      throw_error(oci_error($statement)['message']);

    $json[] = $data;
  }

  oci_free_statement($statement);

  header('Content-Type: application/json; charset=UTF-8');
  echo json_encode($json);

	function generarConsultaFuncion() {

		$data = array();
		parse_str($_POST["data_extra"], $data);

		switch ($_POST["consulta"]) {
			case 'IMPLEMENTOS_MAS_USADOS':
				$consulta = oci_parse(get_conexion(), IMPLEMENTOS_MAS_USADOS_SQL);;
				break;

			case 'GANANCIA_POR_MES':
				$consulta = oci_parse(get_conexion(), 'SELECT GANANCIA(:mes, :ano) FROM DUAL');
				oci_bind_by_name($consulta, ':mes', $_POST["mes"]);
				oci_bind_by_name($consulta, ':ano', $_POST["ano"]);
				break;

			case 'GRAFICA_X':
				$consulta = oci_parse(get_conexion(), 'SELECT GRAFICOANIO(:anho) FROM DUAL');
				oci_bind_by_name($consulta, ':anho', $_POST["ano"]);
				break;
		}

		return $consulta;
	}

?>
