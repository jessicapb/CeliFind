document.addEventListener('DOMContentLoaded', () => {
    if (typeof serverErrors !== 'undefined' && serverErrors) {
        if (serverErrors) {
            let errorProduct = document.getElementById('error-product');
            let errorSubcategory = document.getElementById('error-subcategory');
            if (errorProduct) {
                errorProduct.textContent = serverErrors.product;
                errorProduct.style.display = 'block';
            }
            
            // Error subcategory
            if (errorSubcategory) {
                errorSubcategory.textContent = serverErrors.subcategory;
                errorSubcategory.style.display = 'block';
            }
        }
    }
});
