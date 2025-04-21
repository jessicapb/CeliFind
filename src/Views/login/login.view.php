<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Inici de sessió</title>
    <link href="/src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form action="/userlogin" method="POST" class="bg-white p-8 rounded shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-center">Inici de sessió</h2>
        <?php if (!empty($_SESSION['login_error'])): ?>
            <div class="mb-4 text-red-600 text-sm">
                <?= $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
            </div>
        <?php endif; ?>
        <div class="mb-4">
            <label class="block mb-1 text-gray-700" for="email">Correu electrònic</label>
            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" type="email" name="email" id="email" required>
        </div>
        <div class="mb-6">
            <label class="block mb-1 text-gray-700" for="password">Contrasenya</label>
            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" type="password" name="password" id="password" required>
        </div>
        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition" type="submit">Entrar</button>
        <p class="mt-4 text-center text-sm text-gray-600">
            Encara no tens compte? <a href="/register" class="text-blue-600 hover:underline">Registra't</a>
        </p>
    </form>
</body>
</html>