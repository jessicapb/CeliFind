<?php
namespace App\Controller\User;

class LogoutController {
    public function logout() {
        // Esta mierda👇 es necesaria para traer la sesión
        session_start();
        // Eliminar todas las variables de sesión
        $_SESSION = [];
        // Destruir la cookie de sesión si existe
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }
        // Destruir la sesión
        session_destroy();
        header('Location: /login');
        exit;
    }
}
