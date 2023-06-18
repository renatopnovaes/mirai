export const getListCargaVasilhame = async () => {
    try {
      const response = await fetch("/mirai/src/Application/Request/Fetch/CargaVasilhameFetch.php")
    
      if (response.ok) {
        const data = await response.json()
        return data
      }
    } catch(err) {
      console.log(err)
    }
  }