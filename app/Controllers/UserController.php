<?php

namespace App\Controllers;

use App\Model\Auth;
use App\Model\User;

class UserController
{
    /**
     * Список пользователей.
     * @return void
     */
    public function index() : void
    {
        $error = '';
        $userModel = new User();
        $users = $userModel->all();

        require_once 'D:\OpenServer\domains\test-task\resource\view\user\index.php';
    }

    /**
     * Форма создания пользователя.
     * @return void
     */
    public function create() : void
    {
        $error = '';
        require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\user\create.php';
    }

    /**
     * Создание пользователя.
     * @return void
     */
    public function store() : void
    {
        $data['login'] = $_POST['login'];
        $data['password'] = md5($_POST['password']);
        $data['role_id'] = $_POST['role'];

        $user = new User();

        if (!$user->isUserByLogin($data['login'])) {
            $user = $user->create($data);
        }

        if ($user->result === true) {
            header('Location: index.php?controller=user&action=index');
        } else {
            $error = 'Пользователь с логином `' . $_POST['login'] . '` уже существует';
            require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\user\create.php';
        }
    }

    /**
     * Удаление пользователя.
     * @return void
     */
    public function delete() : void
    {
        if($_SESSION['role_id'] != 2) {
            header('Location: index.php?controller=post&action=index');
        }

        $post = new User();
        $post->delete($_POST['user_id']);

        header('Location: index.php?controller=user&action=index');
    }

    /**
     * Форма редактирования пользователя.
     * @return void
     */
    public function edit() : void
    {
        if($_SESSION['role_id'] != 2) {
            header('Location: index.php?controller=post&action=index');
        }

        $error = '';
        $user = (new Auth())->findUserById($_GET['user_id']);

        require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\user\edit.php';
    }

    /**
     * Редактирование пользователя.
     * @return void
     */
    public function update() : void
    {
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role_id'] = $_POST['role'];

        $user = new User();
        $user = $user->update($_POST['user_id'], $data);

        if ($user->result === true) {
            header('Location: index.php?controller=user&action=index');
        } else {
            $error = 'Пользователь с логином `' . $_POST['login'] . '` уже существует';
            require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\user\create.php';
        }
    }
}