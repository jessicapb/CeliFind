<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Registre</title>
    <link href="/src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
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
    <section class="bg-slate-100 pt-[10px]">
        <div class="p-1 space-y-0.5">
            <a class="font-calistoga flex items-center gap-x-2 pt-[10px] pl-[20px] rounded-[50px] text-[24px] text-black opacity-[78%] font-light" href="/home">
                <img class="w-[1.8%] h-[1.8%]" src="../../img/home/home.png" alt="">
                Tornar al home
            </a>
        </div>
        
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] font-bold mb-6 text-center">Registre</h1>
        <form class="flex justify-center pb-20" action="/userregister" method="POST" class="w-full max-w-md flex flex-col gap-6 mb-4">
            <div class="w-[18%]">
                <!-- Name -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal" for="name">Nom</label>
                    <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" type="text" name="name" id="name" placeholder="escriu el nom">
                    <?php if (!empty($_SESSION['errors']['name'])): ?>
                        <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                            <?= $_SESSION['errors']['name']; unset($_SESSION['errors']['name']); ?>
                        </p>
                    <?php endif; ?>
                </div>
                
                <!-- Postal code-->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal" for="postalcode">Codi postal</label>
                    <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" type="text" name="postalcode" id="postalcode" placeholder="escriu el codi postal" required>
                    <?php if (!empty($_SESSION['errors']['postalcode'])): ?>
                        <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                            <?= $_SESSION['errors']['postalcode']; unset($_SESSION['errors']['postalcode']); ?>
                        </p>
                    <?php endif; ?>
                </div>
                
                <!-- Email -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal" for="email">Correu electrònic</label>
                    <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" type="email" name="email" id="email" placeholder="escriu el correu" required>
                    <?php if (!empty($_SESSION['errors']['email'])): ?>
                        <p class="text-red-500 mt-[3px] font-inter text-[15px]">
                            <?= $_SESSION['errors']['email']; unset($_SESSION['errors']['email']); ?>
                        </p>
                    <?php endif; ?>
                </div>
                
                <!-- Password -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal" for="password">Contrasenya</label>
                    <div class="relative bg-white border border-[#fcb666] rounded-[9px] p-[8px]  transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow">
                        <input class="focus:outline-none bg-none placeholder:text-black font-normal text-[16px] font-inter" type="password" name="password" id="password" placeholder="escriu la contrasenya" required>
                        <img id="eyeIcon" src="/img/login/ojo1.png" alt="Mostrar contraseña" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-6 h-6 cursor-pointer select-none" style="z-index:2;">
                    </div>
                    <?php if (!empty($_SESSION['errors']['password'])): ?>
                        <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                            <?= $_SESSION['errors']['password']; unset($_SESSION['errors']['password']); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="flex flex-col mb-[15px]">
                    <button class="text-center font-inter bg-[#FCB666] text-[#f5f5f5] text-[16px] font-medium p-[8px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                        Registra't
                    </button> 
                </div>  
            </div>
        </form>
    </section>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <!-- Script eye -->
    <script src="../../js/login/login.js"></script>
</body>
</html>