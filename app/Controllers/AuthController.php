<?php

namespace App\Controllers;

use App\Model\Auth;
use App\Model\User;

class AuthController
{
    /**
     * Страница формы авторизации.
     * @return void
     */
    public function index() : void
    {
        session_start();
        if(isset($_SESSION['sid']) && $_SESSION['sid'] == session_id()) {
            header('Location: index.php?controller=post&action=index');
        }

        $error = '';
        require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\index.php';
    }

    /**
     * Авторизация пользователя.
     * @return void
     */
    public function authenticate() : void
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = md5($_POST['password']);

            $auth = new Auth();
            $user = $auth->findByLogin($login);

            if ($user === false || $user['password'] !== $password) {
                $error = 'Неверный логин/пароль';
                require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\index.php';
                return;
            }

            session_start();
            $_SESSION['sid'] = session_id();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role_id'] = $user['role_id'];
            header('Location: index.php?controller=post&action=index');

        } else {
            $error = 'Введите логин и пароль!';
            require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\index.php';
        }
    }

    /**
     * Удаление сессии. Разлогирование.
     * @return void
     */
    public function logout() : void
    {
        session_start();
        session_destroy();
        setcookie('PHPSESSID', session_id(), time()-1);
        header('Location: index.php');
    }
}