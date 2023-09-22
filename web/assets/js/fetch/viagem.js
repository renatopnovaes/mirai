import { ApiClient } from "../common/helpers/request.js"
export const addViagem = async (formData) => {
    try {
        if (formData) {
            const response = await ApiClient.request({
                method: 'POST',
                url: '/Viagem/addViagem.php',
                data: formData
            })

            alert(response.error || response.message);

            return response.message ? { message: response.message, status: true } : { message: response.error, status: false }
        }
    } catch (e) {
        throw new Error(e)
    }

}

export const getListViagemAberta = async () => {
    const listViagem = await ApiClient.request({
        method: 'GET',
        url: '/Viagem/getViagemAtiva.php'
    })

    return listViagem

}

export const addConfigViagem = async (formData) => {
    try {
        if (formData) {
            const response = await ApiClient.request({
                method: 'POST',
                url: '/Viagem/addConfigViagem.php',
                data: formData
            })

            alert(response.error || response.message);

          //  return response.message ? { message: response.message, status: true } : { message: response.error, status: false }
        }
    } catch (e) {
        throw new Error(e)
    }

}