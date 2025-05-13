<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de les categories</title>
    <link href="./src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>
<body >
    <!--Header section!-->
    <header class="pb-[15px] border-b border-gray-300">
        <nav class="flex justify-between items-center w-full">
            <a class="pl-[20px] pt-[20px]" href="/productmanager">
                <img class="w-32" src="../../img/logo/logo.png" alt="logoimg">
            </a>
            <div class="flex items-center mr-[20px]">
                <a href="/productmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Productes</a>
                <a href="/recipesmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Receptes</a>
                <a href="/category" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Establiments</a>
                <a href="/category" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-bold">Categories</a>
                <a href="/subcategory" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Subcategories</a>
                <!-- Dropdown -->
                <div class="relative inline-block text-left">
                    <button id="dropdown-toggle" type="button" class="font-inter p-[8px] w-[90%] mr-[65px] mt-[20px] text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-[white] hover:font-normal hover:border-[#fcb666] hover:border-2 transition duration-200">
                    Administrador
                    </button>
                    
                    <div id="dropdown-menu" class="font-inter hidden absolute left-0 mt-2 w-[90%] origin-top-center text-black bg-white border-1 shadow-lg rounded-[50px] z-10">
                        <div class="p-1 space-y-0.5">
                            <a class="font-inter flex items-center gap-x-2 py-1 px-2 rounded-[50px] text-[16px] text-black font-normal hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="/logout">
                                <img class="w-[18%] h-[18%]" src="../../img/logout/logout.svg" alt="">
                                Tancar sessió
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <section class="bg-slate-100 pb-[20px]">
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] font-bold mb-6 text-center pt-[26px]">Gestor <span class="text-[#96c368] opacity-[100%]">categories</span></h1>
        <div class="mt-[20px] flex justify-between items-center">
            <!-- Add Category  -->
            <div class="w-[50%]">
                <a class="font-inter bg-[#FCB666] text-white text-[16px] font-medium p-[9px] ml-[20px] mr-[5px] rounded-[9px] text-center transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50" href="/categoryadd">Afegir categoria</a>
                <a class="font-inter bg-[#96c368] text-[#f5f5f5] text-[16px] font-medium p-[9px]  rounded-[9px] text-center transition-all focus:shadow-none active:bg-[#88c24d] hover:focus:bg-[#88c24d]  hover:bg-[#88c24d] disabled:pointer-events-none disabled:opacity-50" href="/categoryshowimage">Veure imatges</a>
            </div>
            <form action="/searchcategory" method="POST">
                <div class="w-full max-w-sm min-w-[200px] mr-[15px]">
                    <div class="relative flex items-center">
                        <img class="absolute w-5 h-5 left-2.5 " src="../../img/search/search.svg" alt="search">
                        <input name="name" class="w-[500px] bg-[#fefbf9] placeholder:text-black font-normal font-inter text-black text-[16px] border border-[#FCB666] rounded-[27px] pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] shadow-sm focus:shadow" placeholder="escriu la categoria">
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Modal search -->
        <?php if (!empty($noResults)): ?>
            <div class="searchmodal fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50">
                <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                    <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Sense resultats</h2>
                    <p class="font-inter text-black font-medium text-[16px] text-center">No s'han trobat categories amb aquest nom.</p>
                    <div class="flex justify-center">
                        <a href="/category" class="closesearchmodal font-inter bg-[#FCB666] mt-[10px] text-white text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:bg-[#ef9b3b] focus:outline-none">
                            Tancar
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <section>
            <table class="w-full mt-[50px] table-auto text-center border-separate border-spacing-[13px] pb-[20px]">
                <thead>
                    <tr>
                        <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Nom</th>
                        <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Descripció</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category) { ?>
                        <tr>
                            <td class="border border-[#FCB666] p-[10px] bg-white"><?php echo $category->getName(); ?></td>
                            <td class="border border-[#FCB666] p-[10px] bg-white"><?php echo $category->getDescription(); ?></td>
                            
                            <!-- Edit button -->
                            <td class="font-inter bg-[#FCB666] p-[9px] text-[white] text-[16px] font-medium p-[5px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                                <div class="flex justify-center">
                                    <button type="submit" class="flex items-center edit-category-btn" data-id="<?php echo $category->getId(); ?>" data-name="<?php echo $category->getName(); ?>" data-description="<?php echo $category->getDescription(); ?>">
                                        <p class="mr-[5px]">Editar</p>
                                        <img class="w-[20px] h-[20px]" src="../../img/edit/edit.png" alt="edit">
                                    </button>
                                </div>
                            </td>
                            
                            <!-- Delete button -->
                            <td class="font-inter w-[120px] bg-[#FCB666] text-white text-[16px] font-medium p-[5px] rounded-[9px] transition-all hover:bg-[#ef9b3b]">
                                <button class="openmodal flex items-center justify-center w-full h-full cursor-pointer">
                                    <p class="mr-[5px] ml-[5px]">Eliminar</p>
                                    <img class="mr-[10px] w-[20px] h-[20px]" src="../../img/delete/delete.png" alt="delete">
                                </button>
                            </td>
                            
                            <!-- Modal delete -->
                            <div class="deletemodal fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50 hidden">
                                <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                                    <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Vols eliminar la categoria <?php echo $category->getName() ?> ?</h2>
                                    <p class="font-inter text-black- font-medium text-[16px] text-center">Un cop sigui eliminada no es podrà desfer l'operació.</p>
                                    <div class="flex justify-center">
                                        <form action="/deletecategory" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $category->getId(); ?>">
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
                                        <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Eliminada la categoria</h2>
                                        <div class="flex justify-center">
                                            <a href="/category" class="font-inter bg-[#FCB666] mt-[10px] mr-[15px] text-[white] text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">Tancar</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </section>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <!-- File show modal search -->
    <script src="../../js/modals/searchmodal.js"></script>
    
    <script src="../../../js/category/category.js"></script>
    
    <script src="../../../js/modals/deletemodal.js"></script>

    <script src="../../../js/category/editcategory.js"></script>
    
    <!--Dropdown section!-->
    <script src="../../js/dropdown/dropdown.js"></script>
</body>