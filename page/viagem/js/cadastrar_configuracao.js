import { addConfigViagem } from "../../../web/assets/js/fetch/viagem.js";

let selectedViagemId = null; // Certifique-se de definir a variável fora dos eventos

// Adicione um ouvinte de evento de clique para o botão addVeiculos
document.getElementById('addVeiculos').addEventListener('click', () => {
    if (selectedViagemId !== null) {
        // O valor de selectedViagemId contém o ${viagem.id} da linha selecionada
        console.log('Valor de viagem.id:', selectedViagemId);

        // Faça algo com o valor de viagem.id, por exemplo, envie-o para uma função ou faça uma ação específica.
    } else {
        console.log('Nenhuma linha selecionada.');
        // Trate o caso em que nenhuma linha está selecionada.
    }
});

// Adicione um ouvinte de evento de clique para o botão btnCadastrarConfigViagem
document.getElementById("btnCadastrarConfigViagem").addEventListener("click", function (e) {
    e.preventDefault();
    const form = document.getElementById("formConfig");
    const formData = new FormData(form);

    if (selectedViagemId !== null) {
        // Adicione o valor de selectedViagemId ao formData
        formData.append("selectedViagemId", selectedViagemId);
    }

    console.log(formData);

    // Aqui você pode chamar a função addConfigViagem(formData);
});

/*
document.getElementById("btnCadastrarConfigViagem").addEventListener("click", function (e) {

    e.preventDefault();
    const form = document.getElementById("formConfig");
    const formData = new FormData(form);
    console.log("cilck")

    addConfigViagem(formData);

    (async () => {
           try {

               const request = await addConfigViagem(formData);

           } catch { }


       })
})
*/


