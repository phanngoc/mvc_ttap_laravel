<?php
session_start();
define ('DS', DIRECTORY_SEPARATOR);
define ('HOME', dirname(__FILE__));
define ('BASEURL', 'http://localhost/Ttaptuan3-4');
//error_reporting(E_ALL);
ini_set ('display_errors', 1);
require HOME.DS.'include'.DS.'Db.php';
require HOME.DS.'include'.DS.'Helper.php';
$db = new Db( 'mysql', 'localhost', 'baitap', 'root','Phann123@123');

require_once 'controller'.DS.'LoginController.php';
require_once 'controller'.DS.'InfoController.php';
require_once 'controller'.DS.'ProductController.php';

// if(isset($_GET['action']))
// {
//     if($_GET['action']=='login')
//     {
//         $logincontroller = new LoginController();
//         $logincontroller->preInit();
//         $logincontroller->login();
//     }
//     else if($_GET['action']=='register')
//     {
//         $logincontroller = new LoginController();
//         $logincontroller->preInit();
//         $logincontroller->register();
//     }
//     else if($_GET['action']=='logout')
//     {
//         $logincontroller = new LoginController();
//         //$logincontroller->preInit();
//         $logincontroller->logout();
//     }
//     else if($_GET['action']=='profile')
//     {
//         $infocontroller = new InfoController();
//         $infocontroller->preInit();
//         $infocontroller->index();
//     }
//     else if($_GET['action']=='updateprofile')
//     {
//         $infocontroller = new InfoController();
//         $infocontroller->preInit();
//         $infocontroller->update();
//     }
//     else if($_GET['action']=='createuser')
//     {
//         $infocontroller = new InfoController();
//         $infocontroller->preInit();
//         $infocontroller->createUser();
//     }
//     else if($_GET['action']=='listuser')
//     {
//         $infocontroller = new InfoController();
//         $infocontroller->preInit();
//         $infocontroller->listUser();
//     }
//     else if($_GET['action']=='updatepeople')
//     {
//         $infocontroller = new InfoController();
//         $infocontroller->preInit();
//         $infocontroller->updatePeople();
//     }
// }
// else
// {
//     $logincontroller = new LoginController();
//     $logincontroller->preInit();
//     $logincontroller->index();
// }


if(isset($_GET['c']))
{
    if($_GET['c']=='product/index')
    {
        $productController = new ProductController();
        $productController->index();
    }
    else if($_GET['c']=='product/create')
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $productController = new ProductController();
            $productController->createPost();
        }
        else
        {
            $productController = new ProductController();
            $productController->create();
        }
        
    }
    else if($_GET['c']=='product/edit')
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $productController = new ProductController();
            $productController->editPost($_GET['id']);
        }
        else
        {
            $productController = new ProductController();
        $productController->edit($_GET['id']);
        }
        
    }
    else if($_GET['c']=='product/delete')
    {
        $productController = new ProductController();
        $productController->delete($_GET['id']);
    }
}
else
{
    $productController = new ProductController();
    $productController->index();
}