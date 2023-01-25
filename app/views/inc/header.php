<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <title>GlowGuru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style type="text/css">
        @font-face {
            font-family: diamant;
            src: url("http://localhost:9000/public/src/fonts/Fontaine de Diamant.ttf");
        }

        .logo {
            font-family: "diamant";
        }

        body {
            font-family: "Quicksand";
        }

        .width {
            width: calc(100vw - 150px);
        }

        .height {
            height: calc(100vh - 50px);
        }

        .bounce {
            animation-name: bounce;
            animation-duration: 2s;
            animation-iteration-count: infinite;
        }

        @keyframes bounce {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(10px);
            }

            100% {
                transform: translateX(0px);
            }
        }
    </style>
</head>

<body>
    <div class="hidden menu absolute w-full h-full top-[0%] left-[0%] z-50 bg-cover bg-[url('https://images.unsplash.com/photo-1536924430914-91f9e2041b83?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=1000&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY3NDQ4MDUwMg&ixlib=rb-4.0.3&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=1500')]">
        <div class="w-full px-4 mt-[-20px] flex justify-between items-center">
            <p class="text-[60px] text-white logo">GlowGuru</p>
            <p class="text-white max-[600px]:text-[40px] text-[60px] font-thin close">x</p>
        </div>

        <div class="flex flex-col justify-center items-center gap-6 text-white font-bold text-[50px] mt-10 max-[600px]:text-[30px]">
            <a href="/">Home</a>
            <a href="/product">Product</a>
            <a href="/Login">Login</a>
        </div>
    </div>