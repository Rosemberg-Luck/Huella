<?php
session_start();
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header('Location:homeController.php');
    die();
}
require_once("../modelo/usuariosModel.php");
$error="";
$mensaje="";
if(isset($_POST["registro"])){
    $nombre=$_POST["name"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $pas=$_POST["confirmpass"];

    if($pass==$pas){
        $usuariosModel=new Usuarios();
        $mensaje=$usuariosModel->register($nombre,$email,$pass);
    }else{
        $mensaje="Las contraseñas no coinciden, vuelva a intentarlo";
    }

    
}
require_once("../vista/registro.php");
?>