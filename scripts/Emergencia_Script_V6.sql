drop table IF EXISTS ACTIVIDAD;

drop table IF EXISTS ARTICULO;

drop table IF EXISTS CATASTROFE CASCADE;

drop table IF EXISTS CATASTROFE_COMUNA;

drop table IF EXISTS CENTRO_ACOPIO;

drop table IF EXISTS CIUDAD CASCADE;

drop table IF EXISTS COMENTARIO CASCADE;

drop table IF EXISTS COMUNA CASCADE;

drop table IF EXISTS DONACION;

drop table IF EXISTS EVENTO_BENEFICIO CASCADE;

drop table IF EXISTS FONDO CASCADE;

drop table IF EXISTS HISTORIAL_ACCIONES;

drop table IF EXISTS MEDIDA CASCADE;

drop table IF EXISTS ORGANIZACION CASCADE;

drop table IF EXISTS PERMISO CASCADE;

drop table IF EXISTS PRODUCTO;

drop table IF EXISTS REGION;

drop table IF EXISTS RNV CASCADE;

drop table IF EXISTS RNV_MEDIDA;

drop table IF EXISTS ROL CASCADE;

drop table IF EXISTS TIENE_RP;

drop table IF EXISTS USUARIO CASCADE;

drop table IF EXISTS USUARIO_FONDO;

drop table IF EXISTS USUARIO_MEDIDA;

drop table IF EXISTS USUARIO_RNV;

drop table IF EXISTS VOLUNTARIADO;

/*==============================================================*/
/* Table: ACTIVIDAD                                             */
/*==============================================================*/
create table ACTIVIDAD (
   ID_ACTIVIDAD         SERIAL               not null,
   ID_EVENTO            INT4                 not null,
   TIPO_ACTIVIDAD       VARCHAR(64)          not null,
   DESCRIPCION          VARCHAR(256)         null,
   constraint PK_ACTIVIDAD primary key (ID_ACTIVIDAD)
);

/*==============================================================*/
/* Table: ARTICULO                                              */
/*==============================================================*/
create table ARTICULO (
   ID_ARTICULO          SERIAL               not null,
   ID_CENTRO            INT4                 not null,
   NOMBRE               VARCHAR(48)          not null,
   TIPO                 VARCHAR(20)          not null,
   CANTIDAD             INT4                 not null,
   DESCRIPCION          VARCHAR(256)         null,
   constraint PK_ARTICULO primary key (ID_ARTICULO)
);

/*==============================================================*/
/* Table: CATASTROFE                                            */
/*==============================================================*/
create table CATASTROFE (
   ID_CATASTROFE        SERIAL               not null,
   ID_USER              INT4                 not null,
   TIPO                 VARCHAR(20)          not null,
   FECHA                DATE                 not null,
   constraint PK_CATASTROFE primary key (ID_CATASTROFE)
);

/*==============================================================*/
/* Table: CATASTROFE_COMUNA                                     */
/*==============================================================*/
create table CATASTROFE_COMUNA (
   ID_CATASTROFE        INT4                 not null,
   ID_COMUNA            INT4                 not null,
   constraint PK_CATASTROFE_COMUNA primary key (ID_CATASTROFE, ID_COMUNA)
);

/*==============================================================*/
/* Table: CENTRO_ACOPIO                                         */
/*==============================================================*/
create table CENTRO_ACOPIO (
   ID_CENTRO            SERIAL               not null,
   ID_MEDIDA            INT4                 not null,
   NOMBRE               VARCHAR(48)          not null,
   DESCRIPCION          VARCHAR(256)         null,
   SITUACION            VARCHAR(128)         null,
   constraint PK_CENTRO_ACOPIO primary key (ID_CENTRO)
);

/*==============================================================*/
/* Table: CIUDAD                                                */
/*==============================================================*/
create table CIUDAD (
   ID_CIUDAD            SERIAL               not null,
   ID_REGION            INT4                 not null,
   NOMBRE               VARCHAR(48)          not null,
   constraint PK_CIUDAD primary key (ID_CIUDAD)
);

/*==============================================================*/
/* Table: COMENTARIO                                            */
/*==============================================================*/
create table COMENTARIO (
   ID_COMENTARIO        SERIAL               not null,
   ID_USER              INT4                 not null,
   ID_MEDIDA            INT4                 not null,
   COMENTARIO           VARCHAR(256)         not null,
   constraint PK_COMENTARIO primary key (ID_COMENTARIO)
);

/*==============================================================*/
/* Table: COMUNA                                                */
/*==============================================================*/
create table COMUNA (
   ID_COMUNA            SERIAL               not null,
   ID_CIUDAD            INT4                 not null,
   NOMBRE               VARCHAR(48)          not null,
   constraint PK_COMUNA primary key (ID_COMUNA)
);

/*==============================================================*/
/* Table: DONACION                                              */
/*==============================================================*/
create table DONACION (
   ID_DONACION          SERIAL               not null,
   ID_USER              INT4                 not null,
   ID_FONDOS            INT4                 not null,
   MONTO                INT4                 not null,
   constraint PK_DONACION primary key (ID_DONACION)
);

/*==============================================================*/
/* Table: EVENTO_BENEFICIO                                      */
/*==============================================================*/
create table EVENTO_BENEFICIO (
   ID_EVENTO            SERIAL               not null,
   ID_CIUDAD            INT4                 not null,
   ID_MEDIDA            INT4                 not null,
   TIPO                 VARCHAR(20)          not null,
   constraint PK_EVENTO_BENEFICIO primary key (ID_EVENTO)
);

/*==============================================================*/
/* Table: FONDO                                                 */
/*==============================================================*/
create table FONDO (
   ID_FONDOS            SERIAL               not null,
   NOMBRE               VARCHAR(128)         not null,
   DESCRIPCION          VARCHAR(255)         null,
   FECHA_INICIO         DATE                 not null,
   FECHA_TERMINO        DATE                 null,
   MONTO                INT4                 not null,
   BANCO                VARCHAR(48)          not null,
   CUENTA               VARCHAR(18)          not null,
   constraint PK_FONDO primary key (ID_FONDOS)
);

/*==============================================================*/
/* Table: HISTORIAL_ACCIONES                                    */
/*==============================================================*/
create table HISTORIAL_ACCIONES (
   ID_ACCION            SERIAL               not null,
   ID_USER              INT4                 null,
   FECHA                TIMESTAMP            not null,
   ID_TABLA             VARCHAR(80)          not null,
   NOMBRE_TABLA         VARCHAR(128)         null,
   PREVIOUS_STATE       VARCHAR(255)         null,
   ACTUAL_STATE         VARCHAR(255)         null,
   constraint PK_HISTORIAL_ACCIONES primary key (ID_ACCION)
);

/*==============================================================*/
/* Table: MEDIDA                                                */
/*==============================================================*/
create table MEDIDA (
   ID_MEDIDA            SERIAL               not null,
   ID_COMUNA            INT4                 not null,
   ID_USER              INT4                 not null,
   NOMBRE               VARCHAR(48)          not null,
   DESCRIPCION          VARCHAR(256)         not null,
   DIRECCION            VARCHAR(100)         not null,
   FECHA_INICIO         DATE                 null,
   FECHA_TERMINO        DATE                 null,
   constraint PK_MEDIDA primary key (ID_MEDIDA)
);

/*==============================================================*/
/* Table: ORGANIZACION                                          */
/*==============================================================*/
create table ORGANIZACION (
   ID_ORGANIZACION      SERIAL               not null,
   NOMBRE               VARCHAR(48)          not null,
   DESCRIPCION          VARCHAR(256)         null,
   constraint PK_ORGANIZACION primary key (ID_ORGANIZACION)
);

/*==============================================================*/
/* Table: PERMISO                                               */
/*==============================================================*/
create table PERMISO (
   ID_PERMISO           SERIAL               not null,
   NOMBRE               VARCHAR(48)          not null,
   constraint PK_PERMISO primary key (ID_PERMISO)
);

/*==============================================================*/
/* Table: PRODUCTO                                              */
/*==============================================================*/
create table PRODUCTO (
   ID_PRODUCTO          SERIAL               not null,
   ID_EVENTO            INT4                 not null,
   NOMBRE               VARCHAR(48)          not null,
   STOCK                INT4                 not null,
   PRECIO               INT4                 not null,
   DESCRIPCION          VARCHAR(256)         null,
   constraint PK_PRODUCTO primary key (ID_PRODUCTO)
);

/*==============================================================*/
/* Table: REGION                                                */
/*==============================================================*/
create table REGION (
   ID_REGION            SERIAL               not null,
   NOMBRE               VARCHAR(48)          not null,
   constraint PK_REGION primary key (ID_REGION)
);

/*==============================================================*/
/* Table: RNV                                                   */
/*==============================================================*/
create table RNV (
   ID_VOLUNTARIO        SERIAL               not null,
   RUT                  VARCHAR(12)          not null,
   DISPONIBLE           BOOL                 not null,
   constraint PK_RNV primary key (ID_VOLUNTARIO)
);

/*==============================================================*/
/* Table: RNV_MEDIDA                                            */
/*==============================================================*/
create table RNV_MEDIDA (
   ID_VOLUNTARIO        INT4                 not null,
   ID_MEDIDA            INT4                 not null,
   constraint PK_RNV_MEDIDA primary key (ID_VOLUNTARIO, ID_MEDIDA)
);

/*==============================================================*/
/* Table: ROL                                                   */
/*==============================================================*/
create table ROL (
   ID_ROL               SERIAL               not null,
   NOMBRE_ROL           VARCHAR(24)          not null,
   constraint PK_ROL primary key (ID_ROL)
);

/*==============================================================*/
/* Table: TIENE_RP                                              */
/*==============================================================*/
create table TIENE_RP (
   ID_ROL               INT4                 not null,
   ID_PERMISO           INT4                 not null,
   constraint PK_TIENE_RP primary key (ID_ROL, ID_PERMISO)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO (
   ID_USER              SERIAL               not null,
   ID_ROL               INT4                 not null,
   ID_ORGANIZACION      INT4                 null,
   RUT                  VARCHAR(12)          not null,
   NOMBRE               VARCHAR(48)          not null,
   APELLIDO             VARCHAR(48)          not null,
   FECHA_NACIMIENTO     DATE                 not null,
   ES_ACTIVO            BOOL                 not null,
   constraint PK_USUARIO primary key (ID_USER)
);

/*==============================================================*/
/* Table: USUARIO_FONDO                                         */
/*==============================================================*/
create table USUARIO_FONDO (
   ID_USER              INT4                 not null,
   ID_FONDOS            INT4                 not null,
   constraint PK_USUARIO_FONDO primary key (ID_USER, ID_FONDOS)
);

/*==============================================================*/
/* Table: USUARIO_MEDIDA                                        */
/*==============================================================*/
create table USUARIO_MEDIDA (
   ID_USER              INT4                 not null,
   ID_MEDIDA            INT4                 not null,
   constraint PK_USUARIO_MEDIDA primary key (ID_USER, ID_MEDIDA)
);

/*==============================================================*/
/* Table: USUARIO_RNV                                           */
/*==============================================================*/
create table USUARIO_RNV (
   ID_USER              INT4                 not null,
   ID_VOLUNTARIO        INT4                 not null,
   constraint PK_USUARIO_RNV primary key (ID_USER, ID_VOLUNTARIO)
);

/*==============================================================*/
/* Table: VOLUNTARIADO                                          */
/*==============================================================*/
create table VOLUNTARIADO (
   ID_VOLUNTARIADO      SERIAL               not null,
   ID_CIUDAD            INT4                 not null,
   ID_MEDIDA            INT4                 not null,
   CANTIDAD_VOLUNTARIOS INT4                 not null,
   LABOR                VARCHAR(20)          not null,
   constraint PK_VOLUNTARIADO primary key (ID_VOLUNTARIADO)
);

alter table ACTIVIDAD
   add constraint FK_ACTIVIDA_SE_REALIZ_EVENTO_B foreign key (ID_EVENTO)
      references EVENTO_BENEFICIO (ID_EVENTO)
      on delete restrict on update restrict;

alter table ARTICULO
   add constraint FK_ARTICULO_RECIBE_CENTRO_A foreign key (ID_CENTRO)
      references CENTRO_ACOPIO (ID_CENTRO)
      on delete restrict on update restrict;

alter table CATASTROFE
   add constraint FK_CATASTRO_DECLARA_USUARIO foreign key (ID_USER)
      references USUARIO (ID_USER)
      on delete restrict on update restrict;

alter table CATASTROFE_COMUNA
   add constraint FK_CATASTRO_SUCEDE_CATASTRO foreign key (ID_CATASTROFE)
      references CATASTROFE (ID_CATASTROFE)
      on delete restrict on update restrict;

alter table CATASTROFE_COMUNA
   add constraint FK_CATASTRO_SUCEDE2_COMUNA foreign key (ID_COMUNA)
      references COMUNA (ID_COMUNA)
      on delete restrict on update restrict;

alter table CENTRO_ACOPIO
   add constraint FK_CENTRO_A_REFERENCE_MEDIDA foreign key (ID_MEDIDA)
      references MEDIDA (ID_MEDIDA)
      on delete restrict on update restrict;

alter table CIUDAD
   add constraint FK_CIUDAD_UBICADA_REGION foreign key (ID_REGION)
      references REGION (ID_REGION)
      on delete restrict on update restrict;

alter table COMENTARIO
   add constraint FK_COMENTAR_ESCRIBE_USUARIO foreign key (ID_USER)
      references USUARIO (ID_USER)
      on delete restrict on update restrict;

alter table COMENTARIO
   add constraint FK_COMENTAR_REALIZADO_MEDIDA foreign key (ID_MEDIDA)
      references MEDIDA (ID_MEDIDA)
      on delete restrict on update restrict;

alter table COMUNA
   add constraint FK_COMUNA_PERTENECE_CIUDAD foreign key (ID_CIUDAD)
      references CIUDAD (ID_CIUDAD)
      on delete restrict on update restrict;

alter table DONACION
   add constraint FK_DONACION_AGREGA_FONDO foreign key (ID_FONDOS)
      references FONDO (ID_FONDOS)
      on delete restrict on update restrict;

alter table DONACION
   add constraint FK_DONACION_EFECTUA_USUARIO foreign key (ID_USER)
      references USUARIO (ID_USER)
      on delete restrict on update restrict;

alter table EVENTO_BENEFICIO
   add constraint FK_EVENTO_B_OCURRE_CE_CIUDAD foreign key (ID_CIUDAD)
      references CIUDAD (ID_CIUDAD)
      on delete restrict on update restrict;

alter table EVENTO_BENEFICIO
   add constraint FK_EVENTO_B_REFERENCE_MEDIDA foreign key (ID_MEDIDA)
      references MEDIDA (ID_MEDIDA)
      on delete restrict on update restrict;

alter table HISTORIAL_ACCIONES
   add constraint FK_HISTORIA_TIENE_UH_USUARIO foreign key (ID_USER)
      references USUARIO (ID_USER)
      on delete restrict on update restrict;

alter table MEDIDA
   add constraint FK_MEDIDA_REFERENCE_COMUNA foreign key (ID_COMUNA)
      references COMUNA (ID_COMUNA)
      on delete restrict on update restrict;

alter table MEDIDA
   add constraint FK_MEDIDA_REFERENCE_USUARIO foreign key (ID_USER)
      references USUARIO (ID_USER)
      on delete restrict on update restrict;

alter table PRODUCTO
   add constraint FK_PRODUCTO_VENDE_EVENTO_B foreign key (ID_EVENTO)
      references EVENTO_BENEFICIO (ID_EVENTO)
      on delete restrict on update restrict;

alter table RNV_MEDIDA
   add constraint FK_RNV_MEDI_REFERENCE_RNV foreign key (ID_VOLUNTARIO)
      references RNV (ID_VOLUNTARIO)
      on delete restrict on update restrict;

alter table RNV_MEDIDA
   add constraint FK_RNV_MEDI_REFERENCE_MEDIDA foreign key (ID_MEDIDA)
      references MEDIDA (ID_MEDIDA)
      on delete restrict on update restrict;

alter table TIENE_RP
   add constraint FK_TIENE_RP_TIENE_RP_ROL foreign key (ID_ROL)
      references ROL (ID_ROL)
      on delete restrict on update restrict;

alter table TIENE_RP
   add constraint FK_TIENE_RP_TIENE_RP2_PERMISO foreign key (ID_PERMISO)
      references PERMISO (ID_PERMISO)
      on delete restrict on update restrict;

alter table USUARIO
   add constraint FK_USUARIO_REFERENCE_ROL foreign key (ID_ROL)
      references ROL (ID_ROL)
      on delete restrict on update restrict;

alter table USUARIO
   add constraint FK_USUARIO_REFERENCE_ORGANIZA foreign key (ID_ORGANIZACION)
      references ORGANIZACION (ID_ORGANIZACION)
      on delete restrict on update restrict;

alter table USUARIO_FONDO
   add constraint FK_USUARIO__ADMINISTR_USUARIO foreign key (ID_USER)
      references USUARIO (ID_USER)
      on delete restrict on update restrict;

alter table USUARIO_FONDO
   add constraint FK_USUARIO__ADMINISTR_FONDO foreign key (ID_FONDOS)
      references FONDO (ID_FONDOS)
      on delete restrict on update restrict;

alter table USUARIO_MEDIDA
   add constraint FK_USUARIO__GENERA_USUARIO foreign key (ID_USER)
      references USUARIO (ID_USER)
      on delete restrict on update restrict;

alter table USUARIO_MEDIDA
   add constraint FK_USUARIO__REFERENCE_MEDIDA foreign key (ID_MEDIDA)
      references MEDIDA (ID_MEDIDA)
      on delete restrict on update restrict;

alter table USUARIO_RNV
   add constraint FK_USUARIO__COMUNICA_USUARIO foreign key (ID_USER)
      references USUARIO (ID_USER)
      on delete restrict on update restrict;

alter table USUARIO_RNV
   add constraint FK_USUARIO__COMUNICA2_RNV foreign key (ID_VOLUNTARIO)
      references RNV (ID_VOLUNTARIO)
      on delete restrict on update restrict;

alter table VOLUNTARIADO
   add constraint FK_VOLUNTAR_OCURRE_VC_CIUDAD foreign key (ID_CIUDAD)
      references CIUDAD (ID_CIUDAD)
      on delete restrict on update restrict;

alter table VOLUNTARIADO
   add constraint FK_VOLUNTAR_REFERENCE_MEDIDA foreign key (ID_MEDIDA)
      references MEDIDA (ID_MEDIDA)
      on delete restrict on update restrict;

