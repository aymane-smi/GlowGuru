<?php
require_once "inc/header.php";
?>
<!-- <nav class="flex justify-between items-center top-[-20px] w-screen px-4">
    <p class="text-[60px] logo">GlowGuru</p>
</nav> -->
<div class="flex">
    <nav class="h-screen w-[100px] p-4 bg-blue-200 flex flex-col justify-center items-center gap-8">
        <a class="text-[30px] hover:bg-white rounded-md p-4 transition duration-300 ease-in cursor-pointer get-list">
            <i class="fa-solid fa-list"></i>
        </a>
        <a class="text-[30px] hover:bg-white rounded-md p-4 transition duration-300 ease-in cursor-pointer get-add">
            <i class="fa-solid fa-plus"></i>
        </a>
        <a class="text-[30px] hover:bg-white rounded-md p-4 transition duration-300 ease-in cursor-pointer get-settings">
            <i class="fa-solid fa-gear"></i>
        </a>
        <form action="http://localhost:9000/Dashboard/logout" method="POST">
            <button class="text-[30px] hover:bg-white rounded-md p-4 transition duration-300 ease-in">
                <i class="fa-solid fa-right-from-bracket"></i>
            </button>
        </form>
    </nav>
    <div class="p-4">
        <div class="lists overflow-y-scroll height">
            <?php
            require_once "dash-pages/list.php";
            ?>
        </div>
        <div class="p-4 overflow-y-scroll height hidden add">
            <?php
            require_once "dash-pages/add.php";
            ?>
        </div>
        <div class="p-4 hidden setting">
            <?php
            require_once "dash-pages/settings.php";
            ?>
        </div>
    </div>
</div>
<?php
require_once "inc/footer.php";
?>