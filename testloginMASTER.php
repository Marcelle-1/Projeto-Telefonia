<?php
    session_start();
    
    if(isset($_SESSION['usuario']) && isset($_SESSION['senha']))
    {  
       
        include_once('conexao.php');
        $usuario = $_SESSION['usuario'];
        $senha = $_SESSION['senha'];


        $sql = "SELECT * FROM USUARIO WHERE NOME = '$usuario' and senha = '$senha'
            and TIPO_USUARIO = 'MASTER'";


        $result = $conn->query($sql);

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