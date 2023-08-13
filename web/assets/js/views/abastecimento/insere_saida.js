import { criarSaidaVeiculos } from "./common/saida_veiculos.js";
document.getElementById('adicionar_abastecimento').addEventListener('click', () => {
    criarSaidaVeiculos(document.getElementById('nova_saida'))
})