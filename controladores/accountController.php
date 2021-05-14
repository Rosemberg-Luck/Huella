<?php
session_start();
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header('Location:homeController.php');
    die();
}
require_once("../modelo/usuariosModel.php");

$usuariosModel=new Usuarios();

//Colocar valores en los campos editables y no editables del usuario actual
$usuarioActual=$usuariosModel->getUsuarioActual($_SESSION['usuario']);

$mensaje="";
if(isset($_POST['guardar'])){
    $idUsuario=$usuarioActual['idUsuario'];
    $nombre=$usuarioActual['nombre'];
    $pass=$_POST['pass'];

    if($pass!=""){
        $mensaje=$usuariosModel->updateUsuario($idUsuario,$pass);
    }else{
        $mensaje="No dejes vacío ningún campo";
    }
}

require_once("../vista/account.php");
?>