<?php
  require 'constants.php';

  function get_conexion() {

    if(!ISSET($GLOBALS['conexion'])) {
      $GLOBALS['conexion'] = oci_pconnect(DB_USER, DB_PASS, DB, DB_CHAR);

      if($GLOBALS['conexion'] == null)
        throw_error("Error en la conexión con la BD");
    }

    return $GLOBALS['conexion'];
  }


  function exec_query($query) {

    $statement = oci_parse(get_conexion(), $query);
    oci_execute($statement);

    return $statement;
  }

  function throw_error($mensaje, $code = 0) {
    header('HTTP/1.1 500 Pailas chamo');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => $mensaje, 'code' => $code)));
  }

 ?>
