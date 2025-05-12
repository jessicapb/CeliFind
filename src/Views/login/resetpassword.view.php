<?php //session_start(); 
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Restableix la teva contrasenya</title>
    <link href="/src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Klee+One&display=swap" rel="stylesheet">

</head>

<body class="bg-slate-100 flex flex-col items-center justify-center min-h-screen px-2">
    <h1 class="text-4xl font-calistoga font-bold mb-8 mt-8 text-gray-800 text-center">Restableix la teva contrasenya</h1>
    <form action="/resetpassword" method="POST" class="w-full max-w-md flex flex-col gap-4 p-6 sm:p-8">
        <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token'] ?? '') ?>">
        <label class="block font-calistoga text-lg text-gray-800 mb-1" for="password">Nova contrasenya</label>
        <div class="relative">
            <input class="w-full border border-[#fcb666] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#fcb666] placeholder-gray-500 pr-10" type="password" name="password" id="password" placeholder="nova contrasenya" required>
            <img id="eyeIcon" src="/img/login/ojo1.png" alt="Mostrar contraseña" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-6 h-6 cursor-pointer select-none" style="z-index:2;">
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
                <input class="w-full border border-[#fcb666] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#fcb666] placeholder-gray-500" type="password" name="confirm_password" id="confirm_password" placeholder="repeteix la nova contrasenya" required>
                <img id="eyeIconone" src="/img/login/ojo1.png" alt="Mostrar contraseña" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-6 h-6 cursor-pointer select-none" style="z-index:2;">
                <?php if (!empty($_SESSION['errors']['confirm_password'])): ?>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                        <?= $_SESSION['errors']['confirm_password'];
                        unset($_SESSION['errors']['confirm_password']); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <button class="w-full bg-[#fcb666] text-white font-calistoga text-lg py-2 rounded mt-2 hover:bg-[#fcb666]/80 transition">Restableix</button>
    </form>
    <a href="/login" class="mt-6 text-[#fcb666] hover:underline font-inter">Tornar a login</a>
    
    <script src="../../js/login/login.js"></script>
</body>

</html>