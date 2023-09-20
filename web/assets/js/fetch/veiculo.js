import { ApiClient } from "../common/helpers/request.js"

export const getListVeiculos = async () => {
    const listVeiculos = await ApiClient.request({
        method: 'GET',
        url: '/Veiculo/getVeiculosLivres.php'
    })

    return listVeiculos

}