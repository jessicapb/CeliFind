<?php
define('VIEWS',__DIR__.'/src/Views');
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//ControllerHome
use App\Controller\Home\HomeController;

// View Manager
use App\Controller\Manager\ManagerController;

//ViewsProduct
use App\Controller\Product\ProductManagerController;
use App\Controller\Product\ProductAddController;
use App\Controller\Product\ProductToSubcategoryController;
use App\Controller\Product\ProductSearchController;
use App\Controller\Product\ProductShowImageController;
use App\Controller\Product\ProductUpdateController;

//ControllerProduct
use App\Controller\Product\ProductSaveBDController;
use App\Controller\Product\ProductSearchBDController;
use App\Controller\Product\ProductDeleteBDController;
use App\Controller\Product\ProductUpdateBDController;

//ViewsRecipes
use App\Controller\Recipes\RecipesManagerController;
use App\Controller\Recipes\RecipesAddController;

// ControllerRecipes
use App\Controller\Recipes\RecipesSaveBDController;

// ControllerCategory
use App\Controller\Category\CategoryShowBDController;
use App\Controller\Category\CategoryAddBDController;
use App\Controller\Category\CategorySaveBDController;
use App\Controller\Category\CategoryDeleteBDController;

// ControllerSubcategory
use App\Controller\Subcategory\SubcategoryShowBDController;
use App\Controller\Subcategory\SubcategoryAddBDController;
use App\Controller\Subcategory\SubcategorySaveBDController;
use App\Controller\Subcategory\SubcategoryDeleteBDController;

//Database
use App\Infrastructure\Database\DatabaseConnection;

// Services
use App\Celifind\Services\Services;

// Services and connection to database
$db=DatabaseConnection::getConnection();
$services=new Services();
$services->addServices('db',fn()=>$db);
$db=$services->getService('db');

// RepositoryCategory
use App\Infrastructure\Persistence\CategoryRepository;

// RepositorySubcategory
use App\Infrastructure\Persistence\SubcategoryRepository;

// RepositoryProduct
use  App\Infrastructure\Persistence\ProductRepository;

// RepositoryRecipes
use  App\Infrastructure\Persistence\RecipesRepository;

//Routes
use App\Infrastructure\Routing\Router;

// Routes productrepository
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

// Update the product
$controllerupdateproduct = new ProductUpdateBDController($db);

// Delete the product
$controllerdeleteproduct = new ProductDeleteBDController($db);

// Show the form for update the product
$showformupdate = new ProductUpdateController($db);

// Routes recipesrepository
$services->addServices('recipesRepository', fn() => new RecipesRepository($db));
$recipesRepository = $services->getService('recipesRepository');

// Save the recipes
$saverecipes = new RecipesSaveBDController($db);

// Routes Category Repository
$services->addServices('categoryRepository', fn() => new CategoryRepository($db));
$categoryRepository = $services->getService('categoryRepository');

// Routes Subcategory Repository
$services->addServices('subcategoryRepository', fn() => new SubcategoryRepository($db));
$subcategoryRepository = $services->getService('subcategoryRepository');

// Routes to show the views
$router = new Router();
$router 
    // Open the principal (index)
    ->addRoute('GET','/',[new HomeController(),'home'])

    // Go to the home page
    ->addRoute('GET','/home',[new HomeController(),'home'])
        
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
    ->addRoute('POST','/deleteproduct',[$controllerdeleteproduct,'deleteproduct'])
    
    // Form to update
    ->addRoute('POST','/productupdate',[$showformupdate,'productupdate'])
    
    // Update the product
    ->addRoute('POST','/updateproduct',[$controllerupdateproduct,'updateproduct'])
    
    // Go to the manager recipes
    ->addRoute('GET','/recipesmanager',[new RecipesManagerController(),'recipesmanager'])
    
    // Go to the add recipes
    ->addRoute('GET','/recipesadd',[new RecipesAddController(),'recipesadd'])
    
    // Save a recipe to the database or display errors
    ->addRoute('POST', '/saverecipes', [$saverecipes, 'saverecipes'])
    
    // Go to the show categories
    ->addRoute('GET', '/category', [new CategoryShowBDController($db), 'showcategory'])
    
    ->addRoute('GET', '/categoryadd', [new CategoryAddBDController(), 'categoryadd'])
    
    ->addRoute('POST', '/savecategory', [new CategorySaveBDController($db), 'savecategory'])
    
    ->addRoute('POST', '/deletecategory', [new CategoryDeleteBDController($db), 'deletecategory'])
    
    // Go to the show subcategories
    ->addRoute('GET', '/subcategory', [new SubcategoryShowBDController($db), 'showsubcategory'])
    
    ->addRoute('GET', '/addsubcategory', [new SubcategoryAddBDController($db), 'addsubcategory'])
    
    ->addRoute('POST', '/savesubcategory', [new SubcategorySaveBDController($db), 'savesubcategory'])
    
    ->addRoute('POST', '/deletesubcategory', [new SubcategoryDeleteBDController($db), 'deletesubcategory']);
