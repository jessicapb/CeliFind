<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informació</title>
    <link href="./src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Klee+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>
<body>
    <header class="p-4 border-b border-gray-300">
        <nav class="flex justify-between items-center">
            <a  href="/">
                <img class="w-32" src="../img/logo/logo.png" alt="">
            </a>
            <div class="flex items-center">
                <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) : ?>
                    <ul class="list-none flex p-4 hidden lg:flex items-center md:flex items-center">
                        <li class="list-none ml-8"><a href="/productview">Productes</a></li>
                        <li class="list-none ml-8"><a href="/receptes">Receptes</a></li>
                        <li class="list-none ml-8"><a href="/locationview">Establiments</a></li>
                    </ul>
                <?php else: ?>
                    <ul class="list-none flex p-4 hidden lg:flex items-center">
                        <li class="list-none ml-8"><a href="/productview">Productes</a></li>
                        <li class="list-none ml-8"><a href="/receptes">Receptes</a></li>
                        <li class="list-none ml-8"><a href="/locationview">Establiments</a></li>
                        <li class="list-none ml-8"><a href="/quisom">Qui som ?</a></li>
                        <li class="list-none ml-8 font-bold"><a href="/informacio">Informació</a></li>
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
    
    <main class="bg-slate-100 text-gray-800 font-inter">
        <section class="py-20 px-6 md:px-20 text-center bg-slate-100">
            <h1 class="text-5xl font-calistoga text-[#96c368] mb-6">Informació sobre la celiaquia</h1>
            <p class="max-w-3xl mx-auto text-lg">
                La celiaquia és una malaltia autoimmune que afecta el sistema digestiu. Les persones celíaques tenen una reacció adversa al gluten, una proteïna present en aliments com el blat, el sègol i l’ordi.
            </p>
            <p class="mt-4 max-w-3xl mx-auto text-lg">
                A <strong>CeliFind</strong>, estem compromesos amb proporcionar productes i informació fiable per garantir una vida més fàcil i segura per a la comunitat celíaca.
            </p>
        </section>
        
        <section class="py-16 px-6 md:px-20">
            <h2 class="text-4xl font-calistoga text-center mb-10">Com detectar la celiaquia?</h2>
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div class="bg-white p-6 shadow-md rounded-xl">
                    <img src="../img/home/simptoma.png" alt="Símptomes" class="w-20 mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Símptomes comuns</h3>
                    <p>Inflor abdominal, diarrea, pèrdua de pes, anèmia i fatiga crònica.</p>
                </div>
                <div class="bg-white p-6 shadow-md rounded-xl">
                    <img src="../img/home/diagnostic.png" alt="Diagnòstic" class="w-20 mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Diagnòstic</h3>
                    <p>Mitjançant proves de sang i, en alguns casos, una biòpsia intestinal.</p>
                </div>
                <div class="bg-white p-6 shadow-md rounded-xl">
                    <img src="../img/home/tractament.png" alt="Alimentació" class="w-20 mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Tractament</h3>
                    <p>Segueix una dieta estricta sense gluten durant tota la vida o amb certa regulació.</p>
                </div>
            </div>
        </section>
        
        <section class="bg-slate-100 py-20 px-6 md:px-20">
            <h2 class="text-4xl font-calistoga text-center text-[#96c368] mb-16">Passos per portar una vida sense gluten</h2>
            <div class="relative border-l-4 border-[#fcb666] max-w-3xl mx-auto space-y-10">
                
                <!-- Pas 1 -->
                <div class="ml-6">
                    <div class="flex items-center mb-2">
                        <div class="bg-[#fcb666] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold shadow-md">1</div>
                        <h3 class="ml-4 text-xl font-semibold text-[#fcb666]">Llegeix les etiquetes</h3>
                    </div>
                    <p class="ml-12 text-gray-700">
                        Revisa sempre l’etiquetatge dels productes abans de consumir-los per evitar gluten ocult. Busca la menció "sense gluten" o el símbol de l'espiga barrada, que indica que el producte és segur per a persones celíaques.
                    </p>
                </div>
                
                <!-- Pas 2 -->
                <div class="ml-6">
                    <div class="flex items-center mb-2">
                        <div class="bg-[#fcb666] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold shadow-md">2</div>
                        <h3 class="ml-4 text-xl font-semibold text-[#fcb666]">Evita contaminació creuada</h3>
                    </div>
                    <p class="ml-12 text-gray-700">
                        Cuina amb estris separats, neteja superfícies i evita compartir aliments amb gluten. La contaminació creuada pot ocórrer quan aliments amb gluten entren en contacte amb aliments sense gluten, fins i tot en petites quantitats.
                    </p>
                </div>
                
                <!-- Pas 3 -->
                <div class="ml-6">
                    <div class="flex items-center mb-2">
                        <div class="bg-[#fcb666] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold shadow-md">3</div>
                        <h3 class="ml-4 text-xl font-semibold text-[#fcb666]">Consulta aplicacions i guies</h3>
                    </div>
                    <p class="ml-12 text-gray-700">
                        Utilitza apps i webs per localitzar productes i restaurants aptes per celíacs. Aplicacions com FACEMOVIL ofereixen informació actualitzada sobre establiments i productes segurs.
                    </p>
                </div>
                
                <!-- Pas 4 -->
                <div class="ml-6">
                    <div class="flex items-center mb-2">
                        <div class="bg-[#fcb666] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold shadow-md">4</div>
                        <h3 class="ml-4 text-xl font-semibold text-[#fcb666]">Planifica els teus àpats</h3>
                    </div>
                    <p class="ml-12 text-gray-700">
                    Prepara menjars o snacks per a sortides, viatges o esdeveniments per estar tranquil/a. Planificar amb antelació t'ajuda a evitar situacions on no hi hagi opcions segures disponibles.
                    </p>
                </div>
                
                <!-- Pas 5 -->
                <div class="ml-6">
                    <div class="flex items-center mb-2">
                        <div class="bg-[#fcb666] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold shadow-md">5</div>
                        <h3 class="ml-4 text-xl font-semibold text-[#fcb666]">Informa el teu entorn</h3>
                    </div>
                    <p class="ml-12 text-gray-700">
                        Explica a la teva família, amics i companys de feina la importància de la dieta sense gluten. La seva comprensió i suport són essencials per evitar errors alimentaris i garantir la teva salut.
                    </p>
                </div>
                
                <!-- Pas 6 -->
                <div class="ml-6">
                    <div class="flex items-center mb-2">
                        <div class="bg-[#fcb666] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold shadow-md">6</div>
                        <h3 class="ml-4 text-xl font-semibold text-[#fcb666]">Consulta amb professionals</h3>
                    </div>
                    <p class="ml-12 text-gray-700">
                        Acudeix regularment a un dietista-nutricionista especialitzat en celiaquía per assegurar-te que la teva dieta és equilibrada i adequada a les teves necessitats nutricionals.
                    </p>
                </div>
                
                <!-- Pas 7 -->
                <div class="ml-6">
                    <div class="flex items-center mb-2">
                        <div class="bg-[#fcb666] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold shadow-md">7</div>
                            <h3 class="ml-4 text-xl font-semibold text-[#fcb666]">Mantén-te informat</h3>
                        </div>
                        <p class="ml-12 text-gray-700">
                            Mantén-te al dia amb les últimes notícies i investigacions sobre la celiaquía. Organitzacions com la FACE i la SEGHNP ofereixen recursos actualitzats i fiables.
                        </p>
                    </div>
                </div>
                
                <div class="mt-16 text-center">
                    <a href="/productview" class="bg-[#fcb666] text-white px-10 py-4 rounded-full font-medium hover:bg-white hover:text-[#fcb666] border-2 border-[#fcb666] transition duration-300">
                        Explora els nostres productes
                    </a>
                </div>
        </section>
    </main>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
</body>
</html>