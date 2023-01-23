<?php
require_once "inc/header.php";
?>
<nav class="flex justify-between items-center w-screen px-4">
    <p class="text-[60px] logo">GlowGuru</p>
    <div class="flex flex-col gap-5">
        <span class="bg-black w-[40px] h-[1px]"></span>
        <span class="bg-black w-[40px] h-[1px]"></span>
    </div>
</nav>
<p class="my-8 text-center text-[30px] font-semibold">
    Category
</p>

<div class="my-8 text-center text-[20px] border-y-[2px] mx-8 py-10">
    /<span class="mx-3 cursor-pointer">shampo</span>
    /<span class="mx-3 cursor-pointer">lotion</span>
    /<span class="mx-3 cursor-pointer">creeme</span>/
</div>

<div class="flex justify-center items-centerflex-wrap p-4">
    <div class="w-fit">
        <img alt="test image" src="https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=400&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY3NDA3NzQwNA&ixlib=rb-4.0.3&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=300" />
        <div class="w-full mt-5 border-black border-[2px] p-2">
            <div class="w-full flex justify-between items-center font-semibold">
                <span>name</span>
                <span>10$</span>
            </div>
            <p class="mt-2 text-gray-700">description</p>
        </div>
    </div>
</div>
<?php
require_once "inc/footer.php";
?>