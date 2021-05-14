<?php

require_once("../modelo/usuariosModel.php");
$mensaje="";
if(isset($_POST['ingresar'])){

    $email=$_POST['email'];
    $pass=$_POST['pass'];
    
    $usuariosmodel=new Usuarios();
    
    $mensaje=$usuariosmodel->login($email,$pass);
    }

require_once("../vista/login.php");
?>