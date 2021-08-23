<?php
use App\libraries\Controller;

class Pages extends Controller {
    public function __construct() {
        $this->clientModel = $this->model('Client');
        $this->companyModel = $this->model('Company');
  
    }

    public function index() {

        $title = 'Home';
        $data = [
            'title' => $title,
        ];
        $this->view('pages/index', $data);
    }

}