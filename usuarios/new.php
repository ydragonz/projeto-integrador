<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include('config.php');

        //verificar a conexão
        $conn = new mysqli($host, $user, $password, $dbname);
    
        if($conn->connect_error){
            die("Erro de conexão: ".$conn->connect_error);
        }
        else {
          $country_id = $_POST['cod_usuario'];
          $country_name = $_POST['country_name'];
          $region_id = $_POST['region_id'];

          $sql = "insert into usuarios (cod_usuario, id_curso, nom_usuario, dtn_usuario, sen_usuario, per_usuario, sts_usuario) values (NULL, '$id_curso', '$nom_usuario'dtn_usuario sen_usuario per_usuario sts_usuario)";
          if($conn->query($sql) === TRUE) {
            echo "Novo registro inserido.";
          }
          else {
              echo "Falha: ".$sql."\n".$conn->error;
          }
        }
    }


?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Novo usuário</h1>
</div>
<form method="post" action="usuarios/new.php">
  <div class="mb-3">
    <label for="id_curso" class="form-label">ID curso</label>
    <input type="text" class="form-control" id="id_curso" name="id_curso">
    <div id="passwordHelpBlock" class="form-text">
        O ID do curso realizado pelo usuário.
    </div>
  </div>
  <div class="mb-3">
    <label for="country_name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="country_name" name="country_name">
  </div>
  <div class="mb-3">
    <label for="region_id" class="form-label">Região</label>
    <input type="text" class="form-control" id="region_id" name="region_id">
  </div>

  <button type="submit" class="btn btn-primary">Inserir</button>
</form>