import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const allDeleteButtons = document.querySelectorAll('.js-delete-btn');

allDeleteButtons.forEach((deleteButton) => {
    deleteButton.addEventListener('click', function(event) {
        event.preventDefault();

        const deleteModal = document.getElementById('confirmDeleteModal');
        const comicTitle = this.dataset.comicTitle;
        deleteModal.querySelector('.modal-body').innerHTML = `Sei sicuro di voler eliminare il progetto ${comicTitle}?`

        const bsDeleteModal = new bootstrap.Modal(deleteModal);
        bsDeleteModal.show();

        const modalConfirmDelition = document.getElementById('confirm-deletion');
        modalConfirmDelition.addEventListener('click', function() {
            deleteButton.parentElement.submit();
        });
    });
});