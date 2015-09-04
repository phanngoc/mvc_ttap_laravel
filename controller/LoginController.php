<?php

/**
 * Description of LoginController
 *
 * @author Ngoc
 */
require_once 'Controller.php';
require_once HOME . DS . 'include' . DS . 'View.php';
require_once HOME . DS . 'model' . DS . 'ModelUser.php';

class LoginController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function preInit() {
        if (isset($_SESSION['user'])) {
            header('Location: profile');
            exit;
        }
    }

    public function index() {
        $view = new View("index.php");
        $view->output();
    }

    private function checkEmply($value, $name) {
        $error = '';
        if ($value == "") {
            $error .= "$name not empty";
        }
        return $error;
    }

    public function login() {
        $error_login = '';
        if (isset($_POST['login'])) {
            $error_login = '';
            $username = $_POST['login_username'];

            if ($this->checkEmply($username, 'username') != '') {
                $error_login .= '<div class="alert alert-danger">' . $this->checkEmply($username, 'username') . '</div>';
            }

            $password = $_POST['login_password'];
            if ($this->checkEmply($password, 'password') != '') {
                $error_login .= '<div class="alert alert-danger">' . $this->checkEmply($password, 'password') . '</div>';
            }

            if ($error_login == '') {
          
                $model = new ModelUser;
                $id_user = $model->checkAccount($username, $password);
                if ($id_user) {
                    $_SESSION['user'] = $id_user;
                    header('Location: profile');
                    exit;
                } else {
                   
                    $error_login .= '<div class="alert alert-danger">Username or password not correct</div>';
                }
            }
        }
       
        $view = new View("index.php");
        $view->set('error_login', $error_login);
        $view->output();
    }

    public function register() {
        $error = '';
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            if ($this->checkEmply($username, 'username') != '') {
                $error .= '<div class="alert alert-danger">' . $this->checkEmply($username, 'username') . '</div>';
            }
            $model = new ModelUser;
            if ($model->checkUsernameExits($username) != '') {
                $error .= '<div class="alert alert-danger">' . $model->checkUsernameExits($username, 'username') . '</div>';
            }

            $password = $_POST['password'];
            if ($this->checkEmply($password, 'password') != '') {
                $error .= '<div class="alert alert-danger">' . $this->checkEmply($password, 'password') . '</div>';
            }

            $fullname = $_POST['fullname'];
            if ($this->checkEmply($fullname, 'fullname') != '') {
                $error .= '<div class="alert alert-danger">' . $this->checkEmply($fullname, 'fullname') . '</div>';
            }

            $birthday = $_POST['birthday'];
            if ($this->checkEmply($birthday, 'birthday') != '') {
                $error .= '<div class="alert alert-danger">' . $this->checkEmply($birthday, 'birthday') . '</div>';
            }

            $description = $_POST['description'];
            if ($this->checkEmply($description, 'description') != '') {
                $error .= '<div class="alert alert-danger">' . $this->checkEmply($description, 'description') . '</div>';
            }

            if ($error == '' && $_FILES['avatar']['error'] == 0) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image

                $check = getimagesize($_FILES["avatar"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    $error .= '<div class="alert alert-danger">Sorry, your file was not uploaded.</div>';
                } else {
                    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                        $model = new ModelUser;
                        $id_user = $model->insertUser($username, $password, $fullname, string_to_date_mysql($birthday), $description, $target_file);
                        $_SESSION['user'] = $id_user;
                        header('Location: index.php?action=profile');
                        exit;
                    } else {
                        $error .= '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div>';
                    }
                }
            } else {
                $error .= '<div class="alert alert-danger">Please choose image</div>';
            }
        }


        $view = new View("index.php");
        $view->set('error_register', $error);
        $view->output();
    }

    public function logout() {
        unset($_SESSION['user']);
        header('Location: index.php');
        exit;
    }

}
