document.addEventListener('DOMContentLoaded', () => {
    if (typeof serverErrors !== 'undefined' && serverErrors) {
        if (serverErrors) {
            let errorName = document.getElementById('error-name');
            let errorDescription = document.getElementById('error-description');
            let errorIngredients = document.getElementById('error-ingredients');
            let errorPeople= document.getElementById('error-people');
            let errorDuration= document.getElementById('error-duration');
            let errorInstruction = document.getElementById('error-instruction');
            let errorImage = document.getElementById('error-image');
            
            // Error name
            if (errorName) {
                errorName.textContent = serverErrors.name;
                errorName.style.display = 'block';  
            }
            
            // Error description
            if (errorDescription) {
                errorDescription.textContent = serverErrors.description; 
                errorDescription.style.display = 'block'; 
            }
            
            // Error ingredients
            if (errorIngredients) {
                errorIngredients.textContent = serverErrors.ingredients; 
                errorIngredients.style.display = 'block';  
            }
            
            // Error people
            if (errorPeople) {
                errorPeople.textContent = serverErrors.people; 
                errorPeople.style.display = 'block';   
            }
            
            // Error duration
            if (errorDuration) {
                errorDuration.textContent = serverErrors.duration;
                errorDuration.style.display = 'block'; 
            }
            
            // Error instruction
            if (errorInstruction) {
                errorInstruction.textContent = serverErrors.instruction;  
                errorInstruction.style.display = 'block'; 
            }
            
            // Error image
            if (errorImage) {
                errorImage.textContent = serverErrors.image;  
                errorImage.style.display = 'block'; 
            }
        }
    }
});