<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Registre</title>
    <link href="/src/output.css" rel="stylesheet">
</head>
<body class="bg-[#f5f5f5] flex items-center justify-center min-h-screen">
    <form action="/userregister" method="POST" class="bg-white p-6 rounded-[30px] shadow-lg w-full max-w-md border-2 border-[#fcb666] max-h-[600px] overflow-y-auto">
        <div class="flex justify-center mb-4">
            <img src="/img/logo/logo.png" alt="Logo" class="w-16 h-16">
        </div>
        <h2 class="text-xl font-bold mb-4 text-center text-[#fcb666] font-calistoga">Registre</h2>
        <?php if (!empty($_SESSION['errors'])): ?>
            <ul class="mb-2 text-red-600 text-sm text-center">
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; unset($_SESSION['errors']); ?>
            </ul>
        <?php endif; ?>
        <div class="mb-2">
            <label class="block mb-1 text-gray-700 font-inter" for="name">Nom</label>
            <div class="relative">
                <input class="w-full px-3 py-1.5 border rounded-[20px] focus:outline-none focus:ring focus:border-[#fcb666] pl-10 text-sm" placeholder="escriu el nom" type="text" name="name" id="name" required>
                <!--<img src="/img/login/login.svg" alt="Postal Icon" class="absolute left-2 top-1.5 w-5 h-5 opacity-60">-->
            </div>
        </div>
        <div class="mb-2">
            <label class="block mb-1 text-gray-700 font-inter" for="email">Correu electrònic</label>
            <div class="relative">
                <input class="w-full px-3 py-1.5 border rounded-[20px] focus:outline-none focus:ring focus:border-[#fcb666] pl-10 text-sm" type="email" name="email" id="email" required>
                <!--<img src="/img/login/login.svg" alt="Postal Icon" class="absolute left-2 top-1.5 w-5 h-5 opacity-60">-->
            </div>
        </div>
        <div class="mb-2">
            <label class="block mb-1 text-gray-700 font-inter" for="postalcode">Codi postal</label>
            <div class="relative">
                <input class="w-full px-3 py-1.5 border rounded-[20px] focus:outline-none focus:ring focus:border-[#fcb666] pl-10 text-sm" type="text" name="postalcode" id="postalcode" required>
                <!--<img src="/img/login/login.svg" alt="Postal Icon" class="absolute left-2 top-1.5 w-5 h-5 opacity-60">-->
            </div>
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-gray-700 font-inter" for="password">Contrasenya</label>
            <div class="relative">
                <input class="w-full px-3 py-1.5 border rounded-[20px] focus:outline-none focus:ring focus:border-[#fcb666] pl-10 text-sm" type="password" name="password" id="password" required>
                <!--<img src="/img/login/login.svg" alt="Postal Icon" class="absolute left-2 top-1.5 w-5 h-5 opacity-60">-->
            </div>
        </div>
        <button class="w-full bg-[#fcb666] text-white py-2 rounded-[20px] hover:bg-[#e0a04f] transition font-inter font-semibold text-sm" type="submit">Registrar-se</button>
        <p class="mt-3 text-center text-xs text-gray-600 font-inter">
            Ja tens compte? <a href="/login" class="text-[#fcb666] hover:underline">Inicia sessió</a>
        </p>
    </form>
</body>
</html>