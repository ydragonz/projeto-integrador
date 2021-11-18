<?php
    include('config.php');

    $conn = new mysqli($host, $user, $password, $dbname);
    if($conn->connect_error) {
        die("Erro na conexão: ".$conn->connect_error);
    }
    else {
        if(isset($_GET['del'])) {
          $id = $_GET['del'];
          $conn->query("DELETE FROM usuarios WHERE cod_usuario=$id");
          ?>
          <br>
          <div class="alert alert-success" role="alert">
            <h2>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
            Usuário excluído com sucesso!</h2>
            volte para a página anterior e atualize a página.
          </div>
          <?php
        }

        if(isset($_GET['id'])) {
          $id = $_GET['id'];
          $sql = "select * from usuarios where cod_usuario = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s", $id);
          $stmt->execute();
          $result = $stmt->get_result();
          $dados = $result->fetch_row() ;
        }
    }
    if(!isset($_GET['del'])) {
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Visualizando usuário</h1>
</div>
<form method="post" action="index.php?p=usuarios/detalhes.php">
<div class="mb-3">
  <div class="mb-3">
    <label class="form-label">ID usuário</label>
    <input type="text" class="form-control" id="cod_usuario" name="cod_usuario" value="<?=$dados[0];?>" readonly>
    <div id="helpIdCurso" class="form-text">
        O ID do usuário é gerado automaticamente pelo sistema.
  </div>
  </div>
    <label for="id_curso" class="form-label">ID curso</label>
    <input type="text" class="form-control" id="id_curso" name="id_curso" value="<?=$dados[1];?>" readonly>
    <div id="helpIdCurso" class="form-text">
        O ID do curso realizado pelo usuário, em caso de duvidas consultar a página de cursos.
    </div>
  </div>
  <div class="mb-3">
    <label for="nom_usuario" class="form-label">Nome do usuário</label>
    <input type="text" class="form-control" id="nom_usuario" name="nom_usuario" value="<?=$dados[2];?>" readonly>
  </div>
  <div class="mb-3">
    <label for="dtn_usuario" class="form-label">Data de nascimento</label>
        <input type="date" class="form-control" id="dtn_usuario" name="dtn_usuario" value="<?=$dados[3];?>" readonly>
  </div>
  <div class="mb-3">
    <label for="sen_usuario" class="form-label">Senha</label>
    <input type="password" class="form-control" id="sen_usuario" name="sen_usuario" value="<?=$dados[4];?>" readonly>
    <div id="helpNomeUsuario" class="form-text">
        Lembre-se de não compartilhar com ninguém.
    </div>
  </div>
  <div class="mb-3">
    <label for="per_usuario" class="form-label">Cargo</label>
    <select class="form-select" id="per_usuario" name="per_usuario" value="<?=$dados[5];?>" readonly>
        <option selected value="0">Comum</option>
        <option value="1">Administrador</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="sts_usuario" class="form-label">Status</label>
    <select class="form-select" id="sts_usuario" name="sts_usuario" value="<?=$dados[6];?>" readonly>
        <option selected value="0">Inativo</option>
        <option value="1">Ativo</option>
    </select>
  </div>

  <?php echo "<td><a href='index.php?p=usuarios/edit.php&id=".$dados[0]."' class='btn btn-primary'>Editar</a></tr> "; 
  echo "<td><a href='index.php?p=usuarios/detalhes.php&del=".$dados[0]."' class='btn btn-danger'>Excluir</a></tr>" ?>
  <a class="btn btn-secondary" href="index.php?p=usuarios/index.php" role="button">Voltar</a>
</form>

<?php } ?>