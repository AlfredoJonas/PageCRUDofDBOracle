<?php
  require_once 'conexion.php';

  function preprocesar_cosultas($tipo_query = '', $from_page = '', $data_adicional = 0){

    $data = array();
    $consulta = "";

    if(!is_null($data_adicional)){
      parse_str($data_adicional, $data);
      //$data =  $data_adicional;
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
                $consulta = 'SELECT TO_CHAR(c.FECHA,\'DD/MM/YYYY\') AS FECHA, m.NOMBRE AS DOCTOR, \'CITA\' as TIPO FROM CITA c
                            JOIN MEDICO m ON c.CI_MEDICO = m.CI
                            WHERE TO_CHAR(c.FECHA,\'YYYY-MM-DD\') BETWEEN \''.$data["dia1Input"].'\' AND \''.$data["dia2Input"].'\'
                                  AND m.NUM_COLEGIO || \'       -       \' || m.NOMBRE = \''.$data["doctorSeleccion"].'\'
                            UNION
                            SELECT TO_CHAR(ct.FECHA,\'DD/MM/YYYY\') AS FECHA, ms.NOMBRE AS DOCTOR, \'TRATAMIENTO\' as TIPO FROM CITA_TRATAMIENTO ct
                            JOIN MEDICO ms ON ct.CI_MEDICO = ms.CI
                            WHERE TO_CHAR(ct.FECHA,\'YYYY-MM-DD\') BETWEEN \''.$data["dia1Input"].'\' AND \''.$data["dia2Input"].'\'
                                  AND ms.NUM_COLEGIO || \'       -       \' || ms.NOMBRE = \''.$data["doctorSeleccion"].'\'
                            ';
                            /*$myfile = fopen("testfile.txt","w");
              ob_start();
              var_dump($data);
              $stringosa = ob_get_clean();
              fwrite($myfile, $consulta);
              fclose($myfile); */ 
              }
          break;
          case 'HORARIO_DOCTOR_DIA':
              if(isset($data["diaInput"]) && isset($data["doctorSeleccion"])){
                $consulta = 'SELECT TO_CHAR(c.FECHA,\'DD/MM/YYYY\') AS FECHA, m.NOMBRE AS DOCTOR, \'CITA\' as TIPO FROM CITA c
                            JOIN MEDICO m ON c.CI_MEDICO = m.CI
                            WHERE TO_CHAR(c.FECHA,\'YYYY-MM-DD\') = \''.$data["diaInput"].'\'
                                  AND m.NUM_COLEGIO || \'       -       \' || m.NOMBRE = \''.$data["doctorSeleccion"].'\'
                            UNION
                            SELECT TO_CHAR(ct.FECHA,\'DD/MM/YYYY\') AS FECHA, ms.NOMBRE AS DOCTOR, \'TRATAMIENTO\' as TIPO FROM CITA_TRATAMIENTO ct
                            JOIN MEDICO ms ON ct.CI_MEDICO = ms.CI
                            WHERE TO_CHAR(ct.FECHA,\'YYYY-MM-DD\') = \''.$data["diaInput"].'\'
                                  AND ms.NUM_COLEGIO || \'       -       \' || ms.NOMBRE = \''.$data["doctorSeleccion"].'\'
                                  ';
              }
              break;
          case 'HORARIO_GLOBAL_DIA':
              if(isset($data["diaInput"])){
                //echo "Hola";
                $consulta = 'SELECT TO_CHAR(c.FECHA,\'DD/MM/YYYY\') AS FECHA, m.NOMBRE AS DOCTOR, \'CITA\' as TIPO FROM CITA c
                            JOIN MEDICO m ON c.CI_MEDICO = m.CI
                            WHERE TO_CHAR(c.FECHA,\'YYYY-MM-DD\') = \''.$data["diaInput"].'\'
                            UNION
                            SELECT TO_CHAR(ct.FECHA,\'DD/MM/YYYY\') AS FECHA, ms.NOMBRE AS DOCTOR, \'TRATAMIENTO\' as TIPO FROM CITA_TRATAMIENTO ct
                            JOIN MEDICO ms ON ct.CI_MEDICO = ms.CI
                            WHERE TO_CHAR(ct.FECHA,\'YYYY-MM-DD\') = \''.$data["diaInput"].'\'';
              }
              /*$myfile = fopen("testfile.txt","w");
              ob_start();
              var_dump($data);
              $stringosa = ob_get_clean();
              fwrite($myfile, $consulta);
              fclose($myfile);*/
              break;
          case 'HORARIO_GLOBAL_RANGO':
              if(isset($data["dia1Input"]) && isset($data["dia2Input"])){
                $consulta = 'SELECT TO_CHAR(c.FECHA,\'DD/MM/YYYY\') AS FECHA, m.NOMBRE AS DOCTOR, \'CITA\' as TIPO FROM CITA c
                            JOIN MEDICO m ON c.CI_MEDICO = m.CI
                            WHERE TO_CHAR(c.FECHA,\'YYYY-MM-DD\') BETWEEN \''.$data["dia1Input"].'\' AND \''.$data["dia2Input"].'\'
                            UNION
                            SELECT TO_CHAR(ct.FECHA,\'DD/MM/YYYY\') AS FECHA, ms.NOMBRE AS DOCTOR, \'TRATAMIENTO\' as TIPO FROM CITA_TRATAMIENTO ct
                            JOIN MEDICO ms ON ct.CI_MEDICO = ms.CI
                            WHERE TO_CHAR(ct.FECHA,\'YYYY-MM-DD\') BETWEEN \''.$data["dia1Input"].'\' AND \''.$data["dia2Input"].'\'';
              }
              break;
        }
        break;
    }

    return $consulta;
  }
?>
