<?php
require_once "inc/header.php";
?>
<main class="w-full flex h-screen">
    <div class="w-1/2 flex flex-col justify-start items-center h-fit mt-[5%] max-[780px]:w-full">
        <a href="/" class="text-[60px] text-black logo max-[780px]:text-[40px]">GlowGuru</a>
        <form action="http://localhost:9000/Login/handleLogin" method="POST" class="mt-10 flex flex-col justify-center items-center gap-10">
            <input id="username" type="text" name="username" class="max-[780px]:w-[200px] w-[300px] p-3 border-b-[1px] border-gray-400 focus:outline-none" placeholder="username" />
            <input id="password" type="password" name="password" class="max-[780px]:w-[200px] w-[300px] p-3 border-b-[1px] border-gray-400 focus:outline-none" placeholder="password" />
            <button class="max-[780px]:w-[200px] w-[300px] p-3 bg-black text-white font-semibold rounded-md">Connecter</button>
        </form>
        <?php
        if (isset($_SESSION["login_err"])) {
        ?>
            <p class="text-red-500 mt-5">
                <?php
                echo $_SESSION["login_err"];
                $_SESSION["login_err"] = "";
                ?>
            </p>
        <?php
        }
        ?>
    </div>
    <img class="w-1/2 h-screen max-[780px]:hidden" alt="login image" src="https://images.unsplash.com/photo-1555820585-c5ae44394b79?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=800&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY3NDExNzY2OA&ixlib=rb-4.0.3&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=800" />
</main>
<?php
require_once "inc/footer.php";
?>