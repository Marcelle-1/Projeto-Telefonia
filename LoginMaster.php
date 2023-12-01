<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Entrar </title>
    <link href="css/LoginMaster.css" rel="stylesheet">
    <script src="js/limparCamposLogin.js" defer> </script>
</head>
<body>
    <div class="main-login"> 
        <div class="left-login">
            <img src="img/logomaster.png" class="left-login-image" alt="Usuario Comum">
        </div>
        <div class="right-login"> 
            <div class="card-login">
                <h1> LOGIN </h1>
                <?php
                    session_start();
                    include_once('conexao.php');
       
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        $usuario = $_POST["usuario"];
                        $senha = $_POST["senha"];

                        if (empty($usuario) || empty($senha)) {
                            echo "<p style='color: red;'>Por favor, preencha todos os campos.</p>";
                        } else {
                            
                            $usuario = $conn->real_escape_string($usuario);
                            $senha = $conn->real_escape_string($senha);

                            $consulta = "SELECT * FROM USUARIO WHERE LOGIN = '$usuario' AND SENHA = '$senha'";
                            $resultado = $conn->query($consulta);

                            if ($resultado->num_rows > 0) {
                                $_SESSION['usuario'] = $_POST['usuario'];
                                $_SESSION['senha'] = $_POST['senha'];
                            
                                header("Location: testloginMASTER.php", true, 303);
                                exit;

                            } else {
                                echo "<p style='color: red;'>Login ou senha inválida.</p>";
                            }

                            $conn->close();
                        }
                    }

                ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                    <div class="textfield"> 
                        <label for="Usuario" id="usuario"> Login </label>
                        <input id="Usuario" type="text" name="usuario" placeholder="Login">
                    </div>    

                    <div class="textfield"> 
                        <label for="Senha" id="senha"> Senha </label>
                        <input id="Senha" type="password" name="senha" placeholder="Senha">
                    </div>

                    <div class="btns">
                        <input type="submit" name="submit" id="Submit" value="Entrar">
                        <button type="button" onclick="limparCampos()" class="btn-limpar"> Limpar </button>
                    </div>
                </form>

                <script>
                    function limparCampos() {
                        document.getElementById("Usuario").value = "";
                        document.getElementById("Senha").value = "";
                    }
                </script> 
                
            </div>
        </div>
    </div>
</body>
</html>