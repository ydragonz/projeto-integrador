<?php
    //include('../config.php');
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "pi_db";
    $conn = new mysqli($host, $user, $password, $dbname);
    if($conn->connect_error) {
        die("Erro na conexão: ".$conn->connect_error);
    }
    else {
        if($_SERVER["REQUEST_METHOD"] == "POST") { 
          $id_curso = $_GET['id_curso'];
          $nom_curso = $_POST['nom_curso'];

          $sql = "UPDATE cursos SET nom_curso = '$nom_curso' WHERE id_curso = '$id_curso';";
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
        else {
            $id = $_GET['id'];
            $sql = "select * from cursos where id_curso = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $dados = $result->fetch_row() ;
            
        }

    }

  if(!isset($_POST["nom_curso"])) {
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editando curso</h1>
</div>
<form action="index.php?p=cursos/edit.php" method="post">
  <div class="mb-3">
    <div class="mb-3">
      <label class="form-label">ID curso</label>
      <input type="text" class="form-control" name="id_curso" id="id_curso" value="<?=$dados[0];?>" disabled>
      <div id="helpIdCurso" class="form-text">
          O ID do curso é gerado automaticamente pelo sistema.
      </div>
    </div>
    <div class="mb-3">
      <label for="nom_curso" class="form-label">Nome curso</label>
      <input type="text" class="form-control" name="nom_curso" id="nom_curso" value="<?=$dados[1];?>">
    </div>

  <button type="submit" name="submit" class="btn btn-success">Salvar</button>
  <a class="btn btn-secondary" href="index.php?p=cursos/index.php" role="button">Cancelar</a>
</form

<?php } ?>