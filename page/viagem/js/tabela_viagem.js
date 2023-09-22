import { getListViagemAberta } from "../../../web/assets/js/fetch/viagem.js"

// Variável global para armazenar o valor de viagem.id
let selectedViagemId = null;

const populateViagensTable = async () => {
    const viagensData = await getListViagemAberta();
    const viagensBody = document.getElementById('viagens-body');

    viagensData.forEach(viagem => {
        const newRow = document.createElement('tr');
        newRow.classList.add('border-b', 'border-gray-200', 'dark:bg-gray-800', 'dark:border-gray-700', 'hover:bg-gray-100', 'hover:shadow-md', 'transition', 'duration-200');

        // Definindo o ouvinte de evento de clique para marcar o rádio e destacar a linha
        newRow.addEventListener('click', () => {
            const radioInput = document.getElementById(`filter-radio-viagem-${viagem.id}`);

            // Remover classe de destaque da linha anterior (se existir)
            if (highlightedRow) {
                highlightedRow.classList.remove('bg-highlight'); // Classe de destaque
            }

            // Marcar o rádio
            radioInput.checked = true;

            // Destacar a linha atual
            newRow.classList.add('bg-highlight'); // Classe de destaque
            highlightedRow = newRow; // Armazenar a linha destacada

            // Define o valor de selectedViagemId quando uma linha é clicada
            selectedViagemId = viagem.id;
        });

        newRow.innerHTML = `
            <td class="w-2 p-2" >
                <div class="flex justify-center">
                    <input id="filter-radio-viagem-${viagem.id}" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="filter-radio-viagem-${viagem.id}" class="sr-only">radio</label>
                </div>
            </td>

            <td class="w-4 p-4">
                <div class="pl-3 inline-grid grid-cols-1 ">
                <div class="font-normal mb-1"><b>Saída:</b> ${viagem.data_saida}</div>
                    <div class="flex items-center mb-1">
                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                        <div class="font-normal text-gray-500">Aberta</div>
                    </div>
                    
                    <div class="font-normal text-gray-500">${viagem.rota}</div>
                    <div class="font-normal mb-1"><b>Chegada:</b> ${viagem.data_chegada}</div>
                </div>
            </td>

            <td class="w-4 p-4">
                <div class="text-base font-semibold">${viagem.reboque}</div>
                <div class="text-base">${viagem.veiculo}</div>

            </td>

            <td class="w-4 p-4">
                <div class="text-base font-semibold">${viagem.motorista}</div>
                <div class="text-base font-semibold">${viagem.motorista1}</div>

            </td>
            
            <td class="w-4 p-4">                
                <div class="text-base font-semibold">${viagem.abastecimento}</div>
                <div class="text-base font-semibold">${viagem.abastecimento_valor}</div>
                <div class="text-base font-semibold">${viagem.abastecimento}</div>
                <div class="text-base font-semibold">${viagem.observacoes}</div>
            </td>
        `;

        viagensBody.appendChild(newRow);
    });
};

// Declarar a variável aqui fora do escopo da função
let highlightedRow = null;

// Adicione um ouvinte de evento de clique para o botão addVeiculos
document.getElementById('addAbastecimento').addEventListener('click', () => {
    if (selectedViagemId !== null) {
        // O valor de selectedViagemId contém o ${viagem.id} da linha selecionada
        console.log('Valor de viagem.id:', selectedViagemId);

        // Faça algo com o valor de viagem.id, por exemplo, envie-o para uma função ou faça uma ação específica.
    } else {
        console.log('Nenhuma linha selecionada.');
        // Trate o caso em que nenhuma linha está selecionada.
    }
});

populateViagensTable();

import { addAbastecimento } from "../../../web/assets/js/fetch/abastecimento.js";


document.getElementById("btnCadastrarAbastecimento").addEventListener("click", function (e) {

    e.preventDefault();
    const form = document.getElementById("formAbastecimento");
    const formData = new FormData(form);

    formData.append("viagem_id", selectedViagemId);

    (async () => {
        try {

            const request = await addAbastecimento(formData);


        } catch {
            throw new Error(e)


        }
    })()

})
