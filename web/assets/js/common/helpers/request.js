
const BASE_URL = "/mirai/src/Application/Request"

export const ApiClient = {
    request: async ({ method, url, data }) => {
        try {
            const response = await fetch(BASE_URL.concat(url), {
                method,
                body: data
            })

            if (response.ok) {
                const data = await response.json()
                return data
            }

        } catch (err) {
            console.log(err)
        }
    }
}