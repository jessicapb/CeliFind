const image = document.getElementById('image');
const previewimg = document.getElementById('preview-img');
const imagename = document.getElementById('image-name');
const imagepreview = document.getElementById('image-preview')
const imagetrigger = document.getElementById('image-trigger');

function previewImage() {
    const input = image; // Agafar la imatge
    const file = input.files[0]; // Compte la imatge seleccionat

    if (file) {
        const reader = new FileReader(); // Crear un lector per la imatge
        reader.onload = function(e) { // S'executa quan la imatge ha sigut llegida
            previewimg.src = e.target.result; // Mostra la imatge
            imagename.textContent = file.name; // Mostra el nom 
            imagepreview.classList.remove('hidden'); // Vista prèvia 
        };
        reader.readAsDataURL(file); // Llegeix la imatge
    }
}

// Obre per escollir una imatge
imagetrigger.addEventListener('click', function() {
    image.click(); 
});