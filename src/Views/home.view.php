<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CeliFind</title>
    <link href="./src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Klee+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>
<body>
    <header class="p-4 border-b border-gray-300">
        <nav class="flex justify-between">
            <a href="/">
                <img class="w-32" src="../img/logo/logo.png" alt="">
            </a>
            <div class="flex">
                <ul class="list-none p-4m hidden lg:flex items-center">
                    <li class="ml-8"><a href="/productview">Productes</a></li>
                    <li class="ml-8"><a href="/receptes">Receptes</a></li>
                    <li class="ml-8"><a href="/quisom">Qui som ?</a></li>
                    <li class="ml-8"><a href="/informacio">Informació</a></li>
                </ul>
                
                <div class="flex items-center gap-5 ml-16">
                    <a href="/register" class="font-inter p-2 px-5 text-[16px] text-black border-[#96c368] border-2 rounded-[50px] font-normal hover:bg-[rgb(150,195,104)] hover:text-white transition duration-200">Registre</a>
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
                            <a href="/login" class="font-inter p-2 px-9 text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-white transition duration-200">
                                Iniciar sessió
                            </a>
                        <?php endif; ?>
                        <a href="/manager" target="_blank">Manager por ahora</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="flex justify-center flex-col text-center bg-[url('../img/home/Celifind.png')] object-cover h-[700px] bg-no-repeat bg-cover">
            <h1 class="text-[26px] font-calistoga font-bold">Menjar sense gluten Barcelona<h1>
            <h2 class="font-calistoga text-[80px]  md:text-[70px] lg:text-[100px]">Gluten <span class="text-[#96c368]">Free</span> <span class="text-[#FAD464]">sense</span> limits</h2>
            <p class="text-[20px] font-inter">Descobreix els nostres productes sense gluten, creats per al teu benestar i gaudeix amb confiança!</p>
            <div class="mt-20">
                <a href="/productview" class="bg-[#fcb666] text-[18px] text-white font-inter p-4 rounded-xl hover:bg-white hover:text-[#fcb666] hover:border-[#fcb666] hover:border-2 transition duration-200">Descobreix els nostres productes</a>
            </div>
        </div>

        <!--Adejectives section!-->
        <section class="flex bg-[url('../img/home/fondo2.png')] bg-no-repeat bg-cover">
            <div class="pt-5 pb-5 flex-row lg:flex md:flex-row sm:flex-col justify-center items-center text-center">
                <div class="m-10">
                    <div class="text-center flex justify-center">
                        <img class="w-28" src="../img/home/handshake.png" alt="love-icon-celifind">
                    </div>
                    <div class="pt-6">
                        <h1 class="text-4xl font-calistoga text-white">Salut</h1>
                        <p class="mt-5 text-[17px]">Oferim productes i receptes seleccionades per garantir que cada mos sigui un somriure, ple de sabor i sense preocupacions. Celebrem la llibertat de gaudir de la vida amb salut i gust.</p>
                    </div>
                </div>
                <div class="m-10">
                    <div class="text-center flex justify-center">
                        <img class="w-28" src="../img/home/happiness.png" alt="love-icon-celifind">
                    </div>
                    <div class="pt-6">
                        <h1 class="text-4xl font-calistoga text-white">Benestar</h1>
                        <p  class="mt-5 text-[17px]">El nostre compromís amb la salut de la comunitat celíaca és total. Els nostres productes sense gluten són segurs, deliciosos i elaborats amb cura per cuidar el teu cor i benestar.</p>
                    </div>
                </div>
                <div class="m-10">
                    <div class="text-center flex justify-center">
                        <img class="w-28" src="../img/home/quality.png" alt="love-icon-celifind">
                    </div>
                    <div class="pt-6">
                        <h1 class="text-4xl font-calistoga text-white">Qualitat</h1>
                        <p  class="mt-5 text-[17px]">Cada producte passa estrictes controls de qualitat per assegurar que només el millor arribi a la teva taula. Pots confiar que cada mostra serà sinònim de seguretat, puresa i sabor.</p>
                    </div>
                </div>
            </div>
        </section>

        <!--Recipes Section!-->
        <section class="p-10 justify-center pt-32 flex bg-slate-100">
            <div class="flex-wrap xl:flex items-center">
                <div class="flex-1 lg:flex md:flex sm:flex text-center justify-center">
                    <img class="w-[500px]" src="../img/home/Recipes.png" alt="">
                </div>

                <div class="flex-1 text-center xl:text-left mt-16 md:mt-16 lg:mt-16">
                    <h1 class="text-[46px] lg:text-[50px] font-calistoga">Descobreix les Nostres Receptes Sense Gluten</h1>
                    <h2 class="text-3xl font-calistoga mt-5">Receptes per a tots els gustos</h2>
                    <p class="font-inter text-[19px] mt-2">Descobreix els nostres productes sense gluten, creats per al teu benestar i gaudeix amb confiança!</p>

                    <div class="mt-[80px]">
                        <a href="#" class="bg-[#fcb666] text-[18px] border-[#fcb666] border-2 text-white font-inter p-3 rounded-xl hover:bg-white hover:text-[#fcb666] hover:border-[#fcb666] hover:border-2 transition duration-200">Descobreix les nostres receptes</a>
                    </div>
                </div>
            </div>
        </section>

        <!--Descobreix els nostres productes section!-->
        <section class="flex-col justify-center pt-20 p-10 bg-slate-100">
            <div class="flex text-center flex-col">
                <h1 class="text-[46px] lg:text-[50px] font-calistoga">Descobreix tots els nostres Productes</h1>
                <p class="font-inter text-[19px] mt-2">Explora la nostra col·lecció i troba allò que busques!</p>
                <div class="mt-[50px]">
                    <a href="/productview" class="bg-[#fcb666] text-[18px] text-white font-inter p-4 px-9 rounded-xl hover:bg-white hover:text-[#fcb666] hover:border-[#fcb666] hover:border-2 transition duration-200">
                        Tots els nostres productes
                    </a>
                </div>
            </div>
            <div class="flex flex-wrap mt-11 justify-center gap-10">
                <?php foreach ($products as $product) { ?>
                    <div class="shadow-lg w-[480px] h-auto rounded-[21px] bg-white p-[10px] mx-auto flex flex-col justify-between items-center">
                        <div class="flex flex-col items-start">
                            <!-- Image -->
                            <div class="w-full flex justify-center mb-3">
                                <div class="w-[180px] h-[180px] flex mt-[15px] items-center justify-center">
                                    <img src="<?php echo $product->getImage() ?>" alt="image_bd" class="object-contain w-full h-full">                                    
                                </div>
                            </div>
                            
                            <!-- Name -->
                            <div class="w-full text-left mt-[10px] min-h-[30px]">
                                <p class="font-inter pl-[10px] text-[17px] font-bold text-black"><?php echo $product->getName(); ?></p>
                            </div>
                            
                            <!--Wheigth!-->
                            <div class="w-full text-left">
                                <p class="font-inter pl-[10px] text-[16px] font-medium text-black opacity-50"><?php echo $product->getWeight(); ?></p>
                            </div>
                            
                            <!-- Description -->
                            <div class="w-full text-left mt-[15px] min-h-[100px]">
                                <p class="font-inter pl-[10px] pr-[15px] text-[16px] text-justify font-normal text-black"><?php echo $product->getDescription();?>...</p>
                            </div>
                        </div>
                        
                        <!-- Button -->
                        <div class="w-full flex justify-center mt-4">
                            <form action="/productindividual" method="POST" class="w-[90%]">
                                <input type="hidden" name="id" value="<?php echo $product->getId(); ?>">
                                <button type="submit" class="w-full mt-[15px] mb-[10px] text-center p-2 rounded-full bg-[#fcb666] text-white border-2 border-[#fcb666] hover:bg-white hover:text-[#fcb666] transition duration-300">
                                    Més informació
                                </button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <section>
        
        <!--Localities section!-->
        <section class="bg-slate-100">
            <div class="flex-col justify-center pt-36 p-10 text-center">
                    <h1 class="text-[46px] lg:text-[50px] font-calistoga">Els millors llocs sense gluten en Barcelona</h1>
                    <p class="font-inter text-[19px]">Consulta les recomanacions d'altres celíacs i descobreix els llocs més segurs per gaudir d'un àpat sense gluten.</p>
                <div class="mt-16">
                    <a href="#" class="bg-[#fcb666] text-[18px] text-white p-3 px-6 border-2 border-[#fcb666] rounded-xl hover:bg-white hover:text-[#fcb666] hover:border-2 transition duration-300 ease-in-out">Explora els nostres llocs</a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 px-10 pt-10 pb-20">
                <!--Box!-->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="" alt="Restaurant" class="w-full h-48 object-cover">
                    <div class="p-4 text-left">
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="font-bold">Títol</h2>
                            <span class="text-gray-400 font-semibold">Restaurant</span>
                        </div>
                        <p class="font-medium">Ubicació</p>
                        <p class="text-sm text-gray-600 mt-2 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                        <div class="flex justify-between items-center">
                            <p class="text-gray-400">Ubicació</p>
                            <a href="#" class="text-[#fcb666] border border-[#fcb666] px-4 py-1 rounded-full hover:bg-[#fcb666] hover:text-white transition duration-300">Explorar</a>
                        </div>
                    </div>
                </div>
                <!--BOX!-->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="" alt="Restaurant" class="w-full h-48 object-cover">
                    <div class="p-4 text-left">
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="font-bold">Títol</h2>
                            <span class="text-gray-400 font-semibold">Restaurant</span>
                        </div>
                        <p class="font-medium">Ubicació</p>
                        <p class="text-sm text-gray-600 mt-2 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                        <div class="flex justify-between items-center">
                            <p class="text-gray-400">Ubicació</p>
                            <a href="#" class="text-[#fcb666] border border-[#fcb666] px-4 py-1 rounded-full hover:bg-[#fcb666] hover:text-white transition duration-300">Explorar</a>
                        </div>
                    </div>
                </div>
                <!--BOX!-->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="" alt="Restaurant" class="w-full h-48 object-cover">
                    <div class="p-4 text-left">
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="font-bold">Títol</h2>
                            <span class="text-gray-400 font-semibold">Restaurant</span>
                        </div>
                        <p class="font-medium">Ubicació</p>
                        <p class="text-sm text-gray-600 mt-2 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                        <div class="flex justify-between items-center">
                            <p class="text-gray-400">Ubicació</p>
                            <a href="#" class="text-[#fcb666] border border-[#fcb666] px-4 py-1 rounded-full hover:bg-[#fcb666] hover:text-white transition duration-300">Explorar</a>
                        </div>
                    </div>
                </div>
                <!--BOX!-->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="" alt="Restaurant" class="w-full h-48 object-cover">
                    <div class="p-4 text-left">
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="font-bold">Títol</h2>
                            <span class="text-gray-400 font-semibold">Restaurant</span>
                        </div>
                        <p class="font-medium">Ubicació</p>
                        <p class="text-sm text-gray-600 mt-2 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                        <div class="flex justify-between items-center">
                            <p class="text-gray-400">Ubicació</p>
                            <a href="#" class="text-[#fcb666] border border-[#fcb666] px-4 py-1 rounded-full hover:bg-[#fcb666] hover:text-white transition duration-300">Explorar</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <!--Footer section!-->
    <?php include 'parts/footer/footer.view.php'?>
</body>
</html>