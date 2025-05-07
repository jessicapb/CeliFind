<?php
namespace App\Controller\User;

use App\Infrastructure\Persistence\UserRepository;

class EditProfileController {
    private \PDO $db;
    private UserRepository  $userRepository;

    public function __construct(\PDO $db, UserRepository $userRepository) {
        $this->db = $db;
        $this->userRepository = $userRepository;
    }

    public function showEditProfile() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        require VIEWS . '/login/editprofile.view.php';
    }

    public function updateProfile() {
        session_start();
        if (!isset($_SESSION['user']['id'])) {
            header('Location: /login');
            exit;
        }
        $id = $_SESSION['user']['id'];
        $name = trim($_POST['name'] ?? '');
        $surname = trim($_POST['surname'] ?? '');
        $city = trim($_POST['city'] ?? '');
        $postalcode = trim($_POST['postalcode'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Si todos los campos requeridos están vacíos, no editar nada
        if ($name === '' && $surname === '' && $city === '' && $postalcode === '' && $password === '') {
            $_SESSION['success'] = 'No se ha actualizado ningún dato porque todos los campos están vacíos.';
            header('Location: /editprofile');
            exit;
        }

        // Solo actualiza los campos que no estén vacíos
        $userRepo = new \App\Infrastructure\Persistence\UserRepository($this->db);
        $current = $_SESSION['user'];
        $userRepo->updateProfile(
            $id,
            $name !== '' ? $name : ($current['name'] ?? ''),
            $surname !== '' ? $surname : ($current['surname'] ?? ''),
            $city !== '' ? $city : ($current['city'] ?? ''),
            $postalcode !== '' ? $postalcode : ($current['postalcode'] ?? ''),
            $password !== '' ? $password : null
        );
        // Actualiza la sesión
        $_SESSION['user']['name'] = $name !== '' ? $name : ($current['name'] ?? '');
        $_SESSION['user']['surname'] = $surname !== '' ? $surname : ($current['surname'] ?? '');
        $_SESSION['user']['city'] = $city !== '' ? $city : ($current['city'] ?? '');
        $_SESSION['user']['postalcode'] = $postalcode !== '' ? $postalcode : ($current['postalcode'] ?? '');
        $_SESSION['success'] = 'Perfil actualizado correctamente.';
        header('Location: /editprofile');
        exit;
    }
}
