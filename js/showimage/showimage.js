let image = document.getElementById('image');
let previewimg = document.getElementById('preview-img');
let imagename = document.getElementById('image-name');
let imagepreview = document.getElementById('image-preview')
let imagetrigger = document.getElementById('image-trigger');

function previewImage() {
    let input = image; // Agafar la imatge
    let file = input.files[0]; // Compte la imatge seleccionat

    if (file) {
        let reader = new FileReader(); // Crear un lector per la imatge
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