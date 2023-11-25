<?php
    session_start();

    print_r($_REQUEST);

    if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha']))
    {
       
        include_once('conexao.php');
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];


        $sql = "SELECT * FROM USUARIO WHERE NOME = '$usuario' and senha = '$senha'
            and TIPO_USUARIO = 'MASTER'";


        $result = $conn->query($sql);

        print_r($sql);
        print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            unset($_SESSION['MASTER']);
            header('Location: loginMaster.php');
        }
        else
        {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            $_SESSION['MASTER'] = true;
            header('Location: MenuMaster.php');
        }
    }
    else
    {
        header('location: loginMaster.php');
    }
?>