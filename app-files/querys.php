<?php
  function preprocesar_cosultas($tipo_query, $from_page, $data_adicional){
    $response = array();
    $consulta = '';
    $ejecutar_consulta = 0;
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
        }
      }
    }


    if($ejecutar_consulta != 0){
      $response = exec_query($consulta);
      return json_convert($response);
    }
  }
?>
