import { getVwEstoqueVasilhame } from './fetch/movimentacao.js'



window.addEventListener('load', () => {
    createTableEstoque()

})

export async function createTableEstoque() {
    try {
        const response = await getVwEstoqueVasilhame();

        console.log(response);

        let table = document.getElementById('tabela_estoque');
        let tbody;

        // Se a tabela não existe, cria uma nova
        if (!table) {
            table = document.createElement('table');
            table.id = 'tabela_estoque';
            table.className = 'table table-striped mt-3';

            // Cria o cabeçalho da tabela
            const thead = document.createElement('thead');
            const headerRow = document.createElement('tr');

            const headers = ['Local', 'Produto', 'Total'];

            headers.forEach(headerText => {
                const th = document.createElement('th');
                th.textContent = headerText;
                headerRow.appendChild(th);
            });

            thead.appendChild(headerRow);
            table.appendChild(thead);

            // Cria o corpo da tabela
            tbody = document.createElement('tbody');
            table.appendChild(tbody);

            // Adiciona a tabela ao elemento com o ID 'tableContainer' (substitua pelo ID correto do elemento)
            const tableContainer = document.getElementById('tableContainer');
            tableContainer.appendChild(table);
        } else {
            tbody = table.querySelector('tbody');
            if (!tbody) {
                tbody = document.createElement('tbody');
                table.appendChild(tbody);
            }
        }

        tbody.innerHTML = '';

        response.forEach(item => {
            const row = document.createElement('tr');

            const cells = [
                item.local,
                item.produto,
                item.total
            ];

            cells.forEach(cellText => {
                const cell = document.createElement('td');
                cell.textContent = cellText;
                row.appendChild(cell);
            });

            tbody.appendChild(row);
        });
    } catch (error) {
        console.error('Erro ao obter a lista de movimentações:', error);
    }
}


