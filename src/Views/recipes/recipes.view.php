<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptes</title>
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="true">
    <link href="./src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>
<body>    
    <header class="p-4 border-b border-gray-300">
        <nav class="flex justify-between items-center">
            <a href="/">
                <img class="w-32" src="../img/logo/logo.png" alt="">
            </a>
            <div class="flex items-center">
                <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) : ?>
                    <ul class="list-none flex p-4 hidden lg:flex items-center md:flex items-center">
                        <li class="list-none ml-8"><a href="/productview">Productes</a></li>
                        <li class="list-none ml-8 font-bold"><a href="/receptes">Receptes</a></li>
                        <li class="list-none ml-8"><a href="/locationview">Establiments</a></li>
                    </ul>
                <?php else: ?>
                    <ul class="list-none flex p-4 hidden lg:flex items-center">
                        <li class="list-none ml-8 "><a href="/productview">Productes</a></li>
                        <li class="list-none ml-8 font-bold"><a href="/receptes">Receptes</a></li>
                        <li class="list-none ml-8"><a href="/locationview">Establiments</a></li>
                        <li class="list-none ml-8"><a href="/quisom">Qui som ?</a></li>
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
                                    <img class="w-[18%] h-[18%]" src="../../img/logout/logout.svg" alt="logouticon">
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
    
    <main class="bg-slate-100 text-gray-800 font-inter">
        <section class="py-16 px-6">
            <div>
                <div>
                <form action="/searchrecipesall" class="flex p-[40px]" method="POST">
                        <div>
                            <div class="relative flex items-center max-w-[800px]">
                                <img class="absolute w-5 h-5 left-2.5 " src="../../img/search/search.svg" alt="search">
                                <input name="name" class="w-[400px] bg-[#fefbf9] placeholder:text-black font-normal font-inter text-black text-[16px] border border-[#FCB666] rounded-[27px] pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] shadow-sm focus:shadow" placeholder="cerca la recepta">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Modal buscador -->
            <?php if (!empty($noResults)): ?>
                <div class="searchmodal fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                        <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Sense resultats</h2>
                        <p class="font-inter text-black font-medium text-[16px] text-center">No s'han trobat receptes amb aquest nom.</p>
                        <div class="flex justify-center">
                            <a href="/receptes" class="closesearchmodal font-inter bg-[#FCB666] mt-[10px] text-white text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:bg-[#ef9b3b] focus:outline-none">
                                Tancar
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 px-10 pb-20">
                <?php foreach ($recipes as $recipe) { ?>
                        <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col min-h-[550px]">
                            <img src="<?php echo $recipe->getImage() ?>" alt="Nom de la recepta" class="w-full h-56 object-cover">
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="w-full text-left mt-[10px] min-h-[50px]">
                                    <p class="text-2xl font-semibold font-montserrat mb-2"><?php echo $recipe->getName(); ?></p>
                                </div>
                                <div class="flex items-center gap-5">
                                    <div class="flex items-center">
                                        <img class="opacity-70 w-[20px]" src="./img/home/usuarios.png" alt=""> <!--People IMG!-->
                                        <p class="ml-2 opacity-70"><?php echo $recipe->getPeople(); ?><!--Num People!--></p>
                                    </div>
                                    <div class="flex items-center">
                                        <img class="opacity-70 w-[20px]" src="./img/home/reloj.png" alt=""> <!--Timer IMG!-->
                                        <p class="ml-2 opacity-70"><?php echo $recipe->getDuration(); ?><!--Min recipe!--></p>
                                    </div>
                                </div>
                                
                                <div class="w-full text-left mt-[10px] min-h-[100px]">
                                    <p class="text-gray-700 mt-3 lg:mt-0 md:mt-0 text-base mb-4"><?php echo $recipe->getDescription(); ?>...</p>
                                </div>
                                
                                <div class="w-full flex justify-center mt-auto">
                                    <form action="/recipesindividual" method="POST" class="w-[90%]">
                                        <input type="hidden" name="id" value="<?php echo $recipe->getId();?> ">
                                        <button type="submit" class="w-full mt-[15px] mb-[10px] text-center p-2 rounded-full bg-[#fcb666] text-white border-2 border-[#fcb666] hover:bg-white hover:text-[#fcb666] transition duration-300">
                                            Veure recepta
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>                 
            </div>
            
            <!-- Modal edit -->
            <?php if (!empty($_SESSION['success_add'])): ?>
                <div class="updatemodal fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                        <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Comentari afegit</h2>
                        <p class="font-inter text-black font-medium text-[16px] text-center">
                            El comentari s'ha afegit correctament en
                            <span class="font-bold"><?php echo $_SESSION['success_recipe_name']; ?></span>.
                        </p>
                        <div class="flex justify-center">
                            <a href="/receptes" class="font-inter bg-[#FCB666] mt-[10px] mr-[15px] text-[white] text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">Tancar</a>
                        </div>
                    </div>
                </div>
                <?php
                    unset($_SESSION['success_add']);
                    unset($_SESSION['success_recipe_name']);
                ?>
            <?php endif; ?>
        </section>
    </main>
    
    <!-- File show modal search -->
    <script src="../../js/modals/searchmodal.js"></script>
    
    <!-- File show modal update -->
    <script src="../../js/modals/updatemodal.js"></script>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <!--Dropdown section!-->
    <script src="../../js/dropdown/dropdown.js"></script>
</body>
</html>