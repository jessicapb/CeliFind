<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product->name ?></title>
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
                    <li class="ml-8"><a href="/receptes">Receptes</a></li>
                    <li class="ml-8"><a href="/quisom">Qui som ?</a></li>
                    <li class="ml-8"><a href="/informacio">Informació</a></li>
                </ul>
                <div class="flex items-center gap-5 ml-16">
                    <a href="/register" class="font-inter p-2 px-5 text-[16px] text-black border-[#96c368] border-2 rounded-[50px] font-normal hover:bg-[rgb(150,195,104)] hover:text-white transition duration-200">Registre</a>
                    <a href="/login" class="font-inter p-2 px-9 text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-white transition duration-200">Iniciar Sessió</a>
                </div>
            </div>
        </nav>
    </header>
    <section class="p-[30px] bg-slate-100">

        <?php

            // Construimos la URL de la subcategoría
            $subcategoryId = $product->idsubcategory;
            $subcategoryName = htmlspecialchars($subcategoryName);
            $subcategoryUrl = "/showspecificsubcategoriproduct?id=" . $subcategoryId;
        ?>

        <div class="breadcrumb-container">
            <ul class="breadcrumb flex gap-2">
                <li><a href="/" class="breadcrumb-link underline">Home</a></li>
                <li><span class="breadcrumb-separator"> / </span></li>
                    <li>
                        <form action="/showspecificsubcategoriproduct" method="POST" class="inline">
                                <input type="hidden" name="subcategory" value="<?php echo htmlspecialchars($product->subcategory_id); ?>">
                                <button type="submit" class="breadcrumb-link underline bg-transparent border-none cursor-pointer text-inherit font-inherit p-0 m-0">
                                <?php echo htmlspecialchars($subcategoryName); ?>
                            </button>
                        </form>
                    </li>
                <li><span class="breadcrumb-separator"> / </span></li>
                <li><a href="#" class="breadcrumb-link underline"><?php echo htmlspecialchars($product->name) ?></a></li>
            </ul>
        </div>

        <div class="flex flex-wrap justify-center items-center">
            <div class="mt-[25px] min-w-[500px]">
                <!-- Name -->
                <div>
                    <?php
                    $name = $product->name;
                    $formattedName = wordwrap($name, 40, "<br>");
                    ?>
                    <h1 class="font-calistoga text-[#96c368] opacity-[88%] text-[38px] font-semibold">
                        <?php echo $formattedName; ?>
                    </h1>
                </div>
                
                <!-- Weight -->
                <p class="mt-[20px] font-inter text-black text-[17px] font-medium"><?php echo $product->weight?></p>
                
                <!-- Description -->
                <div>
                    <?php 
                    $description = $product->description;
                    $formattedDescription = wordwrap($description, 100, "<br>");
                    ?>
                    <p class="mt-[20px] font-inter text-black text-[17px] font-light">
                        <?php echo $formattedDescription; ?>
                    </p>
                </div>
                
                <!-- Price -->
                <p class="mt-[20px] font-inter text-black opacity-[78%] text-[18px] font-semibold"><?php echo $product->price ?></p>
                
                <!-- Nutritional information -->
                <div>
                    <p class="mt-[20px] font-inter text-black opacity-[78%] text-[18px] font-semibold">Informació nutricional</p>
                    <?php 
                    if(!empty($nutritionalinformation = $product->nutritionalinformation)){
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
                    <p class="mt-[3px] font-inter text-black text-[17px] font-light"><?php echo $product->brand?></p>
                </div>
                
                <!-- Ingredients-->
                <div>
                    <p class="mt-[20px] font-inter text-black opacity-[78%] text-[18px] font-semibold">Ingredients</p>
                    <?php 
                    $ingredients = $product->ingredients;
                    $formattedingredients = wordwrap($ingredients, 100, "<br>");
                    ?>
                    <p class="mt-[3px] font-inter text-black text-[17px] font-light"><?php echo $formattedingredients ?></p>
                </div>
            </div>
            <!-- Image-->
            <div class="min-w-[500px] border-2 shadow-lg w-[700px] h-auto ml-0 mt-[50px] xl:ml-[60px] xl:mt-0 lg:ml-[60px] lg:mt-0 rounded-[21px] bg-white p-[10px] mr-[20px] flex jusityf-center items-center">
                <div class="w-full flex justify-center mb-3">
                    <div class="w-[80%] h-[450px] flex mt-[15px] items-center justify-center">
                        <img src="<?php echo $product->image ?>" alt="image_bd" class="object-contain w-full h-full">                                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
</body>
</html>