<?php
    //include('config.php');
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
          
          
          ?>
          
          
          <div class="alert alert-success" role="alert">
            <h1>Usuário editado com sucesso!</h1>
            volte para a página anterior e atualize a página.
          </div>
          <?php
        }
        else {
            $id = $_GET['id'];
            $sql = "select * from usuarios where cod_usuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $dados = $result->fetch_row() ;
            
        }

    }

  if(!isset($_POST["id_curso"])) {
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editando usuário</h1>
</div>
<form method="post" action="usuarios/edit.php">
  <div class="mb-3">
    <div class="mb-3">
      <label class="form-label">ID usuário</label>
      <input type="text" class="form-control" value="<?=$dados[0];?>" disabled>
      <div id="helpIdCurso" class="form-text">
          O ID do usuário é gerado automaticamente pelo sistema.
      </div>
    </div>
    <div class="mb-3">
      <label for="id_curso" class="form-label">ID curso</label>
      <input type="text" class="form-control" id="id_curso" name="id_curso" value="<?=$dados[1];?>">
      <div id="helpIdCurso" class="form-text">
          O ID do curso realizado pelo usuário, em caso de duvidas consultar a página de cursos.
      </div>
    </div>
    <div class="mb-3">
      <label for="nom_usuario" class="form-label">Nome do usuário</label>
      <input type="text" class="form-control" id="nom_usuario" name="nom_usuario" value="<?=$dados[2];?>">
    </div>
    <div class="mb-3">
      <label for="dtn_usuario" class="form-label">Data de nascimento</label>
          <input type="date" class="form-control" id="dtn_usuario" name="dtn_usuario" value="<?=$dados[3];?>">
    </div>
    <div class="mb-3">
      <label for="sen_usuario" class="form-label">Senha</label>
      <input type="password" class="form-control" id="sen_usuario" name="sen_usuario" value="<?=$dados[4];?>">
      <div id="helpNomeUsuario" class="form-text">
          Lembre-se de não compartilhar com ninguém.
      </div>
    </div>
    <div class="mb-3">
      <label for="per_usuario" class="form-label">Cargo</label>
      <select class="form-select" id="per_usuario" name="per_usuario" value="<?=$dados[5];?>">
          <option selected value="0">Comum</option>
          <option value="1">Administrador</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="sts_usuario" class="form-label">Status</label>
      <select class="form-select" id="sts_usuario" name="sts_usuario" value="<?=$dados[6];?>">
          <option selected value="0">Inativo</option>
          <option value="1">Ativo</option>
      </select>
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
  <?php echo "<td><a href='index.php?p=usuarios/detalhes.php&id=".$dados[0]."' class='btn btn-secondary'>Cancelar</a></tr>" ?>
</form

<?php } ?>