import { addCargaVasilhame } from "./fetch/carga.js";
import { closeModal } from './closeModal.js'

const inputCarga = document.querySelector('input[name="numero_carga"]');
const inputDataCarga = document.querySelector('input[name="data_carga"]');
const btnSalvarCarga = document.getElementById("salvar_carga");

btnSalvarCarga.addEventListener("click", () => {
  const numero_carga = inputCarga.value.trim();
  const data_carga = inputDataCarga.value.trim();

  const formData = new FormData();
  formData.append('numero_carga', numero_carga);
  formData.append('data_carga', data_carga);

  // Enviar a requisição usando fetch
  // addCargaVasilhame(formData)


  (async () => {
    try {
      const request = await addCargaVasilhame(formData);

      if (request.status) return closeModal(request.status)
      console.log("status nao entrou")
    } catch {


    }
  })()
});