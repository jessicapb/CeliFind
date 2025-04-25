<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productes</title>
    <link href="./src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="shortcut icon" class="h-18" href="../../img/logo/logo.png" type="image/x-icon">
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
    </header>
    <div class="flex mt-[50px]">
        <!-- Preferiblemente dejarlo así, antes de jugar con el height -->
        <!-- Para un futuro, hacer que la flecha del desplegable cambie de lado de derecha a -->
        <div class="w-[23%] h-[100%] shadow-lg">
            <div class="flex items-center gap-x-2 text-[16px] font-semibold">
                <button onclick="Subcategories('fleca')" class="font-calistoga flex items-center gap-x-2 pt-[3px] pl-[20px] rounded-[50px] text-[16px] text-black opacity-[78%] font-light">
                    <img class="w-[1.25%] h-[1.25%]" src="../../img/categoria/flecha-correcta.png" alt=""> 🥖 Fleca i pastisseria
                </button>
            </div>
            <div id="fleca-subcategories" class="hidden pl-[40px] mt-2 ">
                <ul class="text-[12px] font-medium text-black">
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Farines</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Pans</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Galetes</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Muffins</li>
                </ul>
            </div>
            <div class="flex items-center gap-x-2 text-[20px] font-semibold mt-4">
                <button onclick="Subcategories('begudes')" class="font-calistoga flex items-center gap-x-2 pt-[3px] pl-[20px] rounded-[50px] text-[16px] text-black opacity-[78%] font-light">
                    <img class="w-[1.25%] h-[1.25%]" src="../../img/categoria/flecha-correcta.png" alt=""> 🍷 Begudes
                </button>
            </div>
            <div id="begudes-subcategories" class="hidden pl-[40px] mt-2">
                <ul class="text-[12px] font-medium text-black">
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Suc de Fruites</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Cafès i tes</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Cerveses</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Vins i caves</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Begudes energètiques</li>
                </ul>
            </div>
            <div class="flex items-center gap-x-2 text-[20px] font-semibold mt-4">
                <button onclick="Subcategories('dolces')" class="font-calistoga flex items-center gap-x-2 pt-[3px] pl-[20px] rounded-[50px] text-[16px] text-black opacity-[78%] font-light">
                    <img class="w-[1.25%] h-[1.25%]" src="../../img/categoria/flecha-correcta.png" alt=""> 🍫 Dolces i Postres
                </button>
            </div>
            <div id="dolces-subcategories" class="hidden pl-[40px] mt-2">
                <ul class="text-[12px] font-medium text-black">
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Xocolata</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Galetes</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Caramels i llaminadures</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Gelats</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Pastissos i tartes</li>
                </ul>
            </div>
            <div class="flex items-center gap-x-2 text-[20px] font-semibold mt-4">
                <button onclick="Subcategories('menjars')" class="font-calistoga flex items-center gap-x-2 pt-[3px] pl-[20px] rounded-[50px] text-[16px] text-black opacity-[78%] font-light">
                    <img class="w-[1.25%] h-[1.25%]" src="../../img/categoria/flecha-correcta.png" alt=""> 🍽️ Menjars Preparats
                </button>
            </div>
            <div id="menjars-subcategories" class="hidden pl-[40px] mt-2">
                <ul class="text-[12px] font-medium text-black">
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Pizzes</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Sopes i cremes</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Plats precuinats</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Amanides</li>
                </ul>
            </div>
            <div class="flex items-center gap-x-2 text-[20px] font-semibold mt-4">
                <button onclick="Subcategories('condiments')" class="font-calistoga flex items-center gap-x-2 pt-[3px] pl-[20px] rounded-[50px] text-[16px] text-black opacity-[78%] font-light">
                    <img class="w-[1.25%] h-[1.25%]" src="../../img/categoria/flecha-correcta.png" alt=""> 🌶️ Condiments i espècies
                </button>
            </div>
            <div id="condiments-subcategories" class="hidden pl-[40px] mt-2">
                <ul class="text-[12px] font-medium text-black">
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Salses</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Vinagre</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Oli d'oliva</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Herbes i espècies naturals</li>
                </ul>
            </div>
            <div class="flex items-center gap-x-2 text-[20px] font-semibold mt-4">
                <button onclick="Subcategories('lactis')" class="font-calistoga flex items-center gap-x-2 pt-[3px] pl-[20px] rounded-[50px] text-[16px] text-black opacity-[78%] font-light">
                    <img class="w-[1.25%] h-[1.25%]" src="../../img/categoria/flecha-correcta.png" alt=""> 🧀 Lactis i alternatives
                </button>
            </div>
            <div id="lactis-subcategories" class="hidden pl-[40px] mt-2">
                <ul class="text-[12px] font-medium text-black">
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Llet</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Formatges</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Iogurts</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Alternatives vegetals</li>
                </ul>
            </div>
            <div class="flex items-center gap-x-2 text-[20px] font-semibold mt-4">
                <button onclick="Subcategories('congelats')" class="font-calistoga flex items-center gap-x-2 pt-[3px] pl-[20px] rounded-[50px] text-[16px] text-black opacity-[78%] font-light">
                    <img class="w-[1.25%] h-[1.25%]" src="../../img/categoria/flecha-correcta.png" alt=""> ❄️ Productes congelats
                </button>
            </div>
            <div id="congelats-subcategories" class="hidden pl-[40px] mt-2">
                <ul class="text-[12px] font-medium text-black">
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Verdura</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Pizzes</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Iogurts</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Alternatives vegetals</li>
                </ul>
            </div>
            <div class="flex items-center gap-x-2 text-[20px] font-semibold mt-4">
                <button onclick="Subcategories('snacks')" class="font-calistoga flex items-center gap-x-2 pt-[3px] pl-[20px] rounded-[50px] text-[16px] text-black opacity-[78%] font-light">
                    <img class="w-[1.25%] h-[1.25%]" src="../../img/categoria/flecha-correcta.png" alt=""> 🍟 Snacks
                </button>
            </div>
            <div id="snacks-subcategories" class="hidden pl-[40px] mt-2">
                <ul class="text-[12px] font-medium text-black">
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Chips i aperitius</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Barres energètiques</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Fruits secs</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Patates fregides</li>
                </ul>
            </div>
            <div class="flex items-center gap-x-2 text-[20px] font-semibold mt-2">
                <button onclick="Subcategories('fruites')" class="font-calistoga flex items-center gap-x-2 pt-[3px] pl-[20px] rounded-[50px] text-[16px] text-black opacity-[78%] font-light pb-[7px]">
                    <img class="w-[1.25%] h-[1.25%]" src="../../img/categoria/flecha-correcta.png" alt=""> 🍎 Fruites i Verdures
                </button>
            </div>
            <div id="fruites-subcategories" class="hidden pl-[40px]">
                <ul class="text-[12px] font-medium text-black">
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Fruites</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Verdures</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Fruits secs</li>
                    <li class="pl-5 py-2 hover:bg-[#e8e8e8]">Verdura en conserva</li>
                </ul>
            </div>
        </div>
        <div class="flex justify-center w-full">
            <div>
                <!-- Search part -->
                <form action="/searchproduct" class="flex justify-center" method="POST">
                    <div>
                        <div class="relative flex items-center max-w-[800px]">
                            <img class="absolute w-5 h-5 left-2.5 " src="../../img/search/search.svg" alt="search">
                            <input name="name" class="bg-[#fefbf9] placeholder:text-black font-normal font-inter text-black text-[16px] border border-[#FCB666] rounded-[27px] pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] shadow-sm focus:shadow" placeholder="cerca el producte">
                        </div>
                    </div>
                </form>
                <div>
                    <div class="grid grid-cols-4 gap-[14px] mt-[26px] mb-[20px]">
                        <?php foreach ($products as $product) { ?>
                            <div class="shadow-lg w-[300px] h-[310px] rounded-[21px] bg-white p-[10px] mr-[30px] mx-auto flex flex-col items-center">
                                <div class="w-full flex justify-center mb-3">
                                    <div class="w-[180px] h-[180px] flex items-center justify-center">
                                    <img src="<?php echo $product->getImage() ?>" alt="image_bd" class="object-contain w-full h-full">                                    </div>
                                </div>
                                <div class="w-full text-left mt-[10px]">
                                    <div class="flex">
                                        <p class="font-inter pl-[10px] text-[19px] font-bold text-black">Id:</p>
                                        <p class="font-inter pl-[5px] text-[19px] font-medium text-black"><?php echo $product->getId(); ?></p>
                                    </div>
                                    <div class="flex">
                                        <p class="font-inter pl-[10px] text-[19px] font-bold text-black">Nom:</p>
                                        <p class="font-inter pl-[5px] text-[19px] font-medium text-black"><?php echo $product->getName(); ?></p>
                                    </div>
                                    <button>Llegir més</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/category/category.js"></script>
</body>