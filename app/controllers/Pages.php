<?php

use App\libraries\Controller;

class Pages extends Controller
{
    public function __construct()
    {
        $this->companyModel = $this->model('Company');
    }

    public function index()
    {

        $title = 'Home';
        $data = [
            'title' => $title,
        ];
        $this->view('pages/index', $data);
    }

    public function error404()
    {
        $title = 'Not Found';
        $data = [
            'title' => $title,
        ];
        $this->view('pages/error404', $data);
    }
}
