document.addEventListener('DOMContentLoaded', function () {
    const closeUpdateModal = document.querySelector('.closeupdatemodal');
    const updateModal = document.querySelector('.updatemodal');

    if (closeUpdateModal && updateModal) {
        closeUpdateModal.addEventListener('click', () => {
            updateModal.classList.add('hidden');
        });
    }
})