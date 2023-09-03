import { ApiClient } from "../common/helpers/request.js"



export const getListRotas = async () => {
    const listRotas = await ApiClient.request({
        method: 'GET',
        url: '/Rota/getRotas.php'
    })

    return listRotas

}

