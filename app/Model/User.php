<?php

namespace App\Model;

use PDO;
use PDOException;

class User extends Model
{
    public $message;
    public $result;

    public function all()
    {
        $query = "SELECT id, login, role_id FROM users";
        $statement = $this->db->prepare($query);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        try {
            $query = "DELETE FROM users WHERE id = :id";
            $statement = $this->db->prepare($query);

            $statement->bindParam(':id', $id);

            $this->result = $statement->execute();
        } catch (PDOException $e) {
            echo "Ошибка при удалении пользователя: " . $e->getMessage();
            $this->message = "Ошибка при удалении пользователя: " . $e->getMessage();
            $this->result = false;
            die();
        }

        return $this;
    }

    public function isUserByLogin($login)
    {
        $query = "SELECT id, login, role_id FROM users WHERE login = :login";
        $statement = $this->db->prepare($query);

        $statement->bindParam(':login', $login);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        try {
            $query = "INSERT INTO users (login, password, role_id) VALUES (:login, :password, :role_id)";
            $statement = $this->db->prepare($query);

            $statement->bindParam(':login', $data['login']);
            $statement->bindParam(':password', $data['password']);
            $statement->bindParam(':role_id', $data['role_id']);

            $this->result = $statement->execute();
        } catch (PDOException $e) {
            echo "Ошибка при добавлении пользователя: " . $e->getMessage();
            $this->message = "Ошибка при добавлении пользователя: " . $e->getMessage();
            $this->result = false;
            die();
        }

        return $this;
    }

    public function update($userId, $data)
    {
        try {
            $strPass = $data['password'] != '' ? 'password = :password,' : '';
            $query = "UPDATE users SET login = :login, " . $strPass . " role_id = :role_id WHERE id = :id";
            $statement = $this->db->prepare($query);

            $statement->bindParam(':login', $data['login']);
            $statement->bindParam(':role_id', $data['role_id']);
            $statement->bindParam(':id', $userId);
            if ($data['password'] != '') {
                $password = md5($data['password']);
                $statement->bindParam(':password', $password);
            }

            $this->result = $statement->execute();
        } catch (PDOException $e) {
            echo "Ошибка при обновлении пользователя: " . $e->getMessage();
            $this->message = "Ошибка при обновлении пользователя: " . $e->getMessage();
            $this->result = false;
            die();
        }

        return $this;
    }
}