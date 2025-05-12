<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de usuaris</title>
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
                <a href="/recipesmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Receptes</a>
                <a href="/establishmentsmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Establiments</a>
                <a href="/category" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Categories</a>
                <a href="/subcategory" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-normal">Subcategories</a>
                <a href="/usersmanager" class="font-inter pr-[20px] pt-[20px] text-[16px] text-black font-bold">Usuaris</a>
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
            <ul class="breadcrumb flex gap-2 pl-[20px] pt-[20px]">
                <li><a href="/usersmanager" class="breadcrumb-link underline">Gestor usuaris</a></li>            
            </ul>
        </div>
        
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] text-center font-bold pt-[26px]">Gestor <span class="text-[#96c368] opacity-[100%]">usuaris</span></h1>
        
        <div class="mt-[20px] flex justify-between items-center">
            <!-- Add admin  -->
            <div class="w-[50%]">
                <a class="font-inter bg-[#FCB666] text-white text-[16px] font-medium p-[9px] ml-[20px] mr-[5px] rounded-[9px] text-center transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50" href="/useradd">Afegir administrador</a>
            </div>
            
            <!-- Modal add -->
            <?php if (!empty($_SESSION['success_add'])): ?>
                <div class="addmodal fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                        <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Administrador afegit</h2>
                            <p class="font-inter text-black font-medium text-[16px] text-center">L'administrador s'ha afegit correctament.</p>
                            <div class="flex justify-center">
                                <a href="/usersmanager" class="font-inter bg-[#FCB666] mt-[10px] mr-[15px] text-[white] text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">Tancar</a>
                            </div>
                    </div>
                </div>
                <?php unset($_SESSION['success_add']); ?>
            <?php endif; ?>
            
            <!-- Search part -->
            <form action="/searchusers" method="POST">
                <div class="w-full max-w-sm min-w-[200px] mr-[15px]">
                    <div class="relative flex items-center">
                        <img class="absolute w-5 h-5 left-2.5 " src="../../img/search/search.svg" alt="search">
                        <input name="name" class="w-[500px] bg-[#fefbf9] placeholder:text-black font-normal font-inter text-black text-[16px] border border-[#FCB666] rounded-[27px] pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] shadow-sm focus:shadow" placeholder="escriu el usuari">
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Modal buscador -->
        <?php if (!empty($noResults)): ?>
            <div class="searchmodal fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50">
                <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                    <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Sense resultats</h2>
                    <p class="font-inter text-black font-medium text-[16px] text-center">No s'han trobat usuaris amb aquest nom.</p>
                    <div class="flex justify-center">
                        <a href="/usersmanager" class="closesearchmodal font-inter bg-[#FCB666] mt-[10px] text-white text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:bg-[#ef9b3b] focus:outline-none">
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
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Cognoms</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Correu</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Ciutat</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Codi postal</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Estat</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) {?>
                    <tr>
                        <!-- Name -->
                        <td class="border border-[#FCB666] p-[9px] bg-white">
                            <?php echo $user["name"]; ?>
                        </td>
                        <!-- Surname -->
                        <td class="border border-[#FCB666] p-[9px] bg-white">
                            <?php 
                            if($user["surname"]=== null){
                                echo "No en té.";
                            }else{
                                echo $user["surname"];
                            }
                            ?>
                        </td>
                        <!-- Email -->
                        <td class="border border-[#FCB666] p-[9px] bg-white">
                            <?php echo $user["email"] ?> 
                        </td>
                        <!-- City -->
                        <td class="border border-[#FCB666] p-[9px] bg-white">
                            <?php 
                            if($user["city"]=== null){
                                echo "No en té.";
                            }else{
                                echo $user["city"];
                            }
                            ?>
                        </td>
                        <!-- Postal code -->
                        <td class="border border-[#FCB666] p-[9px] bg-white">
                            <?php echo $user["postalcode"]?>
                        </td>
                        <!-- State -->
                        <td class="border border-[#FCB666] p-[9px] bg-white">
                            <?php 
                            if($user["status"] === 1){
                                echo "Usuari";
                            }else{
                                echo "Administrador";                                
                            }
                            ?>
                        </td>
                        <?php if($user["status"] === 2){ ?>
                            <!-- Edit button -->
                            <td class="font-inter bg-[#FCB666] p-[9px] text-[white] text-[16px] font-medium p-[5px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                                <div class="flex justify-center max-w-[200px]">
                                    <form action="/productupdates" method="GET">
                                        <input type="hidden" name="id" value="<?php echo $user["id"] ?>">
                                        <button type="submit" class="flex items-center">
                                            <p class="mr-[5px]">Editar</p>
                                            <img class="w-[20px] h-[20px]" src="../../img/edit/edit.png" alt="edit">
                                        </button>
                                    </form>
                                </div>
                            </td>
                            
                            <!-- Modal edit -->
                            <?php if (!empty($_SESSION['success_update'])): ?>
                                <div class="updatemodal fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50">
                                    <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                                        <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Producte actualitzat</h2>
                                        <p class="font-inter text-black font-medium text-[16px] text-center">El producte s'ha actualitzat correctament.</p>
                                        <div class="flex justify-center">
                                            <a href="/productmanager" class="font-inter bg-[#FCB666] mt-[10px] mr-[15px] text-[white] text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">Tancar</a>
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
                                    <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Vols eliminar l'administrador <?php echo $user["name"] ?> ?</h2>
                                    <p class="font-inter text-black- font-medium text-[16px] text-center">Un cop sigui eliminat no es podrà desfer l'operació.</p>
                                    <div class="flex justify-center">
                                        <form action="/deleteuser" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
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
                                        <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Eliminat l'administrador</h2>
                                        <div class="flex justify-center">
                                            <a href="/usersmanager" class="font-inter bg-[#FCB666] mt-[10px] mr-[15px] text-[white] text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">Tancar</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php } ?>
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
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
    
    <!--Dropdown section!-->
    <script src="../../js/dropdown/dropdown.js"></script>
</body>
</html>