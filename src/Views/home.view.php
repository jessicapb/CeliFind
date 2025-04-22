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
</head>
<body>
    <header class="p-4">
        <nav class="flex justify-between">
            <a href="/">
                <img class="w-32" src="../img/logo/logo.png" alt="">
            </a>
            <div class="flex">
                <ul class="list-none p-4m hidden lg:flex items-center">
                    <li class="ml-8"><a href="/productview">Productes</a></li>
                    <li class="ml-8"><a href="#">Receptes</a></li>
                    <li class="ml-8"><a href="#">Qui som ?</a></li>
                    <li class="ml-8"><a href="#">Informació</a></li>
                </ul>
                <div class="flex items-center gap-5 ml-16">
                    <a href="/register" class="font-inter p-2 px-5 text-[16px] text-black border-[#96c368] border-2 rounded-[50px] font-normal hover:bg-[rgb(150,195,104)] hover:text-white transition duration-200">Registre</a>
                    <a href="/login" class="font-inter p-2 px-9 text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-white transition duration-200">Iniciar Sessió</a>
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
                <a href="#" class="bg-[#fcb666] text-[18px] text-white font-inter p-4 rounded-xl hover:bg-white hover:text-[#fcb666] hover:border-[#fcb666] hover:border-2 transition duration-200">Descobreix els nostres productes</a>
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
                    <a href="#" class="bg-[#fcb666] text-[18px] text-white font-inter p-4 px-9 rounded-xl hover:bg-white hover:text-[#fcb666] hover:border-[#fcb666] hover:border-2 transition duration-200">
                        Tots els nostres productes
                    </a>
                </div>
            </div>

            <div class="flex flex-wrap mt-11 justify-center gap-10">

                <div class="bg-white shadow-md p-5 rounded-xl max-w-xs w-full">
                    <img class="w-full h-auto rounded-md" src="../img/home/pizzasingluten.png" alt="Pizza sense gluten">
                    <div class="flex items-center justify-between mt-4">
                        <p class="font-semibold">Títol</p>
                        <p class="text-gray-500 text-sm">Data</p>
                    </div>
                    <p class="mt-2 text-gray-700 text-sm font-inter">Descripció del producte o detall breu.</p>
                    <div class="flex justify-center mt-6">
                        <a href="#" class="w-full text-center p-2 rounded-full bg-[#fcb666] text-white border-2 border-[#fcb666] hover:bg-white hover:text-[#fcb666] transition duration-300">
                        Més informació
                        </a>
                    </div>
                </div>

                <div class="bg-white shadow-md p-5 rounded-xl max-w-xs w-full">
                    <img class="w-full h-auto rounded-md" src="../img/home/pizzasingluten.png" alt="Pizza sense gluten">
                    <div class="flex items-center justify-between mt-4">
                        <p class="font-semibold">Títol</p>
                        <p class="text-gray-500 text-sm">Data</p>
                    </div>
                    <p class="mt-2 text-gray-700 text-sm font-inter">Descripció del producte o detall breu.</p>
                    <div class="flex justify-center mt-6">
                        <a href="#" class="w-full text-center p-2 rounded-full bg-[#fcb666] text-white border-2 border-[#fcb666] hover:bg-white hover:text-[#fcb666] transition duration-300">
                        Més informació
                        </a>
                    </div>
                </div>

                <div class="bg-white shadow-md p-5 rounded-xl max-w-xs w-full">
                    <img class="w-full h-auto rounded-md" src="../img/home/pizzasingluten.png" alt="Pizza sense gluten">
                    <div class="flex items-center justify-between mt-4">
                        <p class="font-semibold">Títol</p>
                        <p class="text-gray-500 text-sm">Data</p>
                    </div>
                    <p class="mt-2 text-gray-700 text-sm font-inter">Descripció del producte o detall breu.</p>
                    <div class="flex justify-center mt-6">
                        <a href="#" class="w-full text-center p-2 rounded-full bg-[#fcb666] text-white border-2 border-[#fcb666] hover:bg-white hover:text-[#fcb666] transition duration-300">
                        Més informació
                        </a>
                    </div>
                </div>

                <div class="bg-white shadow-md p-5 rounded-xl max-w-xs w-full">
                    <img class="w-full h-auto rounded-md" src="../img/home/pizzasingluten.png" alt="Pizza sense gluten">
                    <div class="flex items-center justify-between mt-4">
                        <p class="font-semibold">Títol</p>
                        <p class="text-gray-500 text-sm">Data</p>
                    </div>
                    <p class="mt-2 text-gray-700 text-sm font-inter">Descripció del producte o detall breu.</p>
                    <div class="flex justify-center mt-6">
                        <a href="#" class="w-full text-center p-2 rounded-full bg-[#fcb666] text-white border-2 border-[#fcb666] hover:bg-white hover:text-[#fcb666] transition duration-300">
                        Més informació
                        </a>
                    </div>
                </div>
                <div class="bg-white shadow-md p-5 rounded-xl max-w-xs w-full">
                    <img class="w-full h-auto rounded-md" src="../img/home/pizzasingluten.png" alt="Pizza sense gluten">
                    <div class="flex items-center justify-between mt-4">
                        <p class="font-semibold">Títol</p>
                        <p class="text-gray-500 text-sm">Data</p>
                    </div>
                    <p class="mt-2 text-gray-700 text-sm font-inter">Descripció del producte o detall breu.</p>
                    <div class="flex justify-center mt-6">
                        <a href="#" class="w-full text-center p-2 rounded-full bg-[#fcb666] text-white border-2 border-[#fcb666] hover:bg-white hover:text-[#fcb666] transition duration-300">
                        Més informació
                        </a>
                    </div>
                </div>
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

    <footer class="bg-slate-100 text-black py-12 px-8 lg:px-20">
        <div class="grid grid-cols-1 max-w-screen-xl mx-auto md:grid-cols-5 text-center lg:text-start md:text-start gap-8 text-sm justify-center">
            
            <div class="md:col-span-1 flex flex-col space-y-2">
                <a href="/">
                    <img src="../img/logo/logo.png" alt="CeliFind logo" class="w-36">
                </a>
            </div>

            <div>
                <h4 class="font-semibold mb-2">Serveis i Productes</h4>
                    <ul class="space-y-1 text-gray-600">
                        <li><a href="#">Productes</a></li>
                        <li><a href="#">Receptes</a></li>
                        <li><a href="#">Qui som</a></li>
                        <li><a href="#">Informació</a></li>
                    </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-2">Contacta'ns</h4>
                <ul class="space-y-1 text-gray-600">
                    <li><a href="mailto:celifind.cat@gmail.com">celifind.cat@gmail.com</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-2">Política de privacitat</h4>
                <ul class="space-y-1 text-gray-600">
                    <li><a href="#">Avís Legal</a></li>
                    <li><a href="#">Política de Cookies</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-2">Ajuda</h4>
                <ul class="space-y-1 text-gray-600">
                    <li><a href="#">Informació</a></li>
                    <li><a href="#">Qui Som</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>