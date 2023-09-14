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
    <title>Document</title>
</head>
<body>
<div class="tabela">
        <table class="">
            <thead>
                <tr>
                    <th scope="col" class='cell-head hash'>ID:</th>
                    <th scope="col" class='cell-head'>Nome:</th>
                    
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


</body>
</html>