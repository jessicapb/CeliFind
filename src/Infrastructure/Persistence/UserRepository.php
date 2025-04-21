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
        $stmt = $this->db->prepare("INSERT INTO users (name, surname, email, city, postalcode, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $user->name,
            $user->surname,
            $user->email,
            $user->city,
            $user->postalcode,
            password_hash($user->password, PASSWORD_DEFAULT)
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
                $row['password']
            );
        }
        return null;
    }
}