<?php
  //Credenciales
  define("DB", "//localhost/XE");
  define("DB_USER", "PROYECTODB20161");
  define("DB_PASS", "123");
  define("DB_CHAR", "AL32UTF8");

  //SQL
  define("LISTA_EMPLEADOS_SQL",
  'SELECT ci, nombre, TO_CHAR(fecha_nac, \'YYYY/MM/DD\') fecha, direccion, telefono
  FROM empleado
  UNION
  SELECT ci, nombre, TO_CHAR(fecha_nac, \'YYYY/MM/DD\') fecha, direccion, telefono
  FROM medico
  ORDER BY 2',
  true);

  define("EMPLEADO_ESPECIFICO_SQL",
  'SELECT x.ci ci, x.nombre nombre, TO_CHAR(x.fecha_nac, \'YYYY/MM/DD\') fecha,
  x.direccion direccion, x.telefono telefono, x.a, x.b, e.nombre especializacion,
  nvl(eme.ci_empleado, 0) is_empleado, nvl(eme.ci_medico, 0) is_medico
  FROM (
    SELECT ci, e.nombre, fecha_nac, direccion, telefono, TO_CHAR(sueldo) a, TO_CHAR(c.nombre) b
    FROM empleado e JOIN cargo_empleado ce ON (e.ci = ce.ci_empleado)
      JOIN cargo c ON(ce.cargo_id = c.id)
    UNION
    SELECT ci, nombre, fecha_nac, direccion, telefono, TO_CHAR(rif) a, TO_CHAR(num_colegio) b
    FROM medico) x
  JOIN especializacion_med_emp eme ON (x.ci = eme.ci_empleado OR x.ci = eme.ci_medico)
  JOIN especializacion e ON (eme.id_especializacion = e.id)
  WHERE x.ci = :id',
  true);

  define("LISTA_CITAS_SQL",
  'SELECT id, url_imagen_odontograma url_odontograma, TO_CHAR(fecha, \'YYYY/MM/DD\') fecha, costo, motivo, ci_paciente paciente, m.num_colegio medico
  FROM cita c JOIN medico m ON(c.ci_medico = m.ci)
  ORDER BY 1',
  true);

  define("CITA_ESPECIFICA_SQL",
  'SELECT c.url_imagen_odontograma, TO_CHAR(c.fecha, \'YYYY/MM/DD\') fecha, TO_CHAR(c.fecha, \'HH24:MI\') hora, c.costo, c.motivo,
  p.ci || \' - \' || p.nombre paciente,
  m.num_colegio || \' - \' || m.nombre medico,
  t.id, t.descripcion, ct.ci_medico, ct.abonado,
  i.nombre, i.marca, ti.costo, ti.cantidad
  FROM cita c
    JOIN cita_tratamiento ct ON(c.id = ct.cita_id)
    JOIN tratamiento t ON(ct.tratamiento_id = t.id)
    JOIN tratamiento_implemento ti ON(t.id = ti.tratamiento_id)
    JOIN implemento i ON(i.id = ti.implemento_id)
    JOIN paciente p ON(c.ci_paciente = p.ci)
    JOIN medico m ON(c.ci_medico = m.ci)
  WHERE c.id = :id',
  true);

  define("LISTA_ESPECIALIZACIONES_SQL",
  'SELECT * FROM especializacion',
  true);

  define("LISTA_INVENTARIO_SQL",
  'SELECT * FROM implemento',
  true);

  define("IMPLEMENTO_ESPECIFICO_SQL",
  'SELECT nombre, marca, descripcion, costo, cantidad FROM implemento
  WHERE ID = :id',
  true);

  define("LISTA_PACIENTES_SQL",
  'SELECT ci, nombre, TO_CHAR(fecha_nac, \'YYYY/MM/DD\') fecha, direccion, telefono, ocupacion
  FROM paciente
  ORDER BY 2',
  true);

  define("PACIENTE_ESPECIFICO_SQL",
  'SELECT ci, nombre, TO_CHAR(fecha_nac, \'YYYY/MM/DD\') fecha, direccion, telefono, ocupacion
  FROM paciente
  WHERE CI = :id',
  true);

  define("LISTA_NOMBRES_DOCTORES_SQL",
  'SELECT NUM_COLEGIO || \' - \' || NOMBRE AS NOMBRE
  FROM MEDICO
  ORDER BY NUM_COLEGIO',
  true);

  define("LISTA_NOMBRES_PACIENTES_SQL",
  'SELECT CI || \' - \' || NOMBRE AS NOMBRE
  FROM PACIENTE
  ORDER BY CI ASC',
  true);

  define("LISTA_ATRIBUTOS_CITA_SQL",
  'SELECT p.CI || \' - \' || p.NOMBRE AS PACIENTE,
       m.NUM_COLEGIO || \' - \' || m.NOMBRE AS DOCTOR,
       TO_CHAR(c.FECHA, \'YYYY/MM/DD\') AS FECHA,
       c.URL_IMAGEN_ODONTOGRAMA AS ODONTOGRAMA,
       c.COSTO AS PRESUPUESTO
  FROM CITA c
  JOIN MEDICO m ON c.CI_MEDICO = m.CI
  JOIN PACIENTE p ON c.CI_PACIENTE = p.CI
  WHERE c.ID = ',
  true);

  define("HORARIO_GLOBAL_DIA_SQL",
      'SELECT c.FECHA AS FECHA,
              m.NOMBRE AS DOCTOR,
              (SELECT NOMBRE FROM PACIENTE WHERE CI=c.CI_PACIENTE) AS PACIENTE,
              \'CITA\' as TIPO FROM CITA c
        JOIN MEDICO m ON c.CI_MEDICO = m.CI
        WHERE TO_CHAR(c.FECHA,\'YYYY-MM-DD\') = \':fecha_input\'
        UNION
        SELECT ct.FECHA AS FECHA,
                ms.NOMBRE AS DOCTOR,
                (SELECT p.NOMBRE FROM PACIENTE p
                WHERE p.CI=(SELECT cit.CI_PACIENTE FROM CITA cit WHERE cit.ID=ct.CITA_ID)) AS PACIENTE,
                \'TRATAMIENTO\' as TIPO FROM CITA_TRATAMIENTO ct
        JOIN MEDICO ms ON ct.CI_MEDICO = ms.CI
        WHERE TO_CHAR(ct.FECHA,\'YYYY-MM-DD\') = \':fecha_input\'
        ORDER BY FECHA'
    ,true);


  define("HORARIO_GLOBAL_RANGO_SQL",
      'SELECT c.FECHA AS FECHA,
              m.NOMBRE AS DOCTOR,
              (SELECT NOMBRE FROM PACIENTE
              WHERE CI=c.CI_PACIENTE) AS PACIENTE,
              \'CITA\' as TIPO FROM CITA c
      JOIN MEDICO m ON c.CI_MEDICO = m.CI
      WHERE TO_CHAR(c.FECHA,\'YYYY-MM-DD\') BETWEEN \':fecha_input1\' AND \':fecha_input2\'
      UNION
      SELECT ct.FECHA AS FECHA,
              ms.NOMBRE AS DOCTOR,
              (SELECT p.NOMBRE FROM PACIENTE p
              WHERE p.CI=(SELECT cit.CI_PACIENTE FROM CITA cit WHERE cit.ID=ct.CITA_ID)) AS PACIENTE,
              \'TRATAMIENTO\' as TIPO FROM CITA_TRATAMIENTO ct
      JOIN MEDICO ms ON ct.CI_MEDICO = ms.CI
      WHERE TO_CHAR(ct.FECHA,\'YYYY-MM-DD\') BETWEEN \':fecha_input1\' AND \':fecha_input2\'
      ORDER BY FECHA'
    ,true);


  define("HORARIO_DOCTOR_DIA_SQL",
    'SELECT c.FECHA AS FECHA,
            m.NOMBRE AS DOCTOR,
            (SELECT NOMBRE FROM PACIENTE
            WHERE CI=c.CI_PACIENTE) AS PACIENTE,
            \'CITA\' as TIPO FROM CITA c
      JOIN MEDICO m ON c.CI_MEDICO = m.CI
      WHERE TO_CHAR(c.FECHA,\'YYYY-MM-DD\') = \':fecha_input\'
      AND (m.NUM_COLEGIO || \' - \' || m.NOMBRE) = \':doctor_cadena\'
      UNION
      SELECT ct.FECHA AS FECHA,
              ms.NOMBRE AS DOCTOR,
              (SELECT p.NOMBRE FROM PACIENTE p
              WHERE p.CI=(SELECT cit.CI_PACIENTE FROM CITA cit WHERE cit.ID=ct.CITA_ID)) AS PACIENTE,
              \'TRATAMIENTO\' as TIPO FROM CITA_TRATAMIENTO ct
      JOIN MEDICO ms ON ct.CI_MEDICO = ms.CI
      WHERE TO_CHAR(ct.FECHA,\'YYYY-MM-DD\') = :fecha_input
      AND (ms.NUM_COLEGIO || \' - \' || ms.NOMBRE) = \':doctor_cadena\'
      ORDER BY FECHA
      '
    ,true);


  define("HORARIO_DOCTOR_RANGO_SQL",
    'SELECT c.FECHA AS FECHA,
      m.NOMBRE AS DOCTOR,
      (SELECT NOMBRE FROM PACIENTE
      WHERE CI=c.CI_PACIENTE) AS PACIENTE,
      \'CITA\' as TIPO FROM CITA c
      JOIN MEDICO m ON c.CI_MEDICO = m.CI
      WHERE TO_CHAR(c.FECHA,\'YYYY-MM-DD\') BETWEEN \':fecha_input1\' AND \':fecha_input2\'
      AND (m.NUM_COLEGIO || \' - \' || m.NOMBRE) = \':doctor_cadena\'
      UNION
      SELECT ct.FECHA AS FECHA,
              ms.NOMBRE AS DOCTOR,
              (SELECT p.NOMBRE FROM PACIENTE p
              WHERE p.CI=(SELECT cit.CI_PACIENTE FROM CITA cit WHERE cit.ID=ct.CITA_ID)) AS PACIENTE,
              \'TRATAMIENTO\' as TIPO FROM CITA_TRATAMIENTO ct
      JOIN MEDICO ms ON ct.CI_MEDICO = ms.CI
      WHERE TO_CHAR(ct.FECHA,\'YYYY-MM-DD\') BETWEEN \':fecha_input1\' AND \':fecha_input2\'
      AND (ms.NUM_COLEGIO || \' - \' || ms.NOMBRE) = \':doctor_cadena\'
      ORDER BY FECHA
      '
    ,true);

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


  const DML_SENTENCES = array(
    'CITA' => array(
                    'insert' => 'INSERT INTO CITA :campos VALUES :valores',
                    'update' => 'UPDATE CITA SET :columna_valores WHERE ID = :id',
                    'delete' => 'DELETE FROM CITA WHERE ID = :id'
              ),
    'EMPLEADO' => array(
                    'insert' => 'INSERT INTO EMPLEADO :campos VALUES :valores',
                    'update' => 'UPDATE EMPLEADO SET :columna_valores WHERE CI = :ci',
                    'delete' => 'DELETE FROM EMPLEADO WHERE CI = :ci'
                  ),
    'MEDICO' => array(
                  'insert' => 'INSERT INTO MEDICO :campos VALUES :valores',
                    'update' => 'UPDATE MEDICO SET :columna_valores WHERE CI = :ci OR NUM_COLEGIO = :num_cole',
                    'delete' => 'DELETE FROM MEDICO WHERE CI = :ci OR NUM_COLEGIO = :num_cole'
                ),
    'ESPECIALIZACION_MED_EMP' => array(
                  'MEDICO' => array(
                                'insert' => 'INSERT INTO ESPECIALIZACION_MED_EMP :campos VALUES :valores',
                                'update' => 'UPDATE ESPECIALIZACION_MED_EMP SET :columna_valores WHERE CI = :ci OR NUM_COLEGIO = :num_cole',
                                'delete' => 'DELETE FROM ESPECIALIZACION_MED_EMP WHERE CI = :ci OR NUM_COLEGIO = :num_cole'
                              ),
                  'EMPLEADO' => array(
                                'insert' => 'INSERT INTO ESPECIALIZACION_MED_EMP :campos VALUES :valores',
                                'update' => 'UPDATE ESPECIALIZACION_MED_EMP SET :columna_valores WHERE CI = :ci OR NUM_COLEGIO = :num_cole',
                                'delete' => 'DELETE FROM ESPECIALIZACION_MED_EMP WHERE CI = :ci OR NUM_COLEGIO = :num_cole'
                              )
                ),
    'PACIENTE' => array(
                    'insert' => 'INSERT INTO PACIENTE :campos VALUES :valores',
                    'update' => 'UPDATE PACIENTE SET :columna_valores WHERE CI = :ci',
                    'delete' => 'DELETE FROM PACIENTE WHERE CI = :ci'
                  ),
    'IMPLEMENTO' => array(
                      'insert' => 'INSERT INTO IMPLEMENTO :campos VALUES :valores',
                      'update' => 'UPDATE IMPLEMENTO SET :columna_valores WHERE ID = :id',
                      'delete' => 'DELETE FROM IMPLEMENTO WHERE ID = :id'
                    ),
    'CITA_TRATAMIENTO' => array(
                            'insert' => 'INSERT INTO CITA_TRATAMIENTO :campos VALUES :valores',
                            'update' => 'UPDATE CITA_TRATAMIENTO SET :columna_valores WHERE CITA_ID = :ci AND TRATAMIENTO_ID = :ti AND FECHA = :fecha',
                            'delete' => 'DELETE FROM CITA_TRATAMIENTO WHERE CITA_ID = :ci AND TRATAMIENTO_ID = :ti AND FECHA = :fecha'
                          ),
    'TRATAMIENTO_IMPLEMENTO' => array(
                            'insert' => 'INSERT INTO TRATAMIENTO_IMPLEMENTO :campos VALUES :valores',
                            'update' => 'UPDATE TRATAMIENTO_IMPLEMENTO SET :columna_valores WHERE TRATAMIENTO_ID = :ti AND IMPLEMENTO_ID = :ii AND CITA_ID = :ci',
                            'delete' => 'DELETE FROM TRATAMIENTO_IMPLEMENTO WHERE CITA_ID = :ci AND TRATAMIENTO_ID = :ti AND IMPLEMENTO_ID = :ii'
                          ),
  );

 ?>
