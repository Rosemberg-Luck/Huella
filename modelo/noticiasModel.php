<?php
class NoticiasModel
{
    private $listaNoticias;
    private $db;
    public function __construct()
    {
        $this->listaNoticias = array();
    }

    public function abrirConexion()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=Huella', "root", "");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $this->db;
    }

    public function cerrarConexion()
    {
        $this->db = null;
    }

    public function getNoticias()
    {
        /*Método para obtener la lista de todas las noticias
        */
        $this->abrirConexion();
        $sql = "SELECT * FROM noticias ORDER BY idNoticia DESC";
        if (isset($this->db)) {
            try {
                $respuesta = $this->db->prepare($sql);
                $respuesta->execute();
                foreach ($respuesta as $res) {
                    $this->listaNoticias[] = $res;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            echo "Problemas con la bd";
        }
        $this->cerrarConexion();
        return $this->listaNoticias;
    }

    public function insertarNoticia($idUsuario, $idCategoria, $nombre, $descripcion, $rutaImagen, $rutaArchivo)
    {
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d h:i:sa');
        $sql = "INSERT INTO noticias(idUsuario,idCategoria,fecha,nombre,descripcion,rutaImagen,rutaArchivo) VALUES ('$idUsuario','$idCategoria','$fecha','$nombre','$descripcion','$rutaImagen','$rutaArchivo');";
        $this->abrirConexion();
        $mensaje = "";
        try {
            $respuesta = $this->db->prepare($sql);
            $respuesta->execute();
            if ($respuesta->rowCount() == 1) {
                $mensaje = "Noticia registrada";
            } else {
                $mensaje = "Noticia no registrada";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->cerrarConexion();
        return $mensaje;
    }
    public function updateNoticia($idNoticia,$idUsuario, $idCategoria, $nombre, $descripcion, $rutaImagen, $rutaArchivo)
    {
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d h:i:sa');
        $sql = "UPDATE noticias SET idUsuario='$idUsuario',idCategoria='$idCategoria',nombre='$nombre', 
        descripcion='$descripcion',rutaImagen='$rutaImagen',rutaArchivo='$rutaArchivo',fecha='$fecha' WHERE idNoticia='$idNoticia';";
        $this->abrirConexion();
        $mensaje = "";
        try {
            $respuesta = $this->db->prepare($sql);
            $respuesta->execute();
            if ($respuesta->rowCount() == 1) {
                $mensaje = "Noticia actualizada con éxito";
            } else {
                $mensaje = "No se ha actualizado ningún registro,comprobar parámetros ó se están devolviendo los mismos datos";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->cerrarConexion();
        return $mensaje;
    }

    public function eliminarNoticiaPorId($idNoticia)
    {
        $sql = "DELETE FROM noticias WHERE idNoticia=$idNoticia";
        $this->abrirConexion();
        try {
            $respuesta = $this->db->prepare($sql);
            $respuesta->execute();
            if ($respuesta->rowCount() == 1) {
                header("Location:../controladores/notAdminController.php");
            } else {
                echo "Noticia no eliminada";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->cerrarConexion();
    }

    public function filtrarNoticiaPorCategoria($idCategoria)
    {
        $noticiasFiltradas = array();
        $this->abrirConexion();
        $sql = "SELECT * FROM noticias WHERE idCategoria=$idCategoria ORDER BY idNoticia DESC";
        if (isset($this->db)) {
            try {
                $respuesta = $this->db->prepare($sql);
                $respuesta->execute();
                foreach ($respuesta as $res) {
                    $noticiasFiltradas[] = $res;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            echo "Problemas con la bd";
        }
        $this->cerrarConexion();
        return $noticiasFiltradas;
    }

    public function buscarNoticiasPorNombre($nombre)
    {
        $noticias = array();
        $this->abrirConexion();
        $sql = "SELECT * FROM noticias WHERE nombre LIKE '%$nombre%' ORDER BY idNoticia DESC";
        if (isset($this->db)) {
            try {
                $respuesta = $this->db->prepare($sql);
                $respuesta->execute();
                foreach ($respuesta as $res) {
                    $noticias[] = $res;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            echo "Problemas con la bd";
        }
        $this->cerrarConexion();
        return $noticias;
    }
    public function getNoticiaById($idNoticia)
    {
        $this->abrirConexion();
        $sql = "SELECT * FROM noticias WHERE idNoticia=$idNoticia";
        $noticia=array();
        if (isset($this->db)) {
            try {
                $respuesta = $this->db->prepare($sql);
                $respuesta->execute();
                foreach($respuesta as $res){
                    $noticia['idNoticia']=$res['idNoticia'];
                    $noticia['nombre']=$res['nombre'];
                    $noticia['idCategoria']=$res['idCategoria'];
                    $noticia['descripcion']=$res['descripcion'];
                    $noticia['rutaImagen']=$res['rutaImagen'];
                    $noticia['rutaArchivo']=$res['rutaArchivo'];
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            echo "La base de datos no está inicializada o no hay acceso a ella";
        }
        $this->cerrarConexion();
        return $noticia;
    }
    
}
