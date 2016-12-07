<?php
  function preprocesar_cosultas($tipo_query, $from_page, $data_adicional){
    $response = array();
    $consulta = '';
    $ejecutar_consulta = 0;
    if(strcmp($tipo_query, 'solicitudListaEspecializaciones') == 0 && strcmp($from_page, 'empleados') == 0){


    }else{
      if(strcmp($tipo_query, 'solicitudListaPacientes') == 0 && strcmp($from_page, 'pacientes') == 0){

      }
    }


    if($ejecutar_consulta != 0){
      $response = exec_query($consulta);
      return json_convert($response);
    }
  }
?>
