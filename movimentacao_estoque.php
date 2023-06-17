<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentação Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <h2>Lançamento de Movimentação</h2>

        <form action="insere_estoque.php" method="post">

            <div class="row">

                <div class="col">
                    <label for="data_carga">Data da Carga</label>
                    <input type="date" name="data_carga" id="data_carga" required pattern="\d{1,2}/\d{1,2}/\d{4}"
                        class="form-control" required>
                        <script src="js.js"></script>
                </div>
                
                <div class="col">
                    <label for="carga">Número da carga</label>
                    <input type="number" name="carga" id="carga" placeholder="Nº da Carga" class="form-control"
                        required>
                </div>

                <div class="col">
                    <label for="origem">Origem</label>
                    <select name="origem" required id="origem" class="form-select"
                        onchange="atualizarListas(this.value, 'destino');" required>
                        <option disabled selected value="">Escolha a sua Origem</option>
                    </select>
                </div>

                <div class="col">
                    <label for="origem">Origem</label>
                    <select name="origem" required id="origem" class="form-select"
                        onchange="atualizarListas(this.value, 'destino');" required>
                        <option disabled selected value="">Escolha a sua Origem</option>
                    </select>
                </div>
            </div>





        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>

</html>