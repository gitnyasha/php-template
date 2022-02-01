<?php

namespace App\libraries;

class Controller
{
    public function model($model)
    {
        require_once dirname(dirname(dirname(__FILE__))) . '/app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        if (file_exists(dirname(dirname(dirname(__FILE__))) . '/app/views/' . $view . '.php')) {
            $layoutContent = file_get_contents(dirname(dirname(dirname(__FILE__))) . "/app/views/layouts/app.php");
            $renderOnlyView = file_get_contents(dirname(dirname(dirname(__FILE__))) . "/app/views/" . $view . ".php");
            echo str_replace("{{content}}", $renderOnlyView, $layoutContent);
        } else {
            require_once dirname(dirname(dirname(__FILE__))) . "/app/views/404.php";
        }
    }
}
