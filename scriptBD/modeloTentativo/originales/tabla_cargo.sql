CREATE table cargo(
	codigo tinyint unsigned auto_increment primary key,
	descripcion varchar(50) not null,
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null,
	fec_mod timestamp not null
);

INSERT INTO cargo values
	(1, 'Sin cargo asociado', 1, 1, null, 1, current_timestamp),
	(2, 'Director(a)', 1, 1, null, 1, current_timestamp),
	(3, 'Sub-Director(a)', 1, 1, null, 1, current_timestamp),
	(4, 'Coordinador(a)', 1, 1, null, 1, current_timestamp),
	(5, 'Asistente', 1, 1, null, 1, current_timestamp),
	(6, 'Docente', 1, 1, null, 1, current_timestamp),
	(7, 'Especialista', 1, 1, null, 1, current_timestamp),
	(8, 'Auxiliar', 1, 1, null, 1, current_timestamp)
;
