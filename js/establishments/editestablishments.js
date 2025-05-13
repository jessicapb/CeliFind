// Hidden Form to be able to redirect with GET
function formWithPost(url, data) {
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

// Event listener for edit category buttons
document.querySelectorAll('.edit-establishments-btn').forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const description = button.getAttribute('data-description');
        const ingredients = button.getAttribute('data-ingredients');
        const nutritionalinformation = button.getAttribute('data-nutritionalinformation');
        const people = button.getAttribute('data-people');
        const duration = button.getAttribute('data-duration');
        const instruction = button.getAttribute('data-instruction');
        
        formWithPost('/establishmentsupdates', {
            id: id,
            name: name,
            description: description,
            ingredients: ingredients,
            nutritionalinformation: nutritionalinformation,
            people: people, 
            duration: duration,
            instruction: instruction,
        });
    });
});