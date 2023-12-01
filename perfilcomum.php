<?php 
    session_start();

    if(!empty($_SESSION['id']))
    {

        include_once('conexao.php');
        
        $id = $_SESSION['id'];

        $sqlselect = "SELECT * FROM USUARIO WHERE ID=$id";
        $result = $conn->query($sqlselect);

        if($result->num_rows > 0){

            while($user_data = mysqli_fetch_assoc($result))
            {
                $id = $user_data["ID"]; 
                $cpf = $user_data["CPF"]; 
                $nome = $user_data["NOME"];
                $sexo = $user_data["SEXO"];
                $nome_m = $user_data["NOME_M"];  
                $senha = $user_data["SENHA"]; 
                $tel_cel = $user_data["TEL_CEL"];
                $tel_fix = $user_data["TEL_FIX"]; 
                $endereco = $user_data["ENDERECO"];  
                $data_nasc = $user_data["DATA_NASC"];
                $login = $user_data["LOGIN"];
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link href="./css/editCadastro.css" rel="stylesheet">
</head>
<body>

    <form id="confirm" class="FORM" action="saveEditComum.php" method="POST" >
    <div class="container">
        <div class="form">
            <form action="#" method="POST">
            <div class="form-header">
                <div class="title"> 
                <h1><?php echo $nome ?></h1>    
                </div>
            </div>    
            </form>
            <span id="error-message" class="error-message"></span>
    
            <div class="input-group">
            <div class="input-box"> 
                <label for="nome"> Nome </label>
                <input id="nome" type="text" name="nome" value='<?php echo $nome ?>' placeholder="Digite seu nome" readonly>
            </div>    
            <div class="input-box"> 
                <label for="dataNasc"> Data de Nascimento </label>
                <input id="dataNasc" type="date" name="dataNasc" value='<?php echo $data_nasc ?>' placeholder="Digite sua Data de Nascimento" readonly>
            </div>  
            <div class="gender-group">
            <p>Sexo:</p>
                <input type="radio" id="sexo-m" name="sexo" value="M" <?php echo ($sexo == 'M') ? 'checked' : '' ?>>
                    <label for="sexo-m">Masculino</label><br>
                <input type="radio" id="sexo-f" name="sexo" value="F" <?php echo ($sexo == 'F') ? 'checked' : '' ?>>
                    <label for="sexo-f">Feminino</label>
            </div>  
            <div class="input-box"> 
                <label class='label-nomeMaterno' for="nomem"> Nome Materno </label>
                <input id="nomem" type="text" name="nomem" value='<?php echo $nome_m ?>' placeholder="Digite seu nome materno" readonly>
            </div>  
            <div class="input-box"> 
                <label for="cpf"> CPF </label>
                <input id="cpf" type="text" name="cpf" value='<?php echo $cpf ?>' placeholder="Digite seu CPF" readonly>
            </div>  
            <div class="input-box"> 
                <label for="telefoneCelular"> Telefone Celular </label>
                <input id="telefoneCelular" type="tel" name="telefoneCelular" value='<?php echo $tel_cel ?>' placeholder="(xx-xxxx-xxxx)">
            </div>  
            <div class="input-box"> 
                <label for="telefone"> Telefone Fixo </label>
                <input id="telefone" type="tel" name="telefone" value='<?php echo $tel_fix ?>' placeholder="(xx-xxxxxxxx)">
            </div>  
            <div class="input-box"> 
                <label for="endereco"> Endereço </label>
                <input id="endereco" type="text" name="endereco" value='<?php echo $endereco ?>' placeholder="Digite seu endereço completo">
            </div>  
            <div class="input-box"> 
                <label for="senha"> Senha </label>
                <input id="senha" type="text" name="senha" value='<?php echo $senha ?>' placeholder="Digite a senha">
            </div>

            <div class="input-box"> 
                <label for="login"> login </label>
                <input id="login" type="text" name="login" value='<?php echo $login ?>' placeholder="Digite o login">
            </div>
            
            <input id="id" name='id' type="hidden" value='<?php echo $id ?>'>
            
            </div>
            <div class="continue-button"> 
                <input class="submit" type="submit" name="update" id="update">
            </div>
        </div>

    </div>
    </form>

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

                var camposObrigatorios = ['telefoneCelular', 'telefone', 'endereco', 'login', 'senha'];
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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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