<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Recuperar contrasenya</title>
    <link href="/src/output.css" rel="stylesheet">
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
        
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] font-bold mb-6 text-center">Recuperar <span class="text-[#96c368] opacity-[100%]">contrasenya</span></h1>
        <form action="/forgotpassword" class="flex justify-center pb-20" method="POST">
            <div class="w-[18%]">
                <?php if (!empty($_SESSION['errors']['email'])): ?>
                    <div class="text-red-600 text-center mb-2 text-sm"><?php echo $_SESSION['errors']['email']; unset($_SESSION['errors']['email']); ?></div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['success'])): ?>
                    <div class="text-green-600 text-center mb-2 text-sm"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
                <?php endif; ?>
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal" for="email">Correu electrònic</label>
                    <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" type="email" name="email" id="email" placeholder="escriu el teu correu" required>
                    <?php if (!empty($_SESSION['errors']['email'])): ?>
                        <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                            <?= $_SESSION['errors']['email']; unset($_SESSION['errors']['email']); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="flex flex-col mb-[15px]">
                    <button class="text-center font-inter bg-[#FCB666] text-[#f5f5f5] text-[16px] font-medium p-[8px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                        Enviar enllaç de recuperació
                    </button> 
                </div>  
                <div class="text-center">
                    <a href="/login" class="font-inter text-[16px] font-bold text-black cursor-pointer">Tornar a l'inici de sessió</a>
                </div>
            </div>
        </form>
    </main>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
</body>

</html>