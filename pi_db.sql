CREATE DATABASE IF NOT EXISTS pi_db;
USE pi_db;


CREATE TABLE curso (
    id_curso INT(11) AUTO_INCREMENT, 
    nom_curso VARCHAR(30) NOT NULL,
    PRIMARY KEY(id_curso)
);

CREATE TABLE usuario (
    cod_usuario INT(11) AUTO_INCREMENT, 
    id_curso INT(11) NOT NULL, 
    nom_usuario VARCHAR(40) NOT NULL, 
    dtn_usuario DATE NOT NULL, 
    sen_usuario VARCHAR(10) NOT NULL, 
    per_usuario INT(11) NOT NULL, 
    sts_usuario TINYINT(1) NOT NULL,
    PRIMARY KEY(cod_usuario)
);

CREATE TABLE paciente (
    cod_paciente INT(11) AUTO_INCREMENT, 
    nom_paciente VARCHAR(40) NOT NULL, 
    sex_paciente CHAR(1) NOT NULL, 
    end_paciente VARCHAR(40) NOT NULL, 
    bai_paciente VARCHAR(25) NOT NULL, 
    com_paciente VARCHAR(15) NOT NULL, 
    cep_paciente VARCHAR(8) NOT NULL,  
    cid_paciente VARCHAR(35) NOT NULL,
    uf_paciente VARCHAR(2) NOT NULL, 
    dtn_paciente DATE NOT NULL, 
    fone_paciente VARCHAR(10) NOT NULL, 
    email_paciente VARCHAR(50) NOT NULL, 
    pes_paciente NUMERIC(4,1) NOT NULL,  
    alt_paciente NUMERIC(3,2) NOT NULL, 
    fuma_paciente TINYINT(1) NOT NULL, 
    bebe_paciente TINYINT(1) NOT NULL, 
    hiper_paciente TINYINT(1) NOT NULL, 
    diab_paciente TINYINT(1) NOT NULL, 
    dac_paciente TINYINT(1) NOT NULL, 
    doe_paciente VARCHAR(100) NOT NULL, 
    med_paciente TINYINT(1) NOT NULL, 
    rem_paciente VARCHAR(100) NOT NULL,
    PRIMARY KEY(cod_paciente)
);

CREATE TABLE exame (
    num_exame INT(11) AUTO_INCREMENT,
    cod_paciente INT(11) NOT NULL,
    cod_usuario INT(11) NOT NULL,
    dta_exame DATE NOT NULL,
    pad_exame INT(11) NOT NULL,
    pas_exame INT(11) NOT NULL,
    gli_exame INT(11) NOT NULL,
    col_exame INT(11) NOT NULL,
    PRIMARY KEY(num_exame)
);

ALTER TABLE usuario ADD FOREIGN KEY (id_curso) REFERENCES curso(id_curso);
ALTER TABLE exame ADD FOREIGN KEY (cod_paciente) REFERENCES paciente(cod_paciente);
ALTER TABLE exame ADD FOREIGN KEY (cod_usuario) REFERENCES usuario(cod_usuario);
