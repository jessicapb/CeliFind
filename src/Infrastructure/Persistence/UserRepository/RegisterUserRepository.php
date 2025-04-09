<?php

namespace App\Controller\User;
    
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Basic validation
        if (empty($nombre) || empty($email) || empty($password)) {
            echo "<p>Todos los campos son obligatorios.</p>";
        } else {
            // Verify email does exist
            $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);
            
            if ($stmt->rowCount() > 0) {
                echo "<p>Este correo electrónico ya está registrado.</p>";
            } else {
                // Hash pass
                $hash_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert new user
                $stmt = $conn->prepare("INSERT INTO usuarios (name, surname,  email, city, postalcode, password, estado) VALUES (?, ?, ?, 1)");
                
                try {
                    $stmt->execute([$nombre, $email, $hash_password]);
                    echo "<p>Registro exitoso. Ahora puedes <a href='login.view.php'>iniciar sesión</a>.</p>";
                } catch(\PDOException $e) {
                    echo "<p>Error en el registro: " . $e->getMessage() . "</p>";
                }
            }
        }
    }
    ?>