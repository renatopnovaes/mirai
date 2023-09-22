import { getListRotas } from "../../../web/assets/js/fetch/rota.js"
import { getListVeiculos } from "../../../web/assets/js/fetch/veiculo.js"
import { getListReboque } from "../../../web/assets/js/fetch/reboque.js"
import { getListMotoristas } from "../../../web/assets/js/fetch/motorista.js"

document.getElementById('addCarga',).addEventListener('click', async () => {
    populateRotasSelect();
    populateVeiculosSelect();
    populateReboquesSelect();
    populateMotoristasSelect();
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


document.getElementById('addVeiculos',).addEventListener('click', async () => {


    populateVeiculosSelect();
    populateReboquesSelect();
    populateMotoristasSelect();
});


const populateVeiculosSelect = async () => {
    const veiculosData = await getListVeiculos();
    const veiculosSelect = document.getElementById('veiculo_select');

    veiculosSelect.innerHTML = '';

    const defaultOption = document.createElement('option');
    defaultOption.selected = true;
    defaultOption.textContent = 'Escolha o Veículo';
    veiculosSelect.appendChild(defaultOption);



    veiculosData.forEach(veiculo => {
        const newOption = document.createElement('option');
        newOption.setAttribute('value', veiculo.id);
        newOption.innerHTML = veiculo.placa;

        veiculosSelect.appendChild(newOption);

    })
}

const populateReboquesSelect = async () => {
    const reboquesData = await getListReboque();
    const reboquesSelect = document.getElementById('reboque_select');

    reboquesSelect.innerHTML = '';

    const defaultOption = document.createElement('option');
    defaultOption.selected = true;
    defaultOption.textContent = 'Escolha o Reboque';
    reboquesSelect.appendChild(defaultOption);

    reboquesData.forEach(reboque => {
        const newOption = document.createElement('option');
        newOption.setAttribute('value', reboque.id);
        newOption.innerHTML = reboque.placa;

        reboquesSelect.appendChild(newOption);

    })
}

const populateMotoristasSelect = async () => {
    const motoristasData = await getListMotoristas();
    const motoristasSelect = document.getElementById('motorista_select');

    motoristasSelect.innerHTML = '';

    const defaultOption = document.createElement('option');
    defaultOption.selected = true;
    defaultOption.textContent = 'Escolha o Motorista';
    motoristasSelect.appendChild(defaultOption);

    motoristasData.forEach(motorista => {
        const newOption = document.createElement('option');
        newOption.setAttribute('value', motorista.id);
        newOption.innerHTML = motorista.nome;

        motoristasSelect.appendChild(newOption);

    })
}