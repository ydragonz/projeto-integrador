CREATE DATABASE IF NOT EXISTS pi_db;
USE pi_db;


CREATE TABLE cursos (
    id_curso INT(4) AUTO_INCREMENT, 
    nom_curso VARCHAR(30) NOT NULL,
    PRIMARY KEY(id_curso)
);

CREATE TABLE usuarios (
    cod_usuario INT(6) AUTO_INCREMENT, 
    id_curso INT(4), 
    nom_usuario VARCHAR(40) NOT NULL, 
    dtn_usuario DATE NOT NULL, 
    sen_usuario VARCHAR(32) NOT NULL, 
    per_usuario TINYINT(1) NOT NULL, 
    sts_usuario TINYINT(1) NOT NULL,
    PRIMARY KEY(cod_usuario)
);

CREATE TABLE pacientes (
    cod_paciente INT(8) AUTO_INCREMENT, 
    nom_paciente VARCHAR(40) NOT NULL, 
    sex_paciente CHAR(1) NOT NULL, 
    end_paciente VARCHAR(40) NOT NULL, 
    bai_paciente VARCHAR(25) NOT NULL, 
    com_paciente VARCHAR(15), 
    cep_paciente VARCHAR(8) NOT NULL,  
    cid_paciente VARCHAR(35) NOT NULL,
    uf_paciente VARCHAR(2) NOT NULL, 
    dtn_paciente DATE NOT NULL, 
    fone_paciente VARCHAR(11), 
    email_paciente VARCHAR(50), 
    pes_paciente NUMERIC(4,1) NOT NULL,  
    alt_paciente NUMERIC(3,2) NOT NULL, 
    fuma_paciente TINYINT(1) NOT NULL, 
    bebe_paciente TINYINT(1) NOT NULL, 
    hiper_paciente TINYINT(1) NOT NULL, 
    diab_paciente TINYINT(1) NOT NULL, 
    dac_paciente TINYINT(1) NOT NULL, 
    doe_paciente VARCHAR(100), 
    med_paciente TINYINT(1) NOT NULL, 
    rem_paciente VARCHAR(100),
    PRIMARY KEY(cod_paciente)
);

CREATE TABLE exames (
    num_exame INT(10) AUTO_INCREMENT,
    cod_paciente INT(8),
    cod_usuario INT(6),
    dta_exame DATE NOT NULL,
    pad_exame INT(11) NOT NULL,
    pas_exame INT(11) NOT NULL,
    gli_exame INT(11) NOT NULL,
    col_exame INT(11) NOT NULL,
    PRIMARY KEY(num_exame)
);

ALTER TABLE usuarios ADD FOREIGN KEY (id_curso) REFERENCES cursos(id_curso);
ALTER TABLE exames ADD FOREIGN KEY (cod_paciente) REFERENCES pacientes(cod_paciente);
ALTER TABLE exames ADD FOREIGN KEY (cod_usuario) REFERENCES usuarios(cod_usuario);