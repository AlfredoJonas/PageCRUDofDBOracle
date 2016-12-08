<?php
  //Credenciales
  define("DB", "//localhost/XE");
  define("DB_USER", "PROYECTODB20161");
  define("DB_PASS", "123");
  define("DB_CHAR", "AL32UTF8");

  //Rutas
  define("RUTA_EMPLEADOS", "empleados");
  define("RUTA_PACIENTES", "pacientes");
  define("RUTA_INVENTARIO", "inventario");
  define("RUTA_HORARIOS", "horarios");
  define("RUTA_CITAS", "citas");

  //Indicadores
  define("LISTA_EMPLEADOS", "solicitudListaEmpleados");
  define("LISTA_ESPECIALIZACIONES", "solicitudListaEspecializaciones");
  define("LISTA_PACIENTES", "solicitudListaPacientes");
  define("LISTA_INVENTARIO", "solicitudListaInventario");
  define("LISTA_NOMBRES_DOCTORES", "solicitudListaNombresDoctores");
  define("LISTA_NOMBRES_PACIENTES", "solicitudListaNombresPacientes");
  define("LISTA_ATRIBUTOS_CITA", "solicitudListaAtributosCita");

  //Estas son dinamicas por ende no tienen su respectivo SQL
  define("HORARIO_DOCTOR_FECHA", "solicitudHorarioDoctorRangoDeFechas");
  define("HORARIO_DOCTOR_DIA", "solicitudHorarioDoctorDia");

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
  "select * from medico",
  true);

  define("LISTA_NOMBRES_PACIENTES_SQL",
  "select * from paciente",
  true);

  define("LISTA_ATRIBUTOS_CITA_SQL",
  //Esto es dinamico
  "select * from paciente",
  true);
 ?>
