import { ApiClient } from "../common/helpers/request.js"

export const getListCargaVasilhame = async () => {
  const listCarga = await ApiClient.request({
    method: 'GET',
    url: '/Carga/getCargaVasilhame.php'
  })

  return listCarga
}

export const addCargaVasilhame = async (formData) => {
  try {
    if (formData) {
      const response = await ApiClient.request({
        method: 'POST',
        url: '/Carga/addCargaVasilhame.php',
        data: formData
      })

      alert(response.error || response.message);

      return response.message ? { message: response.message, status: true } : { message: response.error, status: false }
    }
  } catch (e) {
    throw new Error(e)
  }

}

export const getBuscaCargaVasilhame = async (procuraCarga) => {
  const buscaCarga = await ApiClient.request({
    method: 'GET',
    url: `/Carga/getCargaVasilhame.php?carga_vasilhame=${procuraCarga}`
  })

  return buscaCarga
}

