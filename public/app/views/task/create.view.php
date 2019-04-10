<?php
/**
 * User: TOLK  Date: 07.04.19
 */

/** @var App\Models\Task $data */
?>

<div class="card">
    <div class="card-header">
        <h3>Создать задачу</h3>
    </div>
    <div class="card-body">
        <form method="post" action="/task">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required
                               class="form-control" placeholder="Username" aria-label="Username">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" required
                               class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp"
                               placeholder="Enter email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <textarea name="text_ru" required class="form-control" aria-label="With textarea"
                                  placeholder="введите текст задачи..."
                        ></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
            <button type="reset" class="btn btn-danger">Отменить</button>
        </form>
    </div>
</div>

