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

<?php

    if(!empty($_GET['id']))
    {

        include_once('conexao.php');
        
        $id = $_GET['id'];

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
                $login = $user_data['LOGIN'];
            }
        }
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="./css/editCadastro.css" rel="stylesheet">
     
</head>
<body>

    <form id="confirm" class="FORM" action="saveEdit.php" method="POST" >
    <div class="container">
        <div class="form">
            <form action="#" method="POST">
            <div class="form-header">
                <div class="title"> 
                <h1> Editar <?php echo $nome ?> </h1>    
                </div>
                
            </div>
            <span id="error-message" class="error-message"></span>    
            </form>
    
            <div class="input-group">
            <div class="input-box"> 
                <label for="nome"> Nome </label>
                <input id="nome" type="text" name="nome" value='<?php echo $nome ?>' placeholder="Digite seu nome">
            </div>    
            <div class="input-box"> 
                <label for="datdaNasc"> Data de Nascimento </label>
                <input id="dataNasc" type="date" name="dataNasc" value='<?php echo $data_nasc ?>' placeholder="Digite sua Data de Nascimento">
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
                <input id="nomem" type="text" name="nomem" value='<?php echo $nome_m ?>' placeholder="Digite seu nome materno">
            </div>  
            <div class="input-box"> 
                <label for="cpf"> CPF </label>
                <input id="cpf" type="text" name="cpf" value='<?php echo $cpf ?>' placeholder="Digite seu CPF">
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

                var camposObrigatorios = ['nome', 'dataNasc', 'sexo-f', 'sexo-m', 'nomem', 'cpf', 'telefoneCelular', 'telefone', 'endereco', 'login', 'senha'];
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