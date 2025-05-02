<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($product->getName())?></title>
    <link href="./src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
</head>
<body>
    <header class="p-4">
        <nav class="flex justify-between">
            <a href="/">
                <img class="w-32" src="../img/logo/logo.png" alt="">
            </a>
            <div class="flex">
                <ul class="list-none p-4m hidden lg:flex items-center">
                    <li class="ml-8 font-bold"><a href="/productview">Productes</a></li>
                    <li class="ml-8"><a href="#">Receptes</a></li>
                    <li class="ml-8"><a href="#">Qui som ?</a></li>
                    <li class="ml-8"><a href="#">Informació</a></li>
                </ul>
                <div class="flex items-center gap-5 ml-16">
                    <a href="#" class="font-inter p-2 px-5 text-[16px] text-black border-[#96c368] border-2 rounded-[50px] font-normal hover:bg-[rgb(150,195,104)] hover:text-white transition duration-200">Registre</a>
                    <a href="#" class="font-inter p-2 px-9 text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-white transition duration-200">Iniciar Sessió</a>
                </div>
            </div>
        </nav>
        <div class="p-1 space-y-0.5">
            <a class="font-calistoga flex items-center gap-x-2 pt-[10px] rounded-[50px] text-[24px] text-black opacity-[78%] font-light" href="/productview">
                <img class="w-[1.8%] h-[1.8%]" src="../../img/home/home.png" alt="home">
                Tornar al producte
            </a>
        </div>
    </header>
    <section class="flex justify-center items-center">
        <div>
            <!-- Name -->
            <div>
                <?php
                $name = $product->getName();
                $formattedName = wordwrap($name, 40, "<br>");
                ?>
                <h1 class="font-calistoga text-[#96c368] opacity-[88%] text-[38px] font-semibold">
                    <?php echo $formattedName; ?>
                </h1>
            </div>
            
            <!-- Weight -->
            <p class="mt-[20px] font-inter text-black text-[17px] font-medium"><?php echo $product->getWeight()?></p>
            
            <!-- Description -->
            <div>
                <?php 
                $description = $product->getDescription();
                $formattedDescription = wordwrap($description, 100, "<br>");
                ?>
                <p class="mt-[20px] font-inter text-black text-[17px] font-light">
                    <?php echo $formattedDescription; ?>
                </p>
            </div>
            
            <!-- Price -->
            <p class="mt-[20px] font-inter text-black opacity-[78%] text-[18px] font-semibold"><?php echo $product->getPrice() ?></p>
            
            <!-- Nutritional information -->
            <div>
                <p class="mt-[20px] font-inter text-black opacity-[78%] text-[18px] font-semibold">Informació nutricional</p>
                <?php 
                if(!empty($nutritionalinformation = $product->getNutritionalinformation())){
                    $formattedNutritionalinformation = wordwrap($nutritionalinformation, 100, "<br>"); ?>
                    <p class="mt-[3px] font-inter text-black text-[17px] font-light">
                        <?php echo $formattedNutritionalinformation; ?>
                    </p>
                <?php
                }else{ ?>
                    <p class="mt-[3px] font-inter text-black text-[17px] font-light"><?php echo "No en té."; ?></p>
                <?php 
                }
                ?>
            </div>
            
            <!-- Brand-->
            <div>
                <p class="mt-[20px] font-inter text-black opacity-[78%] text-[18px] font-semibold">On el podem trobar?</p>
                <p class="mt-[3px] font-inter text-black text-[17px] font-light"><?php echo $product->getBrand()?></p>
            </div>
            
            <!-- Ingredients-->
            <div>
                <p class="mt-[20px] font-inter text-black opacity-[78%] text-[18px] font-semibold">Ingredients</p>
                <?php 
                $ingredients = $product->getIngredients();
                $formattedingredients = wordwrap($ingredients, 100, "<br>");
                ?>
                <p class="mt-[3px] font-inter text-black text-[17px] font-light"><?php echo $formattedingredients ?></p>
            </div>
        </div>
        
        <!-- Image-->
        <div class="shadow-lg w-[700px] h-auto ml-[60px] rounded-[21px] bg-white p-[10px] mr-[20px] flex jusityf-center items-center">
            <div class="w-full flex justify-center mb-3">
                <div class="w-[500px] h-[450px] flex mt-[15px] items-center justify-center">
                    <img src="<?php echo $product->getImage() ?>" alt="image_bd" class="object-contain w-full h-full">                                    
                </div>
            </div>
        </div>
    </section>
</body>
</html>