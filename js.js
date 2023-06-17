
// Obtém o elemento do seletor de data
const dataInput = document.getElementById('data_carga');

// Obtém a data atual
const dataAtual = new Date();

// Calcula a data mínima permitida (10 dias anteriores)
const dataMinima = new Date();
dataMinima.setDate(dataAtual.getDate() - 10);

// Calcula a data máxima permitida (data do dia)
const dataMaxima = new Date();
dataMaxima.setDate(dataAtual.getDate() - 1);

// Converte as datas para o formato aceito pelo seletor de data (AAAA-MM-DD)
const dataMinimaFormatada = dataMinima.toISOString().split('T')[0];
const dataMaximaFormatada = dataMaxima.toISOString().split('T')[0];

// Define a data mínima e máxima no seletor de data
dataInput.setAttribute('min', dataMinimaFormatada);
dataInput.setAttribute('max', dataMaximaFormatada);

//obtém origem
const selectProduto = document.getElementById('origem');

//busca produtos para popular origem e destino
fetch('busca_local.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(produto => {
            const option = document.createElement('option');
            option.value = produto.id;
            option.textContent = produto.nome;
            selectProduto.appendChild(option);
            console.log(selectProduto)
        });
    })
    .catch(error => {
        console.error('Erro na requisição:', error);
    });
