<?php
session_start();
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header('Location:homeController.php');
    die();
}
require_once("../modelo/usuariosModel.php");
require_once("../modelo/serviciosModel.php");
$usuariosModel=new Usuarios();
$serviciosModel=new ServiciosModel();

//Obtener usuario
$usuarioActual=$usuariosModel->getUsuarioActual($_SESSION['usuario']);

$listaServicios=$serviciosModel->getServicios();

if(isset($_POST['search'])){
    $search=$_POST['search'];
    $listaServicios=$serviciosModel->buscarServiciosPorNombre($search);
}
if(isset($_POST['eliminarservicio'])){
    $idServicio=$_POST['idServicio'];
    $serviciosModel->eliminarServicioPorId($idServicio);
   
}

require_once("../vista/servAdmin.php");
?>