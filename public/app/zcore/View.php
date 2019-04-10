<?php
/**
 * User: TOLK  Date: 07.04.19
 */

namespace App\Zcore;


class View
{
    function show($contentView, $data)
    {
        $template_view = 'template.view.php';
        $contentView = str_replace('.', '/' , $contentView) . '.view.php';

        include './app/views/'.$template_view;
    }
}