<?php

namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Entities\Product;

class ProductViewController {
    function productview(){
        echo view('product/viewproduct');
    }
}