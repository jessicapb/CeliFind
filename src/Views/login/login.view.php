<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Inici de sessió</title>
    <link href="/src/output.css" rel="stylesheet">
</head>
<body class="bg-[#f5f5f5] flex items-center justify-center min-h-screen">
    <form action="/userlogin" method="POST" class="bg-white p-8 rounded-[30px] shadow-lg w-full max-w-sm border-2 border-[#fcb666]">
        <div class="flex justify-center mb-6">
            <img src="/img/logo/logo.png" alt="Logo" class="w-20 h-20">
        </div>
        <h2 class="text-2xl font-bold mb-6 text-center text-[#fcb666] font-calistoga">Inici de sessió</h2>
        <?php if (!empty($_SESSION['login_error'])): ?>
            <div class="mb-4 text-red-600 text-sm text-center">
                <?= $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
            </div>
        <?php endif; ?>
        <div class="mb-4">
            <label class="block mb-1 text-gray-700 font-inter" for="email">Correu electrònic</label>
            <div class="relative">
                <input class="w-full px-3 py-2 border rounded-[20px] focus:outline-none focus:ring focus:border-[#fcb666] pl-10" type="email" name="email" id="email" required>
                <img src="/img/login/login.svg" alt="Email Icon" class="absolute left-2 top-2 w-6 h-6 opacity-60">
            </div>
        </div>
        <div class="mb-6">
            <label class="block mb-1 text-gray-700 font-inter" for="password">Contrasenya</label>
            <div class="relative">
                <input class="w-full px-3 py-2 border rounded-[20px] focus:outline-none focus:ring focus:border-[#fcb666] pl-10" type="password" name="password" id="password" required>
                <img src="/img/login/password.svg" alt="Password Icon" class="absolute left-2 top-2 w-6 h-6 opacity-60">
            </div>
        </div>
        <button class="w-full bg-[#fcb666] text-white py-2 rounded-[20px] hover:bg-[#e0a04f] transition font-inter font-semibold" type="submit">Entrar</button>
        <p class="mt-4 text-center text-sm text-gray-600 font-inter">
            Encara no tens compte? <a href="/register" class="text-[#fcb666] hover:underline">Registra't</a>
        </p>
    </form>
</body>
</html>