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
    <header class="p-4">
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
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section>
        <!--Localities section!-->
        <section class="bg-slate-100">
            <div class="flex-col justify-center pt-36 p-10 text-center">
                <h1 class="text-[46px] lg:text-[50px] font-calistoga">Descobreix llocs sense gluten</h1>
                <p class="font-inter text-[19px]">Consulta informació detallada sobre restaurants i espais segurs per celíacs.</p>
                <div class="mt-16">
                <a href="/showestablishment" class="bg-[#fcb666] text-[18px] text-white p-3 px-6 border-2 border-[#fcb666] rounded-xl hover:bg-white hover:text-[#fcb666] transition duration-300 ease-in-out">Explora tots els llocs</a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-10 pt-10 pb-20">
        <!-- CARD -->
        <?php  foreach ($allestablishments as $establishment) { ?>
            
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <img src="<?php echo $establishment->getImage() ?>" alt="Nom del lloc" class="w-full h-48 object-cover">
                <div class="p-4 text-left">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="font-bold text-lg"><?php echo $establishment->getName() ?></h2>
                    <span class="text-gray-400 font-semibold">Restaurant</span>
                </div>
                <p class="text-sm text-gray-600 mb-2"><?php echo $establishment->getDescription() ?></p>
                <p class="font-medium"><strong>Ubicació:</strong> <?php echo $establishment->getLocation() ?></p>
                <p class="font-medium"><strong>Telèfon:</strong> <?php echo $establishment->getPhoneNumber() ?></p>
                <div class="flex justify-between items-center mt-4">
                    <a href="<?php echo $establishment->getWebsite() ?>" target="_blank" class="text-[#fcb666] underline hover:text-[#e59f42]">Visita la Web</a>
                    <a href="#" class="text-[#fcb666] border border-[#fcb666] px-4 py-1 rounded-full hover:bg-[#fcb666] hover:text-white transition duration-300">Explorar</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

    </main>
    
    <!--Footer section!-->
    <?php include 'parts/footer/footer.view.php'?>
</body>
</html>