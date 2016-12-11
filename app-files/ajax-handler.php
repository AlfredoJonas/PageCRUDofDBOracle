<?php
  require 'querys.php';

  if(!isset($_POST['data_extra']))
    $consulta = preprocesar_cosultas($_POST['consulta'], $_POST['ruta']);
  else
    $consulta = preprocesar_cosultas($_POST['consulta'], $_POST['ruta'], $_POST['data_extra']);

  $statement = exec_query($consulta);

  /*$myfile = fopen("testfile.txt","w");
              ob_start();
              var_dump($data);
              $stringosa = ob_get_clean();
              fwrite($myfile, $statement);
              fclose($myfile);*/

  $json = array();

  while($data = oci_fetch_array($statement, OCI_ASSOC + OCI_FETCHSTATEMENT_BY_ROW)) {
    if(!$data)
      throw_error(oci_error($statement)['message']); 

    $json[] = $data;
  }

  oci_free_statement($statement);

  header('Content-Type: application/json; charset=UTF-8');
  echo json_encode($json);
?>
