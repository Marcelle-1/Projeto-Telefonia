<script>
    
    function limparLocalStorage() {
            localStorage.clear();
        }

</script>

<?php
function validarCPF($cpf = null) {

	if(empty($cpf)) {
        echo 'chego n';
		return false;

	}

	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	
	if (strlen($cpf) != 11) {
		return false;
	}

	else if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
		$cpf == '99999999999') {
		return false;
	
	 } else {   
		
		for ($t = 9; $t < 11; $t++) {
			
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf[$c] * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf[$c] != $d){
				return false;
			}
		}

		return true;
	}
}
?>

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

            <?php
                    session_start();
                    include_once('conexao.php');

       
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {


                        if (empty($_POST['nome']) || empty($_POST['dataNasc']) || 
                            empty($_POST['sexo']) || empty($_POST['nomem']) || 
                            empty($_POST['cpf']) || empty($_POST['telefoneCelular']) ||
                            empty($_POST['telefone']) || empty($_POST['endereco']) ||
                            empty($_POST['login']) || empty($_POST['senha']) )
                        {
                            echo "<p style='color: red;'>Por favor, preencha todos os campos.</p>";
                        }
                        elseif (strlen($_POST['nome']) > 80)
                        {
                            echo "<p style='color: red;'>O campo nome deve ter menos de 80 caracteres.</p>";
                        }
                        elseif (strlen($_POST['nomem']) > 80)
                        {
                            echo "<p style='color: red;'>O campo nome materno deve ter menos de 80 caracteres.</p>";
                        }
                        elseif (!validarCPF($_POST['cpf'])) {
                            echo "<p style='color: red;'>O CPF inserido é inválido.</p>";
                        }
                        elseif (strlen($_POST['telefoneCelular']) > 11 || strlen($_POST['telefoneCelular']) < 11)
                        {
                            echo "<p style='color: red;'>O telefone Celular é inválido.</p>";
                        }
                        elseif (strlen($_POST['telefone']) > 8 || strlen($_POST['telefone']) < 8)
                        {
                            echo "<p style='color: red;'>O telefone fixo é inválido.</p>";
                        }
                        elseif (strlen($_POST['endereco']) > 80)
                        {
                            echo "<p style='color: red;'>O campo endereço deve ter menos de 80 caracteres.</p>";
                        }
                        elseif (strlen($_POST['login']) > 80)
                        {
                            echo "<p style='color: red;'>O campo login deve ter menos de 80 caracteres.</p>";
                        }
                        elseif (strlen($_POST['senha']) > 80)
                        {
                            echo "<p style='color: red;'>O campo senha deve ter menos de 80 caracteres.</p>";
                        }
                        elseif ($_POST['senha'] != $_POST['confirmpassword'])
                        {
                            echo "<p style='color: red;'>As senhas devem ser iguais.</p>";
                        }
                        else
                        {

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
                                             
                            echo ' <script> limparLocalStorage(); </script> ';

                            header('location: dados.php');
                            exit();
                        }
                        
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

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
                    Limpar campos
            </button>

            <div class="continue-button"> 
                <input type="submit" value="Cadastrar" class="submit">
            </div>
        </form>
            <div class="Login">
                <p> Entrar como: <a href="LoginMaster.html"> Usuário Master </a> ou <a href="Logincomum.php"> Comum </a> </p>
            </div>
        </div>
    </div>

   <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            document.getElementById('nome').value = localStorage.getItem('nome') || '';
            document.getElementById('dataNasc').value = localStorage.getItem('dataNasc') || '';
            var sexo = localStorage.getItem('sexo');
            if (sexo) {
                document.querySelector('input[name="sexo"][value="' + sexo + '"]').checked = true;
            }
            document.getElementById('nomem').value = localStorage.getItem('nomem') || '';
            document.getElementById('cpf').value = localStorage.getItem('cpf') || '';
            document.getElementById('telefoneCelular').value = localStorage.getItem('telefoneCelular') || '';
            document.getElementById('telefone').value = localStorage.getItem('telefone') || '';
            document.getElementById('endereco').value = localStorage.getItem('endereco') || '';
            document.getElementById('login').value = localStorage.getItem('login') || '';
  
            document.querySelector('.submit').addEventListener('click', function () {
                localStorage.setItem('nome', document.getElementById('nome').value);
                localStorage.setItem('dataNasc', document.getElementById('dataNasc').value);
                var selectedSexo = document.querySelector('input[name="sexo"]:checked');
                if (selectedSexo) {
                    localStorage.setItem('sexo', selectedSexo.value);
                }
                localStorage.setItem('nomem', document.getElementById('nomem').value);
                localStorage.setItem('telefoneCelular', document.getElementById('telefoneCelular').value);
                localStorage.setItem('telefone', document.getElementById('telefone').value);
                localStorage.setItem('endereco', document.getElementById('endereco').value);
                localStorage.setItem('login', document.getElementById('login').value);

            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        
        $("#btn-sim").click(function() {
            $("#confirm").trigger('reset');
            $("#modalExemplo").modal('hide');
            localStorage.clear();
          });
    
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>