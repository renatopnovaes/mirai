import { addViagem } from "../../../web/assets/js/fetch/viagem.js";

document.getElementById("btnCadastrarViagem").addEventListener("click", function (e) {

    e.preventDefault();
    const form = document.getElementById("formViagem");
    const formData = new FormData(form);


    (async () => {
        try {

            const request = await addViagem(formData);

            if (request.status) return atualizarLista(request.status)
            console.log("status nao entrou")
        } catch {


        }
    })()

})