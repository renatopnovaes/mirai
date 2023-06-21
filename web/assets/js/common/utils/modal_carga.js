const modalCarga = document.querySelector('#novaCarga')
const formCarga = document.querySelector('#form_carga')

modalCarga.addEventListener('hidden.bs.modal', event => {
  formCarga.reset()
})


