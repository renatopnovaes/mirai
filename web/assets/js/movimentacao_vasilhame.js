import { addMovimentacaoVasilhame } from "./fetch/movimentacao.js";
import { createTableMovimentacao } from "./tabela_movimentacao.js"

const form = document.getElementById('vasilhame_movimentacao');
form.addEventListener('submit', resetarCampos);

function resetarCampos(e) {
    e.preventDefault();

    const inputProduto = document.getElementById('produto');
    const inputQuantidade = document.getElementById('quantidade');
    const inputQuantidadeTotal = document.getElementById('quantidade_total');
    const inputQuantidadeUnidade = document.getElementById('quantidade_unidade');
    const inputObservacoes = document.getElementById('observacoes');

    const formData = new FormData(form);

    (async () => {
        try {
            const response = await addMovimentacaoVasilhame(formData);

            if (response.status) {



                // Limpar os campos específicos do formulário
                inputProduto.value = '';
                inputQuantidade.value = '';
                inputQuantidadeUnidade.value = '';
                inputObservacoes.value = '';
                inputQuantidadeTotal.value = '';

                // Realizar uma nova requisição para atualizar a tabela


                createTableMovimentacao();
            } else {
                console.log("Erro ao adicionar a movimentação:", response.error);
            }
        } catch (error) {
            console.error('Erro ao adicionar a movimentação:', error);
        }
    })();
}