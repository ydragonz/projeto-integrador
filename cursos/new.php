<?php

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    include('config.php');

    //verificar a conexão
    $conn = new mysqli($host, $user, $password, $dbname);
    
    if($conn->connect_error){
      die("Erro de conexão: ".$conn->connect_error);
    }
    else {
      $nom_curso = $_POST['nom_curso'];

      $sql = "INSERT INTO cursos (id_curso, nom_curso) VALUES (NULL, '$nom_curso')";
      if($conn->query($sql) === TRUE) {
        ?>
        <br>
        <div class="alert alert-success" role="alert">
          <h1>Curso criado com sucesso!</h1>
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
  if(!isset($_POST["nom_curso"])) {
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Novo curso</h1>
</div>
<form action="index.php?p=cursos/new.php" method="post">
  <div class="mb-3">
    <label class="form-label">ID curso</label>
    <input type="text" class="form-control" disabled>
    <div id="helpIdCurso" class="form-text">
        O ID do curso é gerado automaticamente pelo sistema.
    </div>
  </div>
  <div class="mb-3">
    <label for="nom_curso" class="form-label">Nome curso</label>
    <input type="text" class="form-control" id="nom_curso" name="nom_curso" maxlength="30">
  </div>

  <button type="submit" class="btn btn-success">Cadastrar</button>
  <a class="btn btn-secondary" href="index.php?p=cursos/index.php" role="button">Voltar</a>
</form>

<?php } ?>