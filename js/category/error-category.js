document.addEventListener('DOMContentLoaded', () => {
    if (typeof serverErrors !== 'undefined' && serverErrors) {
        // Error name
        if (serverErrors) {
            let errorName = document.getElementById('error-name');
            let errorDescription = document.getElementById('error-description');
            let errorImage = document.getElementById('error-image');

            if (errorName) {
                errorName.textContent = serverErrors.name;
                errorName.style.display = 'block';  
            }
            if (errorDescription) {
                errorDescription.textContent = serverErrors.description; 
                errorDescription.style.display = 'block'; 
            }
            if (errorImage) {
                errorImage.textContent = serverErrors.ingredients; 
                errorImage.style.display = 'block';  
            }
        }
    }
});