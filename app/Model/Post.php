<?php

namespace App\Model;

use PDO;
use PDOException;

class Post extends Model
{
    public $message;
    public $result;

    /**
     * Добавление поста
     * @param $data array Массив с данными для insert в таблицу.
     * @return Post
     */
    public function create(array $data) : Post
    {
        try {
            $query = "INSERT INTO posts (title, min_description, publicated_at, created_at) VALUES (:title, :min_description, :publicated_at, :created_at)";
            $statement = $this->db->prepare($query);

            $statement->bindParam(':title', $data['title']);
            $statement->bindParam(':min_description', $data['min_description']);
            $statement->bindParam(':publicated_at', $data['publicated_at']);
            $statement->bindParam(':created_at', $data['created_at']);

            $this->result = $statement->execute();
        } catch (PDOException $e) {
            echo "Ошибка при добавлении поста: " . $e->getMessage();
            $this->message = "Ошибка при добавлении поста: " . $e->getMessage();
            $this->result = false;
            die();
        }

        return $this;
    }

    /**
     * Массив постов из базы.
     * @return array|bool
     */
    public function all(): array|bool
    {
        $query = "SELECT id, title, min_description, publicated_at FROM posts";
        $statement = $this->db->prepare($query);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Удаление поста.
     * @param $id int ID поста.
     * @return Post
     */
    public function delete(int $id) : Post
    {
        try {
            $query = "DELETE FROM posts WHERE id = :id";
            $statement = $this->db->prepare($query);

            $statement->bindParam(':id', $id);

            $this->result = $statement->execute();
        } catch (PDOException $e) {
            echo "Ошибка при удалении поста: " . $e->getMessage();
            $this->message = "Ошибка при удалении поста: " . $e->getMessage();
            $this->result = false;
            die();
        }

        return $this;
    }

    /**
     * Получение поста по ID.
     * @param int $id ID поста.
     * @return mixed
     */
    public function findById(int $id) : mixed
    {
        $query = "SELECT id, title, min_description, publicated_at FROM posts WHERE id = :id";
        $statement = $this->db->prepare($query);

        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    /**
     * Обновление поста.
     * @param int $postId ID поста.
     * @param array $data Массив с данными.
     * @return $this
     */
    public function update(int $postId, array $data) : Post
    {
        try {
            $query = "UPDATE posts SET title = :title, min_description = :min_description, publicated_at = :publicated_at WHERE id = :id";
            $statement = $this->db->prepare($query);

            $statement->bindParam(':title', $data['title']);
            $statement->bindParam(':min_description', $data['min_description']);
            $statement->bindParam(':publicated_at', $data['publicated_at']);
            $statement->bindParam(':id', $postId);

            $this->result = $statement->execute();
        } catch (PDOException $e) {
            echo "Ошибка при обновлении поста: " . $e->getMessage();
            $this->message = "Ошибка при обновлении поста: " . $e->getMessage();
            $this->result = false;
            die();
        }

        return $this;
    }
}