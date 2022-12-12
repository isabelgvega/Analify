<?php
include 'sesion.php';
//include 'config.php';

$user = $_POST['user'];
$psw = $_POST['psw'];

/*
$db = new Database();
$connected = $db->connect();
$consult = "SELECT * FROM usuarios WHERE user='$user' and psw='$psw'";

$result = $connected->prepare($consult);
$result->execute();
$usuario = $result->fetch(PDO::FETCH_ASSOC);

if($usuario){
    header("location:inicio.php");
}else{
    $_SESSION['login'] = 0;
    header('location:index.php');
}
mysqli_close($connect);*/

if($user == 'user' and $psw == 'user'){
    header("location:inicio.php");
}else{
    $_SESSION['login'] = 0;
    header('location:index.php');
}

?>