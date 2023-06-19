import { ApiClient } from "../common/helpers/request.js"

export const getListCargaVasilhame = async () => {
  const listCarga = await ApiClient.request({
    method: 'GET',
    url: '/Carga/getCargaVasilhame.php'
  })

  return listCarga
}

export const addCargaVasilhame = async (formData) => {
  if (formData) {
    const response = await ApiClient.request({
      method: 'POST',
      url: '/Carga/addCargaVasilhame.php',
      data: formData
    })

    if (response) {
      alert(
        response?.error 
        || response?.message 
        || "Requisição não realizada. Por favor entre em contato com o supporte!"
      )
    }
  }
}