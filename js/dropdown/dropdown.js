let dropdown = document.getElementById('dropdown-toggle');
let dropdownmenu = document.getElementById('dropdown-menu')

dropdown.addEventListener('click', function() {
    const menu = dropdownmenu;
    menu.classList.toggle('hidden');
});