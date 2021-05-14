<?php
session_start();
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header('Location:homeController.php');
    die();
}
require_once("../modelo/usuariosModel.php");
require_once("../modelo/noticiasModel.php");
require_once("../modelo/categoriasModel.php");

$usuariosModel=new Usuarios();
$categoriasModel=new CategoriasModel();
$noticiasModel=new NoticiasModel();

//Obtener usuario
$usuarioActual=$usuariosModel->getUsuarioActual($_SESSION['usuario']);

if(isset($_POST['filtroenviar'])){
    if($_POST['filtro']=="Anuncio"){
        $listaNoticias=$noticiasModel->filtrarNoticiaPorCategoria(1);
    }
    if($_POST['filtro']=="Evento"){
        $listaNoticias=$noticiasModel->filtrarNoticiaPorCategoria(2);
    }
    if($_POST['filtro']=="Promocion"){
        $listaNoticias=$noticiasModel->filtrarNoticiaPorCategoria(3);
    }
}else{
    $listaNoticias=$noticiasModel->getNoticias();
}
if(isset($_POST['eliminarnoticia'])){
    $idNoticia=$_POST['idNoticia'];
    $noticiasModel->eliminarNoticiaPorId($idNoticia);
   
}

require_once("../vista/notAdmin.php");
?>