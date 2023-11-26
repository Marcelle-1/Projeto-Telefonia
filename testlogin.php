<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {

    include_once('conexao.php');

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT ID, NOME FROM USUARIO WHERE NOME = ? AND senha = ?";
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

} else {
    header('location: logincomum.php');
}
?>