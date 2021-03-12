<?php

namespace app\controllers;

use app\libraries\Controller;
use app\libraries\Validation;
use app\models\User;


class Users extends Controller
{
    private $userModel;
    private $vld;

    public function __construct()
    {
        $this->userModel = new User;
        $this->vld = new Validation;
    }

    public function register()
    {
        if (ifRequestIsPost()) {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'lastname' => trim($_POST['lastname']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),

                'errors' => [
                    'nameErr' => '',
                    'lastnameErr' => '',
                    'emailErr' => '',
                    'phoneErr' => '',
                    'passwordErr' => '',
                    'confirmPasswordErr' => '',
                ],
                
            ];

            $data['errors']['nameErr'] = $this->vld->validateName($data['name']);
            $data['errors']['lastnameErr'] = $this->vld->validateLastame($data['lastname']);
            $data['errors']['emailErr'] = $this->vld->validateEmail($data['email'], $this->userModel);
            $data['errors']['phoneErr'] = $this->vld->validatePhone($data['phone']);
            $data['errors']['passwordErr'] = $this->vld->validatePassword($data['password'], 6, 10);
            $data['errors']['confirmPasswordErr'] = $this->vld->confirmPassword($data['confirmPassword']);

            if ($this->vld->ifEmptyArr($data['errors'])) {

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->register($data)) {
                    flash('register_status', 'You have registered Successfully. Please go to login page to login.');
                    $this->view('users/register', $data);
                } else {
                    die("Something went wrong in adding user to DB.");
                }
            } else {
                flash('register_status', 'Please check the form', 'alert alert-danger');
                $this->view('users/register', $data);
            }
        } else {
            $data = [
                'name' => '',
                'lastname' => '',
                'email' => '',
                'phone' => '',
                'password' => '',
                'confirmPassword' => '',

                'errors' => [
                    'nameErr' => '',
                    'lastnameErr' => '',
                    'emailErr' => '',
                    'phoneErr' => '',
                    'passwordErr' => '',
                    'confirmPasswordErr' => '', 
                ],
                
            ];
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        if (ifRequestIsPost()) {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),

                'errors' => [
                    'emailErr' => '',
                    'passwordErr' => '',
                ],
            ];

            //validate nickname
            if (empty($data['email'])) {
                $data['errors']['emailErr'] = 'Please enter your email.';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                } else {
                    $data['emailErr'] = 'User does not exist.';
                }
            }
            if (empty($data['password'])) {
                $data['errors']['passwordErr'] = 'Please enter your password.';
            }


            if ($this->vld->ifEmptyArr($data['errors'])) {

                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                    redirect('/pages/index');
                } else {
                    $data['errors']['passwordErr'] = 'Wrong password or username';
                    $this->view('users/login', $data);
                }
            } else {
                flash('register_status', 'Please check the form', 'alert alert-danger');
                $this->view('users/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',

                'errors' => [
                    'emailErr' => '',
                    'passwordErr' => '',
                ],
            ];
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($userRow)
    {
        $_SESSION['user_id'] = $userRow->user_id;
        $_SESSION['email'] = $userRow->email;
        redirect('/pages');
    }
}