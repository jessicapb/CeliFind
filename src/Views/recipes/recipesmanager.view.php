<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de les receptes</title>
    <link href="./src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>
<body>
    <header class="pb-[15px] border-b border-gray-300">
        <nav class="flex justify-between items-center w-full">
            <a class="pl-[20px] pt-[20px]" href="/productmanager">
                <img class="w-32" src="../../img/logo/logo.png" alt="logoimg">
            </a>
            <div class="flex items-center">
                <a href="/productmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Productes</a>
                <a href="/recipesmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-bold">Receptes</a>
                <a href="/establishmentsmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Establiments</a>
                <a href="/category" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Categories</a>
                <a href="/subcategory" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Subcategories</a>
                <a href="/usersmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Usuaris</a>
                <!-- Dropdown -->
                <div class="relative inline-block text-left">
                    <?php if (isset($_SESSION['user'])): ?>
                        <button id="dropdown-toggle" type="button" class="font-inter min-w-[180px] p-[8px] mr-[30px] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                            <?= htmlspecialchars($_SESSION['user']['name']) ?>
                        </button>
                        <div id="dropdown-menu" class="font-inter hidden absolute left-0 mt-2 w-[90%] origin-top-center text-black bg-white border-1 shadow-lg rounded-[20px] z-10">
                            <div class="p-1 space-y-0.5">
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/home">
                                    <img class="w-[15%] h-[15%]" src="../../img/logout/home.svg" alt="">
                                    Home
                                </a>
                                <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/logout">
                                    <img class="w-[18%] h-[18%]" src="../../img/logout/logout.svg" alt="">
                                    Tancar sessió
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>
    
    <section class="bg-slate-100 pb-[20px]">
        <div class="breadcrumb-container">
            <ul class="breadcrumb flex pl-[20px] pt-[20px]">
                <li><a href="/recipesmanager" class="breadcrumb-link underline font-bold">Gestor receptes</a></li>
            </ul>
        </div>
        
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] text-center font-bold pt-[26px]">Gestor <span class="text-[#96c368] opacity-[100%]">receptes</span></h1>
        
        <div class="mt-[20px] flex justify-between items-center">
            <!-- Add product  -->
            <div class="w-[50%]">
                <a class="font-inter bg-[#FCB666] text-white text-[16px] font-medium p-[9px] ml-[20px] mr-[5px] rounded-[9px] text-center transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50" href="/recipesadd">Afegir receptes</a>
                <a class="font-inter bg-[#96c368] text-[#f5f5f5] text-[16px] font-medium p-[9px]  rounded-[9px] text-center transition-all focus:shadow-none active:bg-[#88c24d] hover:focus:bg-[#88c24d]  hover:bg-[#88c24d] disabled:pointer-events-none disabled:opacity-50" href="/recipesshowimage">Veure imatges</a>
            </div>
            
            <!-- Modal edit -->
            <?php if (!empty($_SESSION['success_add'])): ?>
                <div class="updatemodal fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                        <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Recepta afegida</h2>
                        <p class="font-inter text-black font-medium text-[16px] text-center">La recepta s'ha afegit correctament.</p>
                        <div class="flex justify-center">
                            <a href="/recipesmanager" class="font-inter bg-[#FCB666] mt-[10px] mr-[15px] text-[white] text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">Tancar</a>
                        </div>
                    </div>
                </div>
                <?php unset($_SESSION['success_add']); ?>
            <?php endif; ?>
            
            <!-- Search part -->
            <form action="/searchrecipes" method="POST">
                <div class="w-full max-w-sm min-w-[200px] mr-[15px]">
                    <div class="relative flex items-center">
                        <img class="absolute w-5 h-5 left-2.5 " src="../../img/search/search.svg" alt="search">
                        <input name="name" class="w-[500px] bg-[#fefbf9] placeholder:text-black font-normal font-inter text-black text-[16px] border border-[#FCB666] rounded-[27px] pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] shadow-sm focus:shadow" placeholder="escriu la recepta">
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Modal buscador -->
        <?php if (!empty($noResults)): ?>
            <div class="searchmodal fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50">
                <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                    <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Sense resultats</h2>
                    <p class="font-inter text-black font-medium text-[16px] text-center">No s'han trobat receptes amb aquest nom.</p>
                    <div class="flex justify-center">
                        <a href="/recipesmanager" class="closesearchmodal font-inter bg-[#FCB666] mt-[10px] text-white text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:bg-[#ef9b3b] focus:outline-none">
                            Tancar
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Table part -->
        <table class="w-full m-auto mt-[50px] table-auto text-center border-separate border-spacing-[20px]">
            <thead>
                <tr>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Nom</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Descripció</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Ingredients</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Informació nutricional</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Persones</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Duració</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Instruccions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recipes as $recipe) {?>
                    
                    <tr>
                        <!-- Name -->
                        <td class="border border-[#FCB666] p-[9px] bg-white">
                            <?php echo $recipe->getName();?>
                        </td>
                        <!-- Description -->
                        <td class="border border-[#FCB666] p-[9px] bg-white">
                            <?php echo $recipe->getDescription();?> 
                        </td>
                        <!-- Ingredients -->
                        <td class="border border-[#FCB666] p-[9px] bg-white">
                            <?php echo $recipe->getIngredients(); ?> 
                        </td>
                        <!-- Ingredients -->
                        <td class="border border-[#FCB666] p-[9px] bg-white">
                            <?php echo $recipe->getNutritionalInformation(); ?> 
                        </td>
                        <!-- People -->
                        <td class="border border-[#FCB666] p-[9px] bg-white">
                            <?php echo $recipe->getPeople(); ?> 
                        </td>
                        <!-- Duration -->
                        <td class="border border-[#FCB666] p-[9px] bg-white">
                            <?php echo $recipe->getDuration(); ?> 
                        </td>
                        <!-- Instructions -->
                        <td class="border border-[#FCB666] p-[9px] bg-white">
                            <?php echo $recipe->getInstruction(); ?> 
                        </td>
                        <!-- Edit button -->
                        <td class="font-inter bg-[#FCB666] p-[9px] text-[white] text-[16px] font-medium p-[5px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                            <div class="flex justify-center">
                                <button type="submit" class="flex items-center edit-recipes-btn" 
                                        data-id="<?php echo $recipe->getId(); ?>" 
                                        data-name="<?php echo $recipe->getName(); ?>" 
                                        data-description="<?php echo $recipe->getDescription(); ?>" 
                                        data-ingredients="<?php echo $recipe->getIngredients(); ?>" 
                                        data-nutritionalinformation="<?php echo $recipe->getNutritionalInformation(); ?>"
                                        data-people="<?php echo $recipe->getPeople(); ?>"
                                        data-duration="<?php echo $recipe->getDuration(); ?>"
                                        data-instruction="<?php echo $recipe->getInstruction(); ?>">
                                    <p class="mr-[5px]">Editar</p>
                                    <img class="w-[20px] h-[20px]" src="../../img/edit/edit.png" alt="edit">
                                </button>
                            </div>
                        </td>
                        
                        <!-- Modal edit -->
                        <?php if (!empty($_SESSION['success_update'])): ?>
                            <div class="updatemodal fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50">
                                <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                                    <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Recepta actualitzada</h2>
                                    <p class="font-inter text-black font-medium text-[16px] text-center">La recepta s'ha actualitzat correctament.</p>
                                    <div class="flex justify-center">
                                        <a href="/recipesmanager" class="font-inter bg-[#FCB666] mt-[10px] mr-[15px] text-[white] text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">Tancar</a>
                                    </div>
                                </div>
                            </div>
                            <?php unset($_SESSION['success_update']); ?>
                        <?php endif; ?>
                        
                        <!-- Delete button -->
                        <td class="font-inter bg-[#FCB666] p-[9px] text-white text-[16px] font-medium p-[5px] rounded-[9px] transition-all hover:bg-[#ef9b3b]">
                            <div class="flex justify-center">
                                <button class="openmodal flex items-center cursor-pointer">
                                    <p class="mr-[5px]">Eliminar</p>
                                    <img class="w-[20px] h-[20px]" src="../../img/delete/delete.png" alt="delete">
                                </button>
                            </div>
                        </td>
                        <!-- Modal delete -->
                        <div class="deletemodal fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50 hidden">
                            <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                                <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Vols eliminar la recepta <?php echo $recipe->getName() ?> ?</h2>
                                <p class="font-inter text-black- font-medium text-[16px] text-center">Un cop sigui eliminada no es podrà desfer l'operació.</p>
                                <div class="flex justify-center">
                                    <form action="/deleterecipes" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $recipe->getId(); ?>">
                                        <button type="submit" class="font-inter bg-[#FCB666] mt-[10px] mr-[15px] text-[white] text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">Eliminar</button>
                                    </form>
                                    <button class="closemodal font-inter bg-[#96c368] text-[#f5f5f5] text-[16px] font-medium p-[9px] mt-[10px] rounded-[9px] text-center transition-all focus:shadow-none active:bg-[#88c24d] hover:focus:bg-[#88c24d]  hover:bg-[#88c24d] disabled:pointer-events-none disabled:opacity-50">Cancelar</button>
                                </div>
                            </div>
                        </div>
                        <!-- Modal delete correct -->
                        <?php if (isset($_GET['deleted']) && $_GET['deleted'] == 'true'): ?>
                            <div class="deletemodal fixed inset-0 flex justify-center items-center bg-opacity-50 z-50">
                                <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                                    <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Eliminada la recepta</h2>
                                    <div class="flex justify-center">
                                        <a href="/recipesmanager" class="font-inter bg-[#FCB666] mt-[10px] mr-[15px] text-[white] text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">Tancar</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- Show button -->
                        <td class="font-inter flex justify-center bg-[#FCB666] p-[9px] text-[white] text-[16px] font-medium p-[5px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                            <div class="flex justify-center">
                                <form action="/recipesindividual" target="_blank" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $recipe->getId(); ?>">
                                    <button type="submit" class="flex items-center">
                                        <p class="mr-[5px]">Veure</p>
                                        <img class="w-[20px] h-[20px]" src="../../img/show/show.png" alt="show">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section> 
    
    <!-- File show modal delete -->
    <script src="../../js/modals/deletemodal.js"></script>
    
    <!-- File show modal search -->
    <script src="../../js/modals/searchmodal.js"></script>
    
    <!-- File show modal update -->
    <script src="../../js/modals/updatemodal.js"></script>
    
    <!-- File to update the product -->
    <script src="../../js/recipes/editrecipes.js"></script>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <!--Dropdown section!-->
    <script src="../../js/dropdown/dropdown.js"></script>
</body>
</html>