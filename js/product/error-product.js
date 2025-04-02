document.addEventListener('DOMContentLoaded', () => {
    if (typeof serverErrors !== 'undefined' && serverErrors) {
        if (serverErrors) {
            let errorName = document.getElementById('error-name');
            let errorDescription = document.getElementById('error-description');
            let errorIngredients = document.getElementById('error-ingredients');
            let errorNutritionalInformation = document.getElementById('error-nutritionalinformation');
            let errorPrice = document.getElementById('error-price');
            let errorBrand = document.getElementById('error-brand');
            let errorImage = document.getElementById('error-image');
            let errorWeight = document.getElementById('error-weight');
            let errorState = document.getElementById('error-state');
            
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
            
            // Error nutritionalinformation
            if (errorNutritionalInformation) {
                errorNutritionalInformation.textContent = serverErrors.nutritionalinformation; 
                errorNutritionalInformation.style.display = 'block';   
            }
            
            // Error price
            if (errorPrice) {
                errorPrice.textContent = serverErrors.price;
                errorPrice.style.display = 'block'; 
            }
            
            // Error brand
            if (errorBrand) {
                errorBrand.textContent = serverErrors.brand;  
                errorBrand.style.display = 'block'; 
            }
            
            // Error image
            if (errorImage) {
                errorImage.textContent = serverErrors.image;  
                errorImage.style.display = 'block'; 
            }
            
            // Error weight
            if (errorWeight) {
                errorWeight.textContent = serverErrors.weight; 
                errorWeight.style.display = 'block'; 
            }
            
            // Error state
            if (errorState) {
                errorState.textContent = serverErrors.state; 
                errorState.style.display = 'block'; 
            }
        }
    }
});
