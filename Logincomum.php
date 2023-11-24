<!DOCTYPE html>
<html lang="en">
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
                <form action="methods/login.php" method="POST">
                <div class="textfield"> 
                    <label for="Usuario" id="usuario"> Usuário </label>
                    <input id="Usuario" type="text" name="usuario" placeholder="Usuário" >
                </div>    
                <div class="textfield2"> 
                    <label for="Senha" id="senha"> Senha </label>
                    <input id="Senha" type="password" name="senha" placeholder="Senha" >
                </div> 
                </form>
                <button class="btn-login" type="submit"> Entrar </button>  
                <button onclick="limparcampos()" class="btn-limpar"> Limpar Campos </button>
            </div>
        </div>
    </div>
</body>
</html>