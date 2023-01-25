<?php
require_once "inc/header.php";
?>
<nav class="flex justify-between items-center w-screen px-4">
    <p class="text-[60px] logo">GlowGuru</p>
    <div class="flex flex-col gap-5 open">
        <span class="bg-black w-[40px]">
            <span class="bg-black w-[40px] h-[2px]"></span>
            <span class="bg-black w-[40px] h-[1px]"></span>
    </div>
</nav>
<p class=" text-center text-[30px] font-semibold">
    Category
</p>

<div class="my-8 text-center text-[20px] border-y-[2px] mx-8 py-10">
    <div>
        <span class="mx-3 cursor-pointer shampo">shampo</span>
        /<span class="mx-3 cursor-pointer lotion">lotion</span>
        /<span class="mx-3 cursor-pointer creeme">creeme</span>
        /<span class="mx-3 cursor-pointer all">all</span>
    </div>
    <input type="text" name="search" class="border-[3px] rounded-md p-3 mt-4 w-[300px] max-[500px]:w-[250px]" placeholder="search..." />
</div>

<div class="flex justify-center items-center flex-wrap p-4 container gap-4">
    <?php
    foreach ($data["products"] as $product) {
    ?>
        <div class="<-fit">
            <img class="w-[300px] h-[350px]" alt="test image" src="http://localhost:9000/public/src/images/<?php echo $product->image; ?>" />
            <div class="w-full mt-5 border-black border-[2px] p-2">
                <div class="w-full flex justify-between items-center font-semibold">
                    <span><?php echo $product->name; ?></span>
                    <span><?php echo $product->price; ?>$</span>
                </div>
                <p class="mt-2 text-gray-700"><?php echo $product->description; ?></p>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
require_once "inc/footer.php";
?>