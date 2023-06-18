function atualizarListas(valor, listaAlvoId) {
    var listaAlvo = document.getElementById(listaAlvoId);
    var listaOrigem = document.getElementById("origem");
    var listaDestino = document.getElementById("destino");

    // Exibir todas as opções antes de atualizar
    for (var i = 0; i < listaOrigem.options.length; i++) {
        listaOrigem.options[i].style.display = "block";
    }
    for (var i = 0; i < listaDestino.options.length; i++) {
        listaDestino.options[i].style.display = "block";
    }

    // Ocultar o valor selecionado na lista alvo
    for (var i = 0; i < listaAlvo.options.length; i++) {
        if (listaAlvo.options[i].value === valor) {
            listaAlvo.options[i].style.display = "none";
            break;
        }
    }
}