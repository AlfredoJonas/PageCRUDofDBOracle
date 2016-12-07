<?php
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
      case 'empleados':
        switch ($tipo_query) {
          case 'solicitudListaEmpleados':
            $consulta = $GLOBALS["solicitudListaEmpleados"];
            $ejecutar_consulta = 1;
          break;
          case 'solicitudListaEspecializaciones':
            $consulta = $GLOBALS["solicitudListaEmpleados"];
            $ejecutar_consulta = 1;
          break;
        }
      break;

      case 'pacientes':
        switch ($tipo_query) {
          case 'solicitudListaPacientes':
            $consulta = $GLOBALS["solicitudListaPacientes"];
            $ejecutar_consulta = 1;
          break;
        }
      break;

      case 'inventario':
        switch ($tipo_query) {
          case 'solicitudListaInventario':
            $consulta = $GLOBALS["solicitudListaInventario"];
            $ejecutar_consulta = 1;
          break;
        }
      break;

      case 'horarios':
        switch ($tipo_query) {
          case 'solicitudHorarioDoctorRangoDeFechas':
            if($data_es_arreglo != 0)
              if(isset($data["fechaInicio"]) && isset($data["fechaFin"])) {
                $consulta = "SELECT TO_CHAR(nombre_variable,'hh24:mi')
                             FROM nombre_tabla
                             WHERE FECHA BETWEEN TO_DATE(".$data["fechaInicio"].") AND TO_DATE(".$data["fechaFin"].")
                             ORDER BY FECHA;";
                $ejecutar_consulta = 1;
              }
          break;

          case 'solicitudHorarioDoctorDia':
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
      return json_convert($response);
    }

    return $error_message;
  }
?>
