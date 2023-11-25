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
                <form action="testloginMASTER.php" method="POST">
                <div class="textfield"> 
                    <label for="Usuario" id="usuario"> Usuário </label>
                    <input id="Usuario" type="text" name="usuario" placeholder="Usuário" >
                </div>    
                <div class="textfield"> 
                    <label for="Senha" id="senha"> Senha </label>
                    <input id="Senha" type="password" name="senha" placeholder="Senha" >
                </div>
                    <button onclick="limparcampos()" class="btn-limpar"> Limpar Campos </button>
                    <button class="btn-login" type="submit" name="submit"> Entrar </button>  
                </form> 
                
            </div>
        </div>
    </div>
</body>
</html>