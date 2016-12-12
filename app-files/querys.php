<?php
  require_once 'conexion.php';

  function preprocesar_cosultas($tipo_query = '', $from_page = '', $data_adicional = 0){

    $data = array();
    $consulta = "";

    if(!is_null($data_adicional)){
      parse_str($data_adicional, $data);
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
          case 'EMPLEADO_ESPECIFICO':
            $consulta = str_replace(':id', $data['id'], EMPLEADO_ESPECIFICO_SQL);
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
              }
            break;
          case 'LISTA_CITAS':
            $consulta = LISTA_CITAS_SQL;
            break;
          case 'CITA_ESPECIFICA':
            $consulta = str_replace(':id', $data['id'], CITA_ESPECIFICA_SQL);
            break;
        }
        break;

      case 'RUTA_INVENTARIO':
        switch ($tipo_query) {
          case 'LISTA_INVENTARIO':
            $consulta = LISTA_INVENTARIO_SQL;
            break;
          case 'IMPLEMENTO_ESPECIFICO':
            $consulta = str_replace(':id', $data['id'], IMPLEMENTO_ESPECIFICO_SQL);
            break;
        }
        break;

      case 'RUTA_PACIENTES':
        switch ($tipo_query) {
          case 'LISTA_PACIENTES':
            $consulta = LISTA_PACIENTES_SQL;
            break;
          case 'PACIENTE_ESPECIFICO':
            $consulta = str_replace(':id', $data['id'], PACIENTE_ESPECIFICO_SQL);
            break;
        }
        break;

      case 'RUTA_CONSULTAS':
        switch ($tipo_query) {

          //Estos necesitan funciones
          case CONSULTAS['Tratamientos realizados']:
            die($data['fecha']);
            $consulta = str_replace('&FECHA', $data['fecha'], EL_DERROCHADOR_SQL);
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
          case 'HORARIO_DOCTOR_RANGO':
              if(isset($data["dia1Input"]) && isset($data["dia2Input"]) && isset($data["doctorSeleccion"])) {
                $consulta = str_replace(':fecha_input1', $data['dia1Input'], HORARIO_DOCTOR_RANGO_SQL);
                $consulta = str_replace(':fecha_input2', $data['dia2Input'], $consulta);
                $consulta = str_replace(':doctor_cadena', $data['doctorSeleccion'], $consulta);
              }
          break;
          case 'HORARIO_DOCTOR_DIA':
              if(isset($data["diaInput"]) && isset($data["doctorSeleccion"])){
                $consulta = str_replace(':fecha_input', $data['diaInput'], HORARIO_DOCTOR_DIA_SQL);
                $consulta = str_replace(':doctor_cadena', $data['doctorSeleccion'], $consulta);
              }
              break;
          case 'HORARIO_GLOBAL_DIA':
              if(isset($data["diaInput"])){
                $consulta = str_replace(':fecha_input', $data['diaInput'], HORARIO_GLOBAL_DIA_SQL);
              }
              break;
          case 'HORARIO_GLOBAL_RANGO':
              if(isset($data["dia1Input"]) && isset($data["dia2Input"])){
                $consulta = str_replace(':fecha_input1', $data['dia1Input'], HORARIO_GLOBAL_RANGO_SQL);
                $consulta = str_replace(':fecha_input2', $data['dia2Input'], $consulta);
                }
              break;
        }
        break;
    }

    return $consulta;
  }
?>
