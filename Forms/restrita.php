<?php
session_start();
require 'connectionDB.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="formStyle.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Raleway:wght@700&family=Rubik:wght@300;400;500&display=swap"
        rel="stylesheet">

    <style>
        #container-1 {
            display: flex;
            justify-content: space-around;
            flex-direction: row;
            align-items: center;
        }
    </style>
    <title>Document</title>
</head>

<body class="container-fluid align-content-center justify-content-center d-flex" style="background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(255,255,255,1) 100%);">

    <nav class="navbar-black bg-black navbar-vertical show">
        <a class="navbar-brand text-white" href="#">IFOUND</a>
        <button class="navbar-toggler ml-auto " type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-white" href="#">CADASTRO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">DISPOSITIVOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="./login.php">&lt;voltar</a>
            </li>
        </ul>
    </nav>
    
    <img src="../img-main-page/logo_remake.jpg" alt="" class="w-50">
    <span class=""></span>

    
    <style>
        .navbar-vertical {
            width: 200px;
            height: 100vh;
            padding: 0.5rem 1rem;
            position: absolute;
            transition: left 0.31s;
            left: 0;
            top: 0;
        }

        .navbar-vertical .navbar-brand {
            margin-right: 0;
            padding-right: 1.5rem;
            display: block;
        }

        .navbar-vertical .navbar-toggler {
            border: none;
            padding: 0;
            display: inline-block;
            position: absolute;
            right: 0.5rem;
            top: 0.75rem;
            cursor: pointer;
        }

        .navbar-vertical ul.navbar-nav {
            width: 100%;
            margin-top: 1rem;
        }

        .navbar-vertical.show {
            left: 0;
        }

        .navbar-vertical.hidden {
            left: -276px;
        }
    </style>

    <script src="./reveal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>