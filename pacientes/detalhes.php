<?php
if($_SESSION['logado'] == 1) {
      require_once 'config.php';

      $conn = new mysqli($host, $user, $password, $dbname);
      if($conn->connect_error) {
          die("Erro na conexão: ".$conn->connect_error);
      }
      else {
          if(isset($_GET['del'])) {
            $id = $_GET['del'];
            $conn->query("DELETE FROM pacientes WHERE cod_paciente=$id");
            ?>
            <br>
            <div class="alert alert-success" role="alert">
              <h2>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </svg>
              Paciente excluído com sucesso!</h2>
              volte para a página anterior e atualize a página.
            </div>
            <?php
          }

          if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM pacientes WHERE cod_paciente = ?";
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
      <h1 class="h2">Visualizando paciente</h1>
  </div>
  <form action="main.php?p=pacientes/detalhes.php" method="POST">
  <div class="mb-3">
    <label class="form-label">Código paciente</label>
    <input type="text" class="form-control" value="<?=$dados[0];?>" readonly>
    <div id="helpIdCurso" class="form-text">
        O código do paciente é gerado automaticamente pelo sistema.
    </div>
  </div>
  <div class="mb-3">
    <label for="nom_paciente" class="form-label">Nome paciente</label>
    <input type="text" class="form-control" id="nom_paciente" name="nom_paciente" maxlength="40" value="<?=$dados[1];?>" readonly>
  </div>
  <div class="mb-3">
  <label for="sex_paciente" class="form-label">Sexo</label>
    <select class="form-select" id="sex_paciente" name="sex_paciente" value="<?=$dados[2];?>" readonly>
        <option value="M">M</option>
        <option value="F">F</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="end_paciente" class="form-label">Endereço</label>
    <input type="text" class="form-control" id="end_paciente" name="end_paciente" maxlength="40" value="<?=$dados[3];?>" readonly>
  </div>
  <div class="mb-3">
    <label for="bai_paciente" class="form-label">Bairro</label>
    <input type="text" class="form-control" id="bai_paciente" name="bai_paciente" maxlength="25" value="<?=$dados[4];?>" readonly>
  </div>
  <div class="mb-3">
    <label for="com_paciente" class="form-label">Complemento</label>
    <input type="text" class="form-control" id="com_paciente" name="com_paciente" maxlength="15" value="<?=$dados[5];?>" readonly>
  </div>  
  <div class="mb-3">
    <label for="cep_paciente" class="form-label">Cep</label>
    <input type="text" class="form-control" id="cep_paciente" name="cep_paciente" maxlength="8" value="<?=$dados[6];?>" readonly>
    <div id="helpTelPaciente" class="form-text">
    Não utilizar traços ou qualquer tipo de caractere diferente de números.
    </div>
  </div>  
  <div class="mb-3">
    <label for="cid_paciente" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="cid_paciente" name="cid_paciente" maxlength="35" value="<?=$dados[7];?>" readonly>
  </div>
  <div class="mb-3">
    <label for="uf_paciente" class="form-label">UF</label>
    <input type="text" class="form-control" id="uf_paciente" name="uf_paciente" maxlength="2" value="<?=$dados[8];?>" readonly>
  </div>
  <div class="mb-3">
    <label for="dtn_paciente" class="form-label">Data de nascimento</label>
    <input type="date" class="form-control" id="dtn_paciente" name="dtn_paciente" value="<?=$dados[9];?>" readonly>
  </div>
  <div class="mb-3">
    <label for="fone_paciente" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="fone_paciente" name="fone_paciente" maxlength="10" placeholder="" value="<?=$dados[10];?>" readonly>
    <div id="helpTelPaciente" class="form-text">
    Não utilizar traços ou qualquer tipo de caractere diferente de números.
    </div>
  </div>
  <div class="mb-3">
    <label for="email_paciente" class="form-label">Email</label>
    <input type="email" class="form-control" id="email_paciente" name="email_paciente" maxlength="50" value="<?=$dados[11];?>" readonly>
  </div>
  <div class="mb-3">
    <label for="pes_paciente" class="form-label">Peso</label>
    <input type="number" class="form-control" id="pes_paciente" name="pes_paciente" step=".01" value="<?=$dados[12];?>" readonly>
    <div id="helpPesPaciente" class="form-text">
    Peso do paciente em quilogramas (kg) separando a parte decimal por ponto (.).
    </div>
  </div>
  <div class="mb-3">
    <label for="alt_paciente" class="form-label">Altura</label>
    <input type="number" class="form-control" id="alt_paciente" name="alt_paciente" step=".01" value="<?=$dados[13];?>" readonly>
    <div id="helpAltPaciente" class="form-text">
    Altura do paciente em metros (m) separando a parte decimal por ponto (.).
    </div>
  </div>
  <div class="mb-3">
  <label for="fuma_paciente" class="form-label">Fuma</label>
    <select class="form-select" id="fuma_paciente" name="fuma_paciente" value="<?=$dados[14];?>" readonly>
        <option value="0">Não</option>
        <option value="1">Sim</option>
    </select>
  </div>
  <div class="mb-3">
  <label for="bebe_paciente" class="form-label">Bebe</label>
    <select class="form-select" id="bebe_paciente" name="bebe_paciente" value="<?=$dados[15];?>" readonly>
        <option value="0">Não</option>
        <option value="1">Sim</option>
    </select>
  </div>
  <div class="mb-3">
  <label for="hiper_paciente" class="form-label">Hipertenso</label>
    <select class="form-select" id="hiper_paciente" name="hiper_paciente" value="<?=$dados[16];?>" readonly>
        <option value="0">Não</option>
        <option value="1">Sim</option>
    </select>
  </div>
  <div class="mb-3">
  <label for="diab_paciente" class="form-label">Diabético</label>
    <select class="form-select" id="diab_paciente" name="diab_paciente" value="<?=$dados[17];?>" readonly>
        <option value="0">Não</option>
        <option value="1">Sim</option>
    </select>
  </div>
  <div class="mb-3">
  <label for="dac_paciente" class="form-label">Doença arterial coronariana</label>
    <select class="form-select" id="dac_paciente" name="dac_paciente" value="<?=$dados[18];?>" readonly>
        <option value="0">Não</option>
        <option value="1">Sim</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="doe_paciente" class="form-label">Outras doenças</label>
    <input type="text" class="form-control" id="doe_paciente" name="doe_paciente" maxlength="100" value="<?=$dados[19];?>" readonly>
  </div>
  <div class="mb-3">
  <label for="med_paciente" class="form-label">Toma remédio</label>
    <select class="form-select" id="med_paciente" name="med_paciente" value="<?=$dados[20];?>" readonly>
        <option value="0">Não</option>
        <option value="1">Sim</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="rem_paciente" class="form-label">Medicamentos</label>
    <input type="text" class="form-control" id="rem_paciente" name="rem_paciente" maxlength="100" value="<?=$dados[21];?>" readonly>
  </div>

  <?php 
    if($_SESSION['sts_usuario']) {
    echo "<a href='main.php?p=pacientes/edit.php&id=".$dados[0]."' class='btn btn-primary'>Editar</a>"; 
    echo "<a href='main.php?p=pacientes/detalhes.php&del=".$dados[0]."' class='btn btn-danger'>Excluir</a>";
    }
    ?>
    <a class="btn btn-secondary" href="main.php?p=pacientes/index.php" role="button">Voltar</a>
</form>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Exames</h1>
</div>


<?php 
  } 
}
else {
  ?>
  <div class="alert alert-danger" role="alert">
    <h2>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-octagon-fill" viewBox="0 0 16 16">
      <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg>
    Nenhum usuário logado!</h2>
    volte para a página inicial e faça login.
  </div>
  <?php
}
?>