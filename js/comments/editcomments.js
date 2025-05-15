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

document.querySelector('.submit-comment-btn').addEventListener('click', () => {
    e.preventDefault();
    const formData = {
        id: '<?= $formData["id"] ?? "" ?>',
        name: document.querySelector('#name').value,
        description: document.querySelector('#description').value
    };

    formWithPostSub('/savecomments', formData);
});