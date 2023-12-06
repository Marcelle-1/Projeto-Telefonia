<?php
session_start();

if(isset($_SESSION['login']) && isset($_SESSION['senha']))
{
    include_once('conexao.php');

    $usuario = $_SESSION['login'];
    $senha = $_SESSION['senha'];

    $sql = "SELECT ID, LOGIN FROM USUARIO WHERE LOGIN = ? AND SENHA = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows < 1) {

        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: logincomum.php');
    } else {
        
        $row = $result->fetch_assoc();
        $id_usuario = $row['ID'];
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        $_SESSION['id'] = $id_usuario;  
        header('Location: MenuComum.php');
    }

    $stmt->close();
    $conn->close();

} 
else 
{
    header('location: logincomum.php');
}
?>