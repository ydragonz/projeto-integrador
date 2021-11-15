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
        if(isset($_POST['cod'])) {
            $id = $_POST['cod'];
            $mysqli->query("DELETE FROM usuarios WHERE cod_usuario=$id");
        }

    }
?>