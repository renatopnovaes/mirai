export const getListLocais = async () => {
  try {
    const response = await fetch("/mirai/src/Application/Request/Fetch/LocaisFetch.php")
  
    if (response.ok) {
      const data = await response.json()
      return data
    }
  } catch(err) {
    console.log(err)
  }
}