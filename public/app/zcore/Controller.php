<?php
/**
 * User: TOLK  Date: 07.04.19
 */

namespace App\Zcore;


include_once 'View.php';

class Controller
{
    function __construct()
    {
        $this->view = new View();
    }

    public function show()
    {
        $this->view->show();
    }
}