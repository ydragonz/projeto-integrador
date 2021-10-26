DROP SCHEMA

IF EXISTS pi;
    CREATE SCHEMA pi COLLATE = utf8_general_ci;
USE pi;

CREATE TABLE curso (
    id_curso INT() UNSIGNED NOT NULL;  
    nom_curso VARCHAR(30);
    PRIMARY KEY(id_curso);
)

CREATE TABLE usuario (
    cod_usuario INT() UNSIGNED NOT NULL;
    id_curso INT();
    nom_usuario VARCHAR(40);
    dtn_usuario DATE();
    sen_usuario VARCHAR(10);
    per_usuario INT();
    sts_usuario BOOL;
    PRIMARY KEY(cod_usuario);
)

CREATE TABLE paciente (
    cod_paciente INT() UNSIGNED NOT NULL;
    nom_paciente VARCHAR(40);
    sex_paciente CHAR(1);

    PRIMARY KEY(cod_paciente);
)


CREATE TABLE exame (
    num_exame INT() UNSIGNED NOT NULL;
    cod_paciente
)




ALTER TABLE usuario ADD FOREIGN KEY (id_curso) REFERENCES curso(id_curso);