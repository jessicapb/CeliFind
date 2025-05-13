<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qui Som</title>
    <meta name="description" content="CeliFind és una plataforma per a la comunitat celíaca, oferint productes certificats, receptes sense gluten i restaurants adaptats.">
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="true">
    <link href="./src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>
<body class="font-inter bg-gray-50">
    <header class="p-4 border-b border-gray-300">
        <nav class="flex justify-between items-center">
            <a  href="/">
                <img class="w-32" src="../img/logo/logo.png" alt="">
            </a>
            <div class="flex items-center">
                <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) : ?>
                    <ul class="list-none flex p-4 hidden lg:flex items-center md:flex items-center">
                        <li class="list-none ml-8"><a href="/productview">Productes</a></li>
                        <li class="list-none ml-8 mr-[15px]"><a href="/receptes">Receptes</a></li>
                        <li class="list-none ml-8 mr-[15px]"><a href="/locationview">Establiments</a></li>
                    </ul>
                <?php else: ?>
                    <ul class="list-none flex p-4 hidden lg:flex items-center">
                        <li class="list-none ml-8"><a href="/productview">Productes</a></li>
                        <li class="list-none ml-8"><a href="/receptes">Receptes</a></li>
                        <li class="list-none ml-8"><a href="/locationview">Establiments</a></li>
                        <li class="list-none ml-8 font-bold"><a href="/quisom">Qui som ?</a></li>
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
                            <button id="dropdown-toggle" type="button" class="font-inter min-w-[180px] p-[8px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
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
                                    <img class="w-[17%] h-[17%]" src="../../img/logout/logout.svg" alt="">
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
    
    <section class="relative bg-cover bg-center h-[450px]" style="background-image: url('../img/home/Celifind.png');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4">
            <h1 class="text-5xl md:text-6xl font-calistoga font-bold">Descobreix el món sense gluten</h1>
            <p class="text-lg md:text-xl mt-4">Estem aquí per ajudar-te a viure una vida sana i deliciosa, sense preocupacions.</p>
        </div>
    </section>
    
    <main class="py-16 bg-gray-100">
        <section class="container mx-auto px-6 flex flex-col lg:flex-row items-center gap-12">
            <div class="flex-1 text-center lg:text-left">
                <h3 class="text-3xl font-semibold font-calistoga text-[#96c368] mb-6">Qui Som?</h3>
                <p class="text-xl text-gray-700">Som una aplicació dedicada a la comunitat celíaca, amb l'objectiu de facilitar la vida de les persones que segueixen una dieta sense gluten. A la nostra plataforma, els usuaris poden trobar receptes, restaurants adaptats i productes certificats, tot en un sol lloc.</p>
            </div>
            <div class="flex-1 text-center">
                <img src="./img/logo/logo.png" alt="CeliFind" class="w-[400px] mx-auto">
            </div>
        </section>
        
        <section class="container mx-auto px-6 py-16">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="flex-1 text-center">
                    <img src="./img/home/pasta.png" alt="Pasta sin gluten" class="w-[400px] mx-auto">
                </div>
                <div class="flex-1 text-center lg:text-left">
                    <h3 class="text-3xl font-calistoga font-semibold text-[#96c368] mb-6">Les Millors Receptes</h3>
                    <p class="text-xl text-gray-700">A la nostra plataforma podràs descobrir una àmplia selecció de receptes sense gluten, dissenyades per adaptar-se a les necessitats de la comunitat celíaca. Totes les receptes han estat creades per cuiners professionals i amants de la cuina, garantint plats segurs, sans i equilibrats.</p>
                </div>
            </div>
        </section>
        
        <section class="container mx-auto px-6 flex flex-col lg:flex-row items-center gap-12">
            <div class="flex-1 text-center lg:text-left">
                <h3 class="text-3xl font-semibold font-calistoga text-[#96c368] mb-6">Els Nostres Productes</h3>
                <p class="text-xl text-gray-700">
                    A través de l'app, podreu consultar una selecció de productes etiquetats clarament amb informació sobre la seva composició, garantint que no contenen gluten ni cap altre ingredient perillós per a la vostra salut. Mostrem productes de diverses categories com cereals, farines, pa, dolços, snacks, begudes i molt més, tots revisats perquè només trobeu aquells que compleixen amb els estàndards de seguretat més estrictes.
                </p>
            </div>
            <div class="flex-1 text-center">
                <img src="./img/home/pizzasingluten.png" alt="pizzasingluten" class="w-[400px] mx-auto">
            </div>
        </section>
        
        <section class="container mx-auto px-6 py-16">
            <div class="flex flex-col text-center justify-center items-center mt-36">
                <h3 class="text-7xl font-semibold font-calistoga text-[#96c368] mb-6 font-calistoga">Estem per a tu</h3>
                <div class="">
                    <p class="text-xl text-gray-700">
                    Estem al vostre costat, perquè entenem els reptes diaris que comporta viure amb celiaquia.
                    </p>
                    <img src="" alt="">
                </div>
            </div>
        </section>
    </main> 
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
