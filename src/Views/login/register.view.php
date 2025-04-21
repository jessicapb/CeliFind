<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Registre</title>
    <link href="/src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <form action="/userregister" method="POST" class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Registra't</h2>
        <?php if (!empty($_SESSION['errors'])): ?>
            <ul class="mb-4 text-red-600 text-sm">
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; unset($_SESSION['errors']); ?>
            </ul>
        <?php endif; ?>
        <div class="mb-4">
            <label class="block mb-1 text-gray-700" for="name">Nom</label>
            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" type="text" name="name" id="name" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-gray-700" for="surname">Cognoms</label>
            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" type="text" name="surname" id="surname" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-gray-700" for="email">Correu electrònic</label>
            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" type="email" name="email" id="email" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-gray-700" for="city">Ciutat</label>
            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" type="text" name="city" id="city" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-gray-700" for="postalcode">Codi postal</label>
            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" type="text" name="postalcode" id="postalcode" required>
        </div>
        <div class="mb-6">
            <label class="block mb-1 text-gray-700" for="password">Contrasenya</label>
            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" type="password" name="password" id="password" required>
        </div>
        <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition" type="submit">Registrar-se</button>
        <p class="mt-4 text-center text-sm text-gray-600">
            Ja tens compte? <a href="/login" class="text-blue-600 hover:underline">Inicia sessió</a>
        </p>
    </form>
</body>
</html>