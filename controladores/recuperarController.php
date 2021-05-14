<?php
require_once("../modelo/usuariosModel.php");
$mensaje="";

if(isset($_POST['recuperar'])){

$email=$_POST['email'];

$usuariosModel=new Usuarios();

$usuarioActual=$usuariosModel->getUsuarioActual($email);
$pass=$usuarioActual['pass'];


$mensaje=$usuariosModel->recuperar($email,$pass);


}

require_once("../vista/recuperar.php");

?>