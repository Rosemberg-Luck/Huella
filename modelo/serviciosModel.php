<?php
class ServiciosModel
{
    private $listaServicios;
    private $db;
    public function __construct()
    {
        $this->listaServicios = array();
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

    public function getServicios()
    {
        /*Método para obtener la lista de todos los servicios
        */
        $this->abrirConexion();
        $sql = "SELECT * FROM servicios ORDER BY idServicio DESC";
        if (isset($this->db)) {
            try {
                $respuesta = $this->db->prepare($sql);
                $respuesta->execute();
                foreach ($respuesta as $res) {
                    $this->listaServicios[] = $res;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            echo "Problemas con la bd";
        }
        $this->cerrarConexion();
        return $this->listaServicios;
    }

    public function insertarServicio($idUsuario, $nombre, $descripcion, $precio, $rutaImagen, $rutaArchivo)
    {
        $sql = "INSERT INTO servicios(idUsuario,nombre,descripcion,precio,rutaImagen,rutaArchivo) VALUES ('$idUsuario','$nombre','$descripcion','$precio','$rutaImagen','$rutaArchivo');";
        $this->abrirConexion();
        $mensaje = "";
        try {
            $respuesta = $this->db->prepare($sql);
            $respuesta->execute();
            if ($respuesta->rowCount() == 1) {
                $mensaje = "Servicio registrado";
            } else {
                $mensaje = "Servicio no registrado";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->cerrarConexion();
        return $mensaje;
    }
    public function updateServicio($idServicio,$idUsuario, $nombre, $descripcion,$precio, $rutaImagen, $rutaArchivo)
    {
        $sql = "UPDATE servicios SET idUsuario='$idUsuario',nombre='$nombre', 
        descripcion='$descripcion',precio='$precio',rutaImagen='$rutaImagen',rutaArchivo='$rutaArchivo' WHERE idServicio='$idServicio';";
        $this->abrirConexion();
        $mensaje = "";
        try {
            $respuesta = $this->db->prepare($sql);
            $respuesta->execute();
            if ($respuesta->rowCount() == 1) {
                $mensaje = "Servicio actualizado con éxito";
            } else {
                $mensaje = "No se ha actualizado ningún registro,comprobar parámetros ó se están devolviendo los mismos datos";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->cerrarConexion();
        return $mensaje;
    }

    public function eliminarServicioPorId($idServicio)
    {
        $sql = "DELETE FROM servicios WHERE idServicio=$idServicio";
        $this->abrirConexion();
        try {
            $respuesta = $this->db->prepare($sql);
            $respuesta->execute();
            if ($respuesta->rowCount() == 1) {
                header("Location:../controladores/servAdminController.php");
            } else {
                echo "Servicio no eliminado";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->cerrarConexion();
    }

    public function buscarServiciosPorNombre($nombre)
    {
        $servicios = array();
        $this->abrirConexion();
        $sql = "SELECT * FROM servicios WHERE nombre LIKE '%$nombre%' ORDER BY idServicio DESC";
        if (isset($this->db)) {
            try {
                $respuesta = $this->db->prepare($sql);
                $respuesta->execute();
                foreach ($respuesta as $res) {
                    $servicios[] = $res;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            echo "Problemas con la bd";
        }
        $this->cerrarConexion();
        return $servicios;
    }
    public function getServicioById($idServicio)
    {
        $this->abrirConexion();
        $sql = "SELECT * FROM servicios WHERE idServicio=$idServicio";
        $servicio=array();
        if (isset($this->db)) {
            try {
                $respuesta = $this->db->prepare($sql);
                $respuesta->execute();
                foreach($respuesta as $res){
                    $servicio['idServicio']=$res['idServicio'];
                    $servicio['nombre']=$res['nombre'];
                    $servicio['descripcion']=$res['descripcion'];
                    $servicio['precio']=$res['precio'];
                    $servicio['rutaImagen']=$res['rutaImagen'];
                    $servicio['rutaArchivo']=$res['rutaArchivo'];
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            echo "La base de datos no está inicializada o no hay acceso a ella";
        }
        $this->cerrarConexion();
        return $servicio;
    }
}