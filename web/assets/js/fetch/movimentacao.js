import { ApiClient } from "../common/helpers/request.js"

export const addMovimentacaoVasilhame = async (formData) => {
    if (formData) {
        console.log(formData)
        const response = await ApiClient.request({
            method: 'POST',
            url: '/MovimentoVasilhame/addMovimentoVasilhame.php',
            data: formData
        })

        alert(response.error || response.message);

    }
}


