import { ApiClient } from "../common/helpers/request.js"
export const addAbastecimento = async (formData) => {
    try {
        if (formData) {
            const response = await ApiClient.request({
                method: 'POST',
                url: '/Abastecimento/addAbastecimento.php',
                data: formData
            })

            alert(response.error || response.message);

            return response.message ? { message: response.message, status: true } : { message: response.error, status: false }
        }
    } catch (e) {
        throw new Error(e)
    }

}