<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sessió</title>
    <link href="/src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>
<body>
    <!-- Header -->
    <header class="border-b border-gray-300 pb-[15px]">
        <nav>
            <a href="/home">
                <img class="ml-[20px] w-32 pt-[20px]" src="../../img/logo/logo.png" alt="logoimg">
            </a>
        </nav>
    </header>
    <!-- End Header -->
    <main class="bg-slate-100 pt-[10px]">
        <div class="p-1 space-y-0.5">
            <a class="font-calistoga flex items-center gap-x-2 pt-[10px] pl-[20px] rounded-[50px] text-[24px] text-black opacity-[78%] font-light" href="/home">
                <img class="w-[1.8%] h-[1.8%]" src="../../img/home/home.png" alt="">
                Tornar al home
            </a>
        </div>
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] font-bold mb-6 text-center">Iniciar <span class="text-[#96c368] opacity-[100%]">sessió</span></h1>
        <form class="flex justify-center pb-20" action="/userlogin" method="POST">
            <div class="w-[18%]">
                <!-- Email -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal" for="email">Correu electrònic</label>
                    <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" type="email" name="email" id="email" placeholder="escriu el correu" required>
                    <?php if (!empty($_SESSION['login_error']) && strpos($_SESSION['login_error'], 'correu') !== false): ?>
                        <p class="text-red-500 mt-[5px] font-inter hidden text-[15px]">
                            <?= $_SESSION['login_error'];
                            unset($_SESSION['login_error']); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal" for="password">Contrasenya</label>
                    <div class="relative bg-white border border-[#fcb666] rounded-[9px] p-[8px]  transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow">
                        <input class="focus:outline-none bg-none placeholder:text-black font-normal text-[16px] font-inter" type="password" name="password" id="password" placeholder="escriu la contrasenya" required>
                        <img id="eyeIcon" src="/img/login/ojo1.png" alt="Mostrar contraseña" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-6 h-6 cursor-pointer select-none" style="z-index:2;">
                    </div>
                    <?php if (!empty($_SESSION['login_error']) && strpos($_SESSION['login_error'], 'Contrasenya') !== false): ?>
                        <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                            <?= $_SESSION['login_error'];
                            unset($_SESSION['login_error']); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="flex flex-col mb-[15px]">
                    <a href="/productview" class="text-center font-inter bg-[#FCB666] text-[#f5f5f5] text-[16px] font-medium p-[8px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                        Iniciar sessió
                    </a> 
                </div>  
                <!-- Register-->
                <div class="flex pb-[7px] justify-center">
                    <p class="pr-[5px] font-inter text-[16px] font-normal text-black">Encara no tens compte?</p>
                    <a class="font-inter text-[16px] font-bold text-black cursor-pointer" href="/register">Registra't</a>
                </div>
                <div class="text-center">
                    <a href="/forgotpassword" class="font-inter text-[16px] font-bold text-black cursor-pointer">Has oblidat la contrasenya?</a>
                </div>
            </div>
        </form>
    </main>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <!-- Script eye -->
    <script src="../../js/login/login.js"></script>
</body>
</html>