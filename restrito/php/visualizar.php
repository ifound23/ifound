<?php
require_once 'conexao.php';

$sql = "SELECT id, nome FROM ifound";
$result = $conn->query($sql);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Acme&family=Dancing+Script&family=Kanit&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="tabela">
        <table class="">
            <thead>
                <tr>
                    <th scope="col" class='cell-head hash'>ID :</th>
                    <th scope="col" class='cell-head'>Nome :</th>
                    
                </tr>
            </thead>
        <tbody>
            <?php
                while($user_data = mysqli_fetch_assoc($result))
                {
                    echo"<tr class='tab'>";
                    echo"<td class='cell-id'>" .$user_data['id']."</td>";
                    echo "<td class='cell-id'>" . $user_data['nome'] . "</td>";   
                    echo "</tr>";
                }
            ?>
        </tbody>
        </table>
        <a href="../html/cadastro.html" name="Voltar" class="botao">Voltar</a>
 </div>

 <style>
        body {
            background-color: black;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-size:30px;

            text-align : center;
        }
        div.tabela {
            background-color: black;
            font-family: 'Acme', sans-serif;
            color: white;
            transition:180ms;
        }
        a.botao{
            text-decoration: none;
            font-size:22px;
            color: white;
            text-decoration: none;
            border-bottom : solid 2px #000000;
            transition:180ms;
        }

        a.botao:hover{
            text-decoration: none;
            font-size:22px;
            color: white;
            border-bottom : solid 2px #ffffff;
            transition:180ms;
        }

    </style>

</body>
</html>