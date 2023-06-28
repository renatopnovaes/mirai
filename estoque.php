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
    <div class="container">

        <div class="row">
            <div class="col-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaCarga">Nova Carga</button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="novaCarga" tabindex="-1" aria-labelledby="novaCargaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post" id="form_carga">
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
                                    <label for="numero_carga">Número da carga</label>
                                    <input type="number" name="numero_carga" id="numero_carga" placeholder="Nº da Carga" class="form-control" required>
                                </div>

                                <!-- <div class="col">
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
                                </div> -->

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" id="salvar_carga" class="btn btn-primary">Salvar Carga</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Fim Modal -->

        <div class="row">
            <h4 class="text-center mt-3 ">Movimentação de Estoque</h4>
        </div>
        <form id="vasilhame_movimentacao" method="post">

            <div class="row mt-3">

                <div class="col">
                    <label for="data_carga">Data da Carga</label>
                    <input type="date" readonly required pattern="\d{1,2}/\d{1,2}/\d{4}" class="form-control" required>
                </div>

                <div class="col">
                    <label for="carga_vasilhame">Número da carga</label>
                    <input type="number" id="carga_vasilhame" name="carga_vasilhame" list="carga" placeholder="Nº da Carga" class="form-control" required>
                    <datalist id="carga">

                    </datalist>
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
                        <option disabled value="" selected></option>
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
                    <input type="number" class="form-control" name="quantidade_total" id="quantidade_total" readonly>
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
                <div class="col">


                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger">Resetar Formulário</button>
                    <button type="submit" class="btn btn-success" id="salvarMovimentacaoVasilhame">Salvar Produto</button>
                </div>
                <div class="col">

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

        <table class="table table-striped mt-5" id="tableContainer"></table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    <script type="module" src="./web/assets/js/main.js"></script>
</body>

</html>