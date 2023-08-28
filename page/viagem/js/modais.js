import { openModal, closeModal } from '../../../web/assets/js/modal.js';

const modal = document.querySelector('.main-modal');
const closeButton = document.querySelectorAll('.modal-close');

for (let i = 0; i < closeButton.length; i++) {
    const elements = closeButton[i];
    elements.onclick = (e) => closeModal('.main-modal');
}

modal.style.display = 'none';

window.onclick = function (event) {
    if (event.target == modal) closeModal('.main-modal');
}

document.getElementById('addCarga').addEventListener('click', () => openModal('.main-modal'));
