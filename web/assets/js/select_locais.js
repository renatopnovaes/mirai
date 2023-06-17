import { getListLocais } from "./fetch/locais.js"

window.addEventListener('load', () => {
  createOptionForSelectLocais()
})

async function createOptionForSelectLocais() {
  const select_locais = document.querySelector('select[name="origem"]')
  const list_locais = await getListLocais()
  
  // Remove todos as options exceto a primeira
  Array.from(select_locais.querySelectorAll('option:not(:first-child)')).forEach(op => op[0].remove())
  
  // Adiciona as options
  if (Array.isArray(list_locais) && list_locais.length) {
    list_locais.forEach(local => {
      const { local_id, local_nome } = local
  
      if (local_id && local_nome) {
        select_locais.append(new Option(local_nome, local_id))
      }
    })
  }

}