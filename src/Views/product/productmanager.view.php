<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor dels productes</title>
    <link href="./src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
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
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] text-center font-bold">Gestor <span class="text-[#96c368] opacity-[100%]">producte</span></h1>
        <div class="mt-[20px] flex justify-between items-center">
            <!-- Add product  -->
            <div class="w-[31%]">
                <a class="font-inter bg-[#FCB666] text-white text-[16px] font-medium p-[9px] ml-[20px] mr-[5px] rounded-[9px] text-center transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50" href="/productadd">Afegir productes</a>
                <a class="font-inter bg-[#96c368] text-[#f5f5f5] text-[16px] font-medium p-[9px]  rounded-[9px] text-center transition-all focus:shadow-none active:bg-[#88c24d] hover:focus:bg-[#88c24d]  hover:bg-[#88c24d] disabled:pointer-events-none disabled:opacity-50" href="/producttocategory">Assignar producte a subcategoria</a>
            </div>
            
            <!-- Search part -->
            <form action="">
                <div class="w-full max-w-sm min-w-[200px]">
                    <div class="relative flex items-center">
                        <img class="absolute w-5 h-5 left-2.5 " src="../../img/search/search.svg" alt="search">
                        <input class="w-full bg-[#fefbf9] placeholder:text-black font-normal font-inter text-black text-[16px] border border-[#FCB666] rounded-[27px] pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] shadow-sm focus:shadow" placeholder="escriu el producte">
                        <button class="font-inter bg-[#FCB666] text-white text-[16px] font-medium p-[9px] px-[25px] ml-[10px] rounded-[9px] mr-[20px] text-center transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50" type="button">
                        Buscar
                        </button> 
                    </div>
                </div>
            </form>
        </div>

        <!-- Table part -->
        <table class="w-full mt-[50px] table-auto text-center border-separate border-spacing-[20px]">
            <thead>
                <tr>
                    <th class="text-black font-calistoga text-[24px] pl-[10px] font-bold pr-[10px]">Id</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Nom</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Descripció</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Ingredients</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Informació nutricional</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Preu</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Marca</th>
                    <th class="text-black font-calistoga text-[24px] font-bold pr-[10px]">Estat</th>
                    <th class="text-black font-calistoga text-[24px] font-bold">Subcategoria_id</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <!-- ID -->
                        <td class="border border-[#FCB666] p-[9px]">
                            <?php echo $product->getId();?>
                        </td>
                        <!-- Name -->
                        <td class="border border-[#FCB666] p-[9px]">
                            <?php echo $product->getName();?>
                        </td>
                        <!-- Description -->
                        <td class="border border-[#FCB666] p-[9px]">
                            <?php echo $product->getDescription();?> 
                        </td>
                        <!-- Ingredients -->
                        <td class="border border-[#FCB666] p-[9px]">
                            <?php echo $product->getIngredients(); ?> 
                        </td>
                        <!-- Nutritional Information -->
                        <td class="border border-[#FCB666] p-[9px]">
                            <?php echo $product->getNutritionalInformation();?>
                        </td>
                        <!-- Price -->
                        <td class="border border-[#FCB666] p-[9px]">
                            <?php echo $product->getPrice();?>
                        </td>
                        <!-- Brand -->
                        <td class="border border-[#FCB666] p-[9px]">
                            <?php echo $product->getBrand();?>
                        </td>
                        <!-- State -->
                        <td class="border border-[#FCB666] p-[9px]">
                            <?php echo $product->getState();?>
                        </td>
                        <!-- SubcategoryId -->
                        <td class="border border-[#FCB666] p-[9px]">
                            <?php echo $product->getSubCategoryId();?>
                        </td>
                        <!-- Edit button -->
                        <td class=" font-inter bg-[#FCB666] text-[white] text-[16px] font-medium p-[5px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                            <a href="" class="flex items-center">
                                <p class="mr-[5px] ml-[5px]">Editar</p>
                                <img class="mr-[10px] w-[20px] h-[20px]" src="../../img/edit/edit.png" alt="edit">
                            </a>
                        </td>
                        <!-- Delete button -->
                        <td class="font-inter bg-[#FCB666] text-[white] text-[16px] font-medium p-[5px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                            <a href="" class="flex items-center">
                                <p class="mr-[5px] ml-[5px]">Eliminar</p>
                                <img class="mr-[10px] w-[20px] h-[20px]" src="../../img/delete/delete.png" alt="delete">
                            </a>
                        </td>
                        <!-- Show button -->
                        <td class="font-inter bg-[#FCB666] text-[white] text-[16px] font-medium p-[5px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                            <a href="" class="flex items-center">
                                <p class="mr-[5px] ml-[5px]">Veure</p>
                                <img class="mr-[10px] w-[20px] h-[20px]" src="../../img/show/show.png" alt="delete">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>
</html>

