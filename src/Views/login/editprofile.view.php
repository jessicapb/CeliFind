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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Klee+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>
<body>
    <header class="p-4 border-b border-gray-300">
        <nav class="flex justify-between items-center">
            <a href="/">
                <img class="w-32" src="../img/logo/logo.png" alt="">
            </a>
            <div class="flex">
                <ul class="list-none p-4m hidden lg:flex items-center">
                    <li class="ml-8"><a href="/productview">Productes</a></li>
                    <li class="ml-8 mr-[15px]"><a href="/receptes">Receptes</a></li>
                    
                </ul>
                <div class="relative inline-block text-left">
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['status'] == 1) : ?>
                        <button id="dropdown-toggle" type="button" class="font-inter min-w-[180px] p-[8px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                            <?= htmlspecialchars($_SESSION['user']['name']) ?>
                        </button>
                        <div id="dropdown-menu" class="font-inter hidden absolute left-0 mt-2 w-[90%] origin-top-center text-black bg-white border-1 shadow-lg rounded-[20px] z-10">
                            <div class="p-1 space-y-0.5">
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href=" /editprofile">
                                    <img class="w-[17%] h-[17%]" src="../../img/logout/editar.svg" alt="editicon">
                                    Editar perfil
                                </a>
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/home">
                                    <img class="w-[18%] h-[18%]" src="../../img/logout/logout.svg" alt="logouticon">
                                    Tancar sessió
                                </a>
                            </div>
                        </div>
                    <?php elseif (isset($_SESSION['user']) && $_SESSION['user']['status'] == 2): ?>
                        <button id="dropdown-toggle" type="button" class="font-inter min-w-[180px] p-[8px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                            <?= htmlspecialchars($_SESSION['user']['name']) ?>
                        </button>
                        <div id="dropdown-menu" class="font-inter hidden absolute left-0 mt-2 w-[90%] origin-top-center text-black bg-white border-1 shadow-lg rounded-[20px] z-10">
                            <div class="p-1 space-y-0.5">
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href=" /editprofile">
                                    <img class="w-[17%] h-[17%]" src="../../img/logout/editar.svg" alt="editicon">
                                    Editar perfil
                                </a>
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/productmanager">
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
    <main class="bg-slate-100 flex flex-col items-center justify-center min-h-screen px-2 pb-[20px]">
        <h1 class="text-4xl font-calistoga font-bold mb-8 mt-8 text-gray-800 text-center">Edita el teu perfil</h1>
        <?php if (!empty($_SESSION['success'])): ?>
            <div class="text-green-600 text-center mb-2 text-sm"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
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
        <a href="/home" class="mt-6 text-[#fcb666] font-semibold  hover:underline font-inter">Tornar a la home</a>
    </main>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <script src="../js/dropdown/dropdown.js"></script>
    
    <script src="../js/login/editprofile.js"></script>
</body>
</html>