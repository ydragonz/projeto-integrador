<?php
// PROJETO INTEGRADOR TERCEIRA ETAPA 2021/2

// Integrantes:
// -Leonardo Bernardes de Oliveira  
// -Sara Ferreira Fernandes  
// -João Carneiro da Cunha  

    if(isset($_GET['p'])) {
        $arquivo = $_GET['p'];    
    }
    else {
        $arquivo = 'home.php';
    }
?>

<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Site desenvolvido para o Projeto Integrador da terceira etapa de Engenharia de Software da UNAERP de 2021/2">
        <meta name="author" content="Leonardo Bernardes de Oliveira, Sara Ferreira Fernandes e João Carneiro da Cunha">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
        <link href="css/dashboard.css" rel="stylesheet">
        <link rel="icon" href="images/unaerp_logo.jpg">
        <title>Bem-Estar no Shopping</title>
    </head>
    <body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-1 me-0 px-3" href="#"><img src="images/teste.png" class=""> Bem-Estar</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="#">Sair</a>
        </div>
    </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
            <?php 
                include('menu.php');
            ?>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php
                include($arquivo);
            ?>

            </main>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/feather.min.js"></script>
    <script src="js/dashboard.js"></script>
    </body>
</html>