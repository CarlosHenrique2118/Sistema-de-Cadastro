<?php

    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'dados';

    $acaoform = "adicionar";
    $botao = "Cadastrar";
    $cod = "";
    $placa = "";
    $modelo = "";
    $cor = "";
    $ano = "";
    $status = "";


    $con = mysqli_connect($servidor, $usuario, $senha, $banco) or die('Não foi possivel conectar: '. mysqli_connect_error($con));

    if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == 'editar'){
        
        $sql = "SELECT * FROM carros where ID = ".$_REQUEST["buscaid"];
        
        $result = mysqli_query($con, $sql);

        if($reg = mysqli_fetch_array($result)){
            $cod = $reg["ID"];
            $placa = $reg["PLACA"];
            $modelo = $reg["MODELO"];
            $cor = $reg["COR"];
            $ano = $reg["ANO"];
            $status = $reg["STATUSS"];
            $acaoform = "alterar";
            $botao = "Alterar";
        }else{
            echo 
            "<style>
            .alert {
                padding: 20px;
                background-color: #f44336; /* Red */
                color: white;
                margin-bottom: 15px;
              }
              
              /* The close button */
              .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
              }
              
              /* When moving the mouse over the close button */
              .closebtn:hover {
                color: black;
              }</style>";


            echo "<div class='alert'>
                    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
                    Registro não encontrado.
                </div>"; 
        }
        
    }


?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Gerenciador de locação</title>
</head>
<body style="background-color: rgb(33, 32, 41);">
    <div class='main'>
        <h2 class='title' style="Times New Roman', Times, serif;">Preencha os campos abaixo:</h2><img src="cad.png" alt="">



        <FORM method='POST' action='gerenciador.php?acao=<?php echo $acaoform ?>'>
        <input type='hidden' name='codcarro' value="<?php echo $cod ?>">
            <table class= 'table'>
                <tr>
                    <td>
                        Placa do Carro:
                    </td>
                    <td>
                        <input name='placacarro' maxlength = 20 value="<?php echo $placa ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Modelo:
                    </td>
                    <td>
                        <input name='modelocarro' maxlength = 20 value="<?php echo $modelo ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Cor:
                    </td>
                    <td>
                        <input name='corcarro' maxlength = 20 value="<?php echo $cor ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Ano:
                    </td>
                    <td>
                        <input name='anocarro' maxlength = 20 value="<?php echo $ano ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Status:
                    </td>
                    <td>
                        <select name="statuscarro" value="<?php echo $status ?>">
                            <option>
                                Disponivel
                            </option>
                            <option>
                                Indisponivel
                            </option>
                        </select>
                    </td>
                </tr>
                <tr> 
                    <td colspan=2>
                        <div id='btn' >
                            <input type="reset" value='Limpar' style="background-color: rgb(72, 70, 91);color:white;">
                            <input type="submit" value="<?php echo $botao ?>" style="background-color: rgb(72, 70, 91);color:white;">
                            <button style="background-color:rgb(230, 227, 227);height: 25px;width: 85px;border:none;background-color: rgb(72, 70, 91)"><a href="lista.php" style="color:white; text-decoration: none;" >Listar</a></button>
                        </div>
                    </td>
                </tr>
            </table>
        </FORM>
    </div>
</body>
</html>