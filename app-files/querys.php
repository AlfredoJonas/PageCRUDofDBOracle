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

    if(strcmp($tipo_query, 'solicitudListaEspecializaciones') == 0 && strcmp($from_page, 'empleados') == 0){
      $consulta = $GLOBALS["solicitudListaEspecializaciones"];
      $ejecutar_consulta = 1;
    }
    else{
      if(strcmp($tipo_query, 'solicitudListaEmpleados') == 0 && strcmp($from_page, 'empleados') == 0){
        $consulta = $GLOBALS["solicitudListaEmpleados"];
        $ejecutar_consulta = 1;
      }
      else{
        if(strcmp($tipo_query, 'solicitudListaPacientes') == 0 && strcmp($from_page, 'pacientes') == 0){
          $consulta = $GLOBALS["solicitudListaPacientes"];
          $ejecutar_consulta = 1;
        }
        else{
          if(strcmp($tipo_query, 'solicitudListaInventario') == 0 && strcmp($from_page, 'inventario') == 0){
            $consulta = $GLOBALS["solicitudListaInventario"];
            $ejecutar_consulta = 1;
          }
          else{
            if(strcmp($tipo_query, 'solicitudHorarioDoctorDia') == 0 && strcmp($from_page, 'horarios') == 0){
              if($data_es_arreglo != 0){
                if(isset($data["fecha"])){
                  $consulta = "SELECT TO_CHAR(nombre_variable,'hh24:mi')
                               FROM nombre_tabla
                               WHERE TO_CHAR(FECHA,'DD/MM/YYYY') = ".$data["fecha"]."
                               ORDER BY FECHA;";
                  $ejecutar_consulta = 1;
                }
              }
            }
            else{
              if(strcmp($tipo_query, 'solicitudHorarioDoctorRangoDeFechas') == 0 && strcmp($from_page, 'horarios') == 0){
                if($data_es_arreglo != 0)
                  if(isset($data["fechaInicio"]) && isset($data["fechaFin"])){
                    $consulta = "SELECT TO_CHAR(nombre_variable,'hh24:mi')
                                 FROM nombre_tabla
                                 WHERE FECHA BETWEEN TO_DATE(".$data["fechaInicio"].") AND TO_DATE(".$data["fechaFin"].")
                                 ORDER BY FECHA;";
                    $ejecutar_consulta = 1;
                  }
              }
            }

          }
        }
      }
    }


    if($ejecutar_consulta != 0){
      $response = exec_query($consulta);
      return json_convert($response);
    }

    return $error_message;
  }
?>
