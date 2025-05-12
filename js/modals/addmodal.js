document.addEventListener('DOMContentLoaded', function () {
    const addUpdateModal = document.querySelector('.addmodal');
    const updateModal = document.querySelector('.updatemodal');

    if (addUpdateModal && updateModal) {
        addUpdateModal.addEventListener('click', () => {
            updateModal.classList.add('hidden');
        });
    }
})