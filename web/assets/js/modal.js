export function openModal(modalSelector) {
    const modal = document.querySelector(modalSelector);
    modal.classList.remove('fadeOut');
    modal.classList.add('fadeIn');
    modal.style.display = 'flex';
}

export function closeModal(modalSelector) {
    const modal = document.querySelector(modalSelector);
    modal.classList.remove('fadeIn');
    modal.classList.add('fadeOut');
    setTimeout(() => {
        modal.style.display = 'none';
    }, 500);
}