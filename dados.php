<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

include_once("Cadastrotelefonia.html");
var_dump($_POST);


if (isset($_POST['cadastrar'])) {
    // Array de erros
    $erros = array();

// Validações
    if (!$nome = filter_input(INPUT_POST, 'nome' , ))
        $erros[] = "CPF precisa ser um inteiro";
    if (!$cpf = filter_input(INPUT_POST, 'cpf' , FILTER_VALIDATE_INT))
        $erros[] = "CPF precisa ser um inteiro";
    if (!$cpf = filter_input(INPUT_POST, 'cpf' , FILTER_VALIDATE_INT))
        $erros[] = "CPF precisa ser um inteiro";
    if (!$cpf = filter_input(INPUT_POST, 'cpf' , FILTER_VALIDATE_INT))
        $erros[] = "CPF precisa ser um inteiro";
    if (!$cpf = filter_input(INPUT_POST, 'cpf' , FILTER_VALIDATE_INT))
        $erros[] = "CPF precisa ser um inteiro";
    if (!$cpf = filter_input(INPUT_POST, 'cpf' , FILTER_VALIDATE_INT))
        $erros[] = "CPF precisa ser um inteiro";
    if (!$cpf = filter_input(INPUT_POST, 'cpf' , FILTER_VALIDATE_INT))
        $erros[] = "CPF precisa ser um inteiro";
    if (!$cpf = filter_input(INPUT_POST, 'cpf' , FILTER_VALIDATE_INT))
        $erros[] = "CPF precisa ser um inteiro";

// Exibir mensagem
    if(!empty($erros)) :
        foreach($erros as $erro) :
            echo "<li> $erro </li>";
        endforeach;
    else :
        echo "Parabéns, seus dados estão corretos";
    endif;
    

};


// $host="localhost";
// $port=3308;
// $socket="";
// $user="root";
// $password="";
// $dbname="mydb";

// $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
//     or die ('Could not connect to the database server' . mysqli_connect_error());

        
//     //$con->close();
    
//     if ($con->connect_errno) {
//         echo "<br>Erro<br>";
//         } else {
//         echo "<br>conectado com sucesso<br>";
//     };



   
?>
</body>
</html>