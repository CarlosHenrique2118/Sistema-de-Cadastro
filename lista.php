<?php

    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'dados';

    $con = mysqli_connect($servidor, $usuario, $senha, $banco) or die('Não foi possivel conectar: '. mysqli_connect_error($con));

    $sql = "SELECT * FROM carros";


?>
<html>
    <head>
        <link rel="stylesheet" href="main.css">
    </head>
    <body style="background-color: rgb(33, 32, 41);">
        <div>
            <h2 style="text-align:center;font-family: 'Times New Roman', Times, serif;color:rgb(230, 227, 227);">Carros Cadastrados</h2>
            <table style="background-color:rgb(230, 227, 227); margin-left: 420px; margin-top:20px;border:3px rgb(78, 74, 74) solid;width: 650px;">
                <tr>
                    <td style="border: 1px black solid;height:35px;text-align:center;font-size: 17px;font-weight: 7px;">Placa</td>
                    <td style="border: 1px black solid;height:35px;text-align:center;font-size: 17px;font-weight: 7px;">Modelo</td>
                    <td style="border: 1px black solid;height:35px;text-align:center;font-size: 17px;font-weight: 7px;">Cor</td>
                    <td style="border: 1px black solid;height:35px;text-align:center;font-size: 17px;font-weight: 7px;">Ano</td>
                    <td style="border: 1px black solid;height:35px;text-align:center;font-size: 17px;font-weight: 7px;">Status</td>
                    <td style="border: 1px black solid;height:35px;text-align:center;font-size: 17px;font-weight: 7px;">Ações</td>
                    
                </tr>

        <?php
            $result = mysqli_query($con, $sql);

            while ($reg = mysqli_fetch_array($result)){
                $placa = $reg["PLACA"];
                $modelo = $reg["MODELO"];
                $cor = $reg["COR"];
                $ano = $reg["ANO"];
                $status = $reg["STATUSS"];
                $id = $reg["ID"];
                
                echo "<TR>";
                echo "<TD style='border: 1px black solid;height:25px;text-align:center;font-size: 17px;font-weight: 7px;'> $placa </TD>";
                echo "<TD style='border: 1px black solid;height:25px;text-align:center;font-size: 17px;font-weight: 7px;'> $modelo </TD>";
                echo "<TD style='border: 1px black solid;height:25px;text-align:center;font-size: 17px;font-weight: 7px;'> $cor </TD>";
                echo "<TD style='border: 1px black solid;height:25px;text-align:center;font-size: 17px;font-weight: 7px;'> $ano </TD>";
                echo "<TD style='border: 1px black solid;height:25px;text-align:center;font-size: 17px;font-weight: 7px;'> $status </TD>";
                
                echo "<TD style='border: 1px black solid;height:25px;text-align:center;font-size: 17px;font-weight: 7px;'>";
                echo "<a href='inserir.php?acao=editar&buscaid=$id'>";
                echo "<img src='https://cdn.iconscout.com/icon/free/png-256/edit-file-1676928-1440334.png' width='18' height='18'> </a>";
                echo "<a href='gerenciador.php?acao=excluir&buscaid=$id'>";
                echo "<img src='https://icons.veryicon.com/png/o/miscellaneous/dx-meeh/delete-trash-3.png' width='18' height='18'> </a>";
                echo "</TD style='border: 1px black solid;height:25px;text-align:center;font-size: 17px;font-weight: 7px;'>";
                echo "</TR>";
            }
        ?>
            </table>
        </div>
        <br>
        <button style="background-color:rgb(230, 227, 227);height: 35px;width: 110px; margin-left:960px" ><a href="inserir.php" style="color:rgb(72, 70, 91); text-decoration: none;" >Inserir</a></button>
    </body>
</html>
