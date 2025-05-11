const eyeIcon = document.getElementById('eyeIcon');
const passwordInput = document.getElementById('password');
let visible = false;
eyeIcon.addEventListener('click', function() {
    visible = !visible;
    passwordInput.type = visible ? 'text' : 'password';
    eyeIcon.src = visible ? '/img/login/ojo2.png' : '/img/login/ojo1.png';
    eyeIcon.alt = visible ? 'Ocultar contraseña' : 'Mostrar contraseña';
});
const eyeIconConfirm = document.getElementById('eyeIconConfirm');
const confirmPasswordInput = document.getElementById('confirm_password');
let visibleConfirm = false;
eyeIconConfirm.addEventListener('click', function() {
    visibleConfirm = !visibleConfirm;
    confirmPasswordInput.type = visibleConfirm ? 'text' : 'password';
    eyeIconConfirm.src = visibleConfirm ? '/img/login/ojo2.png' : '/img/login/ojo1.png';
    eyeIconConfirm.alt = visibleConfirm ? 'Ocultar contraseña' : 'Mostrar contraseña';
});