import { openModal, closeModal } from '../../../web/assets/js/modal.js';

const modal = document.querySelector('.main-modal');
const modal2 = document.querySelector('.abatescimento-modal');


const closeButton = document.querySelectorAll('.modal-close');

for (let i = 0; i < closeButton.length; i++) {
    const elements = closeButton[i];
    elements.onclick = (e) => {
        closeModal('.main-modal');
        closeModal('.abatescimento-modal');

    }
}

modal.style.display = 'none';
modal2.style.display = 'none';


window.onclick = function (event) {
    if (event.target == modal) closeModal('.main-modal');
    if (event.target == modal2) closeModal('.abatescimento-modal');


}

document.getElementById('addCarga').addEventListener('click', () => openModal('.main-modal'));
document.getElementById('addAbastecimento').addEventListener('click', () => openModal('.abatescimento-modal'));



