<?php

require_once("../modelo/noticiasModel.php");
require_once("../modelo/categoriasModel.php");

$categoriasModel=new CategoriasModel();
$noticiasModel=new NoticiasModel();

//Obtener usuario

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
    if($_POST['filtro']=="Ninguno"){
        $listaNoticias=$noticiasModel->getNoticias();
    }
}else{
    $listaNoticias=$noticiasModel->getNoticias();
}

if(isset($_POST['search'])){
    $search=$_POST['search'];
    $listaNoticias=$noticiasModel->buscarNoticiasPorNombre($search);
}

require_once("../vista/noticias.php");

?>