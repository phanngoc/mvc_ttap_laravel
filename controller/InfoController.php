<?php

/**
 * Description of LoginController
 *
 * @author Ngoc
 */
require_once 'Controller.php';
require_once HOME . DS . 'include' . DS . 'View.php';
require_once HOME . DS . 'model' . DS . 'ModelUser.php';

class InfoController extends Controller {

    public function __construct() {
        parent::__construct();
    }
    public function preInit()
    {
        if(!isset($_SESSION['user']))
        {
            header('Location: index.php');
            exit;
        }
    }
    public function index() {
        $view = new View("profile.php");
        $modeluser = new ModelUser;
        $user = $modeluser->getUserById($_SESSION['user']);
        $view->set('user', $user);
        $view->output();
    }
    private function checkEmply($value, $name) {
        $error = '';
        if ($value == "") {
            $error .= "$name not empty";
        }
        return $error;
    }
     public function update() {
        $error = '';
        if(!isset($_POST['username']))
        {
            $this->index();
            exit;
        }
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
        $user = $model->getUserById($_SESSION['user']);
        $target_file = $user->getLinkimage();
        if ($_FILES['avatar']['error'] == 0) {
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
                } else {
                    $error .= '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div>';
                }
            }
        } else {
            $error .= '<div class="alert alert-danger">Please choose image</div>';
        }

        $model = new ModelUser;
        $model->updateUser($_SESSION['user'],$username, $password, $fullname,string_to_date_mysql($birthday), $description, $target_file);
        $view = new View("profile.php");
        $view->set('error',$error);
        $usernew = new User($username, $password, $fullname, $birthday, $description, $target_file);
        $view->set('user',$usernew);
        $view->output();
     }
    public function createUser()
    {
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
                        $error = '<p class="text-success">Success: User is created successfully.</p>';
                    } else {
                        $error .= '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div>';
                    }
                }
            } else {
                $error .= '<div class="alert alert-danger">Please choose image</div>';
            }
        }
        $model = new ModelUser;
        $user = $model->getUserById($_SESSION['user']);
        $view = new View("createuser.php");
        $view->set('user',$user);
        $view->set('error', $error);
        $view->output();
    }
    public function listUser()
    {
        $model = new ModelUser;
        $people = $model->getAllPeople();
        $user = $model->getUserById($_SESSION['user']);
        $view = new View("listuser.php");
        $view->set('users',$people);
        $view->set('usercurrent',$user);
        $view->output();
    }
    public function updatePeople() {
        $error = '';
        if(!isset($_POST['username']))
        {
            $view = new View("updatepeople.php");
            $modeluser = new ModelUser;
            $user = $modeluser->getUserById($_GET['id']);
            $view->set('user', $user);
            $view->output();
            exit;
        }
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
        $user = $model->getUserById($_SESSION['user']);
        $target_file = $user->getLinkimage();
        if ($_FILES['avatar']['error'] == 0) {
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
                } else {
                    $error .= '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div>';
                }
            }
        } else {
            $error .= '<div class="alert alert-danger">Please choose image</div>';
        }

        $model = new ModelUser;
        $model->updateUser($_GET['id'],$username, $password, $fullname,string_to_date_mysql($birthday), $description, $target_file);
        $view = new View("updatepeople.php");
        $view->set('error',$error);
        $usernew = new User($username, $password, $fullname, $birthday, $description, $target_file);
        $view->set('user',$usernew);
        $view->output();
     }
}
