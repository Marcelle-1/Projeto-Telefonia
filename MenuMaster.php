<?php
    session_start();
    include_once('conexao.php');

    

    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true) and (!isset($_SESSION['MASTER'])))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        unset($_SESSION['MASTER']);
        header('Location: loginMaster.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Principal</title>
    <link rel="stylesheet" href="./css/styleCpaas.css">
</head>
<body>
    <header>
        <div class="header">
            <ul id="nav-mobile-logado" class="lista_header">
                <a id="header_telefonia" href="index.php" class="brand-logo">Telefonia</a>
                <li id="lista_usuario" ><a href="perfilcomum.php"><?php echo "Olá, " . $_SESSION['usuario']?></a></li>
                <li id="lista_usuario" ><a href="consultaMaster.php">Consulta</a></li>
                <li id="lista_usuario" ><a href="deslogar.php">Deslogar</a></li>
                <li id="lista_usuario" ><a href="index.php">Menu</a></li>
            </ul>
        </div> 
    </header>            
    <section class="container servicosCpaas">
        <h1>Serviços</h1>
        <div class="servicos">
            <div> 
                <a href="#">
                    <img class="imgServicos" src="./img/2FA.png">
                    <h2>2FA</h2>
                </a>
            </div>
            <div> 
                <a href="#">
                    <img class="imgServicos" src="./img/numero-mascara.png">
                    <h2>Planos</h2>
                </a>
            </div>
            <div> 
                <a href="#">
                    <img class="imgServicos" src="./img/GoogleVerifiedCalls.png">
                    <h2>Google Verified Calls</h2>
                </a>
            </div>
            <div> 
                <a href="#">
                    <img class="imgServicos" src="./img/consulta-numero.png">
                    <h2>Consultar</h2>
                </a>
            </div>
            <div> 
                <a href="#">
                    <img class="imgServicos" src="img/cinema.png">
                    <h2>Benefício no CineMark</h2>
                </a>
            </div>
            <div> 
                <a href="#">
                    <img class="imgServicos" src="img/atendimento.png">
                    <h2>Atendimento exclusivo</h2>
                </a>
            </div>
            <div> 
                <a href="#">
                    <img class="imgServicos" src="img/promocao.png">
                    <h2>Promoções</h2>
                </a>
            </div>
        </div>
    </section>  
    <section class="utilizacoes container">
        <h1>Utilizações</h1><br>
        <div class="areas">
            <div class="areaUtiliza">
                <h2>Logística</h2>
                <img src="./img/lista-de-controle.png" alt="">
                <p>
                    Acesso seguro com 2FA. <br>
                    Uso de números mascarados para proteção de funcionário e cliente. <br>
                    Mantenha o cliente informado sobre entrega e serviços.
                </p>
            </div>
            <div class="areaUtiliza">
                <h2>Varejo</h2>
                <img src="./img/carrinho-de-compras.png" alt="">
                <p>
                    Compra segura com 2FA. <br>
                    Avisos sobre compras e entregas <br>
                    Upsell com novas ofertas e vantagens via SMS
                </p>
            </div>
            <div class="areaUtiliza">
                <h2>Call Center</h2>
                <img src="./img/agente-de-call-center.png" alt="">
                <p>
                    Melhore taxas de abertura utilizando alertas SMS para confirmações. <br>
                    Economia de números com o uso de um único número máscara por todos os agentes.
                </p>

            </div>
            <div class="areaUtiliza">
                <h2>Saúde</h2>
                <img src="./img/cuidados-de-saude.png" alt="">
                <p>
                    Acesso seguro com 2FA. <br>
                    Melhore o agendamento e reduza faltas com lembretes por SMS. <br>
                    Tokens de autorização para procedimentos com 2FA.
                </p>
            </div>
            <div class="areaUtiliza">
                <h2>Meia Entrada</h2>
                <img src="img/cinema2.png" alt="" width="300px">
                <p>
                    Lazer. <br>
                   Sua diversão com um toque de sofisticação. <br>
                    Meia-Entradas em salas Prime CineMark para você e um acompanhante.
                </p>
            </div>
            <div class="areaUtiliza">
                <h2>Atendimento preciso</h2>
                <img src="img/atendimento2.png" alt="">
                <p>
                    Seja atendido por consultores especializados. <br>
                    Atendentes à disposição por Whatsapp, e-mail <br>
                    e loja marcada na hora de sua preferência.
                </p>
            </div>
            <div class="areaUtiliza">
                <h2>Promoções para você</h2>
                <img src="img/promocao2.png" alt="" width="250px">
                <p>
                    Lazer com preços menores. <br>
                    Eventos, Gastronomia, Bem-Estar e Viagens. <br>
                    Com promoções exclusivas para você.
                </p>
            </div>
            </div>
        </div>    
    </section>
    <footer>
        <div class="redes">
            <ul class="paragrafo">
                <p> Copyright © 2023 | Telefonia. Todos os direitos reservados. </p>
                <p>Desenvolvido por: Marcelle, Fernanda e Caio </p>
            </ul>
        </div>
    </footer>
</html>