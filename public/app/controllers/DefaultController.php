<?php
/**
 * User: TOLK  Date: 07.04.19
 */

use App\Zcore\Controller;

class DefaultController extends Controller
{
    private $defaultAction = '/task/index';

    function index()
    {
        header('Location: ' . $this->defaultAction, true, 302);
    }
}