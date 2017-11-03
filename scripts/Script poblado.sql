INSERT INTO ORGANIZACION (nombre, descripcion)
	VALUES ('H&K Ltda.', 'Organización dedicada a abreviar elementos.'),
	('Pear Industries', 'Organización encargada de evaluar actividades de universitarios.');
	
INSERT INTO ORGANIZACION (nombre)
	VALUES ('NoDesc Enterprise');

INSERT INTO RNV (rut, disponible)
	VALUES ('12.558.932-7', TRUE),
	('17.623.957-2', TRUE),
	('6.325.713-K', FALSE),
	('20.314.683-0', TRUE);

INSERT INTO ROL (nombre_rol)
	VALUES ('Gobierno'),
	('Organización'),
	('Usuario natural');

INSERT INTO PERMISO (nombre)
	VALUES ('Visualizar datos'),
	('Declarar catástrofes'),
	('Generar medidas'),
	('Participar en medida');

INSERT INTO TIENE_RP VALUES
	(1, 1),
	(1, 2),
	(2, 1),
	(2, 3),
	(3, 1),
	(3, 4);

INSERT INTO USUARIO (id_rol, id_organizacion, rut, nombre, apellido, fecha_nacimiento, es_Activo)
	VALUES 
	(2, 1, '2.131.283-7', 'Theodor', 'Heckler', '1906-05-13', FALSE),
	(2, 2, '14.633.782-K', 'Javier', 'Salas', '1980-11-21', TRUE),
	(2, 3, '22.812.997-2', 'Mathew', 'Counaghen', '1976-02-04', TRUE);

INSERT INTO USUARIO (id_rol, rut, nombre, apellido, fecha_nacimiento, es_Activo)
	VALUES (1, '1.000.101-1', 'G', 'Man', '1900-01-01', TRUE),
	(1, '15.132.154-9', 'Aldo', 'Contreras', '1981-03-22', TRUE),
	(3, '19.258.944-7', 'Daniela', 'Rojas', '1995-09-22', TRUE),
	(3, '18.298.953-K', 'Marcia', 'Rodriguez', '1993-12-12', TRUE);

INSERT INTO USUARIO_RNV VALUES
	(1, 2),
	(1, 3);

INSERT INTO FONDO (nombre, descripcion, fecha_inicio, fecha_termino, monto, banco, cuenta)
	VALUES ('Fondo jóvenes gritones', 'Fondo para ayudar a jóvenes a ser silenciosos', '2000-03-01', '2020-01-01', 95000000, 'Banco de Chile', '591.239.381-7'),
	('Fondo GMP', 'Fondo para financiar ayudas personalizadas', '2017-03-31', '2017-10-31', 10000, 'Banco Estado', '19.368.012'),
	('Fondo limpieza playa', 'Fondo para ayudar a limpiar restos del desastre ocurrido en la costa', '2017-11-2', '2018-04-01', 5000000, 'Banco Santander', '312.541.321-077');

INSERT INTO DONACION (id_user, id_fondos, monto)
	VALUES (6, 1, 25000),
	(6, 2, 30000),
	(7, 3, 150000);

INSERT INTO USUARIO_FONDO VALUES
	(2, 1),
	(2, 2),
	(3, 2),
	(3, 3);

INSERT INTO REGION (nombre)
	VALUES ('Tarapacá'),
	('Antofagasta'),
	('Atacama'),
	('Coquimbo'),
	('Valparaíso'),
	('O''Higgins'),
	('Maule'),
	('Biobío'),
	('Araucanía'),
	('Los Lagos'),
	('Aysén'),
	('Magallanes'),
	('Metropolitana de Santiago'),
	('Los Ríos'),
	('Arica y Parinacota');

INSERT INTO CIUDAD (id_region, nombre)
	VALUES (13, 'Santiago'),
	(6, 'Rancagua'),
	(8, 'Concepcion'),
	(4, 'La Serena'),
	(12, 'Punta Arenas'),
	(5, 'San Antonio');

INSERT INTO COMUNA (id_ciudad, nombre)
	VALUES (1, 'Providencia'),
	(2, 'Graneros'),
	(3, 'Chiguayante'),
	(4, 'Vicuña'),
	(5, 'Punta Arenas'),
	(6, 'Cartagena');

INSERT INTO CATASTROFE (id_user, tipo, fecha)
	VALUES (4, 'Terremoto', '2017-10-10'),
	(4, 'Maremoto', '2016-03-15'),
	(5, 'Incendio', '2013-09-13');

INSERT INTO CATASTROFE_COMUNA VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 6),
	(2, 3),
	(2, 6),
	(3, 4);

INSERT INTO MEDIDA (id_comuna, id_user, nombre, descripcion, direccion, fecha_inicio, fecha_termino)
	VALUES (1, 1, 'Medida de Evento a Beneficio', 'Evento a beneficio para la gente afectada por los incendios',
			'Avenida Manuel Montt 2077', '2017-10-31', '2017-11-4'),
	(4, 2, 'Llamado a Voluntariado', 'Solicitud de voluntariado por los daños que dejaron los incendios',
		'Pasaje Gabriela Mistral 223', '2017-10-15', '2017-11-30'),
	(4, 3, 'Activación de centro de acopio', 'Solicitud de alimentos para las familias cuyos hogares fueron destruidos',
		'Ruta G-27 Km. 78', '2017-10-15', '2017-11-30'),
	(6, 3, 'Activación de centro de acopio', 'Solicitud de donaciones para las familias afectadas por el maremoto',
		'Calle Playa Ancha 432', '2016-03-17', '2016-12-01');

INSERT INTO COMENTARIO (id_user, id_medida, comentario)
	VALUES (6, 1, 'A qué hora comienza?? Voy de todas formas!'),
	(6, 2, 'Vamos x Vicuña!!'),
	(7, 1, '#ChaoIncendios, ojala se pase bn!');

INSERT INTO USUARIO_MEDIDA VALUES
	(6, 1),
	(6, 2),
	(7, 1),
	(7, 3);

INSERT INTO RNV_MEDIDA VALUES
	(3, 1),
	(2, 2);

INSERT INTO CENTRO_ACOPIO (id_medida, nombre, descripcion, situacion)
	VALUES (3, 'Centro de acopio Nuestra Señora del Carmen', 'Centro de Acopio donde se pueden recibir ropas y alimentos de todo tipo', 'Solicitando alimento no perecible'),
	(4, 'Centro de acopio del laboratorio Playa Ancha', 'Centro de Acopio que puede manejar tanto ropaje como medicamentos', 'Medicamentos suficientes, poca ropa restante');

INSERT INTO ARTICULO (id_centro, nombre, tipo, cantidad, descripcion)
	VALUES (1, 'Frazada 2 plazas', 'Ropa de cama', 20, 'En buen estado, usadas'),
	(1, 'Polera niño talla 12', 'Ropa', 30, 'Nueva, sellada'),
	(1, 'Tomate', 'Alimento perecible', 350, 'Recibido el 10 de Octubre de 2017 y almacenado para su distribución'),
	(1, 'Fideos', 'Alim no perecible', 10, 'Envases de 500g'),
	(2, 'Clorfenamina', 'Medicamento', 100, '10 pastillas por grupo'),
	(2, 'Ibuprofeno', 'Medicamento', 250, '15 pastillas de 400mg'),
	(2, 'Epinefrina', 'Inyección', 150, 'Inyección almacenada para casos específicos, no debe ser entregada'),
	(2, 'Pantalón adulto talla M', 'Ropa', 5, 'En estado aceptable, usado y con ligero desgaste');

INSERT INTO VOLUNTARIADO (id_ciudad, id_medida, cantidad_voluntarios, labor)
	VALUES (4, 2, 100, 'Construcción');

INSERT INTO EVENTO_BENEFICIO (id_ciudad, id_medida, tipo)
	VALUES (1, 1, 'Cena bailable');

INSERT INTO ACTIVIDAD (id_evento, tipo_actividad, descripcion)
	VALUES (1, 'Venta', 'Venta de artículos de conmemoración por el evento'),
	(1, 'Servicio alimentación', 'Venta de comida correspondiente a una cena para adultos');

INSERT INTO PRODUCTO (id_evento, nombre, stock, precio, descripcion)
	VALUES (1, 'Lomo a lo pobre', 100, 8000, 'Plato de lomo a lo pobre para servir durante la cena'),
	(1, 'Carne mechada con papas duquesa', 50, 6000, 'Plato de carne mechada de vacuno con acompañamiento de papas duquesa'),
	(1, 'Pisco Sour', 300, 1500, 'Copa de Pisco Sour'),
	(1, 'Botella Casillero del Diablo', 50, 10000, 'Botella donada con etiqueta especial por el evento');