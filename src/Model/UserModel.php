<?php
namespace BigBear\Model;

use BigBear\System\Model;
use \PDO;

class UserModel extends Model
{
    protected $tableName = 'users';
    
    public function getUserByCredentials($username, $password)
    {
        $query = $this->getConnection()->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $result = $result[0];
        } else {
            $result = null;
        }
        return $result;
    }

    public function getAllUsers()
    {
        $query = $this->getConnection()->prepare("SELECT * FROM users");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getUser($userId)
    {
        $result = $this->where('user_id', $userId)->fetch();
        return $result;
    }

    public function getUserByUsername($nickname)
    {
        $query = $this->getConnection()->prepare("SELECT * FROM users WHERE username = :username");
        $query->bindValue(':username', $nickname, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $result = $result[0];
        } else {
            $result = null;
        }
        return $result;
    }

    public function createUser($username, $password)
    {
        $query = $this->getConnection()->prepare('INSERT INTO users(username, password) VALUES(:username, :password)');
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        return $this->getConnection()->lastInsertId();
    }

    public function deleteUser($id)
    {
        $query = $this->getConnection()->prepare('DELETE FROM users WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }

    public function updateUser($userId, $username, $password)
    {
        $query = $this->getConnection()->prepare('UPDATE users SET username = :username, password = :password WHERE user_id = :userId');
        $query->bindParam(':userId', $userId, PDO::PARAM_INT);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        return $query->execute();
    }
}
