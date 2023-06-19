import { ApiClient } from "../common/helpers/request.js"

export const getListProdutos = async () => {
  const listProduto = await ApiClient.request({
    method: 'GET',
    url: '/Produto/getProduto.php'
  })

  return listProduto
}