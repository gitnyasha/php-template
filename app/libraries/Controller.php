<?php
namespace App\libraries;

class Controller {
    public function model($model) {
        require_once dirname(dirname(dirname(__FILE__))).'/app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {
        if (file_exists(dirname(dirname(dirname(__FILE__))).'/app/views/' . $view . '.php')) {
            require_once dirname(dirname(dirname(__FILE__))).'/app/views/' . $view . '.php';
        } else {
            die('View not found');
        }
    }
}