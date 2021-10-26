DROP SCHEMA

IF EXISTS pi;
    CREATE SCHEMA pi COLLATE = utf8_general_ci;
USE pi;

CREATE TABLE curso (
    id_curso INT AUTO_INCREMENT, 
    nom_curso VARCHAR(30),
    PRIMARY KEY(id_curso)
);

CREATE TABLE usuario (
    cod_usuario INT AUTO_INCREMENT, 
    id_curso INT, 
    nom_usuario VARCHAR(40), 
    dtn_usuario DATE, 
    sen_usuario VARCHAR(10), 
    per_usuario INT, 
    sts_usuario TINYINT(1),
    PRIMARY KEY(cod_usuario)
);

CREATE TABLE paciente (
    cod_paciente INT AUTO_INCREMENT, 
    nom_paciente VARCHAR(40), 
    sex_paciente CHAR(1), 
    end_paciente VARCHAR(40), 
    bai_paciente VARCHAR(25), 
    com_paciente VARCHAR(15), 
    cep_paciente VARCHAR(8), 
    cid_paciente VARCHAR(35), 
    uf_paciente VARCHAR(2), 
    dtn_paciente DATE, 
    fone_paciente VARCHAR(10), 
    email_paciente VARCHAR(50), 
    pes_paciente NUMERIC(4,1), 
    alt_paciente NUMERIC(3,2), 
    fuma_paciente TINYINT(1), 
    bebe_paciente TINYINT(1), 
    hiper_paciente TINYINT(1), 
    diab_paciente TINYINT(1), 
    dac_paciente TINYINT(1), 
    doe_paciente VARCHAR(100), 
    med_paciente TINYINT(1), 
    rem_paciente VARCHAR(100),
    PRIMARY KEY(cod_paciente)
);

CREATE TABLE exame (
    num_exame INT AUTO_INCREMENT,
    cod_paciente INT,
    cod_usuario INT,
    dta_exame DATE,
    pad_exame INT,
    pas_exame INT,
    gli_exame INT,
    col_exame INT,
    PRIMARY KEY(num_exame)
);

ALTER TABLE usuario ADD FOREIGN KEY (id_curso) REFERENCES curso(id_curso);
ALTER TABLE exame ADD FOREIGN KEY (cod_paciente) REFERENCES paciente(cod_paciente);
ALTER TABLE exame ADD FOREIGN KEY (cod_usuario) REFERENCES usuario(cod_usuario);
