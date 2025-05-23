<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualitzar la recepta</title>
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
            <div class="flex items-center">
                <a href="/productmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Productes</a>
                <a href="/recipesmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-bold">Receptes</a>
                <a href="/establishmentsmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Establiments</a>
                <a href="/category" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Categories</a>
                <a href="/subcategory" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Subcategories</a>
                <a href="/usersmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Usuaris</a>
                <!-- Dropdown -->
                <div class="relative inline-block text-left">
                    <?php if (isset($_SESSION['user'])): ?>
                        <button id="dropdown-toggle" type="button" class="font-inter min-w-[180px] p-[8px] mr-[30px] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                            <?= htmlspecialchars($_SESSION['user']['name']) ?>
                        </button>
                        <div id="dropdown-menu" class="font-inter hidden absolute left-0 mt-2 w-[90%] origin-top-center text-black bg-white border-1 shadow-lg rounded-[20px] z-10">
                            <div class="p-1 space-y-0.5">
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/home">
                                    <img class="w-[15%] h-[15%]" src="../../img/logout/home.svg" alt="">
                                    Home
                                </a>
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/logout">
                                    <img class="w-[18%] h-[18%]" src="../../img/logout/logout.svg" alt="">
                                    Tancar sessió
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>
    
    <section class="bg-slate-100 pb-[20px]">
        <div class="breadcrumb-container">
            <ul class="breadcrumb flex gap-2 pl-[20px] pt-[20px]">
                <li><a href="/recipesmanager" class="breadcrumb-link underline">Gestor receptes</a></li>                
                <li><span class="breadcrumb-separator"> / </span></li>
                <li><a href="#" class="breadcrumb-link underline font-bold">Actualitzar recepta</a></li>
            </ul>
        </div>
        
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] font-bold mb-6 text-center pt-[26px]">Actualitzar <span class="text-[#96c368] opacity-[100%]">recepta</span></h1>
        
        <form class="flex justify-center pb-20" action="/updaterecipes" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $formData['id'] ?? '' ?>">
            <div class="w-[18%]">
                <!-- Name -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Nom</label>
                    <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" value="<?= $formData['name'] ?? '' ?>" name="name" type="text" placeholder="escriu el nom">
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['name'] ?? '' ?></p>
                </div>
                
                <!-- Description -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Descripció</label>
                    <textarea class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="description" placeholder="escriu la descripció"><?= $formData['description'] ?? '' ?></textarea>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['description'] ?? '' ?></p>
                </div>
                
                <!-- Ingredients -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Ingredients</label>
                    <textarea class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="ingredients" placeholder="escriu els ingredients"><?= $formData['ingredients'] ?? '' ?></textarea>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['ingredients'] ?? '' ?></p>
                </div>
                
                <!-- Nutritional information -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Informació nutricional</label>
                    <textarea class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="nutritionalinformation" placeholder="escriu la informació nutricional"><?= $formData['nutritionalinformation'] ?? 'No en té' ?></textarea>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['nutritionalinformation'] ?? '' ?></p>
                </div>
                
                <!-- People -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Persones</label>
                    <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" value="<?= $formData['people'] ?? '' ?>" name="people" type="text" placeholder="escriu el nombre de persones">
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['people'] ?? '' ?></p>
                </div>
                
                <!-- Duration -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Duració</label>
                    <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" value="<?= $formData['duration'] ?? '' ?>" name="duration" type="text" placeholder="escriu la duració">
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['duration'] ?? '' ?></p>
                </div>
                
                <!-- Instruction -->
                <div class="flex flex-col  mb-[15px]">
                    <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Instruccions</label>
                    <textarea class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="instruction" placeholder="escriu les instruccions"><?= $formData['instruction'] ?? '' ?></textarea>
                    <p class="text-red-500 mt-[5px] font-inter text-[15px]"  id="error-instruction"><?= $errors['instruction'] ?? '' ?></p>
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
                
                <!-- Button -->
                <div class="flex flex-col mb-[15px]">
                    <button class="font-inter bg-[#FCB666] text-[#f5f5f5] text-[16px] font-medium p-[8px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                        Actualitzar recepta
                    </button> 
                </div>
            </div>
        </form>
    </section>
    
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
    <script src="../../js/recipes/error-recipes.js"></script>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <!--Dropdown section!-->
    <script src="../../js/dropdown/dropdown.js"></script>
</body>
</html>