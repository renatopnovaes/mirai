<?php
require_once __DIR__ . "/../../config/autoload.php";

?>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viagens</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/main.css">
    <script type="module" src="./js/main.js"></script>

</head>

<body class="bg-slate-200 dark:bg-gray-700 ">

    <nav class="bg-slate-500 dark:bg-gray-700 ">
        <div class="max-w-screen-xl px-3 py-1 mx-auto flex">

            <button type="button" id="addCarga" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                <svg class="w-3 h-3 mr-2 invisible md:visible" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                </svg>
                Adicionar Viagem
            </button>
            <button id="addVeiculos" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                <svg class="invisible md:visible w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2" />
                </svg>
                Configurações
            </button>
            <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                <svg class="invisible md:visible w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                    <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                </svg>
                Manutenção
            </button>
            <button type="button" id="addAbastecimento" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                <svg class="invisible md:visible" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                </svg>
                Abastecimento
            </button>
            <!-- button funcionario-->
            <button>

            </button>




        </div>
    </nav>
    <!-------------------------- MODAL ADD TRAVELS ---------------------->
    <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
        <div class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Adicionar Viagem</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <!--Body-->
                <div class="my-5">

                    <form id="formViagem">
                        <div class="mb-6">
                            <label for="data_saida" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de Saída</label>
                            <input type="date" id="data_saida" name="data_saida" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required>
                        </div>
                        <div class="mb-6">
                            <label for="rota" class="sr-only">Escolha o Veículo</label>
                            <select id="rota" name="rota" class="block py-2.5 px-0 w-full text-sm font-medium text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                <option selected>Escolha a Rota</option>
                                <option value="${id}">${rota}</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="observacao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observação</label>
                            <input type="text" id="observacao" name="observacao" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <button id="btnCadastrarViagem" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        <button class="modal-close text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">CANCELAR</button>

                </div>
                </form>
            </div>

        </div>
    </div>


    <!-------------------------- MODAL ABASTECIMENTO ---------------------->
    <div class="abatescimento-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
        <div class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Adicionar Abastecimento</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <!--Body-->
                <div class="my-5">

                    <form id="formAbastecimento">
                        <div class="mb-6">
                            <label for="data_saida" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de Saída</label>
                            <input type="date" id="data_saida" name="data_saida" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Insira o KM" required>
                            <!-- INPUT LITROS-->
                            <label for="litros" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Litros</label>
                            <input type="number" id="litros" name="litros" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Insira o KM" required>
                            <!-- INPUT KM-->
                            <label for="km" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KM</label>
                            <input type="number" id="km" name="km" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Insira o KM" required>
                            <!-- INPUT VALOR-->
                            <label for="valor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor</label>
                            <input type="number" id="valor" name="valor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Insira o KM" required>
                            <!-- INPUT POSTO-->
                            <label for="posto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posto</label>
                            <input type="text" id="posto" name="posto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Insira o KM" required>
                            <!-- INPUT CNPJ-->
                            <label for="cnpj" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CNPJ</label>
                            <input type="text" id="cnpj" name="cnpj" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Insira o KM" required>
                            <!-- INPUT NF-->
                            <label for="nf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NF</label>
                            <input type="text" id="nf" name="nf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Insira o KM" required>
                            <!-- INPUT MOTORISTA-->
                            <label for="motorista" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motorista</label>
                            <input type="text" id="motorista" name="motorista" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Insira o KM" required>

                            <!-- ROUTE -->
                            <label for="rota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rota</label>
                            <input type="text" id="rota" name="rota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <!-- INPUT KM-->
                            <label for="km" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KM</label>
                            <input type="number" id="km" name="km" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <!-- INPUT VALOR-->
                            <label for="valor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor</label>
                            <input type="number" id="valor" name="valor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-------------------------- MODAL CONFIGURAÇÕES ---------------------->
    <div class="veiculos-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
        <div class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-2xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <!--- COLUNA 1 -->
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-xl font-bold">Ajustes de Viagem</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>


                <!--Body-->

                <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Veículos Disponíves</h5>
                        <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                            Nova Configuração
                        </a>
                    </div>
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">

                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            ${veiculo}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            ${carreta}
                                        </p>
                                    </div>
                                    <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                            <path d="m424-312 282-282-56-56-226 226-114-114-56 56 170 170ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z" />
                                        </svg></a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="mt-3 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">

                    <div class="flow-root">
                        <div class="combinacaoCarreta">
                            <label for="underline_select" class="sr-only">Escolha o Veículo</label>
                            <select id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                <option selected>Escolha o Veículo</option>
                                <option value="${id}">${veiculo}</option>
                            </select>
                        </div>


                    </div>
                </div>

            </div>



        </div>
    </div>






    <!---TRAVELS TABLE -->
    <div class="container mx-auto md:w-5/6  relative overflow-x-auto shadow-md sm:rounded-lg" id="tabela_veiculos">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Ação
                    </th>
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
                        Observações
                    </th>



                </tr>
            </thead>

            <tbody id="viagens-body">
                <!-- Loop through each travel data -->

                <!-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex justify-center ">
                            <input id="filter-radio-example-{{ viagem.id }}" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="filter-radio-example-{{ viagem.id }}" class="sr-only">radio</label>
                        </div>
                    </td>

                    <td class="w-4 p-4">
                        <div class=" pl-3 grid grid-cols-1">
                            <div class="font-normal text-gray-500">Aberta</div>
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2 justify-self-center"></div>
                            <div class="visible md:invisible font-normal text-gray-500">{{ viagem.rota }}</div>
                        </div>
                    </td>

                    <td class="px-4 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="text-base font-semibold">{{ viagem.cavalinho }}</div>
                        <div class="text-base">{{ viagem.carreta }}</div>
                        <div class="text-base font-semibold">{{ viagem.rota }}</div>
                    </td>

                    <td class="px-4 py-4 ">
                        <div class="text-base font-semibold">{{ viagem.nome_motorista }}</div>
                        <div class="text-base font-semibold">{{ viagem.nome_motorista1 }}</div>
                        <div class="text-base font-semibold">{{ viagem.rota }}</div>
                    </td>

                    <td class="px-4 py-4">
                        <div class="text-base font-semibold">{{ viagem.data_saida }}</div>
                        <div class="text-base font-semibold">{{ viagem.chegada }}</div>
                        <div class="text-base font-semibold">{{ viagem.alerta_abastecimentos }}</div>
                        <div class="text-base font-semibold">{{ viagem.alerta_manutencao }}</div>
                        <div class="text-base font-semibold">{{ viagem.observacao }}</div>
                    </td>
                </tr> -->

            </tbody>

        </table>
    </div>





</body>

</html>