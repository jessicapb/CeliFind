const eyeIcon = document.getElementById('eyeIcon');
const passwordInput = document.getElementById('password');
let visible = false;
eyeIcon.addEventListener('click', function() {
    visible = !visible;
    passwordInput.type = visible ? 'text' : 'password';
    eyeIcon.src = visible ? '/img/login/ojo2.png' : '/img/login/ojo1.png';
    eyeIcon.alt = visible ? 'Ocultar contraseña' : 'Mostrar contraseña';
});