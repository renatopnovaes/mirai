import { getBuscaCargaVasilhame } from "./fetch/carga.js";

const inputCarga = document.getElementById('carga_vasilhame');

inputCarga.addEventListener("input", () => {
    const procuraCarga = inputCarga.value.trim();

    getBuscaCargaVasilhame(procuraCarga)
        .then(listCarga => {

            const dataList = document.getElementById('carga');

            dataList.innerHTML = ''; // Limpa as opções existentes

            if (Array.isArray(listCarga) && listCarga.length) {
                listCarga.forEach(carga => {
                    const { carga_id, carga_numero, carga_data } = carga;
                    if (carga_id && carga_numero) {
                        const optionElement = document.createElement('option');
                        optionElement.value = carga_numero;
                        dataList.appendChild(optionElement);
                    }
                });
            }
        })
        .catch(error => {
            console.error('Erro ao obter os dados:', error);
        });
});
