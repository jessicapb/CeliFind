<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir Subcategoria</title>
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
                <a href="/recipesmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Receptes</a>
                <a href="/establishmentsmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Establiments</a>
                <a href="/category" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Categories</a>
                <a href="/subcategory" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-bold">Subcategories</a>
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
                <li><a href="/subcategory" class="breadcrumb-link underline">Gestor subcategories</a></li>  
                <li><span class="breadcrumb-separator"> / </span></li>
                <li><a href="/addsubcategory" class="breadcrumb-link underline font-bold">Afegir subcategoria</a></li>            
            </ul>
        </div>
        
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] font-bold mb-6 text-center pt-[26px]">Afegir <span class="text-[#96c368] opacity-[100%]">subcategoria</span></h1>
        
        <form class="flex justify-center" action="/savesubcategory" method="POST" enctype="multipart/form-data">
            <div class="w-[18%]">
                <!-- Name -->
                <div class="flex flex-col  mb-[15px]">
                    <label for="name" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Nom</label>
                    <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="name" type="text" placeholder="escriu el nom">
                    <p id="error-name" class="text-red-500 mt-[5px] font-inter hidden text-[15px]"></p>
                </div>
                
                <!-- Description -->
                <div class="flex flex-col  mb-[15px]">
                    <label for="name" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Descripció</label>
                    <textarea class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="description" type="text-area" placeholder="escriu la descripció"></textarea>
                    <p id="error-description" class="text-red-500 mt-[5px] font-inter hidden text-[15px]"></p>
                </div>
                
                <!-- Select Categories -->
                <div class="flex flex-col  mb-[15px]">
                    <label for="idcategoria" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Categoria</label>
                    
                    <select class=" bg-white border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="idcategoria" id="idcategoria">    
                    <option value="idcategoria" selected disabled hidden>Selecciona una categoria</option>
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <p id="error-idcategory" class="text-red-500 mt-[5px] font-inter hidden text-[15px]"></p>
                </div>
                
                <!-- Button -->
                <div class="flex flex-col mb-[15px]">
                    <button class="font-inter bg-[#FCB666] text-[#f5f5f5] text-[16px] font-medium p-[8px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50" href="" type="submit">
                        Afegir Subcategoria
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
    <script src="../../js/subcategory/error-subcategory.js"></script>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <!--Dropdown section!-->
    <script src="../../js/dropdown/dropdown.js"></script>
</body>
</html>