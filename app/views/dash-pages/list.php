<form class="popup hidden absolute border top-[20%] left-[45vw] shadow-xl rounded-md w-fit h-fit flex flex-col  justify-start items-center bg-white p-4 gap-5">
    <div class="flex flex-col gap-2">
        <label for="name" class="font-semibold">Name</label>
        <input class="p-2 border-2 rounded-md popup-name" type="text" name="name[]" required id="name" />
    </div>
    <div class="flex flex-col gap-2">
        <label for="price" class="font-semibold">Price</label>
        <input class="p-2 border-2 rounded-md popup-price" type="text" name="price[]" required id="price" />
    </div>
    <div class="flex flex-col gap-2">
        <label for="category" class="font-semibold">Category</label>
        <select name="category[]" required class="p-2 bg-white border-2 rounded-md popup-category" id="category">
            <option value="shampo" selected>Shampo</option>
            <option value="lotion">lotion</option>
            <option value="creeme">creeme</option>
        </select>
    </div>
    <div class="flex flex-col gap-2">
        <label class="font-semibold" for="description">Description</label>
        <textarea name="description[]" required class="p-2 bg-white border-2 rounded-md popup-description"></textarea>
    </div>
    <input type="hidden" name="id" class="popup-id" />
    <button class="p-2 text-white bg-green-500 rounded-md">edit</button>
</form>
<div class="flex justify-center items-center width flex-wrap gap-10 max-[1000px]:flex-col">
    <div class="p-5 rounded-md bg-blue-200 flex flex-col max-[1000px]:w-full">
        <p class="font-semibold">
            <i class="fa-solid fa-box"></i> Nombre de Produit
        </p>
        <p class="font-extrabold count-products"><?php echo count($data["products"]); ?></p>
    </div>
    <div class="p-5 rounded-md bg-cyan-200 flex flex-col max-[1000px]:w-full">
        <p class="font-semibold">
            <i class="fa-solid fa-user"></i> Nombre d'Administrateur
        </p>
        <p class="font-extrabold">0</p>
    </div>
</div>
<div class="p-5 width list-container">
    <div class="table-head grid grid-rows-1 grid-cols-6 text-white font-semibold max-[1000px]:grid-cols-1 max-[1000px]:grid-rows-6">
        <div class="flex justify-center items-center bg-blue-400 rounded-t-sm py-5">Image</div>
        <div class="flex justify-center items-center bg-blue-400 ">Name</div>
        <div class="flex justify-center items-center bg-blue-400 ">Category</div>
        <div class="flex justify-center items-center bg-blue-400 ">Price</div>
        <div class="flex justify-center items-center bg-blue-400 ">Description</div>
        <div class="flex justify-center items-center bg-blue-400 rounded-b-sm">Action</div>
    </div>
    <?php

    for ($i = 0; $i < count($data["products"]); $i++) {
    ?>
        <div class="list-<?php echo $data["products"][$i]->id; ?> grid grid-cols-6 border-[2px] rounded-md font-semibold mt-2 p-3 <?php if ($i % 2) echo "bg-gray-100" ?> max-[1000px]:grid-cols-1 max-[1000px]:grid-rows-6">
            <div class="flex justify-center items-center">
                <img class="w-[80px] h-[80px] rouneded-[50%]" alt="image alternative" src="http://localhost:9000/public/src/images/<?php echo $data["products"][$i]->image; ?>" />
            </div>
            <div class="flex justify-center items-center rounded-sm max-[1000px]:border-t-[2px]">
                <?php
                echo $data["products"][$i]->name;
                ?>
            </div>
            <div class="flex justify-center items-center rounded-sm max-[1000px]:border-t-[2px]">
                <?php
                echo $data["products"][$i]->category;
                ?>
            </div>
            <div class="flex justify-center items-center rounded-sm max-[1000px]:border-t-[2px]">
                <?php
                echo $data["products"][$i]->price;
                ?>
            </div>
            <div class="flex justify-center items-center rounded-sm max-[1000px]:border-t-[2px]">
                <?php
                echo $data["products"][$i]->description;
                ?>
            </div>
            <div class="flex justify-center items-center rounded-sm gap-5 max-[1000px]:border-t-[2px]">
                <div class="p-2 bg-orange-500 text-white rounded-md clicked-list" id="<?php echo $data["products"][$i]->id; ?>">
                    <i class="fa-solid fa-pen" id="<?php echo $data["products"][$i]->id; ?>"></i>
                </div>
                <form class="p-2 bg-red-500 text-white rounded-md delete">
                    <input type="hidden" name="delete-id" value="<?php echo $data["products"][$i]->id; ?>" />
                    <button>
                        <i class="fa-solid fa-trash delete"></i>
                    </button>
                </form>
            </div>
        </div>
    <?php
    }
    ?>

</div>
<div>
</div>