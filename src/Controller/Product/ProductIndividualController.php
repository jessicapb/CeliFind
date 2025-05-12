<?php 
namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Celifind\Services\SubcategoryServices;
use App\Celifind\Entities\Product;

class ProductIndividualController {
    private $productservices;
    private $subcategoriservice;
    
    public function __construct(ProductServices $productservices, SubcategoryServices $subcategoriservice) {
        $this->productservices = $productservices;
        $this->subcategoriservice = $subcategoriservice;
    }
    
    public function productindividual() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            if ($id) {
                
                $product = $this->productservices->findByIdUpdate($id);
                $subcategori = $this->subcategoriservice->showallsubcategory();
                $subcategoryName = '';
                
                foreach ($subcategori as $subcategory) {
                    if ($subcategory['id'] === $product->idsubcategory) {
                        
                        $subcategoryName = $subcategory['name'];
                        break;
                    }
                }
                
                echo view('product/individualproducts', [
                    'product' => $product,
                    'subcategori' => $subcategori,
                    'subcategoryName' => $subcategoryName
                ]);
            }
        }
    }
}