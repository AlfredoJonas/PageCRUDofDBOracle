<?php

  include 'constants.php';
  include 'conexion.php';

  function preprocesar_cosultas($tipo_query, $from_page, $data_adicional){

    $response = array();
    $consulta = '';
    $ejecutar_consulta = 0;
    $error_message = '';
    $data_es_arreglo = 0;
    $data = array();

    if(!is_null($data_adicional)){
      if(!is_array($data_adicional)){
        $data_es_arreglo = 1;
        $data = $data_adicional;
      }
    }


    switch ($from_page) {
      case RUTA_EMPLEADOS:
        switch ($tipo_query) {
          case LISTA_EMPLEADOS:
            $consulta = LISTA_EMPLEADOS_SQL;
            $ejecutar_consulta = 1;
          break;
          case LISTA_ESPECIALIZACIONES:
            $consulta = LISTA_ESPECIALIZACIONES_SQL;
            $ejecutar_consulta = 1;
          break;
        }
      break;

      case RUTA_PACIENTES:
        switch ($tipo_query) {
          case LISTA_PACIENTES:
            $consulta = LISTA_PACIENTES_SQL;
            $ejecutar_consulta = 1;
          break;
        }
      break;

      case RUTA_INVENTARIO:
        switch ($tipo_query) {
          case LISTA_INVENTARIO:
            $consulta = LISTA_INVENTARIO_SQL;
            $ejecutar_consulta = 1;
          break;
        }
      break;

      case RUTA_HORARIOS:
        switch ($tipo_query) {
          case HORARIO_DOCTOR_FECHA:
            if($data_es_arreglo != 0)
              if(isset($data["fechaInicio"]) && isset($data["fechaFin"])) {
                $consulta = "SELECT TO_CHAR(nombre_variable,'hh24:mi')
                             FROM nombre_tabla
                             WHERE FECHA BETWEEN TO_DATE(".$data["fechaInicio"].") AND TO_DATE(".$data["fechaFin"].")
                             ORDER BY FECHA;";
                $ejecutar_consulta = 1;
              }
          break;

          case HORARIO_DOCTOR_DIA:
            if($data_es_arreglo != 0)
              if(isset($data["fecha"])){
                $consulta = "SELECT TO_CHAR(nombre_variable,'hh24:mi')
                             FROM nombre_tabla
                             WHERE TO_CHAR(FECHA,'DD/MM/YYYY') = ".$data["fecha"]."
                             ORDER BY FECHA;";
                $ejecutar_consulta = 1;
              }
          break;
        }
      break;
    }

    if($ejecutar_consulta != 0){
      $response = exec_query($consulta);
      return json_encode($response);
    }

    return $error_message;
  }
?>
