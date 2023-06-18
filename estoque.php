<?php
require_once __DIR__ . "/config/autoload.php";


//include_once('busca_local.php');
//include_once('busca_produto.php');
//include_once('busca_movimentacao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentação Estoque</title>
    <link rel="stylesheet" href="./web/assets/css/main.css">

</head>

<body class="bg-light">
    <div class="container">

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid bg-danger">
                <a class="navbar-brand" href="#">Distribuidora Miraí</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" disabled>Movimentação</a>
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

        <div class="row">
            <div class="col-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaCarga">Nova Carga</button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="novaCarga" tabindex="-1" aria-labelledby="novaCargaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="novaCargaLabel">Nova Carga</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col">
                                    <label for="data_carga">Data da Carga</label>
                                    <input type="date" name="data_carga" id="data_carga" required pattern="\d{1,2}/\d{1,2}/\d{4}" class="form-control" required>

                                </div>

                                <div class="col">
                                    <label for="carga">Número da carga</label>
                                    <input type="number" name="carga" id="carga" placeholder="Nº da Carga" class="form-control" required>
                                </div>

                                <div class="col">
                                    <label for="origem">Origem</label>
                                    <select name="origem" required id="origem" class="form-select" required>
                                        <option disabled selected value="">Escolha a sua Origem</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="destino">Destino</label>
                                    <select name="destino" required id="destino" class="form-select" required>
                                        <option disabled selected value="">Escolha a sua Origem</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" id="salvar_carga" class="btn btn-primary">Salvar Carga</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Fim Modal -->

    <div class="row">
        <h4 class="text-center mt-3 ">Movimentação de Estoque</h4>
    </div>
    <form action="inserir_estoque.php" method="post">

        <div class="row mt-3">

            <div class="col">
                <label for="data_carga">Data da Carga</label>
                <input type="date" name="data_carga" readonly required pattern="\d{1,2}/\d{1,2}/\d{4}" class="form-control" required>
            </div>

            <div class="col">
                <label for="carga">Número da carga</label>
                <input type="number" name="carga" placeholder="Nº da Carga" class="form-control" required>
            </div>

            <div class="col">
                <label for="origem">Origem</label>
                <select name="origem" required id="origem" class="form-select" required>
                    <option disabled selected value="">Escolha a sua Origem</option>
                </select>
            </div>

            <div class="col">
                <label for="destino">Destino</label>
                <select name="destino" required id="destino" class="form-select" required>
                    <option disabled selected value="">Escolha a sua Origem</option>
                </select>
            </div>
        </div>

        <div class="row mt-3" id="produtos">

            <div class="col produto">
                <label for="produto">Produto</label>
                <select name="produto" id="produto" class="form-select" required>
                </select>
            </div>

            <div class="col produto">
                <label for="quantidade">Quantidade Caixa</label>
                <input type="number" class="form-control" id="quantidade" min="0">
            </div>

            <div class="col produto">
                <label for="quantidade_unidade">Quantidade Unidade</label>
                <input type="number" class="form-control" id="quantidade_unidade" min="0">
            </div>

            <div class="col produto">
                <label for="quantidade_total">Quantidade Total</label>
                <input type="number" class="form-control" name="quantidade_total[]" id="quantidade_total" readonly>
            </div>



            <script>
                let quantidadeProduto = document.getElementById('produto')
                let valorExtraido

                quantidadeProduto.addEventListener("change", () => {
                    let selectedOption = quantidadeProduto.options[quantidadeProduto.selectedIndex];
                    var regex = /\(([^)]+)\)/g;
                    var matches = selectedOption.innerHTML.match(regex)

                    if (matches) {
                        var valoresExtraidos = matches.map(function(match) {
                            return match.replace(/\(|\)/g, '')
                        });

                        valorExtraido = valoresExtraidos[0]
                    } else {
                        alert("Nenhum valor encontrado")
                    }

                });


                let quantidade = document.getElementById('quantidade')
                let quantidadeTotal = document.getElementById('quantidade_total')
                let quantidadeUnidades = document.getElementById('quantidade_unidade')


                function calcularSoma() {
                    let totalUnidades = parseInt(quantidadeUnidades.value) || 0
                    let caixas = parseInt(quantidade.value) || 0

                    let resultado = (caixas * valorExtraido) + totalUnidades
                    console.log(resultado)

                    quantidadeTotal.value = resultado
                }


                quantidade.addEventListener('input', () => {

                    if (valorExtraido != undefined) {
                        calcularSoma()

                    } else {
                        alert("Você precisa selecionar um Produto")
                    }
                })

                quantidadeUnidades.addEventListener('input', () => {

                    if (valorExtraido != undefined) {
                        calcularSoma()
                    } else {
                        alert("Você precisa selecionar um Produto")
                    }
                })
            </script>

            <div class="col ">
                <label for="observacoes">Observações</label>
                <textarea name="observacoes" class="form-control" id="observacoes" cols="35" rows="2" placeholder="Observações"></textarea>
            </div>
        </div>


        <div class="row mt-5 ">
            <div class="col position-absolute  start-100 translate-middle">
                <button type="submit">Salvar Produto</button>
            </div>


        </div>


        <script>
            // url = "inserir_estoque.php"

            // const options = {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json'
            //     },
            //     body: JSON.stringify(pegarNovoValor)
            // };

            // fetch(url, options)
            //     .then(response => {
            //         if (response.ok) {
            //             return response.json()
            //         } else {
            //             throw new Error('Erro ao enviar a requisição')
            //         }
            //     }).catch(error => {
            //         console.error('Erro na requisição', error);
            //     })
        </script>
    </form>

    <div class="row mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Data Carga</th>
                    <th scope="col">Número carga</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Origem</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Observações</th>
                    <th scope="col"><a href=""><i class="bi bi-pencil-square"></i></a></th>

                </tr>
            </thead>

            <tbody>
                <?php foreach ($estoque as $estoques) { ?>
                    <tr>
                        <td>
                            <?= $estoques['data_carga']; ?>
                        </td>
                        <td>
                            <?= $estoques['carga']; ?>
                        </td>
                        <td>
                            <?= $estoques['vasilhame']; ?>
                        </td>
                        <td>
                            <?= $estoques['origem']; ?>
                        </td>
                        <td>
                            <?= $estoques['destino']; ?>
                        </td>
                        <td>
                            <?= $estoques['quantidade_vasilhame']; ?>
                        </td>
                        <td>
                            <?= $estoques['desc_mov_vasilhame']; ?>
                        </td>
                        <td>
                            <button type="button" class="btn" id="<?= $estoques['id_movimentacao_vasilhame']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="obterValorLinha(this)">
                                <i class="bi bi-pencil-square" data-id="<?= $estoques['id_movimentacao_vasilhame']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                </i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza que irá remover o registro?
                                <span id="dados_linha"></span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                                <button type="button" class="btn btn-warning" data-id="" onclick="desativarRegistro(this);">Remover</button>
                            </div>
                        </div>
                    </div>
                </div>
            </tbody>

            <script>
                function obterValorLinha(button) {
                    // Encontrar a linha pai do botão
                    var row = button.parentNode.parentNode;

                    // Obter todas as células da linha
                    var cells = row.getElementsByTagName('td');

                    // Array para armazenar os valores das células
                    var valores = [];

                    // Percorrer todas as células e obter os valores
                    for (var i = 0; i < cells.length - 1; i++) { // Subtraí 1 para ignorar a célula do botão
                        var valor = cells[i].innerText.trim();
                        valores.push(valor);
                    }

                    var idMovimentacao = button.id; // Obter o ID do botão

                    console.log(valores); // Valores das células
                    console.log(idMovimentacao); // ID do botão

                    // Resto do código...

                    // Atribuir os valores a uma string formatada
                    var resultadoString = 'Data de Carga: ' + valores[0] + '<br>' +
                        'Carga: ' + valores[1] + '<br>' +
                        'Vasilhame: ' + valores[2] + '<br>' +
                        'Origem: ' + valores[3] + '<br>' +
                        'Destino: ' + valores[4] + '<br>' +
                        'Quantidade de Vasilhame: ' + valores[5] + '<br>' +
                        'Descrição do Movimento de Vasilhame: ' + valores[6] + '<br>' +
                        'ID do Movimentação: ' + idMovimentacao;

                    // Obter o elemento <span> pelo ID
                    var dadosLinhaSpan = document.getElementById('dados_linha');

                    // Atribuir o valor de resultadoString ao conteúdo do elemento <span>
                    dadosLinhaSpan.innerHTML = resultadoString;

                    var removerBotao = document.querySelector('.modal-footer .btn-warning');

                    removerBotao.dataset.id = idMovimentacao

                }
            </script>


        </table>
    </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    <script type="module" src="./web/assets/js/main.js"></script>
</body>

</html>