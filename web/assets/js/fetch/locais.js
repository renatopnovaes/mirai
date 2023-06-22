import { ApiClient } from "../common/helpers/request.js"



export const getListLocais = async () => {
  const listLocais = await ApiClient.request({
    method: 'GET',
    url: '/Locais/getLocais.php'
  })

  return listLocais

}

