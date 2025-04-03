<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir producte</title>
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
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] font-bold mb-6 text-center">Afegir <span class="text-[#96c368] opacity-[100%]">producte</span></h1>
    </section>
    
    <form class="flex justify-center" action="/saveproduct" method="POST" enctype="multipart/form-data">
        <div class="w-[18%]">
            <!-- Name -->
            <div class="flex flex-col  mb-[15px]">
                <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Nom</label>
                <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="name" type="text" placeholder="escriu el nom">
                <p class="text-red-500 mt-[5px] font-inter hidden text-[15px]" id="error-name"></p>
            </div>

            <!-- Description -->
            <div class="flex flex-col  mb-[15px]">
                <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Descripció</label>
                <textarea class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="description" placeholder="escriu la descripció"></textarea>
                <p class="text-red-500 mt-[5px] font-inter hidden text-[15px]"  id="error-description"></p>
            </div>

            <!-- Price -->
            <div class="flex flex-col  mb-[15px]">
                <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Preu</label>
                <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="price" type="text" placeholder="escriu el preu">
                <p class="text-red-500 mt-[5px] font-inter hidden text-[15px]"  id="error-price"></p>
            </div>

            <!-- Ingredients -->
            <div class="flex flex-col  mb-[15px]">
                <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Ingredients</label>
                <textarea class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="ingredients" placeholder="escriu els ingredients"></textarea>
                <p class="text-red-500 mt-[5px] font-inter hidden text-[15px]"  id="error-ingredients"></p>
            </div>

            <!-- Nutritional information -->
            <div class="flex flex-col  mb-[15px]">
                <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Informació nutricional</label>
                <textarea class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="nutritionalinformation" placeholder="escriu la informació nutricional"></textarea>
                <p class="text-red-500 mt-[5px] font-inter hidden text-[15px]"  id="error-nutritionalinformation"></p>
            </div>

            <!-- Brand -->
            <div class="flex flex-col  mb-[15px]">
                <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Marca</label>
                <textarea class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="brand" placeholder="escriu la marca"></textarea>
                <p class="text-red-500 mt-[5px] font-inter hidden text-[15px]"  id="error-brand"></p>
            </div>

            <!-- Image-->
            <div class="flex flex-col mb-[15px]">
                <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Imatge</label>
                <!-- No mostrar l'input -->
                <input id="image" type="file" accept=".jpg, .jpeg, .png" name="image" class="hidden" onchange="previewImage()">
                
                <!-- Serveix per seleccionar la imatge-->
                <div id="image-trigger" class="relative p-[8px] border border-[#fcb666] rounded-[9px] flex items-center justify-center cursor-pointer">
                    <img src="../../img/uploadimage/imageupload.png" alt="upload" class="w-[12%] h-[12%]">    
                    <span class="pl-[5px] text-black text-[16px] font-inter font-normal">Clica per seleccionar una imatge</span>
                </div>
                
                <!-- Mostrarà la imatge amb el seu nom -->
                <div id="image-preview" class="mt-[10px] flex items-center hidden">
                    <img id="preview-img" src="../../img/uploadimage/imageupload.png" alt="imatge" class="w-[50px] h-[50px] object-cover rounded-[5px] mr-[10px]">
                    <span id="image-name" class="text-black text-[16px] font-normal"></span>
                </div>
                <p class="text-red-500 mt-[5px] font-inter hidden text-[15px]" id="error-image"></p> 
            </div>

            <!-- Weight -->
            <div class="flex flex-col  mb-[15px]">
                <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Pes</label>
                <input class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="weight"  type="text" placeholder="escriu el pes">
                <p class="text-red-500 mt-[5px] font-inter hidden text-[15px]" id="error-weight"></p>
            </div> 

            <!-- State -->
            <div class="flex flex-col  mb-[15px]">
                <label class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Estat</label>
                <select class="bg-white border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="state">
                    <option value="0">0</option>
                    <option value="1">1</option>
                </select>
                <p class="text-red-500 mt-[5px] font-inter hidden text-[15px]"  id="error-state"></p>
            </div> 
            
            <!-- Button -->
            <div class="flex flex-col mb-[15px]">
                <button class="font-inter bg-[#FCB666] text-[#f5f5f5] text-[16px] font-medium p-[8px] rounded-[9px] transition-all hover: focus:bg-[#ef9b3b] focus:shadow-none active:bg-[#ef9b3b] hover:bg-[#ef9b3b] disabled:pointer-events-none disabled:opacity-50">
                    Afegir producte
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
    
    <!-- Show images -->
    <script src="../../js/showimage/showimage.js"></script>
    
    <!-- File errors -->
    <script src="../../js/product/error-product.js"></script>
</body>
</html>