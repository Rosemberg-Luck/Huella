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

$usuarioActual=$usuariosModel->getUsuarioActual($_SESSION['usuario']);
$idUsuario=$usuarioActual["idUsuario"];

//Obtener ruta Imagen
$targetDir="../img/servicios/";
$targetFile="";
$nombreImagen="";
$tmp_name="";
//Fin obtener ruta imagen
$rutaArchivo="";
$rutaImagen="";

$mensaje="";
if(isset($_POST['crear'])){
    $usuarioActual=$usuariosModel->getUsuarioActual($_SESSION['usuario']);

    $idUsuario=$usuarioActual['idUsuario'];
    $nombreServicio=$_POST['nombreservicio'];
    $descripcionServicio=$_POST['descripcion'];
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

    $mensaje=$serviciosModel->insertarServicio($idUsuario,$nombreServicio,$descripcionServicio,$precio,$rutaImagen,$rutaArchivo);
}

require_once("../vista/crearServ.php");
?>