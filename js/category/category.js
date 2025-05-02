function Subcategories(categoria) {
    const subcategories = document.getElementById(categoria + '-subcategories');
    if (subcategories) {
        subcategories.classList.toggle('hidden');
        
        const botones = document.querySelectorAll('button');
        botones.forEach((btn) => {
            if (btn.textContent.includes(categoria)) {
                const flecha = btn.querySelector('.flecha');
                if (flecha) {
                    flecha.classList.toggle('rotate-90');
                }
            }
        });
    }
}
