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
        <div class="left-login">
            <img src="img/logocomum.png" class="left-login-image" alt="Usuario Comum">
        </div>
        <div class="right-login"> 
            <div class="card-login">
                <h1> LOGIN </h1> 

                <form action="testlogin.php" method="POST">

                    <div class="textfield"> 
                        <label for="Usuario" id="usuario"> Usuário </label>
                        <input id="Usuario" type="text" name="usuario" placeholder="Usuário">
                    </div>    

                    <div class="textfield"> 
                        <label for="Senha" id="senha"> Senha </label>
                        <input id="Senha" type="password" name="senha" placeholder="Senha">
                    </div>

                    <div class="btns">
                        <!-- <button type="button" class="btn-login" name="submit"> Entrar </button> -->
                        <input type="submit" name="submit" id="Submit" value="Entrar">
                        <button type="button" onclick="limparCampos()" class="btn-limpar"> Limpar </button>
                    </div>
                </form>

                <script>
                    function limparCampos() {
                    
                        document.getElementById('Usuario').value = '';
                        document.getElementById('Senha').value = '';
                    }

                </script>
                 
            </div>
        </div>
    </div>
</body>
</html>