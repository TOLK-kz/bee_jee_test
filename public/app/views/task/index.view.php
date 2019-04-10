<?php
/**
 * User: TOLK  Date: 07.04.19
 */


function order($field) { //Создал для демонстрации, в идеале переместил бы в "виджеты"
    if (isset($_GET['order_by'])) {
        if ($_GET['order_by'] == $field) {
            return '<i class="fa fa-sort-amount-asc sort disabled" aria-hidden="true"></i>';
        } else {
            $parts = parse_url($_SERVER['REQUEST_URI']);

            $query = $_GET;
            $query['order_by'] = $field;
            $newQuery = http_build_query($query);

            return '<a href="'.$parts['path'].'?'.$newQuery.'"><i class="fa fa-sort-amount-asc sort" aria-hidden="true"></i></a>';

        }
    } else {
        $currentUrl = $_SERVER['REQUEST_URI'];
        $parts = parse_url($_SERVER['REQUEST_URI']);
        if (isset($parts['query'])) {
            $concatSimbol = '&';
        } else {
            $concatSimbol = '?';
        }

        return '<a href="'.$currentUrl.$concatSimbol.'order_by='.$field.'"><i class="fa fa-sort-amount-asc sort" aria-hidden="true"></i></a>';
        }
}

/** @var App\Models\Task[] $data */
?>

<div class="row">
    <div class="col-12 mb-2 text-right">
        <a class="btn btn-primary" href="/task/create">Создать задачу</a>
    </div>
</div>

<?php
if (count($data) > 0) { ?>
    <table class="table mb-2">
        <tr>
            <th>Имя пользователя
                <?= order('username') ?>
            </th>
            <th>E-mail
                <?= order('email') ?>
            </th>
            <th>Выполнена
                <?= order('status') ?>
            </th>
            <th>Задача</th>
        </tr>

        <?php foreach ($data as $l) { ?>
            <tr class="tasks <?= ($l['status'] == \App\Models\Task::STATUS_COMPLETE ? 'complete' : '') ?>">
                <td><?= $l['username'] ?></td>
                <td><?= $l['email'] ?></td>
                <td>
                    <?php if($l['status'] == \App\Models\Task::STATUS_COMPLETE): ?>
                        <i class="fa fa-check done" ></i>
                    <?php endif ?>
                </td>
                <td>
                    <?php if(isAdmin()): ?>
                        <a href="/task/edit?id=<?= $l['id'] ?>">
                            <i class="fa fa-edit" ></i>
                        </a>
                    <?php endif ?>
                    <?= $l['text_ru'] ?></td>
            </tr>
        <?php } ?>
    </table>


    <?php
    include './app/views/_pager.view.php';
} else {
    echo "<div class='alert alert-warning'>Task list is empty</div>";
}
?>

