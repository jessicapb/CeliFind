document.addEventListener("DOMContentLoaded", function () {
    const searchModal = document.querySelector('.searchmodal');
    const closeSearchModal = document.querySelector('.closesearchmodal');

    if (searchModal && closeSearchModal) {
        closeSearchModal.addEventListener('click', () => {
            searchModal.classList.add('hidden');
        });
    }
});