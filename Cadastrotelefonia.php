<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="css/cadastro.css" rel="stylesheet" type="text/css">
    <script src="/js/cadastro.js" defer> </script> 
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="img/fotocadastro.svg" >
        </div>
        <div class="form">
            <form action="#">
            <div class="form-header">
                <div class="title"> 
                <h1> Cadastre-se </h1>    
                </div>
            </div>    
            </form>
            <div class="input-group">
            <div class="input-box"> 
                <label for="nome"> Nome </label>
                <input id="nome" type="text" name="nome" placeholder="Digite seu nome" required>
            </div>    
            <div class="input-box"> 
                <label for="datdaNasc"> Data de Nascimento </label>
                <input id="dataNasc" type="date" name="nome" placeholder="Digite sua Data de Nascimento" required>
            </div>  
            <div class="gender-group"> 
            <p>Sexo:</p>
            <input type="radio" id="sexo-m" name="sexo" value="Masculino">
            <label for="sexom">Feminino</label><br>
            <input type="radio" id="sexo-f" name="sexo" value="Feminino">
            <label for="sexof">Masculino</label>
            </div>  
            <div class="input-box"> 
                <label for="nomeMaterno"> Nome Materno </label>
                <input id="nomem" type="text" name="nome" placeholder="Digite seu nome materno">
            </div>  
            <div class="input-box"> 
                <label for="cpf"> CPF </label>
                <input id="cpf" type="text" name="cpf" placeholder="Digite seu CPF" required>
            </div>  
            <div class="input-box"> 
                <label for="telefoneCelular"> Telefone Celular </label>
                <input id="telefonec" type="tel" name="telefonecelular" placeholder="(xx-xxxx-xxxx)" required>
            </div>  
            <div class="input-box"> 
                <label for="telefone"> Telefone Fixo </label>
                <input id="telefone" type="tel" name="telefone" placeholder="(xx-xxxxxxxx)" required>
            </div>  
            <div class="input-box"> 
                <label for="endereço"> Endereço </label>
                <input id="endereco" type="text" name="endereço" placeholder="Digite seu endereço completo" required>
            </div>  
            <div class="input-box"> 
                <label for="senha"> Senha </label>
                <input id="senha" type="password" name="senha" placeholder="Digite a senha" required>
            </div>  
            <div class="input-box"> 
                <label for="cSenha"> Confirmar senha </label>
                <input id="csenha" type="password" name="confirmpassword" placeholder="Confirme sua senha" required>
            </div>  
            <button onclick="limparcampos()"> Limpar Campos </button>
            </div>
            <div class="continue-button"> 
                <button> <a href="#"> Continuar </a> </button>
            </div>
            <div class="Login">
                <p> Entrar como: <a href="#"> Usuário Master </a> ou <a href="Logincomum.html"> Comum </a> </p>
            </div>
        </div>
    </div>
</body>
</html>