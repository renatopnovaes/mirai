const myModal = new bootstrap.Modal("#novaCarga");


export function closeModal(status) { 
  const modalBackDrop = document.querySelector(".modal-backdrop");
  const success = "Carga cadastrada com sucesso!";

  if (!status) return

  myModal.hide();
}

