<?php
  require 'querys.php';

  $consulta = preprocesar_cosultas($_POST['consulta'], $_POST['ruta']);

  $statement = exec_query($consulta);

  $json = array();

  while($data = oci_fetch_array($statement, OCI_ASSOC + OCI_FETCHSTATEMENT_BY_ROW)) {
    $json[] = $data;
  }

  oci_free_statement($statement);

  header('Content-Type: application/json; charset=UTF-8');
  echo json_encode($json);
?>
