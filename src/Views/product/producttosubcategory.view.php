<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignar producte a subcategoria</title>
    <link href="./src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="shortcut icon"  href="../../img/logo/logocelifind.png" type="image/x-icon">
</head>
<body>
    <header class="pb-[15px] border-b border-gray-300">
        <nav>
            <a href="/manager" class="block w-fit"> 
                <img class="ml-[20px] w-32 pt-[20px]" src="../../img/logo/logo.png" alt="logoimg">
            </a>
        </nav>
    </header>
    
    <section class="bg-slate-100 pt-[10px] pb-[20px]">
        <div class="p-1 space-y-0.5">
            <a href="/productmanager" class="inline-flex items-center ml-2 md:ml-4 lg:ml-4">
                <img class="w-8 h-8 sm:w-8 sm:h-8 md:w-8 md:h-8 lg:w-8 lg:h-8" src="../../img/home/home.png" alt="Icona casa">
                <span class="pl-2 font-calistoga text-[24px] sm:text-2xl md:text-[24px] lg:text-[24px] text-black opacity-80 font-light">Tornar al panel de controll</span>
            </a>
        </div>
        
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] font-bold mb-6 text-center">Assignar producte <span class="text-[#96c368] opacity-[100%]">a subcategoria</span></h1>
        
        <form class="flex justify-center" action="/addProducttoSubcategory" method="POST">
            <div class="w-[18%]">
                <!-- Product -->
                <div class="flex flex-col  mb-[15px]">
                    <label for="name" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Producte</label>
                    <select name="product" class="bg-white border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow">
                        <option value="">Selecciona un producte</option>
                        <?php foreach($products as $product):?>
                        <option value="<?php echo $product->getId(); ?>"><?php echo $product->getName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p class="text-red-500 mt-[5px] font-inter hidden text-[15px]" id="error-product"></p>
                </div>
                <!-- Subcategory -->
                <div class="flex flex-col  mb-[15px]">
                    <label for="name" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Subcategoria</label>
                    <select name="subcategory" class="bg-white border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow">
                        <option value="">Selecciona una subcategoria</option>
                        <?php foreach($subcategories as $subcategory):?>
                        <option value="<?php echo $subcategory['id']; ?>"><?php echo $subcategory['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p class="text-red-500 mt-[5px] font-inter hidden text-[15px]" id="error-subcategory"></p>
                </div>
                <!-- Button -->
                <div class="flex flex-col mb-[15px]">
                    <button class="font-inter bg-[#FCB666] text-[#f5f5f5] text-[16px] font-medium p-[8px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50" type="submit">
                            Assignar producte a subcategoria
                    </button> 
                </div>
            </div>
        </form>
    </section>
    
    <!-- Start the session to catch the errors -->
    <?php
        session_start();
        if (!empty($_SESSION['errors'])) {
            $serverErrors = $_SESSION['errors'];
            unset($_SESSION['errors']);
        } else {
            $serverErrors = [];
        }
    ?>
    
    <script>
        var serverErrors = <?php echo json_encode($serverErrors); ?>;
    </script>
    
    <!-- File errors -->
    <script src="../../js/product/error-product-subcategory.js"></script>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
</body>
</html>