<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="formStyle.css" media="screen" />
    <link rel="stylesheet" href="settings.scss">
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

<body class="bg-black align-content-center justify-content-center d-flex">

    <div id="container-1" class="container">
        <div id="content-1 text-white">
            <!-- Conteúdo da div #content-1 -->
            <ul class="list-group text-black container-fluid" id="logo-background"
                style="font-family: 'Lato'; font-weight: 600; font-size: 30px; line-height: 74px;">

                <li class="text-decoration-none list-unstyled text-white">
                    <form action="processar_cadastro.php" method="POST">
                        <label for="id ">ID :</label><input class="" type="text" name="id" id="id" required>

                        <input type="submit" value="Cadastrar">
                    </form>
                </li>

                <a href="restrita.html" class="text-white" id="avoltar"
                    style="font-size: 25px; text-decoration: none;">&lt;Voltar</a>
                <style>
                    li#rest-option {
                        transition: 280ms;
                    }

                    li#rest-option:hover {
                        cursor: pointer;
                        text-shadow: 4px 4px 0px rgb(96, 184, 255), 8px 8px 0px rgb(57, 106, 255);
                        transform: translateY(-0.6em);
                        transform: translateX(-0.2em);
                        transition: 280ms;
                    }

                    a#rest-option-d {
                        text-decoration: none;
                        transition: 280ms;
                    }

                    a#rest-option-d:hover {
                        cursor: pointer;
                        text-shadow: 4px 4px 0px rgb(96, 184, 255), 8px 8px 0px rgb(57, 106, 255);
                        transform: translate(-0.1em);
                        transition: 280ms;
                    }

                    a#avoltar {
                        transition: 280ms;
                    }

                    a#avoltar:hover {
                        cursor: pointer;
                        text-shadow: 2px 2px 0px rgb(96, 184, 255), 4px 4px 0px rgb(57, 106, 255);
                        transform: translate(-0.1em);
                        transition: 280ms;
                    }
                </style>
            </ul>
        </div>
        <div id="form-1"
            class=" p-5 position-relative d-flex flex-column justify-content-center align-items-center rounded-6 border-1"
            style="height: 300px; color: white;">
            <!-- Conteúdo da div #form-1 -->
            <h1 class="text-center text-white" style="font-family: 'Raleway';">AREA RESTRITA</h1>
            <img src="./img-main-page/logo_remake.jpg" alt="" class="w-75 d-flex"
                style="filter: invert(1); margin-top:-30px;" id="ifound-forms">
        </div>
    </div>

    <script src="./reveal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>