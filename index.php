<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive product landing page.">
    <title>Telefonia</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        <?php
           
            session_start();

            
            if (isset($_SESSION['usuario'])) 
            {
                echo '
                #nav-mobile 
                { 
                    display: none; 
                }   
                
                #nav-mobile-logado
                {
                    display: block;
                }';
            } 
            else
            {
                echo '
                
                #nav-mobile-logado
                {
                    display: none;
                }
                ';
            }
        ?>
    </style>

</head>
<body>
<div class="splash-container">
<div class="header">

    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="Logincomum.php">Usuário Comum</a></li>
        <li class="divider"></li>
        <li><a href="LoginMaster.php">Usuário Master</a></li>
    </ul>
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Telefonia</a>
            
            <ul id="nav-mobile-logado" class="right hide-on-med-and-down">
                <li><a href="perfilcomum.php"><?php echo $_SESSION['usuario']?></a></li>
                <li><a href="deslogar.php">Deslogar</a></li>
                <li><a href="MenuComum.php">Menu</a></li>
            </ul>

            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="Cadastrotelefonia.html">Cadastro</a></li>
                <li><a href="#">Serviços</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Login<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
        </div>
            </ul>
        </div>
    </nav>



    <div class="splash">
        <h1 class="splash-head">Telefonia</h1>
        <p class="splash-subhead">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </p>
        <p>
            <a href="Cadastrotelefonia.html" class="pure-button pure-button-primary">Cadastrar</a>
        </p>
    </div>
</div>

<div class="content-wrapper">
    <div class="content">
        <h2 class="content-head is-center">Quem somos</h2>

        <div class="pure-g">
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">

                <h3 class="content-subhead">
                    <i class="fa fa-rocket"></i>
                    Faça seu cadastro
                </h3>
                <p>
                    
                </p>
            </div>
            

    <div class="ribbon l-box-lrg pure-g">
        <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
            <img width="300" alt="File Icons" class="pure-img-responsive" src="img/contato.png">
        </div>
        <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">

            <h2 class="content-head content-head-ribbon">Telefonia</h2>

            <p>
                Info Telefonia
            </p>
        </div>
    </div>

    <div class="content">
        <h2 class="content-head is-center">Saiba mais sobre nós</h2>

        

            <div class="l-box-lrg pure-u-1 pure-u-md-3-5">
                <h4>Contate-nos</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>

                <h4>Mais informações</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </div>

    </div>

    <div class="footer l-box is-center">
        Por Marcelle, Fernanda e Caio
    </div>

</div>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $( document ).ready(
        $(".dropdown-trigger").dropdown())
</script>
</body>
</html>