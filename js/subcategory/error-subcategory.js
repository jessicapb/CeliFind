document.addEventListener('DOMContentLoaded', () => {
    if (typeof serverErrors !== 'undefined' && serverErrors) {
        if (serverErrors) {
            let errorName = document.getElementById('error-name');
            let errorDescription = document.getElementById('error-description');
            let errorIdCategoria = document.getElementById('error-idcategory');
            
            if (errorName) {
                errorName.textContent = serverErrors.name;
                errorName.style.display = 'block';  
            }
            if (errorDescription) {
                errorDescription.textContent = serverErrors.description; 
                errorDescription.style.display = 'block'; 
            }
            if (serverErrors.idcategoria && errorIdCategoria) {
                errorIdCategoria.textContent = serverErrors.idcategoria;
                errorIdCategoria.classList.remove('hidden');
            }
        }
    }
});