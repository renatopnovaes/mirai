import { getListLocais } from "./fetch/locais.js"

window.addEventListener('load', () => {
  const select_origem = document.querySelector('select[name="origem"]')
  const select_destino = document.querySelector('select[name="destino"]')

  createOptionForSelectLocais([select_origem, select_destino])

})

async function createOptionForSelectLocais(colletion) {
  const list_locais = await getListLocais()

  Array.from(colletion).forEach(select => {

    // Remove todos as options exceto a primeira
    Array.from(select.querySelectorAll('option:not(:first-child)')).forEach(op => op[0].remove())

    // Adiciona as options
    if (Array.isArray(list_locais)) {
      Array.from(list_locais).forEach(local => {
        const { local_id, local_nome } = local

        if (local_id && local_nome) {
          select.append(new Option(local_nome, local_id))
        }
      })
    }
  })
}