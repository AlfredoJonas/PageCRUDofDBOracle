<?php
  //Credenciales
  define("DB", "//localhost/XE");
  define("DB_USER", "PROYECTODB20161");
  define("DB_PASS", "123");
  define("DB_CHAR", "AL32UTF8");

  //SQL
  define("LISTA_EMPLEADOS_SQL",
  "select * from empleado",
  true);

  define("LISTA_ESPECIALIZACIONES_SQL",
  "select * from especializacion",
  true);

  define("LISTA_INVENTARIO_SQL",
  "select * from implemento",
  true);

  define("HISTORIAL_CITAS_SQL",
  'select NOMBRE, FECHA, MOTIVO FROM CITA JOIN PACIENTE ON(CI=CITA.CI_PACIENTE)
  WHERE CI_PACIENTE="&CIPACIENTE" ORDER BY FECHA',
  true);

  define("HISTORIAL_TRATAMIENTOS_SQL",
  'select NOMBRE, CT.FECHA, CASE WHEN ABONADO<CT.COSTO THEN "INSOLVENTE" ELSE "SOLVENTE" END
  FROM CITA_TRATAMIENTO CT JOIN CITA C ON(ID=CITA_ID) JOIN PACIENTE P ON(P.CI=C.CI_PACIENTE)
  WHERE C.CI_PACIENTE=&CIPACIENTE ORDER BY CT.FECHA',
  true);

  define("MOROSOS_SQL",
  'select NOMBRE, CT.FECHA FECHA, CASE WHEN SYSDATE-CT.FECHA>=30 THEN "PLAZO TERMINADO" ELSE "QUEDAN"||TO_CHAR(SYSDATE-CT.FECHA,"99")||"DIA(S)" END PLAZO
  FROM CITA_TRATAMIENTO CT JOIN CITA C ON(CT.ID=C.CITA_ID)
  JOIN PACIENTE P ON(P.CI=C.CI_PACIENTE) WHERE ABONADO<CT.COSTO',
  true);

  define("EL_DERROCHADOR_SQL",
  'select M.NOMBRE Medico, SUM(TI.CANTIDAD) Cantidad FROM CITA_TRATAMIENTO CT JOIN
  TRATAMIENTO_IMPLEMENTO TI ON(CT.CITA_ID=TI.CITA_ID AND CT.TRATAMIENTO_ID=TI.TRATAMIENTO_ID)
  JOIN MEDICO M ON(M.CI=CT.CI_MEDICO)
  JOIN IMPLEMENTO I ON(I.ID=TI.IMPLEMENTO_ID)
  GROUP BY I.ID, M.NOMBRE HAVING (I.ID=&IDIMPLEMENTO) ORDER BY 2',
  true);

  //Las super consultas
  const CONSULTAS = array(
    "Tratamientos realizados" => "t-realizados",
    "Horarios disponibles" => "h-disponibles",
    "Citas disponibles" => "c-disponibles",
    "Ganancias generales" => "g-generales",
    "Ganancias por mes" => "g-por-mes",
    "El doctor derrochador" => "d-derrochador",
    "Morosos" => "morosos",
    "Historial de citas" => "c-historial",
    "Historial de tratamientos" => "t-historial"
  );

 ?>
