document.addEventListener('DOMContentLoaded', () => {
    if (typeof serverErrors !== 'undefined' && serverErrors) {
        // Error name
        if (serverErrors) {
            let errorName = document.getElementById('error-name');
            if (errorName) {
                errorName.textContent = serverErrors.name;
                errorName.style.display = 'block';  
            }
        }

        // Error description
        if (serverErrors) {
            let errorDescription = document.getElementById('error-description');
            if (errorDescription) {
                errorDescription.textContent = serverErrors.description; 
                errorDescription.style.display = 'block'; 
            }
        }

        // Error ingredients
        if (serverErrors) {
            let errorIngredients = document.getElementById('error-ingredients');
            if (errorIngredients) {
                errorIngredients.textContent = serverErrors.ingredients; 
                errorIngredients.style.display = 'block';  
            }
        }

        // Error nutritionalinformation
        if (serverErrors) {
            let errorNutritionalInformation = document.getElementById('error-nutritionalinformation');
            if (errorNutritionalInformation) {
                errorNutritionalInformation.textContent = serverErrors.nutritionalinformation; 
                errorNutritionalInformation.style.display = 'block';   
            }
        }

        // Error price
        if (serverErrors) {
            let errorPrice = document.getElementById('error-price');
            if (errorPrice) {
                errorPrice.textContent = serverErrors.price;
                errorPrice.style.display = 'block'; 
            }
        }
        
        // Error brand
        if (serverErrors) {
            let errorBrand = document.getElementById('error-brand');
            if (errorBrand) {
                errorBrand.textContent = serverErrors.brand;  
                errorBrand.style.display = 'block'; 
            }
        }
        
        // Error weight
        if (serverErrors) {
            let errorWeight = document.getElementById('error-weight');
            if (errorWeight) {
                errorWeight.textContent = serverErrors.weight; 
                errorWeight.style.display = 'block'; 
            }
        }

        // Error state
        if (serverErrors) {
            let errorState = document.getElementById('error-state');
            if (errorState) {
                errorState.textContent = serverErrors.state; 
                errorState.style.display = 'block'; 
            }
        }
    }
});
