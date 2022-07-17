<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Gerenciador</title>
</head>
<body>
    
</body>
</html>

<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'dados';

    $con = mysqli_connect($servidor, $usuario, $senha, $banco) or die('Não foi possivel conectar: '. mysqli_connect_error($con));

     if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == 'adicionar'){
         $sql = "INSERT INTO carros (PLACA, MODELO, COR, ANO, STATUSS) VALUES (" ;
         $sql .= "'".$_POST['placacarro'] . "',";
         $sql .= "'".$_POST['modelocarro'] . "',";
         $sql .= "'".$_POST['corcarro'] . "',";
         $sql .= "'".$_POST['anocarro'] . "',";
         $sql .= "'".$_POST['statuscarro'] . "')";

         //echo($sql);

        $result = mysqli_query($con, $sql);

        if(!$result){
            die("Erro: ". mysqli_error($con));
        }else{
            echo "<style> .resul{
            margin-left: 550px;
            margin-top: 15%;  
            } 
            .resul img{
            margin-left: 150px;
            width: 100px;
            height: 100px;
            }</style>";
            echo "<div class='resul'>
            <img src='conclu.png'>
            <h2 style='color:rgb(230, 227, 227);'> A operação foi realizada com sucesso! </h2>
            </div>";
        }

     }else if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == 'alterar'){
        $sql = "UPDATE carros SET ";
        $sql .= "PLACA ='".$_POST["placacarro"]."',";
        $sql .= "MODELO ='".$_POST["modelocarro"]."',";
        $sql .= "COR ='".$_POST["corcarro"]."',";
        $sql .= "ANO ='".$_POST["anocarro"]."',";
        $sql .= "STATUSS ='".$_POST["statuscarro"]."'";
        $sql .= "WHERE ID = ".$_POST["codcarro"];    
        
        $result = mysqli_query($con, $sql);

        if(!$result){
            die("Erro: ". mysqli_error($con));
        }else{
            echo "<style> .resul{
                margin-left: 550px;
                margin-top: 15%;  
                } 
                .resul img{
                margin-left: 150px;
                width: 100px;
                height: 100px;
                }</style>";
                echo "<div class='resul'>
                <img src='conclu.png'>
                <h2 style='color:rgb(230, 227, 227);'> A operação foi realizada com sucesso! </h2>
                </div>";
        }
     }else if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == 'excluir'){
        $sql = "DELETE FROM carros WHERE ID = ".$_REQUEST["buscaid"];

        $result = mysqli_query($con, $sql);

        if(!$result){
            die("Erro: ". mysqli_error($con));
        }else{
            echo "<style> .resul{
                margin-left: 550px;
                margin-top: 15%;  
                } 
                .resul img{
                margin-left: 150px;
                width: 100px;
                height: 100px;
                }</style>";
                echo "<div class='resul'>
                <img src='conclu.png'>
                <h2 style='color:rgb(230, 227, 227);'> A operação foi realizada com sucesso! </h2>
                </div>";
        }

     }



?>
<div class='endger'><h3 style="color:rgb(230, 227, 227);">Escolha uma das opções</h3>
<div class='endbtn'><button><a href="inserir.php" style="color:rgb(72, 70, 91); text-decoration: none;">Inserir</a></button> <button><a href="lista.php" style="color:rgb(72, 70, 91); text-decoration: none;">Listar</a></button></div>
</div>

