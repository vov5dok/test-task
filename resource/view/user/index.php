<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\header.php';
?>
<div class="container mt-2">
    <div class="row">
        <div class="col">
            <a href="index.php?controller=user&action=create" class="btn btn-primary">Создать пользователя</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Логин</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?=$user['id']?></th>
                            <td><?=$user['login']?></td>
                            <td><?=$user['role_id'] == 1 ? 'Пользователь' : ''?><?=$user['role_id'] == 2 ? 'Администатор' : ''?></td>
                            <td>
                                <a class="btn btn-primary" href="index.php?controller=user&action=edit&user_id=<?=$user['id']?>">Редактировать</a>
                                <form class="d-inline" action="index.php?controller=user&action=delete" method="POST">
                                    <input type="hidden" name="user_id" value="<?=$user['id']?>">
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\footer.php'
?>