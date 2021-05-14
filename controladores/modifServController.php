<?php
session_start();
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header('Location:homeController.php');
    die();
}
require_once("../modelo/serviciosModel.php");
require_once("../modelo/usuariosModel.php");
$serviciosModel=new ServiciosModel();
$usuariosModel=new Usuarios();

//Obtener ruta Imagen
$targetDir="../img/servicios/";
$targetFile="";
$nombreImagen="";
$tmp_name="";
//Fin obtener ruta imagen
$rutaArchivo="";
$rutaImagen="";

$servicio=[];
$mensaje="";
if(isset($_POST['modifServicio'])){
    $idServicio=$_POST['idServicio'];
    $servicio=$serviciosModel->getServicioById($idServicio);
}
if(isset($_POST['modificar'])){
    $usuarioActual=$usuariosModel->getUsuarioActual($_SESSION['usuario']);

    $idUsuario=$usuarioActual['idUsuario'];

    $idServicio=$_POST['idServicio'];
    $nombreServicio=$_POST['nombreservicio'];
    $descripcionNoticia=$_POST['descripcion'];
    $precio=$_POST['precio'];

    //Obtener la ruta de la imagen
    $tmp_name=$_FILES["rutaImagen"]["tmp_name"];
    $nombreImagen=basename($_FILES["rutaImagen"]["name"]);
    $rutaImagen=$targetDir.$nombreImagen;
    //Guardar imagen en ruta
    move_uploaded_file($tmp_name,$rutaImagen);
    //Fin obtener ruta

    $rutaArchivo=$_POST['rutaArchivo'];

    if($nombreImagen==null || empty($nombreImagen) || $nombreImagen=""){
        $rutaImagen="";
    }

    $mensaje=$serviciosModel->updateServicio($idServicio,$idUsuario,$nombreServicio,$descripcionNoticia,$precio,$rutaImagen,$rutaArchivo);
}



require_once("../vista/modifServ.php");
?>