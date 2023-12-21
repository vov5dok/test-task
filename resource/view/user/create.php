<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\header.php';
?>
<div class="container">
    <div class="row mt-3">
        <div class="col">
            <a href="index.php?controller=user&action=index" class="btn btn-primary">Список пользователей</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <form action="index.php?controller=user&action=store" class="" method="POST">
                <?php if ($error !== null) : ?>
                    <div class="d-block mb-3 invalid-feedback">
                        <?=$error?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="title" class="form-label">Логин</label>
                    <input type="text" class="form-control" id="title" name="login">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Роль</label>
                    <select id="role" class="form-select" aria-label="Роль" name="role">
                        <option selected>Выберите роль</option>
                        <option value="1">Пользователь</option>
                        <option value="2">Администратор</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</div>

<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\footer.php'
?>