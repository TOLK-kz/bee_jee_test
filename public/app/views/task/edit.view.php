<?php
/**
 * User: TOLK  Date: 07.04.19
 */

/** @var App\Models\Task $data */
?>

<div class="card">
    <div class="card-header">
        <h3>Редактировать задачу #<?= $data->id ?></h3>
        <span style="color: grey"><?= $data->username ?>(<?= $data->email ?>)</span>
    </div>
    <div class="card-body">
        <form method="post" action="/task/moderate">
            <div class="row">
                <div class="col-12">
                    <input name="id" value="<?= $data->id ?>" style="display: none">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="text_ru">Задача</label>
                        <textarea id="text_ru" name="text_ru" required class="form-control" aria-label="With textarea"
                                  placeholder="введите текст задачи..."
                        ><?= $data->text_ru ?></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="isDone" name="isDone"
                    <?= ($data->isDone() ? 'checked' : '') ?>>
                <label class="form-check-label" for="isDone">Выполненно</label>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
            <button type="reset" class="btn btn-danger">Отменить</button>
        </form>
    </div>
</div>

