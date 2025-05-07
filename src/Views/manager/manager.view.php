<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor del crud</title>
    <link href="./src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Klee+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>
<body>
    <header class="pb-[15px]">
        <nav class="flex justify-between items-center w-full">
            <a class="pl-[20px] pt-[20px]" href="/manager">
                <img class="w-32" src="../../img/logo/logo.png" alt="logoimg">
            </a>
            <div class="flex items-center mr-[20px]">
                <a href="/category" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Categories</a>
                <a href="/subcategory" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Subcategories</a>
                <a href="" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Revisions</a>
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
    
    <section class="pb-20 bg-slate-100">
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] text-center pt-[26px] font-bold">Benvingut <span class="text-[#96c368] opacity-[100%]">administrador</span></h1>
        <div class="flex justify-center mt-[26px]">
            <!-- Products -->
            <div class="mr-[26px] shadow-lg w-[368px] bg-white h-[527px] rounded-[21px]">
                <img  src="../../img/producte/productes.png" alt="">
                <div class="flex flex-col justify-between ">
                    <p class="font-monserrat pt-[15px] p-[20px] pb-[15px] text-[20px] font-bold text-black">Gestiona els productes</p>
                    <p class="font-inter pt-[10px] p-[20px] pb-[15px] text-[16px] font-normal text-black text-justify">Permet afegir, editar, eliminar i visualitzar productes de manera eficient. A més, inclou una funció de cerca per trobar ràpidament els productes desitjats, facilitant així la seva gestió i organització.</p>
                    <div class="flex justify-center">
                        <a class="font-inter p-[8px] w-[90%] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-light text-center hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200" href="/productmanager">Gestiona'ls</a>
                    </div>
                </div>
            </div>
            
            <!-- Recipes -->
            <div class="mr-[26px] shadow-lg w-[368px] bg-white h-[527px] rounded-[21px]">
                <img src="../../img/recepte/receptes.png" alt="">
                <div class="flex flex-col justify-between ">
                    <p class="font-monserrat pt-[15px] p-[20px] pb-[15px] text-[20px] font-bold text-black">Gestiona les receptes</p>
                    <p class="font-inter pt-[10px] p-[20px] pb-[15px] text-[16px] font-normal text-black text-justify">Permet afegir, editar, eliminar i visualitzar receptes de manera fàcil i eficient. A més, inclou una funció de cerca per trobar ràpidament les receptes desitjades, facilitant així la seva organització i accés.</p>
                    <div class="flex justify-center">
                        <a class="font-inter p-[8px] w-[90%] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-light text-center hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200" href="/recipesmanager">Gestiona'ls</a>
                    </div>
                </div>
            </div>
            
            <!-- Establishments -->
            <div class="mr-[26px] shadow-lg w-[368px] bg-white h-[527px] rounded-[21px]">
                <img  src="../../img/lloc/llocs.png" alt="">
                <div class="flex flex-col justify-between ">
                    <p class="font-monserrat pt-[15px] p-[20px] pb-[15px] text-[20px] font-bold text-black">Gestiona els establiments</p>
                    <p class="font-inter pt-[10px] p-[20px] pb-[15px] text-[16px] font-normal text-black text-justify">Permet afegir, editar, eliminar i visualitzar establiments de manera fàcil i eficient. A més, inclou una funció de cerca per trobar ràpidament els establiments desitjats, facilitant així la seva organització i gestió.</p>
                    <div class="flex justify-center">
                        <button class="font-inter p-[8px] w-[90%] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-light text-center hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                            Gestiona'ls
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <!-- Link to javascript dropdown-->
    <script src="../../js/dropdown/dropdown.js"></script>
    
    <!-- Link to javascript dropdown-->
    <script src="../../js/dropdown/dropdown.js"></script>
</body>
</html>