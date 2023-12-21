<?php
    require_once 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col">
            <form action="index.php?controller=auth&action=authenticate" class="w-50 mt-3" method="POST">
                <?php if ($error !== null) : ?>
                    <div class="d-block mb-3 invalid-feedback">
                        <?=$error?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control" id="login" name="login">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</div>

<?php
    require_once 'footer.php';
?>