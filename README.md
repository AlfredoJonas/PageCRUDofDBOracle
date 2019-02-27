# CRUD with the PHP language and ORACLE DB

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

If you do not use a framework to make a software, maybe you have a confusion about how to start or the best option to develop. 

In this case, we construct software for creating, read, update and delete data referent to a consulting room dentist, easy, fast, and with little dependencies, perfect for a place without internet or in critic moment that we will have developed

This CRUD software did are developed with:

  - PHP
  - Javascript
  - HTML
  - CSS
  - jQuery
  - Oracle (Yes Oracle is not necessarily more fast DB for develop, but in this case, the investigation is required because we did learn about this in the university)

# How work?

  - Run sql scripts with oracle db in the order: 
    1) db-files/CentroOdontologico.sql
    2) db-files/datos.sql
  - Server de index.php in app-files/

# Have many things the software? (only about data base)
(all sql scripts are in db-files/CentroOdontologico.sql)

### TRIGGERS
- [x]	NO PERMITIR MAS DE 8 CONSULTAS AL DIA POR DOCTOR
- [x]	NO PERMITIR MAS DE 3 DOCTORES REALIZANDO TRATAMIENTO POR HORA (TOMANDO EN CUENTA
	QUE EN PROMEDIO CADA CONSULTA DURA UNA HORA)
- [x]	ACTUALIZAR INVENTARIO  CUANDO SE REALICE LA CONSULTA
- [x]	UN EMPLEADO NO PUEDE TENER DOS CARGOS A LA VEZ
- [x]	MAXIMO 12 ORTODONCIAS POR DIA
- [x]	NO SE PUEDEN AGREGAR FECHAS QUE YA PASARON
- [x]	SI SE CREA CARGO_EMPLEADO LA FECHA_FIN DEBE SER NULL

### QUERY
- [x]	VALIDAR LISTADO DE DOCTORES DISPONIBLES EN UNA FECHA Y HORA ESPECIFICA(AGREGAR LA HORA POR AHI)
- [x]	TRATAMIENTOS REALIZADOS EN UN DIA DADO
- [x]	HORARIOS DISPONIBLES PARA UN DIA DADO
- [x] CITAS DE UN DOCTOR DADO EN UN DÍA/RANGO DE FECHAS DADO.
- [x] HISTORIAL DE CITAS DE UN PACIENTE ORDENADO POR FECHAS.
- [x] HISTORIAL DE TRATAMIENTOS DE UN PACIENTE ORDENADO POR FECHAS Y SI YA LO PAGÓ O NO.
- [x]	CALCULAR GANANCIAS GENERALES EN UN MES DADO
- [x]	EL DOCTOR DERROCHADOR (EL QUE GASTA MAS DE UN IMPLEMENTO DADO EN SUS TRATAMIENTOS)
- [x]	PACIENTES QUE NO HAN PAGADO COMPLETO
- [x]	VALIDAR QUE LOS DOCTORES DE UN TRATAMIENTO TENGAN UNA ESPECIALIZACIÓN EN ALGO CON RELACIÓN AL TRATAMIENTO
- [x]	VALIDAR QUE HAYA SUFICIENTES IMPLEMENTOS PARA UN TRATAMIENTO
- [x]	PORCENTAJE DE GANANCIA DE LOS TRATAMIENTOS POR MES

### RESTRICTIONS
- [x]	CANTIDADES NEGATIVAS EN EL INVENTARIO DE IMPLEMENTOS
- [x]	COSTOS NEGATIVOS
- [x]	CANTIDADES NEGATIVAS EN EL INVENTARIO DE IMPLEMENTOS
- [x]	COSTOS NEGATIVOS


![alt text](https://raw.githubusercontent.com/alfredojonas/PageCRUDofDBOracle/master/resources/1.png)

![alt text](https://raw.githubusercontent.com/alfredojonas/PageCRUDofDBOracle/master/resources/2.png)

![alt text](https://raw.githubusercontent.com/alfredojonas/PageCRUDofDBOracle/master/resources/3.png)

![alt text](https://raw.githubusercontent.com/alfredojonas/PageCRUDofDBOracle/master/resources/4.png)

![alt text](https://raw.githubusercontent.com/alfredojonas/PageCRUDofDBOracle/master/resources/5.png)

![alt text](https://raw.githubusercontent.com/alfredojonas/PageCRUDofDBOracle/master/resources/6.png)

![alt text](https://raw.githubusercontent.com/alfredojonas/PageCRUDofDBOracle/master/resources/7.png)

![alt text](https://raw.githubusercontent.com/alfredojonas/PageCRUDofDBOracle/master/resources/8.png)

