<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Recupera la teva contrasenya</title>
    <link href="/src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
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
        <h1 class="text-4xl font-calistoga font-bold mb-8 mt-8 text-gray-800 text-center">Recupera la teva contrasenya
        </h1>
        <?php if (!empty($_SESSION['success'])): ?>
            <div class="text-green-600 text-center mb-2 text-sm"><?php echo $_SESSION['success'];
                                                                    unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        <form action="/forgotpassword" method="POST" class="w-full max-w-md flex flex-col gap-4  p-6   sm:p-8">
            <div>
                <label class="block font-calistoga text-lg text-gray-800 mb-1" for="email">Correu electrònic</label>
                <input class="w-full border border-[#fcb666] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#fcb666] placeholder-gray-500" type="email" name="email" id="email" required>
                <?php if (!empty($_SESSION['errors']['email'])): ?>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                        <?= $_SESSION['errors']['email'];
                        unset($_SESSION['errors']['email']); ?>
                    </p>
                <?php endif; ?>
            </div>
            <button class="w-full bg-[#fcb666] text-white font-calistoga text-lg py-2 rounded mt-2 hover:bg-[#fcb666]/80 transition">Envia l'enllaç</button>
        </form>
        <a href="/login" class="mt-6 text-[#fcb666] hover:underline font-semibold">Tornar a login</a>
    </main>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
</body>
</html>