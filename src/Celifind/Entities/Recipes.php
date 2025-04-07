<?php
namespace App\Celifind\Entities;

class Recipes{
    protected ?int $id = null;
    protected string $name;
    protected string $description;
    protected string $ingredient;
    protected string $duration;
    protected string $difficulty;
    protected string $instruction;
    protected string $image;

    public function __construct(?int $id = null, string $name, string $description, string $ingredient, string $duration, string $difficulty, string $instruction, string $image){
        $error = 0;
    }
}
