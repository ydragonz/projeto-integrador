<p>Voce esta na pagina usuarios</p>

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
    <h1 class="h2">Usuários</h1>
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
    echo "Não foram encontrados dados nesta tabela.";
}
$con->close();

?>