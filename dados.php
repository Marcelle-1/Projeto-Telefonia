<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

$host="localhost";
$port=3308;
$socket="";
$user="root";
$password="";
$dbname="mydb";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());

        
    //$con->close();
    
    if ($con->connect_errno) {
        echo "<br>Erro<br>";
        } else {
        echo "<br>conectado com sucesso<br>";
    };



   
?>
</body>
</html>