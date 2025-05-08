<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualitzar producte</title>
    <link href="./src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>
<body>
    <!--Header section!-->
    <header class="pb-[15px] border-b border-gray-300">
        <nav class="flex justify-between items-center w-full">
            <a class="pl-[20px] pt-[20px]" href="/productmanager">
                <img class="w-32" src="../../img/logo/logo.png" alt="logoimg">
            </a>
            <div class="flex items-center mr-[20px]">
                <a href="/productmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-bold">Productes</a>
                <a href="/recipesmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Receptes</a>
                <a href="/category" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Establiments</a>
                <a href="/category" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Categories</a>
                <a href="/subcategory" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Subcategories</a>
                <!-- Dropdown -->
                <div class="relative inline-block text-left">
                    <button id="dropdown-toggle" type="button" class="font-inter p-[8px] w-[90%] mr-[65px] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                    Administrador
                    </button>
                    
                    <div id="dropdown-menu" class="font-inter hidden absolute left-0 mt-2 w-[90%] origin-top-center text-black bg-white border-1 shadow-lg rounded-[50px] z-10">
                        <div class="p-1 space-y-0.5">
                            <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/logout">
                                <img class="w-[18%] h-[18%]" src="../../img/logout/logout.svg" alt="">
                                Tancar sessió
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <section class="bg-slate-100 pb-[20px]">
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] font-bold mb-6 text-center">Actualitzar <span class="text-[#96c368] opacity-[100%]">producte</span></h1>
        
        <form class="flex justify-center" action="/updateproduct" method="POST" enctype="multipart/form-data">
            <?php $product = $product; ?>
            <input type="hidden" name="id" value="<?= $formData['id'] ?? '' ?>">
            <div class="w-[18%]">
                <!-- Name -->
                <div class="flex flex-col  mb-[15px]">
                    <label for="name" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Nom</label>
                    <input name="name" type="text" value="<?= $formData['name'] ?? '' ?>" class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" placeholder="Introdueix el nom">
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['name'] ?? '' ?></p>
                </div>
                
                <!-- Description -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Descripció</label>
                    <textarea name="description" class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" ><?= $formData['description'] ?? '' ?></textarea>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['description'] ?? '' ?></p>
                </div>
                
                <!-- Price -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Preu</label>
                    <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" value="<?= $formData['price'] ?? '' ?>" name="price" type="text">
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['price'] ?? '' ?></p>
                </div>
                
                <!-- Ingredients -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Ingredients</label>
                    <textarea class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="ingredients"><?= $formData['ingredients'] ?? '' ?></textarea>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['ingredients'] ?? '' ?></p>
                </div>
                
                <!-- Nutritional information -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Informació nutricional</label>
                    <textarea class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="nutritionalinformation"><?= $formData['nutritionalinformation'] ?? 'No en té' ?></textarea>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['nutritionalinformation'] ?? '' ?></p>
                </div>
                
                <!-- Brand -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Marca</label>
                    <textarea class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="brand"><?= $formData['brand'] ?? '' ?></textarea></textarea>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['brand'] ?? '' ?></p>
                </div>
                
                <!-- Image-->
                <div class="flex flex-col mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Imatge</label>
                    <!-- No mostrar l'input -->
                    <input id="image" type="file" accept=".jpg, .jpeg, .png" name="image" class="hidden" onchange="previewImage()">
                    
                    <!-- Serveix per seleccionar la imatge-->
                    <div id="image-trigger" class="relative p-[8px] border border-[#fcb666] rounded-[9px] flex items-center justify-center cursor-pointer">
                        <img src="../../img/uploadimage/imageupload.png" alt="upload" class="w-[12%] h-[12%]">    
                        <span class="pl-[5px] text-black text-[16px] font-inter font-normal">Clica per seleccionar una imatge</span>
                    </div>
                    
                    <!-- Mostrarà la imatge amb el seu nom -->
                    <div id="image-preview" class="mt-[10px] flex items-center hidden">
                        <img id="preview-img" src="../../img/uploadimage/imageupload.png" alt="imatge" class="w-[50px] h-[50px] object-cover rounded-[5px] mr-[10px]">
                        <span id="image-name" class="text-black text-[16px] font-normal"></span>
                    </div>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['image'] ?? '' ?></p> 
                </div>
                
                <!-- Weight -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Pes</label>
                    <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" value="<?= $formData['weight'] ?? '' ?>" name="weight"  type="text">
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['weight'] ?? '' ?></p>
                </div> 
                
                <!-- State -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Estat</label>
                    <select class="bg-white border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="state">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['state'] ?? '' ?></p>
                </div> 
                
                <!-- Button -->
                <div class="flex flex-col mb-[15px]">
                    <button class="font-inter bg-[#FCB666] text-[#f5f5f5] text-[16px] font-medium p-[8px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                        Actualitzar producte
                    </button> 
                </div>
            </div>
        </form>
    </section>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <!-- Show images -->
    <script src="../../js/showimage/showimage.js"></script>
    
    <!-- Start the session to catch the errors -->
    <?php
        session_start();
        if (!empty($_SESSION['errors'])) {
            $serverErrors = $_SESSION['errors'];
            unset($_SESSION['errors']);
        } else {
            $serverErrors = [];
        }
    ?>
    
    <script>
        var serverErrors = <?php echo json_encode($serverErrors); ?>;
    </script>
    
    <!-- Show images -->
    <script src="../../js/showimage/showimage.js"></script>
    
    <!-- File errors -->
    <script src="../../js/product/error-product.js"></script>
</body>
</html>