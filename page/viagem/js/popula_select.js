import { getListRotas } from "../../../web/assets/js/fetch/rota.js"

document.getElementById('addCarga').addEventListener('click', async () => {
    populateRotasSelect();
});


const populateRotasSelect = async () => {
    const rotasData = await getListRotas();
    const rotasSelect = document.getElementById('rota');

    // Limpe o select antes de adicionar novas opções
    rotasSelect.innerHTML = '';

    const defaultOption = document.createElement('option');
    defaultOption.selected = true;
    defaultOption.textContent = 'Escolha a Rota';
    rotasSelect.appendChild(defaultOption);

    rotasData.forEach(rota => {
        const newOption = document.createElement('option');
        newOption.setAttribute('value', rota.id);
        newOption.innerHTML = rota.rota;

        rotasSelect.appendChild(newOption);
    });
}



// }

// window.addEventListener('load', () => {
//     createOptionForSelectProduto()
// })

// async function createOptionForSelectProduto() {
//     const select_produto = document.querySelector('select[name="produto"]')
//     const list_produto = await getListProdutos()

//     // Remove todos as options exceto a primeira
//     Array.from(select_produto.querySelectorAll('option:not(:first-child)')).forEach(op => op[0].remove())

//     // Adiciona as options
//     if (Array.isArray(list_produto) && list_produto.length) {
//         list_produto.forEach(produto => {
//             const { produto_id, produto_nome, produto_quantidade } = produto


//             if (produto_id && produto_nome) {
//                 select_produto.append(new Option(produto_nome.concat("(", produto_quantidade, ")"), produto_id))
//             }
//         })
//     }

// }