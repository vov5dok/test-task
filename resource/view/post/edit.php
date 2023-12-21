<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\header.php';
?>
<div class="container">
    <div class="row mt-3">
        <div class="col">
            <a href="index.php?controller=post&action=index" class="btn btn-primary">Список постов</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <form action="index.php?controller=post&action=update" class="" method="POST">
                <input type="hidden" name="post_id" value="<?=$post['id']?>">
                <?php if ($error !== null) : ?>
                    <div class="d-block mb-3 invalid-feedback">
                        <?=$error?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="title" class="form-label">Наименование</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?=$post['title']?>">
                </div>
                <div class="mb-3">
                    <label for="min_description" class="form-label">Краткое описание</label>
                    <textarea
                        class="form-control"
                        name="min_description"
                        id="min_description"
                        cols="30"
                        rows="10"
                    ><?=$post['min_description']?>
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="date_publicate" class="form-label">Дата публикации</label>
                    <input type="date" id="date_publicate" name="date_publicate" value="<?=$post['date_publicate']?>">
                </div>
                <div class="mb-3">
                    <label for="time_publicate" class="form-label">Время публикации</label>
                    <input type="time" id="time_publicate" name="time_publicate" value="<?=$post['time_publicate']?>">
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</div>

<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '\resource\view\footer.php'
?>