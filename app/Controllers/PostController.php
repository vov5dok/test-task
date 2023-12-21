<?php

namespace App\Controllers;

use App\Model\Auth;
use App\Model\Post;

class PostController
{
    public function __construct()
    {
        session_start();
        if($_SESSION['sid'] != session_id()) {
            header('Location: index.php');
        }
    }

    /**
     * Список постов.
     * @return void
     */
    public function index() : void
    {
        $error = '';
        $posts = (new Post())->all();
        $user = (new Auth())->findUserById($_SESSION['user_id']);

        require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\post\index.php';
    }

    /**
     * Форма создания поста.
     * @return void
     */
    public function create() : void
    {
        $error = '';
        require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\post\create.php';
    }

    /**
     * Создание поста.
     * @return void
     */
    public function store() : void
    {
        $data['title'] = $_POST['title'];
        $data['min_description'] = $_POST['min_description'];
        $data['publicated_at'] = $_POST['date_publicate'] . ' ' . $_POST['time_publicate'];
        $data['created_at'] = date('Y-m-d H:i:s');

        $post = new Post();
        $post = $post->create($data);

        if ($post->result === true) {
            header('Location: index.php?controller=post&action=index');
        } else {
            header('Location: index.php?controller=post&action=create');
        }
    }

    /**
     * Удаление поста.
     * @return void
     */
    public function delete() : void
    {
        if($_SESSION['role_id'] != 2) {
            header('Location: index.php?controller=post&action=index');
        }

        $post = new Post();
        $post->delete($_POST['post_id']);

        header('Location: index.php?controller=post&action=index');
    }

    /**
     * Форма редактирования поста.
     * @return void
     */
    public function edit() : void
    {
        if($_SESSION['role_id'] != 2) {
            header('Location: index.php?controller=post&action=index');
        }

        $error = '';
        $post = (new Post())->findById($_GET['post_id']);
        $dateTimeArr = explode(' ', $post['publicated_at']);
        $post['date_publicate'] = $dateTimeArr[0];
        $post['time_publicate'] = $dateTimeArr[1];

        require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\post\edit.php';
    }

    /**
     * Редактирование поста.
     * @return void
     */
    public function update() : void
    {
        if($_SESSION['role_id'] != 2) {
            header('Location: index.php?controller=post&action=index');
        }

        $data['title'] = $_POST['title'];
        $data['min_description'] = $_POST['min_description'];
        $data['publicated_at'] = $_POST['date_publicate'] . ' ' . $_POST['time_publicate'];

        $post = new Post();
        $post = $post->update($_POST['post_id'], $data);

        if ($post->result === true) {
            header('Location: index.php?controller=post&action=index');
        } else {
            header('Location: index.php?controller=post&action=update&post_id=' . $_POST['post_id']);
        }
    }
}