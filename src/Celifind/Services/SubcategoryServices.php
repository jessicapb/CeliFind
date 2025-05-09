<?php

namespace App\Celifind\Services;
use App\Infrastructure\Persistence\SubcategoryRepository;
use App\Celifind\Entities\Subcategory;
use App\Infrastructure\Persistence\CategoryRepository;

class SubcategoryServices{
    private \PDO $db;
    private SubcategoryRepository $SubcategoryRepository;
    
    function __construct(\PDO $db, SubcategoryRepository $SubcategoryRepository){
        $this->db = $db;
        $this->SubcategoryRepository = $SubcategoryRepository;
    }
    
    function exists(string $name):bool{
        return $this->SubcategoryRepository->exists($name);
    }
    
    function existsSubcategory(string $name, int $id):bool{
        return $this->SubcategoryRepository->existsSubcategory($name, $id);
    }
    
    function save(Subcategory $subcategory){
        $subcategory = $this->SubcategoryRepository->save($subcategory);
        return $subcategory;
    }
    
    function showlimit(){
        return $this->SubcategoryRepository->showlimit();
    }
    
    function findById(int $id){
        return $this->SubcategoryRepository->findById($id);
    }
    
    function update(Subcategory $subcategory){
        return $this->SubcategoryRepository->updateSubcategory($subcategory);
    }
    
    function delete(int $id){
        return $this->SubcategoryRepository->deleteSubcategory($id);
    }
    
    function searchsubcategory($name)
    {
        if (empty($name)) {
            return $this->SubcategoryRepository->getallsub();
        }
        return $this->SubcategoryRepository->searchByNameSubCategories($name);
    }
    
    function showallsubcategory(){
        return $this->SubcategoryRepository->getallsub();
    }
}