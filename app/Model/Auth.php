<?php

namespace App\Model;

use PDO;

class Auth extends Model
{
    /**
     * Поиск пользователя по логину.
     * @param string $login Логин пользователя.
     * @return mixed false или массив с данными пользователя.
     */
    public function findByLogin(string $login) : mixed
    {
        $query = "SELECT id, login, password, role_id FROM users WHERE login = :login";
        $statement = $this->db->prepare($query);

        $statement->bindParam(':login', $login);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Поиск пользователя по ID.
     * @param int $id ID пользователя.
     * @return mixed false или массив с данными пользователя.
     */
    public function findUserById(int $id) : mixed
    {
        $query = "SELECT id, login, password, role_id FROM users WHERE id = :id";
        $statement = $this->db->prepare($query);

        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}