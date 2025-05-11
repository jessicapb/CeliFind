<?php
namespace App\Infrastructure\Persistence;

use App\Celifind\Entities\User;

class UserRepository {
    private \PDO $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function existsByEmail($email): bool {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    public function save(User $user): void {
        $stmt = $this->db->prepare("INSERT INTO users (name, surname, email, city, postalcode, password, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $user->name,
            $user->surname,
            $user->email,
            $user->city,
            $user->postalcode,
            password_hash($user->password, PASSWORD_DEFAULT),
            $user->status
        ]);
    }

    public function findByEmail($email): ?User {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return User::fromDbRow(
                $row['id'],
                $row['name'],
                $row['surname'],
                $row['email'],
                $row['city'],
                $row['postalcode'],
                $row['password'],
                $row['status']
            );
        }
        return null;
    }

    public function setResetToken($email, $token, $expiry) {
        $stmt = $this->db->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?");
        $stmt->execute([$token, $expiry, $email]);
    }

    public function findByResetToken($token) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE reset_token = ? AND reset_token_expiry > NOW()");
        $stmt->execute([$token]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return User::fromDbRow(
                $row['id'],
                $row['name'],
                $row['surname'],
                $row['email'],
                $row['city'],
                $row['postalcode'],
                $row['password'],
                $row['status']
            );
        }
        return null;
    }

    public function updatePassword($userId, $newPassword) {
        $stmt = $this->db->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_token_expiry = NULL WHERE id = ?");
        $stmt->execute([
            $newPassword,
            $userId
        ]);
    }

    public function updateProfile($id, $name, $surname, $city, $postalcode, $password = null) {
        if ($password) {
            $stmt = $this->db->prepare("UPDATE users SET name = ?, surname = ?, city = ?, postalcode = ?, password = ? WHERE id = ?");
            $stmt->execute([
                $name,
                $surname,
                $city,
                $postalcode,
                password_hash($password, PASSWORD_DEFAULT),
                $id
            ]);
        } else {
            $stmt = $this->db->prepare("UPDATE users SET name = ?, surname = ?, city = ?, postalcode = ? WHERE id = ?");
            $stmt->execute([
                $name,
                $surname,
                $city,
                $postalcode,
                $id
            ]);
        }
    }
}