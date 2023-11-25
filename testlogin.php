<?php
    session_start();
   
    if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha']))
    {
        // Acessa
        include_once('conexao.php');
        $nome = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM USUARIO WHERE NOME = '$nome' and senha = '$senha'";

        $result = $conn->query($sql);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['nome']);
            unset($_SESSION['senha']);
            header('Location: index.html');
        }
        else
        {
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            header('Location: MenuComum.php');
        }
    }
    else
    {
        header('Location: MenuComum.php');
    }
?>