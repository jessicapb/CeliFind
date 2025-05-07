document.addEventListener("DOMContentLoaded", () => {
    const botones = document.querySelectorAll('.btn');

    botones.forEach(btn => {
        const boton = btn.querySelector('button');
        boton.addEventListener("click", e => {
            const flecha = boton.querySelector('.flecha');
            const categoria = btn.querySelector('.categoria');

            // Ocultar todas las categorías
            document.querySelectorAll('.categoria').forEach(c => c.classList.add('hidden'));

            // Reiniciar flechas
            document.querySelectorAll('.flecha').forEach(f => {
                f.classList.remove('rotate-180');
                f.classList.add('rotate-90');
            });

            // Alternar la actual
            const estabaOculta = categoria.classList.contains('hidden');
            if (estabaOculta) {
                categoria.classList.remove('hidden');
                flecha.classList.remove('rotate-90');
                flecha.classList.add('rotate-180');
            }
        });
    });
});