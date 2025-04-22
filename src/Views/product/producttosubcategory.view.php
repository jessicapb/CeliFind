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
</head>
<body>
    <header>
        <nav>
            <a href="/manager">
                <img class="pl-[20px] pt-[20px] w-[9%] h-[9%]" src="../../img/logo/logo.png" alt="">
            </a>
            <div class="p-1 space-y-0.5">
                <a class="font-calistoga flex items-center gap-x-2 pt-[10px] pl-[20px] rounded-[50px] text-[24px] text-black opacity-[78%] font-light" href="/productmanager">
                    <img class="w-[1.8%] h-[1.8%]" src="../../img/home/home.png" alt="">
                    Tornar al panel de control
                </a>
            </div>
        </nav>
    </header>
    <section>
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] font-bold mb-6 text-center">Assignar producte <span class="text-[#96c368] opacity-[100%]">a subcategoria</span></h1>
    </section>
    
    <form class="flex justify-center" action="/saveproduct" method="POST">
        <div class="w-[18%]">
            <!-- Product -->
            <div class="flex flex-col  mb-[15px]">
                <label for="name" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Producte</label>
                <select name="product" class="bg-white border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow">
                    <option value="">Selecciona un producte</option>
                    <?php foreach($products as $product): ?>
                    <option value="<?php echo $product->getId(); ?>"><?php echo $product->getName(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Subcategory -->
            <div class="flex flex-col  mb-[15px]">
                <label for="name" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Subcategoria</label>
                <select name="subcategory" class="bg-white border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow">
                    <option value="">Selecciona una subcategoria</option>
                    <option value=""></option>
                </select>
            </div>
            <!-- Button -->
            <div class="flex flex-col mb-[15px]">
                <button class="font-inter bg-[#FCB666] text-[#f5f5f5] text-[16px] font-medium p-[8px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50" href="" type="button">
                        Assignar producte a subcategoria
                </button> 
            </div>
        </div>
    </form>

    <!-- Show images -->
    <script src="../../js/showimage/showimage.js"></script>
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

    <!-- File errors -->
    <script src="../../js/product/error-product.js"></script>
</body>
</html>