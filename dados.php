<?php
session_start();
include_once('conexao.php');

function deixarApenasNumeros($string) {
    return preg_replace('/[^0-9]/', '', $string);
}

$nome = $_SESSION['nome'];
$senha = $_SESSION['senha'];
$dataNasc = $_SESSION['dataNasc'];
$sexo = $_SESSION['sexo'];
$nomem = $_SESSION['nomem'];
$cpf = deixarApenasNumeros($_SESSION['cpf']);
$telefoneCelular = $_SESSION['telefoneCelular'];
$telefone = $_SESSION['telefone'];
$endereco = $_SESSION['endereco'];
$login = $_SESSION['login'];

$sql = "INSERT INTO USUARIO 
    (
        NOME, 
        DATA_NASC, 
        SEXO, 
        NOME_M, 
        CPF, 
        TEL_CEL, 
        TEL_FIX, 
        ENDERECO,
        LOGIN, 
        SENHA, 
        TIPO_USUARIO, 
        STATUS_USUARIO, 
        DT_ULT_VAL
    )
    VALUES 
    (
        '$nome', 
        '$dataNasc', 
        '$sexo', 
        '$nomem', 
        '$cpf', 
        '$telefoneCelular', 
        '$telefone', 
        '$endereco',
        '$login', 
        '$senha', 
        'COMUM', 
        'ATIVO', 
        current_timestamp
    )";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

$conn->close();
header('location:index.php');
?>