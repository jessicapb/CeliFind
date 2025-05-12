document.addEventListener('DOMContentLoaded', () => {
    if (typeof serverErrors !== 'undefined' && serverErrors) {
        if (serverErrors) {
            let errorName = document.getElementById('error-name');
            let errorDescription = document.getElementById('error-description');
            let errorLocation = document.getElementById('error-location');
            let errorPhonenumber = document.getElementById('error-phonenumber');
            let errorWebsite = document.getElementById('error-website');
            let errorSchedule = document.getElementById('error-schedule');
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
            
            // Error location
            if (errorLocation) {
                errorLocation.textContent = serverErrors.location; 
                errorLocation.style.display = 'block';  
            }
            
            // Error phonenumber
            if (errorPhonenumber) {
                errorPhonenumber.textContent = serverErrors.phonenumber; 
                errorPhonenumber.style.display = 'block';   
            }
            
            // Error website
            if (errorWebsite) {
                errorWebsite.textContent = serverErrors.website; 
                errorWebsite.style.display = 'block';   
            }
            
            // Error schedule
            if (errorSchedule) {
                errorSchedule.textContent = serverErrors.schedule;
                errorSchedule.style.display = 'block'; 
            }
            
            // Error image
            if (errorImage) {
                errorImage.textContent = serverErrors.image;  
                errorImage.style.display = 'block'; 
            }
        }
    }
});