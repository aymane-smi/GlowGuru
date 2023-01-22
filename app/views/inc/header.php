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
            width: calc(100vw - 200px);
        }

        .height{
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