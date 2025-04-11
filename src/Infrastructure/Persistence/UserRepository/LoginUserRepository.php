<?php
namespace App\Controller\User;
    
class LoginUserController{
    private \PDO $db;
    
    function __construct(\PDO $db){
        $this->db = $db;
    }
    
    // Start session
    session_start();
    
    // Redirect if session already exist
    if (isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit;
    }
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Basic validation
        if (empty($email) || empty($password)) {
            echo "<p>Todos los campos son obligatorios.</p>";
        } else {
            // Verify credentials
            $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ? AND status = 1");
            $stmt->execute([$email]);
            
            if ($stmt->rowCount() > 0) {
                $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);
                
                // Verify pass
                if (password_verify($password, $usuario['password'])) {
                    // Iniciar sesión
                    $_SESSION['user_id'] = $usuario['id'];
                    $_SESSION['user_name'] = $usuario['nombre'];
                    $_SESSION['user_status'] = $usuario['status'];
                    // Redirect to the panel
                    header("Location: panel.php");
                    exit;
                } else {
                    echo "<p>Contraseña incorrecta.</p>";
                }
            } else {
                echo "<p>No existe una cuenta activa con este correo electrónico.</p>";
            }
        }
    }
}
?>