<?php
  require 'querys.php';

  if(!ISSET($_POST['data_extra']))
    $consulta = preprocesar_cosultas($_POST['consulta'], $_POST['ruta']);
  else
    $consulta = preprocesar_cosultas($_POST['consulta'], $_POST['ruta'], $_POST['data_extra']);

  $statement = exec_query($consulta);

  $json = array();

  while($data = oci_fetch_array($statement, OCI_ASSOC + OCI_FETCHSTATEMENT_BY_ROW)) {
    $json[] = $data;
  }

  oci_free_statement($statement);

  header('Content-Type: application/json; charset=UTF-8');
  echo json_encode($json);
?>
