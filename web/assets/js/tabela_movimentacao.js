import { getListMovimentacao, removeOneMovimentacaoVasilhame } from "./fetch/movimentacao.js";
window.addEventListener('load', () => {
    createTableMovimentacao();
});

export async function createTableMovimentacao() {
    try {
        const response = await getListMovimentacao();

        let table = document.getElementById('movimentacaoTable');
        let tbody;

        // Limpa o conteúdo do tbody existente
        if (table) {
            tbody = table.querySelector('tbody');
            tbody.innerHTML = '';
        }

        // Se a tabela não existe, cria uma nova
        if (response.length > 0) {
            if (!table) {
                table = document.createElement('table');
                table.id = 'movimentacaoTable';
                table.className = 'table table-striped';

                // Cria o cabeçalho da tabela
                const thead = document.createElement('thead');
                const headerRow = document.createElement('tr');

                const headers = ['Carga', 'Origem', 'Destino', 'Produto', 'Quantidade', 'Observação', 'Ação'];

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
            }

            response.forEach(item => {
                const row = document.createElement('tr');

                const cells = [
                    item.movimento_vasilhame_carga,
                    item.movimento_vasilhame_origem,
                    item.movimento_vasilhame_destino,
                    item.movimento_vasilhame_produto,
                    item.movimento_vasilhame_quantidade,
                    item.movimento_vasilhame_observacao
                ];

                cells.forEach(cellValue => {
                    const td = document.createElement('td');
                    td.textContent = cellValue;
                    row.appendChild(td);
                });

                const deleteCell = document.createElement('td');
                const deleteLink = document.createElement('a');
                deleteLink.href = '#';
                deleteLink.classList.add('text-danger', 'delete-row');
                deleteLink.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
            </svg>
          `;

                deleteLink.addEventListener('click', () => {
                    console.log(item.movimento_vasilhame_id);
                    deleteRow(item.movimento_vasilhame_id);
                });

                deleteCell.appendChild(deleteLink);
                row.appendChild(deleteCell);

                tbody.appendChild(row);
            });
        }
    } catch (error) {
        console.error('Erro ao obter a lista de movimentações:', error);
    }
}


function deleteRow(rowId) {
    if (confirm('Você tem certeza que quer remover o registro??')) {
        removeOneMovimentacaoVasilhame(rowId)
            .then(() => {
                console.log(`Registro ${rowId} excluído com sucesso.`);

                // Atualizar Tabela
                const tableContainer = document.getElementById('tableContainer');
                tableContainer.innerHTML = ''; // Limpa o conteúdo do contêiner
                createTableMovimentacao(); // Cria uma nova tabela atualizada
            })
            .catch(error => {
                console.error(`Error ao deletar a linha de id ${rowId}:`, error);
            });
    }
}
