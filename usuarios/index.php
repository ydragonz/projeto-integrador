<p>Voce esta na pagina usuarios</p>

<?php
include('config.php');

$con = new mysqli($host, $user, $password, $dbname);

if($con->connect_error){
    die("Erro na conexão: ".$con->connect_error);
}

$sql = "select * from curso order by nom_curso";  //testando
$res = $con->query($sql);
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usuários</h1>
    <a href="index.php?p=paises/new" type="button" class="btn btn-primary">Inserir</a>
</div>

<?php
if($res->num_rows>0){
    ?>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>

                <?php
                //percorrer o array de resultados
                while($row = $res->fetch_assoc()){
                    echo "<tr>
                        <td>".$row['cod_curso']."</td>
                        <td>".$row['nom_curso']."</td></tr>";
                        <td><a href='index.php?p=usuarios/edit&id=".$row['country_id']."' class='btn btn-success btn-sm'>Editar</a></td></tr>";
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