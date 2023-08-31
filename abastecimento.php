<?php
require_once __DIR__ . "/config/autoload.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abastecimento</title>
    <link rel="stylesheet" href="./web/assets/css/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container">
        <div class="row mb-2">
            <div class="col"></div>
            <div class="col">
                <h4>Viagens e Abastecimento de Veículos</h4>
            </div>
            <div class="col"></div>
        </div>


        <form class="row gy-2 gx-3 align-items-center border ">
            <h6>Cadastro da Viagem</h6>

            <div class="col mb-2">
                <label class="form-label" for="placa">Placa</label>
                <div class="input-group">
                    <div class="input-group-text">icone</div>
                    <input type="text" class="form-control" id="placa" placeholder="Insira a Placa">
                </div>
            </div>

            <div class="col mb-2">
                <label class="form-label" for="motorista">Motorista</label>
                <div class="input-group">
                    <div class="input-group-text">icone</div>
                    <input type="text" class="form-control" id="motorista" placeholder="Nome do Motorista">
                </div>
            </div>

            <div class="col mb-2">
                <label class="form-label" for="rota">Rota</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M512 96c0 50.2-59.1 125.1-84.6 155c-3.8 4.4-9.4 6.1-14.5 5H320c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c53 0 96 43 96 96s-43 96-96 96H139.6c8.7-9.9 19.3-22.6 30-36.8c6.3-8.4 12.8-17.6 19-27.2H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320c-53 0-96-43-96-96s43-96 96-96h39.8c-21-31.5-39.8-67.7-39.8-96c0-53 43-96 96-96s96 43 96 96zM117.1 489.1c-3.8 4.3-7.2 8.1-10.1 11.3l-1.8 2-.2-.2c-6 4.6-14.6 4-20-1.8C59.8 473 0 402.5 0 352c0-53 43-96 96-96s96 43 96 96c0 30-21.1 67-43.5 97.9c-10.7 14.7-21.7 28-30.8 38.5l-.6 .7zM128 352a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM416 128a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
                        </svg>
                    </div>
                    <input type="text" class="form-control" id="rota" placeholder="Insira a Rota">
                </div>
            </div>

            <div class="col-2 mb-2">
                <button type="submit" class="btn btn-primary mt-4">Criar Viagem</button>
            </div>
        </form>

        <div class="row mt-2 mb-2 col-12">
            <div class="input-group input-group-sm mb-3  ">
                <span class="input-group-text bg-primary-subtle" id="">Adicionar Saída</span>
                <button class="btn btn-outline-secondary bg-success" type="button" id="adicionar_abastecimento">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #000000
                            }
                        </style>
                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg></button>
            </div>
        </div>

        <form class="row gy-2 gx-3 align-items-center border " hidden id="form_saida">
            <div class="row mt-1">
                <h6>Saída</h6>

                <div class="col">

                </div>
            </div>
            <div class="col mb-2">
                <div class="input-group">
                    <div class="input-group-text">Data</div>
                    <input type="date" class="form-control" id="placa" placeholder="Insira a Placa">
                </div>

            </div>
            <div class="col mb-2">

                <div class="input-group">
                    <div class="input-group-text">Horário</div>
                    <input type="time" class="form-control" id="motorista" placeholder="Nome do Motorista">
                </div>
            </div>
            <div class="col mb-2">

                <div class="input-group">
                    <div class="input-group-text">KM</div>
                    <input type="number" class="form-control" id="rota" placeholder="Insira a Rota">
                </div>
            </div>

            <div class="col-2 mb-2">
                <button type="submit" class="btn btn-primary ">Salvar Saída</button>
            </div>
        </form>



        <div class="row mt-2 mb-2 col-12">
            <div class="input-group input-group-sm mb-3 ">
                <span class="input-group-text bg-danger-subtle" id="">Adicionar Abastecimento</span>
                <button class="btn btn-outline-secondary bg-success" type="button" id="inputGroupFileAddon04">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #000000
                            }
                        </style>
                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg></button>
            </div>
        </div>




        <form class="row gy-2 gx-3 align-items-center border ">
            <div class="row mt-1">
                <h6>Chegada</h6>
            </div>

            <div class="col mb-2">
                <div class="input-group">
                    <div class="input-group-text">Data</div>
                    <input type="date" class="form-control" id="placa" placeholder="Insira a Placa">
                </div>
            </div>

            <div class="col mb-2">
                <div class="input-group">
                    <div class="input-group-text">Horário</div>
                    <input type="time" class="form-control" id="motorista" placeholder="Nome do Motorista">
                </div>
            </div>

            <div class="col mb-2">
                <div class="input-group">
                    <div class="input-group-text">KM</div>
                    <input type="number" class="form-control" id="rota" placeholder="Insira a Rota">
                </div>
            </div>

            <div class="col-2 mb-2">
                <button type="submit" class="btn btn-primary ">Salvar Saída</button>
            </div>
        </form>



    </div>

    <script type="module" src="./web/assets/js/views/abastecimento/main.js"></script>
</body>


</html>