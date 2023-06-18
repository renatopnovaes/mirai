export const getListProdutos = async () => {
  try {
    const response = await fetch("/mirai/src/Application/Request/Fetch/ProdutoFetch.php")

    if (response.ok) {
      const data = await response.json()
      return data
    }
  } catch (err) {
    console.log(err)
  }
}