document.addEventListener('DOMContentLoaded', () => {
    if (typeof serverErrors !== 'undefined' && serverErrors) {
        let errorName = document.getElementById('error-name');
        let errorDescription = document.getElementById('error-description');
        let errorImage = document.getElementById('error-image');
        
        if (serverErrors.name && errorName) {
            errorName.textContent = serverErrors.name;
            errorName.classList.remove('hidden'); 
        }
        if (serverErrors.description && errorDescription) {
            errorDescription.textContent = serverErrors.description;
            errorDescription.classList.remove('hidden');
        }
        if (serverErrors.image && errorImage) {
            errorImage.textContent = serverErrors.image;
            errorImage.classList.remove('hidden');
        }
    }
});