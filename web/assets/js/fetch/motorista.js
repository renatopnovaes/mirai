import { ApiClient } from "../common/helpers/request.js"



export const getListMotoristas = async () => {
    const listMotoristas = await ApiClient.request({
        method: 'GET',
        url: '/Motorista/getAllMotorista.php'
    })

    return listMotoristas

}