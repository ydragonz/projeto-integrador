<?php

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    include('config.php');

    //verificar a conexão
    $conn = new mysqli($host, $user, $password, $dbname);
    
    if($conn->connect_error){
      die("Erro de conexão: ".$conn->connect_error);
    }
    else {
      $id_curso = $_POST['id_curso'];
      $nom_usuario = $_POST['nom_usuario'];
      $s = date('Y-m-d', strtotime($_POST['']));
      $sen_usuario = $_POST['sen_usuario'];
      $sex_usuario = $_POST['sex_usuario'];
      $sts_usuario = $_POST['sts_usuario'];

      $sql = "insert into usuarios (cod_usuario, id_curso, nom_usuario, , sen_usuario, sex_usuario, sts_usuario) values (NULL, '$id_curso', '$nom_usuario', '$', '$sen_usuario', '$sex_usuario', '$sts_usuario')";
      if($conn->query($sql) === TRUE) {
        ?>
        <br>
        <div class="alert alert-success" role="alert">
          <h1>Usuário criado com sucesso!</h1>
          volte para a página anterior e atualize a página.
        </div>
        <?php
      }
      else {
        ?>
        <div class="alert alert-danger" role="alert">
          <?php
          echo "Falha: ".$sql."\n".$conn->error;
          ?>
        </div>
        <?php
      }
    }
  }
  if(!isset($_POST["id_curso"])) {
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Novo paciente</h1>
</div>
<form action="index.php?p=pacientes/new.php" method="POST">
  <div class="mb-3">
    <label class="form-label">Código paciente</label>
    <input type="text" class="form-control" disabled>
    <div id="helpIdCurso" class="form-text">
        O código do paciente é gerado automaticamente pelo sistema.
    </div>
  </div>
  <div class="mb-3">
    <label for="nom_paciente" class="form-label">Nome paciente</label>
    <input type="text" class="form-control" id="nom_paciente" name="nom_paciente" maxlength="40">
  </div>
  <div class="mb-3">
  <label for="sex_usuario" class="form-label">Sexo</label>
    <select class="form-select" id="sex_usuario" name="sex_usuario">
        <option selected value="0">M</option>
        <option value="1">F</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="end_paciente" class="form-label">Endereço</label>
    <input type="text" class="form-control" id="end_paciente" name="end_paciente" maxlength="40">
  </div>
  <div class="mb-3">
    <label for="bai_paciente" class="form-label">Bairro</label>
    <input type="text" class="form-control" id="bai_paciente" name="bai_paciente" maxlength="25">
  </div>
  <div class="mb-3">
    <label for="com_paciente" class="form-label">Complemento</label>
    <input type="text" class="form-control" id="com_paciente" name="com_paciente" maxlength="15">
  </div>  
  <div class="mb-3">
    <label for="cep_paciente" class="form-label">Cep</label>
    <input type="text" class="form-control" id="cep_paciente" name="cep_paciente" maxlength="8">
    <div id="helpTelPaciente" class="form-text">
    Não utilizar traços ou qualquer tipo de caractere diferente de números.
    </div>
  </div>  
  <div class="mb-3">
    <label for="cid_paciente" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="cid_paciente" name="cid_paciente" maxlength="35">
  </div>
  <div class="mb-3">
    <label for="uf_paciente" class="form-label">UF</label>
    <input type="text" class="form-control" id="uf_paciente" name="uf_paciente" maxlength="2">
  </div>
  <div class="mb-3">
    <label for="dtn_paciente" class="form-label">Data de nascimento</label>
    <input type="date" class="form-control" id="dtn_paciente" name="dtn_paciente">
  </div>
  <div class="mb-3">
    <label for="fone_paciente" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="fone_paciente" name="fone_paciente" maxlength="10">
    <div id="helpTelPaciente" class="form-text">
    Não utilizar traços ou qualquer tipo de caractere diferente de números.
    </div>
  </div>
  <div class="mb-3">
    <label for="email_paciente" class="form-label">Email</label>
    <input type="email" class="form-control" id="email_paciente" name="email_paciente" maxlength="50">
  </div>
  <div class="mb-3">
    <label for="pes_paciente" class="form-label">Peso</label>
    <input type="number" class="form-control" id="pes_paciente" name="pes_paciente">
    <div id="helpTelPaciente" class="form-text">
    Peso do paciente em quilogramas (kg) separando a parte decimal por ponto (.).
    </div>
  </div>
  <div class="mb-3">
    <label for="alt_paciente" class="form-label">Altura</label>
    <input type="number" class="form-control" id="alt_paciente" name="alt_paciente">
    <div id="helpTelPaciente" class="form-text">
    Altura do paciente em centimetros (cm).
    </div>
  </div>

  
  <button type="submit" class="btn btn-success">Cadastrar</button>
  <a class="btn btn-secondary" href="index.php?p=pacientes/index.php" role="button">Voltar</a>
</form>

<?php } ?>