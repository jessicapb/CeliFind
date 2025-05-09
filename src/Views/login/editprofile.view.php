<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Edita el teu perfil</title>
    <link href="/src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Klee+One&display=swap" rel="stylesheet">
</head>

<body>
    <header class="p-4">
        <nav class="flex justify-between">
            <a href="/">
                <img class="w-32" src="../img/logo/logo.png" alt="">
            </a>
            <div class="flex">
                <ul class="list-none p-4m hidden lg:flex items-center">
                    <li class="ml-8"><a href="/productview">Productes</a></li>
                    <li class="ml-8"><a href="#">Receptes</a></li>

                </ul>
                <div class="relative inline-block text-left">
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['status'] == 1) : ?>
                        <button id="dropdown-toggle" type="button" class="font-inter min-w-[180px] p-[8px] mr-[30px] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                            <?= htmlspecialchars($_SESSION['user']['name']) ?>
                        </button>
                        <div id="dropdown-menu" class="font-inter hidden absolute left-0 mt-2 w-[90%] origin-top-center text-black bg-white border-1 shadow-lg rounded-[20px] z-10">
                            <div class="p-1 space-y-0.5">
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href=" /editprofile">
                                    <img class="w-[18%] h-[18%]" src="../../img/profile/placegholder.png" alt="">
                                    Editar perfil
                                </a>
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/home">
                                    <img class="w-[18%] h-[18%]" src="../../img/logout/logout.svg" alt="">
                                    Tancar sessió
                                </a>
                            </div>
                        </div>
                    <?php elseif (isset($_SESSION['user']) && $_SESSION['user']['status'] == 2): ?>
                        <button id="dropdown-toggle" type="button" class="font-inter min-w-[180px] p-[8px] mr-[30px] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                            <?= htmlspecialchars($_SESSION['user']['name']) ?>
                        </button>
                        <div id="dropdown-menu" class="font-inter hidden absolute left-0 mt-2 w-[90%] origin-top-center text-black bg-white border-1 shadow-lg rounded-[20px] z-10">
                            <div class="p-1 space-y-0.5">
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href=" /editprofile">
                                    <img class="w-[18%] h-[18%]" src="../../img/profile/placegholder.png" alt="">
                                    Editar perfil
                                </a>
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/manager">
                                    <img class="w-[18%] h-[18%]" src="../../img/manager/manager.svg" alt="">
                                    Manager
                                </a>
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/logout">
                                    <img class="w-[18%] h-[18%]" src="../../img/logout/logout.svg" alt="">
                                    Tancar sessió
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center gap-5 ml-16">
                            <a href="/register" class="font-inter p-2 px-5 text-[16px] text-black border-[#96c368] border-2 rounded-[50px] font-normal hover:bg-[rgb(150,195,104)] hover:text-white transition duration-200">Registre</a>
                            <a href="/login" class="font-inter p-2 px-9 text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-white transition duration-200">Iniciar Sessió</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>
    <main class="flex flex-col items-center justify-center min-h-screen px-2">
        <h1 class="text-4xl font-calistoga font-bold mb-8 mt-8 text-gray-800 text-center">Edita el teu perfil</h1>
        <?php if (!empty($_SESSION['success'])): ?>
            <div class="text-green-600 text-center mb-2 text-sm"><?php echo $_SESSION['success'];
                                                                    unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        <form action="/editprofile" method="POST" class="w-full max-w-md flex flex-col gap-4 bg-white p-6 rounded-xl shadow-md border border-[#fcb666] sm:p-8">
            <div>
                <label class="block font-calistoga text-lg text-gray-800 mb-1" for="name">Nom</label>
                <input class="w-full border border-[#fcb666] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#fcb666] placeholder-gray-500" type="text" name="name" id="name" value="<?= htmlspecialchars($_SESSION['user']['name'] ?? '') ?>" required>
                <?php if (!empty($_SESSION['errors']['name'])): ?>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                        <?= $_SESSION['errors']['name'];
                        unset($_SESSION['errors']['name']); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div>
                <label class="block font-calistoga text-lg text-gray-800 mb-1" for="surname">Cognoms</label>
                <input class="w-full border border-[#fcb666] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#fcb666] placeholder-gray-500" type="text" name="surname" id="surname" value="<?= htmlspecialchars($_SESSION['user']['surname'] ?? '') ?>">
                <?php if (!empty($_SESSION['errors']['surname'])): ?>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                        <?= $_SESSION['errors']['surname'];
                        unset($_SESSION['errors']['surname']); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div>
                <label class="block font-calistoga text-lg text-gray-800 mb-1" for="city">Ciutat</label>
                <input class="w-full border border-[#fcb666] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#fcb666] placeholder-gray-500" type="text" name="city" id="city" value="<?= htmlspecialchars($_SESSION['user']['city'] ?? '') ?>">
                <?php if (!empty($_SESSION['errors']['city'])): ?>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                        <?= $_SESSION['errors']['city'];
                        unset($_SESSION['errors']['city']); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div>
                <label class="block font-calistoga text-lg text-gray-800 mb-1" for="postalcode">Codi postal</label>
                <input class="w-full border border-[#fcb666] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#fcb666] placeholder-gray-500" type="text" name="postalcode" id="postalcode" value="<?= htmlspecialchars($_SESSION['user']['postalcode'] ?? '') ?>" required>
                <?php if (!empty($_SESSION['errors']['postalcode'])): ?>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                        <?= $_SESSION['errors']['postalcode'];
                        unset($_SESSION['errors']['postalcode']); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div>
                <label class="block font-calistoga text-lg text-gray-800 mb-1" for="password">Nova contrasenya (opcional)</label>
                <div class="relative">
                    <input class="w-full border border-[#fcb666] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#fcb666] placeholder-gray-500 pr-10" type="password" name="password" id="password" placeholder="Deixa-ho en blanc per no canviar-la">
                    <img id="eyeIcon" src="/img/login/ojo1.png" alt="Mostrar contraseña" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-6 h-6 cursor-pointer select-none" style="z-index:2;">
                </div>
                <?php if (!empty($_SESSION['errors']['password'])): ?>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                        <?= $_SESSION['errors']['password'];
                        unset($_SESSION['errors']['password']); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div>
                <label class="block font-calistoga text-lg text-gray-800 mb-1" for="confirm_password">Repeteix la nova contrasenya</label>
                <div class="relative">
                    <input class="w-full border border-[#fcb666] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#fcb666] placeholder-gray-500 pr-10" type="password" name="confirm_password" id="confirm_password" placeholder="Repeteix la nova contrasenya">
                    <img id="eyeIconConfirm" src="/img/login/ojo1.png" alt="Mostrar contraseña" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-6 h-6 cursor-pointer select-none" style="z-index:2;">
                </div>
                <?php if (!empty($_SESSION['errors']['confirm_password'])): ?>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                        <?= $_SESSION['errors']['confirm_password'];
                        unset($_SESSION['errors']['confirm_password']); ?>
                    </p>
                <?php endif; ?>
            </div>
            <?php if (!empty($_SESSION['success_password'])): ?>
                <p class="text-green-600 text-center mb-2 text-sm">
                    <?= $_SESSION['success_password'];
                    unset($_SESSION['success_password']); ?>
                </p>
            <?php endif; ?>
            <button class="w-full bg-[#fcb666] text-white font-calistoga text-lg py-2 rounded mt-2 hover:bg-[#fcb666]/80 transition">Actualitza</button>
        </form>
        <a href="/home" class="mt-6 text-[#fcb666] hover:underline font-inter">Tornar a la home</a>
    </main>
    <footer class="bg-slate-100 text-black py-12 px-8 lg:px-20 mt-8">
        <div class="grid grid-cols-1 max-w-screen-xl mx-auto md:grid-cols-5 text-center lg:text-start md:text-start gap-8 text-sm justify-center">
            <div class="md:col-span-1 flex flex-col space-y-2">
                <a href="/">
                    <img src="../img/logo/logo.png" alt="CeliFind logo" class="w-36">
                </a>
            </div>
            <div>
                <h4 class="font-semibold mb-2">Serveis i Productes</h4>
                <ul class="space-y-1 text-gray-600">
                    <li><a href="#">Productes</a></li>
                    <li><a href="#">Receptes</a></li>
                    <li><a href="#">Qui som</a></li>
                    <li><a href="#">Informació</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-2">Contacta'ns</h4>
                <ul class="space-y-1 text-gray-600">
                    <li><a href="mailto:celifind.cat@gmail.com">celifind.cat@gmail.com</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-2">Política de privacitat</h4>
                <ul class="space-y-1 text-gray-600">
                    <li><a href="#">Avís Legal</a></li>
                    <li><a href="#">Política de Cookies</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-2">Ajuda</h4>
                <ul class="space-y-1 text-gray-600">
                    <li><a href="#">Informació</a></li>
                    <li><a href="#">Qui Som</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="../js/dropdown/dropdown.js"></script>
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
        const eyeIconConfirm = document.getElementById('eyeIconConfirm');
        const confirmPasswordInput = document.getElementById('confirm_password');
        let visibleConfirm = false;
        eyeIconConfirm.addEventListener('click', function() {
            visibleConfirm = !visibleConfirm;
            confirmPasswordInput.type = visibleConfirm ? 'text' : 'password';
            eyeIconConfirm.src = visibleConfirm ? '/img/login/ojo2.png' : '/img/login/ojo1.png';
            eyeIconConfirm.alt = visibleConfirm ? 'Ocultar contraseña' : 'Mostrar contraseña';
        });
    </script>
</body>

</html>