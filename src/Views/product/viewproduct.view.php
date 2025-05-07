<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productes</title>
    <link href="./src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/productview.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>
<body>
    <header class="p-4 border-b border-gray-300">
        <nav class="flex justify-between">
            <a href="/">
                <img class="w-32" src="../img/logo/logo.png" alt="">
            </a>
            <div class="flex">
                <ul class="list-none p-4m hidden lg:flex items-center">
                    <li class="ml-8 font-bold"><a href="/productview">Productes</a></li>
                    <li class="ml-8"><a href="/receptes">Receptes</a></li>
                    <li class="ml-8"><a href="/quisom">Qui som ?</a></li>
                    <li class="ml-8"><a href="/informacio">Informació</a></li>
                </ul>
                <div class="flex items-center gap-5 ml-16">
                    <a href="/register" class="font-inter p-2 px-5 text-[16px] text-black border-[#96c368] border-2 rounded-[50px] font-normal hover:bg-[rgb(150,195,104)] hover:text-white transition duration-200">Registre</a>
                    <a href="/login" class="font-inter p-2 px-9 text-[16px] text-black border-[#fcb666] border-2 rounded-[50px] font-normal hover:bg-[#fcb666] hover:text-white transition duration-200">Iniciar Sessió</a>
                </div>
            </div>
        </nav>
    </header>
    <section class="flex bg-slate-100 h-[100vh] ">
        <div class="w-[23%] bg-white h-[100%] overflow-auto overscroll-none border-r-2 p-2" >
            <?php foreach ($categories as $category): ?>
            <div class="btn">
                <div class="flex items-center gap-x-2 text-[20px] font-semibold mt-4">
                    <button  class="font-calistoga flex items-center gap-x-2 pt-[3px] pl-[20px] rounded-[50px] text-[17px] text-black opacity-[78%] font-light">
                        <img class="flecha w-[4%] h-[4%] mt-[1px] rotate-90 " src="../../img/categoria/flecha-correcta.png" alt="flecha"><img class="w-[11%] h-[11%] mt-[1px]" src="<?php echo htmlspecialchars($category['image']); ?>" alt="officialimage" id="officialimage"><?php echo htmlspecialchars($category['name']); ?>
                    </button>
                </div>
                <form action="/showspecificsubcategoriproduct" method="POST" id="<?php echo htmlspecialchars($category['name']); ?>-subcategories" class="hidden pl-[40px] mt-2 categoria">
                    <ul class="text-[14px] font-medium text-black cursor-pointer">
                        <?php foreach ($category['subcategories'] as $subcategory): ?>
                            <!-- Eliminar el enlace <a> y usar un botón dentro del <li> -->
                            <li class="pl-5 py-2 border-b-2 border-gray-300 hover:bg-[#e8e8e8]">
                                <button type="submit" name="subcategory" value="<?php echo urlencode($subcategory['id']); ?>" class="w-full text-left">
                                    <?php echo htmlspecialchars($subcategory['name']); ?>
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
        
            <!-- Product part -->
            <div class="flex justify-center w-full h-[100%] overflow-auto">
                <div>
                    <!-- Search part -->
                    <form action="/searchproductstateone" class="flex p-[40px]" method="POST">
                        <div>
                            <div class="relative flex items-center max-w-[800px]">
                                <img class="absolute w-5 h-5 left-2.5 " src="../../img/search/search.svg" alt="search">
                                <input name="name" class="bg-[#fefbf9] placeholder:text-black font-normal font-inter w-[400px] text-black text-[16px] border border-[#FCB666] rounded-[27px] pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] shadow-sm focus:shadow" placeholder="cerca el producte">
                            </div>
                        </div>
                    </form>
                    
                    <!-- Modal buscador -->
                    <?php if (!empty($noResults)): ?>
                        <div class="searchmodal fixed inset-0 flex justify-center items-center bg-gray-500 bg-opacity-50 z-50">
                            <div class="bg-white p-6 rounded-lg shadow-lg w-[32%]">
                                <h2 class="text-black font-calistoga text-[24px] font-bold mb-[10px] text-center">Sense resultats</h2>
                                <p class="font-inter text-black font-medium text-[16px] text-center">No s'han trobat productes amb aquest nom.</p>
                                <div class="flex justify-center">
                                    <a href="/productview" class="closesearchmodal font-inter bg-[#FCB666] mt-[10px] text-white text-[16px] font-medium p-[9px] rounded-[9px] transition-all hover:bg-[#ef9b3b] focus:outline-none">
                                        Tancar
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 px-10 pb-20">
                            <?php foreach ($products as $product) { ?>
                                <div class="shadow-lg w-[400px] h-auto rounded-[21px] bg-white p-[10px] mr-[30px] mx-auto flex flex-col justify-between items-center">
                                    <div class="flex flex-col items-start w-full h-full">
                                        <!-- Image -->
                                        <div class="w-full flex justify-center mb-3">
                                            <div class="w-[180px] h-[180px] flex mt-[15px] items-center justify-center">
                                                <img src="<?php echo $product->getImage() ?>" alt="image_bd" class="object-contain w-full h-full">                                    
                                            </div>
                                        </div>
                                        
                                        <!-- Name -->
                                        <div class="w-full text-left mt-[10px] min-h-[30px]">
                                            <p class="font-inter pl-[10px] text-[17px] font-bold text-black "><?php echo $product->getName(); ?></p>
                                        </div>
                                        
                                        <!-- Weight -->
                                        <div class="w-full text-left min-h-[30px]">
                                            <p class="font-inter pl-[10px] text-[16px] font-medium text-black opacity-50"><?php echo $product->getWeight();?></p>
                                        </div>
                                        
                                        <!-- Description -->
                                        <div class="w-full text-left mt-[10px] min-h-[100px]">
                                            <p class="font-inter pl-[10px] pr-[15px] text-[16px] text-justify font-normal text-black"><?php echo $product->getDescription(); ?>...</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Button -->
                                    <div class="w-full flex justify-center mt-4">
                                        <form action="/productindividual" method="POST" class="w-[90%]">
                                            <input type="hidden" name="id" value="<?php echo $product->getId(); ?>">
                                            <button type="submit" class="w-full mt-[15px] mb-[10px] text-center p-2 rounded-full bg-[#fcb666] text-white border-2 border-[#fcb666] hover:bg-white hover:text-[#fcb666] transition duration-300">
                                                Llegir més
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="../../js/category/category.js"></script>
    <!-- File show modal search -->
    <script src="../../js/modals/searchmodal.js"></script>
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
</body>