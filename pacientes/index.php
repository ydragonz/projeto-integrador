<p>Voce esta na pagina pacientes</p>

<?php
include('config.php');

$con = new mysqli($host, $user, $password, $dbname);

if($con->connect_error){
    die("Erro na conexão: ".$con->connect_error);
}

$sql = "select * from curso order by nom_curso";  //testando
$res = $con->query($sql);

if($res->num_rows>0){
    ?>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>

                <?php
                //percorrer o array de resultados
                while($row = $res->fetch_assoc()){
                    echo "<tr>
                        <td>".$row['id_curso']."</td>
                        <td>".$row['nom_curso']."</td></tr>";
                }
                ?>
            
            </tbody>
        </table>
    </div>
<?php
}
else {
    echo "Não foram encontrados dados.";
}
$con->close();

?>