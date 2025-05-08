<?php
define('VIEWS',__DIR__.'/src/Views');
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//ControllerHome
use App\Controller\Home\HomeController;

//ViewsProduct
use App\Controller\Product\ProductManagerController;
use App\Controller\Product\ProductAddController;
use App\Controller\Product\ProductShowImageController;
use App\Controller\Product\ProductUpdateController;
use App\Controller\Product\ProductViewController;
use App\Controller\Product\ProductToSubcategoryController;
use App\Controller\Product\ProductIndividualController;

//ControllerProduct
use App\Controller\Product\ProductSaveBDController;
use App\Controller\Product\ProductDeleteBDController;
use App\Controller\Product\ProductUpdateBDController;
use App\Controller\Product\ProductToSubcategoryBDController;
use App\Controller\Product\ProductSearchBDController;
use App\Controller\Product\ProductSearchStateOneBDController;
use App\Controller\Product\SpecificproductsubcatController;

//ViewsRecipes
use App\Controller\Recipes\RecipesManagerController;
use App\Controller\Recipes\RecipesAddController;
use App\Controller\Recipes\RecipesShowImageController;
use App\Controller\Recipes\RecipesViewController;
use App\Controller\Recipes\RecipesIndividualController;

// ControllerRecipes
use App\Controller\Recipes\RecipesSaveBDController;
use App\Controller\Recipes\RecipesDeleteBDController;
use App\Controller\Recipes\RecipesSearchBDController;
use App\Controller\Recipes\RecipesSearchAllBDController;

// ControllerCategory
use App\Controller\Category\CategoryShowBDController;
use App\Controller\Category\CategoryAddBDController;
use App\Controller\Category\CategorySaveBDController;
use App\Controller\Category\CategoryDeleteBDController;
use App\Controller\Category\CategoryUpdateController;
use App\Controller\Category\CategoryUpdateBDController;
use App\Controller\Category\CategoryShowImageBDController;
use App\Controller\Category\CategorySearchBDController;
use App\Controller\Category\CategorySearchController;

// ControllerSubcategory
use App\Controller\Subcategory\SubcategoryShowBDController;
use App\Controller\Subcategory\SubcategoryAddBDController;
use App\Controller\Subcategory\SubcategorySaveBDController;
use App\Controller\Subcategory\SubcategoryDeleteBDController;
use App\Controller\Subcategory\SubcategoryUpdateController;
use App\Controller\Subcategory\SubcategoryUpdateBDController;
use App\Controller\Subcategory\SubcategorySearchBDController;

// User controllers
use App\Controller\User\UserLoginController;
use App\Controller\User\UserRegisterController;
use App\Controller\User\LogoutController;
use App\Controller\User\ForgotPasswordController;
use App\Controller\User\ResetPasswordController;

//Privacity
use App\Controller\Privacity\privacityController;
use App\Controller\Privacity\politicprivController;

//Pages
use App\Controller\Pages\quisomController;
use App\Controller\Pages\informacioController;

// Database
use App\Infrastructure\Database\DatabaseConnection;

// Services
use App\Celifind\Services\Services;

// Product Services
use App\Celifind\Services\ProductServices;

// Recipes Services
use App\Celifind\Services\RecipesServices;

// Category Services
use App\Celifind\Services\CategoryServices;

// Subcategory Services
use App\Celifind\Services\SubcategoryServices;

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

// Services and connection to database
$db=DatabaseConnection::getConnection();
$services=new Services();
$services->addServices('db',fn()=>$db);
$db=$services->getService('db');

// Routes productrepository
$services->addServices('productRepository', fn() => new ProductRepository($db));
$productRepository = $services->getService('productRepository');

// Routes productservices
$services->addServices('productServices', fn() => new ProductServices($db, $services->getService('productRepository')));
$productServices = $services->getService('productServices');

// Save the product
$controllerproduct = new ProductSaveBDController($db);

// Show the image of the product
$showimageproduct = new ProductShowImageController($productServices);

// Update the product
$controllerupdateproduct = new ProductUpdateBDController($db, $productServices);

// Delete the product
$controllerdeleteproduct = new ProductDeleteBDController($db);

// Assign product to subcategory
$controllerproducttosubcategory = new ProductToSubcategoryBDController($db);

// Show the form for update the product
$showformupdate = new ProductUpdateController($db, $productServices);

// Show a individual product
$showindividualproduct =  new ProductIndividualController($productServices);

// Show the products of home
$homeproducts = new HomeController($productServices);

// User controllers
$userLoginController = new UserLoginController($db);
$userRegisterController = new UserRegisterController($db);
$logoutController = new LogoutController();
$forgotPasswordController = new ForgotPasswordController($db);
$resetPasswordController = new ResetPasswordController($db);

// Routes recipesrepository
$services->addServices('recipesRepository', fn() => new RecipesRepository($db));
$recipesRepository = $services->getService('recipesRepository');

// Routes productservices
$services->addServices('recipesServices', fn() => new RecipesServices($db, $services->getService('recipesRepository')));
$RecipesServices = $services->getService('recipesServices');

// Save the recipes
$saverecipes = new RecipesSaveBDController($db);

// Show the recipes
$showlimitrecipes = new RecipesManagerController($RecipesServices);

// Show the image of the recipes
$showimagerecipes = new RecipesShowImageController($RecipesServices);

// Delete the recipes
$deleterecipes = new RecipesDeleteBDController($db);

// Go to the view of the recipes
$viewrecipes =  new RecipesViewController($RecipesServices);

// Show the individual recipes
$individualrecipes =  new RecipesIndividualController($RecipesServices);

// Routes Category Repository
$services->addServices('categoryRepository', fn() => new CategoryRepository($db));
$categoryRepository = $services->getService('categoryRepository');

// Routes Subcategory Repository
$services->addServices('subcategoryRepository', fn() => new SubcategoryRepository($db));
$subcategoryRepository = $services->getService('subcategoryRepository');

// Routes Category Services
$services->addServices('categoryServices', fn() => new CategoryServices($db, $services->getService('categoryRepository')));
$categoryServices = $services->getService('categoryServices');

// Routes SubCategory Services
$services->addServices('subcategoryServices', fn() => new SubcategoryServices($db, $services->getService('subcategoryRepository')));
$subcategoryServices = $services->getService('subcategoryServices');

// View the update of the category
$formupdate = new CategoryUpdateController($db, $categoryServices);

// View the update of the subcategory
$formupdatesubcategory = new SubcategoryUpdateController($subcategoryServices, $categoryServices);

// Update the category
$controllerupdatecategory = new CategoryUpdateBDController($db, $categoryServices);

// Update the subcategory
$controllerupdatesubcategory = new SubcategoryUpdateBDController($db, $subcategoryServices);

// Show the categories & subcategories in View Product
$viewproduct = new ProductViewController($productServices, $categoryServices, $subcategoryServices);

// Show the name of the product and subcategory
$shownameproductandsubcategory = new ProductToSubcategoryController($productServices, $subcategoryServices);

// Show the product and the of the subcategory
$showlimitproduct = new ProductManagerController($productServices, $subcategoryServices);

// Routes to show the views
$router = new Router();
$router 
    // Open the principal (index)
    ->addRoute('GET','/',[$homeproducts,'home'])
    
    // Go to the home page
    ->addRoute('GET','/home',[$homeproducts,'home'])
    
    //Go to the manager product
    ->addRoute('GET','/productmanager',[$showlimitproduct,'productmanager'])
    
    //Go to the image view
    ->addRoute('GET','/productshowimage',[$showimageproduct,'productshowimage'])
    
    // Go to the add product
    ->addRoute('GET','/productadd',[new ProductAddController(),'productadd'])
    
    // Save a product to the database or display errors
    ->addRoute('POST', '/saveproduct', [$controllerproduct, 'saveproduct'])
    
    // Go to the assign product to category
    ->addRoute('GET','/producttocategory', [$shownameproductandsubcategory, 'producttocategory'])
    
    // Delete the product
    ->addRoute('POST','/deleteproduct',[$controllerdeleteproduct,'deleteproduct'])
    
    // Assign product to subcategory
    ->addRoute('POST','/addProducttoSubcategory',[$controllerproducttosubcategory,'addProducttoSubcategory'])
    
    // Form to update
    ->addRoute('GET','/productupdates',[$showformupdate,'productupdates'])
    
    // Update the product
    ->addRoute('POST','/updateproduct',[$controllerupdateproduct,'updateproduct'])
    
    // View of the product
    ->addRoute('GET','/productview',[$viewproduct,'productview'])
    
    // View of a individual product
    ->addRoute('POST','/productindividual',[$showindividualproduct,'productindividual'])
    
    // Search the product
    ->addRoute('POST', '/searchproduct', [new ProductSearchBDController($db, $productServices, $subcategoryServices), 'searchproduct'])
    
    ->addRoute('GET', '/showsearchresults', [new ProductSearchBDController($db, $productServices, $subcategoryServices), 'showsearchresults'])
    
    // Search the product with state one
    ->addRoute('POST', '/searchproductstateone', [new ProductSearchStateOneBDController($db, $productServices, $categoryServices ,$subcategoryServices), 'searchproductstateone'])
    
    ->addRoute('GET', '/showsearchresultsproductone', [new ProductSearchStateOneBDController($db, $productServices , $categoryServices ,$subcategoryServices), 'showsearchresultsproductone'])
    
    //Search specific product
    ->addRoute('POST' , '/showspecificsubcategoriproduct', [new SpecificproductsubcatController($subcategoryServices,$categoryServices,$productServices),'showspecificsubcategoriproduct'])
    
    // Go to the manager recipes
    ->addRoute('GET','/recipesmanager',[$showlimitrecipes,'recipesmanager'])
    
    // Go to the add recipes
    ->addRoute('GET','/recipesadd',[new RecipesAddController(),'recipesadd'])
    
    // Save a recipe to the database or display errors
    ->addRoute('POST', '/saverecipes', [$saverecipes, 'saverecipes'])
    
    // Show the image of the recipes showimagerecipes
    ->addRoute('GET', '/recipesshowimage', [$showimagerecipes, 'recipesshowimage'])
    
    // Delete the recipes
    ->addRoute('POST', '/deleterecipes', [$deleterecipes, 'deleterecipes'])
    
    // Go to the view of recipes
    ->addRoute('GET','/receptes',[$viewrecipes,'recipesview'])
    
    // Go to the individual recipes
    ->addRoute('POST','/recipesindividual',[$individualrecipes,'recipesindividual'])
    
    // Search the recipes
    ->addRoute('POST', '/searchrecipes', [new RecipesSearchBDController($db, $RecipesServices), 'searchrecipes'])
    
    ->addRoute('GET', '/showsearchresultsrecipes', [new RecipesSearchBDController($db, $RecipesServices), 'showsearchresultsrecipes'])
    
    // Search the recipes
    ->addRoute('POST', '/searchrecipesall', [new RecipesSearchAllBDController($db, $RecipesServices), 'searchrecipesall'])
    
    ->addRoute('GET', '/showsearchresultsrecipesall', [new RecipesSearchAllBDController($db, $RecipesServices), 'showsearchresultsrecipesall'])
    
    // Go to the show categories
    ->addRoute('GET', '/category', [new CategoryShowBDController($db, $categoryServices), 'showcategory'])
    
    ->addRoute('GET', '/categoryadd', [new CategoryAddBDController(), 'categoryadd'])
    
    ->addRoute('POST', '/savecategory', [new CategorySaveBDController($db, $categoryServices), 'savecategory'])
    
    ->addRoute('POST', '/deletecategory', [new CategoryDeleteBDController($db, $categoryServices), 'deletecategory'])
    
    ->addRoute('GET','/categoryupdate',[$formupdate,'categoryupdate'])
    
    ->addRoute('POST','/updatecategory',[$controllerupdatecategory,'updatecategory'])
    
    ->addRoute('GET','/categoryshowimage',[new CategoryShowImageBDController($db, $categoryServices),'categoryshowimage'])
    
    ->addRoute('POST', '/searchcategory', [new CategorySearchBDController($db, $categoryServices), 'searchcategory'])
    
    ->addRoute('GET', '/categorysearch', [new CategorySearchBDController($db, $categoryServices), 'showsearchresults'])
    
    // Go to the show subcategories
    ->addRoute('GET', '/subcategory', [new SubcategoryShowBDController($db, $subcategoryServices, $categoryServices), 'showsubcategory'])
    
    ->addRoute('GET', '/addsubcategory', [new SubcategoryAddBDController($db, $categoryServices), 'addsubcategory'])
    
    ->addRoute('POST', '/savesubcategory', [new SubcategorySaveBDController($db, $subcategoryServices), 'savesubcategory'])
    
    ->addRoute('POST', '/deletesubcategory', [new SubcategoryDeleteBDController($db, $subcategoryServices), 'deletesubcategory'])
    
    ->addRoute('GET','/subcategoryupdate',[$formupdatesubcategory,'subcategoryupdate'])
    
    ->addRoute('POST','/updatesubcategory',[$controllerupdatesubcategory,'updatesubcategory'])
    
    ->addRoute('POST', '/searchsubcategory', [new SubcategorySearchBDController($db, $subcategoryServices, $categoryServices), 'searchsubcategory'])
    
    ->addRoute('GET', '/subcategorysearch', [new SubcategorySearchBDController($db, $subcategoryServices, $categoryServices), 'showsearchresults'])
    
    // Go to the login page
    ->addRoute('GET','/login',[$userLoginController,'showLogin'])
    
    // Go to the register page
    ->addRoute('GET','/register',[$userRegisterController,'showRegister'])
    
    // Handle login POST
    ->addRoute('POST','/userlogin',[$userLoginController,'login'])
    
    // Handle register POST
    ->addRoute('POST','/userregister',[$userRegisterController,'register'])
    
    // Handle logout GET
    ->addRoute('GET','/logout',[$logoutController,'logout'])
    
    // Recuperación de contraseña
    ->addRoute('GET','/forgotpassword',[$forgotPasswordController,'showForgotPassword'])
    ->addRoute('POST','/forgotpassword',[$forgotPasswordController,'sendResetLink'])
    ->addRoute('GET','/resetpassword',[$resetPasswordController,'showResetPassword'])
    ->addRoute('POST','/resetpassword',[$resetPasswordController,'updatePassword'])
    
    //GO to Privacity section
    ->addRoute('GET','/privacity',[new privacityController(), 'privacity'])
    
    ->addRoute('GET','/politicpriv',[new politicprivController(), 'politicpriv'])
    
    //Go to quisom pages
    ->addRoute('GET','/quisom',[new quisomController(), 'quisom'])
    
    //Go to informacio
    
    ->addRoute('GET','/informacio',[new informacioController(), 'informacio']);