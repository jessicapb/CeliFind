<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($recipes->getName())?></title>
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
                    <ul class="list-none flex p-4 hidden lg:flex items-center md:flex items-center">
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
    
    <section class="bg-slate-100 relative w-full h-96 sm:h-[30rem] flex items-center justify-center text-white">
        <div class="absolute inset-0">
            <img src="<?php echo $recipes->getImage() ?>" alt="Nom de la recepta" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        </div>
        
        <div class="relative z-10 text-center px-4">
            <p class="text-[64px] font-calistoga font-bold"><?php echo $recipes->getName() ?></p>
            <div class="flex flex-col sm:flex-row items-center gap-4 justify-center mt-4">
                <div class="flex items-center">
                    <img class="w-[20px]" src="./img/recepte/usuario.png" alt="Usuarios">
                    <p class="text-[20px] ml-2 font-calistoga font-semibold"><?php echo $recipes->getPeople(); ?></p>
                </div>
                <div class="flex items-center">
                    <img class="w-[20px]" src="./img/recepte/reloj.png" alt="Duración">
                    <p class="text-[20px] ml-2 font-calistoga font-semibold"><?php echo $recipes->getDuration(); ?></p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="bg-slate-100 text-black pt-[30px]">
        <div class="p-[10px] items-start w-full max-w-6xl  mx-auto">
            <h2 class="font-calistoga text-[35px] text-black pl-[10px] opacity-[78%] font-regular">Descripció</h2>
            <p class="font-inter text-[16px] text-black pl-[10px] font-normal pt-[5px]"><?php echo $recipes->getDescription(); ?></p>
        </div>
        <!--NUTRITION AND INGREDIENTS!-->
        <div class="flex mt-[50px] flex-col sm:flex-row justify-between p-[10px] items-start w-full max-w-6xl mx-auto">
            <div class="w-full sm:w-1/2 pl-[10px]">
                <h2 class="font-calistoga text-[35px] text-black opacity-[78%] font-regular">Informació Nutricional</h2>
                <p class="font-inter text-[16px] text-black font-normal pt-[5px]"><?php echo $recipes->getNutritionalInformation(); ?></p>
            </div>
            <div class="w-full sm:w-1/2 pl-3">
                <h2 class="font-calistoga text-[35px] text-black opacity-[78%] font-regular">Ingredients</h2>
                <p class="font-inter text-[16px] text-black font-normal pt-[5px]"><?php echo $recipes->getIngredients(); ?></p>
            </div>
        </div>
        <div class="max-w-6xl mx-auto mt-10 px-6">
            <h2 class="font-calistoga text-[35px] text-black opacity-[78%] font-regular mb-4 text-center">Passos a seguir</h2>
            <div class="flex justify-center relative">
                <ol class="list-decimal list-inside pb-[20px] font-inter text-[16px] text-black font-normal w-full max-w-2xl space-y-5">
                    <?php $instructions = explode('.', $recipes->getInstruction()); ?>
                    <?php foreach ($instructions as $index => $instruction): ?>
                        <?php if (trim($instruction) !== ''): ?>
                            <li class="flex items-start">
                                <span class="bg-[#fcb666] text-white rounded-full w-8 h-8 flex items-center justify-center shadow-md mr-4">
                                    <?php echo ($index + 1); ?>
                                </span>
                                <p class="font-inter text-[16px] text-black font-normal pt-[5px] flex-1"><?php echo trim($instruction); ?>.</p>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </section>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <!--Dropdown section!-->
    <script src="../../js/dropdown/dropdown.js"></script>
</body>
</html>