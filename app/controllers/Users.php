<?php
use App\libraries\Controller;

class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->companyModel = $this->model('Company');

    }

    public function login() {

        $data = [
            'title' => 'Login Page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => '',
            'company' => $this->companyModel->getCompany(),

        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
                'company' => $this->companyModel->getCompany(),

            ];

            if (empty($data['username'])) {
                $data['usernameError'] = "Enter username";
            }

            if (empty($data['password'])) {
                $data['passwordError'] = "Enter password";
            }

            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect.';

                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => '',
                'company' => $this->companyModel->getCompany(),

            ];
        }

        $this->view('users/login', $data);
    }

    public function createSession($user) {
        $_SESSION['id'] = $user->id;
        $_SESSION['username'] = $user->username;
        header('location:' . PATH . '/admin/index');
    }

    public function logout() {
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        header('location:'. PATH . '/users/login');
    }

    public function register() {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'company' => $this->companyModel->getCompany(),

        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'company' => $this->companyModel->getCompany(),

            ];

            $nameValidate = "/^[a-zA-Z0-9]*$/";
            $passwordValidate = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            if (empty($data['username'])) {
                $data['usernameError'] = "Enter username";
            } elseif (!preg_match($nameValidate, $data['username'])) {
                $data['usernameError'] = 'Can only contain letters and numbers';
            }

            if (empty($data['email'])) {
                $data['emailError'] = "Enter your email";
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Enter correct email';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = 'Email is already taken';
                }
            }

            if (empty($data['password'])) {
                $data['passwordError'] = "Enter password";
            } elseif (strlen($data['password']) < 8) {
                $data['passwordError'] = 'Enter password with minimum 8 characters';
            } elseif (!preg_match($passwordValidate, $data['password'])) {
                $data['passwordError'] = "Enter password";
            }

            if (empty($data['confirm_password'])) {
                $data['confirmPasswordError'] = "Enter password";
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirmPasswordError'] = 'Passowrd does not match';
                }
            }

            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $data['confirm_password'] = password_hash($data['confirm_password'], PASSWORD_DEFAULT);

                if ($this->userModel->register($data)) {
                    header('location: ' . PATH . '/users/login');
                }
            }
        }

        $this->view('users/register', $data);
    }
}