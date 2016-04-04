CREATE TABLE tipo_convenio
(
  id_tipo_convenio serial NOT NULL,
  nombre_tipo character varying,
  CONSTRAINT id_tipo_convenio PRIMARY KEY (id_tipo_convenio)
);
INSERT INTO tipo_convenio (id_tipo_convenio,nombre_tipo) VALUES ('1','Vinculación Tecnológica'),('2','Convenio de Subvención');
  
CREATE TABLE especialidad
(
	id_especialidad serial NOT NULL,
	nombre_especialidad character varying,
	CONSTRAINT id_especialidad PRIMARY KEY (id_especialidad)
);
INSERT INTO especialidad (id_especialidad,nombre_especialidad) VALUES ('1','Ing. en Sistemas'),('2','Ing. Electrónica'),('3','Ing. Química'),('4','Ing. Mecánica'),('5','Lic. en Adm. Rural'),('6','Mecatrónica');

CREATE TABLE convenio
(
  id_convenio serial NOT NULL,
  folio character varying,
  nombre_convenio integer references tipo_convenio(id_tipo_convenio),
  empresa character varying,
  descrip character varying,
  especialidad integer references especialidad(id_especialidad),
  representada character varying,
  archivo character varying,
  archivo2 character varying,
  fechafirma character varying,
  fechadesde character varying,
  fechahasta character varying,
  estado boolean,
  CONSTRAINT id_convenio PRIMARY KEY (id_convenio)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE convenio
  OWNER TO extension;