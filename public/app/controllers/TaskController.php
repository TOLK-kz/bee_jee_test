<?php
/**
 * User: TOLK  Date: 07.04.19
 */

use App\Models\Task;
use App\Zcore\Controller;

include_once './app/models/Task.php'; //TODO spl_autoload_register

class TaskController extends Controller
{
    function index()
    {
        if (isset($_POST['username'])) {
            $this->store();
        } else {
            $tasks = new Task();

            $currPage = $_GET['page'] ?? 1;
            $orderBy = $_GET['order_by'] ?? null;

            $list = $tasks->all($currPage, $orderBy);

            //if (count($list) == 0) {} //TODO redirect to max?

            $this->view->show('task.index', $list);
        }
    }

    function create()
    {
        $this->view->show('task.create', null);
    }

    function store()
    {
        //нет валидации
        if (isset($_POST['username'])
            and isset($_POST['email'])
            and isset($_POST['text_ru'])) {

            $taskModel = new Task();
            $taskModel->username = $_POST['username'];
            $taskModel->email = $_POST['email'];
            $taskModel->text_ru = $_POST['text_ru'];

            $taskModel->save();

            //todo set
            header('Location: /task/index');
            exit();
        } else {
            echo "Error on save!";
        }
    }

    function edit()
    {
        if(!isAdmin()) {
            header('Location: /task/index');
            exit();
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $task = Task::get($id);

            if ($task == null) {
                $_SESSION['errormsg'] = 'Задача #' . $id . ' не найдена';
                //header('Location: /task/index', true, 302);
                //exit();
            }
        }

        $this->view->show('task.edit', $task);
    }

    function moderate()
    {
        if(!isAdmin()) {
            header('Location: /task/index');
            exit();
        }

        if (isset($_POST['id'])
            and isset($_POST['text_ru'])) {

            $id = $_POST['id'];

            $task = Task::get($id);

            $task->text_ru = $_POST['text_ru'];
            if(isset($_POST['isDone']) && $_POST['isDone']=='on') {
                $task->status = Task::STATUS_COMPLETE;
            } else {
                $task->status = Task::STATUS_NEW;
            }

            $task->update();

            //todo set updated message
            header('Location: /task/index');
            exit();
        } else {
            echo "Error on update!";
        }
    }
}