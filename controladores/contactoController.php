<?php
require_once("../modelo/usuariosModel.php");

header('Content-Type: text/html; charset=UTF-8');


$usuariosModel=new Usuarios();

$mensaje="";

if(isset($_POST['contacto'])){

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $telefono=$_POST['telefono'];
    $Motivo="";
    if($_POST['filtro']=="Servicio"){
        $motivo="Solicitar servicio";
    }
    if($_POST['filtro']=="Duda"){
        $motivo="Duda";
    }
    if($_POST['filtro']=="Otro"){
        $motivo="Otro";
    }
    $mensaje=$_POST['areacomentario'];
    
    
    
    $mensaje=$usuariosModel->Contacto($nombre,$apellido,$email,$telefono,$motivo,$mensaje);
    
    
    }


require_once("../vista/contacto.php");
