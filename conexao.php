<?php

$host = "localhost";
$user = "root";
$pass = "";
$base = "ficha";

$con = mysqli_connect($host, $user, $pass);
$banco = mysqli_select_db($con, $base);

if(mysqli_connect_errno()){
    die("falha:".
        mysqli_connect_errno() . "(" . mysqli_connect_errno() . ")"
    );
}


mysqli_query($con, "SET NAMES 'uft8");
mysqli_query($con, "SET character_set_connection=uft8");
mysqli_query($con, "SET character_set_result=uft8");
?>
