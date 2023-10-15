<?php

    if(!empty($_GET['id']))
    {
        $servername = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $dbname = "mydb";  

    
        $conn = new mysqli($servername, $username, $password, $dbname);

        $id = $_GET['id'];

        $sqlselect = "SELECT * FROM USUARIO WHERE ID=$id";
        $result = $conn->query($sqlselect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE from USUARIO WHERE id=$id";
            $resultDelete = $conn->query($sqlDelete);
        }
    }

    $conn->close();
    

header('location: consultaMaster.php');
?>