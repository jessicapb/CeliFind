<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor dels categories</title>
    <link href="./src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="shortcut icon" class="h-18" href="../../img/logo/logo.png" type="image/x-icon">
</head>

<body>
    <header>
        <nav>
            <a href="/manager">
                <img class="pl-[20px] pt-[20px] w-[9%] h-[9%]" src="../../img/logo/logo.png" alt="">
            </a>
            <div class="p-1 space-y-0.5">
                <a class="font-calistoga flex items-center gap-x-2 pt-[10px] pl-[20px] rounded-[50px] text-[24px] text-black opacity-[78%] font-light" href="/manager">
                    <img class="w-[1.8%] h-[1.8%]" src="../../img/home/home.png" alt="">
                    Tornar al gestor
                </a>
            </div>
        </nav>
    </header>
    <section>
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] font-bold mb-6 text-center">Gestor <span class="text-[#96c368] opacity-[100%]">Categories</span></h1>
        <div class="mt-[20px] flex justify-between items-center">
            <a class="font-inter bg-[#FCB666] text-white text-[16px] font-medium p-[9px] ml-[20px] mr-[5px] rounded-[9px] text-center transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50" href="/categoryadd">Afegir Categoria</a>

            <form action="">
                <div class="w-full max-w-sm min-w-[200px]">
                    <div class="relative flex items-center">
                        <img class="absolute w-5 h-5 left-2.5 " src="../../img/search/search.svg" alt="search">
                        <input class="w-full bg-[#fefbf9] placeholder:text-black font-normal font-inter text-black text-[16px] border border-[#FCB666] rounded-[27px] pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] shadow-sm focus:shadow" placeholder="escriu la categoria" />
                        <button class="font-inter bg-[#FCB666] text-white text-[16px] font-medium p-[9px] ml-[20px] mr-[20px] rounded-[9px] text-center transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50" type="button">
                            Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <section>
            <table class="w-full mt-[50px] table-auto text-center border-separate border-spacing-2">
                <thead>
                    <tr>
                        <th class="text-black font-calistoga text-[24px] pl-[10px] font-bold pr-[10px]">Id</th>
                        <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Nom</th>
                        <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Descripció</th>
                        <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Imatge</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category) { ?>
                        <tr>
                            <td class="border border-[#FCB666] p-[10px]"><?php echo $category->getId(); ?></td>
                            <td class="border border-[#FCB666] p-[10px]"><?php echo $category->getName(); ?></td>
                            <td class="border border-[#FCB666] p-[10px]"><?php echo $category->getDescription(); ?></td>
                            <td class="border border-[#FCB666] p-[10px] w-[5%] h-[5%]"><?php echo $category->getBase64(); ?></td>

                            <!-- Edit button -->
                            <td class="font-inter w-[100px] bg-[#FCB666] text-[white] text-[16px] font-medium p-[5px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                                <a href="" class="flex items-center justify-center w-full h-full">
                                    <p class="mr-[5px] ml-[5px]">Editar</p>
                                    <img class="mr-[10px] w-[20px] h-[20px]" src="../../img/edit/edit.png" alt="edit">
                                </a>
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
                                    <p class="font-inter text-black- font-medium text-[16px] text-center">Un cop sigui eliminat no es podrà desfer l'operació.</p>
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
                            <?php if ($_GET['deleted'] == 'true'): ?>
                                <div class="deletemodal fixed inset-0 flex justify-center items-center bg-opacity-50 z-50">
                                    <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                                        <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Categoria eliminada</h2>
                                        <div class="flex justify-center">
                                            <a href="/category" class="font-inter bg-[#FCB666] mt-[10px] mr-[15px] text-[white] text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">Tancar</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Show button -->
                            <td class="font-inter w-[100px] bg-[#FCB666] text-[white] text-[16px] font-medium p-[5px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                                <a href="" class="flex items-center justify-center w-full h-full">
                                    <p class="mr-[5px] ml-[5px]">Veure</p>
                                    <img class="mr-[10px] w-[20px] h-[20px]" src="../../img/show/show.png" alt="show">
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </section>
    </section>
    <script src="../../../js/category/category.js"></script>
    <script src="../../../js/category/deletemodal.js"></script>
</body>