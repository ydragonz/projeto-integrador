<?php
include('config.php');

$con = new mysqli($host, $user, $password, $dbname);

if($con->connect_error){
    die("Erro na conexão: ".$con->connect_error);
}

$sql = "select * from usuarios order by nom_usuario";  //testando
$res = $con->query($sql);
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Exames</h1>
    <a href="index.php?p=usuarios/new.php" type="button" class="btn btn-primary">Cadastrar</a>
</div>

<?php
if($res->num_rows>0){
    ?>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">Curso</th>
                <th scope="col">Data de nascimento</th>
                <th scope="col">Per??</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while($row = $res->fetch_assoc()){
                    echo "<tr>
                        <td>".$row['cod_usuario']."</td>
                        <td>".$row['nom_usuario']."</td>
                        <td>".$row['id_curso']."</td>
                        <td>".$row['dtn_usuario']."</td>
                        <td>".$row['per_usuario']."</td> 
                        <td>".$row['sts_usuario']."</td></tr>";
                }
                ?>
            
            </tbody>
        </table>
    </div>
<?php
}
else {
    ?>
    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
            Não foram encontrados dados nesta tabela.
        </div>
    </div>
    <?php
}
$con->close();

?>