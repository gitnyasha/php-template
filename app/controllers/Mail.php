<?php
namespace App\controllers;
use DateTime;
use DateInterval;
use App\libraries\Controller;

class Mail extends Controller {

    public function __construct() {
        $this->clientModel = $this->model('Client');
        $this->companyModel = $this->model('Company');
    }

    public function index() {
        $this->view('mail/index');
    }

}