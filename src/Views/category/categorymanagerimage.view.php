<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veure imatges</title>
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
                <a href="/productmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Productes</a>
                <a href="/recipesmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Receptes</a>
                <a href="/category" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Establiments</a>
                <a href="/category" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-bold">Categories</a>
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
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] text-center pt-[26px] font-bold">Veure <span class="text-[#96c368] opacity-[100%]">imatges</span></h1>
        <div class="flex flex-wrap gap-5 p-[50px] items-center xl:flex lg:flex md:flex sm:flex justify-center">
            <?php foreach ($categories as $category): ?>
                <div class="border border-gray-300 p-5 w-[300px] h-[300px] flex flex-col items-center justify-center rounded-xl shadow-md">
                    <div class="w-[100px] flex items-center justify-center mb-4">
                        <img src="<?= $category->getImage() ?>" alt="Imagen del producto" class="object-contai rounded-md">
                    </div>
                    
                    <div class="space-y-2">
                        <div class="flex">
                            <p class="font-inter text-[19px] font-bold text-black">Id:</p>
                            <p class="font-inter text-[19px] font-medium text-black ml-2"><?= $category->getId(); ?></p>
                        </div>
                        <div class="flex whitespace-nowrap">
                            <p class="font-inter text-[19px] font-bold text-black">Nom:</p>
                            <p class="font-inter text-[19px] font-medium text-black ml-2"><?= $category->getName(); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <!--Dropdown section!-->
    <script src="../../js/dropdown/dropdown.js"></script>
</body>
</html>