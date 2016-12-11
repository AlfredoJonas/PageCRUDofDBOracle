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

  define("LISTA_NOMBRES_DOCTORES_SQL",
  'SELECT NUM_COLEGIO || \'       -       \' || NOMBRE AS NOMBRE
  FROM MEDICO
  ORDER BY NUM_COLEGIO',
  true);

  define("LISTA_NOMBRES_PACIENTES_SQL",
  'SELECT CI || \'       -       \' || NOMBRE AS NOMBRE
  FROM PACIENTE
  ORDER BY CI ASC',
  true);

  define("LISTA_ATRIBUTOS_CITA_SQL",
  'SELECT p.CI || \'       -        \' || p.NOMBRE AS PACIENTE,
       m.NUM_COLEGIO || \'       -       \' || m.NOMBRE AS DOCTOR,
       TO_CHAR(c.FECHA,\'DD/MM/YYYY\') AS FECHA,
       c.URL_IMAGEN_ODONTOGRAMA AS ODONTOGRAMA,
       c.COSTO AS PRESUPUESTO
  FROM CITA c
  JOIN MEDICO m ON c.CI_MEDICO = m.CI
  JOIN PACIENTE p ON c.CI_PACIENTE = p.CI
  WHERE c.ID = ',
  true);

  define("HORARIO_GLOBAL_DIA_SQL",
  'SELECT TO_CHAR(c.FECHA,\'DD/MM/YYYY\') AS FECHA,
        m.NOMBRE AS DOCTOR,
        (SELECT NOMBRE FROM PACIENTE WHERE CI=c.CI_PACIENTE) AS PACIENTE,
        \'CITA\' as TIPO FROM CITA c
  JOIN MEDICO m ON c.CI_MEDICO = m.CI
  WHERE TO_CHAR(c.FECHA,\'YYYY-MM-DD\') = \':fecha_input\'
  UNION
  SELECT TO_CHAR(ct.FECHA,\'DD/MM/YYYY\') AS FECHA,
          ms.NOMBRE AS DOCTOR,
          (SELECT p.NOMBRE FROM PACIENTE p WHERE p.CI=(SELECT cit.CI_PACIENTE FROM CITA cit WHERE cit.ID=ct.CITA_ID)) AS PACIENTE,
          \'TRATAMIENTO\' as TIPO FROM CITA_TRATAMIENTO ct
  JOIN MEDICO ms ON ct.CI_MEDICO = ms.CI
  WHERE TO_CHAR(ct.FECHA,\'YYYY-MM-DD\') = \':fecha_input\'',
  true);


  define("HORARIO_GLOBAL_RANGO_SQL",
  'SELECT TO_CHAR(c.FECHA,\'DD/MM/YYYY\') AS FECHA,
          m.NOMBRE AS DOCTOR,
          (SELECT NOMBRE FROM PACIENTE WHERE CI=c.CI_PACIENTE) AS PACIENTE,
          \'CITA\' as TIPO FROM CITA c
  JOIN MEDICO m ON c.CI_MEDICO = m.CI
  WHERE TO_CHAR(c.FECHA,\'YYYY-MM-DD\') BETWEEN \':fecha_input1\' AND \':fecha_input2\'
  UNION
  SELECT TO_CHAR(ct.FECHA,\'DD/MM/YYYY\') AS FECHA,
          ms.NOMBRE AS DOCTOR,
          (SELECT p.NOMBRE FROM PACIENTE p WHERE p.CI=(SELECT cit.CI_PACIENTE FROM CITA cit WHERE cit.ID=ct.CITA_ID)) AS PACIENTE,
          \'TRATAMIENTO\' as TIPO FROM CITA_TRATAMIENTO ct
  JOIN MEDICO ms ON ct.CI_MEDICO = ms.CI
  WHERE TO_CHAR(ct.FECHA,\'YYYY-MM-DD\') BETWEEN \':fecha_input1\' AND \':fecha_input2\'',
  true);


  define("HORARIO_DOCTOR_DIA_SQL",
  'SELECT TO_CHAR(c.FECHA,\'DD/MM/YYYY\') AS FECHA,
        m.NOMBRE AS DOCTOR,
        (SELECT NOMBRE FROM PACIENTE WHERE CI=c.CI_PACIENTE) AS PACIENTE,
        \'CITA\' as TIPO FROM CITA c
  JOIN MEDICO m ON c.CI_MEDICO = m.CI
  WHERE TO_CHAR(c.FECHA,\'YYYY-MM-DD\') = \':fecha_input\'
  AND (m.NUM_COLEGIO || \'       -       \' || m.NOMBRE) = \':doctor_cadena\'
  UNION
  SELECT TO_CHAR(ct.FECHA,\'DD/MM/YYYY\') AS FECHA,
          ms.NOMBRE AS DOCTOR,
          (SELECT p.NOMBRE FROM PACIENTE p WHERE p.CI=(SELECT cit.CI_PACIENTE FROM CITA cit WHERE cit.ID=ct.CITA_ID)) AS PACIENTE,
          \'TRATAMIENTO\' as TIPO FROM CITA_TRATAMIENTO ct
  JOIN MEDICO ms ON ct.CI_MEDICO = ms.CI
  WHERE TO_CHAR(ct.FECHA,\'YYYY-MM-DD\') = :fecha_input
  AND (ms.NUM_COLEGIO || \'       -       \' || ms.NOMBRE) = \':doctor_cadena\'',
  true);


  define("HORARIO_DOCTOR_RANGO_SQL",
  'SELECT TO_CHAR(c.FECHA,\'DD/MM/YYYY\') AS FECHA,
  m.NOMBRE AS DOCTOR,
  (SELECT NOMBRE FROM PACIENTE WHERE CI=c.CI_PACIENTE) AS PACIENTE,
  \'CITA\' as TIPO FROM CITA c
  JOIN MEDICO m ON c.CI_MEDICO = m.CI
  WHERE TO_CHAR(c.FECHA,\'YYYY-MM-DD\') BETWEEN \':fecha_input1\' AND \':fecha_input2\'
  AND (m.NUM_COLEGIO || \'       -       \' || m.NOMBRE) = \':doctor_cadena\'
  UNION
  SELECT TO_CHAR(ct.FECHA,\'DD/MM/YYYY\') AS FECHA,
          ms.NOMBRE AS DOCTOR,
          (SELECT p.NOMBRE FROM PACIENTE p WHERE p.CI=(SELECT cit.CI_PACIENTE FROM CITA cit WHERE cit.ID=ct.CITA_ID)) AS PACIENTE,
          \'TRATAMIENTO\' as TIPO FROM CITA_TRATAMIENTO ct
  JOIN MEDICO ms ON ct.CI_MEDICO = ms.CI
  WHERE TO_CHAR(ct.FECHA,\'YYYY-MM-DD\') BETWEEN \':fecha_input1\' AND \':fecha_input2\'
  AND (ms.NUM_COLEGIO || \'       -       \' || ms.NOMBRE) = \':doctor_cadena\'',
  true);

  define("HISTORIAL_CITAS_SQL",
  "SELECT NOMBRE, FECHA, MOTIVO
  FROM CITA JOIN PACIENTE ON (CI = CITA.CI_PACIENTE)
  WHERE CI_PACIENTE ='&CIPACIENTE'
  ORDER BY FECHA",
  true);

  define("HISTORIAL_TRATAMIENTOS_SQL",
  "SELECT NOMBRE, CT.FECHA,
    CASE WHEN ABONADO < CT.COSTO
      THEN 'INSOLVENTE'
      ELSE 'SOLVENTE'
    END ESTADO
  FROM CITA_TRATAMIENTO CT JOIN CITA C ON (ID = CITA_ID)
    JOIN PACIENTE P ON (P.CI = C.CI_PACIENTE)
  WHERE C.CI_PACIENTE=&CIPACIENTE
  ORDER BY CT.FECHA",
  true);

  define("MOROSOS_SQL",
  "SELECT NOMBRE, CT.FECHA FECHA,
    CASE WHEN SYSDATE-CT.FECHA >= 30
      THEN 'PLAZO TERMINADO'
      ELSE 'QUEDAN'||TO_CHAR(SYSDATE-CT.FECHA,'99')||'DIA(S)'
      END PLAZO
  FROM CITA_TRATAMIENTO CT JOIN CITA C ON(ID = CITA_ID)
    JOIN PACIENTE P ON(P.CI = C.CI_PACIENTE)
  WHERE ABONADO < CT.COSTO",
  true);

  define("EL_DERROCHADOR_SQL",
  "SELECT M.NOMBRE Medico, SUM(TI.CANTIDAD) Cantidad
  FROM CITA_TRATAMIENTO CT JOIN TRATAMIENTO_IMPLEMENTO TI ON(CT.CITA_ID = TI.CITA_ID AND CT.TRATAMIENTO_ID = TI.TRATAMIENTO_ID)
    JOIN MEDICO M ON(M.CI = CT.CI_MEDICO)
    JOIN IMPLEMENTO I ON(I.ID = TI.IMPLEMENTO_ID)
  GROUP BY I.ID, M.NOMBRE
  HAVING (I.ID = &IDIMPLEMENTO)
  ORDER BY 2",
  true);

  define("TRATAMIENTOS_DIA_SQL",
  "SELECT P.NOMBRE 'Paciente', M.NOMBRE 'Medico', T.DESCRIPCION 'Descripcion tratamiento'
  FROM CITA_TRATAMIENTO CT
    JOIN CITA C ON(CT.CITA_ID = C.ID)
    JOIN PACIENTE P ON (C.CI_PACIENTE = P.CI)
    JOIN MEDICO M ON(CT.CI_MEDICO = M.CI)
  JOIN TRATAMIENTO T ON(CT.TRATAMIENTO_ID = T.ID)
  WHERE CT.FECHA = TO_DATE('&FECHA','DD/MM/YY')",
  true);

  //Las super consultas
  const CONSULTAS = array(
    "Tratamientos realizados" => "t-realizados",
    "Ganancias generales" => "g-generales",
    "Ganancias por mes" => "g-por-mes",
    "El doctor derrochador" => "d-derrochador",
    "Morosos" => "morosos",
    "Historial de citas" => "c-historial",
    "Historial de tratamientos" => "t-historial"
  );

 ?>
