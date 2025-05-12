document.addEventListener('DOMContentLoaded', () => {
    if (typeof serverErrors !== 'undefined' && serverErrors) {
        if (serverErrors) {
            let errorName = document.getElementById('error-name');
            let errorPostalCode= document.getElementById('error-postalcode');
            let errorEmail= document.getElementById('error-email');
            let errorPassword= document.getElementById('error-password');
            
            // Error name
            if (errorName) {
                errorName.textContent = serverErrors.name;
                errorName.style.display = 'block';  
            }
            
            // Error postalcode
            if (errorPostalCode) {
                errorPostalCode.textContent = serverErrors.postalcode; 
                errorPostalCode.style.display = 'block'; 
            }
            
            // Error email
            if (errorEmail) {
                errorEmail.textContent = serverErrors.email; 
                errorEmail.style.display = 'block';  
            }
            
            // Error password
            if (errorPassword) {
                errorPassword.textContent = serverErrors.password; 
                errorPassword.style.display = 'block';   
            }
        }
    }
});