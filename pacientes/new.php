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
      $dtn_usuario = date('Y-m-d', strtotime($_POST['dtn_usuario']));
      $sen_usuario = $_POST['sen_usuario'];
      $per_usuario = $_POST['per_usuario'];
      $sts_usuario = $_POST['sts_usuario'];

      $sql = "insert into usuarios (cod_usuario, id_curso, nom_usuario, dtn_usuario, sen_usuario, per_usuario, sts_usuario) values (NULL, '$id_curso', '$nom_usuario', '$dtn_usuario', '$sen_usuario', '$per_usuario', '$sts_usuario')";
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
    <input type="text" class="form-control" id="nom_paciente" name="nom_paciente">
  </div>
  <div class="mb-3">
    <label for="nom_usuario" class="form-label">Sexo</label>
    <input type="text" class="form-control" id="nom_usuario" name="nom_usuario">
  </div>
  <div class="mb-3">
    <label for="dtn_usuario" class="form-label">Data de nascimento</label>
        <input type="date" class="form-control" id="dtn_usuario" name="dtn_usuario">
  </div>
  <div class="mb-3">
    <label for="sen_usuario" class="form-label">Senha</label>
    <input type="password" class="form-control" id="sen_usuario" name="sen_usuario">
    <div id="helpNomeUsuario" class="form-text">
        Lembre-se de não compartilhar com ninguém.
    </div>
  </div>
  <div class="mb-3">
    <label for="per_usuario" class="form-label">Cargo</label>
    <select class="form-select" id="per_usuario" name="per_usuario">
        <option selected value="0">Comum</option>
        <option value="1">Administrador</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="sts_usuario" class="form-label">Status</label>
    <select class="form-select" id="sts_usuario" name="sts_usuario">
        <option selected value="0">Inativo</option>
        <option value="1">Ativo</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Cadastrar</button>
  <a class="btn btn-secondary" href="index.php?p=usuarios/index.php" role="button">Voltar</a>
</form>

<?php } ?>