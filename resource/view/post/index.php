<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\header.php';
?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="index.php?controller=post&action=create" class="btn btn-primary">Добавить пост</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col">Краткое описание</th>
                    <th scope="col">Дата публикации</th>
                    <?php if ($user['role_id'] == 2) : ?>
                        <th scope="col">Действия</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post) : ?>
                        <tr>
                            <th scope="row"><?=$post['id']?></th>
                            <td><?=$post['title']?></td>
                            <td><?=$post['min_description']?></td>
                            <td><?=$post['publicated_at']?></td>
                            <?php if ($user['role_id'] == 2) : ?>
                                <td>
                                    <a class="btn btn-primary" href="index.php?controller=post&action=edit&post_id=<?=$post['id']?>">Редактировать</a>
                                    <form class="d-inline" action="index.php?controller=post&action=delete" method="POST">
                                        <input type="hidden" name="post_id" value="<?=$post['id']?>">
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                </td>
                            <?php endif; ?>
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