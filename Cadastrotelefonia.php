<script>
    function validarCPF(cpf) {
    
    cpf = cpf.replace(/\D/g, '');

    if (cpf.length !== 11) {
        return false;
    }

    if (/^(\d)\1+$/.test(cpf)) {
        return false;
    }

    var soma = 0;
    for (var i = 0; i < 9; i++) {
        soma += parseInt(cpf.charAt(i)) * (10 - i);
    }

    var resto = 11 - (soma % 11);
    var digito1 = resto === 10 || resto === 11 ? 0 : resto;

    if (digito1 !== parseInt(cpf.charAt(9))) {
        return false;
    }

    soma = 0;
    for (var j = 0; j < 10; j++) {
        soma += parseInt(cpf.charAt(j)) * (11 - j);
    }

    resto = 11 - (soma % 11);
    var digito2 = resto === 10 || resto === 11 ? 0 : resto;

    if (digito2 !== parseInt(cpf.charAt(10))) {
        return false;
    }

    return true;
}
</script>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/cadastro.css" rel="stylesheet">
    <!-- <script src="js/cadastrotelefonia.js" defer> </script>  -->

</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="img/fotocadastro.svg" >
        </div>
        <div class="form">

        <!-- FORMULARIO  -->

            <form id="confirm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-header">
                <div class="title"> 
                <h1> Cadastre-se </h1>    
                </div>
                
            </div>    

            <span id="error-message" class="error-message"></span>

            <?php
                    session_start();
                    include_once('conexao.php');

       
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                            $_SESSION["nome"] = $_POST['nome'] ;
                            $_SESSION["senha"] = $_POST['senha'] ;
                            $_SESSION['dataNasc'] = $_POST['dataNasc'] ;
                            $_SESSION['sexo'] = $_POST['sexo'] ;
                            $_SESSION['nomem'] = $_POST['nomem'] ;
                            $_SESSION['cpf'] = $_POST['cpf'] ;
                            $_SESSION['telefoneCelular'] = $_POST['telefoneCelular'] ;
                            $_SESSION['telefone'] = $_POST['telefone'] ;
                            $_SESSION['endereco'] = $_POST['endereco'] ;
                            $_SESSION['login'] = $_POST['login'] ;
                            $_SESSION['senha'] = $_POST['senha'] ;
                            $_SESSION['confirmpassword'] = $_POST['confirmpassword'] ;    
                                   
                            header('location: dados.php');
                            exit();
                        }

                ?>

            <div class="input-group">
                <div class="input-box"> 
                    <label for="nome"> Nome </label>
                    <input id="nome" type="text" name="nome" placeholder="Digite seu nome">
                </div>    
                <div class="input-box"> 
                    <label for="dataNasc"> Data de Nascimento </label>
                    <input id="dataNasc" type="date" name="dataNasc" placeholder="Digite sua Data de Nascimento" >
                </div>  
                <div class="gender-group"> 
                    <p>Sexo:</p>
                    <input type="radio" id="sexo-f" name="sexo" value="F" >
                    <label for="sexo-f">Feminino</label><br>
                    <input type="radio" id="sexo-m" name="sexo" value="M" >
                    <label for="sexo-m">Masculino</label>
                </div>  
                <div class="input-box"> 
                    <label for="nomem"> Nome Materno </label>
                    <input id="nomem" type="text" name="nomem" placeholder="Digite seu nome materno">
                </div>  
                <div class="input-box"> 
                    <label for="cpf"> CPF </label>
                    <input id="cpf" type="text" name="cpf" placeholder="Digite seu CPF" >
                </div>  
                <div class="input-box"> 
                    <label for="telefoneCelular"> Telefone Celular </label>
                    <input id="telefoneCelular" type="tel" name="telefoneCelular" placeholder="(xx-xxxx-xxxx)" >
                </div>  
                <div class="input-box"> 
                    <label for="telefone"> Telefone Fixo </label>
                    <input id="telefone" type="tel" name="telefone" placeholder="(xx-xxxxxxxx)" >
                </div>  
                <div class="input-box"> 
                    <label for="endereco"> Endereço </label>
                    <input id="endereco" type="text" name="endereco" placeholder="Digite seu endereço completo" >
                </div>  
                <div class="input-box"> 
                    <label for="login"> Login </label>
                    <input id="login" type="text" name="login" placeholder="Digite um login" >
                </div>  
                <div class="input-box"> 
                    <label for="senha"> Senha </label>
                    <input id="senha" type="password" name="senha" placeholder="Digite a senha" >
                </div>  
                <div class="input-box"> 
                    <label for="cSenha"> Confirmar senha </label>
                    <input id="cSenha" type="password" name="confirmpassword" placeholder="Confirme sua senha">
                </div>  
                <div>
                <!-- Botão para acionar modal para limpar campos-->
                
                
                <!-- Modal -->
                <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gostaria de resetar todos os campos?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="btn-sim" >Sim</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            

            <div class="continue-button"> 

                <input type="submit" value="Cadastrar" class="submit">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">Limpar campos</button>
            </div>
        </form>
            <div class="Login">
                <p> Entrar como: <a href="LoginMaster.php"> Usuário Master </a> ou <a href="Logincomum.php"> Comum </a> </p>
            </div>
        </div>
    </div>


        <script>

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('confirm').addEventListener('submit', function (event) {

                var errorMessage = document.getElementById('error-message');

                function clearErrors() {
                    var errorMessages = document.querySelectorAll('.error-message');
                    errorMessages.forEach(function (errorMessage) {
                        errorMessage.textContent = '';
                    });
                }

                var nome = document.getElementById('nome').value;
                if (nome.trim() === '') {
                    event.preventDefault();
                    errorMessage.textContent = 'Por favor, preencha o campo Nome.';
                    errorMessage.style.display = 'block';
                    document.getElementById('nome').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('nome').style.border = ''; 
                }

                var dataNasc = document.getElementById('dataNasc').value;
                if (dataNasc.trim() === '') {
                    event.preventDefault();
                    errorMessage.textContent = 'Por favor, preencha a data de nascimento.';
                    errorMessage.style.display = 'block';
                    document.getElementById('dataNasc').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('dataNasc').style.border = ''; 
                }

                var sexoF = document.getElementById('sexo-f');
                var sexoM = document.getElementById('sexo-m');
                if (!sexoF.checked && !sexoM.checked) {
                    event.preventDefault();
                    errorMessage.textContent = 'Por favor, selecione um sexo.';
                    errorMessage.style.display = 'block';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                }
                

                var nomem = document.getElementById('nomem').value;
                if (nomem.trim() === '') {
                    event.preventDefault();
                    errorMessage.textContent = 'Por favor, preencha o nome materno.';
                    errorMessage.style.display = 'block';
                    document.getElementById('nomem').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('nomem').style.border = ''; 
                }

                var cpf = document.getElementById('cpf').value;
                if (cpf.trim() === '') {
                    event.preventDefault();
                    errorMessage.textContent = 'Por favor, preencha o CPF.';
                    errorMessage.style.display = 'block';
                    document.getElementById('cpf').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('cpf').style.border = ''; 
                }

                    cpf = cpf.replace(/\D/g, '');

                    if (!validarCPF(cpf)) {
                        event.preventDefault();
                        errorMessage.textContent = 'O CPF é inválido, insira corretamente.';
                        errorMessage.style.display = 'block';
                        document.getElementById('cpf').style.border = '2px solid #ff8e8e';
                        return;
                    }
                    else{
                        errorMessage.textContent = '';
                        errorMessage.style.display = 'none';
                        document.getElementById('cpf').style.border = ''; 
                    }   

                var telefoneCelular = document.getElementById('telefoneCelular').value;
                if (telefoneCelular.trim() === '') {
                    event.preventDefault();
                    errorMessage.textContent = 'Por favor, insira o telefone celular.';
                    errorMessage.style.display = 'block';
                    document.getElementById('telefoneCelular').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('telefoneCelular').style.border = ''; 
                }

                if (telefoneCelular.length !== 16) {
                    console.log(telefoneCelular);
                    event.preventDefault();
                    errorMessage.textContent = 'Por favor, insira o telefone celular corretamente.';
                    errorMessage.style.display = 'block';
                    document.getElementById('telefoneCelular').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('telefoneCelular').style.border = ''; 
                }

                var telefoneFixo = document.getElementById('telefone').value;
                if (telefoneFixo.trim() === '') {
                    event.preventDefault();
                    errorMessage.textContent = 'Por favor, insira o telefone fixo.';
                    errorMessage.style.display = 'block';
                    document.getElementById('telefone').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('telefone').style.border = ''; 
                }

                if (telefoneFixo.length !== 16) {
                    event.preventDefault();
                    errorMessage.textContent = 'Por favor, insira o telefone fixo corretamente.';
                    errorMessage.style.display = 'block';
                    document.getElementById('telefone').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('telefone').style.border = ''; 
                }

                var endereco = document.getElementById('endereco').value;
                if (endereco.trim() === '') {
                    event.preventDefault();
                    errorMessage.textContent = 'Por favor, preencha o endereço.';
                    errorMessage.style.display = 'block';
                    document.getElementById('endereco').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('endereco').style.border = ''; 
                }

                var login = document.getElementById('login').value;
                if (login.trim() === '') {
                    event.preventDefault();
                    errorMessage.textContent = 'Por favor, preencha o login.';
                    errorMessage.style.display = 'block';
                    document.getElementById('login').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('login').style.border = ''; 
                }

                var senha = document.getElementById('senha').value;
                if (senha.trim() === '') {
                    event.preventDefault();
                    errorMessage.textContent = 'Por favor, preencha a senha.';
                    errorMessage.style.display = 'block';
                    document.getElementById('senha').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('senha').style.border = ''; 
                }

                var cSenha = document.getElementById('cSenha').value;
                if (cSenha.trim() === '') {
                    event.preventDefault();
                    errorMessage.textContent = 'Por favor, preencha o campo confirmar senha.';
                    errorMessage.style.display = 'block';
                    document.getElementById('cSenha').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('cSenha').style.border = ''; 
                }

                if (senha !== cSenha) {
                    event.preventDefault();
                    errorMessage.textContent = 'As senhas devem ser iguais.';
                    errorMessage.style.display = 'block';
                    document.getElementById('senha').style.border = '2px solid #ff8e8e';
                    document.getElementById('cSenha').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('senha').style.border = '';
                    document.getElementById('cSenha').style.border = '';  
                }

                var camposObrigatorios = ['nome', 'dataNasc', 'sexo-f', 'sexo-m', 'nomem', 'cpf', 'telefoneCelular', 'telefone', 'endereco', 'login', 'senha', 'cSenha'];
                for (var i = 0; i < camposObrigatorios.length; i++) {
                    var campo = document.getElementById(camposObrigatorios[i]);
                    if (campo.type === 'radio') {

                        var radioGroup = document.getElementsByName(campo.name);
                        var radioSelected = false;
                        for (var j = 0; j < radioGroup.length; j++) {
                            if (radioGroup[j].checked) {
                                radioSelected = true;
                                break;
                            }
                        }
                        if (!radioSelected) {
                            alert('Por favor, preencha todos os campos obrigatórios.');
                            event.preventDefault();
                            return;
                        }
                    } else {

                        if (campo.value.trim() === '') {
                            alert('Por favor, preencha todos os campos obrigatórios.');
                            event.preventDefault();
                            return;
                        }
                    }
                }

                if (!/^[a-zA-Z\s']{15,80}$/.test(nome)) {
                    event.preventDefault();
                    errorMessage.textContent = 'O campo Nome deve ter entre 15 e 80 caracteres alfabéticos.';
                    errorMessage.style.display = 'block';
                    document.getElementById('nome').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('nome').style.border = ''; 
                }

                if (!/^[a-zA-Z0-9]{6}$/.test(login)) {
                    event.preventDefault();
                    errorMessage.textContent = 'O campo Login deve ter exatamente 6 caracteres alfabéticos.';
                    errorMessage.style.display = 'block';
                    document.getElementById('login').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('login').style.border = ''; 
                }

                if (!/^[a-zA-Z0-9]{8}$/.test(senha)) {
                    event.preventDefault();
                    errorMessage.textContent = 'O campo Senha deve ter exatamente 8 caracteres alfabéticos.';
                    errorMessage.style.display = 'block';
                    document.getElementById('senha').style.border = '2px solid #ff8e8e';
                    return;
                }
                else{
                    errorMessage.textContent = '';
                    errorMessage.style.display = 'none';
                    document.getElementById('senha').style.border = ''; 
                }
 
            });
        });
                
        </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        
        $("#btn-sim").click(function() {
            $("#confirm").trigger('reset');
            $("#modalExemplo").modal('hide');
          });
    
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                var telefoneCelularInput = document.getElementById('telefoneCelular');
                $(telefoneCelularInput).inputmask('(+55)99-99999999');

                var telefoneFixoInput = document.getElementById('telefone');
                $(telefoneFixoInput).inputmask('(+55)99-99999999');

                var cpfInput = document.getElementById('cpf');
                $(cpfInput).inputmask('99999999999');
            });
        </script>
</body>
</html>