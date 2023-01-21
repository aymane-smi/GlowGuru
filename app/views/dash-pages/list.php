<div class="flex justify-center items-center width flex-wrap gap-10">
    <div class="p-5 rounded-md bg-blue-200 flex flex-col">
        <p class="font-semibold">
            <i class="fa-solid fa-box"></i> Nombre de Produit
        </p>
        <p class="font-extrabold">0</p>
    </div>
    <div class="p-5 rounded-md bg-cyan-200 flex flex-col">
        <p class="font-semibold">
            <i class="fa-solid fa-user"></i> Nombre d'Administrateur
        </p>
        <p class="font-extrabold">0</p>
    </div>
</div>
<div class="p-5 width">
    <div class="grid grid-cols-5 text-white font-semibold">
        <div class="flex justify-center items-center bg-blue-400 rounded-sm py-5">Image</div>
        <div class="flex justify-center items-center bg-blue-400 rounded-sm">Name</div>
        <div class="flex justify-center items-center bg-blue-400 rounded-sm">Category</div>
        <div class="flex justify-center items-center bg-blue-400 rounded-sm">Price</div>
        <div class="flex justify-center items-center bg-blue-400 rounded-sm">Description</div>
    </div>
    <?php

    foreach ($data["products"] as $product) {
    ?>
        <div class="grid grid-cols-5 border-[2px] rounded-md font-semibold mt-2 p-3">
            <div class="flex justify-center items-center">
                <img class="w-[80px] h-[80px] rouneded-[50%]" alt="image alternative" src="http://localhost:9000/src/assets/<?php echo $product->image; ?>" />
            </div>
            <div class="flex justify-center items-center rounded-sm">
                <?php
                echo $product->name;
                ?>
            </div>
            <div class="flex justify-center items-center rounded-sm">
                <?php
                echo $product->category;
                ?>
            </div>
            <div class="flex justify-center items-center rounded-sm">
                <?php
                echo $product->price;
                ?>
            </div>
            <div class="flex justify-center items-center rounded-sm">
                <?php
                echo $product->description;
                ?>
            </div>
        </div>
    <?php
    }
    ?>

</div>
<div>
</div>