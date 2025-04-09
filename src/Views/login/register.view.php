<!-- registro.php - Formulario de registro -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    
    <form method="post" action="../../Controller/User/addUser.php">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit" value="registrarse">Enviar</button>
        </div>
    </form>
    
    <p>¿Ya tienes una cuenta? <a href="login.view.php">Iniciar sesión</a></p>
</body>
</html>