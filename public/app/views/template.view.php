<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Задачник для теста TOLK от BeeJee</title>

    <style>

    </style>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">BeeJee_Test</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/task">Список задач</a>
        <a class="p-2 text-dark" href="/task/create">Создать задачу</a>
    </nav>
    <?php if (isset($_SESSION["user"])): ?>
        <form id="logout-form" action="/site/logout" method="POST"
              style="">
            <input type="text" name="user" style="display: none" value="<?= $_SESSION["user"] ?>">
            <button type="submit" class="btn btn-outline-primary">
                Выход (<?= $_SESSION["user"] ?>)
            </button>
        </form>
    <?php else: ?>
        <a class="btn btn-outline-primary" href="/site/login">Вход</a>
    <?php endif ?>
</div>
<div class="container">
    <?php
    if (isset($_SESSION["errormsg"])) {
        $error = $_SESSION["errormsg"];
        $_SESSION["errormsg"] = null;
        session_unset($_SESSION["errormsg"]);
        ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php } ?>
    <?php if (!empty($contentView)) {
        include './app/views/' . $contentView;
    } ?>
</div>
</body>
</html>
