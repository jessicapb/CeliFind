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
                $row['password']
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

    // Manager querys
    // Select limit
    function showlimit(){
        $allusers = [];
        $sql = $this->db->prepare("SELECT * FROM users");
        $sql->execute();
        $row = $sql->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }
    
    //Delete
    function deleteUser(int $id): bool {
        $sql = $this->db->prepare("DELETE FROM users WHERE id = :id");
        return $sql->execute([
            ':id' => $id
        ]);
    }
    
    // Search 
    public function searchUsersAll(?string $name): array {
        if (empty($name)) {
            $stmt = $this->db->prepare("SELECT * FROM users");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        
        $stmt = $this->db->prepare("SELECT * FROM users WHERE name LIKE :name");
        $stmt->execute(['name' => '%' . $name . '%']);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    // Select with id for the update
    public function findByIdUpdate(int $id): ?object {
        $sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $sql->bindParam(':id', $id, \PDO::PARAM_INT);
        $sql->execute();
        
        $result = $sql->fetch(\PDO::FETCH_OBJ);
        if($result){
            return $result;
        }else{
            return null;
        }
    }

    // Exists name and id
    function existsUser(string $name, int $id): bool{
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE name = :name AND id != :id");
            $stmt->execute(['name' => $name, 'id' => $id]);    
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $ex) {
            throw new BuildExceptions("Error checking if the product exists:" . $ex->getMessage());
        }
    }
}