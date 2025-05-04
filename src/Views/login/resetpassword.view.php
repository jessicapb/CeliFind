<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Restablir contrasenya</title>
    <link href="/src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-100 flex flex-col items-center justify-center min-h-screen px-2">
    <h1 class="text-4xl font-calistoga font-bold mb-8 mt-8 text-gray-800 text-center">Restablir contrasenya</h1>
    <form action="/resetpassword" method="POST" class="w-full max-w-md flex flex-col gap-4 bg-white p-6 rounded-xl shadow-md border border-[#fcb666] sm:p-8">
        <?php if (!empty($_SESSION['errors']['token'])): ?>
            <div class="text-red-600 text-center mb-2 text-sm"><?php echo $_SESSION['errors']['token']; unset($_SESSION['errors']['token']); ?></div>
        <?php endif; ?>
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">
        <div>
            <label class="block font-calistoga text-lg text-gray-800 mb-1" for="password">Nova contrasenya</label>
            <input class="w-full border border-[#fcb666] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#fcb666] placeholder-gray-500" type="password" name="password" id="password" placeholder="Introdueix la nova contrasenya" required>
            <?php if (!empty($_SESSION['errors']['password'])): ?>
                <p class="text-red-500 mt-[5px] font-inter text-[15px]">
                    <?= $_SESSION['errors']['password']; unset($_SESSION['errors']['password']); ?>
                </p>
            <?php endif; ?>
        </div>
        <button class="w-full bg-[#fcb666] text-white font-calistoga text-lg py-2 rounded mt-2 hover:bg-[#fcb666]/80 transition">Restablir</button>
    </form>
    <a href="/login" class="mt-6 text-[#fcb666] hover:underline font-inter">Tornar a l'inici de sessió</a>
</body>
</html>
