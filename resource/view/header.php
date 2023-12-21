<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    >

    <title>Тестовое задание!</title>
</head>
<body>
<?php if (isset($_SESSION['sid'])) : ?>
    <div class="row mb-3">
        <div class="col-2">
            <form action="index.php?controller=auth&action=logout" method="POST">
                <button type="submit" class="btn btn-warning">Выйти</button>
            </form>
        </div>
        <?php if ($_SESSION['role_id'] == 2) : ?>
            <div class="col">
                <a href="index.php?controller=user&action=index" class="btn btn-primary mx-1">Управление пользователями</a>
                <a href="index.php?controller=post&action=index" class="btn btn-primary mx-1">Управление постами</a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

