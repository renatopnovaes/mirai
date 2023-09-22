import { ApiClient } from "../common/helpers/request.js"

export const getListReboque = async () => {
  const listReboque = await ApiClient.request({
    method: 'GET',
    url: '/Reboque/getAllReboque.php'
  })

  return listReboque
}