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
    
    <section class="bg-gray-100 pt-[10px] pb-[20px]">
        <div class="p-1 space-y-0.5">
            <a href="/subcategory" class="inline-flex items-center ml-2 md:ml-4 lg:ml-4">
                <img class="w-8 h-8 sm:w-8 sm:h-8 md:w-8 md:h-8 lg:w-8 lg:h-8" src="../../img/home/home.png" alt="Icona casa">
                <span class="pl-2 font-calistoga text-[24px] sm:text-2xl md:text-[24px] lg:text-[24px] text-black opacity-80 font-light">Tornar al panel de control</span>
            </a>
        </div>
        
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] font-bold mb-6 text-center">Actualitzar <span class="text-[#96c368] opacity-[100%]">subcategoria</span></h1>
        <form class="flex justify-center" action="/updatesubcategory" method="POST" enctype="multipart/form-data">
            <?php $subcategory = $subcategory; ?>
            <input type="hidden" name="id" value="<?= $formData['id'] ?? '' ?>">
            
            <div class="w-[18%]">
                <!-- Name -->
                <div class="flex flex-col  mb-[15px]">
                        <label for="name" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Nom</label>
                        <input name="name" type="text" value="<?= $formData['name'] ?? '' ?>" class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black font-normal text-[16px] font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" placeholder="Introdueix el nom">
                        <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['name'] ?? '' ?></p>
                    </div>
                    
                    <!-- Description -->
                    <div class="flex flex-col  mb-[15px]">
                        <label for="description" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Descripció</label>
                        <textarea name="description" class="border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" placeholder="escriu la descripció"><?= $formData['description'] ?? '' ?></textarea>
                        <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['description'] ?? '' ?></p>
                    </div>
                    
                    <!-- Select Categories -->
                    <div class="flex flex-col  mb-[15px]">
                        <label for="idcategoria" class="mb-[4px] text-left text-black font-calistoga opacity-[78%] text-[20px] font-normal">Categoria</label>
                        <select class=" bg-white border border-[#fcb666] rounded-[9px] p-[8px] placeholder:text-black text-[16px] font-normal font-inter transition duration-300 ease focus:outline-none focus:border-[#ef9b3b] hover:border-[#ef9b3b] focus:shadow" name="idcategoria" id="idcategoria">    
                        <option <?= $formData['idcategoria'] ?? '' ?> selected disabled hidden>Selecciona una categoria</option>
                            <?php if (!empty($categories)): ?>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <p class="text-red-500 mt-[5px] font-inter text-[15px]"><?= $errors['idcategoria'] ?? '' ?></p>
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
    
    <!-- Show images -->
    <script src="../../js/showimage/showimage.js"></script>
    
    <!-- File errors -->
    <script src="../../js/subcategory/error-subcategory.js"></script>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
</body>
</html>