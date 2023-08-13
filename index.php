<?php
require_once __DIR__ . "/config/autoload.php";

?>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viagens</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" id="tabela_veiculos">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Carreta
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Motorista
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Abastecimento
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Ação
                    </th>


                </tr>

            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Aberta
                        </div>

                    </td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                        <div class="pl-3">
                            <div class="text-base font-semibold">{Cavalinho}</div>
                            <div class="font-normal text-gray-500">{Carreta}</div>
                        </div>
                    </th>

                    <td class="px-6 py-4">
                        <div class="text-base font-semibold">{Nome Motorista}</div>
                        <div class="text-base font-semibold">{Nome Motorista1}</div>
                        <div class="font-normal text-gray-500">{rota}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-base font-semibold">{Abastecimento} {KM} {Data}</div>
                        <div class="text-base font-semibold">{Abastecimento 2} {KM} {Data}</div>

                        <div class="font-normal text-gray-500">{rota}</div>
                    </td>

                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <div class="text-base font-semibold">{Adicionar Abastecimento}</div>
                        </a>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <div class="text-base font-semibold">{Alterar Motorista}</div>
                        </a>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <div class="text-base font-semibold">{Adicionar Abastecimento}</div>
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>




</body>

</html>