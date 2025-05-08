<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veure imatges</title>
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
    
    <section class="bg-slate-100 pt-[10px]">
        <div class="p-1 space-y-0.5">
            <a href="/productmanager" class="inline-flex items-center ml-2 md:ml-4 lg:ml-4">
                <img class="w-8 h-8 sm:w-8 sm:h-8 md:w-8 md:h-8 lg:w-8 lg:h-8" src="../../img/home/home.png" alt="Icona casa">
                <span class="pl-2 font-calistoga text-[24px] sm:text-2xl md:text-[24px] lg:text-[24px] text-black opacity-80 font-light">Tornar al panel de controll</span>
            </a>
        </div>
        
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] text-center pt-[26px] font-bold">Veure <span class="text-[#96c368] opacity-[100%]">imatges</span></h1>
        <div class="flex flex-wrap gap-5 p-[50px] items-center xl:flex lg:flex md:flex sm:flex justify-center">
            <?php foreach ($products as $product): ?>
                <div class="border border-gray-300 p-5 w-[300px] h-[300px] flex flex-col items-center justify-center rounded-xl shadow-md">
                    <div class="w-[180px] h-[180px] flex items-center justify-center mb-4">
                        <img src="<?= $product->getImage() ?>" alt="Imagen del producto" class="object-contain w-full h-full rounded-md">
                    </div>
                    
                    <div class="space-y-2">
                        <div class="flex">
                            <p class="font-inter text-[19px] font-bold text-black">Id:</p>
                            <p class="font-inter text-[19px] font-medium text-black ml-2"><?= $product->getId(); ?></p>
                        </div>
                        <div class="flex">
                            <p class="font-inter text-[19px] font-bold text-black">Nom:</p>
                            <p class="font-inter text-[19px] font-medium text-black ml-2"><?= $product->getName(); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    
    <!--Footer section!-->
    <?php include 'src/Views/parts/footer/footer.view.php'?>
</body>
</html>