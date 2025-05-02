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
</head>
<body>
    <header>
        <nav>
            <a href="/manager">
                <img class="pl-[20px] pt-[20px] w-[9%] h-[9%]" src="../../img/logo/logo.png" alt="">
            </a>
            <div class="p-1 space-y-0.5">
                <a class="font-calistoga flex items-center gap-x-2 pt-[10px] pl-[20px] rounded-[50px] text-[24px] text-black opacity-[78%] font-light" href="/productmanager">
                    <img class="w-[1.8%] h-[1.8%]" src="../../img/home/home.png" alt="home">
                    Tornar al panel de control
                </a>
            </div>
        </nav>
    </header>

    <section>
        <h1 class="text-black font-calistoga opacity-[78%] text-[45px] text-center pt-[26px] font-bold">Veure <span class="text-[#96c368] opacity-[100%]">imatges</span></h1>
        <div class="grid grid-cols-4 gap-[14px] justify-center mt-[26px] mb-[20px]">
            <?php foreach ($categories as $category) { ?>
                <div class="shadow-lg w-[300px] h-[310px] rounded-[21px] bg-white p-[10px] mx-auto flex flex-col items-center">
                    <div class="w-full flex justify-center mb-3">
                        <div class="w-[180px] h-[180px] flex items-center justify-center">
                        <img src="<?php echo $category->getImage() ?>" alt="image_bd" class="object-contain w-full h-full">
                        </div>
                    </div>
                    <div class="w-full text-left mt-[10px]">
                        <div class="flex">
                            <p class="font-inter pl-[10px] text-[19px] font-bold text-black">Id:</p>
                            <p class="font-inter pl-[5px] text-[19px] font-medium text-black"><?php echo $category->getId(); ?></p>
                        </div>
                        <div class="flex">
                            <p class="font-inter pl-[10px] text-[19px] font-bold text-black">Nom:</p>
                            <p class="font-inter pl-[5px] text-[19px] font-medium text-black"><?php echo $category->getName(); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</body>
</html>