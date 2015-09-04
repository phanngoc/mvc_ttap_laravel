<?php
require_once 'Controller.php';
require_once HOME . DS . 'include' . DS . 'View.php';
require_once HOME . DS . 'model' . DS . 'Product.php';


class ProductController extends Controller {

	public function __construct() {
        parent::__construct();
    }

    public function index()
    {
    	$view = new View("product/index.php");
    	$product = new Product();
    	$productAll = $product->getAll();
        $view->set('productAll',$productAll);
        $view->output();
    }

    public function create()
    {
    	$view = new View("product/create.php");
        $view->output();
    }

    public function createPost()
    {
    	$product = new Product();
    	$product->addProduct($_POST['name'],$_POST['price'],$_POST['description']);
        header('Location: '.BASEURL.'?c=product/index');
    }

    public function edit($id)
    {
    	$view = new View("product/edit.php");
    	$modelProduct = new Product();
    	$product = $modelProduct->getProduct($id);
        $view->set('product',$product);
        $view->output();
    }

    public function editPost($id)
    {
    	$view = new View("product/edit.php");
    	$modelProduct = new Product();
    	$modelProduct->updateProduct($id,$_POST['name'],$_POST['price'],$_POST['description']);
    	header('Location: '.BASEURL.'?c=product/edit&id='.$id.'&m=ok');
    }

    public function delete($id)
    {
    	$modelProduct = new Product();
    	$modelProduct->deleteProduct($id);
    	header('Location: '.BASEURL.'?c=product/index');
    }
}