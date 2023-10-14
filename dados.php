<?php

//conexao

$host="localhost";
$port=3308;
$socket="";
$user="root";
$password="";
$dbname="mydb";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	// or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

    or die("html>script language='JavaScript'>alert('Unable to connect to
    database! Please try again later.'),history.go(-1)/script>/html>");
    mysqli_select_db($dbname);
    # Check If Record Exists
    $query = "SELECT * FROM $usertable";
    $result = mysqli_query($query);
    if($result){
    while($row = mysqli_fetch_array($result)){
    $name = $row["$yourfield"];
    echo "Name: ".$name."br/>";
    };
    };
include ( '/index.html');
?>