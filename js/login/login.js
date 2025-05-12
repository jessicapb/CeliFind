const eyeIcon = document.getElementById('eyeIcon');
const eyeIconone = document.getElementById('eyeIconone');
const passwordInput = document.getElementById('password');
const passwordInput2 = document.getElementById('confirm_password');
let visible = false;
eyeIcon.addEventListener('click', function() {
    visible = !visible;
    passwordInput.type = visible ? 'text' : 'password';
    eyeIcon.src = visible ? '/img/login/ojo2.png' : '/img/login/ojo1.png';
    eyeIcon.alt = visible ? 'Ocultar contraseña' : 'Mostrar contraseña';
});

eyeIconone.addEventListener('click', function() {
    visible = !visible;
    passwordInput2.type = visible ? 'text' : 'password';
    eyeIconone.src = visible ? '/img/login/ojo2.png' : '/img/login/ojo1.png';
    eyeIconone.alt = visible ? 'Ocultar contraseña' : 'Mostrar contraseña';
});