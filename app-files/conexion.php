<?php

  //Datos a modificar dependiendo de la configuracion del sqldeveloper
  $DB = '//localhost/XE';
  $DB_USER = 'PROYECTODB20161';
  $DB_PASS = '123';
  $DB_CHAR = 'AL32UTF8';

  $conexion = null;

  function get_conexion() {

    if(!$GLOBALS['conexion']) {
      $GLOBALS['conexion'] = oci_pconnect($GLOBALS['DB_USER'], $GLOBALS['DB_PASS'], $GLOBALS['DB'], $GLOBALS['DB_CHAR']);

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
