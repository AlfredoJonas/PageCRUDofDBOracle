<?php
  require_once 'conexion.php';

  function preprocesar_cosultas($tipo_query = '', $from_page = '', $data_adicional = 0){

    $data = array();

    if(!is_null($data_adicional)){
      /*parse_str($data_adicional, $data);*/
      $data =  $data_adicional;
    }
    
    switch ($from_page) {

      case 'RUTA_EMPLEADOS':
        switch ($tipo_query) {
          case 'LISTA_EMPLEADOS':
            $consulta = LISTA_EMPLEADOS_SQL;
            break;
          case 'LISTA_ESPECIALIZACIONES':
            $consulta = LISTA_ESPECIALIZACIONES_SQL;
            break;
        }
        break;

      case 'RUTA_CITAS':
        switch ($tipo_query) {
          case 'LISTA_NOMBRES_DOCTORES':
            $consulta = LISTA_NOMBRES_DOCTORES_SQL;
            break;
          case 'LISTA_NOMBRES_PACIENTES':
            $consulta = LISTA_NOMBRES_PACIENTES_SQL;
            break;
          case 'LISTA_ATRIBUTOS_CITA':
            if(isset($data["id_cita"])){
              $consulta = LISTA_ATRIBUTOS_CITA_SQL.$data["id_cita"];
                  $myfile = fopen("testfile.txt", "w");
                  fwrite($myfile, "consulta !->".$consulta."\n");
                  fclose($myfile);
              }
            break;
        }
        break;

      case 'RUTA_INVENTARIO':
        switch ($tipo_query) {
          case 'LISTA_INVENTARIO':
            $consulta = LISTA_INVENTARIO_SQL;
            break;
        }
        break;

      case 'RUTA_CONSULTAS':
        switch ($tipo_query) {
          case CONSULTAS['Tratamientos realizados']:
            $consulta = str_replace('&IDIMPLEMENTO', $data['id'], EL_DERROCHADOR_SQL);
            break;
          case CONSULTAS['Horarios disponibles']:
            $consulta = str_replace('&IDIMPLEMENTO', $data['id'], EL_DERROCHADOR_SQL);
            break;
          case CONSULTAS['Citas disponibles']:
            $consulta = str_replace('&IDIMPLEMENTO', $data['id'], EL_DERROCHADOR_SQL);
            break;
          case CONSULTAS['Ganancias generales']:
            $consulta = str_replace('&IDIMPLEMENTO', $data['id'], EL_DERROCHADOR_SQL);
            break;
          case CONSULTAS['Ganancias por mes']:
            $consulta = str_replace('&IDIMPLEMENTO', $data['id'], EL_DERROCHADOR_SQL);
            break;
          //Las que estan ready
          case CONSULTAS['El doctor derrochador']:
            $consulta = str_replace('&IDIMPLEMENTO', $data['id'], EL_DERROCHADOR_SQL);
            break;
          case CONSULTAS['Morosos']:
            $consulta = MOROSOS_SQL;
            break;
          case CONSULTAS['Historial de citas']:
            $consulta = str_replace('&CIPACIENTE', $data['ci'], HISTORIAL_CITAS_SQL);
            break;
          case CONSULTAS['Historial de tratamientos']:
            $consulta = str_replace('&CIPACIENTE', $data['ci'], HISTORIAL_TRATAMIENTOS_SQL);
            break;
        }
        break;

      case 'RUTA_HORARIOS':
        switch ($tipo_query) {
          case 'HORARIO_DOCTOR_FECHA':
              if(isset($data["fechaInicio"]) && isset($data["fechaFin"])) {
                $consulta = "SELECT TO_CHAR(nombre_variable,'hh24:mi')
                             FROM nombre_tabla
                             WHERE FECHA BETWEEN TO_DATE(".$data["fechaInicio"].") AND TO_DATE(".$data["fechaFin"].")
                             ORDER BY FECHA;";
              }
          break;
          case 'HORARIO_DOCTOR_DIA':
              if(isset($data["fecha"])){
                $consulta = "SELECT TO_CHAR(nombre_variable,'hh24:mi')
                             FROM nombre_tabla
                             WHERE TO_CHAR(FECHA,'DD/MM/YYYY') = ".$data["fecha"]."
                             ORDER BY FECHA;";
              }
              break;
        }
        break;
    }

    return $consulta;
  }
?>
