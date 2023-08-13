// Função para criar o formulário
export function criarSaidaVeiculos() {
    // Criar o elemento form
    var form = document.createElement('form');
    form.classList.add('row', 'gy-2', 'gx-3', 'align-items-center', 'border');

    // Criar o elemento div com a classe "row"
    var divRow = document.createElement('div');
    divRow.classList.add('row', 'mt-1');

    // Criar o elemento h6
    var h6 = document.createElement('h6');
    h6.textContent = 'Saída';

    // Adicionar o h6 dentro da div com a classe "row"
    divRow.appendChild(h6);

    // Adicionar a div com a classe "row" dentro do formulário
    form.appendChild(divRow);

    // Criar o primeiro elemento div com a classe "col"
    var divCol1 = document.createElement('div');
    divCol1.classList.add('col');

    // Adicionar o primeiro div com a classe "col" dentro do formulário
    form.appendChild(divCol1);

    // Criar o segundo elemento div com a classe "col" e a classe "mb-2"
    var divCol2 = document.createElement('div');
    divCol2.classList.add('col', 'mb-2');

    // Criar o elemento div com a classe "input-group"
    var divInputGroup1 = document.createElement('div');
    divInputGroup1.classList.add('input-group');

    // Criar o elemento div com a classe "input-group-text"
    var divInputGroupText1 = document.createElement('div');
    divInputGroupText1.classList.add('input-group-text');
    divInputGroupText1.textContent = 'Data';

    // Criar o elemento input com o atributo type definido como "date"
    var inputDate = document.createElement('input');
    inputDate.setAttribute('type', 'date');
    inputDate.classList.add('form-control');
    inputDate.setAttribute('id', 'data');
    inputDate.setAttribute('placeholder', 'Insira a Data');

    // Adicionar o div com a classe "input-group-text" dentro do div com a classe "input-group"
    divInputGroup1.appendChild(divInputGroupText1);
    // Adicionar o input dentro do div com a classe "input-group"
    divInputGroup1.appendChild(inputDate);
    // Adicionar o div com a classe "input-group" dentro do div com a classe "col mb-2"
    divCol2.appendChild(divInputGroup1);
    // Adicionar o div com a classe "col mb-2" dentro do formulário
    form.appendChild(divCol2);

    // Criar o terceiro elemento div com a classe "col" e a classe "mb-2"
    var divCol3 = document.createElement('div');
    divCol3.classList.add('col', 'mb-2');

    // Criar o elemento div com a classe "input-group"
    var divInputGroup2 = document.createElement('div');
    divInputGroup2.classList.add('input-group');

    // Criar o elemento div com a classe "input-group-text"
    var divInputGroupText2 = document.createElement('div');
    divInputGroupText2.classList.add('input-group-text');
    divInputGroupText2.textContent = 'Horário';

    // Criar o elemento input com o atributo type definido como "time"
    var inputTime = document.createElement('input');
    inputTime.setAttribute('type', 'time');
    inputTime.classList.add('form-control');
    inputTime.setAttribute('id', 'horario');
    inputTime.setAttribute('placeholder', 'Insira o Horário');

    // Adicionar o div com a classe "input-group-text" dentro do div com a classe "input-group"
    divInputGroup2.appendChild(divInputGroupText2);
    // Adicionar o input dentro do div com a classe "input-group"
    divInputGroup2.appendChild(inputTime);
    // Adicionar o div com a classe "input-group" dentro do div com a classe "col mb-2"
    divCol3.appendChild(divInputGroup2);
    // Adicionar o div com a classe "col mb-2" dentro do formulário
    form.appendChild(divCol3);

    // Criar o quarto elemento div com a classe "col" e a classe "mb-2"
    var divCol4 = document.createElement('div');
    divCol4.classList.add('col', 'mb-2');

    // Criar o elemento div com a classe "input-group"
    var divInputGroup3 = document.createElement('div');
    divInputGroup3.classList.add('input-group');

    // Criar o elemento div com a classe "input-group-text"
    var divInputGroupText3 = document.createElement('div');
    divInputGroupText3.classList.add('input-group-text');
    divInputGroupText3.textContent = 'KM';

    // Criar o elemento input com o atributo type definido como "number"
    var inputKm = document.createElement('input');
    inputKm.setAttribute('type', 'number');
    inputKm.classList.add('form-control');
    inputKm.setAttribute('id', 'km');
    inputKm.setAttribute('placeholder', 'Insira a KM');

    // Adicionar o div com a classe "input-group-text" dentro do div com a classe "input-group"
    divInputGroup3.appendChild(divInputGroupText3);
    // Adicionar o input dentro do div com a classe "input-group"
    divInputGroup3.appendChild(inputKm);
    // Adicionar o div com a classe "input-group" dentro do div com a classe "col mb-2"
    divCol4.appendChild(divInputGroup3);
    // Adicionar o div com a classe "col mb-2" dentro do formulário
    form.appendChild(divCol4);

    // Criar o quinto elemento div com a classe "col-2" e a classe "mb-2"
    var divCol5 = document.createElement('div');
    divCol5.classList.add('col-2', 'mb-2');

    // Criar o elemento button com o atributo type definido como "submit"
    var buttonSubmit = document.createElement('button');
    buttonSubmit.setAttribute('type', 'submit');
    buttonSubmit.classList.add('btn', 'btn-primary');
    buttonSubmit.textContent = 'Salvar Saída';

    // Adicionar o button dentro do div com a classe "col-2 mb-2"
    divCol5.appendChild(buttonSubmit);
    // Adicionar o div com a classe "col-2 mb-2" dentro do formulário
    form.appendChild(divCol5);

    // Adicionar o formulário criado ao DOM
    document.body.appendChild(form);
}

