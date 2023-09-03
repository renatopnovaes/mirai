import { getListViagemAberta } from "../../../web/assets/js/fetch/viagem.js"

const populateViagensTable = async () => {
    const viagensData = await getListViagemAberta();
    const viagensBody = document.getElementById('viagens-body');

    viagensData.forEach(viagem => {
        const newRow = document.createElement('tr');
        newRow.classList.add('border-b', 'border-gray-200', 'hover:bg-gray-100', 'hover:shadow-md', 'transition', 'duration-200');

        // Definindo o ouvinte de evento de clique para marcar o rádio
        newRow.addEventListener('click', () => {
            const radioInput = document.getElementById(`filter-radio-example-${viagem.id}`);
            radioInput.checked = true;
        });

        //newRow.setAttribute('id', `viagem-${viagem.id}`);
        //  newRow.setAttribute('onclick', `window.location.href = '/mirai/public/viagem/${viagem.id}'`);
        newRow.setAttribute('style', 'cursor: pointer');
        // Resto do código...

        newRow.innerHTML = `
            <td class="w-4 p-4">
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
                </div>
            </td>

            <td class="w-4 p-4">
                <div class="text-base font-semibold">${viagem.cavalinho}</div>
                <div class="text-base">${viagem.carreta}</div>

            </td>

            <td class="w-4 p-4">
                <div class="text-base font-semibold">${viagem.nome_motorista}</div>
                <div class="text-base font-semibold">${viagem.nome_motorista1}</div>

            </td>
            
            <td class="w-4 p-4">                
                <div class="text-base font-semibold">${viagem.chegada}</div>
                <div class="text-base font-semibold">${viagem.alerta_abastecimentos}</div>
                <div class="text-base font-semibold">${viagem.alerta_manutencao}</div>
                <div class="text-base font-semibold">${viagem.observacoes}</div>
            </td>
        `;

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
        });

        viagensBody.appendChild(newRow);
    });
};

// Declarar a variável aqui fora do escopo da função
let highlightedRow = null;


populateViagensTable();
