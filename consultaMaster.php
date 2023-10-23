
<?php

    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "mydb";  

   
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM USUARIO";
    
    $result = $conn->query($sql);

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta</title>
    <link rel="stylesheet" href="./css/styleConsulta.css">
</head>
<body>


<!--Main-->
    <main>

    <div class="div_pesquisa">
        <input class="caixa_pesquisa" type="text" name="pesquisa" id="pesquisa" placeholder="Pesquise aqui..">
    </div>

    <div class="responsive_table">
        <?php
            if ($result->num_rows > 0) {
                
                echo "<table class='tabela_dados' border='1'>";
                echo "<tr>
                        <th>ID</th>
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>Nome_M</th>
                        <th>Senha</th>
                        <th>Tel_cel</th>
                        <th>Tel_fix</th>
                        <th>Endereço</th>
                        <th>Status</th>
                        <th>DT_ULT_VAL</th>
                        <th>Data de Nascimento</th>
                        <th>Tipo de usuario</th>
                        <th>ações</th>
                    </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["ID"] . "</td>
                        <td>" . $row["CPF"] . "</td>
                        <td>" . $row["NOME"] . "</td>
                        <td>" . $row["SEXO"] . "</td>
                        <td>" . $row["NOME_M"] . "</td>
                        <td>" . $row["SENHA"] . "</td>
                        <td>" . $row["TEL_CEL"] . "</td>
                        <td>" . $row["TEL_FIX"] . "</td>
                        <td>" . $row["ENDERECO"] . "</td>
                        <td>" . $row["status_USUARIO"] . "</td>
                        <td>" . $row["DT_ULT_VAL"] . "</td>
                        <td>" . $row["DATA_NASC"] . "</td>
                        <td>" . $row["TIPO_USUARIO"] . "</td>


                        <td> <a href='edit.php?id=$row[ID]' ><img class='icone_editar' src='img/icone_editar.png' ></a>
                        
                            <a href='status.php?id=$row[ID]' ><img class='icone_status' src='img/icone_status.png' ></a></td>

                    </tr>";
                }
                echo "</table>";
            } else {
                echo "Nenhum registro encontrado na tabela 'usuarios'.";
            }

            $conn->close();
        ?>
    </div>

    </main>
</body>
</html>