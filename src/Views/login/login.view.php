<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Inici de sessió</title>
    <link href="/src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
</head>

<body class="bg-slate-100 flex flex-col min-h-screen">
    <!-- Header -->
    <div class="p-1 space-y-0.5 top-0 left-0 right-0 flex justify-between w-full min-w-full">
        <div class="flex flex-col w-full">
            <img src="../../img/logo/logo.png" alt="Celifind logo" class="w-32 ml-4 mt-4 " href="/">
            <a class="font-calistoga flex items-center gap-x-2 pt-[10px] pl-[20px] rounded-[50px] text-[24px] text-black opacity-[78%] font-light">
                <img class="w-8 h-8" src="../../img/home/home.png" alt="home">
                Tornar al gestor
            </a>
        </div>
    </div>
    <!-- End Header -->
    <main class="flex-1 flex flex-col items-center justify-center w-full">
        <h1 class="text-5xl font-calistoga font-bold mb-10 mt-8 text-gray-800">Iniciar sessió</h1>
        <form action="/userlogin" method="POST" class="w-full max-w-md flex flex-col gap-4 mb-10">
            <div>
                <label class="block font-calistoga text-lg text-gray-800 mb-1" for="email">Correu electrònic</label>
                <input class="w-full border border-[#fcb666] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#fcb666] placeholder-gray-500" type="email" name="email" id="email" placeholder="escriu el correu" required>
                <?php if (!empty($_SESSION['login_error']) && strpos($_SESSION['login_error'], 'correu') !== false): ?>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                        <?= $_SESSION['login_error'];
                        unset($_SESSION['login_error']); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div>
                <label class="block font-calistoga text-lg text-gray-800 mb-1" for="password">Contrasenya</label>
                <div class="relative">
                    <input class="w-full border border-[#fcb666] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#fcb666] placeholder-gray-500 pr-10" type="password" name="password" id="password" placeholder="escriu la contrasenya" required>
                    <img id="eyeIcon" src="/img/login/ojo1.png" alt="Mostrar contraseña" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-6 h-6 cursor-pointer select-none" style="z-index:2;">
                </div>
                <?php if (!empty($_SESSION['login_error']) && strpos($_SESSION['login_error'], 'Contrasenya') !== false): ?>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                        <?= $_SESSION['login_error'];
                        unset($_SESSION['login_error']); ?>
                    </p>
                <?php endif; ?>
            </div>
            <button class="w-full bg-[#fcb666] text-white font-calistoga text-lg py-2 rounded mt-2 hover:bg-[#fcb666]/80 transition">Registra’t</button>
            <p class="mt-4 text-center text-sm text-gray-600 font-inter">
                Encara no tens compte? <a href="/register" class="text-[#fcb666] hover:underline">Registra't</a>
            </p>
            <p class="mt-2 text-center text-sm font-inter">
                <a href="/forgotpassword" class="text-[#96c368] hover:underline">Has oblidat la contrasenya?</a>
            </p>
        </form>
    </main>
    <!-- Footer -->
    <footer class=" font-calistoga text-gray-800 mt-8 w-full bot-0 px-2 lg:px-20">
        <div class="grid grid-cols-1  mx-auto md:grid-cols-5 text-center lg:text-start md:text-start gap-8 text-sm justify-center">

            <div class="md:col-span-1 flex flex-col space-y-2">
                <a href="/">
                    <img src="../img/logo/logo.png" alt="CeliFind logo" class="w-20 lg:display-block mx-auto md:mx-0">
                </a>
            </div>

            <div>
                <h4 class=" text-gray-800 mb-2">Serveis i Productes</h4>
                <ul class="space-y-1 text-gray-600">
                    <li><a href="#">Productes</a></li>
                    <li><a href="#">Receptes</a></li>
                    <li><a href="#">Qui som</a></li>
                    <li><a href="#">Informació</a></li>
                </ul>
            </div>

            <div>
                <h4 class=" mb-2">Contacta'ns</h4>
                <ul class="space-y-1 text-gray-600">
                    <li><a href="mailto:celifind.cat@gmail.com">celifind.cat@gmail.com</a></li>
                </ul>
            </div>

            <div>
                <h4 class=" mb-2">Política de privacitat</h4>
                <ul class="space-y-1 text-gray-600">
                    <li><a href="#">Avís Legal</a></li>
                    <li><a href="#">Política de Cookies</a></li>
                </ul>
            </div>

            <div>
                <h4 class=" mb-2">Ajuda</h4>
                <ul class="space-y-1 text-gray-600">
                    <li><a href="#">Informació</a></li>
                    <li><a href="#">Qui Som</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
<script>
    const eyeIcon = document.getElementById('eyeIcon');
    const passwordInput = document.getElementById('password');
    let visible = false;
    eyeIcon.addEventListener('click', function() {
        visible = !visible;
        passwordInput.type = visible ? 'text' : 'password';
        eyeIcon.src = visible ? '/img/login/ojo2.png' : '/img/login/ojo1.png';
        eyeIcon.alt = visible ? 'Ocultar contraseña' : 'Mostrar contraseña';
    });
</script>

</html>