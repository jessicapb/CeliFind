<?php session_start(); ?>
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
    <link rel="shortcut icon" class="h-18" href="../../img/logo/logo.png" type="image/x-icon">

</head>

<body>
    <header>
        <nav class="flex justify-between items-center w-full">
            <a class="pl-[20px] pt-[20px] w-[9%] h-[9%]" href="/manager">
                <img src="../../img/logo/logo.png" alt="logoimg">
            </a>
            <div class="flex items-center">
                <a href="/category" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Categories</a>
                <a href="/subcategory" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Subcategories</a>
                <a href="" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Revisions</a>
                <!-- Dropdown -->
                <div class="relative inline-block text-left">
                    <?php if (isset($_SESSION['user'])): ?>
                        <button id="dropdown-toggle" type="button" class="font-inter min-w-[180px] p-[8px] mr-[30px] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                            <?= htmlspecialchars($_SESSION['user']['name']) ?>
                        </button>
                        <div id="dropdown-menu" class="font-inter hidden absolute left-0 mt-2 w-[90%] origin-top-center text-black bg-white border-1 shadow-lg rounded-[20px] z-10">
                            <div class="p-1 space-y-0.5">
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href=" /editprofile">
                                    <img class="w-[18%] h-[18%]" src="../../img/profile/placegholder.png" alt="">
                                    Editar perfil
                                </a>
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/home">
                                    <img class="w-[18%] h-[18%]" src="../../img/logout/logout.svg" alt="">
                                    Tancar sessió
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <button type="button" class="font-inter min-w-[180px] p-[8px] mr-[30px] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                            Iniciar sessió
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <section>
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] text-center pt-[26px] font-bold">Benvingut <span class="text-[#96c368] opacity-[100%]">administrador</span></h1>
        <div class="flex justify-center mt-[26px]">
            <!-- Products -->
            <div class="mr-[26px] shadow-lg w-[368px] h-[527px] rounded-[21px]">
                <img src="../../img/producte/productes.png" alt="">
                <div class="flex flex-col justify-between ">
                    <p class="font-monserrat pt-[15px] pl-[10px] pb-[15px] text-[20px] font-bold text-black">Gestiona els productes</p>
                    <p class="font-inter pt-[10px] pl-[10px] pb-[15px] pr-[20px] text-[16px] font-normal text-black text-justify">Permet afegir, editar, eliminar i visualitzar productes de manera eficient. A més, inclou una funció de cerca per trobar ràpidament els productes desitjats, facilitant així la seva gestió i organització.</p>
                    <div class="flex justify-center">
                        <a class="font-inter p-[8px] w-[90%] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-light text-center hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200" href="/productmanager">Gestiona'ls</a>
                    </div>
                </div>
            </div>

            <!-- Recipes -->
            <div class="mr-[26px] shadow-lg w-[368px] h-[527px] rounded-[21px]">
                <img src="../../img/recepte/receptes.png" alt="">
                <div class="flex flex-col justify-between ">
                    <p class="font-monserrat pt-[15px] pl-[10px] pb-[15px] text-[20px] font-bold text-black">Gestiona les receptes</p>
                    <p class="font-inter pt-[10px] pl-[10px] pb-[15px] pr-[20px] text-[16px] font-normal text-black text-justify">Permet afegir, editar, eliminar i visualitzar receptes de manera fàcil i eficient. A més, inclou una funció de cerca per trobar ràpidament les receptes desitjades, facilitant així la seva organització i accés.</p>
                    <div class="flex justify-center">
                        <a class="font-inter p-[8px] w-[90%] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-light text-center hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200" href="/recipesmanager">Gestiona'ls</a>
                    </div>
                </div>
            </div>

            <!-- Establishments -->
            <div class="mr-[26px] shadow-lg w-[368px] h-[527px] rounded-[21px]">
                <img src="../../img/lloc/llocs.png" alt="">
                <div class="flex flex-col justify-between ">
                    <p class="font-monserrat pt-[15px] pl-[10px] pb-[15px] text-[20px] font-bold text-black">Gestiona els establiments</p>
                    <p class="font-inter pt-[10px] pl-[10px] pb-[15px] pr-[20px] text-[16px] font-normal text-black text-justify">Permet afegir, editar, eliminar i visualitzar productes de manera fàcil i eficient. A més, inclou una funció de cerca per trobar ràpidament els productes desitjats, facilitant així la seva organització i gestió.</p>
                    <div class="flex justify-center">
                        <button class="font-inter p-[8px] w-[90%] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-light text-center hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                            Gestiona'ls
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Link to javascript dropdown-->
    <script src="../../js/dropdown/dropdown.js"></script>

    <!-- Link to javascript dropdown-->
    <script src="../../js/dropdown/dropdown.js"></script>
</body>

</html>