let openmodal = document.querySelectorAll('.openmodal');
let deletemodal = document.querySelectorAll('.deletemodal');
let closemodal = document.querySelectorAll('.closemodal');

openmodal.forEach((button, open) => {
    button.addEventListener('click', () => {
        deletemodal[open].classList.remove('hidden');
    });
});

closemodal.forEach((button, close) => {
    button.addEventListener('click', () => {
        deletemodal[close].classList.add('hidden');
    });
});
