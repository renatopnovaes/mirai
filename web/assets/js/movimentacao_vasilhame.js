import { addMovimentacaoVasilhame } from "./fetch/movimentacao.js";

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


    addMovimentacaoVasilhame(formData)

    // Limpar os campos específicos do formulário
    inputProduto.value = '';
    inputQuantidade.value = '';
    inputQuantidadeUnidade.value = '';
    inputObservacoes.value = '';
    inputQuantidadeTotal.value = '';
}
