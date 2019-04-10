<?php
/**
 * User: TOLK  Date: 07.04.19
 */

use App\Zcore\Controller;

class SiteController extends Controller
{
    private $defaultAction = '/task/index';

    function login()
    {
        if (isset($_POST['user']) && isset($_POST['password'])) {
            if (
                ($_POST['user'] == 'admin')
                &&
                ($_POST['password'] == '123')
            ) {
                $_SESSION["user"] = $_POST['user']; //TODO check another device
                $_SESSION["admin"] = 1;

                header('Location: ' . $this->defaultAction, true, 302);
            } else {
                $_SESSION['errormsg'] = 'Неверные рег. данные';
            }
        }

        $this->view->show('site.login', null);
    }

    function logout() {
        if (isset($_POST['user'])) {
            //unset($_SESSION["user"]);
            //unset($_SESSION["password"]);
            session_destroy();
        }

        header('Location: ' . $this->defaultAction, true, 302);
    }
}