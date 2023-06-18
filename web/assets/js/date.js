window.addEventListener('load', () => {   
    // Obtém o elemento do seletor de data
    const dataInput = document.getElementById('data_carga');

    // Obtém a data atual
    const dataAtual = new Date();

    // Calcula a data mínima permitida (10 dias anteriores)
    const dataMinima = new Date();
    dataMinima.setDate(dataAtual.getDate() - 10);

    // Calcula a data máxima permitida (data de hoje)
    const dataMaxima = new Date();
    dataMaxima.setDate(dataAtual.getDate());

    // Converte as datas para o formato aceito pelo seletor de data (AAAA-MM-DD)
    const dataMinimaFormatada = dataMinima.toISOString().split('T')[0];
    const dataMaximaFormatada = dataMaxima.toISOString().split('T')[0];

    // Define a data mínima e máxima no seletor de data
    dataInput.setAttribute('min', dataMinimaFormatada);
    dataInput.setAttribute('max', dataMaximaFormatada);
})
