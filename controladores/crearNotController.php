<?php

session_start();
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header('Location:homeController.php');
    die();
}
require_once("../modelo/usuariosModel.php");
require_once("../modelo/noticiasModel.php");

$usuariosModel=new Usuarios();
$noticiasModel=new NoticiasModel();

$usuarioActual=$usuariosModel->getUsuarioActual($_SESSION['usuario']);
$idUsuario=$usuarioActual["idUsuario"];

//Obtener ruta Imagen
$targetDir="../img/noticias/";
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

    $idCategoriaNoticia=1;
    if($_POST['filtro']=="Anuncio"){
        $idCategoriaNoticia=1;
    }
    if($_POST['filtro']=="Evento"){
        $idCategoriaNoticia=2;
    }
    if($_POST['filtro']=="Promocion"){
        $idCategoriaNoticia=3;
    }
    $nombreNoticia=$_POST['nombrenoticia'];
    $descripcionNoticia=$_POST['descripcion'];


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

    $mensaje=$noticiasModel->insertarNoticia($idUsuario,$idCategoriaNoticia,$nombreNoticia,$descripcionNoticia,$rutaImagen,$rutaArchivo);
}

require_once("../vista/crearNot.php");
?>