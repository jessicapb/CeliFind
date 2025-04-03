<?php
define('VIEWS',__DIR__.'/src/Views');
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//Views
// Product
use App\Controller\Manager\ManagerController;
use App\Controller\Product\ProductManagerController;
use App\Controller\Product\ProductAddController;
use App\Controller\Product\ProductToSubcategoryController;
use App\Controller\Product\ProductSearchController;

//Controller
use App\Controller\Product\ProductSaveBDController;
use App\Controller\Product\ProductSearchBDController;
use App\Controller\Product\ProductShowImageController;
use App\Controller\Product\ProductDeleteBDController;

//Database
use App\Infrastructure\Database\DatabaseConnection;

// Services
use App\Celifind\Services\Services;

// Services and connection to database
$db=DatabaseConnection::getConnection();
$services=new Services();
$services->addServices('db',fn()=>$db);
$db=$services->getService('db');

// Repository 
use  App\Infrastructure\Persistence\ProductRepository;

//Routes
use App\Infrastructure\Routing\Router;

// Routes repository
$services->addServices('productRepository', fn() => new ProductRepository($db));
$productRepository = $services->getService('productRepository');

// Save the product
$controllerproduct = new ProductSaveBDController($db);

// Show the product
$showlimitproduct = new ProductManagerController($productRepository);

// Show the image of the product
$showimageproduct = new ProductShowImageController($productRepository);

// Show the product id and name
$showidandnameproduct = new ProductToSubcategoryController($productRepository);

// Search the product
$controllersearchproduct = new ProductSearchBDController($db);

// Delete the product
$controllerdeleteproduct = new ProductDeleteBDController($db);

// Routes the show the views
$router = new Router();
$router 
    // Open the principal (index)
    ->addRoute('GET','/',[new ManagerController(),'manager'])

    // Go to the manager page
    ->addRoute('GET','/manager',[new ManagerController(),'manager'])

    //Go to the manager product
    ->addRoute('GET','/productmanager',[$showlimitproduct,'productmanager'])
    
    //Go to the image view
    ->addRoute('GET','/productshowimage',[$showimageproduct,'productshowimage'])

    // Go to the add product
    ->addRoute('GET','/productadd',[new ProductAddController(),'productadd'])

    // Save a product to the database or display errors
    ->addRoute('POST', '/saveproduct', [$controllerproduct, 'saveproduct'])
    
    // Go to the assign product to category
    ->addRoute('GET','/producttocategory', [$showidandnameproduct, 'producttocategory'])
    
    // Go to the search product
    ->addRoute('GET','/productsearch',[new ProductSearchController(),'productsearch'])
    
    // Search the product
    ->addRoute('POST','/searchproduct',[$controllersearchproduct,'searchproduct'])
    
    // Delete the product
    ->addRoute('POST','/deleteproduct',[$controllerdeleteproduct,'deleteproduct']);