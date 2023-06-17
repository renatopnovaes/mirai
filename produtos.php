<?php
include_once('busca_produto.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <div class="container ">

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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="estoque.php">Movimentação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="locais.php">Locais</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " disabled>Produtos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <h3 class="text-center">Cadastro de Produtos</h3>

        <form action="insere_produto.php" method="POST">
            <div class="row">
                <div class="col">

                </div>
            </div>

        </form>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade Cx</th>
                    <th scope="col">Editar</th>

                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($resultado as $resultados) {
                    echo  '<tr>';
                    echo '<th scope="row">' . $resultados['produto_id'] . '</th>';
                    echo '<td class="editable-cell">' . $resultados['produto_nome'] . '</td>';
                    echo '<td class="editable-cell">' . $resultados['produto_quantidade'] . '</td>';
                    echo '<td><button onclick="alterarProduto(this)" class="btn-editar btn btn-primary" id="' . $resultados['produto_id'] . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil"></i></button></td>';

                    echo '</tr>';
                }
                ?>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="produto" class="form-control" placeholder="Produto">
                                    </div>

                                    <div class="col">
                                        <input type="number" id="quantidade" class="form-control"
                                            placeholder="Quantidade">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Salvar Alterações</button>
                            </div>
                        </div>
                    </div>
                </div>




                <script>

                    function alterarProduto(botao) {
                        let linha = botao.parentNode.parentNode;
                        let celulas = linha.querySelectorAll('.editable-cell');

                        let valores = [];
                        celulas.forEach(function (celula) {
                            celula.setAttribute('contentEditable', 'true')
                            let valor = celula.textContent;
                            valores.push(valor);
                        });

                        console.log(valores);

                        let produto = document.getElementById('produto')
                        let quantidade = document.getElementById('quantidade')
                        produto.value = valores[0]
                        quantidade.value = valores[1]
                        console.log(valores[1])
                    }





                </script>

            </tbody>
        </table>


    </div>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>

</html>