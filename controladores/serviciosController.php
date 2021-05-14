<?php
require_once("../modelo/usuariosModel.php");
require_once("../modelo/serviciosModel.php");

$serviciosModel=new ServiciosModel();


$listaServicios=$serviciosModel->getServicios();

if(isset($_POST['search'])){
    $search=$_POST['search'];
    $listaServicios=$serviciosModel->buscarServiciosPorNombre($search);
}


require_once("../vista/servicios.php");
?>