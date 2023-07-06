<?php
require_once __DIR__ . "/config/autoload.php";
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentação de vasilhames</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body class="bg-body-tertiary">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid bg-danger">
            <a class="navbar-brand" href="#">Distribuidora Miraí</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" disabled>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="estoque.php">Movimentação</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="locais.php">Locais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="produtos.php">Produtos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container ">
        <div class="row ">
            <div class="col"></div>
            <div class="col">

            </div>
            <div class="col"></div>
        </div>


        <div class="card w-100 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <h5>Estoque de Vasilhames</h5>
                    </div>
                    <div class="col"></div>
                </div>
                <table class="table table-striped table-hover" id="tableContainer">

                </table>

            </div>
        </div>






    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script type="module" src="./web/assets/js/tabela_estoque.js"></script>

</body>

</html>