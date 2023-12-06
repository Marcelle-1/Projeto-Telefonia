<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Entrar </title>
    <link rel="stylesheet" href="./css/Logincomum.css">
    <script src="./js/Logincomum.js" defer> </script> 
</head>
<body>
    <div class="main-login"> 
        
        <div class="right-login"> 
            <div class="card-login">
                <h1> Pergunta de Segurança </h1> 

                <?php
                    session_start();
                    include_once('conexao.php');

                    $login = $_SESSION['login'];
       
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        $sqlselect = "SELECT id FROM USUARIO WHERE LOGIN = '$login'";
                        $result = $conn->query($sqlselect);
                        
                        if ($result->num_rows > 0) {

                                $row = $result->fetch_assoc();
                                $idUsuario = $row['id'];
                                
                                $sqlselect2 = "SELECT NOME_M FROM USUARIO WHERE ID = '$idUsuario'";
                                $result2 = $conn->query($sqlselect2);

                                    print_r($result2);

                                if ($result2->num_rows > 0) {
                                    $row2 = $result2->fetch_assoc();
                                    $nome_m = $row2['NOME_M'];

                                    if ($_POST['2fa'] == $nome_m){
                                        header('location: testlogin.php');
                                        exit();
                                    }


                                }
                                else {
                                    header('location: 2FA.php');
                                    exit();
                                }

                        } else {
                            header('location: 2FA.php');
                            exit();
                        }
                        
                    }

                ?>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                    <div class="textfield"> 
                        <label for="2fa" id="2fa"> Nome Materno </label>
                        <input id="2fa" type="text" name="2fa" placeholder="Digite o nome da sua mãe..">
                    </div>    

                    <div class="btns">
                        <input type="submit" name="submit" id="Submit" value="Entrar">
                        <button type="button" onclick="limparCampos()" class="btn-limpar"> Limpar </button>
                    </div>
                    </form>

                <script>
                    function limparCampos() {
                        document.getElementById("2fa").value = "";
                    }
                </script>
                            
            </div>
        </div>
    </div>
</body>
</html>