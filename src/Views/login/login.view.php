
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Inici de sessió</title>
    <link href="/src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Klee+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>

<body>
    <!-- Header -->
    <header class="p-4 border-b border-gray-300">
        <nav class="flex flex-col w-full">
            <a href="/home" class="block w-fit">
                <img src="../../img/logo/logo.png" alt="Celifind logo" class="w-32 h-auto block">
            </a>
        </nav>
    </header>
    <!-- End Header -->
    
    <main class="bg-slate-100 flex flex-col items-center justify-center min-h-screen">
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
            <button class="w-full bg-[#fcb666] text-white font-calistoga text-lg py-2 rounded mt-2 hover:bg-[#fcb666]/80 transition">Inicia sessió</button>
            <p class="mt-4 text-center font-semibold text-gray-600 font-inter">
                Encara no tens compte? <a href="/register" class="text-[#fcb666] hover:underline">Registra't </a>
            </p>
            <p class="mt-2 text-center font-inter font-semibold">
                <a href="/forgotpassword" class="text-[#96c368] hover:underline">Has oblidat la contrasenya?</a>
            </p>
        </form>
    </main>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <script src="../../js/login/login.js"></script>
</html>