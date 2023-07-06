import { ApiClient } from "../common/helpers/request.js"

export const addMovimentacaoVasilhame = async (formData) => {
    if (formData) {
        const response = await ApiClient.request({
            method: 'POST',
            url: '/MovimentoVasilhame/addMovimentoVasilhame.php',
            data: formData
        })

        alert(response.error || response.message);

        return response.message ? { message: response.message, status: true } : { message: response.error, status: false }

    }
}



export const getListMovimentacao = async () => {
    const listMovimentacao = await ApiClient.request({
        method: 'GET',
        url: '/MovimentoVasilhame/getMovimentoVasilhame.php'
    })


    return listMovimentacao

}


export const removeOneMovimentacaoVasilhame = async (rowId) => {

    const response = await ApiClient.request({
        method: 'DELETE',
        url: '/MovimentoVasilhame/removeMovimentoVasilhame.php',
        data: JSON.stringify({ id: rowId })

    })

    alert(response.error || response.message)
}


export const getVwListMovimentacao = async () => {
    const VwlistMovimentacao = await ApiClient.request({
        method: 'GET',
        url: '/Views/getVwMovimentoVasilhame.php'
    })

    return VwlistMovimentacao
}

export const getVwEstoqueVasilhame = async () => {
    const VwListEstoque = await ApiClient.request({
        method: 'GET',
        url: '/Views/getVwEstoqueVasilhame.php'
    })

    return VwListEstoque
}