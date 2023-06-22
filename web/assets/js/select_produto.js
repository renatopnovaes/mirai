import { getListProdutos } from "./fetch/produto.js"



window.addEventListener('load', () => {
    createOptionForSelectProduto()
})

async function createOptionForSelectProduto() {
    const select_produto = document.querySelector('select[name="produto"]')
    const list_produto = await getListProdutos()

    // Remove todos as options exceto a primeira
    Array.from(select_produto.querySelectorAll('option:not(:first-child)')).forEach(op => op[0].remove())

    // Adiciona as options
    if (Array.isArray(list_produto) && list_produto.length) {
        list_produto.forEach(produto => {
            const { produto_id, produto_nome, produto_quantidade } = produto


            if (produto_id && produto_nome) {
                select_produto.append(new Option(produto_nome.concat("(", produto_quantidade, ")"), produto_id))
            }
        })
    }

}