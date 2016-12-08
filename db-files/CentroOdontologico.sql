---------------------------------------ALGO EXTRA----------------------------------------

/*

SELECT 'DROP TABLE "' || table_name || '" CASCADE CONSTRAINTS;' FROM user_tables
UNION
SELECT 'DROP SEQUENCE "' || sequence_name || '";' FROM user_sequences
UNION
SELECT 'DROP TRIGGER "' || TRIGGER_name || '";' FROM user_TRIGGERS
UNION
SELECT 'DROP PROCEDURE "' || PROCEDURE_name || '";' FROM user_PROCEDURES;

DBMS_OUTPUT.PUT_LINE ();
RAISE_APPLICATION_ERROR(-20505, 'NO SE PUEDE MODIFICAR LA VERSION');

*/

----------------------------------------CREACION DE TABLAS---------------------------------------

/*PARA EJECUTAR BASE DE DATOS EJECUTAR TODO EL DDL Y LUEGO EJECUTAR CADA TRIGGER(QUE ESTAN COMENTADOS) POR SEPARADO(SINO DA ERROR)
  Y DESPUES EJECUTAR TODA LA INSERCIONES DE FILAS(QUE TAMBIEN ESTA COMENTADO)*/

CREATE TABLE CARGO
  (
    ID          NUMBER(*,0) NOT NULL ,
    NOMBRE      VARCHAR2 (300 BYTE) NOT NULL ,
    DESCRIPCION VARCHAR2 (500 BYTE) NOT NULL
  );
  
CREATE UNIQUE INDEX CARGO_PK ON CARGO
  (
    ID ASC
  );
  
ALTER TABLE CARGO ADD CONSTRAINT CARGO_PK PRIMARY KEY ( ID ) USING INDEX CARGO_PK ;


CREATE TABLE CARGO_EMPLEADO
  (
    CARGO_ID   NUMBER(*,0) NOT NULL ,
    CI_EMPLEADO  NUMBER(*,0) NOT NULL ,
    FECHA_INI DATE NOT NULL ,
    FECHA_FIN DATE
  );
CREATE UNIQUE INDEX CARGO_EMPLEADO_PK ON CARGO_EMPLEADO
  (
    CI_EMPLEADO ASC , CARGO_ID ASC
  );
ALTER TABLE CARGO_EMPLEADO ADD CONSTRAINT CARGO_EMPLEADO_PK PRIMARY KEY ( CI_EMPLEADO, CARGO_ID ) USING INDEX CARGO_EMPLEADO_PK ;


CREATE TABLE CITA
  (
    ID          NUMBER(*,0) NOT NULL ,
    URL_IMAGEN_ODONTOGRAMA VARCHAR2 (100 BYTE) NOT NULL ,
    FECHA       DATE NOT NULL ,
    COSTO NUMBER(*,0) NOT NULL ,
    MOTIVO      VARCHAR2 (300 BYTE) NOT NULL ,
    CI_PACIENTE    NUMBER(*,0) NOT NULL ,
    CI_MEDICO      NUMBER(*,0) NOT NULL
  );
ALTER TABLE CITA ADD CONSTRAINT CITA_CHK1 CHECK ( PRESUPUESTO>=0) ;
CREATE UNIQUE INDEX CITA_PK ON CITA ( ID ASC ) ;
ALTER TABLE CITA ADD CONSTRAINT CITA_PK PRIMARY KEY ( ID ) USING INDEX CITA_PK ;

CREATE TABLE CITA_TRATAMIENTO
  (
    CITA_ID        NUMBER(*,0) NOT NULL ,
    TRATAMIENTO_ID NUMBER(*,0) NOT NULL ,
    CI_MEDICO      NUMBER(*,0) NOT NULL ,
    FECHA       DATE NOT NULL ,
    COSTO       NUMBER(*,0) NOT NULL ,
    ABONADO NUMBER(*,0) NOT NULL
  );
CREATE UNIQUE INDEX CITA_TRATAMIENTO_PK ON CITA_TRATAMIENTO
  (
    CITA_ID ASC , TRATAMIENTO_ID ASC
  );
  
ALTER TABLE CITA_TRATAMIENTO ADD CONSTRAINT "CITA_TRATAMIENTO_CHK1" CHECK (COSTO>=0 AND ABONADO>=0) ENABLE;
ALTER TABLE CITA_TRATAMIENTO ADD CONSTRAINT CITA_TRATAMIENTO_PK PRIMARY KEY ( CITA_ID, TRATAMIENTO_ID ) USING INDEX CITA_TRATAMIENTO_PK ;


CREATE TABLE DETALLE_HIS_MED
  (
    ID          NUMBER(*,0) NOT NULL ,
    DESCRIPCION VARCHAR2 (500 BYTE) NOT NULL
  );
CREATE UNIQUE INDEX DETALLE_HIS_MED_PK ON DETALLE_HIS_MED
  (
    ID ASC
  );
ALTER TABLE DETALLE_HIS_MED ADD CONSTRAINT DETALLE_HIS_MED_PK PRIMARY KEY ( ID ) USING INDEX DETALLE_HIS_MED_PK ;


CREATE TABLE EMPLEADO
  (
    CI        NUMBER(*,0) NOT NULL ,
    NOMBRE    VARCHAR2 (300 BYTE) NOT NULL ,
    FECHA_NAC DATE NOT NULL ,
    DIRECCION VARCHAR2 (500 BYTE) NOT NULL ,
    TELEFONO  VARCHAR2 (20 BYTE) NOT NULL ,
    SUELDO    NUMBER(*,0) NOT NULL
  );
CREATE UNIQUE INDEX EMPLEADO_PK ON EMPLEADO
  (
    CI ASC
  );
ALTER TABLE EMPLEADO ADD CONSTRAINT EMPLEADO_PK PRIMARY KEY ( CI ) USING INDEX EMPLEADO_PK ;
ALTER TABLE "EMPLEADO" ADD CONSTRAINT "EMPLEADO_CHK1" CHECK (SUELDO>0) ENABLE;
ALTER TABLE "EMPLEADO" ADD CONSTRAINT "EMPLEADO_CHK2" CHECK (LENGTH(TELEFONO)=13 
AND REGEXP_LIKE(TELEFONO,'[0-9]+')) ENABLE;
 

CREATE TABLE ESPECIALIZACION
  (
    ID    NUMBER NOT NULL,
    NOMBRE      VARCHAR2 (200 BYTE) NOT NULL ,
    DESCRIPCION VARCHAR2 (500 BYTE) NOT NULL
  );
CREATE UNIQUE INDEX ESPECIALIZACION_PK ON ESPECIALIZACION
  (
    ID ASC
  );
ALTER TABLE ESPECIALIZACION ADD CONSTRAINT ESPECIALIZACION_PK PRIMARY KEY ( ID ) USING INDEX ESPECIALIZACION_PK ;


CREATE TABLE ESPECIALIZACION_MED_EMP
  (
    ID              NUMBER(*,0) NOT NULL ,
    ID_ESPECIALIZACION NUMBER(*,0) NOT NULL ,
    CI_EMPLEADO        NUMBER(*,0) ,
    CI_MEDICO          NUMBER(*,0)
  );
CREATE UNIQUE INDEX ESPECIALIZACION_MED_EMP_PK ON ESPECIALIZACION_MED_EMP
  (
    ID ASC
  );
ALTER TABLE ESPECIALIZACION_MED_EMP ADD CONSTRAINT ESPECIALIZACION_MED_EMP_PK PRIMARY KEY ( ID ) USING INDEX ESPECIALIZACION_MED_EMP_PK ;
ALTER TABLE "ESPECIALIZACION_MED_EMP" ADD CONSTRAINT "ESPECIALIZACION_MED_EMP_CHK1" 
CHECK ((CI_EMPLEADO IS NULL AND CI_MEDICO IS NOT NULL) OR (CI_EMPLEADO IS NOT NULL AND CI_MEDICO IS NULL)) ENABLE;


CREATE TABLE IMPLEMENTO
  (
    ID          NUMBER(*,0) NOT NULL ,
    NOMBRE      VARCHAR2 (300 BYTE) NOT NULL ,
    MARCA       VARCHAR2 (500 BYTE) NOT NULL ,
    DESCRIPCION VARCHAR2 (500 BYTE) NOT NULL ,
    COSTO       NUMBER(*,0) NOT NULL ,
    CANTIDAD    NUMBER(*,0) NOT NULL
  );
CREATE UNIQUE INDEX IMPLEMENTO_PK ON IMPLEMENTO
  (
    ID ASC
  );
ALTER TABLE IMPLEMENTO ADD CONSTRAINT IMPLEMENTO_PK PRIMARY KEY ( ID ) USING INDEX IMPLEMENTO_PK ;
ALTER TABLE "IMPLEMENTO" ADD CONSTRAINT "IMPLEMENTO_CHK1" CHECK (COSTO >= 0 AND CANTIDAD >= 0) ENABLE;


CREATE TABLE IMPLEMENTO_TRATAMIENTO
  (
    ID_TRATAMIENTO     NUMBER(*,0) NOT NULL ,
    ID_IMPLEMENTO      NUMBER(*,0) NOT NULL ,
    CANTIDAD          NUMBER(*,0) NOT NULL
  );
  CREATE UNIQUE INDEX IMPLEMENTO_TRATAMIENTO_PK ON IMPLEMENTO_TRATAMIENTO
  (
    ID_TRATAMIENTO ASC, ID_IMPLEMENTO ASC
  );
  ALTER TABLE IMPLEMENTO_TRATAMIENTO ADD CONSTRAINT IMPLEMENTO_TRATAMIENTO_PK PRIMARY KEY ( ID_TRATAMIENTO, ID_IMPLEMENTO ) 
  USING INDEX IMPLEMENTO_TRATAMIENTO_PK ;
  

CREATE TABLE MEDICO
  (
    CI          NUMBER(*,0) NOT NULL ,
    NOMBRE      VARCHAR2 (300 BYTE) NOT NULL ,
    FECHA_NAC   DATE NOT NULL ,
    DIRECCION   VARCHAR2 (500 BYTE) NOT NULL ,
    TELEFONO    VARCHAR2 (20 BYTE) NOT NULL ,
    RIF         VARCHAR2 (20 BYTE) NOT NULL ,
    NUM_COLEGIO NUMBER(*,0) NOT NULL
  );
CREATE UNIQUE INDEX DOCTOR_PK ON MEDICO
  (
    CI ASC
  );
ALTER TABLE MEDICO ADD CONSTRAINT DOCTOR_PK PRIMARY KEY ( CI ) USING INDEX DOCTOR_PK ;
ALTER TABLE "MEDICO" ADD CONSTRAINT "MEDICO_CHK1" CHECK (regexp_like(UPPER(rif),'^[VEPGJC][0-9]+$')) ENABLE;
ALTER TABLE "MEDICO" ADD CONSTRAINT "MEDICO_CHK2" CHECK (LENGTH(TELEFONO)=13 
AND REGEXP_LIKE(TELEFONO,'[0-9]+')) ENABLE;

CREATE TABLE PACIENTE
  (
    CI        NUMBER(*,0) NOT NULL ,
    NOMBRE    VARCHAR2 (300 BYTE) NOT NULL ,
    FECHA_NAC DATE NOT NULL ,
    DIRECCION VARCHAR2 (500 BYTE) NOT NULL ,
    TELEFONO  VARCHAR2 (20 BYTE) NOT NULL ,
    OCUPACION VARCHAR2 (300 BYTE) NOT NULL
  );
CREATE UNIQUE INDEX PACIENTE_PK ON PACIENTE
  (
    CI ASC
  );
ALTER TABLE PACIENTE ADD CONSTRAINT PACIENTE_PK PRIMARY KEY ( CI ) USING INDEX PACIENTE_PK ;
ALTER TABLE "PACIENTE" ADD CONSTRAINT "PACIENTE_CHK1" CHECK (LENGTH(TELEFONO)=13 
AND REGEXP_LIKE(TELEFONO,'[0-9]+')) ENABLE;

CREATE TABLE PACIENTE_HIS_MED
  (
    CI_PACIENTE        NUMBER(*,0) NOT NULL ,
    DETALLE_HIS_MED NUMBER(*,0) NOT NULL,
    OBSERVACION VARCHAR2(300)
  );
CREATE UNIQUE INDEX PACIENTE_HIS_MED_PK ON PACIENTE_HIS_MED
  (
    DETALLE_HIS_MED ASC , CI_PACIENTE ASC, OBSERVACION ASC
  );
ALTER TABLE PACIENTE_HIS_MED ADD CONSTRAINT PACIENTE_HIS_MED_PK PRIMARY KEY ( DETALLE_HIS_MED, CI_PACIENTE, OBSERVACION );


CREATE TABLE RADIOGRAFIA
  (
    ID         NUMBER(*,0) NOT NULL ,
    URL_IMAGEN VARCHAR2 (500 BYTE) NOT NULL ,
    CITA       NUMBER(*,0) NOT NULL
  );
CREATE UNIQUE INDEX RADIOGRAFIA_PK ON RADIOGRAFIA
  (
    ID ASC
  );
ALTER TABLE RADIOGRAFIA ADD CONSTRAINT RADIOGRAFIA_PK PRIMARY KEY ( ID ) USING INDEX RADIOGRAFIA_PK ;


CREATE TABLE TRATAMIENTO
  (
    ID             NUMBER(*,0) NOT NULL ,
    COSTO          NUMBER(*,0) NOT NULL ,
    PORCE_GANAN_MEDICO NUMBER NOT NULL ,
    DESCRIPCION VARCHAR2(500)
  );
  
CREATE UNIQUE INDEX TRATAMIENTO_PK ON TRATAMIENTO ( ID ASC ) ;

ALTER TABLE TRATAMIENTO ADD CONSTRAINT TRATAMIENTO_PK PRIMARY KEY ( ID ) USING INDEX TRATAMIENTO_PK ;
ALTER TABLE "TRATAMIENTO" ADD CONSTRAINT "TRATAMIENTO_CHK1" CHECK (PORCE_GANAN_MEDICO<=1 AND PORCE_GANAN_MEDICO>=0) ENABLE;
ALTER TABLE "TRATAMIENTO" ADD CONSTRAINT "TRATAMIENTO_CHK2" CHECK (COSTO >= 0) ENABLE;

  CREATE TABLE ESPECIALIZACION_TRATAMIENTO 
   (	
      TRATAMIENTO_ID NUMBER(*,0), 
      ESPECIALIZACION_ID NUMBER(*,0)
   );

  CREATE UNIQUE INDEX ESPECIALIZACION_TRATAMIENT_PK ON ESPECIALIZACION_TRATAMIENTO (TRATAMIENTO_ID, ESPECIALIZACION_ID);

  ALTER TABLE ESPECIALIZACION_TRATAMIENTO ADD CONSTRAINT ESPECIALIZACION_TRATAMIENT_PK PRIMARY KEY (TRATAMIENTO_ID, ESPECIALIZACION_ID)
  USING INDEX ESPECIALIZACION_TRATAMIENT_PK ENABLE;
 
  ALTER TABLE ESPECIALIZACION_TRATAMIENTO MODIFY (TRATAMIENTO_ID NOT NULL ENABLE);
 
  ALTER TABLE ESPECIALIZACION_TRATAMIENTO MODIFY (ESPECIALIZACION_ID NOT NULL ENABLE);

  ALTER TABLE ESPECIALIZACION_TRATAMIENTO ADD CONSTRAINT ESPECIALIZACION_TRATAMIEN_FK1 FOREIGN KEY (ESPECIALIZACION_ID)
	  REFERENCES ESPECIALIZACION (ID) ON DELETE CASCADE ENABLE;
 
  ALTER TABLE ESPECIALIZACION_TRATAMIENTO ADD CONSTRAINT ESPECIALIZACION_TRATAMIEN_FK2 FOREIGN KEY (TRATAMIENTO_ID)
	  REFERENCES TRATAMIENTO (ID) ON DELETE CASCADE ENABLE;

CREATE TABLE TRATAMIENTO_IMPLEMENTO
  (
    TRATAMIENTO_ID NUMBER(*,0) NOT NULL ,
    IMPLEMENTO_ID  NUMBER(*,0) NOT NULL ,
    CANTIDAD    NUMBER(*,0) NOT NULL ,
    COSTO       NUMBER(*,0) NOT NULL ,
    CITA_ID        NUMBER(*,0) NOT NULL
  );
  
CREATE UNIQUE INDEX TRATAMIENTO_IMPLEMENTO_PK ON TRATAMIENTO_IMPLEMENTO
  (
    TRATAMIENTO_ID ASC , IMPLEMENTO_ID ASC , CITA_ID ASC
  );
  
ALTER TABLE "TRATAMIENTO_IMPLEMENTO" ADD CONSTRAINT "TRATAMIENTO_IMPLEMENTO_CHK1" 
CHECK (CANTIDAD > 0 AND COSTO >= 0) ENABLE;

ALTER TABLE TRATAMIENTO_IMPLEMENTO ADD CONSTRAINT TRATAMIENTO_IMPLEMENTO_PK PRIMARY KEY ( TRATAMIENTO_ID, IMPLEMENTO_ID, CITA_ID );



ALTER TABLE CARGO_EMPLEADO ADD CONSTRAINT CARGO_EMPLEADO_FK1 FOREIGN KEY ( CI_EMPLEADO ) REFERENCES EMPLEADO ( CI ) ON
DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE CARGO_EMPLEADO ADD CONSTRAINT CARGO_EMPLEADO_FK2 FOREIGN KEY ( CARGO_ID ) REFERENCES CARGO ( ID ) ON
DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE CITA ADD CONSTRAINT CITA_FK1 FOREIGN KEY ( CI_PACIENTE ) REFERENCES PACIENTE ( CI ) ON
DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE CITA ADD CONSTRAINT CITA_FK2 FOREIGN KEY ( CI_MEDICO ) REFERENCES MEDICO ( CI ) ON
DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE CITA_TRATAMIENTO ADD CONSTRAINT CITA_TRATAMIENTO_FK1 FOREIGN KEY ( CITA_ID ) REFERENCES CITA ( ID ) ON
DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE CITA_TRATAMIENTO ADD CONSTRAINT CITA_TRATAMIENTO_FK2 FOREIGN KEY ( TRATAMIENTO_ID ) REFERENCES TRATAMIENTO ( ID ) 
NOT DEFERRABLE ;

ALTER TABLE CITA_TRATAMIENTO ADD CONSTRAINT CITA_TRATAMIENTO_FK3 FOREIGN KEY ( CI_MEDICO ) REFERENCES MEDICO ( CI ) ON
DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE ESPECIALIZACION_MED_EMP ADD CONSTRAINT ESPECIALIZACION_MED_EMP_FK1 FOREIGN KEY ( ID_ESPECIALIZACION ) 
REFERENCES ESPECIALIZACION ( ID ) ON DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE ESPECIALIZACION_MED_EMP ADD CONSTRAINT ESPECIALIZACION_MED_EMP_FK2 FOREIGN KEY ( CI_MEDICO ) REFERENCES MEDICO ( CI ) ON
DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE ESPECIALIZACION_MED_EMP ADD CONSTRAINT ESPECIALIZACION_MED_EMP_FK3 FOREIGN KEY ( CI_EMPLEADO ) REFERENCES EMPLEADO ( CI ) ON
DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE PACIENTE_HIS_MED ADD CONSTRAINT PACIENTE_HIS_MED_FK1 FOREIGN KEY ( DETALLE_HIS_MED ) REFERENCES DETALLE_HIS_MED ( ID ) ON
DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE PACIENTE_HIS_MED ADD CONSTRAINT PACIENTE_HIS_MED_FK2 FOREIGN KEY ( CI_PACIENTE ) REFERENCES PACIENTE ( CI ) ON
DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE RADIOGRAFIA ADD CONSTRAINT RADIOGRAFIA_FK1 FOREIGN KEY ( CITA ) REFERENCES CITA ( ID ) ON
DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE TRATAMIENTO_IMPLEMENTO ADD CONSTRAINT TRATAMIENTO_IMPLEMENTO_FK1 FOREIGN KEY ( IMPLEMENTO_ID ) REFERENCES IMPLEMENTO ( ID ) ON
DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE TRATAMIENTO_IMPLEMENTO ADD CONSTRAINT TRATAMIENTO_IMPLEMENTO_FK2 FOREIGN KEY ( CITA_ID, TRATAMIENTO_ID ) 
REFERENCES CITA_TRATAMIENTO ( CITA_ID, TRATAMIENTO_ID ) ON DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE IMPLEMENTO_TRATAMIENTO ADD CONSTRAINT IMPLEMENTO_TRATAMIENTO_FK1 FOREIGN KEY ( ID_TRATAMIENTO ) 
REFERENCES TRATAMIENTO ( ID ) ON DELETE CASCADE NOT DEFERRABLE ;

ALTER TABLE IMPLEMENTO_TRATAMIENTO ADD CONSTRAINT IMPLEMENTO_TRATAMIENTO_FK2 FOREIGN KEY ( ID_IMPLEMENTO ) 
REFERENCES IMPLEMENTO ( ID ) ON DELETE CASCADE NOT DEFERRABLE ;

----------------------------------------CREACION DE SECUENCIAS-------------------------------------

CREATE SEQUENCE  "ID_DETALLE_HIS_MED"  
MINVALUE 1 
MAXVALUE 9999999999999999999999999999 
INCREMENT BY 1 
START WITH 1 
CACHE 20 
NOORDER  NOCYCLE ;

CREATE SEQUENCE  "ID_ESPECIALIZACION"  
MINVALUE 1 
MAXVALUE 9999999999999999999999999999 
INCREMENT BY 1 
START WITH 1 
CACHE 20 
NOORDER  NOCYCLE ;

CREATE SEQUENCE  "ID_ESPECIALIZACION_M_E"  
MINVALUE 1 
MAXVALUE 9999999999999999999999999999 
INCREMENT BY 1 
START WITH 1 
CACHE 20 
NOORDER  NOCYCLE ;

CREATE SEQUENCE  "ID_CITA"  
MINVALUE 1 
MAXVALUE 9999999999999999999999999999 
INCREMENT BY 1 
START WITH 1 
CACHE 20 
NOORDER  NOCYCLE ;

CREATE SEQUENCE  "ID_IMPLEMENTO"  
MINVALUE 1 
MAXVALUE 9999999999999999999999999999 
INCREMENT BY 1 
START WITH 1 
CACHE 20 
NOORDER  NOCYCLE ;

CREATE SEQUENCE  "ID_TRATAMIENTO"  
MINVALUE 1 
MAXVALUE 9999999999999999999999999999 
INCREMENT BY 1 
START WITH 1 
CACHE 20 
NOORDER  NOCYCLE ;

CREATE SEQUENCE  "ID_CARGO"  
MINVALUE 1 
MAXVALUE 9999999999999999999999999999 
INCREMENT BY 1 
START WITH 1 
CACHE 20 
NOORDER  NOCYCLE ;


/*
----------------------------------------CREACION DE TRIGGERS---------------------------------------

--PARA NO PERMITIR MAS DE 8 CONSULTAS AL DIA POR DOCTOR Y
-- NO PERMITIR MAS DE 3 DOCTORES REALIZANDO CONSULTAS POR HORA (TOMANDO EN CUENTA
-- QUE EN PROMEDIO CADA CONSULTA DURA UNA HORA)

CREATE OR REPLACE TRIGGER CITAS_AL_DIAHORA_POR_MEDICO
BEFORE INSERT ON CITA 
FOR EACH ROW 
DECLARE
NUM_CITAS NUMBER := 0;
BEGIN

    SELECT NVL((SELECT COUNT(*) FROM CITA CIT GROUP BY CIT.CI_MEDICO, TO_CHAR(CIT.FECHA,'DD/MM/YY') 
    HAVING CIT.CI_MEDICO = :NEW.CI_MEDICO AND TO_CHAR(CIT.FECHA,'DD/MM/YY') = TO_CHAR(:NEW.FECHA,'DD/MM/YY') ),0) INTO NUM_CITAS FROM DUAL;
    
    IF NUM_CITAS >= 8 THEN
      RAISE_APPLICATION_ERROR(-20505, 'NO SE PUEDEN ASIGNAR MAS DE 8 CITAS AL DIA POR MEDICO');
    END IF;
    
    NUM_CITAS := 0;
    
    SELECT NVL((SELECT COUNT(*) FROM CITA CIT WHERE TO_CHAR(CIT.FECHA,'DD/MM/YY:HH') = TO_CHAR(:NEW.FECHA,'DD/MM/YY:HH') ),0) INTO NUM_CITAS FROM DUAL;
    
    IF NUM_CITAS >= 3 THEN
       RAISE_APPLICATION_ERROR(-20505, 'NO SE PUEDEN ASIGNAR MAS DE 3 CITAS POR HORA');
    END IF;
    
  NULL;
END;


--PARA NO PERMITIR MAS DE 8 CONSULTAS DE TRATAMIENTOS AL DIA POR DOCTOR Y
-- NO PERMITIR MAS DE 3 DOCTORES REALIZANDO TRATAMIENTO POR HORA (TOMANDO EN CUENTA
-- QUE EN PROMEDIO CADA TRATAMIENTO DURA UNA HORA)

CREATE OR REPLACE TRIGGER CITAS_AL_DIAHORA_POR_MEDICO2
BEFORE INSERT ON CITA_TRATAMIENTO 
FOR EACH ROW 
DECLARE
NUM_CITAS NUMBER := 0;
BEGIN

    SELECT NVL((SELECT COUNT(*) FROM CITA_TRATAMIENTO CIT GROUP BY CIT.CI_MEDICO, TO_CHAR(CIT.FECHA,'DD/MM/YY') 
    HAVING CIT.CI_MEDICO = :NEW.CI_MEDICO AND TO_CHAR(CIT.FECHA,'DD/MM/YY') = TO_CHAR(:NEW.FECHA,'DD/MM/YY') ),0) INTO NUM_CITAS FROM DUAL;
    
    IF NUM_CITAS >= 8 THEN
      RAISE_APPLICATION_ERROR(-20505, 'NO SE PUEDEN ASIGNAR MAS DE 8 CITAS AL DIA POR MEDICO');
    END IF;
    
    NUM_CITAS := 0;
    
    SELECT NVL((SELECT COUNT(*) FROM CITA_TRATAMIENTO CIT WHERE TO_CHAR(CIT.FECHA,'DD/MM/YY:HH') = TO_CHAR(:NEW.FECHA,'DD/MM/YY:HH') ),0) INTO NUM_CITAS FROM DUAL;
    
    IF NUM_CITAS >= 3 THEN
       RAISE_APPLICATION_ERROR(-20505, 'NO SE PUEDEN ASIGNAR MAS DE 3 CITAS POR HORA');
    END IF;
    
    SELECT NVL((
      SELECT COUNT(*) FROM CITA_TRATAMIENTO CTRA JOIN TRATAMIENTO TRA ON CTRA.TRATAMIENTO_ID = TRA.ID 
      WHERE LOWER(TRA.DESCRIPCION) = LOWER('ORTODONCIA') GROUP BY TO_CHAR(CTRA.FECHA,'DD/MM/YY') HAVING
      TO_CHAR(CTRA.FECHA,'DD/MM/YY') = TO_CHAR(:NEW.FECHA,'DD/MM/YY')
    ),0) INTO NUM_CITAS FROM DUAL;
    
    IF NUM_CITAS >= 12 THEN
      RAISE_APPLICATION_ERROR(-20505, 'NO SE PUEDEN ASIGNAR MAS DE 12 CITAS POR DIA POR ORTODONCIA');
    END IF;
    
    IF TO_DATE(:NEW.FECHA,'DD/MM/YYYY') < TO_DATE(SYSDATE,'DD/MM/YYYY') THEN
      RAISE_APPLICATION_ERROR(-20505, 'NO SE PUEDEN ASIGNAR UNA FECHA ANTERIOR A LA ACTUAL');
    END IF;
  NULL;
END;


--CADA VEZ QUE SE AGREGUE UNA TABLA TRATAMIENTO_IMPLEMENTO SE ACTUALIZA LA CANTIDAD DE ESE IMPLEMENTO


CREATE OR REPLACE TRIGGER ACTUALIZAR_INVENTARIO 
BEFORE INSERT OR UPDATE OF CANTIDAD ON TRATAMIENTO_IMPLEMENTO 
FOR EACH ROW 

DECLARE
  COSTO_IN NUMBER;
  CANTIDAD_IN NUMBER;
  ID_IMPLEMENTO_IN NUMBER;
  
BEGIN
  
  IF INSERTING THEN
    
    SELECT IMP.COSTO, IMP.CANTIDAD, IMP.ID  INTO COSTO_IN, CANTIDAD_IN, ID_IMPLEMENTO_IN 
    FROM  IMPLEMENTO IMP WHERE IMP.ID = :NEW.IMPLEMENTO_ID;
    
    IF :NEW.CANTIDAD > CANTIDAD_IN THEN
      RAISE_APPLICATION_ERROR(-20505, 'NO HAY SUFICIENTES IMPLEMENTOS EN EL INVENTARIO');
    ELSE
      UPDATE IMPLEMENTO
      SET CANTIDAD = CANTIDAD-CANTIDAD_IN
      WHERE ID = ID_IMPLEMENTO_IN;
    END IF;
    
    :NEW.COSTO := COSTO_IN;
    
  END IF;
    
  NULL;
END;

-- VERIFICA QUE EL EMPLEADOS NO POSEA DOS CARGOS AL MISMO TIEMPO

CREATE OR REPLACE TRIGGER EMPLEADO_CARGOS 
BEFORE INSERT ON CARGO_EMPLEADO 
FOR EACH ROW 

DECLARE
  NUM_CARGOS NUMBER;
BEGIN
  
  SELECT NVL((
    SELECT COUNT(*) FROM CARGO_EMPLEADO CEMP WHERE CEMP.FECHA_FIN IS NULL GROUP BY CEMP.CI_EMPLEADO HAVING CEMP.CI_EMPLEADO = :NEW.CI_EMPLEADO
  ),0) INTO NUM_CARGOS FROM DUAL;
  IF NUM_CARGOS >= 1 THEN
    RAISE_APPLICATION_ERROR(-20505, 'NO SE PUEDEN ASIGNAR MAS DE 1 CARGO POR EMPLEADO');
  END IF;
  
  :NEW.FECHA_FIN := NULL;
  
  NULL;
END;

*/


/*
----------------------------INSERCION DE FILAS-------------------------------------------

------MEDICO-----

REM INSERTING INTO MEDICO 
SET DEFINE OFF;
INSERT INTO MEDICO VALUES(5686120,'CARLOS PEREZ',TO_DATE('12/10/1955','DD/MM/YYYY'),
'MUNICIPIO GUASIMOS, CURAZAO, VEREDA BELLA VISTA','0426-3757460','V241129833',120);

------PACIENTE------

REM INSERTING INTO PACIENTE
SET DEFINE OFF;
INSERT INTO PACIENTE VALUES(5686121,'ANDRES MEDINA',TO_DATE('12/09/1963'),
'MUNICIPIO GUASIMOS, LA LAGUNA, CALLE MEDINA','0426-5750730','GERENTE GENERAL DEMOCRATA SPORT CLUB');

-----DETALLE_HIS_MED--------

REM INSERTING INTO DETALLE_HIS_MED
SET DEFINE OFF;
INSERT INTO DETALLE_HIS_MED VALUES(ID_DETALLE_HIS_MED.NEXTVAL,'ALERGIA');
INSERT INTO DETALLE_HIS_MED VALUES(ID_DETALLE_HIS_MED.NEXTVAL,'ASMA BRONQUIAL');
INSERT INTO DETALLE_HIS_MED VALUES(ID_DETALLE_HIS_MED.NEXTVAL,'AFECCIONES RESPIRATORIAS');
INSERT INTO DETALLE_HIS_MED VALUES(ID_DETALLE_HIS_MED.NEXTVAL,'AMIGDALITIS');
INSERT INTO DETALLE_HIS_MED VALUES(ID_DETALLE_HIS_MED.NEXTVAL,'CARDIOLOGICO');

-----PACIENTE_HIS_MED-------

REM INSERTING INTO PACIENTE_HIS_MED
SET DEFINE OFF;
INSERT INTO PACIENTE_HIS_MED VALUES(5686121,1,'MANI');
INSERT INTO PACIENTE_HIS_MED VALUES(5686121,1,'POLVO');
INSERT INTO PACIENTE_HIS_MED VALUES(5686121,4,'SIN OBSERVACIONES');


-----ESPECIALIZACION------

REM INSERTING INTO ESPECIALIZACION
SET DEFINE OFF;
INSERT INTO ESPECIALIZACION VALUES(ID_ESPECIALIZACION.NEXTVAL,'PEDIATRA','NIÑOS CON EDADES COMPRENDIDAS ENTRE 3 Y 12 AÑOS');

-----ESPECIALIZACION_MED_EMP-------

REM INSERTING INTO ESPECIALIZACION_MED_EMP
SET DEFINE OFF;
INSERT INTO ESPECIALIZACION_MED_EMP(ID,ID_ESPECIALIZACION,CI_MEDICO) VALUES(ID_ESPECIALIZACION_M_E.NEXTVAL,1,5686120);

-----CITA------

REM INSERTING INTO CITA
SET DEFINE OFF;

INSERT INTO CITA VALUES(ID_CITA.NEXTVAL,'C:\xampp\htdocs\ProyectoFinal\imgs\ANDRESMEDINA.PNG',
SYSDATE,35000,'PERODONTITIS AGUDA',5686121,5686120);
INSERT INTO CITA VALUES(ID_CITA.NEXTVAL,'C:\xampp\htdocs\ProyectoFinal\imgs\ANDRESMEDINA.PNG',
SYSDATE,35000,'PERODONTITIS AGUDA',5686121,5686120);
INSERT INTO CITA VALUES(ID_CITA.NEXTVAL,'C:\xampp\htdocs\ProyectoFinal\imgs\ANDRESMEDINA.PNG',
SYSDATE,35000,'PERODONTITIS AGUDA',5686121,5686120);

INSERT INTO CITA VALUES(ID_CITA.NEXTVAL,'C:\xampp\htdocs\ProyectoFinal\imgs\ANDRESMEDINA.PNG',
TO_DATE('07/12/2016 04:05:00','DD/MM/YY HH:MI:SS'),35000,'PERODONTITIS AGUDA',5686121,5686120);
INSERT INTO CITA VALUES(ID_CITA.NEXTVAL,'C:\xampp\htdocs\ProyectoFinal\imgs\ANDRESMEDINA.PNG',
TO_DATE('07/12/2016 04:05:00','DD/MM/YY HH:MI:SS'),35000,'PERODONTITIS AGUDA',5686121,5686120);
INSERT INTO CITA VALUES(ID_CITA.NEXTVAL,'C:\xampp\htdocs\ProyectoFinal\imgs\ANDRESMEDINA.PNG',
TO_DATE('07/12/2016 04:05:00','DD/MM/YY HH:MI:SS'),35000,'PERODONTITIS AGUDA',5686121,5686120);


----IMPLEMENTO---------
REM INSERTING INTO IMPLEMENTO
SET DEFINE OFF;

INSERT INTO IMPLEMENTO VALUES(ID_IMPLEMENTO.NEXTVAL,'ESPEJO DENTAL','AESCULAP','EXPLORACION BUCAL',5000,12);



------TRATAMIENTO-------
REM INSERTING INTO TRATAMIENTO
SET DEFINE OFF;

INSERT INTO TRATAMIENTO VALUES(ID_TRATAMIENTO.NEXTVAL,500,0.5,'LIMPIEZA BUCAL');


------CITA_TRATAMIENTO-----
REM INSERTING INTO CITA_TRATAMIENTO
SET DEFINE OFF;

INSERT INTO CITA_TRATAMIENTO VALUES(1,1,5686120,TO_DATE('07/12/2016','DD/MM/YYYY'));


------TRATAMIENTO_IMPLEMENTO-------
REM INSERTING INTO TRATAMIENTO_IMPLEMENTO
SET DEFINE OFF;

INSERT INTO TRATAMIENTO_IMPLEMENTO VALUES(1,1,2,0,1,0);

------CARGO----------
REM INSERTING INTO CARGO
SET DEFINE OFF;

INSERT INTO CARGO VALUES(ID_CARGO.NEXTVAL,'ASISTENTE','ASISTENTE DE LOS DOCTORES');
INSERT INTO CARGO VALUES(ID_CARGO.NEXTVAL,'LIMPIEZA','ASEO GENERAL DEL LOCAL');


-----EMPLEADO--------
REM INSERTING INTO EMPLEADO
SET DEFINE OFF;

INSERT INTO EMPLEADO VALUES(5123456,'EDWIN VARGAS',TO_DATE('18/07/1994','DD/MM/YYYY'),'MUNICIPIO GUASIMOS GRANJA EL BARBECHO','0412-341245',50000);


------CARGO_EMPLEADO--------
REM INSERTING INTO EMPLEADO
SET DEFINE OFF;

INSERT INTO CARGO_EMPLEADO VALUES(1,5123456,SYSDATE,SYSDATE);

*/
