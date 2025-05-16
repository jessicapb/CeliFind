<?php session_start();?>
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
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>
<body>
<header class="p-4 border-b border-gray-300">
        <nav class="flex justify-between items-center">
            <a href="/">
                <img class="w-32" src="../img/logo/logo.png" alt="">
            </a>
            <div class="flex items-center">
                <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) : ?>
                    <ul class="list-none flex p-4 hidden lg:flex items-center md:flex items-center">
                        <li class="list-none ml-8 font-bold"><a href="/productview">Productes</a></li>
                        <li class="list-none ml-8"><a href="/receptes">Receptes</a></li>
                        <li class="list-none ml-8"><a href="/locationview">Establiments</a></li>
                    </ul>
                <?php else: ?>
                    <ul class="list-none flex p-4 hidden lg:flex items-center">
                        <li class="list-none ml-8 font-bold"><a href="/productview">Productes</a></li>
                        <li class="list-none ml-8"><a href="/receptes">Receptes</a></li>
                        <li class="list-none ml-8"><a href="/locationview">Establiments</a></li>
                        <li class="list-none ml-8"><a href="/quisom">Qui som ?</a></li>
                        <li class="list-none ml-8"><a href="/informacio">Informació</a></li>
                    </ul>
                <?php endif; ?>
                <div class="relative inline-block text-left">
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['status']==1) : ?>
                        <button id="dropdown-toggle" type="button" class="font-inter min-w-[180px] p-[8px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                            <?= htmlspecialchars($_SESSION['user']['name']) ?>
                        </button>
                        <div id="dropdown-menu" class="font-inter hidden absolute left-0 mt-2 w-[100%] origin-top-center text-black bg-white border-1 shadow-lg rounded-[20px] z-10">
                            <div class="p-1 space-y-0.5">
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href=" /editprofile">
                                    <img class="w-[17%] h-[17%]" src="../../img/logout/editar.svg" alt="editicon">
                                    Editar perfil
                                </a>
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/logout">
                                    <img class="w-[18%] h-[18%]" src="../../img/logout/logout.svg" alt="">
                                    Tancar sessió
                                </a>
                            </div>
                        </div>
                        <?php elseif (isset($_SESSION['user']) && $_SESSION['user']['status']==2): ?>
                            <button id="dropdown-toggle" type="button" class="font-inter min-w-[180px] p-[8px]  text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                            <?= htmlspecialchars($_SESSION['user']['name']) ?>
                        </button>
                        <div id="dropdown-menu" class="font-inter hidden absolute left-0 mt-2 w-[100%] origin-top-center text-black bg-white border-1 shadow-lg rounded-[20px] z-10">
                            <div class="p-1 space-y-0.5">
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href=" /editprofile">
                                    <img class="w-[17%] h-[17%]" src="../../img/logout/editar.svg" alt="editicon">
                                    Editar perfil
                                </a>
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/productmanager">
                                    <img class="w-[17%] h-[17%]" src="../../img/logout/manager.svg" alt="editicon">
                                    Manager
                                </a>
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/logout">
                                    <img class="w-[18%] h-[18%]" src="../../img/logout/logout.svg" alt="">
                                    Tancar sessió
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center gap-5 ml-16">
                            <a href="/register" class="font-inter p-2 px-5 text-[16px] text-black border-[#96c368] border-2 rounded-[50px] font-normal hover:bg-[rgb(150,195,104)] hover:text-white transition duration-200">Registre</a>
                            <a href="/login" class="font-inter p-2 px-9 text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-white transition duration-200">Iniciar Sessió</a>
                        </div>
                    <?php endif; ?>
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
                                <input type="hidden" name="subcategory" value="<?php echo htmlspecialchars($product->idsubcategory);?>">
                                <button type="submit" class="breadcrumb-link underline bg-transparent border-none cursor-pointer text-inherit font-inherit p-0 m-0">
                                <?php echo htmlspecialchars($subcategoryName); ?>
                            </button>
                        </form>
                    </li>
                <li><span class="breadcrumb-separator"> / </span></li>
                <li>
                    <form action="/productindividual" method="POST">
                        <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                        <button type="submit" class="breadcrumb-link underline font-bold">
                            <?php echo htmlspecialchars($product->name) ?>
                        </button>
                    </form>
                </li>
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
    
    <!--Dropdown section!-->
    <script src="../../js/dropdown/dropdown.js"></script>
</body>
</html>