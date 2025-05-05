<?php

namespace App\Celifind\Services;

use App\Infrastructure\Persistence\CategoryRepository;
use App\Celifind\Entities\Category;
use App\Celifind\Exceptions\BuildExceptions;

class CategoryServices{
    private \PDO $db;
    private CategoryRepository $CategoryRepository;
    
    function __construct(\PDO $db, CategoryRepository $CategoryRepository){
        $this->db = $db;
        $this->CategoryRepository = $CategoryRepository;
    }
    
    function exists(string $name):bool{
        return $this->CategoryRepository->exists($name);
    }
    
    function save(Category $category){
        $category = $this->CategoryRepository->save($category);
        return $category;
    }
    
    function showlimit(){
        return $this->CategoryRepository->showlimit();
    }
    
    function findById(int $id){
        return $this->CategoryRepository->findById($id);
    }
    
    function update(Category $category){
        return $this->CategoryRepository->updateCategory($category);
    }
    
    function delete(int $id){
        return $this->CategoryRepository->deleteCategory($id);
    }

    public function searchcategory($name)
    {
        if (empty($name)) {
            return $this->CategoryRepository->getall();
        }
    
        return $this->CategoryRepository->searchByName($name);
    }
    
    
    
    function showallcategory(){
        return $this->CategoryRepository->getall();
    }
}