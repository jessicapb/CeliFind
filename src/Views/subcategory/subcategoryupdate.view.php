<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualitzar Subcategoria</title>
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
                <a class="font-calistoga flex items-center gap-x-2 pt-[10px] pl-[20px] rounded-[50px] text-[24px] text-black opacity-[78%] font-light" href="/subcategory">
                    <img class="w-[1.8%] h-[1.8%]" src="../../img/home/home.png" alt="">
                    Tornar al panel de control
                </a>
            </div>
        </nav>
    </header>
    <section>
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] font-bold mb-6 text-center">Actualitzar <span class="text-[#96c368] opacity-[100%]">subcategoria</span></h1>
    </section>
    <form class="flex justify-center" action="/updatesubcategory" method="POST" enctype="multipart/form-data">
    <?php $subcategory = $subcategory; ?>
    <input type="hidden" name="id" value="<?php echo $subcategory->getId(); ?>">

    <div class="w-[18%]">
        <!-- Name -->
        <div class="flex flex-col  mb-[15px]">
                <label for="name" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Nom</label>
                <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="name" type="text" value="<?php echo $subcategory->getName(); ?>" placeholder="Introdueix el nom">
                <p id="error-name" class="text-red-500 mt-[5px] font-inter hidden text-[15px]"></p>
            </div>

            <!-- Description -->
            <div class="flex flex-col  mb-[15px]">
                <label for="description" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Descripció</label>
                <textarea class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="description" type="text-area" placeholder="escriu la descripció"><?php echo $subcategory->getDescription(); ?></textarea>
                <p id="error-description" class="text-red-500 mt-[5px] font-inter hidden text-[15px]"></p>
            </div>

            <!-- Select Categories -->
            <div class="flex flex-col  mb-[15px]">
                <label for="idcategoria" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Categoria</label>

                <select class=" bg-white border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="idcategoria" id="idcategoria">    
                <option value="<?php echo $subcategory->getIdcategoria(); ?>" selected disabled hidden>Selecciona una categoria</option>
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <p id="error-idcategoria" class="text-red-500 mt-[5px] font-inter hidden text-[15px]"></p>
            </div>

        <!-- Button -->
        <div class="flex flex-col mb-[15px]">
            <button type="submit"
                class="font-inter bg-[#FCB666] text-[#f5f5f5] text-[16px] font-medium p-[8px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                Actualitzar Subcategoria
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
    
    <script>
        var serverErrors = <?php echo json_encode($serverErrors); ?>;
    </script>
    
    <!-- File errors -->
    <script src="../../js/subcategory/error-subcategory.js"></script>
</body>
</html>