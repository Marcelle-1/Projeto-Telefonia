<?php
include_once('conexao.php');

    
    $nome = $_POST['nome'];
    $dataNasc = $_POST['dataNasc'];
    $sexo = $_POST['sexo'];
    $nomem = $_POST['nomem'];
    $cpf = $_POST['cpf'];
    $telefoneCelular = $_POST['telefoneCelular'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    
    $sql = "INSERT INTO USUARIO (NOME, DATA_NASC, SEXO, NOME_M, CPF, TEL_CEL, TEL_FIX, ENDERECO, SENHA, TIPO_USUARIO, STATUS_USUARIO, DT_ULT_VAL)
            VALUES ('$nome', '$dataNasc', '$sexo', '$nomem', '$cpf', '$telefoneCelular', '$telefone', '$endereco', '$senha', 'COMUM', 'ATIVO', current_timestamp)";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }


    $conn->close();
    header('location:index.php');
?>