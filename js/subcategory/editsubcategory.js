// Hidden Form to be able to redirect with GET
function formWithPostSub(url, data) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = url;

    for (const clave in data) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = clave;
        input.value = data[clave];
        form.appendChild(input);
    }

    document.body.appendChild(form);
    form.submit();
}

// Event listener for edit subcategory buttons
document.querySelectorAll('.edit-subcategory-btn').forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const description = button.getAttribute('data-description');
        const idcategoria = button.getAttribute('data-idcategoria');

        formWithPostSub('/subcategoryupdate', {
            id: id,
            name: name,
            description: description,
            idcategoria: idcategoria
        });
    });
});
