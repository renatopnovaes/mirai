import { ApiClient } from "../common/helpers/request.js"
export const addViagem = async (formData) => {
    try {
        if (formData) {
            const response = await ApiClient.request({
                method: 'POST',
                url: '/Carga/addViagem.php',
                data: formData
            })

            alert(response.error || response.message);

            return response.message ? { message: response.message, status: true } : { message: response.error, status: false }
        }
    } catch (e) {
        throw new Error(e)
    }

}